<?php $this->layout('layout', ['title' => 'Signup', 'currentPage' => 'signup']) ?>

<?php $this->start('main_content') ?>
<form action="" method="post">
    <fieldset>
        <!-- Input fields for email and passwords -->
        <input type="email" class="form-control" name="email" value="" placeholder="Email Address" /><br />
        <input type="password" class="form-control" name="passwordOne" value="" placeholder="Provide your password" /><br />
        <input type="password" class="form-control" name="passwordTwo" value="" placeholder="Confirm your password" /><br />
        <input type="submit" class="btn btn-success btn-block" value="Sign up" /><br />
    </fieldset>
</form>
<?php $this->stop('main_content') ?>
