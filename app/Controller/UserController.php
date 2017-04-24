<?php

namespace Controller;

use \W\Controller\Controller;

class UserController extends Controller {

	/** ***********************************************************************
	 * Signup
	 *
	 *********************************************************************** */
	public function signup() {

		// This empties the alerts that are stored in Session
		unset($_SESSION['flash']);

		// First, we check to see if $_POST is filled
		if (!empty($_POST)) {

			// We need to recover the user data from the input fields (email and two passwords)
			$email = isset($_POST['email']) ? trim(strip_tags($_POST['email'])) : '';
			$passwordOne = isset($_POST['passwordOne']) ? trim(strip_tags($_POST['passwordOne'])) : '';
			$passwordTwo = isset($_POST['passwordTwo']) ? trim(strip_tags($_POST['passwordTwo'])) : '';
			$country = isset($_POST['selectedCountry']) ? trim(strip_tags($_POST['selectedCountry'])) : '';


			// Now we create an "errorList" variable, which will contain potential errors during the signup process and show them to us
			$errorList = array();

			// User Data Validation (if there is an error, it will
			// be added to errorList and displayed later)
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

			// "Country" needs to be filled
			if (empty($country)) {
				$errorList[] = 'Please provide a country.';
			}

			$this->flash(join('<br>', $errorList), 'danger');

			// If all data is right, do this:
			if (empty($errorList)) {
				// Now we test and see if the email address already exists by using a method that exists in UsersModel
				$userModel = new \W\Model\UsersModel();

				if ($userModel->emailExists($email)) {
					$this->flash('I\'m sorry, but this email address already exists.', 'danger');
				} else {
					// If the email doesn't already exist in the database, continue on with the encryption of the password by using the mthod "hashPassword" which already exists in Framework W
					$authentificationModel = new \W\Security\AuthentificationModel();
					$hashedPassword = $authentificationModel->hashPassword($passwordOne);

					// The following function will create a random 10-character string, which
					// is assigned to be the user's initial username (can be changed later)
					function random_str($length, $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ') {
					    $str = '';
					    $max = mb_strlen($characters, '8bit') - 1;
					    for ($i = 0; $i < $length; ++$i) {
					        $str .= $characters[random_int(0, $max)];
					    }
					    return $str;
					}

					// Then we can insert the user data in the database
					$insertUserData = $userModel->insert(array(
						'usr_email' => $email,
						'usr_password' => $hashedPassword,
						'usr_role' => 'user',
						'usr_country' => $country,
						'usr_username' => random_str(10)
					));

					// If the signup was successful, we will redirect the user to the login page
					if (!empty($insertUserData)) {
						// A success message will be displayed
						$this->flash('Congratulations, your signup was successful.', 'success');

						// Now we redirect to the login page
						$this->redirectToRoute('user_login');
					} else {
						// If there is an error, display a message:
						$this->flash('I\'m afraid your signup wasn\'t a success. Try again, please.', 'danger');
					}
				}
			}
		} // if (!empty($_POST)) end

		// List of countries which are displayed in the select in the signup
		$countryList = ["Afghanistan", "Albania", "Algeria", "American Samoa", "Andorra", "Angola", "Anguilla", "Antarctica", "Antigua and Barbuda", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia and Herzegowina", "Botswana", "Bouvet Island", "Brazil", "British Indian Ocean Territory", "Brunei Darussalam", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Cayman Islands", "Central African Republic", "Chad", "Chile", "China", "Christmas Island", "Cocos (Keeling) Islands", "Colombia", "Comoros", "Congo", "Congo, the Democratic Republic of the", "Cook Islands", "Costa Rica", "Cote d'Ivoire", "Croatia (Hrvatska)", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "East Timor", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Falkland Islands (Malvinas)", "Faroe Islands", "Fiji", "Finland", "France", "France Metropolitan", "French Guiana", "French Polynesia", "French Southern Territories", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", "Greenland", "Grenada", "Guadeloupe", "Guam", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Heard and Mc Donald Islands", "Holy See (Vatican City State)", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran (Islamic Republic of)", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea, Democratic People's Republic of", "Korea, Republic of", "Kuwait", "Kyrgyzstan", "Lao, People's Democratic Republic", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libyan Arab Jamahiriya", "Liechtenstein", "Lithuania", "Luxembourg", "Macau", "Macedonia, The Former Yugoslav Republic of", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Martinique", "Mauritania", "Mauritius", "Mayotte", "Mexico", "Micronesia, Federated States of", "Moldova, Republic of", "Monaco", "Mongolia", "Montserrat", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "Netherlands Antilles", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Niue", "Norfolk Island", "Northern Mariana Islands", "Norway", "Oman", "Pakistan", "Palau", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Pitcairn", "Poland", "Portugal", "Puerto Rico", "Qatar", "Reunion", "Romania", "Russian Federation", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia", "Saint Vincent and the Grenadines", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Seychelles", "Sierra Leone", "Singapore", "Slovakia (Slovak Republic)", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Georgia and the South Sandwich Islands", "Spain", "Sri Lanka", "St. Helena", "St. Pierre and Miquelon", "Sudan", "Suriname", "Svalbard and Jan Mayen Islands", "Swaziland", "Sweden", "Switzerland", "Syrian Arab Republic", "Taiwan, Province of China", "Tajikistan", "Tanzania, United Republic of", "Thailand", "Togo", "Tokelau", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Turks and Caicos Islands", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "United States Minor Outlying Islands", "Uruguay", "Uzbekistan", "Vanuatu", "Venezuela", "Vietnam", "Virgin Islands (British)", "Virgin Islands (U.S.)", "Wallis and Futuna Islands", "Western Sahara", "Yemen", "Yugoslavia", "Zambia", "Zimbabwe"];

		$this->show('user/signup', array(
			'countryList' => $countryList
		));

	}



	/** ***********************************************************************
	 * Login
	 *
	 *********************************************************************** */
	public function login() {
		unset($_SESSION['flash']);

		$this->show('user/login');
	}



	/** ***********************************************************************
	 * Login Post Page
	 *
	 *********************************************************************** */
	 public function loginPost() {

		// We first retrieve the data from POST again
		$email = isset($_POST['email']) ? trim(strip_tags($_POST['email'])) : '';
		$password = isset($_POST['password']) ? trim(strip_tags($_POST['password'])) : '';

		// Creation of errorList variable
		$errorList = array();

		// User Data Validation
		// =========================================================
		// Is email correct?
		if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
			$errorList[] = "Your email address is not valid.";
		}

		// Is password at least 8 characters?
		if (strlen($password) < 8) {
		 	$errorList[] = "Your password needs to be at least 8 characters long.";
		}

		// If everything is OK, do this:
		if (empty($errorList)) {
			// We have to verify the user/password in the database
			$authentificationModel = new \W\Security\AuthentificationModel();
			$userId = $authentificationModel->isValidLoginInfo($email, $password);

			if ($userId > 0) {
				$userModel = new \W\Model\UsersModel();
				$userInfos = $userModel->find($userId);

				// Then we add the user to the session
				$authentificationModel->logUserIn($userInfos);

				// Then we display a success message
				$this->flash("Logged in \"" . $userInfos['usr_email'] . "\" successfully.", 'success');

				// Then the user is redirected to the home page
				$this->redirectToRoute('content_home');
			} else {
				 $this->flash('Your email or password are incorrect.', 'danger');
		 	}
		} else {
			 $this->flash(join('<br>', $errorList), 'danger');
	 	}

		$this->show('user/login');
	}



