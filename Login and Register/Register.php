<?php
require_once('./config.php');
session_start();
?>

<?php


if (isset($_POST['submit'])) {
	
	
	$default_balance = 100000;
	$accnumber = $_POST['accnumber'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pnumber = $_POST['pnumber'];
    $password = $_POST['password'];

    // Check if all required fields are filled
    if (empty($accnumber) || empty($name) || empty($email) || empty($pnumber) || empty($password)) {
        echo '<script type="text/javascript"> alert("Please fill in all the fields.")</script>';
    } else {
        // Validate account number (must be exactly 9 digits)
        $accnumber_pattern = '/^\d{9}$/';
        if (!preg_match($accnumber_pattern, $accnumber)) {
            echo '<script type="text/javascript"> alert("Invalid Account Number.")</script>';
            exit();
        }

        // Validate email
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo '<script type="text/javascript"> alert("Invalid email address.")</script>';
            exit();
        }

        // Validate phone number
        $pnumber_pattern = '/^\d{10}$/'; // Assuming phone number has 10 digits
        if (!preg_match($pnumber_pattern, $pnumber)) {
            echo '<script type="text/javascript"> alert("Invalid phone number. It must be exactly 10 digits.")</script>';
            exit();
        }

        // Encrypt password
        $hash_password = password_hash($password, PASSWORD_DEFAULT);

        // Insert data into the database using prepared statement
		$stmt = $conn->prepare("INSERT INTO `user_register_from` (acc_number, name, email, pnumber, password, balance) 
		VALUES (?, ?, ?, ?, ?, ?)");

// Bind parameters including the default initial balance
        $stmt->bind_param("sssssi", $accnumber, $name, $email, $pnumber, $hash_password, $default_balance);
        $stmt->execute();

		
        if ($stmt->affected_rows > 0) {
          
			$_SESSION['acc_number'] = $accnumber;
            $_SESSION['name'] = $name;
			
			echo '<script type="text/javascript"> alert("Registration successful! You will be redirected to your home page.")</script>';
            echo '<meta http-equiv="refresh" content="5;url=userhome.php">';
            echo 'If not redirected, <a href="userhome.php">click here</a>.';
        } else {
            echo '<script type="text/javascript"> alert("Error: Registration failed.")</script>';
        }

        $stmt->close();
        $conn->close();
    }
}
?>



<!DOCTYPE html>
<html>

<head>

	<title> Nexus Bank </title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<style>
		.img1 {
			background-size: cover;
			background-repeat: no-repeat;
			width: 100%;
			height: auto;
			margin-top: -1px;
			margin-left: -1px;
		}

		.container {
			padding: 70px;
			margin: 90px 150px;
			width: 270px;
			height: 560px;
			background-color: rgba(255, 255, 255, 0.7);
			float: right;
			border-width: 5px;
			border-style: inset;
			border-color: black;
			border-radius: 25px;
			padding-bottom: 20px;
		}

		ul.menu {
			list-style-type: none;
			margin: 0;
			padding: -10px;
			width: 1480px;
			width: device-width;
			height: auto;
			overflow: hidden;
			background-color: white;
		}

		.img2 {
			margin: 0px 50px;
		}

		.rectangle {

			height: 100px;
			width: 410px;
			background-color: gray;
			margin-top: -70px;
			margin-left: -70px;
			border-top-right-radius: 18px;
			border-top-left-radius: 18px;
		}



		.register {
			margin-top: -85px;
			margin-bottom: 50px;
			font-size: 60px;
			color: orange;
		}

		.AccNumber {
			padding: 4px;
			margin-top: 5px;
			margin-right: 300px;
			margin-bottom: 30px;
		}

		.Email {
			padding: 4px;
			margin-top: 0px;
			margin-right: 300px;
			margin-bottom: 30px;
		}

		.cancel {
			margin-left: 10px;
			margin-bottom: 0px;
			margin-top: 30px;
			border-width: 3px;
			background-color: orange;
			font-size: 20px;
			width: 100px;
			height: 40px;
			border-radius: 15px;
		}

		.registered {
			margin-left: 20px;
			margin-bottom: 0px;
			margin-top: 30px;
			border-width: 3px;
			background-color: orange;
			font-size: 20px;
			width: 100px;
			height: 40px;
			border-radius: 15px;
		}

		.rectangle1 {
			height: 60px;
			width: 410px;
			background-color: #ddd;
			margin-top: 40px;
			margin-left: -70px;
			border-radius: 10px;
		}

		.line {
			color: orange;
			margin-top: -55px;
			margin-left: -195px;
		}

		@keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        body {
            animation: fadeIn 1s ease forwards;
        }
	</style>

</head>

<body background="./images/photo-1516387938699-a93567ec168e.png" width="460px" height="345px" class="img1">


	<ul class="menu">
		<a href="./home.php"><img src="./images/Screenshot 2023-12-19 112744.png" align="left" width="150px" height="80px" class="img2"></a><br><br><br>
	</ul>


	<form action="./Register.php" method="post">

		<div class="container">

			<div class="rectangle"></div>

			<h1 align="center" class="register">Register</h1><br>

			<label>ACCOUNT NUMBER:</label><br>
			<input type="text" placeholder="Enter Account Number" class="AccNumber" name="accnumber"><br>

			<label>NAME:</label><br>
			<input type="text" placeholder="Enter Name" class="AccNumber" name="name"><br>

			<label>E-MAIL ADDRESS:</label><br>
			<input type="email" placeholder="Enter E-mail Address" class="Email" name="email"><br>

			<label>PHONE NUMBER:</label><br>
			<input type="tel" placeholder="Enter phone Number" class="AccNumber" name="pnumber"><br>


			<label>Password:</label><br>
			<input type="password" placeholder="Enter Password" class="AccNumber" name="password"><br>

			<a href="looo.php"><button type="button" class="cancel"> Cancel </button></a>
			<button type="submit" class="registered" name="submit"> Register </button><br>

			<div class="rectangle1"></div>

			<pre class="line">
			Complete your online banking registration 
			 effortlessly for convenient and secure 
			          financial management
			</pre>

		</div>

	</form>


</body>

</html>