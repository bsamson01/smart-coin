<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\BankingDetail[]|\Cake\Collection\CollectionInterface $bankingDetails
 */
?>
<div class="bankingDetails index content">
    <?= $this->Html->link(__('New Banking Detail'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Banking Details') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th><?= $this->Paginator->sort('bank_id') ?></th>
                    <th><?= $this->Paginator->sort('account_name') ?></th>
                    <th><?= $this->Paginator->sort('account_number') ?></th>
                    <th><?= $this->Paginator->sort('account_type') ?></th>
                    <th><?= $this->Paginator->sort('branch') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($bankingDetails as $bankingDetail): ?>
                <tr>
                    <td><?= $this->Number->format($bankingDetail->id) ?></td>
                    <td><?= $bankingDetail->has('user') ? $this->Html->link($bankingDetail->user->name, ['controller' => 'Users', 'action' => 'view', $bankingDetail->user->id]) : '' ?></td>
                    <td><?= $bankingDetail->has('bank') ? $this->Html->link($bankingDetail->bank->name, ['controller' => 'Banks', 'action' => 'view', $bankingDetail->bank->id]) : '' ?></td>
                    <td><?= h($bankingDetail->account_name) ?></td>
                    <td><?= h($bankingDetail->account_number) ?></td>
                    <td><?= h($bankingDetail->account_type) ?></td>
                    <td><?= h($bankingDetail->branch) ?></td>
                    <td><?= h($bankingDetail->created) ?></td>
                    <td><?= h($bankingDetail->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $bankingDetail->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $bankingDetail->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $bankingDetail->id], ['confirm' => __('Are you sure you want to delete # {0}?', $bankingDetail->id)]) ?>
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
