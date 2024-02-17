<?php include('./config.php'); ?>
<?php
if (isset($_POST['submit'])) {
    $faccount=$_POST['accnumber'];
    $taccount=$_POST['taccount'];
     $type = $_POST['type'];
     $amount = $_POST['amount'];
     $date = date('Y-m-d H:i:s'); // Current date and time
 
     // Insert the new transaction into the database
     $Query = "INSERT INTO trans_actions (Faccount, Taccount, amount,type,date) VALUES ('$faccount', 'null', ' $amount','$type','$date')";
     $Result = mysqli_query($conn, $Query);
 
     if ($Result) {
         echo '<script>alert("Transaction added successfully!");</script>';
         // Refresh the page to show the updated transaction history
         echo '<meta http-equiv="refresh" content="0">';
     } else {
         echo '<script>alert("Failed to add transaction.");</script>';
     }
 }
 
 // Fetch transaction data from the database
 $query = "SELECT * FROM trans_actions";
 $result = mysqli_query($conn, $query);
 

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

        .deposit-container {
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

        .deposit-form {
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
        }

        button:hover {
            background-color: #e0524d;
        }

        select {
        width: 150px;
        padding: 10px;
        font-size: 16px;
        border: 1px solid #ccc;
        border-radius: 5px;
        background-color: #ffa500; /* Orange background */
        color: #fff; /* White text color */
        cursor: pointer;
		margin-bottom: 20px;
    }

    /* Style for the options inside the dropdown */
    option {
        background-color: #ffa500; /* Orange background */
        color: #fff; /* White text color */
    }

    /* Style for the dropdown arrow */
    select::-ms-expand {
        display: none;
    }

    select:hover,
    select:focus {
        border-color: #ffa500; /* Change border color on hover/focus */
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
            <ul>
                <li><a href="./userhome.php"><i class="fa fa-tachometer" aria-hidden="true"></i>DashBord</a></li>
                <li><a href="./Transaction.php"><i class="fas fa-exchange-alt"></i>Transaction</a></li>
                <li><a href="./deposit.php"><i class="fas fa-money-bill-wave"></i>Deposit</a></li>
                <li><a href="./userThistory.php"><i class="fa fa-history" aria-hidden="true"></i>TranceAction History</a></li>
                <li class="logout"><a href="./logout.php"><i class="fas fa-sign-out-alt"></i>Log Out</a></li>
                <!-- Add more menu items/icons as needed -->
            </ul>
        </div>

        <div class="main-content">
            <div class="deposit-container">
                <h2>Deposit Page</h2>
              <form action="" method="post">
                <div class="deposit-form">
                    <label for="accountNumber">Account Number:</label>
                    <input type="text" id="accountNumber" name="accnumber"  placeholder="Enter Account Number">

                 
                    <label for="amount">Amount:</label>
                    <input type="text" id="amount" name="amount" placeholder="Enter Amount">

                       
                    <select name="type" id="type" name="type">
                    <option value="Deposit">Deposit</option>
                    <option value="Withdrawal">Withdrawal</option>
                    </select>


                    <button type="submit" name="submit">Submit Deposit</button>
                </div>
                </form>
            </div>
        </div>


</body>

</html>
<?php mysqli_close($conn); ?>