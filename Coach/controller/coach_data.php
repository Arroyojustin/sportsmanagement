<?php
include '../../dbconn.php';
session_start();

// Ensure user is logged in
if (!isset($_SESSION['user_id']) || $_SESSION['user_type'] !== 'coach') {
    echo json_encode(['status' => 'error', 'message' => 'Unauthorized access']);
    exit;
}

$user_id = $_SESSION['user_id'];

// Fetch coach details
$stmt = $conn->prepare("SELECT email, firstname, lastname, phone_no FROM users WHERE id = ? AND user_type = 'coach'");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $coach = $result->fetch_assoc();
    echo json_encode([
        'status' => 'success',
        'email' => $coach['email'],
        'firstname' => $coach['firstname'],
        'lastname' => $coach['lastname'],
        'phone_no' => $coach['phone_no']
    ]);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Coach not found']);
}

$stmt->close();
$conn->close();
?>
