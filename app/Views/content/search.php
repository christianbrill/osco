<?php $this->layout('layout', ['title' => 'Search results', 'currentPage' => 'search']) ?>

<?php $this->start('main_content') ?>
<section id="search">
	<div class="filterBox">
	<?php if ($searchInput != '') : ?>
		<span><?= $nbResults ?> Result(s) for "<?= $searchInput ?>"</span>
	<?php else : ?>
		<div class="pagination">
		<?php if ($page >= 2){
		?>
			<a href="?searchInput=<?= $searchInput ?>&page=<?= $page-1 ?>&order=DESC" name="page" class="before">Précédant</a>
		<?php
		}
			
		if ($nbResults >= 4){
		?>
			<a href="?searchInput=<?= $searchInput ?>&page=<?= $page+1 ?>&order=DESC" name="page" class="after">Suivant</a>
		<?php
		}
		?>
		</div>
  	<?php endif; ?>
	</div>

	<div class="orderBox">
		Sort by 
		<a href="?searchInput=<?= $searchInput ?>&order=DESC">
			<button name="order" class="tag btn btn-xs">Recent</button>
		</a>
		<a href="?searchInput=<?= $searchInput ?>&order=ASC">
			<button name="order" class="tag btn btn-xs">Oldest</button>
		</a>
	</div>

	<div class="storiesList">
	<?php foreach ($searchResults as $currentResult) : ?>
		<article>
				<div>
					<h1><?= $currentResult['sto_title']; ?></h1>
					<p><?= $currentResult['usr_username']; ?></p>
					<p><?= $currentResult['sto_inserted']; ?></p>
					<p><?= \Controller\ContentController::getShortDescription($currentResult['sto_content']); ?></p>
					<a href="<?= $this->url('content_story',['id' => $currentResult['sto_id']]); ?>">Read More</a>
				</div>
				</a>
			</article>
	<?php endforeach; ?>
	</div>

</section>
<?php $this->stop('main_content') ?>