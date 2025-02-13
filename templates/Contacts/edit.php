<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Contact $contact
 * @var string[]|\Cake\Collection\CollectionInterface $organisations
 * @var string[]|\Cake\Collection\CollectionInterface $contractors
 */
?>
<div class="row">
    <aside class="col-md-3">
        <div class="card mb-4 shadow-sm">
            <div class="card-header bg-primary text-white">
                <h4 class="heading"><?= __('Actions') ?></h4>
            </div>
            <div class="list-group list-group-flush">
                <?= $this->Form->postLink(
                    __('Delete'),
                    ['action' => 'delete', $contact->id],
                    [
                        'confirm' => __('Are you sure you want to delete "{0}"?', $contact->full_name),
                        'class' => 'list-group-item list-group-item-action text-danger'
                    ]
                ) ?>
                <?= $this->Html->link(__('List Contacts'), ['action' => 'index'], ['class' => 'list-group-item list-group-item-action']) ?>
            </div>
        </div>
    </aside>

    <div class="col-md-9">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h3><?= __('Edit Contact') ?></h3>
            </div>
            <div class="card-body">
                <?= $this->Form->create($contact) ?>
                <fieldset>
                    <?php
                        echo $this->Form->control('first_name', [
                            'label' => 'First Name',
                            'class' => 'form-control mb-3',
                            'placeholder' => 'Enter first name...'
                        ]);
                        echo $this->Form->control('last_name', [
                            'label' => 'Last Name',
                            'class' => 'form-control mb-3',
                            'placeholder' => 'Enter last name...'
                        ]);
                        echo $this->Form->control('email', [
                            'label' => 'Email',
                            'class' => 'form-control mb-3',
                            'placeholder' => 'Enter email...'
                        ]);
                        echo $this->Form->control('phone_number', [
                            'label' => 'Phone Number',
                            'class' => 'form-control mb-3',
                            'placeholder' => 'Enter phone number...'
                        ]);
                        echo $this->Form->control('message', [
                            'label' => 'Message',
                            'class' => 'form-control mb-3',
                            'placeholder' => 'Enter message...'
                        ]);
                        echo $this->Form->control('replied', [
                            'label' => 'Replied',
                            'class' => 'form-check-input'
                        ]);
                        echo $this->Form->control('date_sent', [
                            'label' => 'Date Sent',
                            'type' => 'date',
                            'class' => 'form-control mb-3',
                        ]);
                        echo $this->Form->control('organisation_id', [
                            'options' => $organisations,
                            'label' => 'Organisation',
                            'empty' => true,
                            'class' => 'form-select mb-3'
                        ]);
                        echo $this->Form->control('contractor_id', [
                            'options' => $contractors,
                            'label' => 'Contractor',
                            'empty' => true,
                            'class' => 'form-select mb-3'
                        ]);
                    ?>
                </fieldset>
                <div class="text-end">
                    <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary']) ?>
                </div>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>
