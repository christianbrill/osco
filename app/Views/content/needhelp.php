<?php $this->layout('layout', ['title' => 'Need Help?', 'currentPage' => 'needhelp']) ?>

<?php $this->start('main_content') ?>

    <h1>If you find yourself in a situation of violence, fear, psychological or financial abuse, these organizations in your country will help you:</h1>

    <div class="row">
        <div id="organizationsDiv" class="col-xs-10 col-xs-offset-1 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3">
        	<p></p>
        	<p></p>
        </div>
    </div>

    <!-- If the user is logged in, we display the form so they can send us an organization suggestion -->
    <?php if (!empty($w_user)): ?>
    <h1>Do you know an organization which helps women in your country? Let us know by filling the form below.</h1>

    <div class="row">
        <div class="col-xs-10 col-xs-offset-1 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3">
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
        </div>
    </div>

    <!-- If the user is not logged in, we will display a message that tells them they can send
    us a suggestion concerning organizations -->
    <?php else : ?>

        <h2>If you know an organization, which helps women and you would like to make us aware of it, please <a href="<?= $this->url('user_signup')?>">sign up</a> or <a href="<?= $this->url('user_login')?>">log in</a> to see a form here.</h2>

    <?php endif ?>

    <script type="text/javascript" >
    	var needGeoloc = true;
    </script>

<?php $this->stop('main_content') ?>
