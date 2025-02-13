<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Organisations Controller
 *
 * @property \App\Model\Table\OrganisationsTable $Organisations
 */
class OrganisationsController extends AppController
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
        $query = $this->Organisations->find()->orderBy(['Organisations.name ASC']);

        // Get the query parameters
        $name = $this->request->getQuery('name');
        $no_projects = $this->request->getQuery('no_projects');

        // Filter organisations by name (partial match)
        if (!empty($name)) {
            $query->where(['Organisations.name LIKE' => '%' .$name. '%']);
        }

        // Filter organisations by number of projects (exact match)
        if (is_numeric($no_projects)) {
            $query->leftJoinWith('Projects')
                ->groupBy(['Organisations.id'])
                ->having(['COUNT(Projects.id)  =' => (int)$no_projects]);
        }

        $organisations = $this->paginate($query);

        $this->set(compact('organisations'));
    }

    /**
     * View method
     *
     * @param string|null $id Organisation id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $organisation = $this->Organisations->get($id, contain: ['Contacts', 'Projects']);
        $this->set(compact('organisation'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $organisation = $this->Organisations->newEmptyEntity();
        if ($this->request->is('post')) {
            $organisation = $this->Organisations->patchEntity($organisation, $this->request->getData());
            if ($this->Organisations->save($organisation)) {
                $this->Flash->success(__('The organisation has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The organisation could not be saved. Please, try again.'));
        }
        $this->set(compact('organisation'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Organisation id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $organisation = $this->Organisations->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $organisation = $this->Organisations->patchEntity($organisation, $this->request->getData());
            if ($this->Organisations->save($organisation)) {
                $this->Flash->success(__('The organisation has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The organisation could not be saved. Please, try again.'));
        }
        $this->set(compact('organisation'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Organisation id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $organisation = $this->Organisations->get($id);
        if ($this->Organisations->delete($organisation)) {
            $this->Flash->success(__('The organisation has been deleted.'));
        } else {
            $this->Flash->error(__('The organisation could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    /**
     * Add method for public registration of organisation
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function addPublic()
{
    $organisation = $this->Organisations->newEmptyEntity();
    if ($this->request->is('post')) {
        $organisation = $this->Organisations->patchEntity($organisation, $this->request->getData());
        if ($this->Organisations->save($organisation)) {
            $this->Flash->success(__('The organisation has been saved.'));
            return $this->redirect(['controller' => 'Organisations', 'action' => 'add_public']);
        } else {
            $this->Flash->error(__('The organisation could not be saved. Please, try again.'));
        }
    }
    $this->set(compact('organisation'));
}

}
