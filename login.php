<?php
include('mysqli_connect.php');
session_start();

function redirect_user ($page = 'index.php') {
	$url = rtrim('http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']), '/\\') . "/" . $page;
	header("Location: $url"); 	// Redirect the user
	exit(); 					// Quit the script.
}

if (($_SERVER['QUERY_STRING'] == 'logout') AND !isset($_SESSION['user_id'])) {
	$_SESSION = array();					// Clear the variables.
	session_destroy();						// Destroy the session itself.
	setcookie ('PHPSESSID', '', time()-3600, '/', '', 0, 0); // Destroy the cookie.
	redirect_user('login.php');
}

include ('header.php');

if (!isset($_SESSION['agent']) OR ($_SESSION['agent'] != md5($_SERVER['HTTP_USER_AGENT']))) {
	$page_title = 'Login';
	$is_logged_in = False;
} else {
	$page_title = 'User Details';
	$is_logged_in = True;
}

if (($_SERVER['REQUEST_METHOD'] == 'POST') && ($_SERVER['QUERY_STRING'] != 'register')) {
	if (!isset($_SESSION['user_id'])) {
		$e = mysqli_real_escape_string($dbc, trim($_POST['email']));
		$p = mysqli_real_escape_string($dbc, trim($_POST['password']));
	
		$r = @mysqli_query ($dbc, "SELECT user_id, username FROM users WHERE email='$e' AND password=SHA2('$p',256)"); 																// Run the query.
		if (mysqli_num_rows($r) == 1) {
			$row = mysqli_fetch_array ($r, MYSQLI_ASSOC);
			$_SESSION['user_id'] = $row['user_id'];
			$_SESSION['username'] = $row['username'];
			$_SESSION['agent'] = md5($_SERVER['HTTP_USER_AGENT']);
		} else {
			mysqli_close($dbc);
			redirect_user('login.php?error');
		}
		mysqli_close($dbc);
		redirect_user('login.php');
	}
}

if (($_SERVER['REQUEST_METHOD'] == 'POST') && ($_SERVER['QUERY_STRING'] == 'register')) {
	$errors = array(); // Initialize an error array.
    if (empty($_POST['username'])) { // Check for a user name:
		$errors[] = 'You forgot to enter a username.';
	} else {
		$un = mysqli_real_escape_string($dbc, trim($_POST['username']));
	}
	
	if (empty($_POST['firstname'])) { // Check for a first name:
		$errors[] = 'You forgot to enter your first name.';
	} else {
		$fn = mysqli_real_escape_string($dbc, trim($_POST['firstname']));
	}
	
	if (empty($_POST['lastname'])) { // Check for a last name:
		$errors[] = 'You forgot to enter your last name.';
	} else {
		$ln = mysqli_real_escape_string($dbc, trim($_POST['lastname']));
	}
	
	if (empty($_POST['email'])) { // Check for an email address:
		$errors[] = 'You forgot to enter your email address.';
	} else {
		$e = mysqli_real_escape_string($dbc, trim($_POST['email']));
	}
	
	if (!empty($_POST['password1'])) { // Check for a password and match against the confirmed password:
		if ($_POST['password1'] != $_POST['password2']) {
			$errors[] = 'Your password did not match the confirmed password.';
		} else {
			$p = mysqli_real_escape_string($dbc, trim($_POST['password1']));
		}
	} else {
		$errors[] = 'You forgot to enter your password.';
	}
	
	if (empty($errors)) { // If everything's OK.
		$q = "INSERT INTO users (username, password, email, firstname, lastname) VALUES ('$un', SHA2('$p',256), '$e', '$fn', '$ln')";		
		$r = @mysqli_query ($dbc, $q); // Run the query.
		if ($r) { // If it ran OK.
			echo '<h1>Thank you!</h1>
            <p>You are now registered.</p>';	// Print a message:
		} else { // If it did not run OK.
			echo '<h1>System Error</h1>
			<p class="error">You could not be registered due to a system error. We apologize for any inconvenience.</p>'; // Public message:
			echo '<p>' . mysqli_error($dbc) . '<br /><br />Query: ' . $q . '</p>'; // Debugging message:
		} // End of if ($r) IF.
		mysqli_close($dbc); // Close the database connection.
		exit();
	} else { // Report the errors.
		echo '<h1>Error!</h1>
		<p class="error">The following error(s) occurred:<br />';
		foreach ($errors as $msg) { // Print each error.
			echo " - $msg<br />\n";
		}
		echo '</p><p>Please try again.</p><p><br /></p>';
	} // End of if (empty($errors)) IF.
}
echo ($_SERVER['QUERY_STRING'] == "error") ? "<h2>Error, login failed</h2>" : "";
?>
<p>Login Status: <?php echo $is_logged_in ? "True" : "False"; ?></p>


<?php
if (!isset($_SESSION['agent']) OR ($_SESSION['agent'] != md5($_SERVER['HTTP_USER_AGENT']))) {
	echo '<h1>Login</h1>
	<form action="login.php" method="POST">
		<p>Email Address: <input type="text" name="email" size="20" maxlength="60" /></p>
		<p>Password: <input type="password" name="password" size="20" maxlength="20" /></p>
		<p><input type="submit" name="submit" value="Login" /></p>
	</form>';
	echo '</br>';
	echo '<h1>Register</h1><form action="login.php?register" method="post">';
	echo '<p>Username: <input type="text" name="username" size="15" maxlength="20" value="', $_POST['username'], '" /></p>';
	echo '<p>First Name: <input type="text" name="firstname" size="15" maxlength="20" value="', $_POST['firstname'], '" /></p>';
	echo '<p>Last Name: <input type="text" name="lastname" size="15" maxlength="40" value="', $_POST['lastname'], '" /></p>';
	echo '<p>Email Address: <input type="text" name="email" size="20" maxlength="60" value="', $_POST['email'], '"  /> </p>';
	echo '<p>Password: <input type="password" name="password1" size="10" maxlength="20" value="', $_POST['password1'], '"  /></p>';
	echo '<p>Confirm Password: <input type="password" name="password2" size="10" maxlength="20" value="', $_POST['password2'], '"  /></p>';
	echo '<p><input type="submit" name="submit" value="Register" /></p>';
	echo '</form>';
} else {
	echo '<p>You are logged in as ', $_SESSION['username'], '</p>
	<p><a href="accountsettings.php">Account Settings</a></p><br>
	<p><a href="login.php?logout">Logout</a></p>
	';
}
?>


<?php include ('footer.php'); ?>