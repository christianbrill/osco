<?php $this->layout('layout', ['title' => 'Forgot your password', 'currentPage' => 'forgot']) ?>

<?php $this->start('main_content') ?>

<!-- Form with input field to get user's email to send them a reset password email -->
<form action="" method="post">
    <fieldset>
        <div class="form-group">
            <input type="email" class="form-control" name="email" value="" placeholder="Enter your email address" /><br />
        </div>

        <div class="form-group">
            <input type="submit" class="btn btn-success btn-block" value="Click to send a reset email" />
        </div>
    </fieldset>
</form>

<?php $this->stop('main_content') ?>
