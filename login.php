<?php // The script now stores the HTTP_USER_AGENT value for added security.
if ($_SERVER['REQUEST_METHOD'] == 'POST') {			// Check if the form has been submitted
	require ('login_functions.inc.php');			// Helper #1
	require ('mysqli_connect.php');					// Helper #2
	list ($check, $data) = check_login($dbc, $_POST['email'], $_POST['password']);		// Check the login
	if ($check) { 									// OK!
		session_start();							// Set the session data:
		$_SESSION['user_id'] = $data['user_id'];
		$_SESSION['username'] = $data['username'];
		$_SESSION['agent'] = md5($_SERVER['HTTP_USER_AGENT']);		// Store the HTTP_USER_AGENT:
		redirect_user('loggedin.php');				// Redirect
	} else { 										// Unsuccessful!
		$errors = $data;							// Assign $data to $errors for login_page.inc.php
	}
	mysqli_close($dbc); 							// Close the database connection.
} 													// End of the main submit conditional.
include ('login_page.inc.php'); 					// Create the page
?>