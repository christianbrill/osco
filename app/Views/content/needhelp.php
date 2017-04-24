<?php $this->layout('layout', ['title' => 'Need Help?', 'currentPage' => 'needhelp']) ?>

<?php $this->start('main_content') ?>


    <h1>If you find yourself in a situation of violence, fear, psychological or financial abuse, these organizations in your country will help you:</h1>

    <div id="organizationsDiv">
    	<p></p>
    	<p></p>
    </div>

    <?php if (!empty($w_user)): ?>
	<h1>Do you know an organization which helps women in your country? Let us know by filling the form below.</h1>
	<form method="post" action="" class="form-group">
    	<label for="orgname">Organization's Name</label><br>
    	<input class="form-control" type="text" name="orgname"><br>

    	<label for="orgemail">Organization's Email</label><br>
    	<input class="form-control" type="email" name="orgemail"><br>

    	<label for="orgphone">Organization's Phone Number</label><br>
    	<input class="form-control" type="text" name="orgphone"><br>
    	
    	<label for="orginfo">More Information</label><br>
    	<textarea class="form-control" name="orginfo"></textarea><br>

        <div class="g-recaptcha" data-sitekey="6Le43B0UAAAAAGVZa4bsR-HliOSWg04KU9J6O5-1"></div><br>

        <input type="submit" name="orgsubmit" class="btn btn-success">

   	</form>	
    <?php endif ?>

    <script type="text/javascript" >
    	var needGeoloc = true;
    </script>

<?php $this->stop('main_content') ?>
