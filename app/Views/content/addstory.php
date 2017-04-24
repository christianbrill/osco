<?php $this->layout('layout', ['title' => 'Add a Story', 'currentPage' => 'addStoryPage']) ?>

<?php $this->start('main_content') ?>

    <form method="POST" class="form">
        <input type="text" name="storyTitle" class="form-control"><br>
        <textarea name="storyContent" class="form-control"></textarea><br>
        <input type="text" name="storyTags" class="form-control"><br>
        <a href="<?= $this->url("content_addStoryToDB")?>"><input type="submit" name="storySubmit" class="form-control" value="Post Story"></a><br>
    </form>
   
<?php $this->stop('main_content') ?>