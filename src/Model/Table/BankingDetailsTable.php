<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * BankingDetails Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\BanksTable&\Cake\ORM\Association\BelongsTo $Banks
 *
 * @method \App\Model\Entity\BankingDetail newEmptyEntity()
 * @method \App\Model\Entity\BankingDetail newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\BankingDetail[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\BankingDetail get($primaryKey, $options = [])
 * @method \App\Model\Entity\BankingDetail findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\BankingDetail patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\BankingDetail[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\BankingDetail|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\BankingDetail saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\BankingDetail[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\BankingDetail[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\BankingDetail[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\BankingDetail[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class BankingDetailsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('banking_details');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Banks', [
            'foreignKey' => 'bank_id',
            'joinType' => 'INNER',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->nonNegativeInteger('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('account_name')
            ->maxLength('account_name', 50)
            ->allowEmptyString('account_name');

        $validator
            ->scalar('account_number')
            ->maxLength('account_number', 50)
            ->allowEmptyString('account_number');

        $validator
            ->scalar('account_type')
            ->maxLength('account_type', 50)
            ->allowEmptyString('account_type');

        $validator
            ->scalar('branch')
            ->maxLength('branch', 50)
            ->allowEmptyString('branch');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn(['user_id'], 'Users'), ['errorField' => 'user_id']);
        $rules->add($rules->existsIn(['bank_id'], 'Banks'), ['errorField' => 'bank_id']);

        return $rules;
    }

    // public function beforeFind(Query $query)
    // {
    //     return $query->contain('Banks');
    // }
}
