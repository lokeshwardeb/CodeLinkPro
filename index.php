<?php

// initalizing the path of the server
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];



// register routes
$Routes = [

    // "/" => __DIR__ . "/views/pages/views.form.php",
    // "/form" => __DIR__ . "/views/pages/views.form.php",

    "/" => __DIR__ . "/views/pages/login.php",
    "/login" => __DIR__ . "/views/pages/login.php",
    "/signup" => __DIR__ . "/views/pages/signup.php",
    "/dashboard" => __DIR__ . "/views/pages/dashboard.php",
    "/logout" => __DIR__ . "/views/pages/logout.php",
    "/submit_homework" => __DIR__ . "/views/pages/submit_homework.php",
    "/homework" => __DIR__ . "/views/pages/homework.php",
    "/manage_codes" => __DIR__ . "/views/pages/manage_codes.php",
    "/new_homework" => __DIR__ . "/views/pages/new_homework.php",
    "/view_homework" => __DIR__ . "/views/pages/view_homework.php",
    "/check_submitted_homework" => __DIR__ . "/views/pages/check_submitted_homework.php",
    "/manage_submitted_homeworks" => __DIR__ . "/views/pages/manage_submitted_homeworks.php",
    "/manage_new_submitted_homeworks" => __DIR__ . "/views/pages/manage_new_submitted_homeworks.php",
    "/manage_code_details" => __DIR__ . "/views/pages/manage_code_details.php",
    "/manage_users" => __DIR__ . "/views/pages/manage_users.php",
    "/user_details" => __DIR__ . "/views/pages/user_details.php",
    "/user_blocked" => __DIR__ . "/views/pages/user_blocked.php",
    "/all_homeworks" => __DIR__ . "/views/pages/all_homeworks.php",
    "/manage_admin_panel" => __DIR__ . "/views/pages/manage_admin_panel.php",
    "/add_new_homework" => __DIR__ . "/views/pages/add_new_homework.php",
    "/manage_homework" => __DIR__ . "/views/pages/manage_homework.php",
    "/homework_details" => __DIR__ . "/views/pages/homework_details.php",
    

];

// applying the conditions
if(array_key_exists($uri, $Routes)){
    require $Routes[$uri];
}else{
    require __DIR__ . '/views/error_pages/views.error.php';
}






?>