<?php include ('./config.php')?>
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


// Handle form submission
if (isset($_POST['submit'])) {
    $accNumber = $_POST['acnumber'];
    $pnumber = $_POST['pnumber'];
    $billType = $_POST['Type'];
    $billnumber = $_POST['bill_number'];
    $amount = $_POST['amount'];

    // Insert the new transaction into the database
    $query = "INSERT INTO pay_bill (ac_number, pnumber, type, bill_number, amount) VALUES ('$accNumber', '$pnumber', '$billType', '$billnumber', '$amount')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        // Retrieve the current total withdrawal amount
        $sql = "SELECT twidthrowal FROM user_register_from WHERE acc_number = '$accNumber'";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            $row = mysqli_fetch_assoc($result);
            $currentTotalWithdrawal = $row['twidthrowal'];

            // Calculate new total withdrawal amount
            $newTotalWithdrawal = $currentTotalWithdrawal + $amount;

            // Update the total withdrawal amount in the database
            $update_sql = "UPDATE user_register_from SET twidthrowal = '$newTotalWithdrawal' WHERE acc_number = '$accNumber'";
            $update_result = mysqli_query($conn, $update_sql);

            if ($update_result) {
                echo "<script>alert('Bill Payment Successful');</script>";
                echo "<script>window.location.href='billspayment.php';</script>";
            } else {
                echo "<script>alert('Failed to update total withdrawal amount');</script>";
                echo "<script>window.location.href='billspayment.php';</script>";
            }
        } else {
            echo "<script>alert('Failed to retrieve total withdrawal amount');</script>";
            echo "<script>window.location.href='billspayment.php';</script>";
        }
    } else {
        echo '<script>alert("Failed to add transaction.");</script>';
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
           
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: orange; /* Orange color */
        }
        label {
            font-weight: bold;
        }
        input[type="text"],
        input[type="tel"],
        select {
         
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            margin-top: 10px;
            width: 100%;
            padding: 10px;
            background-color: orange;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .button {

            margin-top: 10px;
            width: 100%;
            padding: 10px;
            background-color: orange;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-align: center;
            
           
        }
    
        .cancel {
            background-color: #ccc;
        }
        /* Additional styling for better visual appeal */
        .rectangle {
            height: 10px;
            background-color: orange;
            margin-bottom: 20px;
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
 
        <form action="" method="post">
        <div class="container">
        <div class="rectangle"></div>
        <h1>Bill Payment</h1>
        <label for="customerName">CUSTOMER Account Number:</label>
        <input type="text" name="acnumber" placeholder="Enter Account Number">

        <label for="phoneNumber">CUSTOMER PHONE NUMBER:</label>
        <input type="tel" name="pnumber" placeholder="Enter Phone Number">
        
        <label for="billType">BILL TYPE:</label>
        <select id="billType" name="Type">
            <option value="electricity">Electricity Bill</option>
            <option value="water">Water Bill</option>
            <option value="telephone">Telephone Bill</option>
        </select>

        <label for="billNumber">BILL NUMBER:</label>
        <input type="text" name="bill_number" placeholder="Enter Bill Number">
       
        <label for="amount">AMOUNT:</label>
        <input type="text" name="amount" placeholder="Enter Amount ($)">
       
        <a href="./billspayment.php"><button type="button" class="cancel">Cancel</button></a>
       <div class="button"> <input type="submit" name="submit" value="Submit"></div>
    </div>
    
    </form>
        </div>
    </div>


</body>

</html>





    