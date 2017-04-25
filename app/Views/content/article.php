<?php $this->layout('layout', ['title' => 'OSCo - Article details', 'currentPage' => 'article']) ?>

<?php $this->start('main_content') ?>

	<div class="row">
		<section id="article" class="col-xs-offset-1 col-md-8 col-md-offset-2 ">
			<button class="goBack tag btn btn-xs">Go Back</button>

			<?php foreach($articleInfos as $currentArticle) : ?>
				<h1><?= $currentArticle['art_title']; ?></h1>
				<p><?= $currentArticle['art_content']; ?></p>
			<?php endforeach; ?>
		</section>		
	</div>

<?php $this->stop('main_content') ?>