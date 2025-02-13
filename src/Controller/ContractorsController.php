<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Log\Log;

/**
 * Contractors Controller
 *
 * @property \App\Model\Table\ContractorsTable $Contractors
 */
class ContractorsController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();

        // In pages controller, display() does not require login
        $this->Authentication->allowUnauthenticated(['addPublic']);

    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Contractors->find('all')->orderBy('first_name ASC, last_name ASC');

        // Check for search filters
        $first_name = $this->request->getQuery('first_name');
        $last_name = $this->request->getQuery('last_name');
        $email = $this->request->getQuery('email');
        $no_projects = $this->request->getQuery('no_projects');
        $skillsList = $this->Contractors->Skills->find('list', limit: 200)->all();
        $selectedSkills = $this->request->getQuery('skills._ids');

        // Filter contractors by firstname (partial match)
        if (!empty($first_name)) {
            $query->where(['Contractors.first_name LIKE' => '%' .$first_name. '%']);
        }

        // Filter contractors by lastname (partial match)
        if (!empty($last_name)) {
            $query->where(['Contractors.last_name LIKE' => '%' .$last_name. '%']);
        }

        // Filter contractors by email (partial match)
        if (!empty($email)) {
            $query->where(['Contractors.email LIKE' => '%' .$email. '%']);
        }

        // Filter contractors by number of projects (exact match)
        if (is_numeric($no_projects)) {
            $query->leftJoinWith('Projects')
                ->groupBy(['Contractors.id'])
                ->having(['COUNT(Projects.id)  =' => (int)$no_projects]);
        }

        // Filter contractors skills (exact match)
        if (!empty($selectedSkills) && $selectedSkills !== ['']) {
            $query->matching('Skills')
            ->groupBy(['Contractors.id'])
            ->where(['Skills.id IN' => $selectedSkills]);
        }



        $contractors = $this->paginate($query);

        $this->set(compact('contractors', 'skillsList'));
    }

    /**
     * View method
     *
     * @param string|null $id Contractor id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $contractor = $this->Contractors->get($id, contain: ['Skills', 'Contacts', 'Projects']);
        $this->set(compact('contractor'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $contractor = $this->Contractors->newEmptyEntity();
        if ($this->request->is('post')) {
            $contractor = $this->Contractors->patchEntity($contractor, $this->request->getData());

            // Initialize an array to hold valid skill entities
            $skillsEntities = [];
            $invalidSkills = []; // Collect any invalid skill names for feedback

            // Handle existing skills selected from the multi-select
            if (!empty($this->request->getData('skills._ids'))) {
                $existingSkills = $this->Contractors->Skills->find()
                    ->where(['id IN' => $this->request->getData('skills._ids')])
                    ->all();
                $skillsEntities = $existingSkills->toArray();
            }

            // Process 'other_skills' if provided as a comma-separated string
            if (!empty($this->request->getData('other_skills'))) {
                $otherSkills = explode(',', $this->request->getData('other_skills'));
                foreach ($otherSkills as $otherSkillName) {
                    $otherSkillName = trim($otherSkillName); // Trim whitespace
                    if (!empty($otherSkillName)) { // Check if the skill is not empty
                        // Validate if the skill name is alphabetic
                        if (!preg_match('/^[a-zA-Z]+$/', $otherSkillName)) {
                            $invalidSkills[] = $otherSkillName; // Add to invalid skills if not alphabetic
                            continue; // Skip this iteration if invalid
                        }

                        $existingSkill = $this->Contractors->Skills->findByName($otherSkillName)->first();

                        if ($existingSkill) {
                            // If the skill exists, add it to the contractor
                            $skillsEntities[] = $existingSkill;
                        } else {
                            // If it doesn't exist, create a new skill entity
                            $newSkill = $this->Contractors->Skills->newEmptyEntity();
                            $newSkill->name = $otherSkillName;
                            if ($this->Contractors->Skills->save($newSkill)) {
                                $skillsEntities[] = $newSkill; // Add new skill to the array
                            }
                        }
                    }
                }
            }



            // Display an error if any invalid skills were found
            if (!empty($invalidSkills)) {
                $this->Flash->error(__('Invalid skill names: ') . implode(', ', $invalidSkills) . '. Only alphabetic skills are allowed.');
            } else{
                // Assign valid skills to the contractor
                $contractor->skills = $skillsEntities;
            }

            // Save the contractor with valid skills
            if ($this->Contractors->save($contractor)) {
                $this->Flash->success(__('The contractor has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The contractor could not be saved. Please, try again.'));

        }

        $skills = $this->Contractors->Skills->find('list', limit: 200)->all();
        $this->set(compact('contractor', 'skills'));
    }


    /**
     * Edit method
     *
     * @param string|null $id Contractor id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $contractor = $this->Contractors->get($id, contain: ['Skills']);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $contractor = $this->Contractors->patchEntity($contractor, $this->request->getData());

            // Initialize an array to hold valid skill entities
            $skillsEntities = [];
            $invalidSkills = []; // Collect any invalid skill names for feedback

            // Handle existing skills selected from the multi-select
            if (!empty($this->request->getData('skills._ids'))) {
                $existingSkills = $this->Contractors->Skills->find()
                    ->where(['id IN' => $this->request->getData('skills._ids')])
                    ->all();
                $skillsEntities = $existingSkills->toArray();
            }

            // Process 'other_skills' if provided as a comma-separated string
            if (!empty($this->request->getData('other_skills'))) {
                $otherSkills = explode(',', $this->request->getData('other_skills'));
                foreach ($otherSkills as $otherSkillName) {
                    $otherSkillName = trim($otherSkillName); // Trim whitespace
                    if (!empty($otherSkillName)) { // Check if the skill is not empty
                        // Validate if the skill name is alphabetic
                        if (!preg_match('/^[a-zA-Z]+$/', $otherSkillName)) {
                            $invalidSkills[] = $otherSkillName; // Add to invalid skills if not alphabetic
                            continue; // Skip this iteration if invalid
                        }

                        $existingSkill = $this->Contractors->Skills->findByName($otherSkillName)->first();

                        if ($existingSkill) {
                            // If the skill exists, add it to the contractor
                            $skillsEntities[] = $existingSkill;
                        } else {
                            // If it doesn't exist, create a new skill entity
                            $newSkill = $this->Contractors->Skills->newEmptyEntity();
                            $newSkill->name = $otherSkillName;
                            if ($this->Contractors->Skills->save($newSkill)) {
                                $skillsEntities[] = $newSkill; // Add new skill to the array
                            }
                        }
                    }
                }
            }

            // Display an error if any invalid skills were found
            if (!empty($invalidSkills)) {
                $this->Flash->error(__('Invalid skill names: ') . implode(', ', $invalidSkills) . '. Only alphabetic skills are allowed.');
            } else{
                // Assign valid skills to the contractor
                $contractor->skills = $skillsEntities;
            }

            if ($this->Contractors->save($contractor)) {
                $this->Flash->success(__('The contractor has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The contractor could not be saved. Please, try again.'));
        }
        $skills = $this->Contractors->Skills->find('list', limit: 200)->all();
        $this->set(compact('contractor', 'skills'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Contractor id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $contractor = $this->Contractors->get($id);
        // Handle null profile picture
       if (empty($contractor->profile_picture) || $contractor->profile_picture == null) {
           $contractor->profile_picture = 'default.png';
       }
        if ($this->Contractors->delete($contractor)) {
            $this->Flash->success(__('The contractor has been deleted.'));
        } else {
            $this->Flash->error(__('The contractor could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }


    /**
     * Add method for public contractor registration
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function addPublic()
{
    $contractor = $this->Contractors->newEmptyEntity();
    if ($this->request->is('post')) {
        $contractor = $this->Contractors->patchEntity($contractor, $this->request->getData());

        // Initialize an array to hold valid skill entities
        $skillsEntities = [];
        $invalidSkills = []; // Collect any invalid skill names for feedback

        // Handle existing skills selected from the multi-select
        if (!empty($this->request->getData('skills._ids'))) {
            $existingSkills = $this->Contractors->Skills->find()
                ->where(['id IN' => $this->request->getData('skills._ids')])
                ->all();
            $skillsEntities = $existingSkills->toArray();
        }

        // Process 'other_skills' if provided as a comma-separated string
        if (!empty($this->request->getData('other_skills'))) {
            $otherSkills = explode(',', $this->request->getData('other_skills'));
            foreach ($otherSkills as $otherSkillName) {
                $otherSkillName = trim($otherSkillName); // Trim whitespace
                if (!empty($otherSkillName)) {
                    // Validate if the skill name is alphabetic
                    if (!preg_match('/^[a-zA-Z]+$/', $otherSkillName)) {
                        $invalidSkills[] = $otherSkillName;
                        continue;
                    }

                    $existingSkill = $this->Contractors->Skills->findByName($otherSkillName)->first();

                    if ($existingSkill) {
                        $skillsEntities[] = $existingSkill;
                    } else {
                        $newSkill = $this->Contractors->Skills->newEmptyEntity();
                        $newSkill->name = $otherSkillName;
                        if ($this->Contractors->Skills->save($newSkill)) {
                            $skillsEntities[] = $newSkill;
                        }
                    }
                }
            }
        }

        if (!empty($invalidSkills)) {
            $this->Flash->error(__('Invalid skill names: ') . implode(', ', $invalidSkills) . '. Only alphabetic skills are allowed.');
        } else {
            $contractor->skills = $skillsEntities;
        }

        if ($this->Contractors->save($contractor)) {
            $this->Flash->success(__('The contractor has been saved.'));
            // Stay on the same page after saving
            return $this->redirect(['controller' => 'Contractors', 'action' => 'add_public']);
        } else {
            $this->Flash->error(__('The contractor could not be saved. Please, try again.'));
        }
    }

    $skills = $this->Contractors->Skills->find('list', limit: 200)->all();
    $this->set(compact('contractor', 'skills'));
}



}
