<?php
include '../../dbconn.php';
session_start();

// Ensure user is logged in
if (!isset($_SESSION['user_id']) || $_SESSION['user_type'] !== 'coach') {
    echo json_encode(['status' => 'error', 'message' => 'Unauthorized access']);
    exit;
}

$user_id = $_SESSION['user_id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle profile update
    $first_name = $_POST['first_name'] ?? '';
    $last_name = $_POST['last_name'] ?? '';
    $phone_number = $_POST['phone_number'] ?? '';

    // Validate phone number (exact 11 digits, numbers only)
    if (!preg_match('/^\d{11}$/', $phone_number)) {
        echo json_encode(['status' => 'error', 'message' => 'Invalid phone number. Must be 11 digits.']);
        exit;
    }

    // Update user data in the database
    $stmt = $conn->prepare("UPDATE users SET firstname = ?, lastname = ?, phone_no = ? WHERE id = ? AND user_type = 'coach'");
    $stmt->bind_param("sssi", $first_name, $last_name, $phone_number, $user_id);

    if ($stmt->execute()) {
        echo json_encode(['status' => 'success', 'message' => 'Profile updated successfully.']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to update profile.']);
    }

    $stmt->close();
} else {
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
}

$conn->close();
?>
