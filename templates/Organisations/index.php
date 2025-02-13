<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Organisation> $organisations
 */
?>
<div class="organisations index content">
    <!-- New Organisation Button with existing styling from CSS -->
    <?= $this->Html->link(__('New Organisation'), ['action' => 'add'], ['class' => 'btn btn-primary float-end mb-4']) ?>
    <h3 class="mb-4"><?= __('Organisations') ?></h3>

    <!-- Filter Form -->
    <div class="organisations search form mb-4 p-4 rounded shadow-sm bg-light">
        <?= $this->Form->create(null, ['type' => 'get', 'class' => 'row g-3']) ?>

        <!-- Organisation Name and Number of Projects Fields -->
        <div class="col-md-6">
            <?= $this->Form->control('name', [
                'label' => 'Organisation Name',
                'placeholder' => 'Organisation name contains...',
                'value' => $this->request->getQuery('name'),
                'class' => 'form-control'
            ]) ?>
        </div>
        <div class="col-md-6">
            <?= $this->Form->control('no_projects', [
                'label' => 'Number of Projects',
                'placeholder' => 'Number of projects equals...',
                'value' => $this->request->getQuery('no_projects'),
                'class' => 'form-control'
            ]) ?>
        </div>

        <!-- Search Button -->
        <div class="col-md-2 align-self-end">
            <?= $this->Form->button(__('Search'), ['class' => 'btn btn-primary w-100']) ?>
        </div>

        <?= $this->Form->end() ?>
    </div>

    <!-- Table of Organisations -->
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead class="bg-secondary text-white">
                <tr>
                    <th><?= $this->Paginator->sort('name', 'Organisation Name') ?></th>
                    <th><?= $this->Paginator->sort('contact_first_name', 'Contact First Name') ?></th>
                    <th><?= $this->Paginator->sort('contact_last_name', 'Contact Last Name') ?></th>
                    <th><?= $this->Paginator->sort('contact_email', 'Contact Email') ?></th>
                    <th><?= $this->Paginator->sort('current_website', 'Current Website') ?></th>
                    <th><?= $this->Paginator->sort('industry', 'Industry') ?></th>
                    <th class="text-center"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($organisations as $organisation): ?>
                <tr>
                    <td><?= h($organisation->name) ?></td>
                    <td><?= h($organisation->contact_first_name) ?></td>
                    <td><?= h($organisation->contact_last_name) ?></td>
                    <td><?= $this->Html->link(h($organisation->contact_email), 'mailto:'.h($organisation->contact_email)) ?></td>
                    <td><?= $this->Html->link(h($organisation->current_website), h($organisation->current_website), ['target' => '_blank']) ?></td>
                    <td><?= h($organisation->industry) ?></td>
                    <td class="text-center">
                        <div class="d-flex justify-content-center">
                            <?= $this->Html->link(__('View'), ['action' => 'view', $organisation->id], ['class' => 'btn btn-sm btn-primary me-2']) ?>
                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $organisation->id], ['class' => 'btn btn-sm btn-warning me-2']) ?>
                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $organisation->id], ['confirm' => __('Are you sure you want to delete "{0}"?', $organisation->name), 'class' => 'btn btn-sm btn-danger me-2']) ?>
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
