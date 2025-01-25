<?php
// Step 1: Set up the database connection
$servername = "localhost";  // Database server (adjust if using a different server)
$username = "root";         // Your MySQL username
$password = "";             // Your MySQL password (leave empty if using default)
$dbname = "your_database";  // Your database name (make sure it exists)

$conn = new mysqli($servername, $username, $password, $dbname);

// Step 2: Check if connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Step 3: Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and retrieve the message from the form
    $message = mysqli_real_escape_string($conn, $_POST['message']);

    // Step 4: Validate input (optional)
    if (empty($message)) {
        echo "Message cannot be empty.";
        exit;
    }

    // Step 5: Insert the message into the database
    $sql = "INSERT INTO messages (message) VALUES ('$message')";

    if ($conn->query($sql) === TRUE) {
        // Message was successfully inserted
        echo "Message posted successfully!";
        // Redirect back to admin panel after success
        header("Location: admin.html");
        exit;
    } else {
        // Error handling if insertion fails
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Step 6: Close the database connection
$conn->close();
?>
