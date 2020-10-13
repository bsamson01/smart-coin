<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\I18n\FrozenTime;

/**
 * CoinsOnHand Entity
 *
 * @property int $id
 * @property int $user_id
 * @property int $amount
 * @property int|null $sell_amount
 * @property \Cake\I18n\FrozenTime|null $sell_date
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modfied
 *
 * @property \App\Model\Entity\User $user
 */
class CoinsOnHand extends Entity
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
        'user_id' => true,
        'amount' => true,
        'sell_amount' => true,
        'sell_date' => true,
        'waiting_period' => true,
        'created' => true,
        'modfied' => true,
        'user' => true,
    ];

    protected function _getReadyForSale()
    {
        return $this->sell_date <= FrozenTime::now();
    }
}
