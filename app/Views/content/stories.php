<?php $this->layout('layout', ['title' => 'OSCo - Stories', 'currentPage' => 'stories']) ?>

<?php $this->start('main_content') ?>
	<section id="stories">
		<div class="pagination">
		<?php if ($page >= 2){
		?>
			<a href="?page=<?= $page-1 ?>" class="before">Previous</a>
		<?php
		}
			
		if ($nbStories >= 10){
		?>
			<a href="?page=<?= $page+1 ?>" class="after">Next</a>
		<?php
		}
		?>
		</div>

		<!--<div class="tags">
		<php foreach($getEachTag as $currentTag) : ?>
			<a href="#" class="tag btn btn-xs"><?= $currentTag; ?></a>
		<php endforeach; ?>
		</div>-->

		<div class="storiesList">
		<?php foreach($storiesList as $currentStory) : ?>
			<article>
				<div>
					<h1><a href="<?= $this->url('content_story',['id' => $currentStory['sto_id']]); ?>"><?= $currentStory['sto_title']; ?></a></h1>
					<p><?= \Controller\ContentController::getShortDescription($currentStory['sto_content']); ?></p>
					<a href="<?= $this->url('content_story',['id' => $currentStory['sto_id']]); ?>">Read More</a>
				</div>
				</a>
			</article>
		<?php endforeach; ?>
		</div>
	</section>
<?php $this->stop('main_content') ?>