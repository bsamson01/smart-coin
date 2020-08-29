<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CoinsOnAuction $coinsOnAuction
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Coins On Auction'), ['action' => 'edit', $coinsOnAuction->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Coins On Auction'), ['action' => 'delete', $coinsOnAuction->id], ['confirm' => __('Are you sure you want to delete # {0}?', $coinsOnAuction->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Coins On Auction'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Coins On Auction'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="coinsOnAuction view content">
            <h3><?= h($coinsOnAuction->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $coinsOnAuction->has('user') ? $this->Html->link($coinsOnAuction->user->id, ['controller' => 'Users', 'action' => 'view', $coinsOnAuction->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($coinsOnAuction->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Amount') ?></th>
                    <td><?= $this->Number->format($coinsOnAuction->amount) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($coinsOnAuction->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($coinsOnAuction->modified) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
