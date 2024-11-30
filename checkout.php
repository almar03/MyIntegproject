<?php
session_start();

// Checkout logic
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $_SESSION['cart'] = []; // Clear cart after checkout
    echo "<script>alert('Thank you for your purchase!'); window.location.href = 'orderconfirmation.php';</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="stylesheet" href="style/style.css">

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
            color: #333;
        }

        /* Container Styling */
        .container {
            max-width: 1200px;
            margin: auto;
            padding: 20px;
            background-color: ;
            opacity: .9;
            margin-top: 100px;
        }

        /* Header Styling */
        header {
            background-color: #ff53bd;
            color: white;
            text-align: center;
            padding: 20px 0;
            opacity: .7;
        }

        header h1 {
            margin: 0;
            font-size: 2.5em;
        }

        /* Background Section Between Header and Footer */
        body {
            background-image: url('binibg.jpg'); /* Add your background image URL here */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed; /* Makes the background image stay in place when scrolling */
        }

        .checkout-form {
            max-width: 600px;
            margin: auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .checkout-form label {
            font-size: 1.2em;
            margin-bottom: 8px;
            display: block;
        }

        .checkout-form input, 
        .checkout-form textarea, 
        .checkout-form select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 1em;
        }

        .checkout-form button[type="submit"] {
            background-color: #ff53bd;
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            width: 100%;
        }

        .checkout-form button[type="submit"]:hover {
            background-color: #e42e93;
        }

        /* Back Button Styling */
        .back-button {
            color: #fff;
            text-decoration: none;
            background-color: #007bff;
            padding: 2px 38px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
            margin-top: 30px; /* Adjust this value to move the button further down */
        }

        .back-button:hover {
            background-color: #0056b3;
        }

        /* Footer Styling */
        footer {
            text-align: center;
            background: #ff53bd;
            color: white;
            padding: 10px 0;
            margin-top: 40px;
        }

        /* Responsive Styling */
        @media (max-width: 768px) {
            .checkout-form {
                width: 90%;
            }

            header h1 {
                font-size: 2em;
            }
        }
    </style>
</head>
<body>
    <header>
        <h1>Checkout</h1>
        <a href="cart.php" class="back-button">Back to Cart</a>
    </header>
    <main>
        <div class="container">
            <form method="post" class="checkout-form">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>

                <label for="address">Address:</label>
                <textarea id="address" name="address" rows="4" required></textarea>

                <label for="contact">Contact Number:</label>
                <input type="text" id="contact" name="contact" required>

                <label for="email">Email Address:</label>
                <input type="email" id="email" name="email" required>

                <label for="shipping">Shipping Method:</label>
                <select id="shipping" name="shipping" required>
                    <option value="standard">Standard Shipping (3-5 days)</option>
                    <option value="express">Express Shipping (1-2 days)</option>
                    <option value="pickup">Store Pickup</option>
                </select>

                <label for="payment">Payment Method:</label>
                <select id="payment" name="payment" required>
                    <option value="cash">Cash on Delivery</option>
                    <option value="card">Credit/Debit Card</option>
                </select>

                <button type="submit">Place Order</button>
            </form>
        </div>
    </main>
    <footer>
        <p>&copy; <?= date('Y'); ?> BINI Merch Store. All rights reserved.</p>
    </footer>
</body>
</html>
