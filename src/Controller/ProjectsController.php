<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\I18n\Date;
use Cake\I18n\FrozenDate;

/**
 * Projects Controller
 *
 * @property \App\Model\Table\ProjectsTable $Projects
 */
class ProjectsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Projects->find()
            ->contain(['Organisations', 'Contractors'])->orderBy(['Projects.deadline ASC, Projects.last_checked_date ASC']);

        // Get the query parameters
        $skillsKeyword = $this->request->getQuery('skills');
        $status = $this->request->getQuery('is_completed');
        $start_date = $this->request->getQuery('start_date');
        $end_date = $this->request->getQuery('end_date');

        // Skills list for dropdown
        $skillsList = $this->Projects->Skills->find('list', limit: 200)->all();

        // Get selected skills (_ids), ensuring it's treated as an array
        $selectedSkills = $this->request->getQuery('skills_ids');

        // Filter project by skills keyword (partial match)
        if (!empty($skillsKeyword)) {
            $query->matching('Skills')
                ->where(['Skills.name LIKE' => '%' . $skillsKeyword . '%']);
        }

        // Filter project by status (exact match)
        if ($status !== null && $status !== '') {
            $query->where(['Projects.is_completed' => $status]);
        }

        // Filter projects by list of skills (exact match)
        if (!empty($selectedSkills) && $selectedSkills !== ['']) {
            $query->matching('Skills')
                ->groupBy(['Projects.id']) // Group by project ID
                ->where(['Skills.id IN' => $selectedSkills]);
        }

        // Filter project by date within range
        if (!empty($start_date) || !empty($end_date)) {
            if (!empty($start_date)) {
                // Filter by start date only
                $query->where(['Projects.deadline >=' => $start_date]);
            }
            if (!empty($end_date)) {
                // Filter by end date only
                $query->where(['Projects.deadline <=' => $end_date]);
            }
        }

        $projects = $this->paginate($query);

        $this->set(compact('projects', 'skillsList'));
    }

    /**
     * View method
     *
     * @param string|null $id Project id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $project = $this->Projects->get($id, contain: ['Organisations', 'Contractors', 'Skills']);
        $this->set(compact('project'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $project = $this->Projects->newEmptyEntity();
        if ($this->request->is('post')) {
            $project = $this->Projects->patchEntity($project, $this->request->getData());

            // Initialize an array to hold valid skill entities
            $skillsEntities = [];
            $invalidSkills = []; // Collect any invalid skill names for feedback

            // Handle existing skills selected from the multi-select
            if (!empty($this->request->getData('skills._ids'))) {
                $existingSkills = $this->Projects->Skills->find()
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

                        $existingSkill = $this->Projects->Skills->findByName($otherSkillName)->first();

                        if ($existingSkill) {
                            // If the skill exists, add it to the contractor
                            $skillsEntities[] = $existingSkill;
                        } else {
                            // If it doesn't exist, create a new skill entity
                            $newSkill = $this->Projects->Skills->newEmptyEntity();
                            $newSkill->name = $otherSkillName;
                            if ($this->Projects->Skills->save($newSkill)) {
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
                $project->skills = $skillsEntities;
            }

            // Set last_checked_date to current date record was added
            $project->last_checked_date = date('Y-m-d');
            if ($this->Projects->save($project)) {
                $this->Flash->success(__('The project has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The project could not be saved. Please, try again.'));
        }
        $organisations = $this->Projects->Organisations->find('list', limit: 200)->all();
        $contractors = $this->Projects->Contractors->find('list', limit: 200)->all();
        $skills = $this->Projects->Skills->find('list', limit: 200)->all();
        $this->set(compact('project', 'organisations', 'contractors', 'skills'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Project id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $project = $this->Projects->get($id, contain: ['Skills']);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $project = $this->Projects->patchEntity($project, $this->request->getData());

            // Initialize an array to hold valid skill entities
            $skillsEntities = [];
            $invalidSkills = []; // Collect any invalid skill names for feedback

            // Handle existing skills selected from the multi-select
            if (!empty($this->request->getData('skills._ids'))) {
                $existingSkills = $this->Projects->Skills->find()
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

                        $existingSkill = $this->Projects->Skills->findByName($otherSkillName)->first();

                        if ($existingSkill) {
                            // If the skill exists, add it to the contractor
                            $skillsEntities[] = $existingSkill;
                        } else {
                            // If it doesn't exist, create a new skill entity
                            $newSkill = $this->Projects->Skills->newEmptyEntity();
                            $newSkill->name = $otherSkillName;
                            if ($this->Projects->Skills->save($newSkill)) {
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
                $project->skills = $skillsEntities;
            }

            // Set last_checked_date to current edit date
            $project->last_checked_date = date('Y-m-d');
            if ($this->Projects->save($project)) {
                $this->Flash->success(__('The project has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The project could not be saved. Please, try again.'));
        }
        $organisations = $this->Projects->Organisations->find('list', limit: 200)->all();
        $contractors = $this->Projects->Contractors->find('list', limit: 200)->all();
        $skills = $this->Projects->Skills->find('list', limit: 200)->all();
        $this->set(compact('project', 'organisations', 'contractors', 'skills'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Project id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $project = $this->Projects->get($id);
        if ($this->Projects->delete($project)) {
            $this->Flash->success(__('The project has been deleted.'));
        } else {
            $this->Flash->error(__('The project could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function switchStatus($id = null)
    {
        // Find project record with specific id
        $project = $this->Projects->get($id);

        // Flip the status
        $project->is_completed = !$project->is_completed;

        // Save changes
        if ($this->Projects->save($project)) {
            $this->Flash->success(__('The project status has been updated.'));
        } else{
            $this->Flash->error(__('The project status could not be updated. Please, try again.'));
        }

        //
        return $this->redirect(['action' => 'view', $project->id]);
    }

    public function updateLastCheckedDate($id = null)
    {
        // Find project record with specific id
        $project = $this->Projects->get($id);

        // Update last check date
        $project->last_checked_date = FrozenDate::today();

        // Save changes
        if ($this->Projects->save($project)) {
            $this->Flash->success(__('The project check up date has been updated.'));
        } else{
            $this->Flash->error(__('The project check up date could not be updated. Please, try again.'));
        }

        //
        return $this->redirect(['action' => 'view', $project->id]);
    }
}
