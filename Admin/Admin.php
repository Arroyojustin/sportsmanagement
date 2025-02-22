<?php
session_start();

// Check if the user is logged in, if not, redirect to login page
if (!isset($_SESSION['user_type']) || $_SESSION['user_type'] != 'admin') {
    header('Location: ../index.php');
    exit();
}

// Prevent caching
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>admin</title>
    
    <link rel="stylesheet" href="../assets/css/sidebar.css">
    <link rel="stylesheet" href="../assets/css/header.css">
    <link rel="stylesheet" href="../assets/css/admin css/home.css">
    <link rel="stylesheet" href="../assets/css/admin css/datatable.css">
    <link rel="stylesheet" href="../assets/css/admin css/sports-add.css">
    <link rel="stylesheet" href="../assets/css/admin css/scrollable.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <style>
        html, body { height: 100%; margin: 0; }
        #wrapper { display: flex; height: 100vh; margin: 0; padding: 0; }
        #content-wrapper { flex-grow: 1; display: flex; flex-direction: column; background-color: #f8f8f8; }
        #content { padding: 1rem; flex-grow: 1; }
        #page-content { flex-grow: 1; padding: 10px; }

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
        <?php include('./components/sidebar.php'); ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Header Content -->
            <?php include('./components/header.php'); ?>

            <!-- Main Content -->
            <div id="content">


                 <!-- Begin Page Content -->
                 <div id="page-content" style="width: 100%;">
                    <?php include "pages/homie.php"; ?>
                    <?php include "pages/history.php"; ?>
                    <?php include "pages/add_control.php"; ?>
                    <?php include "pages/profile.php"; ?>
                    <?php include "pages/add-sport.php"; ?>
                    <?php include "pages/add-coor.php"; ?>
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.min.js"></script>
    <script src="https://kit.fontawesome.com/29c04b1733.js" crossorigin="anonymous"></script>
    <script src="../assets/js/sidebar.js"></script>
    
    

    <!--START::CRUD AJAX FUNCTIONS-->
    <script src="./crud-ajax/chart.js"></script>
    <script src="./crud-ajax/fetch-sport.js"></script>
    <script src="./crud-ajax/retrieve-sporname.js"></script>
    <script src="./crud-ajax/retrieve-sport.js"></script>
    <script src="./crud-ajax/insert-coach.js"></script>
    <script src="./crud-ajax/get-allusers.js"></script>

    
</body>
</html>
