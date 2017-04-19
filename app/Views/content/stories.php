<?php $this->layout('layout', ['title' => 'OSCo - Stories', 'currentPage' => 'stories']) ?>

<?php $this->start('main_content') ?>
	<section>
		<div class="pagination">
		<?php if ($page >= 2){
		?>
			<a href="?page=<?= $page-1 ?>" class="btn btn-xs">précédant</a>
		<?php
		}
			
		if ($nbStories >= 4){
		?>
			<a href="?page=<?= $page+1 ?>" class="btn btn-xs">suivant</a>
		<?php
		}
		?>
		</div>

		<div class="tags">
		<?php foreach($getEachTag as $currentTag) : ?>
			<a href="#" class="btn btn-xs btn-default"><?= $currentTag; ?></a>
		<?php endforeach; ?>
		</div>

		<div class="storiesList">
		<?php foreach($storiesList as $currentStory) : ?>
			<article>
				<div>
					<h1><?= $currentStory['sto_title']; ?></h1>
					<p><?= \Controller\ContentController::getShortDescription($currentStory['sto_content']); ?></p>
					<a href="<?= $this->url('content_story',['id' => $currentStory['users_id']]); ?>">Read More</a>
				</div>
				</a>
			</article>
		<?php endforeach; ?>
		</div>
	</section>
<?php $this->stop('main_content') ?>