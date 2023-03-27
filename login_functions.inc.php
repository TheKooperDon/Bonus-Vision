<?php
/* This function determines an absolute URL and redirects the user there. The function takes one argument: the page to be redirected to. Default is index.php */
function redirect_user ($page = 'index.php') {
	$url = rtrim('http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']), '/\\') . $page;
	header("Location: $url"); 	// Redirect the user:
	exit(); 					// Quit the script.

/* This function validates the form data (the email address and password).
 * If both are present, the database is queried.
 * The function requires a database connection.
 * The function returns an array of information, including:
 * - a TRUE/FALSE variable indicating success
 * - an array of either errors or the database result
 */
function check_login($dbc, $email = '', $password = '') {
	$errors = array(); 			// Initialize error array
	if (empty($email)) {		// Validate the email address
		$errors[] = 'You forgot to enter your email address.';
	} else {
		$e = mysqli_real_escape_string($dbc, trim($email));
	}
	
	if (empty($password)) {		// Validate the password
		$errors[] = 'You forgot to enter your password.';
	} else {
		$p = mysqli_real_escape_string($dbc, trim($password));
	}

	if (empty($errors)) {																			// If everything's OK.		
		$q = "SELECT user_id, username FROM users WHERE email='$e' AND password=SHA2('$p',256)";	// Retrieve the userid and username for that email/password combination
		$r = @mysqli_query ($dbc, $q); 																// Run the query.
		if (mysqli_num_rows($r) == 1) {																// Check the result
			$row = mysqli_fetch_array ($r, MYSQLI_ASSOC);											// Fetch the record
			return array(true, $row);																// Return true and the record
		} else { $errors[] = 'The email address and password entered do not match those on file.'; } // Not a match!
	}									// End of empty($errors) IF.
	return array(false, $errors);		// Return false and the errors:
}