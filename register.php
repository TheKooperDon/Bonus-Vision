<?php # Script 9.5 - register.php #2
// This script performs an INSERT query to add a record to the users table.

$page_title = 'Register';
include ('header.php');

// Check for form submission:
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	require ('mysqli_connect.php'); // Connect to the db.
		
	$errors = array(); // Initialize an error array.

	// Check for a user name:
	if (empty($_POST['username'])) {
		$errors[] = 'You forgot to enter a username.';
	} else {
		$un = mysqli_real_escape_string($dbc, trim($_POST['username']));
	}

	// Check for a first name:
	if (empty($_POST['firstname'])) {
		$errors[] = 'You forgot to enter your first name.';
	} else {
		$fn = mysqli_real_escape_string($dbc, trim($_POST['firstname']));
	}
	
	// Check for a last name:
	if (empty($_POST['lastname'])) {
		$errors[] = 'You forgot to enter your last name.';
	} else {
		$ln = mysqli_real_escape_string($dbc, trim($_POST['lastname']));
	}
	
	// Check for an email address:
	if (empty($_POST['email'])) {
		$errors[] = 'You forgot to enter your email address.';
	} else {
		$e = mysqli_real_escape_string($dbc, trim($_POST['email']));
	}
	
	// Check for a password and match against the confirmed password:
	if (!empty($_POST['password1'])) {
		if ($_POST['password1'] != $_POST['password2']) {
			$errors[] = 'Your password did not match the confirmed password.';
		} else {
			$p = mysqli_real_escape_string($dbc, trim($_POST['password1']));
		}
	} else {
		$errors[] = 'You forgot to enter your password.';
	}
	
	if (empty($errors)) { // If everything's OK.
	
		// Register the user in the database...
		
		// Make the query:
		$q = "INSERT INTO users (username, password, email, firstname, lastname) VALUES ('$un', SHA2('$p',256), '$e', '$fn', '$ln')";		
		$r = @mysqli_query ($dbc, $q); // Run the query.
		if ($r) { // If it ran OK.
		
			// Print a message:
			echo '<h1>Thank you!</h1>
		<p>You are now registered.</p><p><br /></p>';	
		
		} else { // If it did not run OK.
			
			// Public message:
			echo '<h1>System Error</h1>
			<p class="error">You could not be registered due to a system error. We apologize for any inconvenience.</p>'; 
			
			// Debugging message:
			echo '<p>' . mysqli_error($dbc) . '<br /><br />Query: ' . $q . '</p>';
						
		} // End of if ($r) IF.
		
		mysqli_close($dbc); // Close the database connection.

		// Include the footer and quit the script:
		include ('footer.php'); 
		exit();
		
	} else { // Report the errors.
	
		echo '<h1>Error!</h1>
		<p class="error">The following error(s) occurred:<br />';
		foreach ($errors as $msg) { // Print each error.
			echo " - $msg<br />\n";
		}
		echo '</p><p>Please try again.</p><p><br /></p>';
		
	} // End of if (empty($errors)) IF.



 //BEGINNING OF TEST CODE *******************************************************************

// SQL query to select data from database
$sql = " SELECT * FROM movies ORDER BY original_title DESC ";
$result = $mysqli->query($sql);
$mysqli->close();
?>

<section>
        <h1>Movies</h1>
        <!-- TABLE CONSTRUCTION -->
        <table>
            <tr>
                <th>Title</th>
                <th>Genre</th>
                <th>Production Company</th>
                <th>Release Date</th>
            </tr>
            <!-- PHP CODE TO FETCH DATA FROM ROWS -->
            <?php
                // LOOP TILL END OF DATA
                while($rows=$result->fetch_assoc())
                {
            ?>
            <tr>
                <!-- FETCHING DATA FROM EACH
                    ROW OF EVERY COLUMN -->
                <td><?php echo $rows['original_title'];?></td>
                <td><?php echo $rows['genres0name'];?></td>
                <td><?php echo $rows['production_companies0name'];?></td>
                <td><?php echo $rows['release_date'];?></td>
            </tr>
            <?php
                }
            ?>
        </table>
    </section>














<?php

//ENDING OF TEST CODE ***********************************************************************************
	
	mysqli_close($dbc); // Close the database connection.

} // End of the main Submit conditional.
?>
<h1>Register</h1>
<form action="register.php" method="post">
	<p>UserName: <input type="text" name="username" size="15" maxlength="20" value="<?php if (isset($_POST['username'])) echo $_POST['username']; ?>" /></p>
	<p>First Name: <input type="text" name="firstname" size="15" maxlength="20" value="<?php if (isset($_POST['firstname'])) echo $_POST['firstname']; ?>" /></p>
	<p>Last Name: <input type="text" name="lastname" size="15" maxlength="40" value="<?php if (isset($_POST['lastname'])) echo $_POST['lastname']; ?>" /></p>
	<p>Email Address: <input type="text" name="email" size="20" maxlength="60" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>"  /> </p>
	<p>Password: <input type="password" name="password1" size="10" maxlength="20" value="<?php if (isset($_POST['password1'])) echo $_POST['password1']; ?>"  /></p>
	<p>Confirm Password: <input type="password" name="password2" size="10" maxlength="20" value="<?php if (isset($_POST['password2'])) echo $_POST['password2']; ?>"  /></p>
	<p><input type="submit" name="submit" value="Register" /></p>
</form>

<?php include ('footer.php'); ?>