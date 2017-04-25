<?php $this->layout('layout', ['title' => 'Home', 'currentPage' => 'home']) ?>

<?php $this->start('main_content') ?>

	<div class="row">
		<!--Here starts the "Need Help" box -->
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="needHelpBox">
			<a href="<?= $this->url("content_needhelp")?>">
				<h1>Need Help?</h1>
				<p>OSCo has the contact information you need to get help. If you prefer, we also provide a form for you to get anonymous help-we handle the contact for you.
				<br>You don't need to register to get help. Click this box, or the icon "Need Help" in the nav bar from any page, and get the support you need.</p>
			</a>
		</div>
	</div>

	<div id="ajaxHomeStories">
	<?php foreach($randomStories as $story) : ?>
		<article class="storyBox">
			<a href="<?= $this->url('content_story',['id' => $story['sto_id']]); ?>">
				<div>
					<h1 id="title"><?= \Controller\ContentController::getShortTitle($story['sto_title']) ?></h1>
					<p><?= \Controller\ContentController::getShortDescription($story['sto_content'])?></p>
				</div>
			</a>
		</article>
	<?php endforeach; ?>
	</div>		

	<div class="text-center">
		<a href="">
			<span id="refreshStories" class="glyphicon glyphicon-refresh btn" aria-hidden="true"><br> Refresh</span>
		</a>
	</div>

<?php $this->stop('main_content') ?>
