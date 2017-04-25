<?php $this->layout('layout', ['title' => 'Add a Story', 'currentPage' => 'addStoryPage']) ?>

<?php $this->start('main_content') ?>

    <form method="POST" class="form" action="<?= $this->url("content_sendStoryToDB")?>">
        <label for="storyTitle" >Story Title</label>
        <input type="text" name="storyTitle" class="form-control">

        <label for="storyContent">Story Content</label>
        <textarea name="storyContent" class="form-control"></textarea>

        <label for="storyTags">Tags</label>
        <input type="text" name="storyTags" class="form-control">

        <input type="submit" name="storySubmit" class="form-control" value="Post Story"><br>
    </form>
   
<?php $this->stop('main_content') ?>