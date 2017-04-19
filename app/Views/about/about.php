

<?php $this->layout('layout', ['title' => 'About', 'currentPage' => 'about']) ?>


<?php 
if(isset($_GET['result']) && $_GET['result'] == 'success') {
      echo '<div class="success_msg" > Thank you for contacting us. We will get back to you soon. </div> ';
} ?>

<?php $this->start('main_content') ?>
<!--<div class="well">About Osco<br>

</div>-->

    <form name='email' action="email.php" method="post">
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
        <div class="g-recaptcha" data-sitekey="6LemgR0UAAAAAEGCgaIlrKf1SLHNaQ2Y6zEPgv8u"></div>
    </form>

<?php 
  foreach ($_POST as $key => $value) {
    echo '<p><strong>' . $key.':</strong> '.$value.'</p>';
  }
?>
<?php $this->stop('main_content') ?>

