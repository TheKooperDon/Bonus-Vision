<?php
$page_title = 'Login';
include ('header.php');						// Include the header
if (isset($errors) && !empty($errors)) {	// Print any error messages, if they exist
	echo '<h1>Error!</h1>
	<p class="error">The following error(s) occurred:<br />';
	foreach ($errors as $msg) { echo " - $msg<br />\n"; }
	echo '</p><p>Please try again.</p>';
}?>
<h1>Login</h1>
<form action="login.php" method="post">
	<p>Email Address: <input type="text" name="email" size="20" maxlength="60" /> </p>
	<p>Password: <input type="password" name="password" size="20" maxlength="20" /></p>
	<p><input type="submit" name="submit" value="Login" /></p>
</form>
<?php include ('footer.php'); ?>