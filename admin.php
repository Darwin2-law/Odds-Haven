<?php
// Include the database connection file
include('db_connect.php');

// Insert a message into the notifications table
if (isset($_POST['post_message'])) {
    $message = $_POST['message'];
    $sql = "INSERT INTO notifications (message) VALUES ('$message')";
    if ($conn->query($sql) === TRUE) {
        echo "New message posted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Delete a message from the notifications table
if (isset($_GET['delete_message'])) {
    $id = $_GET['delete_message'];
    $sql = "DELETE FROM notifications WHERE id = $id";
    if ($conn->query($sql) === TRUE) {
        echo "Message deleted successfully";
    } else {
        echo "Error: " . $conn->error;
    }
}

// Fetch messages for the notification display
$sql = "SELECT * FROM notifications";
$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
</head>
<body>
    <!-- Form to post message -->
    <form method="POST" action="admin.php">
        <label for="message">Post Message:</label>
        <textarea name="message" id="message" rows="4" cols="50" required></textarea><br>
        <button type="submit" name="post_message">Post Message</button>
    </form>

    <!-- Display existing messages with delete option -->
    <h2>Notifications</h2>
    <?php if ($result->num_rows > 0) { ?>
        <table>
            <tr>
                <th>Message</th>
                <th>Date</th>
                <th>Action</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo $row['message']; ?></td>
                    <td><?php echo $row['date']; ?></td>
                    <td><a href="admin.php?delete_message=<?php echo $row['id']; ?>">Delete</a></td>
                </tr>
            <?php } ?>
        </table>
    <?php } else { ?>
        <p>No notifications found.</p>
    <?php } ?>

    <!-- Add any other admin controls here -->

</body>
</html>
