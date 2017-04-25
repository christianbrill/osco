<?php $this->layout('layout', ['title' => 'Add an article', 'currentPage' => 'addarticle']) ?>

<?php $this->start('main_content') ?>

<div class="row">    
    <section class="col-xs-10 col-xs-offset-1 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3">
	    <form method="POST">
	        <input type="text" name="articleTitle">
	        <br><br>

	        <textarea name="articleContent" rows="20"></textarea>
	        <br><br>

	        <input type="text" name="articleTags">
	        <br><br>
	        
	        <input type="submit" name="articleSubmit" value="articleContent">
	    </form>
    </section>
</div>

<?php $this->stop('main_content') ?>
