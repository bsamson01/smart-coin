<section>
	<h2>Pay Bids</h2>
	<?php if (isset($toPay) && !empty($toPay)) : ?>
		<?php foreach ($toPay as $coin) : ?>
			<div>
				<?= $coin->amount ?>
			</div>
		<?php endforeach ?>
	<?php endif; ?>
</section>