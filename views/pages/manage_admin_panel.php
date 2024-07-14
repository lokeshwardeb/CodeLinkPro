<?php


include __DIR__ . "/inc/_sidebar_active_class.php";

$manage_admin_panel_class = "sidebar_active_btn";

$active_name = "Submit Homework";



require __DIR__ . "/inc/_header.php";


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

                    <div class="dashboard_navigation">
                        <div class="row">
                            <div class="col-md-6">
                                <a href="/add_new_homework">
                                    <button class="btn dash_navi_btn manage_admin_panel_btn">Add a new Homework</button>
                                </a>
                            </div>
                            <div class="col-md-6">
                                <a href="/manage_homework">
                                    <button class="btn dash_navi_btn manage_admin_panel_btn">Manage Homework</button>
                                </a>
                            </div>
                            <div class="col-md-6">
                                <a href="">
                                    <button class="btn dash_navi_btn manage_admin_panel_btn">Add Written tutorials</button>
                                </a>
                            </div>
                            <div class="col-md-6">
                                <a href="">
                                    <button class="btn dash_navi_btn manage_admin_panel_btn">Manage Written tutorials</button>
                                </a>
                            </div>
                            <div class="col-md-6">
                                <a href="/manage_submitted_homeworks">
                                    <button class="btn dash_navi_btn manage_admin_panel_btn">Manage submitted homeworks</button>
                                </a>
                            </div>
                            <div class="col-md-6">
                                <a href="/manage_new_submitted_homeworks">
                                    <button class="btn dash_navi_btn manage_admin_panel_btn">Manage new submitted homeworks</button>
                                </a>
                            </div>
                            <div class="col-md-6">
                                <a href="/manage_new_submitted_homeworks">
                                    <button class="btn dash_navi_btn manage_admin_panel_btn">Change a user role</button>
                                </a>
                            </div>
                            <div class="col-md-6">
                                <a href="/manage_users">
                                    <button class="btn dash_navi_btn manage_admin_panel_btn">Manage users </button>
                                </a>
                            </div>
                        </div>
                    </div>

                   <!-- <div class="submit_home_work_section mt-4">
                    <div class="container">
                        <div class="section_title text-center fs-4 mb-4">
                            Submit your homework
                        </div>
                        <form action="" method="post">
                        <div class="mb-3 me-4 pe-4">
                            <select name="" id="" class="form-control me-4 pe-4" >
                                <option value="">Select the homework</option>
                                <option value="">1. Loops</option>
                                <option value="">2. Conditions</option>
                            </select>
                        </div>
                        <div class="mb-3 me-4 pe-4">
                            <input type="file" name="homework_files" class="form-control mt-4" id="homework_files">
                        </div>

                        <div class="mb-3 mt-4 pt-4">
                            <button type="submit" class="btn  btn-outline-dark">Submit</button>
                        </div>
                        <div class="mb-3 mt-4 pt-4">
                            <a href="/homework" class="nav-link">
                            <button type="button" class="btn btn-sm btn-outline-dark">Back to Homeworks</button>
                            </a>
                        </div>

                        </form>
                    </div>
                   </div> -->

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