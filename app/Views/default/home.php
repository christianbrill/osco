<?php $this->layout('layout', ['title' => 'Home']) ?>

<?php $this->start('main_content') ?>
	<section>
	<?php foreach($randomStories as $story) : ?>
		<article>
			<a href="#">
				<div>
					<h1><?= $story['sto_title'] ?></h1>
					<p><?= \Controller\DefaultController::getShort($game['sto_content'])?></p>
				</div>
			</a>
		</article>
	<?php endforeach; ?>

	<button id="refreshStories">Refresh Stories</button>

	<a href="<?= $this->url('user_signup') ?>"></a>
	</section>
<?php $this->stop('main_content') ?>
