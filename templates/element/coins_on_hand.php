<?php if (isset($onHand) && !empty($onHand)) : ?>
	<section>
		<h1>Coins On Hand</h1>
		<table>
			<tr>
				<th>Amount</th>
				<th>Original Days</th>
				<th>Days Left</th>
				<th>Payout</th>
				<th>Sale Button</th>
			</tr>
			<?php foreach ($onHand as $coin) : ?>
				<tr>
					<td><?= $coin->amount ?></td>
					<td><?= $coin->waiting_period?></td>
					<td><?= $coin->waiting_period?></td>
					<td><?= $coin->sell_amount?></td>
					<td>
						<?php if ($coin->ready_for_sale): ?>
							<?=$this->Form->create($coin, ['action' => '/profile/sell-coins', 'method' => 'post']); ?>
								<?= $this->Form->hidden('id'); ?>
								<?= $this->Form->submit('Sell'); ?>
							<?= $this->Form->end(); ?>
						<?php else : ?>
							<?= $coin->sell_date->nice()?>
						<?php endif ?>
					</td>
				</tr>
			<?php endforeach ?>
		</table>
	</section>
<?php endif; ?>