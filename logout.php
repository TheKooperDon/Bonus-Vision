<?php // This page lets the user logout.
session_start(); 							// Access the existing session.
if (!isset($_SESSION['user_id'])) {			// If no session variable exists, redirect the user
	require ('login_functions.inc.php');	// Need the functions:
	redirect_user();	
} else { 									// Cancel the session
	$_SESSION = array();					// Clear the variables.
	session_destroy();						// Destroy the session itself.
	setcookie ('PHPSESSID', '', time()-3600, '/', '', 0, 0); // Destroy the cookie.
}
$page_title = 'Logged Out!';
include ('header.php');
?>

<h1>Logged Out!</h1>
<p>You are now logged out!</p>

<?php include ('footer.php'); ?>