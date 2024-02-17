<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bill Payment</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            color: #333;
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: orange;
            text-align: center;
            margin-bottom: 20px;
        }

        .payment-form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        label {
            font-weight: bold;
            margin-bottom: 6px;
        }

        input, select {
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
            /* display: grid; */
            display: flex;
            /* flex-direction: row; */
            /* column-gap: 20px; */
            justify-content: space-between;
            /* grid-template-columns: repeat(3, 1fr);
            grid-gap: 20px; */

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
            /* display: grid; */
            display: flex;
            /* flex-direction: row; */
            /* column-gap: 20px; */
            justify-content: space-between;
            /* grid-template-columns: repeat(3, 1fr);
            grid-gap: 20px; */

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

        label {
            display: block;
            margin-bottom: 6px;
            font-weight: bold;
            color: #333;
        }

        .input-field {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .cancel,
        .registered {
            padding: 10px 20px;
            margin-right: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            color: #fff;
        }

        .cancel {
            background-color: #ccc;
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
                <li><a href="./userhome.php"><i class="fa fa-tachometer"></i>DashBord</a></li><br>
                <li><a href="./Transaction.php"><i class="fas fa-exchange-alt"></i>Transaction</a></li><br>
                <li><a href="./deposit.php"><i class="fas fa-money-bill-wave"></i>Deposit</a></li><br>
                <li><a href="./userThistory.php"><i class="fa fa-history" aria-hidden="true"></i>TranceAction History</a></li><br>
                <div class="dropdown">
             
                <button class="dropbtn">Display Details</button>
                <div class="dropdown">
             
             <button class="dropbtn">Display Details</button>
              <div class="dropdown-content">
     <a href="./Transaction.php">Transaction History</a>
     <a href="./orderhistory.php">Order History</a>
     <a href="./billbook.php">Bill Payment History</a>
     <a href="cruntblance.php">Current Balance</a>
     <a href="./editmyacc.php">Edit My Account</a>
 </div>
</div>
       
</div>
                <br><br>
                <li class="logout"><a href="./logout.php"><i class="fas fa-sign-out-alt"></i>Log Out</a></li>
               
               
                <!-- Add more menu items/icons as needed -->
            </ul>
        </div>

        <div class="main-content">
            <h1>Bill PayMent </h1>
 <div class="container">
    <h1>Bill Payment</h1>
    <div class="payment-form">
        <label for="customerName">Customer Name:</label>
        <input type="text" id="customerName" placeholder="Enter Customer Name" required>

        <label for="phoneNumber">Customer Phone Number:</label>
        <input type="tel" id="phoneNumber" placeholder="Enter Phone Number" required>

        <label for="billType">Bill Type:</label>
        <select id="billType" required>
            <option value="electricity">Electricity Bill</option>
            <option value="water">Water Bill</option>
            <option value="telephone">Telephone Bill</option>
        </select>

        <label for="billNumber">Bill Number:</label>
        <input type="text" id="billNumber" placeholder="Enter Bill Number" required>

        <label for="amount">Amount:</label>
        <input type="number" id="amount" placeholder="Enter Amount" required>

        <button type="button" onclick="processPayment()">Pay</button>
    </div>
</div> 
           
        </div>
    </div>


<script>
    function processPayment() {
        // Add your JavaScript logic to handle the payment process
        alert("Payment processed successfully!");
    }
</script>

</body>
</html>
