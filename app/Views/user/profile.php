<?php $this->layout('layout', ['title' => 'User Profile', 'currentPage' => 'profile']) ?>

<?php $this->start('main_content') ?>

    <article>
        <!--
        This section accesses the logged-in user and displays their username.
        The user can then change it at will.
        -->
        <section>
            <form class="form-group" action="" method="post" id='changeUsername'>
                <label for="username">Username: </label><br>
                <p>To change your username, simply enter a new one and hit "Save"</p>
                <input type="text" class="form-control" name='username' id='username' value="<?= $w_user['usr_username']; ?>"><br>

                <input class="btn btn-primary" type="submit" name="" value="Save"><br>


                <label for="username">Email: </label><br>
                <input type="text" class="form-control" name='email' id='email' value="<?= $w_user['usr_email']; ?>">
            </form>
        </section>

        <!-- The following two are links to change your password and to delete your row (account) from the database -->
        <section>
            <a href="<?= $this->url('user_forgot'); ?>">Change your password</a>
        </section>

        <section>
            <a href="#" id="deletebutton">Delete your account</a>
        </section>
    </article>

<?php $this->stop('main_content') ?>
