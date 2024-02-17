<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transfer Success</title>
    <link rel="stylesheet" href="styles.css">

    <style>
        /* Popup styles */
        .popup {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #ff8c00;
            /* Orange color */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            z-index: 1000;
        }

        .popup-content {
            color: #fff;
            /* White text color */
        }

        .close-btn {
            position: absolute;
            top: 10px;
            right: 10px;
            cursor: pointer;
            font-size: 20px;
            color: #fff;
        }

        /* Your other styles */
    </style>
</head>

<body>

    <!-- Your website content goes here -->

    <!-- Transfer Success Popup -->
    <div class="popup" id="transferSuccessPopup">
        <div class="popup-content">
            <span class="close-btn" onclick="closeTransferSuccessPopup()">&times;</span>
            <h2>Transfer Successful!</h2>
            <p>Your transfer has been completed successfully.</p>
        </div>
    </div>

    <!-- Your other HTML elements -->

    <script>
        // Function to open the transfer success popup
        function showTransferSuccessPopup() {
            var popup = document.getElementById("transferSuccessPopup");
            popup.style.display = "block";
        }

        // Function to close the transfer success popup
        function closeTransferSuccessPopup() {
            var popup = document.getElementById("transferSuccessPopup");
            popup.style.display = "none";
        }

        // Example: Show the popup when the transfer is successful
        // Call showTransferSuccessPopup() when your transfer is successful
        // Example: showTransferSuccessPopup();
    </script>
</body>

</html>