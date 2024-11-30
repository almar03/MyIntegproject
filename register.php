<?php
session_start();
include 'db.php'; // Include the database connection

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $confirm_password = trim($_POST['confirm_password']);

    // Validate input
    if (!empty($username) && !empty($password) && !empty($confirm_password)) {
        if ($password === $confirm_password) {
            // Check if the username is already taken
            $stmt = $conn->prepare("SELECT id FROM users WHERE username = ?");
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $stmt->store_result();

            if ($stmt->num_rows == 0) {
                // Username is available, proceed to register
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                
                // Insert user into the database
                $stmt = $conn->prepare("INSERT INTO users (username, password, created_at) VALUES (?, ?, NOW())");
                $stmt->bind_param("ss", $username, $hashed_password);

                if ($stmt->execute()) {
                    $_SESSION['username'] = $username;
                    $_SESSION['user_id'] = $stmt->insert_id;
                    header("Location: login.php"); // Redirect to login page
                    exit();
                } else {
                    // Error during insertion
                    $error = "Registration failed. " . $stmt->error; // Detailed error message
                }
            } else {
                // Username already exists
                $error = "Username is already taken.";
            }
        } else {
            // Password mismatch
            $error = "Passwords do not match.";
        }
    } else {
        // Empty field(s)
        $error = "All fields are required.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - BINI Info Hub</title>
    <link rel="stylesheet" href="style/logreg.css">
</head>
<body>
    <header>
        <div class="container">
            <h1>BINI Info Hub Registration</h1>
        </div>
    </header>

    <div class="container">
        <form method="POST" action="">
            <h2>Register</h2>
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
            <div class="form-group">
                <label for="confirm_password">Confirm Password:</label>
                <input type="password" id="confirm_password" name="confirm_password" required>
            </div>
            <button type="submit">Register</button>
        </form>
        <p>Already have an account? <a href="login.php">Login here</a>.</p>
    </div>

    <footer>
        <p>Stay tuned for more updates about BINI!</p>
    </footer>
</body>
</html>
