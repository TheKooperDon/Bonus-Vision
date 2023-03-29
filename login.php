<?php
$page_title = 'Login';
include ('header.php');
?>

<?php
function redirect_user ($page = 'index.php') {
	$url = rtrim('http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']), '/\\') . $page;
	header("Location: $url"); 	// Redirect the user:
	exit(); 					// Quit the script.

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	if ($_SERVER['QUERY_STRING'] == 'logout') {
		session_start(); 							// Access the existing session.
		if (!isset($_SESSION['user_id'])) {			// If no session variable exists, redirect the user
			redirect_user();
		} else { 									// Cancel the session
			$_SESSION = array();					// Clear the variables.
			session_destroy();						// Destroy the session itself.
			setcookie ('PHPSESSID', '', time()-3600, '/', '', 0, 0); // Destroy the cookie.
		}
		redirect_user('login.php');
	}
	
	
	(empty($_POST['email'])) ? $email = '' : $email = $_POST['email'];
	(empty($_POST['password'])) ? $password = '' : $password = $_POST['password'];
	
	$errors = array(); 			// Initialize error array
	if (empty($email)) {		// Validate the email address
		$errors[] = 'You forgot to enter your email address.';
	} else { $e = mysqli_real_escape_string($dbc, trim($email)) };
	
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
			list ($check, $data) = array(true, $row);																// Return true and the record
		} else { $errors[] = 'The email address and password entered do not match those on file.'; } // Not a match!
	} else {
		list ($check, $data) = array(false, $errors);		// Return false and the errors
	}
	
	if ($check) {
		session_start();										// Set the session data:
		$_SESSION['user_id'] = $data['user_id'];
		$_SESSION['username'] = $data['username'];
		$_SESSION['agent'] = md5($_SERVER['HTTP_USER_AGENT']);	// Store the HTTP_USER_AGENT
		redirect_user('login.php');							// Redirect
	} else { 													// Unsuccessful!
		$errors = $data;										// Assign $data to $errors for login_page.inc.php
	}
	mysqli_close($dbc);
}

if (isset($errors) && !empty($errors)) {	// Print any error messages, if they exist
	echo '<h1>Error!</h1>
	<p class="error">The following error(s) occurred:<br />';
	foreach ($errors as $msg) { echo " - $msg<br />\n"; }
	echo '</p><p>Please try again.</p>';
}

session_start(); // Start the session.
if (!isset($_SESSION['agent']) OR ($_SESSION['agent'] != md5($_SERVER['HTTP_USER_AGENT']) )) {
	echo '
<p>You are not logged in.</p>

<h1>Login</h1>
<form action="login.php" method="post">
	<p>Email Address: <input type="text" name="email" size="20" maxlength="60" /></p>
	<p>Password: <input type="password" name="password" size="20" maxlength="20" /></p>
	<p><input type="submit" name="submit" value="Login" /></p>
</form>
	';
} else {
	echo '<h1>Logged In!</h1>
<p>You are now logged in, <?php{$_SESSION['username']}?>!</p>
<p><a href="login.php?logout">Logout</a></p>
	';
}
?>

<?php
$_SERVER['QUERY_STRING']
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
?>







<?php include ('footer.php'); ?>