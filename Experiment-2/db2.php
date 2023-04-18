<?php
$host = "localhost";
$username = "Akil";
$password = "Akilamu@321";
$database = "login_page";

$conn = mysqli_connect($host, $username, $password);

// Check if the connection was successful
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Select the newly created database
mysqli_select_db($conn, "login_page");

// Create a new table
$sql = "CREATE TABLE users (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  password VARCHAR(255) NOT NULL,
  profile_pic VARCHAR(255)
)";

if (mysqli_query($conn, $sql)) {
  echo "Table created successfully";
} else {
  echo "Error creating table: " . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);
?>