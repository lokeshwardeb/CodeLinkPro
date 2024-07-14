<?php


include __DIR__ . "/inc/_sidebar_active_class.php";

$homeworks_active_class = "sidebar_active_btn";

$active_name = "Homework";



require __DIR__ . "/inc/_header.php";

$controllers->check_block_user();







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
                  <div class="greetings_main_section">
                            <?php

                            include_once __DIR__ . '/inc/_greetings_section.php';

                            ?>
                        </div>

                    <div class="dashboard_navigation mt-4">
                        <div class="row">
                            <div class="col-md-6">
                                <a href="/submit_homework">
                                    <button class="btn dash_navi_btn manage_admin_panel_btn">Submit Homework</button>
                                </a>
                            </div>
                            <div class="col-md-6">
                                <a href="/new_homework">
                                    <button style="font-size: 13px" class="btn dash_navi_btn manage_admin_panel_btn">New Running Homeworks</button>
                                </a>
                            </div>
                            <!-- <div class="col-md-6">
                                <a href="">
                                    <button class="btn dash_navi_btn">Written tutorials</button>
                                </a>
                            </div>
                            <div class="col-md-6">
                                <a href="">
                                    <button class="btn dash_navi_btn">Projects</button>
                                </a>
                            </div> -->
                        </div>
                    </div>

                   <div class="home_work_remaining_time_section mt-4 pt-4">
                    <div class="container">
                        <!-- <div class="section_title text-center mt-4 fs-5 mb-4">
                            Remaining time to submit your homework
                        </div> -->
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
        </div>
    </div>
</main>


<!-- <script src="/assets/js/timer.js"></script> -->


<script src="/assets/js/homework_timer.js"></script>


<?php

require __DIR__ . "/inc/_footer_script.php";

?>