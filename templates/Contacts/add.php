<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Contact $contact
 * @var \Cake\Collection\CollectionInterface|string[] $organisations
 * @var \Cake\Collection\CollectionInterface|string[] $contractors
 */
?>
<div class="row">
    <aside class="col-md-3">
        <div class="card mb-4 shadow-sm">
            <div class="card-header bg-primary text-white">
                <h4 class="heading"><?= __('Actions') ?></h4>
            </div>
            <div class="list-group list-group-flush">
                <?= $this->Html->link(__('List Contacts'), ['action' => 'index'], ['class' => 'list-group-item list-group-item-action']) ?>
            </div>
        </div>
    </aside>
    <div class="col-md-9">
        <div class="contacts form content">
            <?= $this->Form->create($contact) ?>
            <fieldset>
                <legend><?= __('Add Contact') ?></legend>
                <?php
                    echo $this->Form->control('first_name', [
                        'label' => 'First Name',
                        'class' => 'form-control mb-3',
                        'placeholder' => 'Enter your first name...'
                    ]);
                    echo $this->Form->control('last_name', [
                        'label' => 'Last Name',
                        'class' => 'form-control mb-3',
                        'placeholder' => 'Enter your last name...'
                    ]);
                    echo $this->Form->control('email', [
                        'label' => 'Email',
                        'class' => 'form-control mb-3',
                        'placeholder' => 'Enter your email (e.g., abc@example.com)'
                    ]);
                    echo $this->Form->control('phone_number', [
                        'label' => 'Phone Number',
                        'class' => 'form-control mb-3',
                        'placeholder' => 'Enter your phone number (e.g., 0452 452 234)',
                        'pattern' => '^0[1-9]\d{0,2} \d{3} \d{3}$', // Adjusted pattern for valid australian phone
                        'title' => 'Please enter a valid phone number. (e.g., 0452 452 234)'
                    ]);
                    echo $this->Form->control('message', [
                        'label' => 'Message',
                        'class' => 'form-control mb-3',
                        'placeholder' => 'Enter your message'
                    ]);
                    echo $this->Form->control('replied', [
                        'label' => 'Replied',
                        'class' => 'form-check-input'
                    ]);
                    echo $this->Form->control('date_sent', [
                        'label' => 'Date Sent',
                        'type' => 'date',
                        'class' => 'form-control mb-3',
                        'empty' => true
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
