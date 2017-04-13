<?php $this->layout('layout', ['title' => 'Home']) ?>

<?php $this->start('main_content') ?>
	<section>
	<?php foreach($randomStories as $story) : ?>
		<article class="homeStory">
			<a href="#">
				<div>
					<h1><?= $story['sto_title'] ?></h1>
					<p><?= \Controller\ContentController::getShortDescription($story['sto_content'])?></p>
				</div>
			</a>
		</article>
	<?php endforeach; ?>

	<button id="refreshStories">Refresh Stories</button>

	<a href="<?= $this->url('user_signup') ?>">Sign up is here</a>
	</section>
<?php $this->stop('main_content') ?>
<script type="text/javascript" src="assets/js/home.js"></script>