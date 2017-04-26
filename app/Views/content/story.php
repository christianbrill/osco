<?php $this->layout('layout', ['title' => 'OSCo - Story details', 'currentPage' => 'story']) ?>

<?php $this->start('main_content') ?>
	<div class="row">
		<section id="story" class="col-xs-offset-1 col-md-8 col-md-offset-2 ">
			<button class="goBack tag btn btn-xs">Go Back</button>

			<?php foreach($storyInfos as $currentStory) : ?>
			<h1><?= $currentStory['sto_title']; ?></h1>
			<p>Written by <?= $currentStory['usr_username']; ?></p>
			<p>Posted on <?= $currentStory['sto_inserted']; ?></p>
			<p><?= $currentStory['sto_content']; ?></p>
			<p>
			<?php foreach($getEachTag as $currentTag) : ?>
				<p class="tag btn btn-xs"><?= $currentTag ?></p>
			<?php endforeach; ?>
			</p>
			<?php endforeach; ?>		
		</section>		
	</div>
<?php $this->stop('main_content') ?>