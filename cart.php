<?php
session_start();

// Remove item logic
if (isset($_POST['remove_item'])) {
    $id = $_POST['item_id'];
    unset($_SESSION['cart'][$id]);
    header("Location: cart.php");
    exit;
}

// Clear cart logic
if (isset($_POST['clear_cart'])) {
    $_SESSION['cart'] = [];
    header("Location: cart.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link rel="stylesheet" href="style/style.css">

    <style>
        /* Global Styles */
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
    background-color: #f38ccb;
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

/* Cart Page Specific Styles */
main {
    margin-top: 20px;
    padding: 20px;
    background-color: rgba(255, 255, 255, 0.8);
    border-radius: 10px;
}

.cart-list {
    list-style: none;
    padding: 0;
}

.cart-list li {
    display: flex;
    align-items: center;
    margin-bottom: 20px;
    padding: 10px;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.cart-image {
    width: 80px;
    height: 80px;
    object-fit: cover;
    border-radius: 8px;
    margin-right: 20px;
}

.cart-list span {
    flex: 1;
}

button[type="submit"] {
    background-color: #ff53bd;
    color: white;
    border: none;
    padding: 8px 16px;
    border-radius: 8px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

button[type="submit"]:hover {
    background-color: #e42e93;
}

.clear-button, .checkout-button {
    display: inline-block;
    padding: 10px 20px;
    background-color: #007bff;
    color: white;
    border-radius: 5px;
    text-decoration: none;
    font-size: 16px;
    text-align: center;
    margin-top: 20px;
    transition: background-color 0.3s ease;
}

.clear-button:hover, .checkout-button:hover {
    background-color: #0056b3;
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

    </style>
</head>
<body>
    <header>
        <h1>Your Cart</h1>
        <a href="index1.php" class="back-button">Back to Store</a>
    </header>
    <main>
        <?php if (empty($_SESSION['cart'])): ?>
            <p>Your cart is empty!</p>
        <?php else: ?>
            <ul class="cart-list">
                <?php foreach ($_SESSION['cart'] as $id => $cart_item): ?>
                    <li>
                        <img src="<?= $cart_item['item']['image']; ?>" alt="<?= $cart_item['item']['name']; ?>" class="cart-image">
                        <span><?= $cart_item['item']['name']; ?></span>
                        <span>₱<?= number_format($cart_item['item']['price'], 2); ?></span>
                        <span>Qty: <?= $cart_item['quantity']; ?></span>
                        <form method="post">
                            <input type="hidden" name="item_id" value="<?= $id; ?>">
                            <button type="submit" name="remove_item">Remove</button>
                        </form>
                    </li>
                <?php endforeach; ?>
            </ul>
            <form method="post">
                <button type="submit" name="clear_cart" class="clear-button">Clear Cart</button>
            </form>
            <a href="checkout.php" class="checkout-button">Proceed to Checkout</a>
        <?php endif; ?>
    </main>
</body>
</html>
