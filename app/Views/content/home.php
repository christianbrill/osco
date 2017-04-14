<?php $this->layout('layout', ['title' => 'Home', 'currentPage' => 'home']) ?>

<?php $this->start('main_content') ?>
	<?php debug($w_user); ?>

	<section id="ajaxHomeStories">
	<?php foreach($randomStories as $story) : ?>
		<article >
			<a href="#">
				<div>
					<h1><?= \Controller\ContentController::getShortTitle($story['sto_title']) ?></h1>
					<p><?= \Controller\ContentController::getShortDescription($story['sto_content'])?></p>
				</div>
			</a>
		</article>
	<?php endforeach; ?>
	</section>
	<button id="refreshStories">Refresh Stories</button>

<?php $this->stop('main_content') ?>