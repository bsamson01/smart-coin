<section>
    <div class="page-heading">
        <h1>Register</h1>
    </div>
    <div class="container">
        <div class="container row">
            <?= $this->Form->create($user); ?>
                <?php
                    echo $this->Form->control('name', ['required' => true]);
                    echo $this->Form->control('email', ['required' => true]);
                    echo $this->Form->control('first_name', ['required' => true]);
                    echo $this->Form->control('last_name', ['required' => true]);
                    echo $this->Form->control('phone', ['required' => true]);
                    echo $this->Form->control('password', ['required' => true]);
                    echo $this->Form->select('bank_id',
                        [
                            1 => 'FNB',
                            2 => 'Absa',
                            3 => 'Standard Bank',
                            4 => 'Capitec',
                            5 => 'Time Bank'
                        ], [
                            'empty' => '(Choose A Bank)',
                            'label' => 'Bank',
                            'required' => true
                        ]);
                    echo $this->Form->control('account_name', ['required' => true]);
                    echo $this->Form->control('account_number', ['required' => true]);
                    echo $this->Form->control('account_type', ['required' => true]);
                    echo $this->Form->control('branch', ['required' => true]);
                ?>
                <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</section>