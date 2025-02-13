<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Project> $projects
 * @var \Cake\Collection\CollectionInterface|string[] $skillsList
 */
?>
<div class="projects index content">
    <?= $this->Html->link(__('New Project'), ['action' => 'add'], ['class' => 'btn btn-primary float-end mb-4']) ?>
    <h3 class="mb-4"><?= __('Projects') ?></h3>

    <!-- Filter Form -->
    <div class="projects search form mb-4 p-4 rounded shadow-sm bg-light">
        <?= $this->Form->create(null, ['type' => 'get', 'class' => 'row g-3']) ?>

        <!-- Skills Keyword Field -->
        <div class="col-md-4">
            <?= $this->Form->control('skills', [
                'label' => 'Skills keyword',
                'placeholder' => 'Skills contains...',
                'value' => $this->request->getQuery('skills'),
                'class' => 'form-control'
            ]) ?>
        </div>

        <!-- Status Field -->
        <div class="col-md-4">
            <?= $this->Form->control('is_completed', [
                'label' => 'Status',
                'options' => [1 => 'Done', 0 => 'In Progress'],
                'empty' => '-- Not selected --',
                'value' => $this->request->getQuery('is_completed'),
                'class' => 'form-select'
            ]) ?>
        </div>

        <!-- Start Date Field -->
        <div class="col-md-4">
            <?= $this->Form->control('start_date', [
                'label' => 'Start date',
                'type' => 'date',
                'dateFormat' => 'YMD',
                'class' => 'form-control'
            ]) ?>
        </div>

        <!-- End Date Field -->
        <div class="col-md-4">
            <?= $this->Form->control('end_date', [
                'label' => 'End date',
                'type' => 'date',
                'dateFormat' => 'YMD',
                'class' => 'form-control'
            ]) ?>
        </div>

        <!-- Skills Field -->
        <div class="col-md-6">
            <?= $this->Form->control('skills_ids', [
                'label' => 'Skills',
                'class' => 'js-multi-select form-select',
                'options' => $skillsList,
                'multiple' => true,
                'value' => $this->request->getQuery('skills_ids'),
            ]) ?>
        </div>

        <!-- Search Button -->
        <div class="col-md-2 align-self-end">
            <?= $this->Form->button(__('Search'), ['class' => 'btn btn-primary w-100']) ?>
        </div>

        <?= $this->Form->end() ?>
    </div>

    <!-- Table of Projects -->
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead class="bg-secondary text-white">
                <tr>
                    <th><?= $this->Paginator->sort('name', 'Project Name') ?></th>
                    <th><?= $this->Paginator->sort('deadline', 'Deadline') ?></th>
                    <th><?= $this->Paginator->sort('management_tool_link', 'Management Tool Link') ?></th>
                    <th><?= $this->Paginator->sort('last_checked_date', 'Last Checked Date') ?></th>
                    <th><?= $this->Paginator->sort('project_status', 'Status') ?></th>
                    <th><?= $this->Paginator->sort('organisation_id', 'Organisation') ?></th>
                    <th><?= $this->Paginator->sort('contractor_id', 'Contractor') ?></th>
                    <th class="text-center"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($projects as $project): ?>
                <tr>
                    <td><?= h($project->name) ?></td>
                    <td><?= h($project->deadline->format('d/m/Y')) ?></td>
                    <td><?= $this->Html->link(h($project->management_tool_link), $project->management_tool_link, ['target' => '_blank']) ?></td>
                    <td><?= h($project->last_checked_date->format('d/m/Y')) ?></td>
                    <td><?= h($project->completion_status) ?></td>
                    <td><?= $project->hasValue('organisation') ? $this->Html->link($project->organisation->name, ['controller' => 'Organisations', 'action' => 'view', $project->organisation->id]) : '' ?></td>
                    <td><?= $project->hasValue('contractor') ? $this->Html->link($project->contractor->full_name, ['controller' => 'Contractors', 'action' => 'view', $project->contractor->id]) : '' ?></td>
                    <td class="text-center">
                        <div class="d-flex justify-content-center">
                            <?= $this->Html->link(__('View'), ['action' => 'view', $project->id], ['class' => 'btn btn-sm btn-primary me-2']) ?>
                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $project->id], ['class' => 'btn btn-sm btn-warning me-2']) ?>
                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $project->id], ['confirm' => __('Are you sure you want to delete "{0}"?', $project->name), 'class' => 'btn btn-sm btn-danger']) ?>
                        </div>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="paginator">
        <ul class="pagination justify-content-center mt-3">
            <?= $this->Paginator->first('<< ' . __('first'), ['class' => 'page-item']) ?>
            <?= $this->Paginator->prev('< ' . __('previous'), ['class' => 'page-item']) ?>
            <?= $this->Paginator->numbers(['class' => 'page-item']) ?>
            <?= $this->Paginator->next(__('next') . ' >', ['class' => 'page-item']) ?>
            <?= $this->Paginator->last(__('last') . ' >>', ['class' => 'page-item']) ?>
        </ul>
        <p class="text-center"><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
