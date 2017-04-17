<section id="ajaxHomeStories">
	<?php foreach($randomStories as $story) : ?>
		<article id="storyBox">
			<a href="#">
				<div>
					<h1 id="title"><?= \Controller\ContentController::getShortTitle($story['sto_title']) ?></h1>
					<p><?= \Controller\ContentController::getShortDescription($story['sto_content'])?></p>
				</div>
			</a>
		</article>
	<?php endforeach; ?>
</section>