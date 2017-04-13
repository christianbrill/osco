<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title><?= $this->e($title) ?></title>
	<link rel="stylesheet" type="text/css" href="<?= $this->assetUrl('css/reset.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?= $this->assetUrl('css/normalize.css') ?>css/normalize.css">
	<link rel="stylesheet" type="text/css" href="<?= $this->assetUrl('css/bootstrap.css') ?>css/bootstrap.css">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<link rel="stylesheet" href="<?= $this->assetUrl('css/naomi.min.css') ?>">
</head>
<body>
	<div class="container">
		<header>
			<nav>
				<h1>OSCo</h1>
				<ul>
					<a href="">
						<li>Stories</li>
					</a>
					<a href="">
						<li>Blog</li>
					</a>
					<a href="">
						<li>Support</li>
					</a>
					<a href="">
						<li>About OSCo</li>
					</a>
					<a href="">
						<li>Log In</li>
					</a>
					<a href="">
						<li>Sign Up</li>
					</a>
				</ul>
				<!--<i class='fa fa-search fa-lg' aria-hidden='true'></i>-->
				<form action="" method="get">
				<input type="text" name="searchInput" placeholder="Search">
				</form>
			</nav>
		</header>

		<section id="main">
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
	</div>

	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	
</body>
</html>