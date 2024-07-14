<?php


include __DIR__ . "/inc/_sidebar_active_class.php";

$dashboard_active_class = "sidebar_active_btn";

$active_name = "Submit Homework";



require __DIR__ . "/inc/_header.php";


// if(!isset($_GET['user_id'])){
//     header("location: /manage_users");
// }

// $controllers->block_and_unblock_user();




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
                        <!-- <div class="greetings_section mb-4">
                            Good Morning, Protik !!
                        </div> -->

                        <!-- <div class="dashboard_navigation">
                            <div class="row">
                                <div class="col-md-6">
                                    <a href="/add_new_homework">
                                        <button class="btn dash_navi_btn manage_admin_panel_btn">Add a new
                                            Homework</button>
                                    </a>
                                </div>
                                <div class="col-md-6">
                                    <a href="">
                                        <button class="btn dash_navi_btn manage_admin_panel_btn">Manage
                                            Homework</button>
                                    </a>
                                </div>
                                <div class="col-md-6">
                                    <a href="">
                                        <button class="btn dash_navi_btn manage_admin_panel_btn">Add Written
                                            tutorials</button>
                                    </a>
                                </div>
                                <div class="col-md-6">
                                    <a href="">
                                        <button class="btn dash_navi_btn manage_admin_panel_btn">Manage Written
                                            tutorials</button>
                                    </a>
                                </div>
                            </div>
                        </div> -->


                        <!-- <div class="home_work_section">
                            <div class="container">
                                
                            </div>
                        </div> -->


                        <div class="submit_home_work_section mt-4">
                    <div class="container">
                        <div class="section_title text-danger text-center fs-4 mb-4">
                            YOU HAS BEEN BLOCKED
                        </div>
                        <form action="" method="post" enctype="multipart/form-data" >

                        <div class="mb-4 mt-4 pt-4 container me-4 pe-4">
                           Sorry, Unfortunately you has been blocked from this software by the <span class="fw-bold">CODELINK PRO</span> Authority. Please kindly contact to the developer and the authority for support or about how you canbe unblocked. Feel free to ask any queries !! Have a nice day !!
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