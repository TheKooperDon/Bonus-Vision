<?php
session_start();
if (isset($_SESSION['user_id']) && $_SESSION['user_id'] != 6) {
	header('Location: https://jsvjr.uwmsois.com/440PHP/HW/Final%20Project/login.php');
}

$page_title = "New Blogpost";
include('header.php');
include('mysqli_connect.php');
?>

<?php


//$comment = isset($_POST['comment']) ? $_POST['comment'] : '';

//if ($_SERVER['REQUEST_METHOD'] == 'POST'){

	//Checks if name was submitted, if not, displayy error
	
	//if ($comment == "") {
	  // echo "<br /><strong>Dude the whole point of this form is to enter a comment</strong> <br />";
	//}	
	
//}

//$user_id = "";
//$blogpost_title = "";
//if ($comment != "") {
	//if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	//Checks if name was submitted, if not, displayy error
	//Checks if name was submitted, if not, displayy error
		
		

$user_id = mysqli_real_escape_string($dbc,trim($_SESSION['user_id']));

		
if (isset($_POST['title'])){
	$blogpost_title = mysqli_real_escape_string($dbc, trim($_POST['title']));
}else{
	$blogpost_title = "";
}
		
		
		
if (isset($_POST['blogpost_body'])){
	$blogpost_body = mysqli_real_escape_string($dbc, trim($_POST['blogpost_body']));
}else{
	$blogpost_body = "";
}


	
		

		
		
if (($blogpost_title != "") && ($blogpost_body != "")){		
	if ($_SERVER['REQUEST_METHOD'] == 'POST'){

		$query = "INSERT INTO blogposts (blogpost_id, user_id, blogpost_title,  blogpost_body, blogpost_timestamp) VALUES (' ','$user_id','$blogpost_title','$blogpost_body',NOW())";
		

		$results = mysqli_query($dbc,$query);

		
		
		
	}
	echo "<br /> Nice post!";

		if ($results){
			echo "It worked!";
		}else{
			echo "Its fucked" . mysqli_error($dbc);
		}

}













?>




<form action="newblogpost.php" method="post">

	<fieldset>

		<legend>Please enter your new blog:</legend>
		Please enter a title: <br />
		<input type="text" name="title" />
		<br>
		Please enter a comments: <br />
		<textarea name="blogpost_body" cols="40" rows="5"></textarea>
		<br /><br />

		<input type="submit" name="submit" value="Submit" />

	</fieldset>


</form>

<?php
//*************************************************************************
//Overall Form Validation, if everything is filled out then display confirmation message




?>

<?php include('footer.php'); ?>