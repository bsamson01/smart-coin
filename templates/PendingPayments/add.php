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
            <?= $this->Html->link(__('List Pending Payments'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="pendingPayments form content">
            <?= $this->Form->create($pendingPayment) ?>
            <fieldset>
                <legend><?= __('Add Pending Payment') ?></legend>
                <?php
                    echo $this->Form->control('seller');
                    echo $this->Form->control('buyer');
                    echo $this->Form->control('amount');
                    echo $this->Form->control('paid');
                    echo $this->Form->control('waiting_period');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
