<?php
// Include database connection
require '../../dbconn.php';

// Fetch attendance data from the database
$query = "SELECT student_id, timestamp FROM attendance ORDER BY timestamp DESC";
$result = mysqli_query($conn, $query);

if ($result) {
    $attendance_records = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $attendance_records[] = $row;
    }
    echo json_encode($attendance_records);
} else {
    echo json_encode([]);
}
?>
