<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();
        // Load Authentication component: Already have this in AppsController
//        $this->loadComponent('Authentication.Authentication');
        $this->Authentication->allowUnauthenticated(['login']);
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->redirect(['controller' => 'Projects', 'action' => 'index']);
        $query = $this->Users->find();
        $users = $this->paginate($query);

        $this->set(compact('users'));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->redirect(['controller' => 'Projects', 'action' => 'index']);
        $user = $this->Users->get($id, contain: []);
        $this->set(compact('user'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->redirect(['controller' => 'Projects', 'action' => 'index']);
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->redirect(['controller' => 'Projects', 'action' => 'index']);
        $user = $this->Users->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->redirect(['controller' => 'Projects', 'action' => 'index']);
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    /**
     * Login method
     *
     */
    public function login()
    {
        // Check if the user is already logged in
        $result = $this->Authentication->getResult();

        // If the user is logged in, redirect them
        if ($result && $result->isValid()) {
            // Redirect to the desired page after successful login
            return $this->redirect(['controller' => 'Projects', 'action' => 'index']);
        }

        // If this is a POST request, handle login attempt
        if ($this->request->is('post')) {
            if ($result->isValid()) {
                // Redirect on successful login
                return $this->redirect($this->Authentication->getLoginRedirect() ?? ['controller' => 'Projects', 'action' => 'index']);
            } else {
                // Display error message if login failed
                $this->Flash->error(__('Invalid username or password, try again.'));
            }
        }
    }

    /**
     * Logout method
     *
     */
    public function logout()
    {
//        $result = $this->Authentication->getResult();
//        if ($result && $result->isValid()) {

        // Logout so dont need to check for valid because it already been check when log in
        $this->Authentication->logout();
        $this->getRequest()->getSession()->destroy();
        return $this->redirect(['controller' => 'Users', 'action' => 'login']);
    }
}
