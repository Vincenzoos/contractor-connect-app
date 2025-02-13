<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Contractor> $contractors
 * @var \Cake\Collection\CollectionInterface|string[] $skillsList
 */
?>
<div class="contractors index content">
    <!-- New Contractor Button with existing styling from CSS -->
    <?= $this->Html->link(__('New Contractor'), ['action' => 'add'], ['class' => 'btn btn-primary float-end mb-4']) ?>
    <h3 class="mb-4"><?= __('Contractors') ?></h3>

    <!-- Filter Form -->
    <div class="contractors search form mb-4 p-4 rounded shadow-sm bg-light">
        <?= $this->Form->create(null, ['type' => 'get', 'class' => 'row g-3']) ?>

        <!-- First and Last Name Fields -->
        <div class="col-md-3">
            <?= $this->Form->control('first_name', [
                'label' => 'First Name',
                'placeholder' => 'First name contains...',
                'value' => $this->request->getQuery('first_name'),
                'class' => 'form-control'
            ]) ?>
        </div>
        <div class="col-md-3">
            <?= $this->Form->control('last_name', [
                'label' => 'Last Name',
                'placeholder' => 'Last name contains...',
                'value' => $this->request->getQuery('last_name'),
                'class' => 'form-control'
            ]) ?>
        </div>

        <!-- Number of Projects and Email Fields -->
        <div class="col-md-3">
            <?= $this->Form->control('no_projects', [
                'label' => 'Number of Projects',
                'placeholder' => 'Number of projects equals...',
                'value' => $this->request->getQuery('no_projects'),
                'class' => 'form-control'
            ]) ?>
        </div>
        <div class="col-md-3">
            <?= $this->Form->control('email', [
                'label' => 'Email',
                'placeholder' => 'Email contains...',
                'value' => $this->request->getQuery('email'),
                'class' => 'form-control'
            ]) ?>
        </div>

        <!-- Skills Field -->
        <div class="col-md-6">
            <?= $this->Form->control('skills._ids', [
                'label' => 'Skills',
                'options' => $skillsList,
                'multiple' => true,
                'class' => 'form-select js-multi-select',
                'value' => $this->request->getQuery('skills._ids')
            ]) ?>
        </div>

        <!-- Search Button -->
        <div class="col-md-2 align-self-end">
        <?= $this->Form->button(__('Search'), ['class' => 'btn btn-primary w-100']) ?>
        </div>

        <?= $this->Form->end() ?>
    </div>

    <!-- Table of Contractors -->
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead class="bg-secondary text-white">
                <tr>
                    <th><?= $this->Paginator->sort('first_name', 'First Name') ?></th>
                    <th><?= $this->Paginator->sort('last_name', 'Last Name') ?></th>
                    <th><?= $this->Paginator->sort('email', 'Email') ?></th>
                    <th><?= $this->Paginator->sort('phone_number', 'Phone Number') ?></th>
                    <th><?= $this->Paginator->sort('profile_picture', 'Profile Picture') ?></th>
                    <th class="text-center"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($contractors as $contractor): ?>
                <tr>
                    <td><?= h($contractor->first_name) ?></td>
                    <td><?= h($contractor->last_name) ?></td>
                    <td><?= $this->Html->link(h($contractor->email), 'mailto:' . h($contractor->email)) ?></td>
                    <td><?= h($contractor->phone_number) ?></td>
                    <td><?= $this->Html->image($contractor->profile_picture_path, ['class' => 'img-thumbnail', 'style' => 'max-width: 60px;']) ?></td>
                    <td class="text-center">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $contractor->id], ['class' => 'btn btn-sm btn-primary']) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $contractor->id], ['class' => 'btn btn-sm btn-warning']) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $contractor->id], ['confirm' => __('Are you sure you want to delete "{0}"?', $contractor->full_name), 'class' => 'btn btn-sm btn-danger']) ?>
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
