<?php
// Establish a connection to the MySQL database
$db = mysqli_connect('localhost', 'root', '', 'db_puskesmas');

// Check if the connection was successful
if (!$db) {
    die('Could not connect to the database: ' . mysqli_connect_error());
}

// Return the database connection object
return $db;
?>
