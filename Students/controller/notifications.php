<?php
include '../../dbconn.php';

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch notifications
$sql = "SELECT message, created_at FROM notifications ORDER BY created_at DESC";
$result = $conn->query($sql);

$notifications = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $notifications[] = [
            'message' => $row['message'],
            'created_at' => date('M d, Y h:i A', strtotime($row['created_at'])) // Format date
        ];
    }
} else {
    $notifications[] = [
        'message' => "No notifications available.",
        'created_at' => ""
    ];
}

$conn->close();

echo json_encode($notifications);
?>
