<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Organisation $organisation
 */
$this->assign('title', 'Organisation Registration');
?>

<div class="container py-5">
    <div class="registration-container mx-auto" style="max-width: 600px;">
        <h1 class="text-center mb-4">Register Organisation</h1>
        <?= $this->Form->create($organisation, [
            'url' => ['controller' => 'Organisations', 'action' => 'addPublic'],
            'class' => 'p-4 bg-light rounded shadow-sm'
        ]) ?>

        <div class="mb-3">
            <?= $this->Form->control('name', [
                'class' => 'form-control',
                'label' => false,
                'placeholder' => 'Enter company name...',
                'required' => true
            ]); ?>
        </div>

        <div class="mb-3">
            <?= $this->Form->control('contact_first_name', [
                'class' => 'form-control',
                'label' => false,
                'placeholder' => 'Enter contact first name...',
                'required' => true
            ]); ?>
        </div>

        <div class="mb-3">
            <?= $this->Form->control('contact_last_name', [
                'class' => 'form-control',
                'label' => false,
                'placeholder' => 'Enter contact last name...',
                'required' => true
            ]); ?>
        </div>

        <div class="mb-3">
            <?= $this->Form->control('contact_email', [
                'class' => 'form-control',
                'label' => false,
                'placeholder' => 'Enter contact email (e.g., abc@example.com)',
                'type' => 'email',
                'required' => true
            ]); ?>
        </div>

        <div class="mb-3">
            <?= $this->Form->control('current_website', [
                'class' => 'form-control',
                'label' => false,
                'type' => 'url',
                'placeholder' => 'Enter current website URL (e.g., http://example.com)'
            ]); ?>
        </div>

        <div class="mb-3">
            <?= $this->Form->control('industry', [
                'class' => 'form-control',
                'label' => false,
                'placeholder' => 'Enter industry type...',
                'required' => true
            ]); ?>
        </div>

        <div class="mb-3">
            <?= $this->Form->control('description', [
                'class' => 'form-control',
                'label' => false,
                'placeholder' => 'Enter description of the company...',
                'type' => 'textarea',
                'rows' => 5
            ]); ?>
        </div>

        <div class="text-center">
            <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary w-100']) ?>
        </div>

        <?= $this->Form->end() ?>
    </div>
</div>
