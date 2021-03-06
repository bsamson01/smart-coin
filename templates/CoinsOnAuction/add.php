<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CoinsOnAuction $coinsOnAuction
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Coins On Auction'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="coinsOnAuction form content">
            <?= $this->Form->create($coinsOnAuction) ?>
            <fieldset>
                <legend><?= __('Add Coins On Auction') ?></legend>
                <?php
                    echo $this->Form->control('user_id', ['options' => $users]);
                    echo $this->Form->control('amount');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
