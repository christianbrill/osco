<?php $this->layout('layout', ['title' => 'Blog', 'currentPage' => 'articles']) ?>

<?php $this->start('main_content') ?>


<section id="articles">
		<div class="pagination">
		<?php if ($page >= 2){
		?>
			<a href="?page=<?= $page-1 ?>" class="before">Précédant</a>
		<?php
		}
			
		if ($nbArticles >= 4){
		?>
			<a href="?page=<?= $page+1 ?>" class="after">Suivant</a>
		<?php
		}
		?>
		</div>

		

		<div class="articlesList">
		<?php foreach($articlesList as $currentArticle) : ?>
			<article>
				<div>
					<h1><?= $currentArticle['art_title']; ?></h1>
					<p><?= \Controller\ContentController::getShortDescription($currentArticle['art_content']); ?></p>
					<a href="<?= $this->url('content_article',['id' => $currentArticle['art_id']]); ?>">Read More</a>
				</div>
				</a>
			</article>
		<?php endforeach; ?>
		</div>
	</section>
<?php $this->stop('main_content') ?>
