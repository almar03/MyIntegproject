<?php
session_start();
include 'db.php'; 

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validate input
    if (!empty($username) && !empty($password)) {
        // Prepare and execute query
        $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();

            // Verify password
            if (password_verify($password, $user['password'])) {
                $_SESSION['username'] = $user['username'];
                $_SESSION['user_id'] = $user['id'];
                header("Location: bini.php"); // Redirect to BINI updates page
                exit();
            } else {
                $error = "Incorrect password!";
            }
        } else {
            $error = "User does not exist!";
        }
    } else {
        $error = "All fields are required!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - BINI Info Hub</title>
    <link rel="stylesheet" href="style/logreg.css">
</head>
<body>
    <header>
        <div class="container">
            <h1>BINI Info Hub Login</h1>
        </div>
    </header>

    <div class="container">
        <form method="POST" action="">
            <h2>Login</h2>
            <?php if (!empty($error)): ?>
                <p class="error"><?= $error; ?></p>
            <?php endif; ?>
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit">Login</button>
        </form>
        <p>Don't have an account? <a href="register.php">Register here</a>.</p>
    </div>

    <footer>
    <p>Stay tuned for more updates about BINI!<br><br>&copy; 2024 BINI Info Hub. All Rights Reserved.</p>
</footer>

</body>
</html>
