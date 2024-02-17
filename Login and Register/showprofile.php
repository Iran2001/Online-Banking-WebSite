<?php include('./config.php'); ?>
<?php
session_start();

if (isset($_SESSION['acc_number'])) {
    $accNumber = $_SESSION['acc_number'];
    // Fetch user details from the database
    $sql = "SELECT * FROM user_register_from WHERE acc_number = '$accNumber'";
    $result = mysqli_query($conn, $sql);
    if ($result && mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
    } else {
        echo "User not found.";
        // Handle the case when the user is not found
    }
} else {
    echo "Session variable 'acc_number' is not set.";
    // Handle the case when 'acc_number' is not set
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        .profile-header {
            text-align: center;
            margin-bottom: 20px;
        }

        .profile-header h1 {
            color: orange;
            margin-bottom: 5px;
        }

        .profile-details {
            border-top: 2px solid orange;
            padding-top: 20px;
        }

        .profile-details h2 {
            color: orange;
            margin-bottom: 10px;
        }

        .profile-details p {
            font-size: 18px;
            margin-bottom: 10px;
        }

        .profile-details strong {
            font-weight: bold;
        }

        /* Style the logout button */
        .logout-btn {
            text-align: center;
            margin-top: 20px;
        }

        .logout-btn a {
            background-color: orange;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .logout-btn a:hover {
            background-color: #e0524d;
        }
    </style>
</head>

<body>
    <!-- Your HTML content -->
    <div class="container">
        <div class="profile-header">
            <h1>User Profile</h1>
            <?php if (isset($_SESSION['acc_number'])): ?>
                <p>Account Number: <?php echo $_SESSION['acc_number']; ?></p>
            <?php endif; ?>
            <?php if (isset($_SESSION['name'])): ?>
                <p>Welcome, <?php echo $_SESSION['name']; ?></p>
            <?php endif; ?>
        </div>
        <div class="profile-details">
            <h2>Profile Details</h2>
            <?php if (isset($user)): ?>
                <p><strong>Account Number:</strong> <?php echo $user['acc_number']; ?></p>
                <p><strong>Name:</strong> <?php echo $user['name']; ?></p>
                <p><strong>Email:</strong> <?php echo $user['email']; ?></p>
                <p><strong>Phone Number:</strong> <?php echo $user['pnumber']; ?></p>
                <p><strong>Balance:</strong> <?php echo $user['balance']; ?></p>
                <p><strong>Total Withdrawal:</strong> <?php echo $user['twidthrowal']; ?></p>
            <?php endif; ?>
        </div>
        <div class="logout-btn">
            <a href="./userhome.php">Back</a>
        </div>
    </div>
</body></html>



