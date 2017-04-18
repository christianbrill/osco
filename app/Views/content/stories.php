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
			<p><?= $currentTag['sto_tags']; ?></p>
		<?php endforeach; ?>
		</div>

		<div class="storiesList">
		<?php foreach($storiesList as $currentStoryInfos) : ?>
			<article>
				<div>
					<h1><?= $currentStoryInfos['sto_title']; ?></h1>
					<p><?= \Controller\ContentController::getShortDescription($currentStoryInfos['sto_content']); ?></p>
					<a href="#">Read More</a>
				</div>
				</a>
			</article>
		<?php endforeach; ?>
		</div>
	</section>
<?php $this->stop('main_content') ?>