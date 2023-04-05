<?php
include('mysqli_connect.php');
$page_title = 'Join Us! Login or Register.';
session_start();

function redirect_user ($page = 'index.php') {
	$url = rtrim('http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']), '/\\') . "/" . $page;
	header("Location: $url"); 	// Redirect the user
	exit(); 					// Quit the script.
}

if (($_SERVER['REQUEST_METHOD'] == 'POST') && ($_SERVER['QUERY_STRING'] == 'delete')){
	$errors = array(); // Initialize an error array.
	if (empty($_POST['email'])) {
		$errors[] = 'You forgot to enter your email address.';
	} else {
		$e = mysqli_real_escape_string($dbc, trim($_POST['email']));
	}
	if (!empty($_POST['password'])) {
		if ($_POST['password'] != $_POST['password2']) {
			$errors[] = 'Your passwords did not match.';
		} else {
			$p = mysqli_real_escape_string($dbc, trim($_POST['password']));
		}
	} else {
		$errors[] = 'You forgot to enter your new password.';
	}
	
	if (empty($errors)) { // If everything's OK.
		$q = "DELETE FROM users WHERE (email='$e' AND password=SHA2('$p',256))";
		$r = @mysqli_query($dbc, $q);
		if (mysqli_affected_rows($dbc) == 1) { // Match was made.
			$_SESSION = array();					// Clear the variables.
			session_destroy();						// Destroy the session itself.
			setcookie ('PHPSESSID', '', time()-3600, '/', '', 0, 0); // Destroy the cookie.
			mysqli_close($dbc); // Close the database connection.
			redirect_user('login.php');
		} else { // Invalid email address/password combination.
			echo '<h1>Error!</h1>
			<p class="error">The email address and password do not match those on file.</p>';
		}
	} else { // Report the errors.
		echo '<h1>Error!</h1>
		<p class="error">The following error(s) occurred:<br />';
		foreach ($errors as $msg) { // Print each error.
			echo " - $msg<br />\n";
		}
		echo '</p><p>Please try again.</p><p><br /></p>';
	} // End of if (empty($errors)) IF.
}

if (($_SERVER['QUERY_STRING'] == 'logout') AND isset($_SESSION['user_id'])) {
	$_SESSION = array();					// Clear the variables.
	session_destroy();						// Destroy the session itself.
	setcookie ('PHPSESSID', '', time()-3600, '/', '', 0, 0); // Destroy the cookie.
	redirect_user('login.php');
}

if (!isset($_SESSION['agent']) OR ($_SESSION['agent'] != md5($_SERVER['HTTP_USER_AGENT']))) {
	$is_logged_in = False;
} else {
	$is_logged_in = True;
}

if (($_SERVER['REQUEST_METHOD'] == 'POST') && ($_SERVER['QUERY_STRING'] == 'login')) {
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

include ('header.php');

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
	mysqli_close($dbc); // Close the database connection.
}
echo ($_SERVER['QUERY_STRING'] == "error") ? "<h2>Error, login failed</h2>" : "";



if (($_SERVER['REQUEST_METHOD'] == 'POST') && ($_SERVER['QUERY_STRING'] == 'changepass')){
	$errors = array(); // Initialize an error array.
	if (empty($_POST['email'])) {
		$errors[] = 'You forgot to enter your email address.';
	} else {
		$e = mysqli_real_escape_string($dbc, trim($_POST['email']));
	}
	if (empty($_POST['password'])) {
		$errors[] = 'You forgot to enter your current password.';
	} else {
		$p = mysqli_real_escape_string($dbc, trim($_POST['password']));
	}
	if (!empty($_POST['password1'])) {
		if ($_POST['password1'] != $_POST['password2']) {
			$errors[] = 'Your new password did not match the confirmed password.';
		} else {
			$np = mysqli_real_escape_string($dbc, trim($_POST['password1']));
		}
	} else {
		$errors[] = 'You forgot to enter your new password.';
	}
	
	if (empty($errors)) { // If everything's OK.
		$q = "SELECT user_id FROM users WHERE (email='$e' AND password=SHA2('$p',256) )";
		$r = @mysqli_query($dbc, $q);
		$num = @mysqli_num_rows($r);
		if ($num == 1) { // Match was made.
			$row = mysqli_fetch_array($r, MYSQLI_NUM);
			$q = "UPDATE users SET password=SHA2('$np',256) WHERE user_id=$row[0]";		
			$r = @mysqli_query($dbc, $q);
			if (mysqli_affected_rows($dbc) == 1) { // If it ran OK.
				echo '<h1>Thank you!</h1>
				<p>Your password has been updated successfully.</p><p><br /></p>';	
			} else { // If it did not run OK.
				echo '<h1>System Error</h1>
				<p class="error">Your password could not be changed due to a system error. We apologize for any inconvenience.</p>'; 
				echo '<p>' . mysqli_error($dbc) . '<br /><br />Query: ' . $q . '</p>';
			}
			mysqli_close($dbc); // Close the database connection.
			include ('footer.php'); 
			exit();
		} else { // Invalid email address/password combination.
			echo '<h1>Error!</h1>
			<p class="error">The email address and password do not match those on file.</p>';
		}
	} else { // Report the errors.
		echo '<h1>Error!</h1>
		<p class="error">The following error(s) occurred:<br />';
		foreach ($errors as $msg) { // Print each error.
			echo " - $msg<br />\n";
		}
		echo '</p><p>Please try again.</p><p><br /></p>';
	} // End of if (empty($errors)) IF.
	mysqli_close($dbc); // Close the database connection.
} // End of the main Submit conditional.
?>
<p>Login Status: <?php echo $is_logged_in ? "True" : "False"; ?></p>


