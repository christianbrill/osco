<?php $this->layout('layout', ['title' => 'Reset your password', 'currentPage' => 'reset']) ?>

<?php $this->start('main_content') ?>

<?php if ($displayForm) : ?>
<form action="" method="post">
    <fieldset>
        <input type="password" class="form-control" name="passwordOne" value="" placeholder="Provide new password" /><br />
        <input type="password" class="form-control" name="passwordTwo" value="" placeholder="Confirm your password" /><br />
        <input type="submit" class="btn btn-success btn-block" value="Change my password" />
    </fieldset>
</form>
<?php endif; ?>

<?php $this->stop('main_content') ?>
