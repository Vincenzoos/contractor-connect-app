<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Contact $contact
 */
$this->assign('title', 'Contact Us');
?>

<div class="container py-5">
    <div class="contact-us-container mx-auto" style="max-width: 600px;">
        <h1 class="text-center mb-4">Contact Us</h1>
        <?= $this->Form->create($contact, ['url' => ['controller' => 'Contacts', 'action' => 'addPublic'], 'class' => 'p-4 bg-light rounded shadow-sm']) ?>
        <div class="mb-3">
            <?= $this->Form->control('first_name', [
                'class' => 'form-control',
                'label' => false,
                'placeholder' => 'Enter your first name...',
                'required' => true
            ]); ?>
        </div>
        <div class="mb-3">
            <?= $this->Form->control('last_name', [
                'class' => 'form-control',
                'label' => false,
                'placeholder' => 'Enter your last name...',
                'required' => true
            ]); ?>
        </div>
        <div class="mb-3">
            <?= $this->Form->control('email', [
                'class' => 'form-control',
                'label' => false,
                'placeholder' => 'Enter your email (e.g., abc@example.com)',
                'type' => 'email',
                'required' => true
            ]); ?>
        </div>
        <div class="mb-3">
            <?= $this->Form->control('phone_number', [
                'class' => 'form-control',
                'label' => false,
                'placeholder' => 'Enter your phone number (e.g., 0452 452 234)',
                'type' => 'tel',
                'pattern' => '^0[1-9]\d{0,2} \d{3} \d{3}$', // Allows for a flexible phone number length
                'title' => 'Please enter a valid phone number. (e.g., 0452 452 234)',
                'required' => true
            ]); ?>
        </div>
        <div class="mb-3">
            <?= $this->Form->control('message', [
                'class' => 'form-control',
                'label' => false,
                'placeholder' => 'Enter your message',
                'type' => 'textarea',
                'rows' => 5,
                'required' => true
            ]); ?>
        </div>
        <div class="text-center">
            <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary w-100']) ?>
        </div>
        <?= $this->Form->end() ?>
    </div>
</div>
