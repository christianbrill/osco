<?php $this->layout('layout', ['title' => 'Login', 'currentPage' => 'login']) ?>

<?php $this->start('main_content') ?>

    <!-- This is the form the user has to fill in to log into their account -->

    <div class="row">
        <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2  col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3">
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
        </div>
    </div>

<?php $this->stop('main_content') ?>
