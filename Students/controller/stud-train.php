
<?php
include '../../dbconn.php'; // Assuming dbconn.php is in the same directory

$sql = "SELECT student_id, timestamp FROM attendance";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data as JSON
    $attendanceData = array();
    while($row = $result->fetch_assoc()) {
        $attendanceData[] = array(
            'StudentID' => $row['student_id'],  // Student ID
            'Timestamp' => $row['timestamp']   // Timestamp
        );
    }
    echo json_encode($attendanceData);
} else {
    echo json_encode([]);
}
$conn->close();
?>
