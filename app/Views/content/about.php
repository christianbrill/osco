

<?php $this->layout('layout', ['title' => 'About', 'currentPage' => 'about']) ?>

<?php $this->start('main_content') ?>

    <!-- FAQ section -->
    <article class="slideDownFaq">
        <section class="faqGeneral">
            <h1>General</h1>

            <div>
                <h2 class="accordion"><a href="#">What does OSCo stand for?</a></h2>
                <div class="panel">Online Support Community</div>
            </div>

            <div>
                <h2 class="accordion"><a href="#">What are we all about?</a></h2>
                <div class="panel">Just as our name suggests, we stand up for supporting women all over the planet. This platform can be used to share your stories of success, advice, or defeat. However, no matter what your story is, the most important thing is to tell it. This platform is to be reminded of the fact that you are not alone and there is always help to be found, no matter where you are.</div>
            </div>
        </section>

        <section class="faqUser">
            <h1>User Info</h1>

            <div>
                <h2>Will we have access to your personal information?</h2>
                <p>We will have only as much information as you give us.</p>
            </div>

            <div>
                <h2>What information must I provide during the signup?</h2>
                <p>When you sign up, we merely ask you for your email, a password, and the country you live in. Your password will never be shown to us or anyone else.</p>
            </div>

            <div>
                <h2>How can I delete my account?</h2>
                <p>Deleting your account is easy, just log in and head over to your profile. Scroll down to the bottom and click on “Delete my account”. After confirming your password, your account will have been deleted.</p>
            </div>

            <div>
                <h2>Do I leave behind any tracks of myself when my account is deleted?</h2>
                <p>No, all your information will be deleted and cannot be retrieved by you or us.</p>
            </div>

            <div>
                <h2>How can I change my password?</h2>
                <p>If you’d like to change your password, simply log in and go to your profile. Once there, click on “Change your password”.</p>
            </div>
        </section>
    </article>

    <!-- Form which sends user's message to osco.contact@gmail.com -->
    <form name='contactform' action="" method="post">
        <h2>If you have any questions, suggestions, or comments, feel free to get in touch with us.</h2>
        <p>Your email will be treated in absolute confidentiality and will never be seen by anyone by whom you don't want it to be seen.</p>

        <div class="form-group">
            <input type="email" class="form-control" name="contactEmail" value="" placeholder="Your email address" />
        </div>

        <div class="form-group">
            <input type="text" class="form-control" name="contactFname" value="" placeholder="Your first name" />
        </div>

        <div class="form-group">
            <input type="text" class="form-control" name="contactLname" value="" placeholder="Your last name" />
        </div>

        <div class="form-group">
            <textarea class="form-control" name="contactMessage" value="" placeholder="Your message" cols='80' rows='3' ></textarea>
        </div>

        <div class="form-group">
            <input type="submit" class="btn btn-success btn-block" value="Send message" />
        </div>

        <!-- Captcha to be checked in order to send email -->
        <div class="g-recaptcha" data-sitekey="6Le43B0UAAAAAGVZa4bsR-HliOSWg04KU9J6O5-1"></div>
    </form>

<?php $this->stop('main_content') ?>
