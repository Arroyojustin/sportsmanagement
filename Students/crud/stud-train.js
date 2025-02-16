
$(document).ready(function() {
    // Fetch attendance records on document ready
    $.ajax({
        url: 'controller/stud-train.php', // Path to your PHP script
        method: 'GET',
        success: function(data) {
            var attendances = JSON.parse(data);
            var attendanceTable = $("#training-tbody");

            // Clear the current table content
            attendanceTable.empty();

            attendances.forEach(function(attendance) {
                // Create a new table row for each attendance record
                var newRow = $("<tr>");
                newRow.html(`
                    <td class="attendance-time">${attendance.Timestamp}</td>  <!-- Timestamp -->
                `);
                // Append the new row to the tbody
                attendanceTable.append(newRow);
            });
        },
        error: function(err) {
            console.error("Error fetching attendance data:", err);
        }
    });
});
