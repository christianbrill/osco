<?php $this->layout('layout', ['title' => 'Search results', 'currentPage' => 'search']) ?>

<?php $this->start('main_content') ?>
	<section>
	<div>
	<?php if ($searchInput != '') : ?>
		<?= $nbResults ?> Result(s) for "<?= $searchInput ?>"
	<?php endif; ?>
	</div>

	<div class="container">
		<div class="filterBox">
			Sort by 
			<button class="filterToggleButton" style="display: none">Recent</button>
			<button class="filterToggleButton">Oldest</button>
		</div>
	<?php foreach ($searchResults as $searchInput) : ?>
		<div>
			<p><?= $searchResults['usr_username']; ?></p>
			<p><?= $searchResults['sto_title']; ?></p>
			<p><?= $searchResults['sto_inserted']; ?></p>
			<p><?= $searchResults['sto_content']; ?></p>
			<p><?= $searchResults['sto_tags']; ?></p>
		</div>
	<?php endforeach; ?>
	</div>
	</section>
<?php $this->stop('main_content') ?>