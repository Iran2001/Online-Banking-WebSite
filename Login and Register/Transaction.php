<?php include('./config.php'); ?>
<?php
session_start();

if (isset($_SESSION['acc_number'])) {
    $accNumber = $_SESSION['acc_number'];
    $username = isset($_SESSION['username']) ? $_SESSION['username'] : null; // Use 'username' instead of 'name'
} else {
    echo "Session variable 'acc_number' is not set.";
    // Handle the case when 'acc_number' is not set
}

?>

<?php
// Include database configuration file
include('./config.php');

if (isset($_POST['submit'])) {
    $faccount = $_POST['faccount'];
    $taccount = $_POST['taccount'];
    $type = $_POST['type'];
    $amount = $_POST['amount'];
    date_default_timezone_set('Asia/Colombo');
    $date = date("Y-m-d H:i:s"); // Format: YYYY-MM-DD HH:MM:SS

    // Insert the new transaction into the database
    $query = "INSERT INTO trans_actions (Faccount, Taccount, amount, type, date) VALUES ('$faccount', '$taccount', '$amount', '$type', '$date')";
    $result = mysqli_query($conn, $query);

    // Retrieve the balance and total withdrawal from the database
    $sql = "SELECT balance, twidthrowal FROM user_register_from WHERE acc_number = '$faccount'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $balance = $row['balance'];
        $total_withdrawal = $row['twidthrowal'];

        // Calculate new balance and total withdrawal
        $new_balance = $balance - $amount;
        $new_total_withdrawal = $total_withdrawal + $amount;

        // Update the balance and total withdrawal
        $update_sql = "UPDATE user_register_from SET balance = '$new_balance', twidthrowal = '$new_total_withdrawal' WHERE acc_number = '$faccount'";
        $update_result = mysqli_query($conn, $update_sql);

        if ($update_result) {
            echo '<script>alert("Balance and total withdrawal updated successfully!");</script>';
            // Refresh the page to show the updated transaction history
            echo '<meta http-equiv="refresh" content="0">';
        } else {
            echo "Error updating balance and total withdrawal: " . mysqli_error($conn);
        }
    } else {
        echo "Error fetching data from the database: " . mysqli_error($conn);
    }
}
?>





<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>User Dashboard</title>
	<link rel="stylesheet" href="styles.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
	<style>
		/* Reset default styles */
		* {
			margin: 0;
			padding: 0;
			box-sizing: border-box;
			overflow: hidden;
			
		}

		/* Dashboard layout styles */
		body {
			font-family: Arial, sans-serif;
			background-color: #f9f9f9;
		}

		.dashboard {
			display: flex;
			height: 100vh;
		}

		.sidebar {
			width: 250px;
			background-color: orange;
			color: #fff;
			padding: 20px;
			height: 1020px;
		}

		.logo h2 {
			margin-bottom: 20px;
			font-size: 24px;
			color: #fff;
		}

		ul {
			list-style: none;
			padding: 0;
		}

		ul li {
			margin-bottom: 15px;
		}

		ul li a {
			text-decoration: none;
			color: #fff;
			display: flex;
			align-items: center;
		}

		ul li a i {
			margin-right: 10px;
		}

		.main-content {
			flex: 1;
			padding: 20px;
			background-color: #fff;
			color: #333;
		}

		.logout {
			margin-top: auto;
		}

		.logout a {
			background-color: #dc3545;
			display: block;
			padding: 10px 20px;
			border-radius: 5px;
			text-decoration: none;
			color: #fff;
		}

		.logout a:hover {
			background-color: #c82333;
		}

		.cards {
			width: 100%;
			padding: 25px 20px;
			display: grid;
			grid-template-columns: repeat(3, 1fr);
			grid-gap: 20px;

		}

		.cards .card {

			padding: 20px;
			display: flex;
			align-items: center;
			justify-content: space-between;
			background: #fff;
			border-radius: 10px;
			box-sizing: 0 7px 25px 0 rgba(0, 0, 0, 0.08);

		}

		.cards .card:hover {
			background: orange;
		}

		.cards .card:hover .number {
			color: white;
		}

		.cards .card:hover .card-name {
			color: white;
		}

		.cards .card:hover.icon-box {
			color: white;
		}

		.number {
			font-size: 35px;
			font-weight: 500;
			color: orange;

		}

		.card-name {

			color: #888;
			font-weight: 600;
		}

		.icon-box {

			font-size: 45px;
			/* background: orange; */
		}


		/* charts is starts */

		.charts {
			display: grid;
			grid-template-columns: 2fr 1fr;
			grid-gap: 20px;
			width: 100%;
			padding: 20px;
			padding-top: 0;
		}

		.chart {
			background: #fff;
			padding: 20px;
			border-radius: 10px;
			box-shadow: 0 7px 25px rgba(0, 0, 0, 0.08);
			width: 100%;
		}

		.chart h2 {

			margin-bottom: 5px;
			font-size: 20px;
			color: #666;
			text-align: center;

		}

		@media(max-width:1115px) {

			.sidebar {
				width: 60px;
			}

			.main {
				left: 60px;
				width: calc(100% - 60px);
			}
		}

		@media(max-width:880px) {
			.cards {
				grid-template-columns: repeat(2, 1fr);
			}

			.charts {
				grid-template-columns: 1fr;
			}

		}

		@media(max-width:880px) {

			.topbar {
				grid-template-columns: 1fr 5fr 0.4fr 1fr;
			}

			.cards {
				grid-template-columns: 1fr;
			}

			.logo h2 {
				font-size: 20px;
			}

			.welcome {
				width: 80%;
			}

		}

		.btn_search {
			margin-top: 20px;
			padding: 20px;
			background-color: #ffa500;
			/* Orange background */
			border-radius: 10px;
			box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
		}

		.btn_search h2 {
			color: #fff;
			/* White text color */
			margin-bottom: 10px;
		}

		.search-input {
			width: 70%;
			padding: 10px;
			border: 1px solid #ccc;
			/* Light gray border */
			border-radius: 5px;
			margin-right: 10px;
		}

		.search-btn {
			padding: 10px;
			background-color: #333;
			/* Dark background color */
			color: #fff;
			/* White text color */
			border: none;
			border-radius: 5px;
			cursor: pointer;
		}

		input[type="text"] {
			padding: 10px;
			width: 300px;
			border: 1px solid #ccc;
			border-radius: 5px;
			margin-right: 10px;
			font-size: 16px;
		}

		button[name="submit"] {
			padding: 10px 20px;
			background-color: #ff6f61;
			color: #fff;
			border: none;
			border-radius: 5px;
			cursor: pointer;
			font-size: 16px;
			margin-top: 100px;
		}

		button[name="submit"]:hover {
			background-color: #e0524d;
		}

		.logout {
			margin-top: auto;
		}

		.logout a {
			background-color: #dc3545;
			display: block;
			padding: 10px 20px;
			border-radius: 5px;
			text-decoration: none;
			color: #fff;
		}

		.logout a:hover {
			background-color: #c82333;
		}

		h1.register {
			margin-bottom: 20px;
			color: #333;
		}

		.transaction-container {
			max-width: 800px;
			margin: 50px auto;
			background-color: #fff;
			padding: 20px;
			border-radius: 10px;
			box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
		}

		h2 {
			color: orange;
			text-align: center;
			margin-bottom: 20px;
		}

		.transaction-form {
			display: flex;
			flex-direction: column;
			align-items: center;
		}

		label {
			font-weight: bold;
			margin-bottom: 6px;
			color: #333;
		}

		input {
			width: 100%;
			padding: 10px;
			margin-bottom: 15px;
			border: 1px solid #ccc;
			border-radius: 4px;
			font-size: 16px;
		}

		button {
			padding: 10px 20px;
			background-color: orange;
			color: #fff;
			border: none;
			border-radius: 5px;
			cursor: pointer;
			font-size: 16px;
			margin-top: -20px;
		}

		button:hover {
			background-color: #e0524d;
		}

		/* Dropdown styling */
