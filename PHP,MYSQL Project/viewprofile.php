<?php
session_start();

if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}

$host = "localhost";
$username = "Akil";
$password = "Akilamu@321";
$database = "login_page";

$conn = mysqli_connect($host, $username, $password, $database);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$email = $_SESSION['email'];
$sql = "SELECT name FROM registration WHERE email='$email'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$name = $row['name'];
$_SESSION['name_of']=$name;

$sql = "SELECT id FROM registration WHERE email='$email'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$id = $row['id'];
$_SESSION['user_id']=$id;

// Get the user's profile picture from the database
$sql = "SELECT profile_pic FROM users WHERE id=$id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

// Check if the user has a profile picture
if ($row['profile_pic'] != '') {
  $profile_pic = 'uploads/' . $row['profile_pic'];
} else {
  $profile_pic = 'default.png';
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Nunito:wght@400;600&display=swap');

        :root{
            --yellow:#f9ca24;
            --pink:rgb(76, 0, 217);
            --blue:rgb(217, 0, 159);
            --green:#00FF00;
        }

        html{
            scroll-behavior: smooth;
            /* color: */
        }
        body{
            background:#111;
            /* background-image: url(/akil.jpeg) */
            overflow-x: hidden;
            /* background: rgb(217, 0, 0); */
            padding-left: 35rem;
        }
        header{
            position: fixed;
            top:0;
            left:0;
            z-index: 1000;
            height: 100%;
            width:35rem;
            background: #1a1a1a;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-flow: column;
            list-style-type: none;
            text-align: center;
        }

            
    .user img{
        height: 17rem;
        width: 17rem;
        border-radius: 50%;
        object-fit:cover;
        margin-top: 0;
        margin-bottom: 5 rem;
        border: .6rem solid var(--pink);
    }

    .user{
        font-size: 3.5rem;
        color:#fff;
        margin-bottom: 3rem;
    }

    header.navbar{
        width: 100%;
    }

    header.navbar ul{
        list-style:none;
        padding: 1rem 5rem;
    }

    li{
        list-style: none;
    }
    header .navbar ul li a{
        display:block;
        padding: 1rem;
        margin:1.5rem 0;
        background: #333;
        color:#fff;
        font-size: 2rem;
        border-radius: 6rem;
        list-style-type: none;
    }
    header .navbar ul li a:hover{
        background: var(--yellow);
        list-style-type: none;
    }

    *{
        font-family: 'Nunito',sans-serif;
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
    .form{
        flex:1 1 30rem;
        padding: 2rem;
        margin: 2rem;
        margin-bottom: 4rem;
    }
    header .navbar ul li a:active{
        font-size: 3em;
    }
    .container {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 20px;
    }

    .left-section {
        width: 20%;
    }

    .left-section ul {
        list-style: none;
        padding: 0;
    }

    .left-section li {
        margin: 10px 0;
    }

    .left-section a {
        display: block;
        padding: 10px;
        text-decoration: none;
        background-color: #3498db;
        color: #fff;
        border-radius: 5px;
        box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);
        transition: background-color 0.2s ease-in-out;
    }

    .left-section a:hover {
        background-color: #2980b9;
    }

    .middle-section {
        margin-top:0;
        text-align: center;
        width: 70%;
    }

    .right-section {
        width: 20%;
        text-align: right;
        position: fixed;
        right:10px;
        top:20px;
    }
    
    .logout-btn {
        display: inline-block;
        padding: 8px;
        background-color: #3498db;
        color: #fff;
        text-align:center;
        text-decoration: none;
        border-radius: 5px;
        box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);
        transition: background-color 0.2s ease-in-out;
    }

    .logout-btn:hover {
        background-color: #2980b9;
    }
    h1{
        color:white;
        text-align:center;
        font-size:400%;
        margin-left:300px;
    }
    .logout-img {
        display: inline-block;
        width: 50px;
        height: 50px;
        background-image: url("https://cdn.imgbin.com/2/7/19/login-icon-logout-icon-k6uqvRhC.jpg");
        background-size: cover;
        background-repeat: no-repeat;
        margin-right: 10px;
        vertical-align: middle;
    }
    </style>
