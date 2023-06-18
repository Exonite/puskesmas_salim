<?php
// Database connection settings
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_puskesmas";

// Create a new database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the database connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Prepare the SQL query to fetch matching data
$sql = "SELECT id,nik, nama FROM tb_pasien ";

// Execute the SQL query
$result = $conn->query($sql);

// Fetch the matching data and store in an array
$json_array = array();

while($data = mysqli_fetch_assoc($result)){
    $json_array[] = $data;
}

echo json_encode($json_array);

// Close the database connection
$conn->close();
