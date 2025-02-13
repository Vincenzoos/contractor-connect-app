<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Organisation $organisation
 */
?>
<div class="row">
    <aside class="col-md-3">
        <div class="card mb-4 shadow-sm">
            <div class="card-header bg-primary text-white">
                <h4 class="heading"><?= __('Actions') ?></h4>
            </div>
            <div class="list-group list-group-flush">
                <?= $this->Html->link(__('List Organisations'), ['action' => 'index'], ['class' => 'list-group-item list-group-item-action']) ?>
            </div>
        </div>
    </aside>

    <div class="col-md-9">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h3><?= __('Add Organisation') ?></h3>
            </div>
            <div class="card-body">
                <?= $this->Form->create($organisation) ?>
                <fieldset>
                    <legend><?= __('Organisation Details') ?></legend>
                    <?php
                    echo $this->Form->control('name', [
                        'placeholder' => 'Enter company name...',
                        'class' => 'form-control'
                    ]);
                    echo $this->Form->control('contact_first_name', [
                        'placeholder' => 'Enter contact first name...',
                        'class' => 'form-control'
                    ]);
                    echo $this->Form->control('contact_last_name', [
                        'placeholder' => 'Enter contact last name...',
                        'class' => 'form-control'
                    ]);
                    echo $this->Form->control('contact_email', [
                        'type' => 'email',
                        'placeholder' => 'Enter contact email (e.g., abc@example.com)',
                        'class' => 'form-control'
                    ]);
                    echo $this->Form->control('current_website', [
                        'type' => 'url',
                        'placeholder' => 'Enter current website URL (e.g., http://example.com)',
                        'class' => 'form-control'
                    ]);
                    echo $this->Form->control('industry', [
                        'placeholder' => 'Enter industry type...',
                        'class' => 'form-control'
                    ]);
                    echo $this->Form->control('description', [
                        'placeholder' => 'Enter description of the company...',
                        'class' => 'form-control'
                    ]);
                    ?>
                </fieldset>
                <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary']) ?>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>
