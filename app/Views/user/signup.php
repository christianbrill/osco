<?php $this->layout('layout', ['title' => 'Signup', 'currentPage' => 'signup']) ?>

<?php $this->start('main_content') ?>

<!-- Form with input fields for email and two passwords -->
<form action="" method="post">
    <div class="form-group">
        <input type="email" class="form-control" name="email" value="<?= isset($_POST['email']) ? htmlentities($_POST['email']) : ''; ?>" placeholder="Email Address" />
    </div>

    <div class="form-group">
        <input type="password" class="form-control" name="passwordOne" value="" placeholder="Provide your password" />
    </div>

    <div class="form-group">
        <input type="password" class="form-control" name="passwordTwo" value="" placeholder="Confirm your password" />
    </div>

    <div class="form-group">
        <!-- <input type="text" class="form-control" name="country" value="<= isset($_POST['country']) ? htmlentities($_POST['country']) : ''; ?>" placeholder="Please enter you country"> -->

        <select class="form-control">
            <option value="">Please select your country</option>
            <? foreach($countryList as $countries) : ?>
                <option value="<?= $countries ?>" name="country"><?= $countries ?></option>
            <? endforeach; ?>
        </select>
    </div>

    <div class="form-group">
        <input type="submit" class="btn btn-success btn-block" value="Sign up" />
    </div>
</form>

<?php $this->stop('main_content') ?>
