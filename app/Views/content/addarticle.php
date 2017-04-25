<?php $this->layout('layout', ['title' => 'Add an article', 'currentPage' => 'addarticle']) ?>

<?php $this->start('main_content') ?>

    <form method="POST">
        <input type="text" name="articleTitle">
        <br><br>

        <textarea name="articleContent"></textarea>
        <br><br>

        <input type="text" name="articleTags">
        <br><br>
        
        <input type="submit" name="articleSubmit" value="articleContent">
    </form>

<?php $this->stop('main_content') ?>