<?php

	$w_routes = array(
		// osco.dev/home/
		['GET', '/', 'Default#home', 'default_home'],

		// osco.dev/signup/
		['GET|POST', '/user/signup/', 'User#signup', 'user_signup'],

		// osco.dev/login/
		['GET', '/user/login/', 'User#login', 'user_login'],
	);
