<?php $this->layout('layout', ['title' => 'User Profile', 'currentPage' => 'profile']) ?>

<?php $this->start('main_content') ?>

    <?= debug($w_user); ?>

    <article>
        <!--
        This section accesses the logged-in user and displays their username.
        The user can then change it at will.
        -->

        <section>
            <form class="form-group" action="<?= $this->url("user_changeusername"); ?>" method="post">
                <h2>Username: </h2>
                <input type="text" class="form-control" name='username'value="<?= $w_user['usr_username']; ?>"><br>
                <input class="btn btn-success btn-block" type="submit" name="" value="Save"><br>

                <p>To change your username, simply enter a new one and hit "Save"</p>
            </form>
        </section>

        <section>
            <h2>Email: </h2>
            <p><?= $w_user['usr_email']; ?></p>

            <h2>Country: </h2>
            <p><?= $w_user['usr_country']; ?></p>
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

        <section>
            <h2 id="confirmLink"><a href="#">Delete your account</a></h2>

            <!-- This form is initially hidden and only shows up if you hit the above link. -->
            <form class="form-group" id="formToDeleteAccount" action="<?= $this->url('user_deleteaccount'); ?>" method="post">
                <label for="passwordToDeleteAccount">Please enter your password to delete your account</label>
                <input class="form-control" type="password" name="passwordToDeleteAccount" value=""><br>

                <button class="btn btn-block btn-success" type="button" name="button">
                    <a style="color:white" id="confirmAnchor" href="<?= $this->url("user_deleteaccount"); ?>">Delete it!</a>
                </button>
            </form>
        </section>
    </article>

<?php $this->stop('main_content') ?>
