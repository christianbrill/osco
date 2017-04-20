<?php $this->layout('layout', ['title' => 'User Profile', 'currentPage' => 'profile']) ?>

<?php $this->start('main_content') ?>

    <article>
        <!--
        This section accesses the logged-in user and displays their username.
        The user can then change it at will.
        -->
        <section>
            <form class="form-group" action="" method="post" id="changeUsername">
                <h2>Username: </h2>
                <input type="text" class="form-control" name='username' id='username' value="<?= $w_user['usr_username']; ?>"><br>
                <input class="btn btn-success btn-block" type="submit" name="" value="Save"><br>

                <p>To change your username, simply enter a new one and hit "Save"</p>

                <h2>Email: </h2>
                <input type="text" class="form-control" name='email' id='email' value="<?= $w_user['usr_email']; ?>">
            </form>
        </section>

        <!-- The following two are links to change your password and to delete your row (account) from the database -->
        <section>
            <h2>Change your password</h2>

            <form class="form-group" id="hiddenForm" action="" method="post">
                <div class="form-group">
                    <input type="password" class="form-control" name="passwordOne" value="" placeholder="Provide new password" />
                </div>

                <div class="form-group">
                    <input type="password" class="form-control" name="passwordTwo" value="" placeholder="Confirm your password" />
                </div>

                <div class="form-group">
                    <input type="submit" class="btn btn-success btn-block" value="Change it!" />
                </div>
            </form>

        </section>

        <section>
            <h2 id="confirmLink"><a href="#">Delete your account</a></h2>

            <form class="form-group" id="formToDeleteAccount" action="" method="post">
                <label for="passwordToDeleteAccount">Please enter your password to delete your account</label>
                <input class="form-control" type="password" name="passwordToDeleteAccount" value=""><br>

                <button class="btn btn-block btn-success" type="button" name="button">
                    <a style="color:white" id="confirmAnchor" href="">Delete it!</a>
                </button>
            </form>
        </section>
    </article>

<?php $this->stop('main_content') ?>
