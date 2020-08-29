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
            <?= $this->Html->link(__('List Banking Details'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="bankingDetails form content">
            <?= $this->Form->create($bankingDetail) ?>
            <fieldset>
                <legend><?= __('Add Banking Detail') ?></legend>
                <?php
                    echo $this->Form->control('user_id', ['options' => $users]);
                    echo $this->Form->control('bank_id', ['options' => $banks]);
                    echo $this->Form->control('account_name');
                    echo $this->Form->control('account_number');
                    echo $this->Form->control('account_type');
                    echo $this->Form->control('branch');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
