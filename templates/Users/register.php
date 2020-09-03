<section>
    <div class="page-heading">
        <h1>Register</h1>
    </div>
    <div class="container">
        <div class="container row">
            <?= $this->Form->create($user); ?>
                <?php
                    echo $this->Form->control('name');
                    echo $this->Form->control('email');
                    echo $this->Form->control('first_name');
                    echo $this->Form->control('last_name');
                    echo $this->Form->control('phone');
                    echo $this->Form->control('password');
                ?>
                <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</section>