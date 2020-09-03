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
            <?= $this->Html->link(__('Edit Waiting Period'), ['action' => 'edit', $waitingPeriod->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Waiting Period'), ['action' => 'delete', $waitingPeriod->id], ['confirm' => __('Are you sure you want to delete # {0}?', $waitingPeriod->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Waiting Periods'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Waiting Period'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="waitingPeriods view content">
            <h3><?= h($waitingPeriod->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($waitingPeriod->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Days') ?></th>
                    <td><?= $this->Number->format($waitingPeriod->days) ?></td>
                </tr>
                <tr>
                    <th><?= __('Percentage Gain') ?></th>
                    <td><?= $this->Number->format($waitingPeriod->percentage_gain) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($waitingPeriod->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($waitingPeriod->modified) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
