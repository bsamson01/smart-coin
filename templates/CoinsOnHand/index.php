<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CoinsOnHand[]|\Cake\Collection\CollectionInterface $coinsOnHand
 */
?>
<div class="coinsOnHand index content">
    <?= $this->Html->link(__('New Coins On Hand'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Coins On Hand') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th><?= $this->Paginator->sort('amount') ?></th>
                    <th><?= $this->Paginator->sort('sell_amount') ?></th>
                    <th><?= $this->Paginator->sort('sell_date') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modfied') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($coinsOnHand as $coinsOnHand): ?>
                <tr>
                    <td><?= $this->Number->format($coinsOnHand->id) ?></td>
                    <td><?= $coinsOnHand->has('user') ? $this->Html->link($coinsOnHand->user->id, ['controller' => 'Users', 'action' => 'view', $coinsOnHand->user->id]) : '' ?></td>
                    <td><?= $this->Number->format($coinsOnHand->amount) ?></td>
                    <td><?= $this->Number->format($coinsOnHand->sell_amount) ?></td>
                    <td><?= h($coinsOnHand->sell_date) ?></td>
                    <td><?= h($coinsOnHand->created) ?></td>
                    <td><?= h($coinsOnHand->modfied) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $coinsOnHand->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $coinsOnHand->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $coinsOnHand->id], ['confirm' => __('Are you sure you want to delete # {0}?', $coinsOnHand->id)]) ?>
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
