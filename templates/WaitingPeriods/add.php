<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\WaitingPeriod $waitingPeriod
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Waiting Periods'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="waitingPeriods form content">
            <?= $this->Form->create($waitingPeriod) ?>
            <fieldset>
                <legend><?= __('Add Waiting Period') ?></legend>
                <?php
                    echo $this->Form->control('days');
                    echo $this->Form->control('percentage_gain');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
