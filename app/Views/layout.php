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
</head>
<body>
	<header>
		<nav>
			<h1>
				<a href="<?= $this->url("content_home") ?>">
					<span class="glyphicon glyphicon-home" aria-hidden="true"></span>
				</a>
			</h1>
			<ul class="nav nav-pills">
				<li<?php if($currentPage == 'home'): ?> class="active"<?php endif; ?> role="presentation">
					<a href="">Stories</a>
				</li>
				<li<?php if($currentPage == 'blog'): ?> class="active"<?php endif; ?> role="presentation">
					<a href="">Blog</a>
				</li>

				<li<?php if($currentPage == 'needhelp'): ?> class="active"<?php endif; ?> role="presentation">
					<a href="">Need Help?</a>
				</li>

				<li<?php if($currentPage == 'about'): ?> class="active"<?php endif; ?> role="presentation">
					<a href="">About OSCo</a>
				</li>
				<li<?php if($currentPage == 'login'): ?> class="active"<?php endif; ?> role="presentation">
					<a href="<?= $this->url("user_login") ?>">Log In</a>
				</li>
				<li<?php if($currentPage == 'signup'): ?> class="active"<?php endif; ?> role="presentation">
					<a href="<?= $this->url("user_signup") ?>">Sign Up</a>
				</li>
			</ul>
			<form action="<?= $this->url("content_search") ?>" method="get">
				<input type="text" name="searchInput" placeholder="Search">
				<button type="submit" class="btn btn-sm">
					<span class="glyphicon glyphicon-search" aria-hidden="true"></span>
				</button>
			</form>
		</nav>
	</header>

	<section id="main" class="container">
		<?= $this->section('main_content') ?>
	</section>

	<footer>
		<div id="footerContent">
			<div>
				<h4><a href="">About</a></h4>
				<p>OSCo is blubb.</p>
				<h4>Disclaimer</h4>
				<p>Blubb</p>
				<h4>&copy; Copyright</h4>
			</div>
			<div>
				<h4><a href="">Contact</a></h4>
				<p>osco@contact.lu</p>
				<p>Facebook</p>
				<p>Twitter</p>
			</div>
		</div>
	</footer>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script type="text/javascript" src="<?= $this->assetUrl('js/script.js') ?>"></script>

</body>
</html>
