<section>
	<h2>Pay Bids</h2>
	<?php if (isset($toPay) && !empty($toPay)) : ?>
		<table>
			<tr>
				<th>Amount</th>
				<th>Seller Name</th>
				<th>Seller Cellphone</th>
				<th>Banking Details</th>
			</tr>
		<?php foreach ($toPay as $coin) : ?>
			<tr>
				<td><?= $coin->amount; ?></td>
				<td><?= $coin->coin_seller->full_name; ?></td>
				<td><?= $coin->coin_seller->phone; ?></td>
				<td>
					<p>
						<button class="submit" type="button" data-toggle="collapse" data-target="#collapseExample-<?=$coin->id?>" aria-expanded="false" aria-controls="collapseExample-<?=$coin->id?>">
    						View Banking Details
						</button>
					</p>

					<div class="collapse" id="collapseExample-<?=$coin->id?>">
						<div class="card card-body">
							<p><?= $coin->coin_seller->banking_details[0]->bank->name ?></p>
							<p>Acc Type : <?= $coin->coin_seller->banking_details[0]->account_type ?></p>
							<p>Acc Number : <?= $coin->coin_seller->banking_details[0]->account_number ?></p>
							<p>Branch : <?= $coin->coin_seller->banking_details[0]->branch ?></p>
						</div>
					</div>
				</td>
			</tr>
		<?php endforeach ?>
	<?php endif; ?>
</section>