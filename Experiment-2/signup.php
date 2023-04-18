<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        .container {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            height: 100vh;
        }

        .left-section {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            width: 70%;
            background-color: #3b5998;
            color: #fff;
            padding: 40px;
            box-sizing: border-box;
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
        }

        .left-section h1 {
            font-size: 48px;
            margin-bottom: 20px;
        }

        .left-section p {
            font-size: 24px;
            line-height: 1.5;
            margin-top: 20px;
        }

        .left-section img {
            right: 0;
            bottom: 0;
            width: 10%;
        }

        .right-section {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            width: 30%;
            padding: 40px;
            box-sizing: border-box;
            margin-left: 70%;
        }
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        .container {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            height: 100vh;
        }

        .left-section {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            width: 70%;
            background-color: #3b5998;
            color: #fff;
            padding: 40px;
            box-sizing: border-box;
        }

		.left-section h1 {
            font-size: 48px;
            margin-bottom: 20px;
        }

        .left-section p {
            font-size: 24px;
            line-height: 1.5;
            margin-top: 20px;
        }

        .left-section img {
            right: 0;
            bottom: 0;
            width: 10%;
        }

        .right-section {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            width: 30%;
            padding: 40px;
            box-sizing: border-box;
        }

        .right-section h1 {
            font-size: 32px;
            margin-bottom: 28px;
        }

        .right-section form {
            display: flex;
            flex-direction: column;
            width: 100%;
        }

        .right-section label {
            font-size: 16px;
            margin-bottom: 10px;
        }

        .right-section input[type="text"],
        .right-section input[type="number"],
        .right-section input[type="email"],
        .right-section input[type="tel"],
        .right-section input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            box-sizing: border-box;
            border: none;
            border-radius: 5px;
        }

        .right-section input[type="submit"] {
            background-color: #3b5998;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .right-section input[type="submit"]:hover {
            background-color: #2d4373;
        }
		.right-section label[for="dob"] {
			font-size: 16px;
			margin-bottom: 10px;
		}

		.right-section input[type="date"] {
			width: 100%;
			padding: 10px;
			margin-bottom: 20px;
			box-sizing: border-box;
			border: none;
			border-radius: 5px;
		}
        .right-section h1 {
            font-size: 32px;
            margin-bottom: 28px;
        }

        .right-section form {
            display: flex;
            flex-direction: column;
            width: 100%;
        }

        .right-section label {
            font-size: 16px;
            margin-bottom: 10px;
        }

        .right-section input[type="email"],
        .right-section input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            box-sizing: border-box;
            border: none;
            border-radius: 5px;
        }

        .right-section input[type="submit"] {
            background-color: #3b5998;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .right-section input[type="submit"]:hover {
            background-color: #2d4373;
        }

        .not-registered {
            font-size: 14px;
            margin-top: 20px;
            text-align: center;
        }

        .not-registered a {
            color: #3b5998;
            text-decoration: none;
        }

        .not-registered a:hover {
            color:#42a1f5;
            transition:2em;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="left-section">
            <img src="c.png" alt="eee">
            <h1>Welcome to ConnectU</h1>
            <p>ConnectU helps you connect and share with the people in your life.</p>
            <!DOCTYPE html>
<html>
<head>
    <title>Top 3 Liked Photos</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .post {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin: 20px;
        }
        .post img {
            width: 300px;
            height: 300px;
            object-fit: cover;
        }
        .like_count {
            font-size: 24px;
            margin-top: 10px;
        }
        img:hover {
        transform: scale(1.1); /* increase scale to zoom in more */
        }

        .post .username {
            font-weight: bold;
            font-size: 18px;
            color: white;
            margin-top:30px;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
        // Connect to the database
        $host = "localhost";
        $username = "Akil";
        $password = "Akilamu@321";
        $dbname = "login_page";
        $conn = new mysqli($host, $username, $password, $dbname);

        // Query the database to get the top 3 liked photos and their authors
        $result = mysqli_query($conn, "SELECT u.key_id, u.id, u.post_text, u.profile_pic, l.u_name, COUNT(*) AS like_count
                                       FROM uploads AS u
                                       INNER JOIN likes AS l ON u.key_id = l.key_id
                                       GROUP BY u.key_id
                                       ORDER BY like_count DESC
                                       LIMIT 3");
    
        // Display the top 3 liked photos and their authors
        while ($row = mysqli_fetch_assoc($result)) {
            $profile_pic = ($row['profile_pic'] != '') ? 'uploads/' . $row['profile_pic'] : 'default.png';
            echo "<div class='post'>";
            echo "<img src='$profile_pic'>";
            
            echo "<div class='username'>{$row['u_name']}</div>";
            echo "<div class='like_count'>{$row['like_count']} likes</div>";
            echo "</div>";
        }
    
        // Close the database connection
        mysqli_close($conn);
        ?>
    </div>
</body>
</html>

        </div>
        <div class="right-section">
            <h1>Create Account</h1>
            <form method="POST" action="sucess.php">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" placeholder="Enter your name" required>
				<label for="dob">Date of Birth:</label>
				<input type="date" id="dob" name="dob" required>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" required>

                <label for="phone">Phone Number:</label>
                <input type="tel" id="phone" name="phone" placeholder="Enter your phone number" required>

                <label for="password">Password:</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" required>

                <label for="confirm_password">Confirm Password:</label>
                <input type="password" id="cpassword" name="cpassword" placeholder="Enter your password again" required>
		<input type="submit" value="Submit">
	</form>
        </div>
    </div>
</body>
</html>
