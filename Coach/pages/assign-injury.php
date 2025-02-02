<div class="container-fluid p-0 m-0" id="remarks" style="display: none;">
  <button class="btn btn-primary mb-3 w-100" data-bs-toggle="modal" data-bs-target="#injuryModal">
        Add Injury Record
    </button>

    <!-- Mobile-Friendly Injury Records Display -->
    <div id="recordsContainer">
        <!-- Records will be added dynamically as cards on mobile -->
    </div>
    <!-- Bootstrap Modal for Adding Record -->
 <div class="modal fade" id="injuryModal" tabindex="-1" aria-labelledby="injuryModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="injuryModalLabel">Add Injury Record</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="injuryForm">
                    <div class="mb-3">
                        <label for="injuryDate" class="form-label">Date</label>
                        <input type="date" id="injuryDate" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="studentName" class="form-label">Student Name</label>
                        <input type="text" id="studentName" class="form-control" placeholder="Enter student name" required>
                    </div>
                    <div class="mb-3">
                        <label for="injuryType" class="form-label">Injury Type</label>
                        <input type="text" id="injuryType" class="form-control" placeholder="Enter injury type" required>
                    </div>
                    <div class="mb-3">
                        <label for="remarks" class="form-label">Remarks</label>
                        <textarea id="remarks" class="form-control" rows="3" placeholder="Enter remarks" maxlength="250" required></textarea>
                    </div>
                    <button type="button" class="btn btn-success w-100" onclick="addRecord()">Save Record</button>
                </form>
            </div>
        </div>
    </div>
  </div> 
</div>

<script>
    function addRecord() {
        let date = document.getElementById('injuryDate').value;
        let studentName = document.getElementById('studentName').value;
        let injuryType = document.getElementById('injuryType').value;
        let remarks = document.getElementById('remarks').value;

        if (date === '' || studentName === '' || injuryType === '' || remarks === '') {
            alert("Please fill in all fields.");
            return;
        }

        let recordsContainer = document.getElementById('recordsContainer');
        let newRecord = document.createElement("div");
        newRecord.classList.add("record-card");
        newRecord.innerHTML = `
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">${date}</h6>
                    <p class="card-text"><strong>Student:</strong> ${studentName}</p>
                    <p class="card-text"><strong>Injury:</strong> ${injuryType}</p>
                    <p class="card-text"><strong>Remarks:</strong> ${remarks}</p>
                    <button class="btn btn-danger btn-sm w-100" onclick="deleteRecord(this)">Delete</button>
                </div>
            </div>
        `;

        recordsContainer.appendChild(newRecord);

        // Clear input fields
        document.getElementById('injuryDate').value = '';
        document.getElementById('studentName').value = '';
        document.getElementById('injuryType').value = '';
        document.getElementById('remarks').value = '';

        // Close modal
        let modal = bootstrap.Modal.getInstance(document.getElementById('injuryModal'));
        modal.hide();
    }

    function deleteRecord(button) {
        button.parentElement.parentElement.remove();
    }
</script>