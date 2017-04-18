<?php $this->layout('layout', ['title' => 'User Profile', 'currentPage' => 'profile']) ?>

<?php $this->start('main_content') ?>

    <article>
        <section>
            <h3>Username:</h3>
            <p><p>
        </section>

        <section>
            <h3>Email Address:</h3>
            <p></p>
        </section>

        <section>
            <a href="#">Change your password</a>
        </section>

        <section>
            <a href="#">Delete your account</a>
        </section>
    </article>

<?php $this->stop('main_content') ?>
