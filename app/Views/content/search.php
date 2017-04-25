<?php $this->layout('layout', ['title' => 'Search results', 'currentPage' => 'search']) ?>

<?php $this->start('main_content') ?>
	<section id="search">

		<div class="filterBox">
		<!-- if there is a search word inside the input -->
		<?php if ($searchInput != '') : ?>
			<!-- show number of results for what has been put inside the input -->
			<span><?= $nbResults ?> Result(s) for "<?= $searchInput ?>"</span>
		<?php else : ?>
			<!-- Pagination: -->
			<div class="pagination">
			<!-- if the page variable in the url is superior or equal to two-->
			<?php if ($page >= 2) {
			?>
				<a href="?searchInput=<?= $searchInput ?>&page=<?= $page-1 ?>&order=DESC" name="page" class="before">Previous</a>
			<?php
			}
				
			if ($nbResults >= 10) {
			?>
				<!-- this is shown if the number of results is over 10-->
				<a href="?searchInput=<?= $searchInput ?>&page=<?= $page+1 ?>&order=DESC" name="page" class="after">Next</a>
			<?php
			}

			?>
			</div>
	  	<?php endif; ?>
		</div>

		<!-- Order by newest or oldest stories -->
		<div class="orderBox">
			Sort by 
			<a href="?searchInput=<?= $searchInput ?>&order=DESC">
				<button name="order" class="tag btn btn-xs">Newest</button>
			</a>
			<a href="?searchInput=<?= $searchInput ?>&order=ASC">
				<button name="order" class="tag btn btn-xs">Oldest</button>
			</a>
		</div>

		<!-- search results -->
		<div class="storiesList row">
		<?php foreach ($searchResults as $currentResult) : ?>
			<article class="col-xs-10 col-xs-offset-1 col-md-8 col-md-offset-2">
					<div>
						<h1><a href="<?= $this->url('content_story',['id' => $currentResult['sto_id']]); ?>"><?= $currentResult['sto_title']; ?></a></h1>
						<p>Written by <?= $currentResult['usr_username']; ?></p>
						<p>Posted on <?= $currentResult['sto_inserted']; ?></p>
						<p><?= \Controller\ContentController::getShortDescription($currentResult['sto_content']); ?></p>
						<a href="<?= $this->url('content_story',['id' => $currentResult['sto_id']]); ?>">Read More</a>
					</div>
					</a>
				</article>
		<?php endforeach; ?>
		</div>

	</section>
<?php $this->stop('main_content') ?>