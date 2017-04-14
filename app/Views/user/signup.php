<?php $this->layout('layout', ['title' => 'Signup', 'currentPage' => 'signup']) ?>

<?php $this->start('main_content') ?>

<!-- Form with input fields for email and two passwords -->
<form action="" method="post">
    <fieldset>
        <div class="form-group">
            <input type="email" class="form-control" name="email" value="" placeholder="Email Address" />
        </div>

        <div class="form-group">
            <input type="password" class="form-control" name="passwordOne" value="" placeholder="Provide your password" />
        </div>

        <div class="form-group">
            <input type="password" class="form-control" name="passwordTwo" value="" placeholder="Confirm your password" />
        </div>

        <div class="form-group">
            <input type="text" class="form-control" name="country" value="" placeholder="Please enter you country">
        </div>

        <div class="form-group">
            <input type="submit" class="btn btn-success btn-block" value="Sign up" />
        </div>

    </fieldset>
</form>

<?php $this->stop('main_content') ?>
