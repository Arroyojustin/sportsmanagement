<div class="container-fluid px-3 py-1" id="coach-profile" style="display: none;">
    <div class="row g-3">
        <!-- Left Section -->
        <div class="col-lg-4 col-md-5 bg-light d-flex flex-column align-items-center py-1 text-center border-end">
            <div class="circle-container bg-primary text-white mb-3 d-flex align-items-center justify-content-center"
                 style="width: 120px; height: 120px; border-radius: 50%; font-size: 36px; font-weight: bold;">
                <span class="initials">C</span> <!-- Coach initials or an icon -->
            </div>
            <h5 class="mb-1">coach@email.com</h5> <!-- Replace with Coach's email -->
            <ul class="list-unstyled mt-3">
                <li><a href="#" class="btn btn-link text-decoration-none" id="changePasswordBtn">Change Password</a></li>
                <li><a href="#" class="btn btn-link text-decoration-none" id="changeProfilePhotoBtn">Change Profile Photo</a></li>
            </ul>
        </div>

        <!-- Right Section -->
        <div class="col-lg-7 col-md-7 py-2">
            <h4 class="text-secondary">Personal Information</h4>
            <form id="profileForm" method="POST" action="update-coach.php" enctype="multipart/form-data">
                <!-- Hidden Field for Coach ID -->
                <input type="hidden" name="id" value="coach_id"> <!-- Replace with Coach ID -->

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="first_name" class="form-label">First Name</label>
                        <input type="text" class="form-control" id="first_name" name="first_name" value="Coach First Name" required>
                    </div>
                    <div class="col-md-6">
                        <label for="last_name" class="form-label">Last Name</label>
                        <input type="text" class="form-control" id="last_name" name="last_name" value="Coach Last Name" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="coach@email.com" disabled>
                </div>

                <div class="mb-3">
                    <label for="phone_number" class="form-label">Phone Number</label>
                    <input type="text" class="form-control" id="phone_number" name="phone_number" value="123-456-7890" required>
                </div>

                <div class="d-flex justify-content-between align-items-center mt-4 gap-3">
                    <button type="submit" class="btn btn-outline-success" id="saveChangesBtn">Save Changes</button>
                    <a href="./Coach.php" class="btn btn-outline-secondary">Back</a>
                </div>
            </form>
        </div>
    </div>
</div>