.dropdown {
    position: relative;
    display: inline-block;
}

/* Style for the dropdown button */
.dropbtn {
    background-color: orange;
    color: white;
    padding: 10px;
    font-size: 16px;
    border: none;
    cursor: pointer;
}

/* Style for the dropdown content (hidden by default) */
.dropdown-content {
    display: none;
    position: absolute;
    background-color: orange; /* Set to your base color */
    min-width: 160px;
    box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
    z-index: 1;
    border-radius: 5px;
}

/* Style for each dropdown item */
.dropdown-content a {
    color: white; /* Set text color to contrast with the background */
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

/* Change color on hover */
.dropdown-content a:hover {
    background-color: goldenrod; /* Set a different color on hover */
}

/* Show the dropdown menu when the button is clicked */
.dropdown:hover .dropdown-content {
    display: block;
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

<body>

	<div class="dashboard">
	<div class="sidebar">
            <div class="logo">
                <h2>Bank Dashboard</h2>
            </div>
<div>
<?php if (isset($_SESSION['username'])): ?>
        <h2>Welcome, <?php echo $_SESSION['name']; ?></h2>
    <?php endif; ?>
    <?php if (isset($_SESSION['acc_number'])): ?>
        <p>Account Number: <?php echo $_SESSION['acc_number']; ?></p>
    <?php endif; ?>


</div>

            <ul>
			<li><a href="./showprofile.php"><i class="fa-solid fa-user"></i>User profile</a></li>
                <li><a href="./userhome.php"><i class="fa fa-tachometer"></i>DashBord</a></li>
                <li><a href="./Transaction.php"><i class="fas fa-exchange-alt"></i>Transaction</a></li>
                <li> <a href="./userThistory.php"> <i class="fa-solid fa-clock-rotate-left"></i>Transaction History</a></li> 
                <li><a href="./ordercheckbook.php"><i class="fa-solid fa-book"></i>Order ChequeBook </a></li> 
				<li><a href="./billspayment.php"><i class="fa-solid fa-file-invoice"></i>Bill Payment </a></li>
				<li> <a href="./editmyacc.php"> <i class="fa-solid fa-user-pen"></i>Edit My Account </a></li>
			 <br><br>

                <li class="logout"><a href="./logout.php"><i class="fas fa-sign-out-alt"></i>Log Out</a></li>
                <!-- Add more menu items/icons as needed -->
            </ul>
        </div>	


		<div class="main-content">
			<h1>Welcome to </h1>
			<h1> Bank Dashboard</h1>
			<div class="transaction-container">

			<form action="./Transaction.php" method="post">	
			<h2>Transaction Page</h2>
				<div class="transaction-form">
					<label for="fromAccount">From Account:</label>
					<input type="text" id="fromAccount" placeholder="Enter From Account" name="faccount">

					<label for="toAccount">To Account:</label>
					<input type="text" id="toAccount" placeholder="Enter To Account" name="taccount">

					<label for="amount" >Amount:</label>
					<input type="text" id="amount" placeholder="Enter Amount" name="amount">

					
                    <select name="type" id="type" name="type">
                    <option value="Withdrawal">Withdrawal</option>
                    </select>

					<button type="submit" name="submit">Submit Transaction</button>

				</div>
			</div>
		</div>
		</form>
	</div>



</body>

</html>
<?php mysqli_close($conn); ?>