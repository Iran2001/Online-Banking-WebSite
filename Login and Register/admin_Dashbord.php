<?php include('./config.php'); ?>
<?php $all_balance = $conn->query('SELECT SUM(amount) AS balance FROM trans_actions')->fetch_assoc()['balance'];?>
<?php $avg_balance = $conn->query('SELECT AVG(amount) AS balance FROM trans_actions')->fetch_assoc()['balance'];?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bank_Admin</title>
    <link rel="stylesheet" href="./css/admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    

    <!-- chartOne -->

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Year', 'Sales', 'Expenses'],
          ['2013',  1000,      400],
          ['2014',  1170,      460],
          ['2015',  660,       1120],
          ['2016',  1030,      540]
        ]);

        var options = {
          title: 'Nexus Performance',
          hAxis: {title: 'Year',  titleTextStyle: {color: '#333'}},
          vAxis: {minValue: 0}
        };

        var options_fullStacked = {
          isStacked: 'relative',
          height: 200,
          legend: {position: 'top', maxLines: 3},
          vAxis: {
            minValue: 0,
            ticks: [0, .3, .6, .9, 1]
          }
        };
        var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>
    </script>

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
.input{
padding-right: -10px;
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

        <a name="dashbrodsection">
            <div class="main">
                <div class="cards">
                    <!-- ----------------------------------- -->
                    <div class="card">
                        <div class="card-content">
                            <div class="number">
                                <?php
                                $quary = "SELECT acc_number,name,email,pnumber FROM user_register_from";

                                //connection ekai eke quary eka dila kiynwa api data base ekt
                                $result = mysqli_query($conn, $quary);

                                //hadapu quary eka giyad kiyla blana ekai kranne..
                                if ($result) {
                                    //we can use that code for how many users in here..
                                    echo mysqli_num_rows($result);
                                    // echo" Query SuccessFull";

                                    //that one can show data one by one.
                                    // $record=mysqli_fetch_assoc($result);
                                }
                                ?>

                            </div>
                            <div class="card-name">Total Users</div>

                        </div>
                        <div class="icon-box">
                            <i class="fa-solid fa-users"></i>

                        </div>
                    </div>




                    <div class="card">

                        <div class="card-content">
                            <div class="number">$
                                <?php
                                echo $all_balance;
                                ?>
                            </div>
                            <div class="card-name">Total Bank Balance</div>

                        </div>
                        <div class="icon-box">
                          
                        <i class="fa-solid fa-dollar-sign"></i>

                        </div>
                    </div>





                    <div class="card">

                        <div class="card-content">
                            <div class="number">$
                                <?php
                                echo $avg_balance;
                                ?>
                            </div>
                            <div class="card-name">Average For Person</div>

                        </div>
                        <div class="icon-box">
                        <i class="fa-solid fa-chart-simple"></i>

                        </div>
                    </div>

                </div>


                <div class="charts">

                    <div class="chart">
                        <h2>Earrning</h2>

                        <div 
                        
                        
                        id="chart_div"
                        
                        
                        ></div>
                        
                    </div>

                    <div class="chart">
                        <div class="btn_search">
                            <form action="" method="post">
                                <h2>Quik Search</h2>
                                <input type="text" placeholder="Enter Account Number" name="search" class="input">
                                <button class="btn btn-dark btn-sm" name="submit">Search</button>
                                <?php

if (isset($_POST['submit'])) {
    $accnumber = $_POST['search'];
    $query = "SELECT * FROM user_register_from WHERE acc_number='$accnumber'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        if(mysqli_num_rows($result) > 0) {
           echo "<table>";
            while($record = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>"."Account Number"."<br>".$record['acc_number']."<td>";
                echo "<td>"."User Name"."<br>".$record['name']."<td>";
                echo "<td>"."User Email".$record['email']."<td>";
                echo "<tr>";
            }
      echo"</table>";
        } else {
            echo "No records found.";
        }
    } else {
        echo "Query failed: " . mysqli_error($conn);
    }
}

                                ?>
                            </form>

                        </div>
                    </div>



                </div>


            </div>
    </div>
    </a>

</body>

</html>

<?php mysqli_close($conn); ?>