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
                <?= $this->Form->postLink(
                    __('Delete Organisation'),
                    ['action' => 'delete', $organisation->id],
                    [
                        'confirm' => __('Are you sure you want to delete "{0}"?', $organisation->name),
                        'class' => 'list-group-item list-group-item-action text-danger'
                    ]
                ) ?>
                <?= $this->Html->link(__('List Organisations'), ['action' => 'index'], ['class' => 'list-group-item list-group-item-action']) ?>
            </div>
        </div>
    </aside>

    <div class="col-md-9">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h3><?= __('Edit Organisation') ?></h3>
            </div>
            <div class="card-body">
                <?= $this->Form->create($organisation) ?>
                <fieldset>
                    <?php
                        echo $this->Form->control('name', [
                            'label' => 'Organisation Name',
                            'class' => 'form-control mb-3',
                            'placeholder' => 'Enter company name...'
                        ]);
                        echo $this->Form->control('contact_first_name', [
                            'label' => 'Contact First Name',
                            'class' => 'form-control mb-3',
                            'placeholder' => 'Enter contact first name...'
                        ]);
                        echo $this->Form->control('contact_last_name', [
                            'label' => 'Contact Last Name',
                            'class' => 'form-control mb-3',
                            'placeholder' => 'Enter contact last name...'
                        ]);
                        echo $this->Form->control('contact_email', [
                            'type' => 'email',
                            'label' => 'Contact Email',
                            'class' => 'form-control mb-3',
                            'placeholder' => 'Enter contact email (e.g., abc@example.com)'
                        ]);
                        echo $this->Form->control('current_website', [
                            'label' => 'Current Website',
                            'type' => 'url',
                            'class' => 'form-control mb-3',
                            'placeholder' => 'Enter current website URL (e.g., http://example.com)'
                        ]);
                        echo $this->Form->control('industry', [
                            'label' => 'Industry',
                            'class' => 'form-control mb-3',
                            'placeholder' => 'Enter industry type...'
                        ]);
                        echo $this->Form->control('description', [
                            'label' => 'Description',
                            'class' => 'form-control mb-3',
                            'placeholder' => 'Enter description of the company...'
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
