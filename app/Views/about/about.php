

<?php $this->layout('layout', ['title' => 'About', 'currentPage' => 'about']) ?>
<a href="<?= $this->url('about') ?>">About</a>
<?php>require 'PHPMailerAutoload.php';
$mail = new PHPMailer;?>
<?php $this->start('main_content') ?>

<?php if ($displayContactForm) : ?>
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
            <textarea rows="20" cols="150" class="form-control" name="contactMessage" value="" placeholder="Your message" cols='80' rows='50' >Enter text here...</textarea>
        </div>

        <div class="form-group">
            <input type="submit" class="btn btn-success btn-block" value="Send message" />
        </div>
    </form>
<?php endif; ?>

<?php $this->stop('main_content') ?>

