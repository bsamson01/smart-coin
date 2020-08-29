<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Users'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New User'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="users view content">
            <h3><?= h($user->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Role') ?></th>
                    <td><?= $user->has('role') ? $this->Html->link($user->role->name, ['controller' => 'Roles', 'action' => 'view', $user->role->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($user->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= h($user->email) ?></td>
                </tr>
                <tr>
                    <th><?= __('First Name') ?></th>
                    <td><?= h($user->first_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Last Name') ?></th>
                    <td><?= h($user->last_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($user->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Joined') ?></th>
                    <td><?= h($user->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Updated') ?></th>
                    <td><?= h($user->modified) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Banking Details') ?></h4>
                <?php if (!empty($user->banking_details)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Bank Name') ?></th>
                            <th><?= __('Account Name') ?></th>
                            <th><?= __('Account Number') ?></th>
                            <th><?= __('Account Type') ?></th>
                            <th><?= __('Branch') ?></th>
                            <th><?= __('Updated') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($user->banking_details as $bankingDetails) : ?>
                        <tr>
                            <td><?= h($bankingDetails->id) ?></td>
                            <td><?= h($bankingDetails->bank_id) ?></td>
                            <td><?= h($bankingDetails->account_name) ?></td>
                            <td><?= h($bankingDetails->account_number) ?></td>
                            <td><?= h($bankingDetails->account_type) ?></td>
                            <td><?= h($bankingDetails->branch) ?></td>
                            <td><?= h($bankingDetails->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'BankingDetails', 'action' => 'view', $bankingDetails->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'BankingDetails', 'action' => 'edit', $bankingDetails->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'BankingDetails', 'action' => 'delete', $bankingDetails->id], ['confirm' => __('Are you sure you want to delete # {0}?', $bankingDetails->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
