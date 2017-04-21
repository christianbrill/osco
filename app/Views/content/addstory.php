<?php $this->layout('layout', ['title' => 'Add a Story', 'currentPage' => 'addstory']) ?>

<?php $this->start('main_content') ?>

    <form method="POST">
        <input type="text" name="storyTitle"><br><br>
        <textarea name="storyContent"></textarea><br><br>
        <input type="text" name="storyTags"><br><br>
        <input type="submit" name="storySubimt" value="Post Story">
    </form>

   
<?php $this->stop('main_content') ?>