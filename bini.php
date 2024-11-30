<?php
session_start();

// BINI members array
$members = [
    [
        "name" => "Jhoanna Robles",
        "role" => "Leader, Lead Vocalist, Lead Rapper",
        "age" => 20,
        "birthplace" => "Laguna, Philippines",
        "img" => "jhoanna.jpg",
        "id" => 1, // Unique identifier for the member
    ],
    [
        "name" => "Aiah Arceta",
        "role" => "Main Rapper, Sub Vocalist, Visual",
        "age" => 23,
        "birthplace" => "Cebu, Philippines",
        "img" => "aiah.jpg",
        "id" => 2,
    ],
    [
        "name" => "Colet Vergara",
        "role" => "Main Vocalist, Lead Dancer, Lead Rapper",
        "age" => 23,
        "birthplace" => "Bohol, Philippines",
        "img" => "colet.jpg",
        "id" => 3,
    ],
    [
        "name" => "Sheena Mae Catacutan",
        "role" => "Main Dancer, Sub-Vocalist, Youngest (Bunso)",
        "age" => 20,
        "birthplace" => "Santiago City, Isabela, Philippines",
        "img" => "sheena.jpg",
        "id" => 4,
    ],
    [
        "name" => "Gwenneth Apuli",
        "role" => "Lead Vocalist, Lead Rapper",
        "age" => 21,
        "birthplace" => "Daraga, Albay, Philippines",
        "img" => "gwen.jpg",
        "id" => 5,
    ],
    [
        "name" => "Mary Loi Yves Ricalde",
        "role" => "Main Vocalist",
        "age" => 22,
        "birthplace" => "Lemery, Batangas, Philippines",
        "img" => "maloi.jpg",
        "id" => 6,
    ],
    [
        "name" => "Lindtsey Stacey Aubrey Casumpang Sevilleja",
        "role" => "Main Rapper, Lead Dancer",
        "age" => 21,
        "birthplace" => "Nueva Viscaya, Philippines",
        "img" => "stacey.jpg",
        "id" => 7,
    ],
    [
        "name" => "Mikhaela Janna Jimnea Lim",
        "role" => "Third Youngest Member, Main Rapper, Lead Dancer, Visual",
        "age" => 21,
        "birthplace" => "Cebu City, Philippines",
        "img" => "mikha.jpg",
        "id" => 8,
    ]
    // Add more members here as needed...
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BINI Updates</title>
    <link rel="stylesheet" href="style/style.css">
    <script src="redirect.js"></script> <!-- Link to external JS file -->
</head>
<style>body {
    background-image: url('binibg.jpg'); /* Add your background image URL here */
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    background-attachment: fixed; /* Makes the background image stay in place when scrolling */
}</style>
<body>
    <header>
        <div class=>
            <h1>Welcome to BINI Info Hub</h1>
            <p>Your source for the latest updates about BINI!</p>
        </div>
    </header>
    
    <div class="binimem">
        <div class="team">
            <?php foreach ($members as $member): ?>
                <div class="team-member">
                    <a href="member_details.php?id=<?= $member['id']; ?>" onclick="confirmRedirect('<?= $member['name']; ?>', 'member_details.php?id=<?= $member['id']; ?>')">
                        <img src="<?= $member['img']; ?>" alt="<?= $member['name']; ?>">
                    </a>
                    <h2><?= $member['name']; ?></h2>
                    <p><strong>Role:</strong> <?= $member['role']; ?></p>
                    <p><strong>Age:</strong> <?= $member['age']; ?></p>
                    <p><strong>Birthplace:</strong> <?= $member['birthplace']; ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <footer>
        <p>Stay tuned for more updates about BINI!</p>
    </footer>
</body>
</html>
