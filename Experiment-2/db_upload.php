<?php
// Connect to the database
$host = "localhost";
$username = "Akil";
$password = "Akilamu@321";
$database = "login_page";
$conn = new mysqli($host, $username, $password, $database);

// Create the likes table
$sql = "CREATE TABLE comments (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    key_id INT(11) NOT NULL,
    u_name VARCHAR(255) NOT NULL,
    comment VARCHAR(255) NOT NULL
)";

if ($conn->query($sql) === TRUE) {
    echo "Table created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

// Close the database connection
$conn->close();
?>