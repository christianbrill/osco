<?php $this->layout('layout', ['title' => 'Blog', 'currentPage' => 'articles']) ?>

<?php $this->start('main_content') ?>


<section id="articles" class="">
	<div class="pagination">
	<?php if ($page >= 2){
	?>
		<a href="?page=<?= $page-1 ?>" class="before">Previous</a>
	<?php
	}

	if ($nbArticles >= 10){
	?>
		<a href="?page=<?= $page+1 ?>" class="after">Next</a>
	<?php
	}
	?>
	</div>
	
	<div class="orderBox">
		Sort by 
		<a href="?order=DESC">
			<button name="order" class="tag btn btn-xs">Newest</button>
		</a>
		<a href="?order=ASC">
			<button name="order" class="tag btn btn-xs">Oldest</button>
		</a>
	</div>

	<div class="articlesList row">
	<?php foreach($articlesList as $currentArticle) : ?>
		<article class="col-xs-10 col-xs-offset-1 col-md-8 col-md-offset-2">
			<div>
				<h1><a href="<?= $this->url('content_article',['id' => $currentArticle['art_id']]); ?>"><?= $currentArticle['art_title']; ?></a></h1>
				<p><?= \Controller\ContentController::getShortDescription($currentArticle['art_content']); ?></p>
				<a href="<?= $this->url('content_article',['id' => $currentArticle['art_id']]); ?>">Read More</a>
			</div>
			</a>
		</article>
	<?php endforeach; ?>
	</div>

</section>
	
<?php $this->stop('main_content') ?>
