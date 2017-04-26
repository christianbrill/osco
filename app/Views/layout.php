<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title><?= $this->e($title) ?></title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	<link rel="stylesheet" href="<?= $this->assetUrl('css/naomi.min.css') ?>">

	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Roboto|Alfa+Slab+One" rel="stylesheet">

	<!-- recaptcha script tags -->
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
				<li<?php if($currentPage == 'stories'): ?> class="active"<?php endif; ?>>
					<a href="<?= $this->url("content_stories") ?>">Stories</a>
				</li>

				<li<?php if($currentPage == 'articles'): ?> class="active"<?php endif; ?>>
					<a href="<?= $this->url("content_articles") ?>">Blog</a>
				</li>

				<li<?php if($currentPage == 'needhelp'): ?> class="active"<?php endif; ?>>
					<a href="<?= $this->url("content_needhelp") ?>">Need Help?</a>
				</li>

				<li<?php if($currentPage == 'about'): ?> class="active"<?php endif; ?>>
					<a href="<?= $this->url("content_contactform") ?>">About</a>
				</li>

				<!-- If the user is logged in, the Profile and Logout button will show up, as well as the "Add Story" option. -->
				<?php if (!empty($w_user)) : ?>
					<li<?php if($currentPage == 'profile'): ?> class="active"<?php endif; ?>>
						<a href="<?= $this->url("user_profile") ?>">Profile</a>
					</li>

					<li>
						<a href="<?= $this->url("user_logout") ?>">Logout</a>
					</li>

					<li>
						<a href="<?= $this->url("content_addStoryPage") ?>"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add a Story</a>
					</li>

				<!-- If the user isn't logged in, the Signup and Login links will show up. -->
				<?php else : ?>

					<li<?php if($currentPage == 'signup'): ?> class="active"<?php endif; ?>>
						<a href="<?= $this->url("user_signup") ?>">Sign Up</a>
					</li>

					<li<?php if($currentPage == 'login'): ?> class="active"<?php endif; ?>>
						<a href="<?= $this->url("user_login") ?>">Log In</a>
					</li>
				<?php endif; ?>
			</ul>
		</nav>


		<!-- =============================================================
						DESKTOP NAVIGATION
		============================================================== -->
		<nav id="desktopNavigation">

			<h1>
				<a href="<?= $this->url("content_home") ?>">
					<h1>OSCo</h1>
				</a>
			</h1>

			<ul id="desktopMenu" class="nav nav-pills">
				<li<?php if($currentPage == 'stories'): ?> class="active"<?php endif; ?>>
					<a href="<?= $this->url("content_stories") ?>">Stories</a>
				</li>

				<li<?php if($currentPage == 'articles'): ?> class="active"<?php endif; ?>>
					<a href="<?= $this->url("content_articles") ?>">Blog</a>
				</li>

				<li<?php if($currentPage == 'needhelp'): ?> class="active"<?php endif; ?>>
					<a href="<?= $this->url("content_needhelp") ?>">Need Help?</a>
				</li>

				<li<?php if($currentPage == 'about'): ?> class="active"<?php endif; ?>>
					<a href="<?= $this->url("content_contactform") ?>">About</a>
				</li>

				<!-- If the user is logged in, the Profile and Logout button will show up. -->
				<?php if (!empty($w_user)) : ?>
					<li<?php if($currentPage == 'profile'): ?> class="active"<?php endif; ?>>
						<a href="<?= $this->url("user_profile") ?>">Profile</a>
					</li>

					<li>
						<a href="<?= $this->url("user_logout") ?>">Logout</a>
					</li>

					<li>
						<a href="<?= $this->url("content_addStoryPage") ?>"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add a Story</a>
					</li>

				<!-- If the user isn't logged in, the Signup and Login links will show up. -->
				<?php else : ?>

					<li<?php if($currentPage == 'signup'): ?> class="active"<?php endif; ?>>
						<a href="<?= $this->url("user_signup") ?>">Sign Up</a>
					</li>

					<li<?php if($currentPage == 'login'): ?> class="active"<?php endif; ?>>
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
	<section id="main">
		<?php if (isset($w_flash_message) && !empty($w_flash_message->message)): ?>
			<div class="alert alert-<?= $w_flash_message->level ?>" role="alert">
				<?= $w_flash_message->message ?>
			</div>
		<?php endif; ?>

		<?= $this->section('main_content') ?>
	</section>

	<footer>
		<div id="footerContent">
			<section class="faq">
				<h4><a href="">FAQs</a></h4>
				<p><a class="whiteFont" href="<?= $this->url("content_contactform")?>">Who we are</a></p>
				<p><a class="whiteFont" href="<?= $this->url("content_contactform")?>">User Information</a></p>
			</section>

			<section class="links">
				<h4><a href="">Contact</a></h4>
				<p><a href="mailto:osco.contact@gmail.com?subject=Contact">osco.contact@gmail.com</a></p>
				<p>Facebook</p>
				<p>Twitter</p>
			</section>
		</div>

			<section class="copyright">
				<h4>&copy; Copyright 2017 <?php if (date('Y') > 2017) {echo '- '.date('Y');} ?></h4>
				<p>Disclaimer</p>
			</section>
	</footer>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
	<script type="text/javascript" src="<?= $this->assetUrl('js/script.js') ?>"></script>

</body>
</html>
