<?php

	$w_routes = array(
		// osco.dev/home/
		['GET', '/', 'Content#home', 'content_home'],

		// osco.dev/stories/
		['GET', '/stories/', 'Content#stories', 'content_stories'],

		// osco.dev/story/
		['GET', '/story/[i:id]', 'Content#story', 'content_story'],

		// osco.dev/search/
		['GET', '/search/', 'Content#search', 'content_search'],

		// osco.dev/about
		['GET|POST', '/about/', 'content#contactform', 'content_contactform'],

		// osco.dev/profile/
		['GET', '/profile/', 'User#profile', 'user_profile'],

		// osco.dev/needhelp/
		['GET', '/needhelp/', 'Content#needhelp', 'content_needhelp'],

		// osco.dev/addstory/
		['GET|POST', '/addstory/', 'Content#addstory', 'content_addstory'],

		/**
		* Signup/Login Routes
		*/

		// osco.dev/signup/
		['GET|POST', '/signup/', 'User#signup', 'user_signup'],

		// osco.dev/login/
		['GET', '/login/', 'User#login', 'user_login'],
		['POST', '/login/', 'User#loginPost', 'user_loginpost'],

		// osco.dev/forgot_password/
		['GET|POST', '/forgot/', 'User#forgot', 'user_forgot'],

		// osco.dev/reset_password/1234567876544321dfghte345
		['GET|POST', '/reset/[a:token]', 'User#reset', 'user_reset'],

		// osco.dev/logout/
		['GET', '/logout/', 'User#logout', 'user_logout'],

		// osco.dev/changePassword/
		//['GET', '/changepassword/', 'User#changePassword', 'user_changepassword'],

		// osco.dev/deleteaccount/
		['GET|POST', '/deleteaccount/', 'User#deleteAccount', 'user_deleteaccount'],

		// osco.dev/changeusername/
		['GET|POST', '/changeusername/', 'User#changeUsername', 'user_changeusername'],

		/**
		* Ajax Routes
		*/

		// ajax needhelp route
		['POST', '/ajax/needhelp/', 'Content#ajaxNeedHelp', 'content_ajaxNeedHelp'],

		// ajax home route
		['GET', '/ajax/home/', 'Content#ajaxRefresh', 'content_ajaxRefresh'],
	);
