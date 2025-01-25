<?php
// Include the database connection file
include('db.php');

// Get the notification ID from the request
$data = json_decode(file_get_contents('php://input'), true);
$notification_id = $data['id'];

// Check if the ID is valid
if (isset($notification_id) && is_numeric($notification_id)) {
    // Prepare SQL query to delete the notification
    $query = "DELETE FROM notifications WHERE id = :id";

    // Prepare statement
    $stmt = $pdo->prepare($query);

    // Bind the notification ID to the query
    $stmt->bindParam(':id', $notification_id, PDO::PARAM_INT);

    // Execute the query and check if the deletion was successful
    if ($stmt->execute()) {
        // Return a success response
        echo json_encode(['success' => true]);
    } else {
        // Return a failure response
        echo json_encode(['success' => false]);
    }
} else {
    // Return an error response if the ID is invalid
    echo json_encode(['success' => false, 'message' => 'Invalid notification ID']);
}
?>
