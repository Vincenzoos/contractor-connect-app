<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Project $project
 */
?>
<div class="row">
    <aside class="col-md-3">
        <div class="card mb-4 shadow-sm">
            <div class="card-header bg-primary text-white">
                <h4 class="heading"><?= __('Actions') ?></h4>
            </div>
            <div class="list-group list-group-flush">
                <?= $this->Html->link(__('Edit Project'), ['action' => 'edit', $project->id], ['class' => 'list-group-item list-group-item-action']) ?>
                <?= $this->Form->postLink(__('Delete Project'), ['action' => 'delete', $project->id], [
                    'confirm' => __('Are you sure you want to delete project: "{0}"?', $project->name),
                    'class' => 'list-group-item list-group-item-action text-danger'
                ]) ?>
                <?= $this->Html->link(__('List Projects'), ['action' => 'index'], ['class' => 'list-group-item list-group-item-action']) ?>
                <?= $this->Html->link(__('New Project'), ['action' => 'add'], ['class' => 'list-group-item list-group-item-action']) ?>
                <?= $this->Html->link(__('Switch Status'), ['action' => 'switchStatus', $project->id], ['class' => 'list-group-item list-group-item-action']) ?>
                <?= $this->Html->link(__('Update Check Date'), ['action' => 'updateLastCheckedDate', $project->id], ['class' => 'list-group-item list-group-item-action']) ?>
            </div>
        </div>
    </aside>

    <div class="col-md-9">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h3><?= h($project->name) ?></h3>
            </div>
            <div class="card-body">
                <table class="table table-striped mb-4">
                    <tr>
                        <th><?= __('Name') ?></th>
                        <td><?= h($project->name) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Management Tool Link') ?></th>
                        <td><?= $this->Html->link(h($project->management_tool_link), $project->management_tool_link, ['target' => '_blank']) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Organisation') ?></th>
                        <td><?= $project->hasValue('organisation') ? $this->Html->link($project->organisation->name, ['controller' => 'Organisations', 'action' => 'view', $project->organisation->id]) : '' ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Contractor') ?></th>
                        <td><?= $project->hasValue('contractor') ? $this->Html->link($project->contractor->full_name, ['controller' => 'Contractors', 'action' => 'view', $project->contractor->id]) : '' ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Deadline') ?></th>
                        <td><?= h($project->deadline->format('d/m/Y')) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Last Checked Date') ?></th>
                        <td><?= h($project->last_checked_date->format('d/m/Y')) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Status') ?></th>
                        <td><?= h($project->completion_status) ?></td>
                    </tr>
                </table>
                <div class="text">
                    <strong><?= __('Description') ?></strong>
                    <blockquote>
                        <?= $this->Text->autoParagraph(h($project->description)); ?>
                    </blockquote>
                </div>
                <div class="related">
                    <h4 class="text-primary"><?= __('Related Skills') ?></h4>
                    <?php if (!empty($project->skills)) : ?>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tr>
                                <th><?= __('Name') ?></th>
                                <th class="actions"><?= __('Actions') ?></th>
                            </tr>
                            <?php foreach ($project->skills as $skill) : ?>
                            <tr>
                                <td><?= h($skill->name) ?></td>
                                <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'Skills', 'action' => 'view', $skill->id], ['class' => 'btn btn-outline-primary btn-sm']) ?>
                                    <?= $this->Html->link(__('Edit'), ['controller' => 'Skills', 'action' => 'edit', $skill->id], ['class' => 'btn btn-outline-secondary btn-sm']) ?>
                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Skills', 'action' => 'delete', $skill->id], [
                                        'confirm' => __('Are you sure you want to delete skill: "{0}"?', $skill->name),
                                        'class' => 'btn btn-outline-danger btn-sm'
                                    ]) ?>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </table>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
