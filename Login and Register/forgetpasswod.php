<?php
include('./config.php');

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize the input
    $newPassword = password_hash($_POST["new_password"], PASSWORD_BCRYPT);
    $accountNumber = $conn->real_escape_string($_POST["acc_number"]);

    // Perform a secure database update using prepared statements
    $query = $conn->prepare("UPDATE user_register_from SET password = ? WHERE acc_number = ?");
    $query->bind_param("si", $newPassword, $accountNumber);
    $query->execute();

    // Check if the update was successful
    if ($query->affected_rows > 0) {
        echo "Password reset successful.";
    } else {
        echo "Password reset failed. Account number not found or no changes were made.";
    }

    $query->close();
}

// Close the database connection
$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .forgot-password-container {
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            padding: 20px;
            width: 300px;
            text-align: center;
        }

        h2 {
            color: #333;
        }

        label {
            display: block;
            margin: 10px 0 5px;
            color: #555;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            background-color: orange;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
</head>
<body>

<div class="forgot-password-container">
    <h2>Forgot Password</h2>
    <p>Enter your Account Number and reset your password.</p>

    <form action="./resussesmsg.php" method="post">
    <label for="acc_number">Account Number:</label>
    <input type="text" id="acc_number" name="acc_number" required>

    <label for="new_password">New Password:</label>
    <input type="password" id="new_password" name="new_password" required>

    <button type="submit" name="submit">Reset Password</button>
</form>

</div>

</body>
</html>
