<?php session_start();

if ((isset($_SESSION['user_id'])) && (basename($_SERVER['PHP_SELF']) != 'logout.php')) {
	$logg = '<li><a href="logout.php">Logout</a></li>';
} else {
	$logg = '<li><a href="login.php">Login</a></li>';
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title><?php echo $page_title; ?></title>
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">
</head>
<body>
	<div id="navigation"><ul>
		<li><a href="index.php">Home Page</a></li>
		<li><a href="register.php">Register</a></li>
		<li><a href="view_users.php">View Users</a></li>
		<li><a href="password.php">Change Password</a></li>
		<?php echo $logg; //Create a login/logout link: ?>
		<?php if (isset($_SESSION['user_id']) && ($_SESSION['user_id'] == 6)){ echo '<li><a href = "newblogpost.php">Make a Post</a></li>'; } ?>
		<?php //if (isset($_SESSION['user_id']) && ($_SESSION['user_id']){ echo '<li><a href = "posttest.php">Secret page!</a></li>'; } ?>
	</ul></div>
<div id="content"><!-- Start of the page-specific content. -->
<style>
.pagenumbers{
	display: grid;
	place-items: center; 
	text-align: center;
}

#navigation {
	overflow: hidden;
	background-color: #333;
	top: 0;
	width: 100%;
}

#navigation a {
	float: left;
	display: block;
	color: #f2f2f2;
	text-align: left;
	padding: 14px 16px;
	text-decoration: none;
	font-size: 17px;
	transition: .5s;
}

#navigation a:hover {
	background: #ddd;
	color: black;
}	
</style>