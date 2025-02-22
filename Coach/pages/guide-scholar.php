<div class="container-fluid p-0 m-0" id="guide-scho" style="display: none;">
     <div class="guidelines">
            <h2>SCHOLARSHIP GUIDELINES</h2>
            <table>
                <tr>
                    <th>General Average</th>
                    <th>Scholar Applied</th>
                </tr>
                <tr>
                    <td>75 below</td>
                    <td>No Scholar Applied – 0%</td>
                </tr>
                <tr>
                    <td>76 to 83</td>
                    <td>Normal Scholar Applied – 20%</td>
                </tr>
                <tr>
                    <td>84 to 89</td>
                    <td>Merit Scholar Applied – 50%</td>
                </tr>
                <tr>
                    <td>90 to 100</td>
                    <td>Honor Scholar Applied – 100%</td>
                </tr>
            </table>

            <table>
                <tr>
                    <th>Skills Rating</th>
                    <th>Percentage</th>
                </tr>
                <tr>
                    <td>1-3</td>
                    <td>0%</td>
                </tr>
                <tr>
                    <td>4-5</td>
                    <td>20%</td>
                </tr>
                <tr>
                    <td>6-7</td>
                    <td>50%</td>
                </tr>
                <tr>
                    <td>8-10</td>
                    <td>100%</td>
                </tr>
            </table>
        </div>

        <!-- Input Fields for Calculating Badge -->
        <div class="input-group">
            <label for="name">Name</label>
            <div class="input-with-icon">
                <i class="fas fa-times cross-icon" id="clearName" onclick="clearStudentName()" style="display: none;"></i>
                <input type="text" id="name" placeholder="Enter Your Name" readonly>
                <i class="fas fa-user-plus icon" onclick="openStudentList()"></i>
            </div>
        </div>
        <div class="input-group">
            <label for="generalAverage">General Average</label>
            <input type="number" id="generalAverage" placeholder="Enter General Average" max="100" min="0" oninput="limitGeneralAverage(event)">
        </div>
        <div class="input-group">
            <label for="skillsTraining">Skills Training Score (1-10)</label>
            <input type="number" id="skillsTraining" placeholder="Enter Skills Training Score" min="1" max="10" oninput="limitSkillsTraining(event)">
        </div>

        <!-- Buttons Container (Horizontal Layout) -->
        <div class="button-container">
            <button id="saveButton" onclick="saveData()">Save</button>
            <p  style="text-align: center; cursor:pointer;" onclick="showSection(event, 'required')">Back</p>
        </div>

        <div class="result" id="result">
            <p class="badge" id="badgeText"></p>
        </div>

         <!-- Modal for Student List -->
      <div class="modal" id="studentModal">
        <div class="modal-content">
            <span class="close" onclick="closeStudentList()">&times;</span>
            <h2>Student List</h2>
            <ul id="studentList">
                <!-- Students will be dynamically inserted here -->
            </ul>
        </div>
      </div>
</div>

<script>
        // Example student data
        const students = [
            { id: 1, name: "Justin Randolf Arroyo" },
            { id: 2, name: "Jane Smith" },
            { id: 3, name: "Mark Johnson" },
        ];

        // Function to display student list in the modal
        function openStudentList() {
            const studentList = document.getElementById("studentList");
            studentList.innerHTML = ""; // Clear current list

            students.forEach(student => {
                const listItem = document.createElement("li");
                listItem.textContent = student.name;
                listItem.onclick = function() {
                    selectStudent(student.name);
                };
                studentList.appendChild(listItem);
            });

            // Show the modal
            document.getElementById("studentModal").style.display = "block";
        }

        // Function to close the modal
        function closeStudentList() {
            document.getElementById("studentModal").style.display = "none";
        }

        // Function to set selected student name in input field
        function selectStudent(name) {
            document.getElementById('name').value = name;
            document.getElementById('name').disabled = false;
            document.getElementById('clearName').style.display = 'inline';
            closeStudentList();
        }

        // Function to clear the student name input field
        function clearStudentName() {
            document.getElementById('name').value = '';
            document.getElementById('clearName').style.display = 'none';
            document.getElementById('name').disabled = true;
        }

        // Function to limit the general average input to 3 digits and max of 100, ensuring only numbers
        function limitGeneralAverage(event) {
            const input = event.target;
            let value = input.value;
            
            // Remove non-numeric characters
            value = value.replace(/[^0-9]/g, '');
            
            // If the value is greater than 100, set it to 100
            if (value > 100) {
                value = 100;
            }
            
            // Set the input value back to the cleaned value
            input.value = value;
        }

        // Function to limit the skills training input to 2 digits and max of 10, ensuring only numbers
        function limitSkillsTraining(event) {
            const input = event.target;
            let value = input.value;
            
            // Remove non-numeric characters
            value = value.replace(/[^0-9]/g, '');
            
            // If the value is greater than 10, set it to 10
            if (value > 10) {
                value = 10;
            }
            
            // Set the input value back to the cleaned value
            input.value = value;
        }

        // Function to save data
        function saveData() {
            const name = document.getElementById('name').value;
            const generalAverage = parseFloat(document.getElementById('generalAverage').value);
            const skillsTraining = parseInt(document.getElementById('skillsTraining').value);

            var skillpercentage = 0;

            // Skills rating to percentage
            if (skillsTraining >= 1 && skillsTraining <= 3) {
                skillpercentage = 0;
            } else if (skillsTraining >= 4 && skillsTraining <= 5) {
                skillpercentage = 20;
            } else if (skillsTraining >= 6 && skillsTraining <= 7) {
                skillpercentage = 50;
            } else if (skillsTraining >= 8 && skillsTraining <= 10) {
                skillpercentage = 100;
            }

            // Validation: Check if all input fields are filled with valid values
            if (isNaN(generalAverage) || isNaN(skillsTraining) || generalAverage <= 0 || skillsTraining < 1 || skillsTraining > 10) {
                Swal.fire({
                    icon: 'error',
                    title: 'Invalid Input',
                    text: 'Please enter valid numbers.'
                });
                return;
            }

            // Check for the general average and skills training criteria
            if (generalAverage < 75) {
                Swal.fire({
                    icon: 'warning',
                    title: 'No Scholar Badge',
                    text: 'You did not meet the minimum requirements for a scholar badge.'
                });
                return;
            }

            if (skillsTraining < 4) {
                Swal.fire({
                    icon: 'error',
                    title: 'No Scholar Badge',
                    text: 'Oh no you need to study more for a scholar badge.'
                });
                return;
            }

            // Determine the badge message based on the scores
            let badgeMessage = '';
            if (skillsTraining >= 8) {
                badgeMessage = 'Honor Scholar Badge';
            } else if (skillsTraining >= 5) {
                badgeMessage = 'Merit Scholar Badge';
            } else if (skillsTraining >= 4) {
                badgeMessage = 'Scholar Badge';
            }

            // Display the badge message
            Swal.fire({
                icon: 'success',
                title: 'Scholar Applied',
                text: `You have earned the ${badgeMessage}.`
            });

            // Clear the name, general average, and skills training input fields after saving
            document.getElementById('name').value = ''; // Clear the name input field
            document.getElementById('clearName').style.display = 'none'; // Hide the cross icon
            document.getElementById('name').disabled = true; // Disable the input field again

            document.getElementById('generalAverage').value = ''; // Clear the general average input field
            document.getElementById('skillsTraining').value = ''; // Clear the skills training input field
        }
    </script>