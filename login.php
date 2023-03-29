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

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
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
?>



<br><br><br>
<p>Login Status: <?php echo $is_logged_in ? "True" : "False"; ?></p>

<?php echo ($_SERVER['QUERY_STRING'] == "error") ? "<h2>Error, login failed</h2>" : ""; ?>



<?php
if (!isset($_SESSION['agent']) OR ($_SESSION['agent'] != md5($_SERVER['HTTP_USER_AGENT']))) {
	echo '<h1>Login</h1>
	<form action="login.php" method="POST">
		<p>Email Address: <input type="text" name="email" size="20" maxlength="60" /></p>
		<p>Password: <input type="password" name="password" size="20" maxlength="20" /></p>
		<p><input type="submit" name="submit" value="Login" /></p>
	</form>
	';
} else {
	echo '<p>You are logged in as ', $_SESSION['username'], '</p>
	<p><a href="login.php?logout">Logout</a></p>
	';
}
?>





<?php include ('footer.php'); ?>