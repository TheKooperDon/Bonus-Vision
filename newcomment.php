<?php
session_start();
if (!isset($_SESSION['user_id'])) {
	header('Location: https://jsvjr.uwmsois.com/440PHP/HW/Final%20Project/login.php');
}
$page_title = "New Comment";
include('header.php');
include('mysqli_connect.php');
?>

<?php


$comment = isset($_POST['comment']) ? $_POST['comment'] : '';

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

	//Checks if name was submitted, if not, displayy error
	
	if ($comment == "") {
	   echo "<br /><strong>Dude the whole point of this form is to enter a comment</strong> <br />";
	}	
	
}

$user_id = "";
$blogpost_id = "";
$user_id = mysqli_real_escape_string($dbc,trim($_SESSION['user_id']));
$blogpost_id = mysqli_real_escape_string($dbc,trim($_GET['blogpost_id']));
if (($comment != "")) {
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	//Checks if name was submitted, if not, displayy error
	//Checks if name was submitted, if not, displayy error
	$comment_body = mysqli_real_escape_string($dbc,trim($_POST['comment']));	
	$query = "INSERT INTO comments (comment_id, user_id, blogpost_id, comment_body, comment_timestamp) VALUES ('','$user_id','$blogpost_id','$comment_body',NOW())";
	
	$results = mysqli_query($dbc,$query);

	if ($results){
		echo "It worked!!!";
	}else{
		echo "Make a comment or exit out" . mysqli_error($dbc);
	}
		
}
		//if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		
}
	echo "<br /> All information is entered and accounted for. Thank you!";
	














?>




<form action="newcomment.php?blogpost_id=<?php echo $blogpost_id; ?>" method="post">

	<fieldset>

		<legend>Please enter your comment:</legend>

		Please enter a comment: <br />
		<textarea name="comment" cols="40" rows="5"><?php echo $comment;?></textarea>
		<br /><br />

		<input type="submit" name="submit" value="Submit" />

	</fieldset>


</form>

<?php
//*************************************************************************
//Overall Form Validation, if everything is filled out then display confirmation message
if ($comment != "") {
	echo "<br /> Your comment is: " . $comment;
	echo "<br />Your comment was subbmitted";


}

?>

<?php include('footer.php'); ?>