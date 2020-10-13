<section>
    <article>
        <?= $this->Html->image('/img/coin-icon.png', ['alt' => 'Coin Icon', 'class' => 'd-block m-auto']) ?>
        <div class="container">
            <div class="container row">
                <?= $this->Form->create(); ?>
                    <?= $this->Form->control('email', ['placeholder' => 'Enter Email', 'class' => 'mb-4']) ?>
                    <?= $this->Form->control('password', ['placeholder' => 'Enter Password']) ?>
                    <?= $this->Form->submit(__('Sign In'), ['class' => 'btn-submit mt-3']); ?>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </article>
</section>
