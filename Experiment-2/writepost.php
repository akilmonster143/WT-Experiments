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
  // Get the user's ID from the session
  $user_id = $_SESSION['user_id'];

  // Get the text from the form
  $text = mysqli_real_escape_string($conn, $_POST['text']);

  // Insert the text into the database
  $sql = "INSERT INTO posts (id, post_text) VALUES ('$user_id', '$text')";

  if ($conn->query($sql) === TRUE) {
    // Redirect to the dashboard page
    header("Location: dashboard.php");
    exit();
  } else {
    echo "Error inserting record: " . $conn->error;
  }
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Write a Post</title>
  <style>
   body {
  background-color: #f2f2f2;
  text-align: center;
  background-image:url('https://images.unsplash.com/photo-1493723843671-1d655e66ac1c?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80');
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

textarea {
  margin: 20px 0;
  width: 80%;
  height: 200px;
  padding: 10px;
  border-radius: 10px;
  border: none;
  background-color: #f2f2f2;
  font-size: 18px;
  line-height: 1.5;
  color: #333;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1) inset;
  transition: all 0.3s ease-in-out;
}

textarea:focus {
  outline: none;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.2) inset;
  background-color: #fff;
  color: #333;
}


input[type="submit"] {
  padding: 10px 20px;
  background-color: #4CAF50;
  color: #fff;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  transition: background-color 0.2s ease-in-out;
  font-size: 20px;
  font-weight: bold;
  text-transform: uppercase;
}

input[type="submit"]:hover {
  background-color: #2e8b57;
}

  </style>
</head>
<body>
  <h1>Write a Post</h1>
  <form action="writepost.php" method="post">
    <textarea name="text" placeholder="Write something..."></textarea>
    <input type="submit" name="submit" value="Post">
  </form>
</body>
</html>
