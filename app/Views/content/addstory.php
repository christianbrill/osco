<?php $this->layout('layout', ['title' => 'Add a Story', 'currentPage' => 'addStoryPage']) ?>

<?php $this->start('main_content') ?>

<div class="row">    
    <section class="col-xs-10 col-xs-offset-1 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3">
	    <form method="POST" class="form" action="<?= $this->url("content_sendStoryToDB")?>">
	        <label for="storyTitle" >Story Title</label>
	        <input type="text" name="storyTitle" class="form-control">

	        <label for="storyContent">Story Content</label>
	        <textarea name="storyContent" class="form-control" rows="10"></textarea>

	        <label for="storyTags">Tags</label>
	        <input type="text" name="storyTags" class="form-control"><br>

	        <input type="submit" name="storySubmit" class="form-control" value="Post Story"><br>
	    </form>    	
    </section>
</div>

   
<?php $this->stop('main_content') ?>