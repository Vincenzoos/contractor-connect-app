<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Contact $contact
 */
?>
<div class="row">
    <aside class="col-md-3">
        <div class="card mb-4 shadow-sm">
            <div class="card-header bg-primary text-white">
                <h4 class="heading"><?= __('Actions') ?></h4>
            </div>
            <div class="list-group list-group-flush">
                <?= $this->Html->link(__('Edit Contact'), ['action' => 'edit', $contact->id], ['class' => 'list-group-item list-group-item-action']) ?>
                <?= $this->Form->postLink(__('Delete Contact'), ['action' => 'delete', $contact->id], ['confirm' => __('Are you sure you want to delete "{0}"?', $contact->full_name), 'class' => 'list-group-item list-group-item-action text-danger']) ?>
                <?= $this->Html->link(__('List Contacts'), ['action' => 'index'], ['class' => 'list-group-item list-group-item-action']) ?>
                <?= $this->Html->link(__('New Contact'), ['action' => 'add'], ['class' => 'list-group-item list-group-item-action']) ?>
                <?= $this->Html->link(__('Update Reply Status'), ['action' => 'updateReplyStatus', $contact->id], ['class' => 'list-group-item list-group-item-action']) ?>
            </div>
        </div>
    </aside>

    <div class="col-md-9">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h3><?= h($contact->full_name) ?></h3>
            </div>
            <div class="card-body">
                <table class="table table-striped mb-4">
                    <tr>
                        <th><?= __('First Name') ?></th>
                        <td><?= h($contact->first_name) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Last Name') ?></th>
                        <td><?= h($contact->last_name) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Email') ?></th>
                        <td><?= $this->Html->link(h($contact->email), 'mailto:' . h($contact->email)) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Phone Number') ?></th>
                        <td><?= h($contact->phone_number) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Organisation') ?></th>
                        <td><?= $contact->hasValue('organisation') ? $this->Html->link($contact->organisation->name, ['controller' => 'Organisations', 'action' => 'view', $contact->organisation->id]) : '' ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Contractor') ?></th>
                        <td><?= $contact->hasValue('contractor') ? $this->Html->link($contact->contractor->full_name, ['controller' => 'Contractors', 'action' => 'view', $contact->contractor->id]) : '' ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Date Sent') ?></th>
                        <td><?= h($contact->date_sent->format('d/m/Y')) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Replied') ?></th>
                        <td><?= $contact->replied ? __('Yes') : __('No'); ?></td>
                    </tr>
                </table>
                <div class="text">
                    <strong><?= __('Message') ?></strong>
                    <blockquote>
                        <?= $this->Text->autoParagraph(h($contact->message)); ?>
                    </blockquote>
                </div>
            </div>
        </div>
    </div>
</div>
