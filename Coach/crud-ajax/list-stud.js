document.addEventListener("DOMContentLoaded", function () {
    const athleteSection = document.getElementById("athlete");
    const tableBody = document.querySelector("#athlete #student-table-body"); // Scoped only inside #athlete

    if (!athleteSection) {
        return;
    }

    fetch("controller/list-stud.php")
        .then(response => response.json())
        .then(data => {
            tableBody.innerHTML = "";

            data.forEach(student => {
                const row = document.createElement("div");
                row.classList.add("student-row");

                const nameElement = document.createElement("div");
                nameElement.classList.add("student-info");
                nameElement.textContent = `${student.firstname} ${student.lastname}`;
                row.appendChild(nameElement);

                const scholarElement = document.createElement("div");
                scholarElement.classList.add("student-info");
                scholarElement.textContent = `Scholarship: ${student.scholar || "Not Assigned"}%`;
                row.appendChild(scholarElement);

                tableBody.appendChild(row); // Wala nang Edit Scholar button
            });

            if (data.length > 0) {
                athleteSection.style.display = "none";
            }
        })
        .catch(error => console.error("Error fetching student data:", error));
});
