<?php $this->layout('layout', ['title' => 'User Profile', 'currentPage' => 'profile']) ?>

<?php $this->start('main_content') ?>

    <article>

        <section>
            <h2>Username: </h2>
            <p><?= $w_user['usr_username']; ?></p>

            <h2>Email: </h2>
            <p><?= $w_user['usr_email']; ?></p>

            <h2>Country: </h2>
            <p><?= $w_user['usr_country']; ?></p>
        </section>

        <hr>

        <h1>Change your user information</h1> <br>

        <!-- This section lets the user change their password at will. -->
        <section>
            <form class="form-group" action="<?= $this->url("user_changeusername"); ?>" method="post">
                <h2>Change Your Username</h2>
                <input type="text" class="form-control" name='username'value="<?= $w_user['usr_username']; ?>"><br>
                <input class="btn btn-success btn-block" type="submit" name="" value="Save"><br>

                <p>To change your username, simply enter a new one and hit "Save"</p>
            </form>
        </section>

        <!-- The following two are links to change your password and to delete your row (account) from the database -->
        <section>
            <h2>Change your password</h2>

            <form class="form-group" id="hiddenForm" action="<?= $this->url("user_changepassword"); ?>" method="post">
                <div class="form-group">
                    <input type="password" class="form-control" name="newPasswordOne" value="" placeholder="Provide new password" />
                </div>

                <div class="form-group">
                    <input type="password" class="form-control" name="newPasswordTwo" value="" placeholder="Confirm your password" />
                </div>

                <div class="form-group">
                    <input type="submit" class="btn btn-success btn-block" value="Change it!" />
                </div>
            </form>
        </section>

        <!-- This section will allow the user to delete their account entirely. -->
        <section>
            <h3 id="confirmLink"><a href="#">Delete your account</a></h3>

            <!-- This form is initially hidden and only shows up if you hit the above link. -->
            <form class="form-group" id="formToDeleteAccount" style="display:none" action="" method="post">
                <label for="passwordToDeleteAccount">Please enter your password to delete your account</label>
                <input class="form-control" type="password" name="passwordToDeleteAccount" value=""><br>

                <button class="btn btn-block btn-success" type="button" name="button">
                    <a style="color:white" id="confirmAnchor" href="<?= $this->url("user_deleteaccount"); ?>">Delete it!</a>
                </button>
            </form>
        </section>
    </article>

<?php $this->stop('main_content') ?>
