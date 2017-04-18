<?php $this->layout('layout', ['title' => 'OSCo - Stories', 'currentPage' => 'stories']) ?>

<?php $this->start('main_content') ?>
	<section>
		<div class="pagination">
		<?php if ($page >= 2){
		?>
			<a href="?page=<?= $page-1 ?>">précédant</a>
		<?php
		}
			
		if ($nbStories >= 4){
		?>
			<a href="?page=<?= $page+1 ?>">suivant</a>
		<?php
		}
		?>
		</div>

		<div class="tags">
			<p>Filter Box (Tags)</p>
		</div>

		<div class="storiesList">
		<?php foreach($storiesList as $currentStoryInfos) : ?>
			<article>
				<div>
					<h1><?= \Controller\ContentController::getShortTitle($story['sto_title']) ?></h1>
					<p><?= \Controller\ContentController::getShortDescription($story['sto_content'])?></p>
					<a href="#">Read More</a>
				</div>
				</a>
			</article>
		<?php endforeach; ?>
		</div>
	</section>
<?php $this->stop('main_content') ?>