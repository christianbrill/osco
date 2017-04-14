<?php $this->layout('layout', ['title' => 'Reset your password', 'currentPage' => 'reset']) ?>

<?php $this->start('main_content') ?>

<?php if ($displayForm) : ?>
<form action="" method="post">
    <fieldset>
        <div class="form-group">
            <input type="password" class="form-control" name="passwordOne" value="" placeholder="Provide new password" />
        </div>

        <div class="form-group">
            <input type="password" class="form-control" name="passwordTwo" value="" placeholder="Confirm your password" />
        </div>

        <div class="form-group">
            <input type="submit" class="btn btn-success btn-block" value="Change my password" />
        </div>
    </fieldset>
</form>
<?php endif; ?>

<?php $this->stop('main_content') ?>
