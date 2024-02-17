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
if (isset($_POST['submit'])) {
    $accnumber = $_POST['account_number'];

    $query = "UPDATE user_register_from SET name='$_POST[name]',email='$_POST[email]',pnumber='$_POST[pnumber]',password='$_POST[password]' WHERE acc_number='$_POST[accnumber]' ";
    $result = mysqli_query($conn, $query);


    if ($result) {
        echo '<script type="text/javascript>" alert("Data Updated")</script>';
    } else {
        echo '<script type="text/javascript>" alert("Data Not Updated")</script>';
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
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            overflow: hidden;
        }

     .dashboard{
       display: flex;
       flex-direction: row;

     }
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            color: #333;
            /* display: flex;
            flex-direction: row; */
        }

        h1 {
            color: orange;
            text-align: center;
            margin-bottom: 20px;
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
            flex: 0;
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
            height:100%;
            overflow: hidden;
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
            overflow: hidden;
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

        /* charts is starts */

       
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
            <?php if (isset($_SESSION['name'])): ?>
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
 
        <h1>Edit Account </h1>
            <div class="chart">
                    <div class="btn_search">
                        <form action="" method="post">
                            <h2>Edit My Account</h2>
                            <form action="./AddNewUser.php" method="post" class="registration-form">
                                <div class="containers">
                                    <div class="rectangle"></div>

                                    <label for="accnumber">ACCOUNT NUMBER:</label><br>
                                    <input type="text" id="accnumber" placeholder="Enter Account Number" class="input-field" name="accnumber"><br>

                                    <label for="name">NAME:</label><br>
                                    <input type="text" id="name" placeholder="Enter Name" class="input-field" name="name"><br>

                                    <label for="email">E-MAIL ADDRESS:</label><br>
                                    <input type="email" id="email" placeholder="Enter E-mail Address" class="input-field" name="email"><br>

                                    <label for="pnumber">PHONE NUMBER:</label><br>
                                    <input type="tel" id="pnumber" placeholder="Enter phone Number" class="input-field" name="pnumber"><br>

                                    <label for="password">Password:</label><br>
                                    <input type="password" id="password" placeholder="Enter Password" class="input-field" name="password"><br>

                                    <!-- <a href="HomePage.php"><button type="button" class="cancel"> Cancel </button></a> -->
                                    <button type="submit" class="registered" name="submit"> Add New User </button><br>

                                    <div class="rectangle1"></div>
                                </div>
                            </form>

                        </form>

                    </div>
        
            </div>  

        </div>
    </div>


</body>

</html>
<?php // mysqli_close($conn); ?>












