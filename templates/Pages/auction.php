<div class="row">
	<?php foreach($auctions as $auction): ?>
		<div class="card col-sm-12 col-md-6 col-lg-4 mb-4 p-3">
			<div class="card-body">
				<h2 class="card-title"><?= $auction->formatted_display_title ?></h2>
				<h3 class="card-subtitle"><?= $auction->available_coins?></h3>
				<?= $this->Form->create($bid, ['action' => '/place-bid']) ?>
					<?= $this->Form->hidden('auction_id' , ['value' => $auction->id])?>
					<?= $this->Form->control('amount', ['type' => 'number', 'min' => 100, 'value' => $auction->amount]) ?>
					<?= $this->Form->control('waiting_period', ['type' => 'select', 'options' => $waitingTimeOptions]) ?>
					<p id="payout-amount"></p>
					<?= $this->Form->submit('Place Bid') ?>
				<?= $this->Form->end() ?>
			</div>
		</div>
	<?php endforeach; ?>
</div>