</head>
<body>
    <header>
            <div class="user">
                <img src="<?php echo $profile_pic; ?>" alt="Profile Picture">
                <h3 class="name"><?php echo $name; ?></h3>
            </div>
            <nav class="navbar">
                <ul>    
                    <li><a href="dashboard.php">Home</a></li>
                    <li><a href="setprfle.php">Set Profile Picture</a></li>
                    <li><a href="viewprofile.php">View your profile</a></li>
                    <li><a href="writepost.php">Write a post</a></li>
                    <li><a href="upload.php">Upload pic</a></li>
                    <li><a href="view_photo.php">View your photo</a></li>
                </ul>
            </nav>
        </header>
    <div class="container">
        <div class="middle-section">
            <h1 color="white">Welcome to <?php echo $name; ?></h1>
            <!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <style>
        .container1 {
            font-family: cursive;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            text-decoration: none;
            outline: none;
            border:none;
            font-size:30px;
            text-transform: capitalize;
            transition:all .2s linear;
			display: flex;
			flex-direction: column;
			align-items: center;
		}
		.post {
			display: flex;
			flex-direction: column;
			align-items: center;
			background-color: #f2f2f2;
			padding: 10px;
			margin-bottom: 40px;
            margin-left:300px;
			width: 50%;
			border-radius: 10px;
		}
		.post b {
			margin-bottom: 5px;
		}
        h1{
            font-size:32px;
            margin-bottom:20px;
        }
        .post img {
            width: 60%;
            margin-top: 10px;
        }
        .post .time {
            font-size: 12px;
            color: gray;
            margin-top: 5px;
        }
        .post .actions {
            display: flex;
            justify-content: space-between;
            margin-top: 10px;
        }
        .post .actions button {
            background-color: #f2f2f2;
            border: none;
            padding: 8px 12px;
            border-radius: 5px;
            cursor: pointer;
        }
        .post .actions button:hover {
            background-color: #e5e5e5;
        }
    </style>
<script>
function likePost(key_id) {
    var like_button = document.getElementById('like_button_'+key_id);
    var like_count = document.getElementById('like_count_'+key_id);

    // Check if the user has already liked the post
    if (like_button.classList.contains('liked')) {
        // Remove the like from the database
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'unlike.php');
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onload = function() {
            if (xhr.status === 200) {
                // Decrement the like count
                like_count.innerHTML = parseInt(like_count.innerHTML) - 1;
                // Update the button appearance
                like_button.classList.remove('liked');
                like_button.innerHTML = 'Like ('+like_count.innerHTML+')';
            }
        };
        xhr.send('key_id=' + key_id);
    } else {
        // Add the like to the database
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'like.php');
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onload = function() {
            if (xhr.status === 200) {
                // Increment the like count
                like_count.innerHTML = parseInt(like_count.innerHTML) + 1;
                // Update the button appearance
                like_button.classList.add('liked');
                like_button.innerHTML = 'Liked ('+like_count.innerHTML+')';
            }
        };
        xhr.send('key_id=' + key_id);
    }
    // Reload the current page after like or unlike
    location.reload();
}

    </script>
</head>
<body>
    <div class="container1">
    <?php
    // Connect to the database
    $host = "localhost";
    $username = "Akil";
    $password = "Akilamu@321";
    $dbname = "login_page";

    $conn = new mysqli($host, $username, $password, $dbname);

    $userid = $_SESSION['user_id'];

    $posts_result = mysqli_query($conn, "SELECT * FROM posts WHERE id = '$userid' ORDER BY post_date DESC");
    $uploads_result = mysqli_query($conn, "SELECT * FROM uploads WHERE id = '$userid' ORDER BY post_date DESC");

    // Combine the posts and photos into one array and sort by date
    $combined_array = array();
    while ($row = mysqli_fetch_assoc($posts_result)) {
        $combined_array[] = $row;
    }
    while ($row = mysqli_fetch_assoc($uploads_result)) {
        $combined_array[] = $row;
    }
    usort($combined_array, function($a, $b) {
        return strtotime($b['post_date']) - strtotime($a['post_date']);
    });

    // Display the posts and photos with the username
    foreach ($combined_array as $row) {

        // Get the number of likes for the post
        $likes_result = mysqli_query($conn, "SELECT COUNT(*) AS like_count FROM likes WHERE key_id = '{$row['key_id']}'");
        $likes_row = mysqli_fetch_assoc($likes_result);
        $like_count = $likes_row['like_count'];

        if (isset($row['post_text']) && empty($row['profile_pic'])) {
            // This is a post
            echo "<div class='post'><b>$name:</b> {$row['post_text']}";
            echo "<div class='time'>{$row['post_date']}</div>";
            echo "<div class='actions'><button id='like_button_{$row['key_id']}' onclick='likePost({$row['key_id']})'>Like ($like_count)</button><button>Comment</button></div></div>";
        } else {
            // This is a photo
            if(isset($row['profile_pic'])){
                if ($row['profile_pic'] != '') {
                    if ($row['profile_pic'] != '') {
                        $profile_pic = 'uploads/' . $row['profile_pic'];
                    } else {
                        $profile_pic = 'default.png';
                    }

                    echo "<div class='post'><b>$name:</b> {$row['post_text']}";
                    echo "<div class='time'>{$row['post_date']}</div>";
                    echo "<img src='$profile_pic'>";
                    echo "<div class='actions'><button id='like_button_{$row['key_id']}' onclick='likePost({$row['key_id']})'>Like ($like_count)</button><button>Comment</button></div></div>";
                } 
            }
        }
    }
?>
    </div>
</body>
    </html>
        </div>
        <div class="right-section">
            <a href="logout.php" class="logout-btn"><span class="logout-img"></span> Logout</a>
        </div>
    </div>
</body>
</html>
