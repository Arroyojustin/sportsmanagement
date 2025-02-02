<div class="sidebar-container d-none d-md-flex flex-column p-0 m-0">
    <!-- Header -->
    <div class="sidebar-header d-flex flex-column align-items-center">
        <img src="./../Upload/RAWR.png" alt="Logo" width="70">
    </div>

    <nav>
        <a href="#" class="sidebar-link" onclick="showSection(event, 'fronte')">
            <i class="bx bx-home"></i>
            <span>Home</span>
        </a>
        <a href="#" class="sidebar-link" onclick="showSection(event, 'attendance')">
            <i class="bx bx-user-check"></i>
            <span>Attend Record</span>
        </a>
        <a href="#" class="sidebar-link" onclick="showSection(event, 'sports')">
              <i class='bx bxs-inbox'></i>
            <span>Requirements</span>
        </a>
        <a href="#" class="sidebar-link" onclick="showSection(event, 'list')">
            <i class='bx bx-user'></i>
            <span>Student List</span>
        </a>
        <a href="#" class="sidebar-link" onclick="showSection(event, 'adds')">
             <i class='bx bxs-user-plus'></i>
            <span>Add List</span>
        </a>
        <!-- <a href="#" class="sidebar-link" onclick="showSection(event, 'train-approve')">
         <i class='bx bx-check-double'></i>
            <span>Approval</span>
        </a> -->
    </nav>
</div>

<script>
    function showSection(event, sectionID) {
        // Remove 'active' class from all links (both sidebar and header)
        document.querySelectorAll('.sidebar-link, .menu-link').forEach(link => {
            link.classList.remove('active');
        });

        // Mark clicked link as active
        if (event && event.target) {
            const clickedLink = event.target.closest('.sidebar-link, .menu-link');
            if (clickedLink) {
                clickedLink.classList.add('active');
            }
        }

        // Hide all sections
        document.querySelectorAll('#fronte, #coor-profile, #attendance, #sports, #list, #adds, #train-approve').forEach(section => {
            section.style.display = 'none';
        });

        // Show the active section
        const activeSection = document.getElementById(sectionID);
        if (activeSection) {
            activeSection.style.display = 'block';
        }
    }

    window.onload = function() {
        // Set the dashboard as the default active section and link
        showSection(null, 'fronte'); 

        // Mark the dashboard link as active on load
        document.querySelector('a[href="#"][onclick*="fronte"]').classList.add('active');
    };
</script>