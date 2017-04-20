<?php $this->layout('layout', ['title' => 'Add a Story', 'currentPage' => 'addstory']) ?>

<?php $this->start('main_content') ?>

    <form method="POST">
        <input type="text" name="storyTitle">
        <input type="submit" name="storySubmit">
    </form>

   
<?php $this->stop('main_content') ?>