<?php
declare(strict_types=1);

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Core\Configure;
use Cake\Http\Exception\ForbiddenException;
use Cake\Http\Exception\NotFoundException;
use Cake\Http\Response;
use Cake\View\Exception\MissingTemplateException;

/**
 * Static content controller
 *
 * This controller will render views from templates/Pages/
 *
 * @link https://book.cakephp.org/4/en/controllers/pages-controller.html
 */
class PagesController extends AppController
{

    public function initialize(): void
    {
        $this->loadModel('CoinsOnAuction');
        $this->loadModel('PendingPayments');
        $this->loadModel('Users');
        $this->loadModel('Transactions');
        $this->loadModel('CoinsOnHand');
        $this->loadModel('WaitingPeriods');
        parent::initialize();

        $email = $this->Authentication->getIdentityData('email');
        $this->user = $this->Users->findByEmail($email)->first();
    }
    /**
     * Displays a view
     *
     * @param string ...$path Path segments.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Http\Exception\ForbiddenException When a directory traversal attempt.
     * @throws \Cake\View\Exception\MissingTemplateException When the view file could not
     *   be found and in debug mode.
     * @throws \Cake\Http\Exception\NotFoundException When the view file could not
     *   be found and not in debug mode.
     * @throws \Cake\View\Exception\MissingTemplateException In debug mode.
     */
    public function display(string ...$path): ?Response
    {
        if (!$path) {
            return $this->redirect('/');
        }
        if (in_array('..', $path, true) || in_array('.', $path, true)) {
            throw new ForbiddenException();
        }
        $page = $subpage = null;

        if (!empty($path[0])) {
            $page = $path[0];
        }
        if (!empty($path[1])) {
            $subpage = $path[1];
        }
        $this->set(compact('page', 'subpage'));

        try {
            return $this->render(implode('/', $path));
        } catch (MissingTemplateException $exception) {
            if (Configure::read('debug')) {
                throw $exception;
            }
            throw new NotFoundException();
        }
    }

    public function auction()
    {
        $auctions = $this->CoinsOnAuction->find('all')->contain(['Users', 'Users.BankingDetails', 'Users.BankingDetails.Banks'])->toArray();
        $bid = $this->PendingPayments->newEmptyEntity();
        $waitingTimeOptions = [
            1 => '3 days',
            2 => '5 days',
            3 =>'10 days'
        ];
        $this->set(compact('auctions', 'bid', 'waitingTimeOptions'));
    }

    public function placeBid()
    {
        if ($this->request->is('post')) {
            $coins_id = $this->request->getData('auction_id');
            $coin_auction = $this->CoinsOnAuction->get($coins_id);
            if ($coin_auction) {
                if ($coin_auction->amount >= $this->request->getData('amount')) {
                    $coin_auction->amount -= $this->request->getData('amount');
                    $this->CoinsOnAuction->save($coin_auction);
                    $payment = $this->PendingPayments->newEmptyEntity();
                    $payment = $this->PendingPayments->patchEntity($payment, $this->request->getData());
                    $payment->seller = $coin_auction->user_id;
                    $payment->buyer = $this->user->id;
                    $payment->paid = 0;
                    $this->PendingPayments->save($payment);
                }
            }
        }
        return $this->redirect('/auction');
    }
}
