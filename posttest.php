<?php
session_start(); // Start the session.
if (isset($_SESSION['user_id'])) {
	include ('header.php');
	echo 'You are logged out of the secret page'
	
	
} else{ 
	header('Location: http://jsvjr.uwmsois.com/440PHP/Final%20Project/login.php');
}
?>