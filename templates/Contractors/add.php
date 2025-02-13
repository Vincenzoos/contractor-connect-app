<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Contractor $contractor
 * @var \Cake\Collection\CollectionInterface|string[] $skills
 */
?>
<div class="row">
    <aside class="col-md-3">
        <div class="card mb-4 shadow-sm">
            <div class="card-header bg-primary text-white">
                <h4 class="heading"><?= __('Actions') ?></h4>
            </div>
            <div class="list-group list-group-flush">
                <?= $this->Html->link(__('List Contractors'), ['action' => 'index'], ['class' => 'list-group-item list-group-item-action']) ?>
            </div>
        </div>
    </aside>

    <div class="col-md-9">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h3><?= __('Add Contractor') ?></h3>
            </div>
            <div class="card-body">
                <?= $this->Form->create($contractor, ['type' => 'file']) ?>
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
                            'type' => 'email',
                            'label' => 'Email',
                            'class' => 'form-control mb-3',
                            'placeholder' => 'Enter email (e.g., abc@example.com)',
                            'required' => true
                        ]);
                        echo $this->Form->control('phone_number', [
                            'label' => 'Phone Number',
                            'class' => 'form-control mb-3',
                            'placeholder' => 'Enter phone number (e.g., 0456 256 454)',
                            'type' => 'tel',
                            'pattern' => '^0[1-9]\d{0,2} \d{3} \d{3}$', // Adjusted pattern for valid australian phone
                            'title' => 'Please enter a valid phone number. (e.g., 0452 452 234)'
                        ]);
                        echo $this->Form->control('profile_picture', [
                            'type' => 'file',
                            'label' => 'Profile Picture',
                            'class' => 'form-control mb-3'
                        ]);
                        echo $this->Form->control('skills._ids', [
                            'label' => 'Skills',
                            'options' => $skills,
                            'class' => 'form-select mb-3 js-multi-select',
                            'multiple' => true,
                            'style' => 'height: auto'
                        ]);
                        echo $this->Form->control('other_skills', [
                            'label' => 'Other Skills (comma-separated)',
                            'class' => 'form-control mb-3',
                            'placeholder' => 'Enter other skills (e.g. fullstack, frontend, backend, etc.)'
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
