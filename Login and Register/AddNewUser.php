<?php
require_once('./config.php');
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
        echo '<script type="text/javascript"> alert("Data Delete")</script>';
        echo '<meta http-equiv="refresh" content="0;url=AddNewUser.php">';
    } else {
        die(mysqli_error($conn));
    }
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

    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            font-family: 'poppins', sans-serif;
            overflow: hidden;


        }

        .topbar {

            
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
        /* .main{

position: absolute;
top: 60px;
width: calc(100% - 260px);
left: 260px;
min-height: calc(100vh - 60px);
background: #f5f5f5;

} */



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


        /* CSS for the registration form */
        .main {
            font-family: Arial, sans-serif;
            margin: 20px;
            margin-right: 150px;
            padding-right: 200px;
            background-color: #f4f4f4;
        }

        /* .container {
    width: 400px;
    margin: 50px auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
} */

.containers{

    margin-left: 300px;
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

        .registered {
            background-color: orange;
        }

        .registered:hover {
            background-color: #2980b9;
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

      
            <div class="main">
                <form action="./AddNewUser.php" method="post" class="registration-form">
                    <div class="containers">
                        <div class="rectangle"></div>
                        <h1 align="center" class="register">Register</h1><br>

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

            </div>
    </div>
  


</body>

</html>