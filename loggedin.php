<?php // The user is redirected here from login.php.
session_start(); // Start the session.
if (!isset($_SESSION['agent']) OR ($_SESSION['agent'] != md5($_SERVER['HTTP_USER_AGENT']) )) { // If no session value is present, redirect the user, also validate the HTTP_USER_AGENT!
	require ('includes/login_functions.inc.php');
	redirect_user();
}
$page_title = 'Logged In!';
include ('header.php');
?>

<h1>Logged In!</h1>
<p>You are now logged in, <?php{$_SESSION['username']}?>!</p>
<p><a href="logout.php">Logout</a></p>";

<?php include ('footer.php'); ?>