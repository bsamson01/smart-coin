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
            <?= $this->Html->link(__('Edit Pending Payment'), ['action' => 'edit', $pendingPayment->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Pending Payment'), ['action' => 'delete', $pendingPayment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pendingPayment->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Pending Payments'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Pending Payment'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="pendingPayments view content">
            <h3><?= h($pendingPayment->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($pendingPayment->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Seller') ?></th>
                    <td><?= $this->Number->format($pendingPayment->seller) ?></td>
                </tr>
                <tr>
                    <th><?= __('Buyer') ?></th>
                    <td><?= $this->Number->format($pendingPayment->buyer) ?></td>
                </tr>
                <tr>
                    <th><?= __('Amount') ?></th>
                    <td><?= $this->Number->format($pendingPayment->amount) ?></td>
                </tr>
                <tr>
                    <th><?= __('Waiting Period') ?></th>
                    <td><?= $this->Number->format($pendingPayment->waiting_period) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($pendingPayment->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($pendingPayment->modified) ?></td>
                </tr>
                <tr>
                    <th><?= __('Paid') ?></th>
                    <td><?= $pendingPayment->paid ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
