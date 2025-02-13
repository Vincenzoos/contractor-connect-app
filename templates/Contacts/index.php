<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Contact> $contacts
 */
?>
<div class="contacts index content">
    <?= $this->Html->link(__('New Contact'), ['action' => 'add'], ['class' => 'btn btn-primary float-end mb-4']) ?>
    <h3 class="mb-4"><?= __('Contacts') ?></h3>

    <!-- Filter functionality -->
    <div class="contacts search form mb-4 p-4 rounded shadow-sm bg-light">
        <?= $this->Form->create(null, ['type' => 'get', 'class' => 'row g-3']) ?>

            <div class="col-md-4">
                <?= $this->Form->control('first_name', [
                    'label' => 'Contact First Name',
                    'placeholder' => 'First name contains...',
                    'value' => $this->request->getQuery('first_name'),
                    'class' => 'form-control'
                ]) ?>
            </div>
            <div class="col-md-4">
                <?= $this->Form->control('last_name', [
                    'label' => 'Contact Last Name',
                    'placeholder' => 'Last name contains...',
                    'value' => $this->request->getQuery('last_name'),
                    'class' => 'form-control'
                ]) ?>
            </div>
            <div class="col-md-4">
                <?= $this->Form->control('organisation', [
                    'label' => 'Organisation Name',
                    'placeholder' => 'Organisation name contains...',
                    'value' => $this->request->getQuery('organisation'),
                    'class' => 'form-control'
                ]) ?>
            </div>
            <div class="col-md-4">
                <?= $this->Form->control('date_sent', [
                    'label' => 'Date Sent',
                    'type' => 'date',
                    'dateFormat' => 'YMD',
                    'class' => 'form-control'
                ]) ?>
            </div>

        <div class="col-md-2 align-self-end">
            <?= $this->Form->button(__('Search'), ['class' => 'btn btn-primary w-100']) ?>
        </div>
        <?= $this->Form->end() ?>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead class="bg-secondary text-white">
                <tr>
                    <th><?= $this->Paginator->sort('first_name', 'First Name') ?></th>
                    <th><?= $this->Paginator->sort('last_name', 'Last Name') ?></th>
                    <th><?= $this->Paginator->sort('email', 'Email') ?></th>
                    <th><?= $this->Paginator->sort('phone_number', 'Phone Number') ?></th>
                    <th><?= $this->Paginator->sort('replied', 'Replied') ?></th>
                    <th><?= $this->Paginator->sort('date_sent', 'Date Sent') ?></th>
                    <th><?= $this->Paginator->sort('organisation_id', 'Organisation') ?></th>
                    <th><?= $this->Paginator->sort('contractor_id', 'Contractor') ?></th>
                    <th class="text-center"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($contacts as $contact): ?>
                <tr>
                    <td><?= h($contact->first_name) ?></td>
                    <td><?= h($contact->last_name) ?></td>
                    <td><?= $this->Html->link(h($contact->email), 'mailto:' . h($contact->email)) ?></td>
                    <td><?= h($contact->phone_number) ?></td>
                    <td><?= h($contact->reply_status) ?></td>
                    <td><?= h($contact->date_sent->format('d/m/Y')) ?></td>
                    <td><?= $contact->hasValue('organisation') ? $this->Html->link($contact->organisation->name, ['controller' => 'Organisations', 'action' => 'view', $contact->organisation->id]) : '' ?></td>
                    <td><?= $contact->hasValue('contractor') ? $this->Html->link($contact->contractor->full_name, ['controller' => 'Contractors', 'action' => 'view', $contact->contractor->id]) : '' ?></td>
                    <td class="text-center">
                        <div class="d-flex justify-content-center">
                            <?= $this->Html->link(__('View'), ['action' => 'view', $contact->id], ['class' => 'btn btn-sm btn-primary me-2']) ?>
                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $contact->id], ['class' => 'btn btn-sm btn-warning me-2']) ?>
                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $contact->id], ['confirm' => __('Are you sure you want to delete "{0}"?', $contact->full_name), 'class' => 'btn btn-sm btn-danger me-2']) ?>
                        </div>
                    </td>

                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="paginator">
        <ul class="pagination justify-content-center mt-3">
            <?= $this->Paginator->first('<< ' . __('first'), ['class' => 'page-item']) ?>
            <?= $this->Paginator->prev('< ' . __('previous'), ['class' => 'page-item']) ?>
            <?= $this->Paginator->numbers(['class' => 'page-item']) ?>
            <?= $this->Paginator->next(__('next') . ' >', ['class' => 'page-item']) ?>
            <?= $this->Paginator->last(__('last') . ' >>', ['class' => 'page-item']) ?>
        </ul>
        <p class="text-center"><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
