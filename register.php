<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	require ('mysqli_connect.php'); // Connect to the db.
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
            <p>You are now registered.</p><p><br /></p>';	// Print a message:
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
?>