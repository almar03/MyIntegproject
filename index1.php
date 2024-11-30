<?php
session_start();

// Initialize cart if not already set
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Sample merch items
$merch_items = [
    1 => ['name' => 'BINI T-shirt', 'price' => 600, 'image' => 'img/pink.jpg'],
    2 => ['name' => 'BINI Hoodie', 'price' => 900, 'image' => 'img/hood.jpg'],
    3 => ['name' => 'BINI Cap', 'price' => 400, 'image' => 'img/cap.jpg'],
    4 => ['name' => 'BINI Tote Bag', 'price' => 350, 'image' => 'img/bag.jpg'],
    5 => ['name' => 'BINI Notebook', 'price' => 250, 'image' => 'img/note.jpg'],
    6 => ['name' => 'BINI Keychain', 'price' => 150, 'image' => 'img/keychain.jpg'], 
    7 => ['name' => 'BINI Poster', 'price' => 200, 'image' => 'img/poster.jpg'],    
    8 => ['name' => 'BINI Wristband', 'price' => 100, 'image' => 'img/wristband.jpg'] 
];

// Add to cart logic
if (isset($_POST['add_to_cart'])) {
    $id = $_POST['item_id'];
    if (isset($merch_items[$id])) {
        if (!isset($_SESSION['cart'][$id])) {
            $_SESSION['cart'][$id] = ['quantity' => 1, 'item' => $merch_items[$id]];
        } else {
            $_SESSION['cart'][$id]['quantity']++;
        }
    }
    header("Location: index1.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Merch Store</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style/index1.css">

    <style>

    .merch-image {
    width: 100%; /* Ensure responsiveness */
    height: 200px; /* Set a fixed height */
    object-fit: cover; /* Crop or fit the image while maintaining proportions */
    border-radius: 8px; /* Optional: add rounded corners */
    }

    footer {
    background-color: #0d6efd; /* BINI blue background */
    padding: 20px 0;
    text-align: center;
    margin-top: 40px;
    border-top: 1px solid #e9ecef; /* Subtle border */
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Added shadow for boldness */
}

footer p {
    margin: 0;
    color: #ffffff; /* White text for contrast */
    font-size: 14px;
}

footer a {
    color: #f8f9fa; /* White text for the link */
    text-decoration: none;
}

footer a:hover {
    text-decoration: underline;
}

    </style>
</head>
<body>
    <!-- Navigation Bar with BINI Logo -->
    <header class="bg-primary text-white text-center py-3">
        <div class="container d-flex justify-content-between align-items-center">
            <!-- BINI Logo with link to member_details.php -->
            <a href="bini.php">
                <img src="img/logo.jpg" alt="BINI Logo" height="40"> <!-- Replace with actual logo path -->
            </a>
            <h1 class="mx-auto">Merch Store</h1>
            <a href="cart.php" class="btn btn-light position-absolute top-0 end-0 m-3">
                View Cart (<?= array_sum(array_column($_SESSION['cart'], 'quantity')); ?>)
            </a>
        </div>
    </header>
    <main class="container mt-4">
        <div class="row g-4">
            <?php foreach ($merch_items as $id => $item): ?>
                <div class="col-md-4 col-lg-3">
                    <div class="card h-100">
                        <img src="<?= $item['image']; ?>" alt="<?= $item['name']; ?>" class="card-img-top">
                        <div class="card-body text-center">
                            <h5 class="card-title"><?= $item['name']; ?></h5>
                            <p class="card-text">₱<?= number_format($item['price'], 2); ?></p>
                            <form method="post">
                                <input type="hidden" name="item_id" value="<?= $id; ?>">
                                <button type="submit" name="add_to_cart" class="btn btn-primary w-100">
                                    Add to Cart
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </main>
    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    
    <footer>
        <p>&copy; <?= date('Y'); ?> BINI Merch Store. All rights reserved.</p>
        <p>Powered by <a href="https://bini.ph" target="_blank">BINI Official</a></p>
    </footer>
</body>

</html>
