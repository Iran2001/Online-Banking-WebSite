
<?php
include('./config.php');
session_start();

if (isset($_POST['submit'])) {
    $Laccnumber = $_POST['Laccnumber'];
    $Lpassword = $_POST['Lpassword']; 

// Check if it's admin login
if ($Laccnumber == 'admin' && $Lpassword == 'admin12345') {
    echo "Admin login attempted"; // or use error_log() for logging

    header("location: admin_Dashbord.php");
    exit();
}


    // Prepare and bind parameters to prevent SQL injection
    $stmt = $conn->prepare("SELECT * FROM user_register_from WHERE acc_number = ?");
    $stmt->bind_param("s", $Laccnumber);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        // Verify password using password_verify function
        if (password_verify($Lpassword, $row['password'])) {
            // Password is correct, set session variables
            $_SESSION['acc_number'] = $row['acc_number'];
            $_SESSION['username'] = $row['username'];
            header("location: userhome.php");
            exit();
        } else {
            // Password is incorrect
            $_SESSION['message'] = "Account Number and Password combination incorrect";
            header("location: home.php");
            exit();
        }
    } else {
        // No user found with provided account number
        $_SESSION['message'] = "Account Number not found";
        header("location: home.php");
        exit();
    }
   

    // Close statement and database connection
    $stmt->close();
    $conn->close();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>login page</title>

	<style>
		@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap');


		* {
			overflow: hidden;
			font-family: 'poppins' sans-serif;
		}

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
			width: 200px;
			height: 340px;
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
			width: device-width;
			height: auto;
			overflow: hidden;
			background-color: white;
		}

		.img2 {
			margin: 0px 50px;
		}

		.rectangle {
			height: 80px;
			width: 340px;
			background-color: gray;
			margin-top: -70px;
			margin-left: -70px;
			border-top-right-radius: 19px;
			border-top-left-radius: 19px;
		}

		.h2 {
			color: orange;
			padding-top: 20px;
			padding-bottom: 110px;
			margin: -80px;
			font-size: 40px;
		}

		.username {
			margin: 5px 0px;
			padding: 5px;
		}


		.password {
			margin: 5px 0px;
			padding: 5px;
		}

		.login {
			margin-left: 40px;
			margin-bottom: 20px;
			margin-top: 10px;
			border-width: 3px;
			background-color: orange;
			font-size: 22px;
			width: 120px;
			height: 50px;
			border-radius: 15px;
		}

		.lable1 {
			color: red;
			float: center;
			margin-left: 20px;
			margin-bottom: 20px;
		}

		.register {
			float: center;
			margin-left: 74px;
			margin-top: 30px;
		}
.Laccnumber{
margin-top: 3px;
height: 25px;

}

.frpass{
margin-top: 10px
;

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

<body background="images/Laptop-Specs-For-Work-From-Home.jpg" width="460px" height="345px" class="img1">

	<ul class="menu">
		<li class="menu">
			<a href="./home.php"><img src="images/Screenshot 2023-12-19 112744.png" align="left" width="150px" height="80px" class="img2"><br><br><br>
			</a></li>
	</ul>


	<form action="" method="post">

		<div class="container">
			<div class="rectangle"></div>
			<h1 class="h2" align="center"> Login </h1><br>


			<label>Account Number: </label><br>
			<input type="text" placeholder=" Enter Account Number" class="Laccnumber" name="Laccnumber"><br><br>

			<label>Password: </label><br>
			<input type="password" placeholder="Enter Password" class="password" name="Lpassword"><br><br>

			<!-- <button class="login" name="btn">Login</button><br> -->
            <input class="login" type="submit" name="submit" value="Login">
<br>
			<label class="lable1">Don't have an account ?</label>
			<a href="./Register.php" class="register">Register</a><br>

<br>
<label class="lable1">Forget Password ?</label>
			<a href="./forgetpasswod.php" class="frpass">Forget Password</a><br>

		</div>

	</form>



</body>

</html>

<?php
mysqli_close($conn);
?>