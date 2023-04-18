<?php
// Start the session and check if the user is logged in
session_start();
if (!isset($_SESSION['email'])) {
  header("Location: login.php");
  exit();
}

// Connect to the database
$host = "localhost";
$username = "Akil";
$password = "Akilamu@321";
$dbname = "login_page";

$conn = new mysqli($host, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Check if the form has been submitted
if (isset($_POST['submit'])) {
  // Check if a file has been uploaded
  if (isset($_FILES['image'])) {
    $errors = array();

    // Get the file name and type
    $file_name = $_FILES['image']['name'];
    $file_type = $_FILES['image']['type'];

    // Check if the file type is PNG
    if ($file_type != 'image/png') {
      $errors[] = 'The file must be a PNG image';
    }

    // Check if there are any errors
    if (empty($errors)) {
      // Get the user's ID from the session
      $user_id = $_SESSION['user_id'];

      // Generate a unique file name
      $file_name = uniqid() . '.png';

      // Move the uploaded file to the uploads directory
      move_uploaded_file($_FILES['image']['tmp_name'], 'uploads/' . $file_name);

      // Check if the user's profile picture already exists in the database
      $sql = "SELECT * FROM users WHERE id=$user_id";
      $result = mysqli_query($conn, $sql);
      $row = mysqli_fetch_assoc($result);

      if ($row['profile_pic'] != '') {
        // Update the user's profile picture in the database
        $sql = "UPDATE users SET profile_pic='$file_name' WHERE id=$user_id";
      } else {
        // Insert the user's ID, username and profile picture into the database
        $sql = "INSERT INTO users (id, profile_pic) VALUES ('$user_id', '$file_name')";
      }

      if ($conn->query($sql) === TRUE) {
        // Redirect to the profile page
        header("Location: dashboard.php");
        exit();
      } else {
        echo "Error updating record: " . $conn->error;
      }
    } else {
      // Display the error messages
      foreach ($errors as $error) {
        echo "<p>$error</p>";
      }
    }
  }
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Set Profile Picture</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f2f2f2;
      text-align: center;
    }
    body {
      background-color: #f2f2f2;
      text-align: center;
      background-image:url('a.jpg');
      background-repeat:no-repeat;
      background-size:cover;
      background-image:center center;
      background-attachment:fixed;
    }
    *{
        font-family: cursive;
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        text-decoration: none;
        outline: none;
        border:none;
        text-transform: capitalize;
        transition:all .2s linear;
    }

    *::selection{
        background: var(--yellow);
        color:#333;
    }

    html{
        font-size: 62.5%;
        overflow-x: hidden;
    }
    html::-webkit-scrollbar{
        width:1.4rem;
    }
    html::-webkit-scrollbar-track{
        background:#222;
    }
    html::-webkit-scrollbar-thumb{
        background: var(--yellow);
    }
    h1 {
      color: #333;
      font-size: 36px;
      margin-top: 50px;
    }
    
    form {
      margin-top: 50px;
      display: flex;
      flex-direction: column;
      align-items: center;
    }
    
    input[type="file"] {
      margin: 20px 0;
      margin-bottom:80px;
    }
    input[type="submit"] {
      padding: 10px 20px;
      background-color: #4CAF50;
      color: #fff;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      transition: background-color 0.2s ease-in-out;
    }
    
    input[type="submit"]:hover {
      background-color: #2e8b57;
    }
  </style>
</head>
<body>
  <h1>Set Profile Picture</h1>
  <form action="setprfle.php" method="post" enctype="multipart/form-data">
    <input type="file" name="image" accept="image/png"><br>
    <input type="submit" name="submit" value="Submit Picture">
  </form>
</body>
</html>

