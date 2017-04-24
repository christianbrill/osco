<?php $this->layout('layout', ['title' => 'Add a Story', 'currentPage' => 'addStoryPage']) ?>

<?php $this->start('main_content') ?>

    <form method="POST" class="form" action="<?= $this->url("content_sendStoryToDB")?>">
        <label for="storyTitle" >Story Title</label><br>
        <input type="text" name="storyTitle" class="form-control"><br>

        <label for="storyContent">Story Content</label><br>
        <textarea name="storyContent" class="form-control"></textarea><br>

        <label for="storyTags">Tags</label><br>
        <input type="text" name="storyTags" class="form-control"><br>
        <input type="submit" name="storySubmit" class="form-control" value="Post Story"><br>
    </form>
   
<?php $this->stop('main_content') ?>