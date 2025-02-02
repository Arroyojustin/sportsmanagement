<div class="container-fluid p-0 m-0" id="strong" style="display: none;">
  <div class="attendance-training-tabs">
    <div class="attendance-training-tab active" id="attendance-tab">Attendance</div>
    <div class="attendance-training-tab" id="training-tab">Training</div>
  </div>

  <!-- Attendance Tab Content -->
  <div class="attendance-tab-content active">
    <div class="attendance-training-dropdown">
    </div>

    <div class="attendance-training-table">
      <table>
        <thead>
          <tr>
            <th>Student ID</th>
            <th>Timestamp</th>
          </tr>
        </thead>
        <tbody id="attendance-body">
          <!-- Rows will be dynamically generated by JavaScript -->
        </tbody>
      </table>
    </div>

    <div class="attendance-training-buttons">
      <button class="btn btn-secondary check-attendance" onclick="showSection(event, 'scanners')">Check
        Attendance</button>
    </div>
  </div>


  <!-- Training Tab Content -->
  <div class="training-tab-content">
    <div class="training-calendar">
      <div id="current-month"></div>
      <table id="calendar-table">
        <thead>
          <tr>
            <th>Sun</th>
            <th>Mon</th>
            <th>Tue</th>
            <th>Wed</th>
            <th>Thu</th>
            <th>Fri</th>
            <th>Sat</th>
          </tr>
        </thead>
        <tbody>
          <!-- Rows will be dynamically generated by JavaScript -->
        </tbody>
      </table>
    </div>
    <div class="training-schedule">
      <h5>Training</h5>
      <i class='bx bxs-plus-circle training-add-icon' data-bs-toggle="modal" data-bs-target="#scheduleModal"></i>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="scheduleModal" tabindex="-1" aria-labelledby="scheduleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="scheduleModalLabel">Schedule Training</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="scheduleForm">
          <h3 class="form-title">Schedule Training</h3>
          <div class="mb-3">
            <label for="scheduleTitle" class="form-label">Title</label>
            <input type="text" class="form-control" id="scheduleTitle" placeholder="Enter title" required>
          </div>
          <div class="mb-3">
            <label for="scheduleDate" class="form-label">Date</label>
            <input type="date" class="form-control" id="scheduleDate" required>
          </div>
          <div class="mb-3">
            <label for="scheduleTime" class="form-label">Time</label>
            <input type="time" class="form-control" id="scheduleTime" required>
          </div>
          <div class="mb-3">
            <label for="scheduleLocation" class="form-label">Location</label>
            <input type="text" class="form-control" id="scheduleLocation" placeholder="Enter location" required>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" form="scheduleForm">Save Schedule</button>
      </div>
    </div>
  </div>
</div>


<script>
  // Tab Switching Logic
  const attendanceTab = document.getElementById("attendance-tab");
  const trainingTab = document.getElementById("training-tab");
  const attendanceContent = document.querySelector(".attendance-tab-content");
  const trainingContent = document.querySelector(".training-tab-content");

  attendanceTab.addEventListener("click", () => {
    attendanceTab.classList.add("active");
    trainingTab.classList.remove("active");

    attendanceContent.classList.add("active");
    trainingContent.classList.remove("active");
  });

  trainingTab.addEventListener("click", () => {
    trainingTab.classList.add("active");
    attendanceTab.classList.remove("active");

    trainingContent.classList.add("active");
    attendanceContent.classList.remove("active");
  });

  // Handle form submission
  document.getElementById("scheduleForm").addEventListener("submit", function (event) {
    event.preventDefault();

    const date = document.getElementById("scheduleDate").value;
    const time = document.getElementById("scheduleTime").value;
    const location = document.getElementById("scheduleLocation").value;
    const sportCategory = document.getElementById("sportCategorysched").value;

    const trainingSchedule = document.querySelector(".training-schedule");
    const newTrainingItem = document.createElement("div");
    newTrainingItem.className = "training-item";
    newTrainingItem.innerHTML = `<span>${time}</span> <span>-</span> <span>${location}</span> <span>(${sportCategory})</span>`;
    trainingSchedule.appendChild(newTrainingItem);

    const modal = bootstrap.Modal.getInstance(document.getElementById("scheduleModal"));
    modal.hide();

    this.reset();
  });
</script>