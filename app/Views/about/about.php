

<?php $this->layout('layout', ['title' => 'About', 'currentPage' => 'about']) ?>

<?php $this->start('main_content') ?>
<div class="well"><h1>About Osco</h1><br>
Osco is.......  <br>
<br>
<br>
<br></div>

    <form action="email.php" method="post">
        <div class="form-group">
            <input type="email" class="form-control" name="contactEmail" value="" placeholder="Your email address" />
        </div>

        <div class="form-group">
            <input type="text" class="form-control" name="contactFname" value="" placeholder="Your first name" />
        </div>

        <div class="form-group">
            <input type="text" class="form-control" name="contactLname" value="" placeholder="Your last name" />
        </div>

        <div class="form-group">
            <textarea class="form-control" name="contactMessage" value="" placeholder="Your message" cols='80' rows='3' >Enter text here...</textarea>
        </div>

        <div class="form-group">
            <input type="submit" class="btn btn-success btn-block" value="Send message" />
        </div>
    </form>


<?php $this->stop('main_content') ?>

