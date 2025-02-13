<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Projects Model
 *
 * @property \App\Model\Table\OrganisationsTable&\Cake\ORM\Association\BelongsTo $Organisations
 * @property \App\Model\Table\ContractorsTable&\Cake\ORM\Association\BelongsTo $Contractors
 * @property \App\Model\Table\SkillsTable&\Cake\ORM\Association\BelongsToMany $Skills
 *
 * @method \App\Model\Entity\Project newEmptyEntity()
 * @method \App\Model\Entity\Project newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Project> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Project get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Project findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Project patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Project> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Project|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Project saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Project>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Project>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Project>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Project> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Project>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Project>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Project>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Project> deleteManyOrFail(iterable $entities, array $options = [])
 */
class ProjectsTable extends Table
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

        $this->setTable('projects');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('Organisations', [
            'foreignKey' => 'organisation_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Contractors', [
            'foreignKey' => 'contractor_id',
        ]);
        $this->belongsToMany('Skills', [
            'foreignKey' => 'project_id',
            'targetForeignKey' => 'skill_id',
            'joinTable' => 'projects_skills',
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
            ->scalar('name')
            ->maxLength('name', 255)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->scalar('description')
            ->allowEmptyString('description');

        $validator
            ->date('deadline')
            ->requirePresence('deadline', 'create')
            ->notEmptyDate('deadline', 'Please provide a deadline.')
            ->add('deadline', 'validDate', [
                'rule' => function ($value, $context) {
                    // Check if the deadline is not in the past
                    return $value >= date('Y-m-d');
                },
                'message' => 'The deadline cannot be in the past.',
            ]);

        $validator
            ->scalar('management_tool_link')
            ->maxLength('management_tool_link', 500)
            ->allowEmptyString('management_tool_link')
            ->add('management_tool_link', 'validFormat', [
                'rule' => function ($value, $context) {
                    // Regular expression to match the format http://example.com or https://example.com
                    return filter_var($value, FILTER_VALIDATE_URL) !== false;
                },
                'message' => 'Please enter a valid URL in the format (e.g. http://example.com or https://example.com/add)'
            ])
            ->url('management_tool_link',  'Please enter a valid URL in the format (e.g. http://example.com or https://example.com/add)');

        $validator
            ->date('last_checked_date')
            ->requirePresence('last_checked_date', 'create')
            ->notEmptyDate('last_checked_date');

        $validator
            ->boolean('is_completed')
            ->notEmptyString('is_completed');

        $validator
            ->integer('organisation_id')
            ->notEmptyString('organisation_id');

        $validator
            ->integer('contractor_id')
            ->allowEmptyString('contractor_id');

        $validator
            ->scalar('other_skills')
            ->allowEmptyString('other_skills')
            ->add('other_skills', 'commaSeparated', [
                'rule' => function ($value, $context) {
                    // Split the skills by commas
                    $skills = explode(',', $value);

                    foreach ($skills as $skill) {
                        $skill = trim($skill); // Trim whitespace
                        // Check if the skill is alphabetic (or adjust as per requirement)
                        if (!preg_match('/^[a-zA-Z\s]+$/', $skill)) {
                            return false; // Return false if any skill is invalid
                        }
                    }

                    return true;
                },
                'message' => 'Please enter valid skill names separated by commas (letters only).'
            ]);

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
