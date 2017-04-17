<?php $this->layout('layout', ['title' => 'OSCo - Stories', 'currentPage' => 'stories']) ?>

<?php $this->start('main_content') ?>
	<section id="ajaxHomeStories">
	<div>
		<p>Filter Box (Tags)</p>
		
	</div>
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
<?php $this->stop('main_content') ?>