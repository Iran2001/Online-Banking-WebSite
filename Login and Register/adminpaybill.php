<?php include('./config.php'); ?>

<?php


$query = "SELECT * FROM pay_bill";
$result = mysqli_query($conn, $query);


if ($result) {
    echo mysqli_num_rows($result);
    echo " Query SuccessFull";
    $record = mysqli_fetch_assoc($result);
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bank_Admin</title>
    <link rel="stylesheet" href="./css/admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    

  
    <!-- chart 2 start  -->

    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            font-family: 'poppins', sans-serif;


        }

        .topbar {

            position: fixed;
            background: #fff;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.08);
            width: 100%;
            padding: 0 20px;
            display: grid;
            grid-template-columns: 2fr 10fr 0.4f 1fr;
            align-items: center;
            z-index: 1;
        }

        .logo h2 {
            margin-top: 20px;
            color: orange;
        }

        .welcome {
            position: relative;
            width: 60%;
            justify-self: center;
            margin-left: 100px;
            margin-top: -30px;
        }

        /* sidebar started */

        .sidebar {
            position: fixed;
            top: 60px;
            width: 260px;
            height: calc(100% - 60px);
            background: orange;
            overflow: hidden;
        }

        .sidebar ul {
            margin-top: 20px;
        }

        .sidebar ul li {

            width: 100%;
            list-style: none;
            gap: 10px;
        }

        .sidebar ul li :hover {
            color: #888;
        }

        .sidebar ul li a :hover {
            background: orange;
        }

        .sidebar ul li a {

            width: 100%;
            text-decoration: none;
            color: #fff;
            height: 60px;
            display: flex;
            align-items: center;


        }

        .sidebar ul li a:active {
            color: gray;
        }

        .sidebar ul li a:visited {
            color: white;
        }


        .sidebar ul li a {
            min-width: 60px;
            font-size: 24px;
            text-align: center;

        }

        /* main section is strats */
        .main {

            position: absolute;
            top: 60px;
            width: calc(100% - 260px);
            left: 260px;
            min-height: calc(100vh - 60px);
            background: #f5f5f5;

        }

        .cards {
            width: 100%;
            padding: 35px 20px;
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
            width: 90%;
            height: 100%;
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

        table {
            width: 80%;
            border-collapse: collapse;
            margin: 20px auto;
        }

        td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
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

    </style>




</head>

<body>

    <div class="container">
        <div class="topbar">
            <div class="logo">
                <h2>Bank . . </h2>
            </div>
            <div class="welcome">
                <h1>Bank Admin</h1>
            </div>
            <!-- <div class="pro-img"></div> -->


        </div>
        <div class="sidebar">
            <div class="name_and_acc">
                
            </div>
            <ul>
                <li>
                    <a href="./admin_Dashbord.php">
                        <i class="fa-solid fa-gauge"></i>
                        <div class="bb">DashBord</div>

                    </a>

                </li>


                <li>
                    <a href="./AddNewUser.php">
                        <i class="fa-solid fa-user-plus"></i>
                        <div class="bb">Add New User</div>

                    </a>

                </li>


                <li>
                    <a href="./EditUser.php">
                        <i class="fa-solid fa-user-pen"></i>
                        <div class="bb"> Edit User</div>

                    </a>

                </li>


                <li>
                    <a href="./adminuserprofiles.php">
                        <i class="fa-solid fa-users"></i>
                        <div class="bb">User Profiles</div>

                    </a>

                </li>


                <li>
                    <a href="./admincontactus.php">
                    <i class="fa-solid fa-address-card"></i>
                        <div class="bb">User ContactUs</div>

                    </a>

                </li>

                <li>
                    <a href="./adminThistory.php">
                    <i class="fa-solid fa-clock-rotate-left"></i>
                        <div class="bb">TranceAction History</div>

                    </a>

                </li>



                <li>
                    <a href="./adminchecbook.php">
                    <i class="fa-solid fa-book"></i>
                        <div class="bb">order Checkbook</div>

                    </a>

                </li>


                <li>
                    <a href="./adminpaybill.php">
                    <i class="fa-solid fa-file-invoice"></i>
                        <div class="bb">Bill Payments</div>

                    </a>

                </li>
                
                <li>
                    <a href="./DeleteUsers.php">
                        <i class="fa-solid fa-user-minus"></i>
                        <div class="bb">Delete</div>

                    </a>

                </li>


                <li class="logout"><a href="./logout.php"><i class="fas fa-sign-out-alt"></i>Log Out</a></li>

            </ul>
        </div>

            <div class="main">
              
            <div class="history-container">
        <h2>Pay Bills</h2>
        <div class="transaction-history">
            <?php
            // Loop through the fetched transactions and display them
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<div class="transaction-item">';
                echo '<div class="transaction-details">';
               // echo 'Account Number : '.$accNumber;
                echo '<div class="transaction-amount">' .'Phone Number:'. $row['pnumber'] .'</div>';
                echo '<div class="transaction-type">' . 'Bill Type :'.$row['type'] . '</div>';
                echo '<div class="transaction-type">' . 'Bill Number :'.$row['bill_number'] . '</div>';
                echo '<div class="transaction-type">' . 'Amount :'.$row['amount'] . '</div>';
                
                echo '</div>';
                echo '<div class="transaction-icon"> <i class="fa-solid fa-file-invoice"></i>';
                // Add an icon if needed
                echo '</div>';
                echo '</div>';
            }
            ?>
        </div>
    </div>


    </div>


</body>

</html>

