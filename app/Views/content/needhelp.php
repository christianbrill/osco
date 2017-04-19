<?php $this->layout('layout', ['title' => 'Need Help?', 'currentPage' => 'needhelp']) ?>

<?php $this->start('main_content') ?>

    <?= debug($w_user); ?>

    <h1>If you find yourself in a situation of violence, fear, psychological or financial abuse, these organizations in your country will help you:</h1>

    <div>
    	<?php foreach ($variable as $key => $value): ?>
    		<h1><?= ?></h1>
    		<h2><?= ?></h2>
    		<p><?= ?></p>
    	<?php endforeach ?>
    </div>


    <?php if (!empty($w_user)): ?>
    	<h1>Do you know an organization which helps women in your country? Let us know by filling the form below.</h1>
    	<form class="form-group">
	    	<label for="orgname">Organization's Name</label><br>
	    	<input class="form-control" type="text" name="orgname"><br>
	    	<label for="orgemail">Organization's Email</label><br>
	    	<input class="form-control" type="email" name="orgemail"><br>
	    	<label for="orgphone">Organization's Phone Number</label><br>
	    	<input class="form-control" type="orgphone" name=""><br>
	    	<label for="orginfo">More Information</label><br>
	    	<textarea class="form-control" name="orginfo"></textarea><br>
   		</form>
    <?php endif ?>

<?php $this->stop('main_content') ?>
