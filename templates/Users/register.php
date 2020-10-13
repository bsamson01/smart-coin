<section>
    <div class="container">
        <?= $this->Html->image('/img/coin-icon.png', ['alt' => 'Coin Icon', 'class' => 'd-block mx-auto mb-4']) ?>
        <div class="container row mt-4">
            <?= $this->Form->create($user); ?>
                <div class="row mt-4">
                    <div class="col-sm-12 col-md-6">
                        <h2 class="text-center">Personal Details</h2>
                        <?php
                            echo $this->Form->control('name', ['required' => true]);
                            echo $this->Form->control('email', ['required' => true]);
                            echo $this->Form->control('first_name', ['required' => true]);
                            echo $this->Form->control('last_name', ['required' => true]);
                            echo $this->Form->control('phone', ['required' => true]);
                            echo $this->Form->control('password', ['required' => true]);
                        ?>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <h2 class="text-center">Banking Deatils</h2>
                        <?php
                            echo $this->Form->control('account_name', ['required' => true]);
                            echo $this->Form->select('bank_id',
                                [
                                    1 => 'FNB',
                                    2 => 'Absa',
                                    3 => 'Standard Bank',
                                    4 => 'Capitec',
                                    5 => 'Time Bank'
                                ], [
                                    'empty' => '(Select A Bank)',
                                    'label' => 'Bank',
                                    'required' => true
                                ]);
                            echo $this->Form->control('account_number', ['required' => true]);
                            echo $this->Form->control('account_type', ['required' => true]);
                            echo $this->Form->control('branch', ['required' => true]);
                        ?>
                    </div>
                    <div class="col-12">
                        <?= $this->Form->submit(__('Sign Up'), ['class' => 'btn-submit mt-3']) ?>
                    </div>
                </div>
            <?= $this->Form->end() ?>
        </div>
    </div>
</section>