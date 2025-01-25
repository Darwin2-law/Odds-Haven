<?php
// Start a session
session_start();

// Database connection credentials
$host = 'localhost';       // Change if your database host is different
$username = 'root';        // Replace with your database username
$password = '';            // Replace with your database password
$database = 'your_database'; // Replace with your database name

// Connect to the database
$conn = new mysqli($host, $username, $password, $database);

// Check for connection errors
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form data
    $first_name = $conn->real_escape_string($_POST['first_name']);
    $last_name = $conn->real_escape_string($_POST['last_name']);
    $username = $conn->real_escape_string($_POST['username']);
    $password = $conn->real_escape_string($_POST['password']);

    // Hash the password for security
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    // Insert data into the database
    $sql = "INSERT INTO members (first_name, last_name, username, password) VALUES ('$first_name', '$last_name', '$username', '$hashed_password')";

    if ($conn->query($sql) === TRUE) {
        // Success message
        echo "<script>alert('Registration successful!'); window.location.href='register.html';</script>";
    } else {
        // Error message
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
