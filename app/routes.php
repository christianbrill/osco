<?php

	$w_routes = array(
		// osco.dev/home/
		['GET', '/', 'Default#home', 'default_home'],

		// osco.dev/user/signup/
		['GET|POST', '/signup/', 'User#signup', 'user_signup'],
	);
