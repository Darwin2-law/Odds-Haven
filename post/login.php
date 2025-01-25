<?php
session_start();

// Define admin credentials (password should be hashed for security)
$admin_username = 'lawrence';  // The admin username
$admin_password_hash = '$2y$10$GjC7M17eTzAqzQylAAYx0eX2x2xjwzF16FkkhdxfmcUfeF4oIqgWu'; // The hashed password for 'darwin0794'

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the username and password from the form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check if the username and password match
    if ($username === $admin_username && password_verify($password, $admin_password_hash)) {
        // Set a session variable to indicate that the user is logged in
        $_SESSION['logged_in'] = true;
        $_SESSION['username'] = $username;

        // Redirect to the admin panel
        header('Location: admin.html');
        exit;
    } else {
        // Invalid credentials, show an error message
        $error_message = "Invalid username or password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div id="login-container">
        <h2>Admin Login</h2>
        <?php
        // Show the error message if login fails
        if (isset($error_message)) {
            echo "<p style='color: red;'>$error_message</p>";
        }
        ?>
        <form action="login.php" method="POST">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>
