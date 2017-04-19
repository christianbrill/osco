<?php $this->layout('layout', ['title' => 'OSCo - Story details', 'currentPage' => 'story']) ?>

<?php $this->start('main_content') ?>
	<section id="storydetail">
	<?php foreach($storyInfos as $currentStory) : ?>
			<p><?= $currentStory['sto_title']; ?></p>
		<?php endforeach; ?>
	</section>
<?php $this->stop('main_content') ?>