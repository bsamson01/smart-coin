<section>
	<h1>Confirm Payments</h1>
	<?php if (isset($toBePaid) && !empty($toBePaid)) : ?>
		<table>
			<tr>
				<th>Amount</th>
				<th>Buyer</th>
				<th>Confirm</th>
			</tr>
			<?php foreach ($toBePaid as $coin) : ?>
				<tr>
					<td><?= $coin->amount ?></td>
					<td><?= $coin->buyer_name?></td>
					<td>
						<?=$this->Form->create($coin, ['action' => '/profile/confirm-payments', 'method' => 'post']); ?>
							<?= $this->Form->hidden('id'); ?>
							<?= $this->Form->submit('Confirm Payment'); ?>
						<?= $this->Form->end(); ?>
					</td>
				</tr>
			<?php endforeach ?>
		</table>
	<?php endif; ?>
</section>