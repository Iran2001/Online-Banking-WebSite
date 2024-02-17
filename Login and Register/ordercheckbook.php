
<?php include('./config.php')?>

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

if (isset($_POST['submit'])) {
    $type = $_POST['owners'];
    $acc_number = $_POST['accnumber'];
    $leves = $_POST['leves'];
    $qty = $_POST['qty'];

    // Insert the new contact message into the database
    $Query = "INSERT INTO oder_chequebook(type, acc_number, leves, qtybooks) VALUES ('$type', '$acc_number', '$leves', '$qty')";
    $Result = mysqli_query($conn, $Query);

    if ($Result) {
        echo '<script>alert("Message sent successfully!");</script>';
        // Refresh the page to show the updated contact history
        echo '<meta http-equiv="refresh" content="0">';
    } else {
        echo '<script>alert("Failed to send message.");</script>';
        echo mysqli_error($conn); // Print any error messages for debugging
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

        .history-container {
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

        .transaction-history {
            display: flex;
            flex-direction: column;
        }

        .transaction-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
            border-bottom: 1px solid #ccc;
        }

        .transaction-item:last-child {
            border-bottom: none;
        }

        .transaction-details {
            display: flex;
            flex-direction: column;
        }

        .transaction-type {
            font-weight: bold;
            color: orange;
        }

        .transaction-amount {
            margin-top: 5px;
            color: #333;
        }

        .transaction-date {
            margin-top: 5px;
            color: #888;
        }
 /* Basic styling for the dropdown */
 .dropdown {
            position: relative;
            display: inline-block;
        }

        /* Style for the menu button */
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

        
        .container {
            max-width: 800px;
            height: 600px;
            margin: 50px auto;
            background-color: #fff;
            border-radius: 15px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            padding: 30px;
            box-sizing: border-box;
        }

        .rectangle {
            height: 20px;
            width: 100%;
            background-color: orange;
            border-radius: 10px 10px 0 0;
        }

        .ordercheque {
            font-size: 24px;
            color: orange;
            margin-bottom: 20px;
        }

        .chequeowners {
            margin-bottom: 20px;
        }

        .chequeowners input {
            margin-right: 10px;
        }

        .accountnumber,
        .billnumber {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .billtype {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .notice {
            color: #888;
            margin-bottom: 20px;
        }

        .cancel,
        .submit {
            display: inline-block;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            text-align: center;
            text-decoration: none;
            color: #fff;
            transition: background-color 0.3s;
        }

        .cancel {
            background-color: #ccc;
            color: #333;
            margin-right: 10px;
        }

        .submit {
            background-color: orange;
        }

        .submit:hover,
        .cancel:hover {
            background-color: darkorange;
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
        .submit-btn {
        background-color: #4CAF50; /* Green background color */
        color: white; /* White text color */
        padding: 10px 15px; /* Padding for better appearance */
        border: none; /* Remove border */
        border-radius: 5px; /* Optional: Add border-radius for rounded corners */
        cursor: pointer; /* Add a pointer cursor on hover */
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
 
        <div class="container">

<div class="rectangle"></div>

<h1 class="ordercheque">Order Cheque Books</h1>

<form action="" method="post">
    <label>IS THIS CHEQUE FOR:</label>
    <div class="chequeowners">
        <input type="radio" class="personal" name="owners" value="Personal"> Personal
        <input type="radio" class="business" name="owners"value="Business"> Business
    </div>

    <label>ACCOUNT NUMBER:</label>
    <input type="text" placeholder="Enter Account Number" name="accnumber" class="accountnumber">
<br>
    <label>NUMBER OF CHEQUE BOOK LEAVES:</label>
    <select name="leves" class="billtype">
        <option value="10 Leaves">10 Leaves</option>
        <option value="15 Leaves">15 Leaves</option>
        <option value="20 Leaves">20 Leaves</option>
        <option value="25 Leaves">25 Leaves</option>
    </select>

    <label>NUMBER OF CHEQUE BOOKS:</label>
    <input type="text" name="qty" placeholder="Enter Quantity" class="billnumber">

    <p class="notice">(Only you can request between 1 to 5 books in one order)</p>

    <a href="./home.php" class="cancel">Cancel</a>

 <div class="submit"><input type="submit" name="submit" value="Submit"></div>

</form>

</div>

    

        </div>
    </div>


</body>

</html>