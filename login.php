<?php
$page_title = 'Login';
include ('header.php');

function redirect_user ($page = 'index.php') {
	$url = rtrim('http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']), '/\\') . $page;
	header("Location: $url"); 	// Redirect the user
	exit(); 					// Quit the script.
}
?>


<?php session_start(); // Start the session. ?>

<br><br><br>
<p>hehehe</p>
<p><a href='login.php?logout'>With logout</a> br br <a href='login.php'>Without logout</a></p>
<p>query string: <?php $_SERVER['QUERY_STRING'] ?></p>
<p>method: <?php $_SERVER['REQUEST_METHOD'] ?></p>
<p>email: <?php $_POST['email'] ?></p>



<?php
if (!isset($_SESSION['agent']) OR ($_SESSION['agent'] != md5($_SERVER['HTTP_USER_AGENT']) )) {
	echo '<p>You are not logged in.</p>';
	echo '<h1>Login</h1>
	<form action="login.php" method="POST">
		<p>Email Address: <input type="text" name="email" size="20" maxlength="60" /></p>
		<p>Password: <input type="password" name="password" size="20" maxlength="20" /></p>
		<p><input type="submit" name="submit" value="Login" /></p>
	</form>
	';
} else {
	echo '<p>You are now logged in, ', $_SESSION['username'], '!</p>
	<p><a href="login.php?logout">Logout</a></p>
	';
}

errors = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	if ($_SERVER['QUERY_STRING'] == 'logout') {
		$_SESSION = array();					// Clear the variables.
		session_destroy();						// Destroy the session itself.
		setcookie ('PHPSESSID', '', time()-3600, '/', '', 0, 0); // Destroy the cookie.
		redirect_user('login.php');
	}
	if (!isset($_SESSION['user_id'])) {
		if ($_POST['email'] == "") {
			errors[] = "";
		
		include ('mysqli_connect.php');
		
		$e = mysqli_real_escape_string($dbc, trim($_POST['email']));
		$p = mysqli_real_escape_string($dbc, trim($_POST['password']));
	
		$r = @mysqli_query ($dbc, "SELECT user_id, username FROM users WHERE email='$e' AND password=SHA2('$p',256)"); 																// Run the query.
		if (mysqli_num_rows($r) == 1) {
			$row = mysqli_fetch_array ($r, MYSQLI_ASSOC);
			$_SESSION['user_id'] = $data['user_id'];
			$_SESSION['username'] = $data['username'];
			$_SESSION['agent'] = md5($_SERVER['HTTP_USER_AGENT']);
		} else {
			echo "<p>hehehe bad login</p>";
		}
		mysqli_close($dbc);
	}
}
/*

if (isset($errors) && !empty($errors)) {	// Print any error messages, if they exist
	echo '<h1>Error!</h1>
	<p class="error">The following error(s) occurred:<br />';
	foreach ($errors as $msg) { echo " - $msg<br />\n"; }
	echo '</p><p>Please try again.</p>';
}


$_SERVER['QUERY_STRING']
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
*/
?>



<?php include ('footer.php'); ?>