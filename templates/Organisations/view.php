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
                <?= $this->Html->link(__('Edit Organisation'), ['action' => 'edit', $organisation->id], ['class' => 'list-group-item list-group-item-action']) ?>
                <?= $this->Form->postLink(__('Delete Organisation'), ['action' => 'delete', $organisation->id], [
                    'confirm' => __('Are you sure you want to delete organisation: "{0}"?', $organisation->name),
                    'class' => 'list-group-item list-group-item-action text-danger'
                ]) ?>
                <?= $this->Html->link(__('List Organisations'), ['action' => 'index'], ['class' => 'list-group-item list-group-item-action']) ?>
                <?= $this->Html->link(__('New Organisation'), ['action' => 'add'], ['class' => 'list-group-item list-group-item-action']) ?>
            </div>
        </div>
    </aside>

    <div class="col-md-9">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h3><?= h($organisation->name) ?></h3>
            </div>
            <div class="card-body">
                <table class="table table-striped mb-4">
                    <tr>
                        <th><?= __('Name') ?></th>
                        <td><?= h($organisation->name) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Contact First Name') ?></th>
                        <td><?= h($organisation->contact_first_name) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Contact Last Name') ?></th>
                        <td><?= h($organisation->contact_last_name) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Contact Email') ?></th>
                        <td><?= $this->Html->link(h($organisation->contact_email), 'mailto:' . h($organisation->contact_email)) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Current Website') ?></th>
                        <td><?= $this->Html->link(h($organisation->current_website), h($organisation->current_website), ['target' => '_blank']) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Industry') ?></th>
                        <td><?= h($organisation->industry) ?></td>
                    </tr>
                </table>

                <div class="text mb-4">
                    <strong><?= __('Description') ?></strong>
                    <blockquote>
                        <?= $this->Text->autoParagraph(h($organisation->description)); ?>
                    </blockquote>
                </div>

                <!-- Related Contacts Section -->
                <div class="related mb-4">
                    <h4 class="text-primary"><?= __('Related Contacts') ?></h4>
                    <?php if (!empty($organisation->contacts)) : ?>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tr>
                                <th><?= __('First Name') ?></th>
                                <th><?= __('Last Name') ?></th>
                                <th><?= __('Email') ?></th>
                                <th><?= __('Phone Number') ?></th>
                                <th><?= __('Message') ?></th>
                                <th><?= __('Replied') ?></th>
                                <th><?= __('Date Sent') ?></th>
                                <th><?= __('Contractor Id') ?></th>
                                <th class="actions"><?= __('Actions') ?></th>
                            </tr>
                            <?php foreach ($organisation->contacts as $contact) : ?>
                            <tr>
                                <td><?= h($contact->first_name) ?></td>
                                <td><?= h($contact->last_name) ?></td>
                                <td><?= $this->Html->link(h($contact->email), 'mailto:' . h($contact->email)) ?></td>
                                <td><?= h($contact->phone_number) ?></td>
                                <td><?= h($contact->message) ?></td>
                                <td><?= h($contact->reply_status) ?></td>
                                <td><?= h($contact->date_sent->format('d/m/Y')) ?></td>
                                <td>
                                    <?php if ($contact->contractor_id): ?>
                                        <?= $this->Html->link(h($contact->contractor_id), ['controller' => 'Contractors', 'action' => 'view', $contact->contractor_id]) ?>
                                    <?php else: ?>
                                        <?= h($contact->contractor_id) ?>
                                    <?php endif; ?>
                                </td>
                                <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'Contacts', 'action' => 'view', $contact->id], ['class' => 'btn btn-outline-primary btn-sm']) ?>
                                    <?= $this->Html->link(__('Edit'), ['controller' => 'Contacts', 'action' => 'edit', $contact->id], ['class' => 'btn btn-outline-secondary btn-sm']) ?>
                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Contacts', 'action' => 'delete', $contact->id], [
                                        'confirm' => __('Are you sure you want to delete contact: "{0}"?', $contact->full_name),
                                        'class' => 'btn btn-outline-danger btn-sm'
                                    ]) ?>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </table>
                    </div>
                    <?php endif; ?>
                </div>

                <!-- Related Projects Section -->
                <div class="related">
                    <h4 class="text-primary"><?= __('Related Projects') ?></h4>
                    <?php if (!empty($organisation->projects)) : ?>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tr>
                                <th><?= __('Name') ?></th>
                                <th><?= __('Description') ?></th>
                                <th><?= __('Deadline') ?></th>
                                <th><?= __('Management Tool Link') ?></th>
                                <th><?= __('Last Checked Date') ?></th>
                                <th><?= __('Is Completed') ?></th>
                                <th><?= __('Contractor Id') ?></th>
                                <th class="actions"><?= __('Actions') ?></th>
                            </tr>
                            <?php foreach ($organisation->projects as $project) : ?>
                            <tr>
                                <td><?= h($project->name) ?></td>
                                <td><?= h($project->description) ?></td>
                                <td><?= h($project->deadline->format('d/m/Y')) ?></td>
                                <td><?= $this->Html->link(h($project->management_tool_link), $project->management_tool_link, ['target' => '_blank']) ?></td>
                                <td><?= h($project->last_checked_date->format('d/m/Y')) ?></td>
                                <td><?= h($project->completion_status) ?></td>
                                <td>
                                    <?php if ($project->contractor_id): ?>
                                        <?= $this->Html->link(h($project->contractor_id), ['controller' => 'Contractors', 'action' => 'view', $project->contractor_id]) ?>
                                    <?php else: ?>
                                        <?= h($project->contractor_id) ?>
                                    <?php endif; ?>
                                </td>

                                <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'Projects', 'action' => 'view', $project->id], ['class' => 'btn btn-outline-primary btn-sm']) ?>
                                    <?= $this->Html->link(__('Edit'), ['controller' => 'Projects', 'action' => 'edit', $project->id], ['class' => 'btn btn-outline-secondary btn-sm']) ?>
                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Projects', 'action' => 'delete', $project->id], [
                                        'confirm' => __('Are you sure you want to delete project: "{0}"?', $project->name),
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
