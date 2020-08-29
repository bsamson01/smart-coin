<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PendingPayment $pendingPayment
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $pendingPayment->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $pendingPayment->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Pending Payments'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="pendingPayments form content">
            <?= $this->Form->create($pendingPayment) ?>
            <fieldset>
                <legend><?= __('Edit Pending Payment') ?></legend>
                <?php
                    echo $this->Form->control('seller');
                    echo $this->Form->control('buyer');
                    echo $this->Form->control('amount');
                    echo $this->Form->control('paid');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
