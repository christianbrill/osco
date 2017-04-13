<?php

namespace Controller;

use \W\Controller\Controller;

class UserController extends Controller {

	/**
	 * Signup Page
	 * This function will contain all the signup methods that can be called
	 */
	public function signup() {
		$this->show('user/signup');

		// This empties the alerts that are stored in Session
		//unset($_SESSION['flash']);

		// First, we check to see if $_POST is filled
		if (!empty($_POST)) {

			debug($_POST);

			// We need to recover the user data from the input fields (email and two passwords)
			$email = isset($_POST['email']) ? trim(strip_tags($_POST['email'])) : '';
			$passwordOne = isset($_POST['passwordOne']) ? trim(strip_tags($_POST['passwordOne'])) : '';
			$passwordTwo = isset($_POST['passwordTwo']) ? trim(strip_tags($_POST['passwordTwo'])) : '';

			// Now we create an "errorList" variable, which will contain potential errors during the signup process and show them to us
			$errorList = array();

			// User Data Validation (if there is an error, it will be added to errorList and displayed later)
			// ==============================================
			// There needs to be a valid email address
			if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
				$errorList[] = 'Your email address is not valid.';
			}

			// The password needs to be at least 8 characters long
			if (strlen($passwordOne) < 8) {
				$errorList[] = 'Your password needs to be at least 8 characters long.';
			}

			// Password One and Password Two need to be the same
			if ($passwordOne != $passwordTwo) {
				$errorList[] = 'Your passwords do not match.';
			}

			// If all data is right, do this:
			if (empty($errorList)) {
				// Now we test and see if the email address already exists by using a method that exists in UsersModel
				$userModel = new \W\Model\UsersModel();

				if ($userModel->emailExists($email)) {
					$this->flash('I\'m sorry, but this email address already exists.', 'danger');
				} else {
					// If the email doesn't already exist in the database, continue on with the encryption of the password by using the mthod "hashPassword" which already exists in Framework W
					$authentificationModel = new \W\Security\authentificationModel();
					$hashedPassword = $authentificationModel->hashPassword($passwordOne);

					// Then we can insert the user data in the database
					$insertUserData = $userModel->insert(array(
						'usr_email' => $email,
						'usr_password' => $hashedPassword,
						'usr_role' => 'user'
					));

					// If the signup was successful, we will redirect the user to the login page
					if (!empty($insertUserData)) {
						// A success message will be displayed
						$this->flash('Congratulations, your signup was successful.', 'success');

						// Now we redirect to the login page
						$this->redirectToRoute('user_login');
					} else {
						// If there is an error, display a message:
						//$this->flash('I\'m afraid your signup wasn\'t a success. Try again, please.', 'danger');
						print_r($errorList);
					}
				}
			} // if (empty($errorList)) end
		} // if (!empty($_POST)) end
	} // public function signup() end



	public function login() {

		$this->show('user/login');
	}

}
