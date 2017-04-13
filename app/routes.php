<?php

	$w_routes = array(
		// osco.dev/home/
		['GET', '/', 'Content#home', 'content_home'],

		// osco.dev/signup/
		['GET|POST', '/signup/', 'User#signup', 'user_signup'],

		// osco.dev/login/
		['GET', '/login/', 'User#login', 'user_login'],
	);
