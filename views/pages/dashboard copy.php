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

                    <div class="homework_timer_section mt-4 pt-5">
                        <div class="timer_msg mt-4 text-center">Remaining time to submit your homework</div>

                        <?php

                        // Set the initial countdown time in seconds
                        // $countdown_time = 3600; // Example: 1 hour
                        $result_get_last_project_datetime = $controllers->get_data_where("homeworks", "`homework_status` = 'running'");

                        if($result_get_last_project_datetime){
                            if($result_get_last_project_datetime->num_rows > 0){
                                while($row = $result_get_last_project_datetime->fetch_assoc()){
                                    $countdown_homework_submission_datetime = $row['homework_submission_datetime'];
                                }
                            }
                        }

                        // Convert the future datetime to a timestamp
$event_timestamp = strtotime($countdown_homework_submission_datetime);
$current_timestamp = time();

// Calculate the countdown time in seconds
$countdown_time = $event_timestamp - $current_timestamp;

// Ensure countdown time is not negative
$countdown_time = max($countdown_time, 0);

                //   echo      $countdown_time = strtotime($countdown_homework_submission_datetime); // Example: 1 hour
                //   echo      $countdown_time = 1720804680; // Example: 1 hour
                        // $countdown_time = 172800; // Example: 1 hour

                        // Output the countdown time as a JavaScript variable
                        echo "<script>var countdownTime = $countdown_time;</script>";


?>

                        <div class="timer text-center mt-4" id="timer" ></div>

                       

                        
                    </div>

                  </div>

                </div>
            </div>
        </div>
    </div>
</main>

<script>
        // Function to format time
        function formatTime(seconds) {
            const days = Math.floor(seconds / 86400);
            seconds %= 86400;
            const hours = Math.floor(seconds / 3600);
            seconds %= 3600;
            const minutes = Math.floor(seconds / 60);
            seconds = seconds % 60;

            return `${String(days).padStart(2, '0')} day : ${String(hours).padStart(2, '0')} hour : ${String(minutes).padStart(2, '0')} min : ${String(seconds).padStart(2, '0')} sec`;

            // return `${String(days).padStart(2, '0')}:${String(hours).padStart(2, '0')}:${String(minutes).padStart(2, '0')}:${String(seconds).padStart(2, '0')}`;

            
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

        startCountdown(countdownTime);

        // Fetch the initial countdown time from the server
        // fetch('path/to/your/php/script.php')  // Replace with the actual path to your PHP script
        //     .then(response => response.json())
        //     .then(data => {
        //         startCountdown(data.countdownTime);
        //     })
        //     .catch(error => {
        //         console.error('Error fetching the countdown time:', error);
        //         document.getElementById('timer').innerHTML = 'Error loading timer';
        //     });
    </script>


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