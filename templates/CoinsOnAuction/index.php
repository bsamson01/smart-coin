<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CoinsOnAuction[]|\Cake\Collection\CollectionInterface $coinsOnAuction
 */
?>
<div class="coinsOnAuction index content">
    <?= $this->Html->link(__('New Coins On Auction'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Coins On Auction') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th><?= $this->Paginator->sort('amount') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($coinsOnAuction as $coinsOnAuction): ?>
                <tr>
                    <td><?= $this->Number->format($coinsOnAuction->id) ?></td>
                    <td><?= $coinsOnAuction->has('user') ? $this->Html->link($coinsOnAuction->user->id, ['controller' => 'Users', 'action' => 'view', $coinsOnAuction->user->id]) : '' ?></td>
                    <td><?= $this->Number->format($coinsOnAuction->amount) ?></td>
                    <td><?= h($coinsOnAuction->created) ?></td>
                    <td><?= h($coinsOnAuction->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $coinsOnAuction->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $coinsOnAuction->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $coinsOnAuction->id], ['confirm' => __('Are you sure you want to delete # {0}?', $coinsOnAuction->id)]) ?>
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
