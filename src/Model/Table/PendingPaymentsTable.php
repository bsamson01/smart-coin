<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PendingPayments Model
 *
 * @method \App\Model\Entity\PendingPayment newEmptyEntity()
 * @method \App\Model\Entity\PendingPayment newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\PendingPayment[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PendingPayment get($primaryKey, $options = [])
 * @method \App\Model\Entity\PendingPayment findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\PendingPayment patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PendingPayment[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\PendingPayment|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PendingPayment saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PendingPayment[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\PendingPayment[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\PendingPayment[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\PendingPayment[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PendingPaymentsTable extends Table
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

        $this->setTable('pending_payments');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
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
            ->nonNegativeInteger('seller')
            ->notEmptyString('seller');

        $validator
            ->nonNegativeInteger('buyer')
            ->notEmptyString('buyer');

        $validator
            ->nonNegativeInteger('amount')
            ->notEmptyString('amount');

        $validator
            ->boolean('paid')
            ->allowEmptyString('paid');

        $validator
            ->nonNegativeInteger('waiting_period')
            ->requirePresence('waiting_period', 'create')
            ->notEmptyString('waiting_period');

        return $validator;
    }
}
