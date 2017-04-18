<?php $this->layout('layout', ['title' => 'Login', 'currentPage' => 'login']) ?>

<?php $this->start('main_content') ?>

<?= print_r($w_user); ?>

<form action="" method="post">
    <div class="form-group">
        <input type="email" class="form-control" name="email" value="" placeholder="Enter your email address" />
    </div>

    <div class="form-group">
        <input type="password" class="form-control" name="password" value="" placeholder="Enter your password" />
    </div>

    <div class="form-group">
        <a href="<?= $this->url('user_forgot'); ?>">Forgot your password?</a>
    </div>

    <div class="form-group">
        <input type="submit" class="btn btn-success btn-block" value="Log in" />
    </div>
</form>

<?php $this->stop('main_content') ?>
