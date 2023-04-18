<?php
// Database connection variables
$host = "localhost";
$username = "Akil";
$password = "Akilamu@321";
$dbname = "login_page";

// Create a connection to the database
$conn = mysqli_connect($host, $username, $password, $dbname);

// Check if the connection was successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// SQL query to create a table named "posts"
$sql = "CREATE TABLE uploads (
        id INT(11) UNSIGNED NOT NULL,
        post_text TEXT NOT NULL,
        profile_pic VARCHAR(255),
        post_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";

// Execute the SQL query
if (mysqli_query($conn, $sql)) {
    echo "Table 'posts' created successfully!";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);
?>