<?php
if (!isset($_SESSION['agent']) OR ($_SESSION['agent'] != md5($_SERVER['HTTP_USER_AGENT']))) {
	
	
	echo '<div class="row">
	<div class= "mx-auto col-10 col-md-8 col-lg-6">
	<h1 class= "px-3">Login</h1>
	<form class= "card p-3 bg-light" action="login.php?login" method="POST">
		<p>Email Address: <input class="form-control" type="text" name="email" size="20" maxlength="60" /></p>
		<p>Password: <input class="form-control" type="password" name="password" size="20" maxlength="20" /></p>
		<p><input type="submit" class="btn btn-dark" name="submit" value="Login" /></p>
	</form>
	</div>
	</div>';
	echo '</br>';
	echo '<div class="row">
			<div class= "mx-auto col-10 col-md-8 col-lg-6">
				<h1 class: "px-3">Register</h1>
					<form class= "card p-3 bg-light" action="login.php?register" method="post">';
	echo '<p>Username: <input class="form-control" type="text" name="username" size="15" maxlength="20" value="', isset($_POST['username']) ? $_POST['username'] : '', '" /></p>';
	echo '<p>First Name: <input class="form-control" type="text" name="firstname" size="15" maxlength="20" value="', isset($_POST['firstname']) ? $_POST['firstname'] : '', '" /></p>';
	echo '<p>Last Name: <input class="form-control" type="text" name="lastname" size="15" maxlength="40" value="', isset($_POST['lastname']) ? $_POST['lastname'] : '', '" /></p>';
	echo '<p>Email Address: <input class="form-control" type="text" name="email" size="20" maxlength="60" value="', isset($_POST['email']) ? $_POST['email'] : '', '"  /> </p>';
	echo '<p>Password: <input class="form-control" type="password" name="password1" size="10" maxlength="20" value="', isset($_POST['password1']) ? $_POST['password1'] : '', '"  /></p>';
	echo '<p>Confirm Password: <input class="form-control" type="password" name="password2" size="10" maxlength="20" value="', isset($_POST['password2']) ? $_POST['password2'] : '', '"  /></p>';
	echo '<p><input type="submit" class="btn btn-dark" name="submit" value="Register" /></p>';
	echo '</form>';
	echo '</div>';
	echo '</div>';
	
	
	
} else {
	echo '<div class="p-3">
			<p>You are logged in as: ', $_SESSION['username'], '</p>
			<p><a href="login.php?logout"><button type="button" class="btn btn-dark">Logout</button></a></p>
		</br>
		</div>
	<div class="row">
		<div class= "mx-auto col-10 col-md-8 col-lg-6">
			<h1 class: "px-3">Change Your Password</h1>
				<form class= "card p-3 bg-light" action="login.php?changepass" method="post">
					<p>Email Address: <input class="form-control" type="text" name="email" size="20" maxlength="60" value="', isset($_POST['email']) ? $_POST['email'] : '', '"  /> </p>
					<p>Current Password: <input class="form-control" type="password" name="password" size="10" maxlength="20" value="', isset($_POST['password']) ? $_POST['password'] : '', '"  /></p>
					<p>New Password: <input class="form-control" type="password" name="password1" size="10" maxlength="20" value="', isset($_POST['password1']) ? $_POST['password1'] : '', '"  /></p>
					<p>Confirm New Password: <input class="form-control" type="password" name="password2" size="10" maxlength="20" value="', isset($_POST['password2']) ? $_POST['password2'] : '', '"  /></p>
					<p><input type="submit" class="btn btn-dark" name="submit" value="Change Password" /></p>
				</form>
		</div>
	</div>	
	</br>
	<div class="row">
		<div class= "mx-auto col-10 col-md-8 col-lg-6">
			<h1 class: "px-3">Delete Your Account</h1>
				<form class= "card p-3 bg-light" action="login.php?delete" method="post">
					<p>Email Address: <input class="form-control" type="text" name="email" size="20" maxlength="60" value="', isset($_POST['email']) ? $_POST['email'] : '', '"  /> </p>
					<p>Current Password: <input class="form-control" type="password" name="password" size="10" maxlength="20" value="', isset($_POST['password']) ? $_POST['password'] : '', '"  /></p>
					<p>Confirm Password: <input class="form-control" type="password" name="password2" size="10" maxlength="20" value="', isset($_POST['password2']) ? $_POST['password2'] : '', '"  /></p>
					<p><input type="submit" class="btn btn-dark" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Are you sure? This selection is final."> name="submit" value="Delete" /></p>
				</form>
		</div>
	</div>
	<br>
	<h2 class="text-center">There is no confirm screen, so be careful!</h2>
	';
}
?>


<?php include ('footer.php'); ?>