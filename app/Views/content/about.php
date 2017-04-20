

<?php $this->layout('layout', ['title' => 'About', 'currentPage' => 'about']) ?>

<?php $this->start('main_content') ?>
<!--<div class="well">About Osco<br>

</div>-->


<form name='contactform' action="" method="post">
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
        <textarea class="form-control" name="contactMessage" value="" placeholder="Your message" cols='80' rows='3' ></textarea>
    </div>

    <div class="form-group">
        <input type="submit" class="btn btn-success btn-block" value="Send message" />
    </div>
    <div class="g-recaptcha" data-sitekey="6Le43B0UAAAAAGVZa4bsR-HliOSWg04KU9J6O5-1"></div>
</form>

<?php $this->stop('main_content') ?>

