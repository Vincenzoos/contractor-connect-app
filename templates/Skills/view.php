<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Skill $skill
 */
?>
<div class="row">
    <aside class="col-md-3">
        <div class="card mb-4 shadow-sm">
            <div class="card-header bg-primary text-white">
                <h4 class="heading"><?= __('Actions') ?></h4>
            </div>
            <div class="list-group list-group-flush">
                <?= $this->Html->link(__('Edit Skill'), ['action' => 'edit', $skill->id], ['class' => 'list-group-item list-group-item-action']) ?>
                <?= $this->Form->postLink(__('Delete Skill'), ['action' => 'delete', $skill->id], ['confirm' => __('Are you sure you want to delete # {0}?', $skill->id), 'class' => 'list-group-item list-group-item-action text-danger']) ?>
                <?= $this->Html->link(__('List Skills'), ['action' => 'index'], ['class' => 'list-group-item list-group-item-action']) ?>
                <?= $this->Html->link(__('New Skill'), ['action' => 'add'], ['class' => 'list-group-item list-group-item-action']) ?>
            </div>
        </div>
    </aside>
    <div class="col-md-9">
        <div class="skills view content">
            <h3><?= h($skill->name) ?></h3>
            <table class="table table-striped mb-4">
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($skill->id) ?></td>
                </tr>
            </table>
            <div class="text mb-4">
                <strong><?= __('Name') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($skill->name)); ?>
                </blockquote>
            </div>
            <div class="related mb-4">
                <h4><?= __('Related Contractors') ?></h4>
                <?php if (!empty($skill->contractors)) : ?>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('First Name') ?></th>
                            <th><?= __('Last Name') ?></th>
                            <th><?= __('Email') ?></th>
                            <th><?= __('Phone Number') ?></th>
                            <th><?= __('Profile Picture') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($skill->contractors as $contractor) : ?>
                        <tr>
                            <td><?= h($contractor->id) ?></td>
                            <td><?= h($contractor->first_name) ?></td>
                            <td><?= h($contractor->last_name) ?></td>
                            <td><?= $this->Html->link(h($contractor->email), 'mailto:'.h($contractor->email)) ?></td>
                            <td><?= $this->Html->image($contractor->profile_picture_path, ['class' => 'img-thumbnail', 'style' => 'max-width: 60px;']) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Contractors', 'action' => 'view', $contractor->id], ['class' => 'btn btn-outline-primary btn-sm']) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Contractors', 'action' => 'edit', $contractor->id], ['class' => 'btn btn-outline-secondary btn-sm']) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Contractors', 'action' => 'delete', $contractor->id], ['confirm' => __('Are you sure you want to delete # {0}?', $contractor->id), 'class' => 'btn btn-outline-danger btn-sm']) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related mb-4">
                <h4><?= __('Related Projects') ?></h4>
                <?php if (!empty($skill->projects)) : ?>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Name') ?></th>
                            <th><?= __('Description') ?></th>
                            <th><?= __('Deadline') ?></th>
                            <th><?= __('Management Tool Link') ?></th>
                            <th><?= __('Last Checked Date') ?></th>
                            <th><?= __('Is Completed') ?></th>
                            <th><?= __('Organisation Id') ?></th>
                            <th><?= __('Contractor Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($skill->projects as $project) : ?>
                        <tr>
                            <td><?= h($project->id) ?></td>
                            <td><?= h($project->name) ?></td>
                            <td><?= h($project->description) ?></td>
                            <td><?= h($project->deadline->format('d/m/Y')) ?></td>
                            <td><?= $this->Html->link(h($project->management_tool_link), $project->management_tool_link, ['target' => '_blank']) ?></td>
                            <td><?= h($project->last_checked_date->format('d/m/Y')) ?></td>
                            <td><?= h($project->completion_status) ?></td>
                            <td><?= $this->Html->link(h($project->organisation_id), ['controller' => 'Organisations', 'action' => 'view', $project->organisation_id]) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Projects', 'action' => 'view', $project->id], ['class' => 'btn btn-outline-primary btn-sm']) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Projects', 'action' => 'edit', $project->id], ['class' => 'btn btn-outline-secondary btn-sm']) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Projects', 'action' => 'delete', $project->id], ['confirm' => __('Are you sure you want to delete # {0}?', $project->id), 'class' => 'btn btn-outline-danger btn-sm']) ?>
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
