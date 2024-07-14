<?php


include __DIR__ . "/inc/_sidebar_active_class.php";

$manage_admin_panel_class = "sidebar_active_btn";

$active_name = "Submit Homework";



require __DIR__ . "/inc/_header.php";


// require_once __DIR__ . '/../../../controllers/controllers.php';
// require_once __DIR__ . '/';

// $controllers = new controllers;

$controllers->add_new_homework();
// add_new_homework
$controllers->check_admin_access();






?>

<main>
    <div class="main_section">
        <div class="row">
            <div class="col-md-4 col-sm-12 border-5  border-end" style="height: auto !important;">
                <div class="navbar_section">
                    <div class="mobile_navbar_section ">
                        <?php

                        require __DIR__ . "/inc/_mobile_sidebar.php";

                        ?>
                    </div>
                    <div class="md_navbar_section">
                        <div class="logo d-flex justify-content-center mt-5 pt-5 mb-4">
                            <img src="/assets/img/CodeLinkPro.png" class="" width="100px" alt="">
                        </div>

                        <?php

                        require __DIR__ . "/inc/_sidebar_items.php";

                        ?>
                    </div>
                </div>
            </div>
            <div class="col-md-8 col-sm-12">
                <div class="section_main_content mt-4">
                  <div class="container m-4 p-4">
                  <div class="greetings_section mb-4">
                        Good Morning, Protik !!
                    </div>

                    <!-- <div class="dashboard_navigation">
                        <div class="row">
                            <div class="col-md-6">
                                <a href="">
                                    <button class="btn dash_navi_btn">Submit Homework</button>
                                </a>
                            </div>
                            <div class="col-md-6">
                                <a href="">
                                    <button class="btn dash_navi_btn">New Homework</button>
                                </a>
                            </div>
                            <div class="col-md-6">
                                <a href="">
                                    <button class="btn dash_navi_btn">Written tutorials</button>
                                </a>
                            </div>
                            <div class="col-md-6">
                                <a href="">
                                    <button class="btn dash_navi_btn">Projects</button>
                                </a>
                            </div>
                        </div>
                    </div> -->

                   <div class="submit_home_work_section mt-4">
                    <div class="container">
                        <div class="section_title text-center fs-4 mb-4">
                            Add your homework
                        </div>
                        <form action="" method="post">
                        <div class="mb-3 me-4 pe-4">

                        <input type="text" name="homework_title" id="" class="form-control" placeholder="Homework title" >

                            <!-- <select name="" id="" class="form-control me-4 pe-4" >
                                <option value="">Select the homework</option>
                                <option value="">1. Loops</option>
                                <option value="">2. Conditions</option>
                            </select> -->
                        </div>
                        <div class="mb-3 me-4 pe-4">

                        <input type="number" name="problems_count" id="" class="form-control" placeholder="Homework Total Problem" >

                            <!-- <select name="" id="" class="form-control me-4 pe-4" >
                                <option value="">Select the homework</option>
                                <option value="">1. Loops</option>
                                <option value="">2. Conditions</option>
                            </select> -->
                        </div>
                        <div class="mb-3 me-4 pe-4">
                            <input type="file" name="homework_files[]" class="form-control mt-4" id="homework_files">
                        </div>
                        <div class="mb-3 me-4 pe-4">
                            <input type="datetime-local" name="homework_submission_datetime" class="form-control mt-4" id="homework_files" placeholder="Submission datetime">
                        </div>

                       

                        <script>
                            function createInp(){
                                let input =   document.createElement("input");
                                input.classList.add("form-control");
                            }
                        </script>
                        

                        <div class="mb-3 mt-4 pt-4">
                            <button type="submit" class="btn  btn-outline-dark" name="add_new_homework" >Submit</button>
                        </div>
                        <div class="mb-3 mt-4 pt-4">
                            <a href="/manage_homework" class="nav-link">
                            <button type="button" class="btn btn-sm btn-outline-dark">Back to Manage Homework</button>
                            </a>
                        </div>

                        </form>
                    </div>
                   </div>

                  </div>

                </div>
            </div>
        </div>
    </div>
</main>



<!-- <script>
        // Convert the countdown time to hours, minutes, and seconds
        function formatTime(seconds) {
            const hours = Math.floor(seconds / 3600);
            seconds %= 3600;
            const minutes = Math.floor(seconds / 60);
            seconds = seconds % 60;
            return `${String(hours).padStart(2, '0')}:${String(minutes).padStart(2, '0')}:${String(seconds).padStart(2, '0')}`;
        }

        // let countdownTime = 100000
        // Initialize the countdown timer
        let timeLeft = countdownTime;
        const timerElement = document.getElementById('timer');

        // Update the timer every second
        const countdown = setInterval(() => {
            if (timeLeft <= 0) {
                clearInterval(countdown);
                timerElement.innerHTML = 'Time\'s up!';
            } else {
                timerElement.innerHTML = formatTime(timeLeft);
                timeLeft--;
            }
        }, 1000);
    </script> -->


<?php

require __DIR__ . "/inc/_footer_script.php";

?>