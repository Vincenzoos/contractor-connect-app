<?php
/**
 * @var \App\View\AppView $this
 */
$this->assign('title', 'Log In');

?>
<div class="container-fluid d-flex justify-content-center align-items-center min-vh-100" style="background-color: #f0f2f5;">
    <div class="card shadow-lg p-5" style="max-width: 600px; width: 100%; border-radius: 10px;">
        <div class="card-body">
            <h2 class="text-center text-primary mb-4" style="font-size: 2rem; font-weight: 600;"><?= __('Login to Jims Connect') ?></h2>

            <?= $this->Form->create(null, ['class' => '']) ?>
            <fieldset>
                <div class="mb-4">
                    <?= $this->Form->control('email', [
                        'label' => 'Email Address',
                        'class' => 'form-control form-control-lg',
                        'placeholder' => 'Enter your email'
                    ]) ?>
                </div>
                <div class="mb-4">
                    <?= $this->Form->control('password', [
                        'label' => 'Password',
                        'class' => 'form-control form-control-lg',
                        'placeholder' => 'Enter your password'
                    ]) ?>
                </div>
            </fieldset>
            <div class="form-check mb-4">
                <?= $this->Form->checkbox('remember_me', ['class' => 'form-check-input']) ?>
                <?= $this->Form->label('remember_me', 'Remember Me', ['class' => 'form-check-label']) ?>
            </div>
            <div class="d-grid">
                <?= $this->Form->button(__('Login'), ['class' => 'btn btn-primary btn-lg']) ?>
            </div>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
