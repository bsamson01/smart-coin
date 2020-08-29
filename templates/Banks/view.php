<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Bank $bank
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Bank'), ['action' => 'edit', $bank->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Bank'), ['action' => 'delete', $bank->id], ['confirm' => __('Are you sure you want to delete # {0}?', $bank->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Banks'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Bank'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="banks view content">
            <h3><?= h($bank->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($bank->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($bank->id) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Banking Details') ?></h4>
                <?php if (!empty($bank->banking_details)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Bank Id') ?></th>
                            <th><?= __('Account Name') ?></th>
                            <th><?= __('Account Number') ?></th>
                            <th><?= __('Account Type') ?></th>
                            <th><?= __('Branch') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($bank->banking_details as $bankingDetails) : ?>
                        <tr>
                            <td><?= h($bankingDetails->id) ?></td>
                            <td><?= h($bankingDetails->user_id) ?></td>
                            <td><?= h($bankingDetails->bank_id) ?></td>
                            <td><?= h($bankingDetails->account_name) ?></td>
                            <td><?= h($bankingDetails->account_number) ?></td>
                            <td><?= h($bankingDetails->account_type) ?></td>
                            <td><?= h($bankingDetails->branch) ?></td>
                            <td><?= h($bankingDetails->created) ?></td>
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
