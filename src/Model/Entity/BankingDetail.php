<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * BankingDetail Entity
 *
 * @property int $id
 * @property int $user_id
 * @property int $bank_id
 * @property string|null $account_name
 * @property string|null $account_number
 * @property string|null $account_type
 * @property string|null $branch
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Bank $bank
 */
class BankingDetail extends Entity
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
        'bank_id' => true,
        'account_name' => true,
        'account_number' => true,
        'account_type' => true,
        'branch' => true,
        'created' => true,
        'modified' => true,
        'user' => true,
        'bank' => true,
    ];
}
