<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Contacts Model
 *
 * @property \App\Model\Table\OrganisationsTable&\Cake\ORM\Association\BelongsTo $Organisations
 * @property \App\Model\Table\ContractorsTable&\Cake\ORM\Association\BelongsTo $Contractors
 *
 * @method \App\Model\Entity\Contact newEmptyEntity()
 * @method \App\Model\Entity\Contact newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Contact> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Contact get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Contact findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Contact patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Contact> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Contact|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Contact saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Contact>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Contact>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Contact>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Contact> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Contact>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Contact>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Contact>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Contact> deleteManyOrFail(iterable $entities, array $options = [])
 */
class ContactsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array<string, mixed> $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('contacts');
        $this->setDisplayField('first_name');
        $this->setPrimaryKey('id');

        $this->belongsTo('Organisations', [
            'foreignKey' => 'organisation_id',
        ]);
        $this->belongsTo('Contractors', [
            'foreignKey' => 'contractor_id',
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
            ->scalar('first_name')
            ->maxLength('first_name', 255)
            ->requirePresence('first_name', 'create')
            ->notEmptyString('first_name');

        $validator
            ->scalar('last_name')
            ->maxLength('last_name', 255)
            ->requirePresence('last_name', 'create')
            ->notEmptyString('last_name');

        $validator
            ->email('email', false, 'Please enter a valid email address.')
            ->requirePresence('email', 'create')
            ->notEmptyString('email');

            $validator
    ->scalar('phone_number')
    ->maxLength('phone_number', 12)
    ->requirePresence('phone_number', 'create')
    ->notEmptyString('phone_number')
    ->add('phone_number', 'validFormat', [
        'rule' => function ($value, $context) {
            // Check if the phone number starts with 0 and does not end with 0 and have 10 digits
            return preg_match('/^0[1-9]\d{0,2} \d{3} \d{3}$/', $value) === 1;
        },
        'message' => 'Please enter a valid phone number starting with 0 (e.g., 0411 256 454).',
    ]);



        $validator
            ->scalar('message')
            ->allowEmptyString('message');

        $validator
            ->boolean('replied')
            ->notEmptyString('replied');

        $validator
            ->date('date_sent')
            ->allowEmptyDate('date_sent');

        $validator
            ->integer('organisation_id')
            ->allowEmptyString('organisation_id');

        $validator
            ->integer('contractor_id')
            ->allowEmptyString('contractor_id');

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
        $rules->add($rules->existsIn(['organisation_id'], 'Organisations'), ['errorField' => 'organisation_id']);
        $rules->add($rules->existsIn(['contractor_id'], 'Contractors'), ['errorField' => 'contractor_id']);

        return $rules;
    }
}
