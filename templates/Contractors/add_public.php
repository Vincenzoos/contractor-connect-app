<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Contractor $contractor
 * @var \Cake\Collection\CollectionInterface|string[] $skills
 */
$this->assign('title', 'Contractor Registration');
?>

<div class="container py-5">
    <div class="registration-container mx-auto" style="max-width: 600px;">
        <h1 class="text-center mb-4">Contractor Registration</h1>
        <?= $this->Form->create($contractor, ['url' => ['controller' => 'Contractors', 'action' => 'addPublic'], 'class' => 'p-4 bg-light rounded shadow-sm']) ?>
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
                'pattern' => '^0[1-9]\d{0,2} \d{3} \d{3}$', // Adjusted pattern for flexible length
                'title' => 'Please enter a valid phone number. (e.g., 0452 452 234)',
                'required' => true
            ]); ?>
        </div>
        <div class="mb-3">
            <?= $this->Form->control('skills._ids', [
                'label' => false,
                'empty' => 'Select your skills...',
                'options' => $skills,
                'class' => 'form-select mb-3 js-multi-select',
                'multiple' => true,
            ]); ?>
        </div>
        <div class="mb-3">
            <?= $this->Form->control('other_skills', [
                'label' => false,
                'class' => 'form-control mb-3',
                'placeholder' => 'Enter other skills in comma-separated format (e.g. fullstack, frontend, etc.)'
            ]); ?>
        </div>
        <div class="text-center">
            <?= $this->Form->button(__('Register'), ['class' => 'btn btn-primary w-100']) ?>
        </div>
        <?= $this->Form->end() ?>
    </div>
</div>
