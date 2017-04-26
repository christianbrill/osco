<?php $this->layout('layout', ['title' => 'Signup', 'currentPage' => 'signup']) ?>

<?php $this->start('main_content') ?>

<!-- Form with input fields for email and two passwords -->
    <div class="row">
        <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2  col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3">
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
                    <select name="selectedCountry" class="form-control">
                        <option value="">Please select your country</option>
                        <?php foreach($countryList as $countries) : ?>
                            <option value="<?= $countries ?>" name="country"><?= $countries ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <!-- Captcha for more secure signup -->
                <div class="g-recaptcha" data-sitekey="6Le43B0UAAAAAGVZa4bsR-HliOSWg04KU9J6O5-1"></div><br>

                <div class="form-group">
                    <input type="submit" class="btn btn-success btn-block" value="Sign up" />
                </div>
            </form>
        </div>
    </div>

<?php $this->stop('main_content') ?>
