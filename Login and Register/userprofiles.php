<?php require_once('./config.php'); ?>


<?php
//apita awshya data tika data base ekta sql widihta kiynwa one kyla..
$quary = "SELECT acc_number,name,email,pnumber FROM user_register_from";

//connection ekai eke quary eka dila kiynwa api data base ekt
$result = mysqli_query($conn, $quary);

//hadapu quary eka giyad kiyla blana ekai kranne..
if ($result) {
    //we can use that code for how many users in here..
    echo mysqli_num_rows($result);
    echo " Query SuccessFull";

    //that one can show data one by one.
    $record = mysqli_fetch_assoc($result);

    // //me pennanne ekkenegge data witharai
    // echo"<pre>";
    // print_r($record);
    // echo"</pre>";

    $table = '<table>';
    $table .= '<tr>
            <th>Account Number</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone Number</th>
    
    
    </tr>';

    while ($record = mysqli_fetch_assoc($result)) {
        $table .= '<tr>';
        $table .= '<td>' . $record['acc_number'] . '</td>';
        $table .= '<td>' . $record['name'] . '</td>';
        $table .= '<td>' . $record['email'] . '</td>';
        $table .= '<td>' . $record['pnumber'] . '</td>';
    }

    $table .= '</table>';
}
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>User Profiles</title>

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


        .sidebar ul li a {
            min-width: 60px;
            font-size: 24px;
            text-align: center;

        }

        /* main section is strats */


        .main_table {
            padding-left: 25%;
            margin-top: 6%;

        }

        .main_table th,
        .main_table td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ffa500;
            /* Orange border */
        }

        .main_table th {
            background-color: #ffa500;
            /* Orange background for header */
            color: #fff;
            /* White text for header */
        }

        .main_table tr:nth-child(even) {
            background-color: #fff;
            /* White background for even rows */
        }

        .main_table tr:nth-child(odd) {
            background-color: #f9f9f9;
            /* Light gray background for odd rows */
        }

        .main_table tr:hover {
            background-color: #ffd700;
            /* Yellow background on hover */
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
            <div class="logo">
                <h2>Bank Dashboard</h2>
            </div>
             <!-- show valuse in data dase name -->
        <?php if (isset($_SESSION['username'])): ?>
        <h2>Welcome, <?php echo $_SESSION['name']; ?></h2>
    <?php endif; ?>
    <?php if (isset($_SESSION['acc_number'])): ?>
        <p>Account Number: <?php echo $_SESSION['acc_number']; ?></p>
    <?php endif; ?>


            <ul>
                <li><a href="./userhome.php"><i class="fa fa-tachometer"></i>DashBord</a></li>
                <li><a href="./Transaction.php"><i class="fas fa-exchange-alt"></i>Transaction</a></li>
                <!-- <li><a href="./deposit.php"><i class="fas fa-money-bill-wave"></i>Deposit</a></li> -->
                <!-- <li><a href="./deposit.php"><i class="fa fa-history" aria-hidden="true"></i>TranceAction History</a></li> -->
                <div class="dropdown">
             
             <button class="dropbtn">Display Details</button>
              <div class="dropdown-content">
     <a href="./userThistory.php">Transaction History</a>
     <a href="./ordercheckbook.php">Order ChequeBook</a>
     <a href="./billspayment.php">Bill Payment</a>
     <a href="./editmyacc.php">Edit My Account</a>
 </div>
</div>
             <br><br>

                <li class="logout"><a href="./logout.php"><i class="fas fa-sign-out-alt"></i>Log Out</a></li>
                <!-- Add more menu items/icons as needed -->
            </ul>
        </div>

        <a name="dashbrodsection">
            <div class="main">
                <div class="main_table">
                    <?php
                    echo $table;
                    ?>

                </div>

            </div>
    </div>
    </a>


</body>

</html>

<?php
mysqli_close($conn);

?>