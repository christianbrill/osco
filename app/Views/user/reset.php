<?php $this->layout('layout', ['title' => 'Reset your password', 'currentPage' => 'reset']) ?>

<?php $this->start('main_content') ?>

<?php if ($displayForm) : ?>

<div class="row">
	<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2  col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3">
		<form action="" method="post">
		    <div class="form-group">
		        <input type="password" class="form-control" name="passwordOne" value="" placeholder="Provide new password" />
		    </div>

		    <div class="form-group">
		        <input type="password" class="form-control" name="passwordTwo" value="" placeholder="Confirm your password" />
		    </div>

		    <div class="form-group">
		        <input type="submit" class="btn btn-success btn-block" value="Change my password" />
		    </div>
		</form>
	</div>
</div>
<?php endif; ?>

<?php $this->stop('main_content') ?>
