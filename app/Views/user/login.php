<?php $this->layout('layout', ['title' => 'Login', 'currentPage' => 'login']) ?>

<?php $this->start('main_content') ?>
<form action="" method="post">
    <fieldset>
        <input type="email" class="form-control" name="email" value="" placeholder="Enter your email address" /><br />
        <input type="password" class="form-control" name="password" value="" placeholder="Enter your password" /><br />
        <!-- <a href="$this->url('user_forgot');">Forgot your password?</a><br><br> -->
        <input type="submit" class="btn btn-success btn-block" value="Log in" />
    </fieldset>
</form>
<?php $this->stop('main_content') ?>
