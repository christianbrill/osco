<?php

	$w_routes = array(
		// osco.dev/home/
		['GET', '/', 'Content#home', 'content_home'],

		// osco.dev/signup/
		['GET|POST', '/signup/', 'User#signup', 'user_signup'],

		// osco.dev/login/
		['GET', '/login/', 'User#login', 'user_login'],

		// osco.dev/searchResults/
		['GET', '/search/', 'Content#search', 'content_search'],

		// osco.dev/forgot_password/
		['GET|POST', '/forgot_password/', 'User#forgot', 'user_forgot'],

		// osco.dev/reset_password/1234567876544321dfghte345
		['GET|POST', '/reset_password/[a:token]', 'User#reset', 'user_reset'],

		// osco.dev/logout/
		['GET', '/logout/', 'User#logout', 'user_logout'],

		// osco.dev/profile/
		['GET', '/profile/', 'User#profile', 'user_profile'],
	);
