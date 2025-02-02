document.addEventListener("DOMContentLoaded", function () {
    const athleteSection = document.getElementById("athlete");
    const tableBody = document.querySelector("#athlete #student-table-body"); // Scoped only inside #athlete

    // Ensure script runs only inside athletes.php
    if (!athleteSection) {
        return;
    }

    // Fetch student data from the server
    fetch("controller/list-stud.php")
        .then(response => response.json())
        .then(data => {
            // Clear old content before inserting new ones
            tableBody.innerHTML = "";

            data.forEach(student => {
                const row = document.createElement("div");
                row.classList.add("student-row");

                // Create student name element
                const nameElement = document.createElement("div");
                nameElement.classList.add("student-info");
                nameElement.textContent = `${student.firstname} ${student.lastname}`;
                row.appendChild(nameElement);

                // Create scholarship info element
                const scholarElement = document.createElement("div");
                scholarElement.classList.add("student-info");
                scholarElement.textContent = `Scholarship: ${student.scholar || "Not Assigned"}%`;
                row.appendChild(scholarElement);

                // Add a button to edit scholar
                const editButton = document.createElement("button");
                editButton.classList.add("btn");
                editButton.textContent = "Edit Scholar";
                editButton.addEventListener("click", () => openScholarModal(student.id, student.scholar));
                row.appendChild(editButton);

                // Append row to the container
                tableBody.appendChild(row);
            });

            // Show the athlete section only if data is present
            if (data.length > 0) {
                athleteSection.style.display = "none";
            }
        })
        .catch(error => console.error("Error fetching student data:", error));

    // Function to open the modal with current student data
    function openScholarModal(studentId, currentScholar) {
        document.getElementById("studentId").value = studentId; // Set the student ID
        document.getElementById("scholar").value = currentScholar || ""; // Set the current scholar info
        new bootstrap.Modal(document.getElementById("scholarModal")).show();
    }

    // Calculate scholarship automatically when grades or skills are changed
    document.getElementById("grades").addEventListener("input", calculateScholarship);
    document.getElementById("skills").addEventListener("input", calculateScholarship);

    function calculateScholarship() {
        const grades = parseFloat(document.getElementById("grades").value) || 0;
        const skills = parseInt(document.getElementById("skills").value) || 0;

        let scholarshipPercentage = 0;

        // Scholarship based on grades
        if (grades >= 96) {
            scholarshipPercentage = 100;  // 100% for grades between 96-100
        } else if (grades >= 91) {
            scholarshipPercentage = 70;   // 70% for grades between 91-95
        } else if (grades >= 86) {
            scholarshipPercentage = 50;   // 50% for grades between 86-90
        } else if (grades >= 80) {
            scholarshipPercentage = 30;   // 30% for grades between 80-85
        }

        // Add bonus based on skills
        if (skills >= 8) {
            scholarshipPercentage += 50;  // 50% bonus for excellent skills (8-10)
        } else if (skills >= 5) {
            scholarshipPercentage += 30;  // 30% bonus for average skills (5-7)
        }

        // Limit the scholarship percentage to 100%
        scholarshipPercentage = Math.min(scholarshipPercentage, 100);

        // Display the calculated scholarship percentage
        document.getElementById("scholar").value = scholarshipPercentage + "%";
    }

    // Submit the form to update scholar info
    document.getElementById("scholarForm").addEventListener("submit", function (event) {
        event.preventDefault();

        const formData = new FormData(this);

        fetch("controller/list-stud-scholar.php", {
            method: "POST",
            body: formData
        })
            .then(response => response.text())
            .then(data => {
                alert(data); // Notify the user
                location.reload(); // Reload the page to show updated data
            })
            .catch(error => console.error("Error updating scholarship info:", error));
    });
});
