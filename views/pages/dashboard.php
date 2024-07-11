<?php
include __DIR__ . "/inc/_sidebar_active_class.php";
$dashboard_active_class = "sidebar_active_btn";
$active_name = "Dashboard";
require __DIR__ . "/inc/_header.php";
?>

<main>
    <div class="main_section">
        <div class="row">
            <div class="col-md-4 col-sm-12 border-5  border-end" style="height: auto !important;">
                <div class="navbar_section">
                    <div class="mobile_navbar_section ">
                        <?php require __DIR__ . "/inc/_mobile_sidebar.php"; ?>
                    </div>
                    <div class="md_navbar_section">
                        <div class="logo d-flex justify-content-center mt-5 pt-5 mb-4">
                            <img src="/assets/img/CodeLinkPro.png" class="" width="100px" alt="">
                        </div>
                        <?php require __DIR__ . "/inc/_sidebar_items.php"; ?>
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
                                    <a href="/submit_homework">
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
                        </div>
                        <div class="homework_timer_main_section">
                            <?php

                            require __DIR__ . '/inc/_homework_timer.php';

                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<!-- <script>
    // Function to format time
    function formatTime(seconds) {
        const days = Math.floor(seconds / 86400);
        seconds %= 86400;
        const hours = Math.floor(seconds / 3600);
        seconds %= 3600;
        const minutes = Math.floor(seconds / 60);
        seconds = seconds % 60;
        return `${String(days).padStart(2, '0')} day : ${String(hours).padStart(2, '0')} hour : ${String(minutes).padStart(2, '0')} min : ${String(seconds).padStart(2, '0')} sec`;
    }

    // Function to start the countdown timer
    function startCountdown(initialTime) {
        let timeLeft = initialTime;
        const timerElement = document.getElementById('timer');

        const countdown = setInterval(() => {
            if (timeLeft <= 0) {
                clearInterval(countdown);
                timerElement.innerHTML = 'Time\'s up!';
            } else {
                timerElement.innerHTML = formatTime(timeLeft);
                timeLeft--;
            }
        }, 1000);
    }

    document.addEventListener('DOMContentLoaded', (event) => {
        startCountdown(countdownTime);
    });
</script> -->

<script src="/assets/js/homework_timer.js"></script>

<?php require __DIR__ . "/inc/_footer_script.php"; ?>
