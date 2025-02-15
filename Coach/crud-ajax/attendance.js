document.addEventListener("DOMContentLoaded", function () {
  fetchAttendance();
});

function fetchAttendance() {
  fetch("controller/record_attendance.php") // Update with actual path
    .then((response) => response.json())
    .then((data) => {
      const attendanceBody = document.getElementById("attendance-body");
      attendanceBody.innerHTML = ""; // Clear existing records

      data.forEach((record) => {
        const { student_id, timestamp } = record;

        // Create the attendance card
        const card = document.createElement("div");
        card.className = "attendance-card";
        card.innerHTML = `
          <div class="attendance-details">
            <div class="attendance-info">
              <p>${student_id}</p> <!-- Removed "Student ID: " label -->
              <p>${timestamp}</p> <!-- Removed "Timestamp: " label -->
            </div>
          </div>
          <div class="attendance-status">P</div>
        `;

        attendanceBody.appendChild(card);
      });
    })
    .catch((error) => {
      console.error("Error fetching attendance data:", error);
    });
}
