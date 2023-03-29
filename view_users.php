<?php // This script retrieves all the records from the users table.
$page_title = 'View the Current Users';
include ('header.php');
require ('mysqli_connect.php');
$r = @mysqli_query ($dbc, "SELECT CONCAT(last_name, ', ', first_name) AS name, DATE_FORMAT(registration_date, '%M %d, %Y') AS dr FROM users ORDER BY registration_date ASC");
$num = mysqli_num_rows($r); // Count the number of returned rows
?>

<h1>Registered Users</h1>


<?php
if ($num > 0) { // If it ran OK, display the records.
	echo '<p>There are currently $num registered users.</p>
		<table align="center" cellspacing="3" cellpadding="3" width="75%">
		<tr><td align="left"><b>Name</b></td><td align="left"><b>Date Registered</b></td></tr>
		';
	while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
		echo '<tr><td align="left">' . $row['name'] . '</td><td align="left">' . $row['dr'] . '</td></tr>\n';
	}
	echo '</table>';
	mysqli_free_result ($r);
} else { echo '<p class="error">There are currently no registered users.</p>' };
mysqli_close($dbc);
include ('footer.php');
?>