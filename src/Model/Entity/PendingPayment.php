<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\ORM\TableRegistry;

/**
 * PendingPayment Entity
 *
 * @property int $id
 * @property int $seller
 * @property int $buyer
 * @property int $amount
 * @property bool|null $paid
 * @property int $waiting_period
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 */
class PendingPayment extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'seller' => true,
        'buyer' => true,
        'amount' => true,
        'paid' => true,
        'waiting_period' => true,
        'created' => true,
        'modified' => true,
    ];

    protected function _getCoinBuyer()
    {
        $coin_buyer = TableRegistry::get('Users')->findById($this->buyer)->first();
        return $coin_buyer;
    }

    protected function _getCoinSeller()
    {
        $coin_seller = TableRegistry::get('Users')->findById($this->seller)->contain(['BankingDetails', 'BankingDetails.Banks'])->first();
        // dd($coin_seller);
        return $coin_seller;
    }
}
