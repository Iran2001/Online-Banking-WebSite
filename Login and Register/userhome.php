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



if (isset($_POST['submit'])) {



    $accnumber = $_POST['accnumber'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pnumber = $_POST['pnumber'];
    $password = $_POST['password'];

    // Encript data.....
    $hash_password = sha1($password);

    $sql = "insert into `user_register_from`(acc_number,name,email,pnumber,password) values('$accnumber','$name','$email','$pnumber','$hash_password')";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo '<script type="text/javascript"> alert("Profile Update SuccessFull")</script>';
        echo '<meta http-equiv="refresh" content="0;url=userhome.php">';
    } else {
        die(mysqli_error($conn));
    }
//get values and save this 
    $acc_number = isset($_SESSION['acc_number']) ? $_SESSION['acc_number'] : null;
    $username = isset($_SESSION['name']) ? $_SESSION['username'] : null;
                                                                                                                                                                                                                                                                                                                                      

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
   
    <link rel="stylesheet" href="./logo.jpeg" type="x-width">
    
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
            width: 200px;
        }

        .logo h2 {
    margin-bottom: 20px;
    font-size: 24px;
    color: #fff;
}

.logo p {
    margin-top: 5px;
    font-size: 16px;
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

        /* Inside the existing styles */
.logo h2 {
    margin-bottom: 20px;
    font-size: 24px;
    color: #fff;
}

.logo p {
    margin-top: 5px;
    font-size: 16px;
    color: #fff;
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
            margin-bottom: 20px;
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
        .account-number {
            font-size: 18px;
            color: #555;
            margin-bottom: 15px;
        }

        .username {
            font-size: 16px;
            color: #777;
            margin-bottom: 15px;
        }

        .icon{
           box-sizing: border-box;
           flex-direction: row;
           align-items: center; 
        }

/* \\\\\\\\\\\\\open page animation  */
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
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['bar']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Year', 'Total Users', 'Expenses', 'Profit'],
                ['2020', 1000, 400, 20],
                ['2021', 1170, 460, 25],
                ['2022', 660, 1120, 30],
                ['2023', 1030, 540, 35]
            ]);

            var options = {
                chart: {
                    title: 'Bank Performance',
                    subtitle: 'Banck, Expenses, and Profit: 2020-2023',
                }
            };

            var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

            chart.draw(data, google.charts.Bar.convertOptions(options));
        }
    </script>

<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Mon', 28, 28, 38, 38],
          ['Tue', 38, 38, 55, 55],
          ['Wed', 55, 55, 77, 77],
          ['Thu', 77, 77, 66, 66],
          ['Fri', 66, 66, 22, 22]
          // Treat the first row as data.
        ], true);

        var options = {
          legend: 'none',
          bar: { groupWidth: '100%' }, // Remove space between bars.
          candlestick: {
            fallingColor: { strokeWidth: 0, fill: '#a52714' }, // red
            risingColor: { strokeWidth: 0, fill: '#0f9d58' }   // green
          }
        };

        var chart = new google.visualization.CandlestickChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>


</head>

<body>

    <div class="dashboard">
    <div class="sidebar">
            <div class="logo">
                <h2>Nexus Dashboard</h2>
            </div>
             <!-- show valuse in data dase name -->
      
    <?php if (isset($_SESSION['acc_number'])): ?>
        <p>Account Number: <?php echo $_SESSION['acc_number']; ?></p>
    <?php endif; ?>

    <?php if (isset($_SESSION['name'])): ?>
     <p>Welcome, <?php echo $_SESSION['name']; ?></p>
    <?php endif; ?>


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

            
            <h1> Nexus Dashboard</h1>

            <div class="cards">
                <!-- ----------------------------------- -->
                <div class="card">
                    <div class="card-content">






                        <div class="number">
                        <?php
if (isset($_SESSION['acc_number'])) {
    // Retrieve the session value and store it in a PHP variable
    $acc_number = $_SESSION['acc_number'];
    $sql="SELECT balance,twidthrowal FROM user_register_from WHERE acc_number='$acc_number'";
    $result = mysqli_query($conn,$sql);

    if ($result) {
        // Check if there is a result row
        if (mysqli_num_rows($result) > 0) {
            // Fetch the result row
            $row = mysqli_fetch_assoc($result);
            
            // Retrieve user balance from the row
            $balance = $row['balance'];
            $withdrawal=$row['twidthrowal'];

            // Display the user balance
           // echo "Account Number: " . $acc_number . "<br>";
           // echo "Balance: $" . $balance;
        } else {
            echo "No balance found for account number: " . $acc_number;
        }
    }
    else {
        echo "Error retrieving balance: " . mysqli_error($conn);
    } 
}

else {
    // Session variable not set
    echo "Session variable 'acc_number' is not set.";
}
?>
    
                        
                        
                        <?php echo $balance ?>$
                         </div>
                        <div class="card-name">Total Balance</div>

                    </div>
                    <div class="icon-box">
                    <i class="fa fa-credit-card-alt"></i>
                    </div>
                </div>




                <div class="card">

                    <div class="card-content">
                        <div class="number"> <?php echo  $withdrawal ?>$</div>
                        <div class="card-name">Total withdrawal</div>

                    </div>
                    <div class="icon-box">
                        <i class="fa fa-credit-card-alt"></i>

                    </div>
                </div><i class="fa fa-money"></i>





                <div class="card">

                    <div class="card-content">
                        <div class="number">$</div>
                        <div class="card-name">Total Deposits</div>

                    </div>
                    <div class="icon-box">
                        <i class="fa fa-handshake"></i>

                    </div>
                </div>

            </div>


            <div class="charts">

                <div class="chart">
                    <h2>Nexus Daliy Updates</h2>
                    <div id="chart_div" style="width: 500px; height: 400px;"></div>
                  
                </div>

                <div class="chart">
                <div id="columnchart_material" style="width: 500px; height: 400px;"></div> 
               
                </div>



            </div>
        </div>
    </div>


</body>

</html>
<?php mysqli_close($conn); ?>