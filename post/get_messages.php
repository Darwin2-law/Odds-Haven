<?php
session_start();

// Check if the admin is logged in
if (!isset($_SESSION['admin_id'])) {
    header("Location: login.html");
    exit;
}

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "your_database";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $message = mysqli_real_escape_string($conn, $_POST['message']);
    
    // Insert message into notifications table
    $sql = "INSERT INTO notifications (message, posted_by) VALUES ('$message', 'Admin')";

    if ($conn->query($sql) === TRUE) {
        echo "Message posted successfully!";
        header("Location: admin.html"); // Redirect back to admin panel after posting
    } else {
        echo "Error: " . $conn->error;
    }
}

// Close connection
$conn->close();
?>
