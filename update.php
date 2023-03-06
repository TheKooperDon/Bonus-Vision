<?php 
session_start();
if (!isset($_SESSION['user_id'])  OR ($_SESSION['user_id'] != 6)){
	
}else {
	echo "You need to be logged in as an admin!";
}
$page_title = "Update";
include('header.php'); 
include('mysqli_connect.php');
$sticky_blogpost = "";

?>









<?php

if (isset($_GET['blogpost_id'])){
    $blogpost_id = mysqli_real_escape_string($dbc, trim($_GET['blogpost_id']));
}else{
    $blogpost_id = "";
}

if (isset($_POST['blogpost_body'])){
    $blogpost_body = mysqli_real_escape_string($dbc, trim($_POST['blogpost_body']));
}else{
    $blogpost_body = "";
}
	


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		
	$query = "UPDATE blogposts SET blogpost_body = '$blogpost_body' WHERE blogpost_id = $blogpost_id"; 
	echo
	$results = mysqli_query($dbc,$query); 
		
		if ($results){
			echo "Yay! It worked!!!";
		}else{
			echo "There was an error! Oh no! The Humanity!" . mysqli_error($dbc);
		}	
	}




//pull in the og comment

if (isset($blogpost_id)){
	$sticky_query = "SELECT blogpost_body FROM blogposts WHERE blogpost_id = " . $blogpost_id;
	$sticky_results = mysqli_query($dbc,$sticky_query);
	$sticky_row = mysqli_fetch_array($sticky_results,MYSQLI_ASSOC);
	$sticky_blogpost = $sticky_row['blogpost_body'];
	
}


?>






<form action="update.php?blogpost_id=<?php echo $blogpost_id; ?>" method="post">

	<fieldset>
		
		<legend>Please enter your UPDATED blogpost entry:</legend>
		
		<!--
		Guestbook ID:<br />
		<input name="guestbook_id" type="text"/>
		<br /><br />
		--->
		
		
		<!---
		Email:<br />
		<input name="email" type="text"/>
		<br /><br />
		--->
		Please enter a NEW post: <br />
		<textarea name="blogpost_body" cols="40" rows="5"><?php echo $sticky_blogpost ;?></textarea>
		<br /><br />
		
		<input type="submit" name="submit" value="Submit" />
		
	</fieldset>


</form>








<?php include('footer.php'); ?>