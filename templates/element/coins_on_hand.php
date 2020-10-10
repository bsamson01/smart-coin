<section>
	<h1>Coins On Hand</h1>
	<?php if (isset($onHand) && !empty($onHand)) : ?>
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
					<td><?= $coin->sell_date->nice()?></td>
					<td>
						<form action="/" method="post"></form>
					</td>
				</tr>
			<?php endforeach ?>
		</table>
	<?php endif; ?>
</section>