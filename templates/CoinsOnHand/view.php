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
            <?= $this->Html->link(__('Edit Coins On Hand'), ['action' => 'edit', $coinsOnHand->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Coins On Hand'), ['action' => 'delete', $coinsOnHand->id], ['confirm' => __('Are you sure you want to delete # {0}?', $coinsOnHand->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Coins On Hand'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Coins On Hand'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="coinsOnHand view content">
            <h3><?= h($coinsOnHand->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $coinsOnHand->has('user') ? $this->Html->link($coinsOnHand->user->id, ['controller' => 'Users', 'action' => 'view', $coinsOnHand->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($coinsOnHand->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Amount') ?></th>
                    <td><?= $this->Number->format($coinsOnHand->amount) ?></td>
                </tr>
                <tr>
                    <th><?= __('Sell Amount') ?></th>
                    <td><?= $this->Number->format($coinsOnHand->sell_amount) ?></td>
                </tr>
                <tr>
                    <th><?= __('Sell Date') ?></th>
                    <td><?= h($coinsOnHand->sell_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($coinsOnHand->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modfied') ?></th>
                    <td><?= h($coinsOnHand->modfied) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
