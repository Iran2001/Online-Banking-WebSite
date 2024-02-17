<?php require_once('./config.php'); ?>




<!-- // Update kranna one quary eka
// UPDATE table_name SET column1 =valu_1,column_2=value_2
// WHERE column_name=value
// LIMIT 1 ====MEKEN WENNE eka data ekak witharai ekapara kranna puluwn kiyana eka.. -->




<?php
if (isset($_POST['update'])) {
    $accnumber = $_POST['account_number'];

    $query = "UPDATE user_register_from SET name='$_POST[name]',email='$_POST[email]',pnumber='$_POST[pnumber]',password='$_POST[password]' WHERE acc_number='$_POST[account_number]' ";
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit_User</title>
    <link rel="stylesheet" href="./css/admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            font-family: 'poppins', sans-serif;


        }

        .topbar {

            /* position: fixed; */
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
            background-color: whitesmoke;
            margin-left: 20%;
            margin-top: 30px;
            height: 500px;

        }

        input {
            padding: 8px 15px 8px 15px;
            width: 500px;
            height: 5%;
            border: 1px;
            border-radius: 5px;
            margin: 10px 0px 15px 0px;
            box-shadow: 1px 1px 2px 1px grey;
        }

        form {
            align-items: center;
            margin-top: 50px;
            width: 80%;
            max-width: 600px;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        input[type="submit"] {
            background-color: orange;
            color: #fff;
            cursor: pointer;
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

                    <form action="" method="post">

                        <input type="text" name="account_number" placeholder="Enter Account Number"> <br>
                        <input type="text" name="name" placeholder="Enter Name"><br>
                        <input type="text" name="email" placeholder="Enter Email"><br>
                        <input type="text" name="pnumber" placeholder="Enter Phone Number"><br>
                        <input type="text" name="password" placeholder="Enter Password"><br>

                        <input type="submit" name="update" value="Update">


                    </form>


                </div>

        </div>
        </a>

        <?php if (isset($success_message)): ?>
    <div class="success-message"><?php echo $success_message; ?></div>
<?php endif; ?>

<?php if (isset($error_message)): ?>
    <div class="error-message"><?php echo $error_message; ?></div>
<?php endif; ?> 

</body>

</html>



<?php mysqli_close($conn); ?>