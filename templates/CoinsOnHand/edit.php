<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CoinsOnHand $coinsOnHand
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $coinsOnHand->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $coinsOnHand->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Coins On Hand'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="coinsOnHand form content">
            <?= $this->Form->create($coinsOnHand) ?>
            <fieldset>
                <legend><?= __('Edit Coins On Hand') ?></legend>
                <?php
                    echo $this->Form->control('user_id', ['options' => $users]);
                    echo $this->Form->control('amount');
                    echo $this->Form->control('sell_amount');
                    echo $this->Form->control('sell_date');
                    echo $this->Form->control('modfied');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
