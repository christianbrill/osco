<?php

namespace Controller;

use \W\Controller\Controller;

class UserController extends Controller {

	/**
	 * Signup Page
	 * This function will contain all the signup methods that can be called
	 */
	public function signup() {

		// First, we check to see if $_POST is filled
		if (!empty($_POST)) {
			// We need to recover the user data from the input fields (email and two passwords)
			$email = isset($_POST['email']) ? trim(strip_tags($_POST['email'])) : '';
			$passwordOne = isset($_POST['passwordOne']) ? trim(strip_tags($_POST['passwordOne'])) : '';
			$passwordTwo = isset($_POST['passwordTwo']) ? trim(strip_tags($_POST['passwordTwo'])) : '';
		}
	}

}
