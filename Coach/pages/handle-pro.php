<div class="container-fluid px-3 py-1" id="coach-profile" style="display: none;">
    <div class="row g-3">
        <!-- Left Section -->
        <div class="col-lg-4 col-md-5 bg-light d-flex flex-column align-items-center py-1 text-center border-end">
            <div class="circle-container bg-primary text-white mb-3 d-flex align-items-center justify-content-center"
                 style="width: 120px; height: 120px; border-radius: 50%; font-size: 36px; font-weight: bold;">
                <span class="initials">--</span>
            </div>
            <h5 class="mb-1" id="coach-email">Loading...</h5>
            <ul class="list-unstyled mt-3">
                <li><a href="#" class="btn btn-link text-decoration-none" id="changePasswordBtn">Change Password</a></li>
                <li><a href="#" class="btn btn-link text-decoration-none" id="changeProfilePhotoBtn">Change Profile Photo</a></li>
            </ul>
        </div>

        <!-- Right Section -->
        <div class="col-lg-7 col-md-7 py-2">
            <h4 class="text-secondary">Personal Information</h4>

            <!-- Hidden Field for Coach ID -->
            <input type="hidden" id="coach-id">

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="first_name" class="form-label">First Name</label>
                    <input type="text" class="form-control" id="first_name" name="first_name" required>
                </div>
                <div class="col-md-6">
                    <label for="last_name" class="form-label">Last Name</label>
                    <input type="text" class="form-control" id="last_name" name="last_name" required>
                </div>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" disabled>
            </div>

            <div class="mb-3">
                <label for="phone_number" class="form-label">Phone Number</label>
                <input type="text" class="form-control" id="phone_number" name="phone_number" required>
            </div>

            <div class="d-flex justify-content-between align-items-center mt-4 gap-3">
                <button class="btn btn-outline-success" id="saveChangesBtn">Save Changes</button>
                <a href="./Coach.php" class="btn btn-outline-secondary">Back</a>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
    fetch('controller/coach_data.php')
    .then(response => response.json())
    .then(data => {
        if (data.status === "success") {
            document.getElementById("coach-email").textContent = data.email;
            document.getElementById("email").value = data.email;
            document.getElementById("first_name").value = data.firstname;
            document.getElementById("last_name").value = data.lastname;
            document.getElementById("phone_number").value = data.phone_no || '';

            // Set initials
            let initials = data.firstname.charAt(0) + data.lastname.charAt(0);
            document.querySelector(".initials").textContent = initials.toUpperCase();
        } else {
            console.error("Error:", data.message);
        }
    })
    .catch(error => console.error("Fetch Error:", error));
});
</script>
