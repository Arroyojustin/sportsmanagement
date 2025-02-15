<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Coach</title>

    <link rel="stylesheet" href="../assets/css/sidebar.css">
    <link rel="stylesheet" href="../assets/css/header.css">
    <link rel="stylesheet" href="../assets/css/coach css/schedule.css">
    <link rel="stylesheet" href="../assets/css/coach css/athletes.css">
    <link rel="stylesheet" href="../assets/css/coach css/scholar.css">
    <link rel="stylesheet" href="../assets/css/coach css/scann.css">
    <link rel="stylesheet" href="../assets/css/coach css/notif.css">
    <link rel="stylesheet" href="../assets/css/coach css/assign.css">
    <!-- <link rel="stylesheet" href="../assets/css/coach css/table-scholar.css"> -->
    <link rel="icon" type="image/x-icon" href="../Upload/RAWR.png">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <style>
        html, body { height: 100%; margin: 0; }
        #wrapper { display: flex; height: 100vh; margin: 0; padding: 0; }
        #content-wrapper { flex-grow: 1; display: flex; flex-direction: column; background-color: #f8f8f8; }
        #content { padding: 1rem; flex-grow: 1; }
        #page-content { flex-grow: 1; padding: 5px; }

        #wrapper {
        display: flex;
        }

        #wrapper #content-wrapper {
        background-color: #f8f9fc;
        width: 100%;
        overflow-x: hidden;
        }

        #wrapper #content-wrapper #content {
        flex: 1 0 auto;
        }
    </style>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar-->
        <?php include('./components/coach-sidebar.php'); ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Header Content -->
            <?php include('./components/coach-header.php'); ?>

            <!-- Main Content -->
            <div id="content">

                <!-- Begin Page Content -->
                <div id="page-content" style="width: 100%;">
                    <?php include "pages/home.php"; ?>
                    <?php include "pages/requirements.php"; ?>
                    <?php include "pages/schedule.php"; ?>
                    <?php include "pages/scan.php"; ?>
                    <?php include "pages/athletes.php"; ?>
                    <?php include "pages/assign-injury.php"; ?>
                    <?php include "pages/handle-pro.php"; ?>
                </div>

            </div>
            <!-- End of Main Content -->
        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->

    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://kit.fontawesome.com/29c04b1733.js" crossorigin="anonymous"></script>
    <script src="../assets/js/sidebar.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jsqr/dist/jsQR.min.js"></script>

    <!--START::CRUD AJAX FUNCTIONS-->
    <script src="crud-ajax/retrieve-stud.js"></script>
    <script src="crud-ajax/get-info.js"></script>
    <script src="crud-ajax/get-notif.js"></script>
    <script src="crud-ajax/sched-cate.js"></script>
    <script src="crud-ajax/date-time.js"></script>
    <script src="crud-ajax/calendar.js"></script>
    <script src="crud-ajax/list-stud.js"></script>
    <script src="crud-ajax/post-notif.js"></script>
    <script src="crud-ajax/scanner.js"></script>
    <script src="crud-ajax/attendance.js"></script>

</body>

</html>
