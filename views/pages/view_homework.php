<?php
include __DIR__ . "/inc/_sidebar_active_class.php";
$homeworks_active_class = "sidebar_active_btn";
$active_name = "Submit Homework";
require __DIR__ . "/inc/_header.php";
$controllers->submit_homework();
$controllers->check_homework_show_status();
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
                        <!-- <div class="greetings_section mb-4">
                            Good Morning, Protik !!
                        </div> -->
                        <div class="submit_home_work_section ">
                            <div class="container">
                                <div class="section_title text-center fs-4 mb-4">
                                    Homework Details
                                </div>
                                <div class="section_check_title   mb-4">
                                    <?php

                                    if(!isset($_GET['homework_id'])){
                                        echo '
                                        
                                        <script>
                                        location.href = "/homework"
                                        </script>
                                        
                                        ';
                                    }

                                    $homework_id = $_GET['homework_id'];



                                    // $result_check_homework_status = $controllers->get_data_where("homeworks", "`homework_status` = 'running' AND `homework_id` = '$homework_id'");
                                    // $result_problem_homework_status = $controllers->get_data_where("homework_problems", "`homework_problem_status` = 'running' AND `homework_id` = '$homework_id'");

                                    
                                    $result_check_homework_status = $controllers->get_data_where("homeworks", "`homework_id` = '$homework_id'");
                                    $result_problem_homework_status = $controllers->get_data_where("homework_problems", "`homework_id` = '$homework_id'");


                                    if ($result_check_homework_status) {
                                        if ($result_check_homework_status->num_rows <= 0) {
                                            if ($result_problem_homework_status) {
                                                if ($result_problem_homework_status->num_rows <= 0) {
                                                    echo '
                                                    
                                                    <div class="text-danger">
                                                    There are no running homeworks and so that you cannot submit any other homeworks at this moment !! <br/> <b>Homework submitting time expired !!</b>
                                                    </div>
                                                    
                                                    ';

                                                    echo '
                                                    
                                                    <script>
                                                    location.href="/homework";
                                                    </script>
                                                    
                                                    ';

                                                }
                                            }
                                        }

                                        if($result_check_homework_status->num_rows > 0){
                                            // that means the data exists

                                            while($row = $result_check_homework_status->fetch_assoc()){
                                                $homework_title = $row['homework_title'];
                                                $problems_count = $row['problems_count'];
                                                $homework_status = $row['homework_status'];
                                                $homework_file_name = $row['homework_file_name'];
                                                $user_name = $row['user_name'];
                                                $homework_showing_status = $row['homework_showing_status'];

                                                $homework_submission_datetime = date("d M Y h:i:s a", strtotime($row['homework_submission_datetime']));
                                                // $homework_submission_datetime = $row['homework_submission_datetime'];
                                            }
                                        }
                                    }

                                    $get_main_datetime = $homework_submission_datetime;

                                    // strtotime()

                                    // $get_main_datetime =  date("d M Y h:i:s a", strtotime($homework_submission_datetime));

                                    // date("d M Y h:i:s a", strtotime($homework_submission_datetime)) 

                                    $homework_publisher_username_replaced = str_replace("_", " ", $user_name);



                                    ?>

                                    <div class="homework_details mt-4 pt-4">
                                        <div class="homework_title m-2">Homework Title : <span><?php echo $homework_title ?></span></div>
                                        <div class="problems_count m-2">Total Problems : <span><?php echo $problems_count ?></span></div>
                                        <div class="homework_status m-2">Homework Status : <span><?php echo $homework_status ?></span></div>
                                        <div class="homework_status m-2">Homework Published By : <span><?php echo ucwords($homework_publisher_username_replaced) ?></span></div>

                                        <?php

                                        if($_SESSION['user_role'] == 'admin'){

                                            if($homework_showing_status == ''){
                                                echo '

                                            <div class="homework_status m-2">Homework Showing Status By : <span>Homework is showind to</span></div>
                                            
                                            ';

                                            

                                            }elseif($homework_showing_status == 'hide_homework'){
                                                echo '

                                                <div class="homework_status m-2">Homework Showing Status : <span class="text-danger">Homework is hidden to users</span></div>
                                                
                                                '; 
                                            }elseif($homework_showing_status == 'show_homework'){
                                                echo '

                                                <div class="homework_status m-2">Homework Showing Status : <span class="text-primary">Homework is showing to users</span></div>
                                                
                                                '; 
                                            }

                                            // echo '

                                           

                                            // <div class="homework_status m-2">Homework Showing Status By : <span>'. $homework_showing_status == 'hide_homework' ? 'Homework is hidden' : 'Homework is showing to users' .'</span></div>
                                            // ';
                                        }

                                        ?>


                                        <div class="homework_submission_datetime m-2">Homework Submission Datetime : <span><?php echo $get_main_datetime ?></span></div>
                                    </div>


                                    <div class="homework_files">

                                    <?php

                                    // $result_homework = $controllers->get_data_where("homeworks", "`homework_id` = '$homework_id'");

                                    // if($result_homework){
                                    //     if($result_homework->num_rows > 0){
                                    //         $homework_tit
                                    //     }
                                    // }

                                    ?>

                                    <div class="container me-4 mb-5">

                                    <?php

                                    if($homework_file_name != ''){
                                        echo '
                                        <embed class="m-4 " src="/assets/uploads/homeworks/'. $user_name .'/' . $homework_file_name .'" type="application/pdf" style="height: 100vh; width:92%" >
                                        ';
                                    }else{
                                        // that means the file name is blank and it does not exists any file for the homework
                                        echo '<div class="fs-4 text-secondary mt-4 pt-4 text-center">No file was found for this homework</div>';
                                    }

                                    ?>
                                    

                                 <div class="download_section">
                                    <?php

                                    if($homework_file_name != ''){
                                        echo '
                                        <div class="mt-4 mb-5 pb-5">
                                 <a href="/assets/uploads/homeworks/'. $user_name . '/' . $homework_file_name .'" download="" ><button class="btn btn-outline-primary">Download Homework</button></a>
                                 </div>
                                        ';
                                    }

                                    ?>
                                 </div>


                                    </div>

                                    </div>







                                </div>
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php
require __DIR__ . "/inc/_footer_script.php";
?>