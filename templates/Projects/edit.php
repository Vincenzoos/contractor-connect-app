<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Project $project
 * @var string[]|\Cake\Collection\CollectionInterface $organisations
 * @var string[]|\Cake\Collection\CollectionInterface $contractors
 * @var string[]|\Cake\Collection\CollectionInterface $skills
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
                    ['action' => 'delete', $project->id],
                    [
                        'confirm' => __('Are you sure you want to delete "{0}"?', $project->name),
                        'class' => 'list-group-item list-group-item-action text-danger'
                    ]
                ) ?>
                <?= $this->Html->link(__('List Projects'), ['action' => 'index'], ['class' => 'list-group-item list-group-item-action']) ?>
            </div>
        </div>
    </aside>

    <div class="col-md-9">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h3><?= __('Edit Project') ?></h3>
            </div>
            <div class="card-body">
                <?= $this->Form->create($project) ?>
                <fieldset>
                    <?php
                        echo $this->Form->control('name', [
                            'label' => 'Project Name',
                            'class' => 'form-control mb-3',
                            'placeholder' => 'Enter project name...'
                        ]);

                        echo $this->Form->control('description', [
                            'label' => 'Description',
                            'class' => 'form-control mb-3',
                            'placeholder' => 'Enter project description...'
                        ]);

                        echo $this->Form->control('deadline', [
                            'label' => 'Deadline',
                            'class' => 'form-control mb-3'
                        ]);

                        echo $this->Form->control('management_tool_link', [
                            'label' => 'Management Tool Link',
                            'type' => 'url',
                            'class' => 'form-control mb-3',
                            'placeholder' => 'Enter management tool link (e.g., http://example.com)'
                        ]);

                        echo $this->Form->control('last_checked_date', [
                            'type' => 'hidden',
                        ]);

                        echo $this->Form->control('is_completed', [
                            'label' => 'Status',
                            'options' => [1 => 'Completed', 0 => 'In Progress'],
                            'class' => 'form-select mb-3'
                        ]);

                        echo $this->Form->control('organisation_id', [
                            'label' => 'Organisation',
                            'options' => $organisations,
                            'class' => 'form-select mb-3'
                        ]);

                        echo $this->Form->control('contractor_id', [
                            'label' => 'Contractor',
                            'options' => $contractors,
                            'empty' => true,
                            'class' => 'form-select mb-3'
                        ]);

                        echo $this->Form->control('skills._ids', [
                            'label' => 'Skills',
                            'options' => $skills,
                            'class' => 'js-multi-select mb-3'
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