	 /** ***********************************************************************
 	 * Forgot Password
 	 *
 	 ************************************************************************ */
	 public function forgot() {

		 // When the form has been sent
		 if (!empty($_POST)) {

			 // We need to retrieve the information in POST
			 $email = isset($_POST['email']) ? trim(strip_tags($_POST['email'])) : '';

			 // Now we again create the familiar errorList variable containing an empty array
			 $errorList = array();

			 // User Data Validation
			 // ===================================================
			 // Is email valid?
			 if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
				 $errorList[] = 'Your email address is incorrect.';
			 }

			 // If the email is valid, do the following:
			 if (empty($errorList)) {
				 // We first instantiate a new model
				 $model = new \W\Model\UsersModel();

				 // Then we call the method which returns the user data for a given email
				 $userData = $model->getUserByUsernameOrEmail($email);

				 // If no account exists
				 if ($userData === false) {
					 $this->flash('Email not valid.', 'danger');
				 } else {
					 // Now we generate the token of 32 characters
					 $token = md5(\W\Security\StringUtils::randomString(128));

					 // Then the token is added to the database
					 $model->update(array(
						'usr_token' => $token,
						'usr_token_created' => date('Y-m-d H:i:s')), $userData['id']);

					 // Now we can create the email which will contain the link to reset the password
					 $htmlContent = 'You have requested to reset your password. Please follow the link below to change your password: <a href="' . $this->generateUrl('user_reset', array('token' => $token), true) . '">' . $this->generateUrl('user_reset', array('token' => $token), true) . '</a>';

					 // After this, we can send the email
					 $isSent = \Helper\Tools::sendEmail($userData['usr_email'], 'Change your password', nl2br($htmlContent));

					 if ($isSent) {
						 $this->flash('An email with a link to reset your password has been sent.', 'success');
					 } else {
						 $this->flash('Unfortunately, an error occurred while sending the email.', 'danger');
					 }
				 }
			 } else {
				 $this->flash(join('<br>', $errorList), 'danger');
			 }
		 }

