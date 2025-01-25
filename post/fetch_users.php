<?php
include 'db_connection.php';

// Query to fetch registered users
$sql = "SELECT first_name, last_name, email FROM users";
$result = $conn->query($sql);

$users = [];
while ($row = $result->fetch_assoc()) {
    $users[] = $row;
}

// Return the data as JSON
echo json_encode($users);

$conn->close();
?>
