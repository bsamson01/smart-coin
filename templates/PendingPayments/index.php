<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PendingPayment[]|\Cake\Collection\CollectionInterface $pendingPayments
 */
?>
<div class="pendingPayments index content">
    <?= $this->Html->link(__('New Pending Payment'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Pending Payments') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('seller') ?></th>
                    <th><?= $this->Paginator->sort('buyer') ?></th>
                    <th><?= $this->Paginator->sort('amount') ?></th>
                    <th><?= $this->Paginator->sort('paid') ?></th>
                    <th><?= $this->Paginator->sort('waiting_period') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($pendingPayments as $pendingPayment): ?>
                <tr>
                    <td><?= $this->Number->format($pendingPayment->id) ?></td>
                    <td><?= $this->Number->format($pendingPayment->seller) ?></td>
                    <td><?= $this->Number->format($pendingPayment->buyer) ?></td>
                    <td><?= $this->Number->format($pendingPayment->amount) ?></td>
                    <td><?= h($pendingPayment->paid) ?></td>
                    <td><?= $this->Number->format($pendingPayment->waiting_period) ?></td>
                    <td><?= h($pendingPayment->created) ?></td>
                    <td><?= h($pendingPayment->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $pendingPayment->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $pendingPayment->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $pendingPayment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pendingPayment->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
