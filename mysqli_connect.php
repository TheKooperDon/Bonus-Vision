<?php // This file contains the database access information.
if (file_exists('/home/infost490s3/secrets.settings.php')) { require '/home/infost490s3/secrets.settings.php'; } // Require secrets
$dbc = @mysqli_connect (DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) OR die ('Could not connect to MySQL: ' . mysqli_connect_error() ); // Make the connection
mysqli_set_charset($dbc, 'utf8'); // Set the encoding
?>