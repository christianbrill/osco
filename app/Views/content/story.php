<?php $this->layout('layout', ['title' => 'OSCo - Story details', 'currentPage' => 'story']) ?>

<?php $this->start('main_content') ?>
	<section id="story">
	<?php foreach($storyInfos as $currentStory) : ?>
		<h1><?= $currentStory['sto_title']; ?></h1>
		<p><?= $currentStory['usr_username']; ?> <?= $currentStory['sto_inserted']; ?></p>
		<p><?= $currentStory['sto_content']; ?></p>
		<p>
		<?php foreach($getEachTag as $currentTag) : ?>
			<button class="tag btn btn-xs"><?= $currentTag ?></button>
		<?php endforeach; ?>
		</p>
		<?php endforeach; ?>
	</section>
<?php $this->stop('main_content') ?>