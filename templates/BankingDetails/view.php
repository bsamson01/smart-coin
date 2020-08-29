<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\BankingDetail $bankingDetail
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Banking Detail'), ['action' => 'edit', $bankingDetail->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Banking Detail'), ['action' => 'delete', $bankingDetail->id], ['confirm' => __('Are you sure you want to delete # {0}?', $bankingDetail->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Banking Details'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Banking Detail'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="bankingDetails view content">
            <h3><?= h($bankingDetail->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $bankingDetail->has('user') ? $this->Html->link($bankingDetail->user->name, ['controller' => 'Users', 'action' => 'view', $bankingDetail->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Bank') ?></th>
                    <td><?= $bankingDetail->has('bank') ? $this->Html->link($bankingDetail->bank->name, ['controller' => 'Banks', 'action' => 'view', $bankingDetail->bank->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Account Name') ?></th>
                    <td><?= h($bankingDetail->account_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Account Number') ?></th>
                    <td><?= h($bankingDetail->account_number) ?></td>
                </tr>
                <tr>
                    <th><?= __('Account Type') ?></th>
                    <td><?= h($bankingDetail->account_type) ?></td>
                </tr>
                <tr>
                    <th><?= __('Branch') ?></th>
                    <td><?= h($bankingDetail->branch) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($bankingDetail->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($bankingDetail->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($bankingDetail->modified) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
