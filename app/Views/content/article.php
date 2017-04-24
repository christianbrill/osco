<?php $this->layout('layout', ['title' => 'OSCo - Article details', 'currentPage' => 'article']) ?>

<?php $this->start('main_content') ?>
	<section id="article">
	<button class="goBack tag btn btn-xs">Go Back</button>
	<?php foreach($articleInfos as $currentArticle) : ?>
		<h1><?= $currentArticle['art_title']; ?></h1>
		<p><?= $currentArticle['usr_username']; ?> <?= $currentArticle['art_content']; ?></p>
		<p><?= $currentArticle['art_content']; ?></p>
		<p>
		<?php foreach($getEachTag as $currentTag) : ?>
			<button class="tag btn btn-xs"><?= $currentTag ?></button>
		<?php endforeach; ?>
		</p>
		<?php endforeach; ?>
	</section>
<?php $this->stop('main_content') ?>