		 $this->show('user/forgot');

	 }



	 /** ***********************************************************************
 	 * Reset Password with token
 	 *
 	 ************************************************************************ */
	 public function reset($token) {


		 // First off, we will have to instantiate the model we created
		 $model = new \Model\UsersModel();
		 $userId = $model->getIdByToken($token);

		 // This variable will be used in "reset.php" to display a form or not
		 $displayForm = false;

		 // If the token does not exist or has expired, do this:
		 if ($userId === false) {
			 $this->flash('Your token is invalid.', 'danger');
		 } else {
			 $displayForm = true;
		 }

		 // Now let's look at the sent form
		 if (!empty($_POST)) {
			 // Again, we will have to retrieve the data
			 $passwordOne = isset($_POST['passwordOne']) ? trim($_POST['passwordOne']) : '';
			 $passwordTwo = isset($_POST['passwordTwo']) ? trim($_POST['passwordTwo']) : '';

			 // We create our beloved errorList variable to test for errors
			 $errorList = array();

			 // User Data Validation
			 // ===================================================

			 // Password needs to be at least 8 characters long
			 if (strlen($passwordOne) < 8) {
				 $errorList[] = 'Your password has to be at least 8 characters long.';
			 }

			 // Passwords must match
			 if ($passwordOne != $passwordTwo) {
				 $errorList[] = 'Your passwords do not match.';
			 }

			 // If all data is OK, do this:
			 if (empty($errorList)) {

				 // We have to hash the new password one more time
				 $authentificationModel = new \W\Security\AuthentificationModel();
				 $hashedPassword = $authentificationModel->hashPassword($passwordOne);

				 // Once the password has been hashed, we can update it in the database
				 $model->update(array(
					 'usr_password' => $hashedPassword,
					 'usr_token' => '',
					 'usr_token_created' => ''
				 ), $userId);

				 // When all this has been successful, display a success message
				 $this->flash('Your password has been changed.', 'success');

				 // Then we redirect the person back to the home page
				 $this->redirectToRoute('content_home');
			 } else {
				 // If the errorList array is not empty, display the error(s)
				 $this->flash(join('<br>', $errorList), 'danger');
			 }
		 } // if (!empty($_POST)) end

		 $this->show('user/reset', array(
			 'displayForm' => $displayForm
		 ));
	 }



	 /** ***********************************************************************
 	 * Logout
	 *
 	 ************************************************************************ */
	 public function logout() {

		 /* In order to log the user out, we need to delete his session by
		 using a method that exists in the AuthentificationModel */
		 $authentificationModel = new \W\Security\AuthentificationModel();
		 $authentificationModel->logUserOut();

		 // Then we redirect the user back to home
		 $this->redirectToRoute('content_home');
	 }



	 /** ***********************************************************************
 	 * Profile
	 *
 	 ************************************************************************ */
	 public function profile() {

		 $this->show('user/profile');
	 }



	 /** ***********************************************************************
 	 * Change Username
	 *
 	 ************************************************************************ */
	 public function changeUsername() {

		 $this->allowTo('user');

		 if (!empty($_POST)) {
			 // We get the new username that the user types in
			 $newUsername = isset($_POST['username']) ? trim($_POST['username']) : '';
			 // ID of the current user
			 $userId = $_SESSION['user']['id'];

			 // Then we can update the user's username by finding the ID
			 $updateUsername = new \Model\UsersModel();
			 $updateUsername->update(array(
				 'usr_username' => $newUsername,
			 ), $userId);

			 // Instantiation of AuthentificationModel to log user out
			 $authentificationModel = new \W\Security\AuthentificationModel();
			 $authentificationModel->logUserOut();

			 // Instantiation of UsersModel to log user back in
			 $userModel = new \W\Model\UsersModel();
			 $userInfos = $userModel->find($userId);

			 // Then we add the user to the session
			 $authentificationModel->logUserIn($userInfos);

			 $this->flash('Your username was changed successfully.', 'success');

			 $this->redirectToRoute('user_profile');

		 } else {
			 $this->flash('There was an error changing your username. Please try again.', 'danger');
		 }

	 }



	 /** ***********************************************************************
 	 * Delete Account
	 *
 	 ************************************************************************ */
	 public function deleteAccount() {

		 $this->allowTo('user');

		 // We access the ID to find the user in the database later
		 $userId = $_SESSION['user']['id'];
		 // We also grab the password the user typed in to see if it's the same as the one in the database
		 $passwordToDeleteAccount = isset($_POST['passwordToDeleteAccount']) ? trim(strip_tags($_POST['passwordToDeleteAccount'])) : '';

		 debug($userId);
		 debug($passwordToDeleteAccount);

		 // We have to encrypt the new password again before we can use the method to see if password is correct
		 $authentificationModel = new \W\Security\AuthentificationModel();
		 $hashedPassword = $authentificationModel->hashPassword($passwordToDeleteAccount);

		 // Now we can use the method which checks if passwords match
		 $userModel = new \Model\UsersModel();
		 $passwordCheckUser = $userModel->isPasswordCorrect($userId, $hashedPassword);

		 // If the above method returns true, delete the user
		 if ($passwordCheckUser) {
			 $userModel = new \Model\UsersModel();
			 $passwordCheckUser = $userModel->deleteUserAccount($userId);
	 	 } else {
			 $this->flash('Your password is incorrect.', 'danger');
		 }

		$this->flash('Your account has been deleted successfully.', 'success');

		$authentificationModel = new \W\Security\AuthentificationModel();
		$authentificationModel->logUserOut();

		$this->redirectToRoute('content_home');
		
	 }


	 /** ***********************************************************************
 	 * Change your password
	 *
 	 ************************************************************************ */
	 public function changePassword() {

		 if (!empty($_POST)) {

			 // We get the user's data
			 $newPasswordOne = isset($_POST['newPasswordOne']) ? trim($_POST['newPasswordOne']) : '';
			 $newPasswordTwo = isset($_POST['newPasswordTwo']) ? trim($_POST['newPasswordTwo']) : '';
			 $userId = $_SESSION['user']['id'];

			 // We create the errorList to display possible errors later
			 $errorList = array();

			 // Password must be 8 characters long
			 if (strlen($newPasswordOne) < 8) {
 				$errorList[] = 'Your password needs to be at least 8 characters long.';
 			}

 			// Password One and Password Two need to be the same
 			if ($newPasswordOne != $newPasswordTwo) {
 				$errorList[] = 'Your passwords do not match.';
 			}

			// If there are no errors
			if (empty($errorList)) {

				// We have to encrypt the new password again before we put it in the database
				$authentificationModel = new \W\Security\AuthentificationModel();
				$hashedPassword = $authentificationModel->hashPassword($newPasswordOne);

				// Instantiation of the user model to see if the password already exists
				$userModel = new \W\Model\UsersModel();
				$doesUserExist = $userModel->usernameExists($hashedPassword);

				// If the username does not already exist, update it in the databse
				if ($doesUserExist === false) {

					// We have to instantiate another model to update the password
					$model = new \Model\UsersModel();

					$model->update(array(
						'usr_password' => $hashedPassword
					), $userId);

					$this->flash('Your password was changed successfully.', 'success');
				} else {

					$this->flash('This username already exists.', 'danger');
				}

			} else {
				$this->flash(join('<br>', $errorList), 'danger');
			}

			$this->redirectToRoute('user_profile');

		 }
	 }
}
