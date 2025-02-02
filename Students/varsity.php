<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Student</title>
    
    <link rel="stylesheet" href="../assets/css/sidebar.css">
    <link rel="stylesheet" href="../assets/css/header.css">
    <link rel="stylesheet" href="../assets/css/student css/check.css">
    <link rel="stylesheet" href="../assets/css/student css/stud-prof.css">
    <link rel="stylesheet" href="../assets/css/student css/profile-get.css">
    <link rel="stylesheet" href="../assets/css/student css/codyy.css">
    <link rel="stylesheet" href="../assets/css/student css/notif.css">
    <link rel="stylesheet" href="../assets/css/student css/stud-sched.css">
    <link rel="stylesheet" href="../assets/css/student css/sliderss.css">
    <link rel="stylesheet" href="../assets/css/student css/injured.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css2?family=Petrona:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <style>
        html, body { height: 100%; margin: 0; }
        #wrapper { display: flex; height: 100vh; margin: 0; padding: 0; }
        #content-wrapper { flex-grow: 1; display: flex; flex-direction: column; background-color: #f8f8f8; }
        #content { padding: 1rem; flex-grow: 1; }
        #page-content { flex-grow: 1; padding: 10px; }
    </style>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar-->
        <?php include('./components/s-sidebar.php'); ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Header Content -->
            <?php include('./components/s-header.php'); ?>

            <!-- Main Content -->
            <div id="content">

                 <!-- Begin Page Content -->
                 <div id="page-content" style="width: 100%;">
                     <?php include "pages/homes.php"; ?>
                     <?php include "pages/check.php"; ?>
                     <?php include "pages/injury.php"; ?>
                     <?php include "pages/s-profile.php"; ?>
                 </div>

            </div>
            <!-- End of Main Content -->
        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->

    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://kit.fontawesome.com/29c04b1733.js" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/html5-qrcode/minified/html5-qrcode.min.js"></script>
    <script src="../assets/js/sidebar.js"></script>

    <!--START::CRUD AJAX FUNCTIONS-->
    <script src="./crud/slider.js"></script>
    <script src="./crud/storckchart.js"></script>

    <!-- active CRUD AJAX FUNCTIONS -->
    <script src="crud/notifications.js"></script>
    <script src="crud/calendar.js"></script>
    <script src="crud/stud-train.js"></script>

    
</body>
</html>
