<section>
	<h2>Coins On Sale</h2>
	<?php if (isset($onSale) && !empty($onSale)) : ?>
		<?php foreach ($onSale as $coin) : ?>
			<div>
				<?= $coin->amount ?>
			</div>
		<?php endforeach ?>
	<?php endif; ?>
</section>