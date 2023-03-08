<?php
//Create Session
session_start();
//header
$page_title = "Home Page";
include('header.php');
include('mysqli_connect.php');

//If a user name is entered display login mesage
	if (isset($_SESSION['first_name'])) {
		echo "You currently logged in as {$_SESSION['first_name']}. Welcome to our website!";
}


// Same Page Delete Code
if (isset($_GET['delete_id']) && (isset($_SESSION['user_id']) && ($_SESSION['user_id'] ==6))){
    $delete_id = mysqli_real_escape_string($dbc, trim($_GET['delete_id'])) ;
	
	$delete_query = "DELETE FROM blogposts WHERE blogpost_id = " . $delete_id;
	$delete_results = mysqli_query($dbc,$delete_query);
	if ($delete_results){
		echo "<h3 style=\"background-color:red;text-align:center;font-size: 100px;\">YO COMMENT GO BYE BYE</h3>";
	}
	
	
//}else{
    //$delete_id = "";
	
	
}




//***********************************************
//PAGINATION SETUP START
//From Textbook Script 10.5 - #5
//***********************************************

// Number of records to show per page:
$display = 3;

// Determine how many pages there are...
if (isset($_GET['p']) && is_numeric($_GET['p'])) { // Already been determined.
$pages = $_GET['p'];
} else { // Need to determine.
// Count the number of records:
$q = "SELECT COUNT(blogpost_id) FROM blogposts";
$r = mysqli_query ($dbc, $q);
$rowp = mysqli_fetch_array ($r, MYSQLI_NUM);
$records = $rowp[0];
// Calculate the number of pages...
if ($records > $display) { // More than 1 page.
$pages = ceil ($records/$display);
} else {
$pages = 1;
}
} // End of p IF.

// Determine where in the database to start returning results...
if (isset($_GET['s']) && is_numeric($_GET['s'])) {
$start = $_GET['s'];
} else {
$start = 0;
}


echo "ITS BLOG POST TIME! <br><br>";



//***********************************************
//PAGINATION SETUP END

//***********************************************


//***********************************************
//SORTING SETUP START

//***********************************************
// Determine the sort...
// Default is by registration date.
$sort = (isset($_GET['sort'])) ? $_GET['sort'] : 'date';

// Determine the sorting order:
switch ($sort) {
	
	
case 'recent':
$order_by = 'blogpost_timestamp DESC';
break;

case 'oldest':
$order_by = 'blogpost_timestamp ASC';
break;

default:
$order_by = 'blogpost_timestamp DESC';
$sort = 'recent';
break;

}

//Sort buttons
echo '<div align="center">';
echo '<strong> Sort By: </strong>';
echo '<a href="?sort=recent">Most Recent</a> |';
echo '<a href="?sort=oldest">Oldest</a> |';

echo '</div>';

//***********************************************
//SORTING SETUP END
//***********************************************

$query = "SELECT * FROM blogposts ORDER BY $order_by LIMIT $start, $display";

$results = mysqli_query($dbc,$query); 


while ($row = mysqli_fetch_array($results,MYSQLI_ASSOC)){
	/*echo $row['fname'] . " " . $row['lname'] . "is: <br> ";
	echo $row['comment'] . " <br>";
	echo "Guestbook ID is " . $row['guestbook_id'] . " <br><br><br> ";
	*/
echo "<div class=\"w3-card-4\" style=\"width:30%; margin:auto;\">";
echo "<header class=\"w3-container w3-blue\">";
echo "<h1>" . $row['blogpost_title'] . "</h1>";
echo "</header>";
echo "<div class=\"w3-container\">";
echo "<p>" . $row['blogpost_body'] . "</p>";
echo "</div>";
echo "<footer class=\"w3-container w3-blue\">";
echo "<h5>" . $row['blogpost_timestamp'] . "</h5>";
echo "<h6>";
echo "<a href='viewcomments.php?blogpost_id=" . $row['blogpost_id'] . "'>Comments</a> | ";

//lock this 
//only admin
if ((isset($_SESSION['user_id']) && ($_SESSION['user_id'] ==6))){
	echo "<a href='update.php?blogpost_id=" . $row['blogpost_id'] . "'>Update Blog Post</a> | ";
}	
//only admin
if ((isset($_SESSION['user_id']) && ($_SESSION['user_id'] ==6))){
	echo "<a href='index.php?delete_id=" . $row['blogpost_id'] . "'>Delete a Post</a> | ";  
}
//any logged in person
if (isset($_SESSION['user_id'])) {
echo "<a href='newcomment.php?blogpost_id=" . $row['blogpost_id'] . "'>Post a Comment</a> | ";  
}
echo"</h6>";
echo "</footer>";
echo "</div><br><br>";

}


//***********************************************
//PAGINATION PREVIOUS AND NEXT PAGE BUTTONS/LINKS START
//***********************************************

// Make the links to other pages, if necessary.

echo "<div class=\"pagenumbers\" ";

if ($pages > 1) {

echo '<br /><p>';
$current_page = ($start/$display) + 1;

// If it's not the first page, make a Previous button:
if ($current_page != 1) {
echo '<a href="?s=' . ($start - $display) . '&p=' . $pages . '&sort=' . $sort . '">Previous</a> ';
}

// Make all the numbered pages:
for ($i = 1; $i <= $pages; $i++) {
if ($i != $current_page) {
echo '<a href="?s=' . (($display * ($i - 1))) . '&p=' . $pages . '&sort=' . $sort . '">' . $i . '</a> ';
} else {
echo $i . ' ';
}
} // End of FOR loop.

// If it's not the last page, make a Next button:
if ($current_page != $pages) {
echo '<a href="?s=' . ($start + $display) . '&p=' . $pages . '&sort=' . $sort . '">Next</a>';
}

echo '</p>'; // Close the paragraph.




} // End of links section.

echo "</div>";
//***********************************************
//PAGINATION PREVIOUS AND NEXT PAGE BUTTONS/LINKS END
//***********************************************
















//header
include('footer.php');
?>
</body>
</html>