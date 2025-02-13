<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Contacts Controller
 *
 * @property \App\Model\Table\ContactsTable $Contacts
 */
class ContactsController extends AppController
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
        $query = $this->Contacts->find()
            ->contain(['Organisations', 'Contractors'])->orderBy(['Contacts.date_sent DESC']);

        // Get the query parameters
        $first_name = $this->request->getQuery('first_name');
        $last_name = $this->request->getQuery('last_name');
        $organisation = $this->request->getQuery('organisation');
        $date_sent = $this->request->getQuery('date_sent');
        $replyStatus = $this->request->getQuery('reply_status');

        // Filter Contacts by firstname (partial match)
        if (!empty($first_name)) {
            $query->where(['Contacts.first_name LIKE' => '%' .$first_name. '%']);
        }

        // Filter Contacts by lastname (partial match)
        if (!empty($last_name)) {
            $query->where(['Contacts.last_name LIKE' => '%' .$last_name. '%']);
        }

        // Filter Contacts by organisation name (partial match)
        if (!empty($organisation)) {
            $query->matching('Organisations')
                ->where(['Organisations.name LIKE' => '%' .$organisation. '%']);
        }

        // Filter contacts by from date_sent onwards
        if (!empty($date_sent)) {
            // Filter by start date only
            $query->where(['Contacts.date_sent >=' => $date_sent]);
        }

        // Filter Contacts by reply status (exact match)
        if ($replyStatus !== null && $replyStatus !== '') {
            $query->where(['Contacts.replied' => $replyStatus]);
        }



        $contacts = $this->paginate($query);

        $this->set(compact('contacts'));
    }

    /**
     * View method
     *
     * @param string|null $id Contact id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $contact = $this->Contacts->get($id, contain: ['Organisations', 'Contractors']);
        $this->set(compact('contact'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $contact = $this->Contacts->newEmptyEntity();
        if ($this->request->is('post')) {
            $contact = $this->Contacts->patchEntity($contact, $this->request->getData());
            if(empty($contact->date_sent)){
                $contact->date_sent = date('Y-m-d');
            }
            if ($this->Contacts->save($contact)) {
                $this->Flash->success(__('The contact has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The contact could not be saved. Please, try again.'));
        }
        $organisations = $this->Contacts->Organisations->find('list', limit: 200)->all();
        $contractors = $this->Contacts->Contractors->find('list', limit: 200)->all();
        $this->set(compact('contact', 'organisations', 'contractors'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Contact id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $contact = $this->Contacts->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $contact = $this->Contacts->patchEntity($contact, $this->request->getData());
            if ($this->Contacts->save($contact)) {
                $this->Flash->success(__('The contact has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The contact could not be saved. Please, try again.'));
        }
        $organisations = $this->Contacts->Organisations->find('list', limit: 200)->all();
        $contractors = $this->Contacts->Contractors->find('list', limit: 200)->all();
        $this->set(compact('contact', 'organisations', 'contractors'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Contact id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $contact = $this->Contacts->get($id);
        if ($this->Contacts->delete($contact)) {
            $this->Flash->success(__('The contact has been deleted.'));
        } else {
            $this->Flash->error(__('The contact could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function updateReplyStatus($id = null)
    {
        // Find project record with specific id
        $contact = $this->Contacts->get($id);

        // Flip the status
        $contact->replied = !$contact->replied;

        // Save changes
        if ($this->Contacts->save($contact)) {
            $this->Flash->success(__('The contact reply status has been updated.'));
        } else{
            $this->Flash->error(__('The contact reply status could not be updated. Please, try again.'));
        }

        //
        return $this->redirect(['action' => 'view', $contact->id]);
    }

    /**
     * Add method for public page
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function addPublic()
{
    $contact = $this->Contacts->newEmptyEntity();
    if ($this->request->is('post')) {
        $contact = $this->Contacts->patchEntity($contact, $this->request->getData());

        // Set date_sent to today's date if it isn't provided
        if (empty($contact->date_sent)) {
            $contact->date_sent = date('Y-m-d');
        }

        if ($this->Contacts->save($contact)) {
            $this->Flash->success(__('Your contact has been saved.'));
            return $this->redirect(['controller' => 'Contacts', 'action' => 'add_public']);
        } else {
            $this->Flash->error(__('Unable to add your contact.'));
        }
    }
    $this->set(compact('contact'));
}


}
