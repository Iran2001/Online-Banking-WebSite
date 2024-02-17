<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Reset Success</title>
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

        .success-container {
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

        p {
            color: #555;
            margin-bottom: 20px;
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

<div class="success-container">
    <h2>Password Reset Successful</h2>
    <p>Your password has been successfully reset.</p>

    <button onclick="redirectToHome()">Okay</button>
</div>

<script>
    function redirectToHome() {
        // Redirect to your home page or any desired location
        window.location.href = "looo.php";
    }
</script>

</body>
</html>
