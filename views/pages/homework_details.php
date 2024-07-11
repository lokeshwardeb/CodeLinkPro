<?php


include __DIR__ . "/inc/_sidebar_active_class.php";

$manage_admin_panel_class = "sidebar_active_btn";

$active_name = "Submit Homework";



require __DIR__ . "/inc/_header.php";


if(!isset($_GET['homework_id'])){
    header("location: /manage_homework");
}

$controllers->homework_details_update();




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
                        <div class="section_title text-center fs-4 mb-4">
                            Update your homework
                        </div>
                        <form action="" method="post" enctype="multipart/form-data" >

                        <?php

                        $get_homework_id = $controllers->pure_data($_GET['homework_id']);

                        ?>

                        <input type="hidden" name="homework_id" value="<?php echo $get_homework_id ?>">
                        

                        <?php

                        $get_homework_id = $controllers->pure_data($_GET['homework_id']);

                        $result_check_homework_details = $controllers->get_data_where("homeworks", "`homework_id` = '$get_homework_id'");

                        if($result_check_homework_details){
                            if($result_check_homework_details->num_rows == 1){
                                while($row = $result_check_homework_details->fetch_assoc()){
                                    $problems_count = $row['problems_count'];
                                    $homework_status = $row['homework_status'];

                                    echo '
                                    <div class="mb-3 me-4 pe-4">
                                     <label for="homework_title"class="mt-4 mb-2" >Homework status</label>
                                    
                                        <input type="text" class="form-control" placeholder="Enter Homework title" value="'. $row['homework_title'] .'" name="homework_title" id="homework_title">
                           
                                    </div>


                           




                                    ';

                                }
                            }
                        }

                        $result_check_problem = $controllers->get_data_where("homework_problems", "`homework_id` = '$get_homework_id'");

                        if($result_check_problem){
                            if($result_check_problem->num_rows > 0){
                                $problem_sl_no = 1;
                                while($row = $result_check_problem->fetch_assoc()){
                                    echo '
                                    
                                    <input type="hidden" name="homework_problem_id_'. $problem_sl_no .'" value="'. $row['homework_problem_id'] .'" >
                                    
                                <div class="mb-3 me-4 pe-4">
                                    <label for="homework_problem_name"class="mt-4 mb-2 primary-color" >Homework Problem no '. $problem_sl_no .'</label>
                                
                                    <input type="text" name="homework_problem_name_'. $problem_sl_no .'" class="form-control " id="homework_problem_name" value="'. $row['homework_problem_name'] .'" placeholder="Update Homework Problem no '. $problem_sl_no .'" >
                                 </div>
                                    
                                    ';

                                    $problem_sl_no++;

                                }
                            }
                        }

                        ?>



                        <div class="mb-3 me-4 pe-4">
                            <input type="file" name="homework_files" class="form-control mt-4" id="homework_files">
                        </div>

                        
                        <div class="mb-3 me-4 pe-4">

                            <label for="homework_status"class="mt-4 mb-2" >Homework status</label>

                            <select name="homework_status" id="homework_status" class="form-control">
                                <option value="">Select the Homework Status</option>
                                <option value="running" <?php 
                                if($homework_status == 'running'){
                                    echo "selected";
                                }
                                ?> >Homework submit is Running</option>
                                <option value="time_expired" <?php 
                                if($homework_status == 'time_expired'){
                                    echo "selected";
                                }
                                ?> >Homework submitting time is expired</option>
                            </select>
                        </div>



                        <div class="mb-3 mt-4 pt-4">
                            <button type="submit" class="btn  btn-outline-dark" name="update_homework_details">Update Homework Details</button>
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