<?php $this->layout('layout', ['title' => 'OSCo - Stories', 'currentPage' => 'stories']) ?>

<?php $this->start('main_content') ?>
	<section id="stories">
		<div class="pagination">
		<?php if ($page >= 2){
		?>
			<a href="?page=<?= $page-1 ?>" class="before">Précédant</a>
		<?php
		}
			
		if ($nbStories >= 4){
		?>
			<a href="?page=<?= $page+1 ?>" class="after">Suivant</a>
		<?php
		}
		?>
		</div>

		<div class="tags">
		<?php foreach($getEachTag as $currentTag) : ?>
			<a href="#" class="tag btn btn-xs"><?= $currentTag; ?></a>
		<?php endforeach; ?>
		</div>

		<div class="storiesList">
		<?php foreach($storiesList as $currentStory) : ?>
			<article>
				<div>
					<h1><?= $currentStory['sto_title']; ?></h1>
					<p><?= \Controller\ContentController::getShortDescription($currentStory['sto_content']); ?></p>
					<a href="<?= $this->url('content_story',['id' => $currentStory['sto_id']]); ?>">Read More</a>
				</div>
				</a>
			</article>
		<?php endforeach; ?>
		</div>
	</section>
<?php $this->stop('main_content') ?>