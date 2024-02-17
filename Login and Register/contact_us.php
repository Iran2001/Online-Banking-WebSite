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
            animation: fadeIn 1s ease-in-out;
           
         
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
    
        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        #contact-container {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            width: 400px;
            max-width: 100%;
            padding: 20px;
            box-sizing: border-box;
        }

        h1 {
            color: #ff8c00;
            text-align: center;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 8px;
            color: #555;
        }

        input, textarea {
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            width: 100%;
        }

        button {
            background-color: #ff8c00;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #e07e00;
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
        <i class="fa-user-circle"></i>
       
        <!-- show valuse in data dase name -->
        <?php if (isset($_SESSION['username'])): ?>
        <h2>Welcome, <?php echo $_SESSION['name']; ?></h2>
    <?php endif; ?>
    <?php if (isset($_SESSION['acc_number'])): ?>
        <p>Account Number: <?php echo $_SESSION['acc_number']; ?></p>
    <?php endif; ?>




</div>
            <ul>
                <li><a href="./userhome.php"><i class="fa fa-tachometer"></i>DashBord</a></li><br>
                <li><a href="./Transaction.php"><i class="fas fa-exchange-alt"></i>Transaction</a></li><br>
                <!-- <li><a href="./userThistory.php"><i class="fa fa-history" aria-hidden="true"></i>TranceAction History</a></li><br> -->
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

        <div class="main-content">
        <div id="contact-container">
        <h1>Contact Us</h1>
        <form>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="message">Message:</label>
            <textarea id="message" name="message" rows="4" required></textarea>

            <button type="submit">Submit</button>
        </form>
    </div>
        
        </div>
    </div>


</body>

</html>
<?php mysqli_close($conn); ?>