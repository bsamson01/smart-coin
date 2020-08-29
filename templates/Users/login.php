<section>
    <div class="page-heading">
        <h1>Login</h1>
    </div>
    <div class="container">
        <div class="container row">
            <?= $this->Form->create(); ?>
                <?= $this->Form->control('email') ?>
                <?= $this->Form->control('password') ?>
                <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</section>
