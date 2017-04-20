<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title><?= $this->e($title) ?></title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<link rel="stylesheet" href="<?= $this->assetUrl('css/naomi.min.css') ?>">
	<script src='https://www.google.com/recaptcha/api.js'></script>

</head>
<body>
	<header>
		<nav id="mobileNavigation">
			<span class="menuIcon glyphicon glyphicon-align-justify" aria-hidden="true"></span>
			<h1><a href="<?= $this->url("content_home") ?>">OSCo</a></h1>
			<form action="<?= $this->url("content_search") ?>" method="get">
				<input type="text" name="searchInput" placeholder="Search">
			</form>

			<ul id="mobileMenu" class="nav nav-pills">
				<li<?php if($currentPage == 'stories'): ?> class="active"<?php endif; ?> role="presentation">
					<a href="<?= $this->url("content_stories") ?>">Stories</a>
				</li>

				<li<?php if($currentPage == 'needhelp'): ?> class="active"<?php endif; ?> role="presentation">
					<a href="<?= $this->url("content_needhelp") ?>">Need Help?</a>
				</li>

				<li<?php if($currentPage == 'about'): ?> class="active"<?php endif; ?> role="presentation">
					<a href="<?= $this->url("content_contactform") ?>">About OSCo</a>
				</li>

				<!-- If the user is logged in, the Profile and Logout button will show up, as well as the "Add Story" option. -->
				<?php if (!empty($w_user)) : ?>
					<li<?php if($currentPage == 'profile'): ?> class="active"<?php endif; ?> role="presentation">
						<a href="<?= $this->url("user_profile") ?>">Profile</a>
					</li>

					<li role="presentation">
						<a href="<?= $this->url("user_logout") ?>">Logout</a>
					</li>

					<li role="presentation">
						<a href="<?= $this->url("content_addstory") ?>"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add a Story</a>
					</li>

				<!-- If the user isn't logged in, the Signup and Login links will show up. -->
				<?php else : ?>

					<li<?php if($currentPage == 'signup'): ?> class="active"<?php endif; ?> role="presentation">
						<a href="<?= $this->url("user_signup") ?>">Sign Up</a>
					</li>

					<li<?php if($currentPage == 'login'): ?> class="active"<?php endif; ?> role="presentation">
						<a href="<?= $this->url("user_login") ?>">Log In</a>
					</li>
				<?php endif; ?>
			</ul>
		</nav>


		<!-- ////////////////////////////////////////// DESKTOP NAVIGATION-->
		<nav id="desktopNavigation">
			<h1>
				<a href="<?= $this->url("content_home") ?>">
					<h1>OSCo</h1>
				</a>
			</h1>

			<ul id="desktopMenu" class="nav nav-pills">
				<li<?php if($currentPage == 'stories'): ?> class="active"<?php endif; ?> role="presentation">
					<a href="<?= $this->url("content_stories") ?>">Stories</a>
				</li>

				<!-- <li<php if($currentPage == 'blog'): ?> class="active"<php endif; ?> role="presentation">
					<a href="">Blog</a>
				</li> -->

				<li<?php if($currentPage == 'needhelp'): ?> class="active"<?php endif; ?> role="presentation">
					<a href="<?= $this->url("content_needhelp") ?>">Need Help?</a>
				</li>

				<li<?php if($currentPage == 'about'): ?> class="active"<?php endif; ?> role="presentation">
					<a href="<?= $this->url("content_contactform") ?>">About OSCo</a>
				</li>

				<!-- If the user is logged in, the Profile and Logout button will show up. -->
				<?php if (!empty($w_user)) : ?>
					<li<?php if($currentPage == 'profile'): ?> class="active"<?php endif; ?> role="presentation">
						<a href="<?= $this->url("user_profile") ?>">Profile</a>
					</li>

					<li role="presentation">
						<a href="<?= $this->url("user_logout") ?>">Logout</a>
					</li>

					<li role="presentation">
						<a href="<?= $this->url("content_addstory") ?>"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add a Story</a>
					</li>

				<!-- If the user isn't logged in, the Signup and Login links will show up. -->
				<?php else : ?>

					<li<?php if($currentPage == 'signup'): ?> class="active"<?php endif; ?> role="presentation">
						<a href="<?= $this->url("user_signup") ?>">Sign Up</a>
					</li>

					<li<?php if($currentPage == 'login'): ?> class="active"<?php endif; ?> role="presentation">
						<a href="<?= $this->url("user_login") ?>">Log In</a>
					</li>
				<?php endif; ?>

			</ul>

			<form action="<?= $this->url("content_search") ?>" method="get">
				<input type="text" name="searchInput" placeholder="Search">
			</form>
		</nav>
	</header>

	<!-- This section will make the flash alert messages show up on the home page. -->
	<section id="main" class="container">
		<?php if (isset($w_flash_message) && !empty($w_flash_message->message)): ?>
			<div class="alert alert-<?= $w_flash_message->level ?>" role="alert">
				<?= $w_flash_message->message ?>
			</div>
		<?php endif; ?>

		<?= $this->section('main_content') ?>
	</section>

	<footer>
		<div id="footerContent">
			<div>
				<h4><a href="">About</a></h4>
				<p>OSCo is life.</p>
				<h4>Disclaimer</h4>
				<p>Blubb</p>
				<p>MyModel ist ein Kopf für dich zum Schminken und Frisieren.</p>
			</div>
			<div>
				<h4><a href="">Contact</a></h4>
				<p>osco@contact.lu</p>
				<p>Facebook</p>
				<p>Twitter</p>
			</div>
			<div>
			<h4>&copy; Copyright 2017 <?php if (date('Y') > 2017) {echo '- '.date('Y');} ?></h4>
			</div>
		</div>
	</footer>



	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script type="text/javascript" src="<?= $this->assetUrl('js/script.js') ?>"></script>

</body>
</html>
