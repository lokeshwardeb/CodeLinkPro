<?php

session_start();

// $_SESSION['alert_message'] = '';

require_once __DIR__ . '/../../../controllers/controllers.php';

$controllers = new controllers;

$controllers->check_login();


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/assets/img/CodeLinkPro.png" type="image/x-icon">
    <title>CodeLink Pro -- <?php echo $active_name ?></title>

    <!-- favicon icon logo -->
    <link rel="shortcut icon" href="/assets/img/club_logo.jpg" type="image/x-icon">

    <!-- bootstrap css files -->
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">

    <!-- font awesome css files -->
    <link rel="stylesheet" href="/assets/css/all.min.css">

    <!-- responsive css files -->
    <link rel="stylesheet" href="/assets/css/responsive.css">

    <!-- ace editor css file -->
    <link rel="stylesheet" href="/assets/css/ace_code_editor.css">

    <!-- custom css files -->
    <link rel="stylesheet" href="/assets/css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="/assets/js/alert.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.9.4/ace.js" integrity="sha512-X+Op19uVlYfk3rjBDwbgOu+/bFz8RWoZG1Ch73+IUAkORNOKWcOOmUWicByeZH71mvYJ/7onbF5YJRrATrbyFQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- ace editor js scripts -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.35.2/ace.js"></script> -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.35.2/ace.min.js"  crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->


</head>

<body>