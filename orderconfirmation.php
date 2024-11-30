<?php
// Start session
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation</title>
    <link rel="stylesheet" href="style/style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            color: #333;
            text-align: center;
            padding-top: 100px;
        }

        .confirmation-message {
            background-color: #ff53bd;
            color: white;
            padding: 20px;
            border-radius: 8px;
            font-size: 1.5em;
        }

        .redirect-message {
            margin-top: 20px;
            font-size: 1.2em;
        }

        /* Adjust for smaller screens */
        @media (max-width: 768px) {
            .confirmation-message {
                font-size: 1.2em;
            }
        }
    </style>
    <meta http-equiv="refresh" content="3;url=bini.php"> <!-- Redirects to bini.php after 3 seconds -->
</head>
<body>
    <div class="confirmation-message">
        <h2>Thank you for your purchase!</h2>
        <p>Your order is being processed. You will be redirected shortly.</p>
    </div>
    <div class="redirect-message">
        <p>If you are not redirected automatically, click <a href="bini.php">here</a>.</p>
    </div>
</body>
</html>
