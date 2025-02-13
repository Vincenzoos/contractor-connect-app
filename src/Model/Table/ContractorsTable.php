<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\Log\Log;
use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Contractors Model
 *
 * @property \App\Model\Table\ContactsTable&\Cake\ORM\Association\HasMany $Contacts
 * @property \App\Model\Table\ProjectsTable&\Cake\ORM\Association\HasMany $Projects
 * @property \App\Model\Table\SkillsTable&\Cake\ORM\Association\BelongsToMany $Skills
 *
 * @method \App\Model\Entity\Contractor newEmptyEntity()
 * @method \App\Model\Entity\Contractor newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Contractor> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Contractor get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Contractor findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Contractor patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Contractor> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Contractor|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Contractor saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Contractor>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Contractor>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Contractor>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Contractor> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Contractor>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Contractor>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Contractor>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Contractor> deleteManyOrFail(iterable $entities, array $options = [])
 */
class ContractorsTable extends Table
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

        $this->setTable('contractors');
        $this->setDisplayField('details');
        $this->setPrimaryKey('id');

        $this->hasMany('Contacts', [
            'foreignKey' => 'contractor_id',
        ]);
        $this->hasMany('Projects', [
            'foreignKey' => 'contractor_id',
        ]);
        $this->belongsToMany('Skills', [
            'foreignKey' => 'contractor_id',
            'targetForeignKey' => 'skill_id',
            'joinTable' => 'contractors_skills',
        ]);

        $this->addBehavior('Josegonzalez/Upload.Upload', [
            'profile_picture' => [
                'nameCallback' => function ($table, $entity, $data, $field, $settings) {
                    return $entity->picture_name.'.'.pathinfo($data->getClientFilename(), PATHINFO_EXTENSION);
                },
                'keepFilesOnDelete' => false,
            ],
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
                    // Match phone numbers that start with 0 and have 9-11 digits after the initial 0
                    return preg_match('/^0[1-9]\d{0,2} \d{3} \d{3}$/', $value) === 1;
                },
                'message' => 'Please enter a valid phone number starting with 0 (e.g., 0411 256 454).',
            ]);



        $validator
            ->allowEmptyFile('profile_picture')  // Allows no file being uploaded
            ->add('profile_picture', [
                'validExtension' => [
                    'rule' => ['extension', ['png', 'jpg', 'jpeg', 'webp']],
                    'message' => 'Please upload a valid image file (PNG, JPEG, WEBP).',
                ],
                'fileSize' => [
                    'rule' => ['fileSize', '<=', '5MB'],  // Optional: limit to 5MB
                    'message' => 'Please upload an image file smaller than 5MB.',
                ],
            ]);

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
}
