<?php
// Get the notification ID to delete
$notificationId = $_POST['id'];

// Delete from the database
$conn = new mysqli('localhost', 'root', '', 'betting_platform');
$sql = "DELETE FROM notifications WHERE id = $notificationId";

if ($conn->query($sql) === TRUE) {
  echo "Notification deleted successfully!";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>
