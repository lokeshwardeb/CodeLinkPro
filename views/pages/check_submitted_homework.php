<?php
include __DIR__ . "/inc/_sidebar_active_class.php";
$manage_admin_panel_class = "sidebar_active_btn";
$active_name = "Submit Homework";
require __DIR__ . "/inc/_header.php";
$controllers->check_submitted_homework();
$controllers->check_admin_access();


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
                        <div class="submit_home_work_section pb-4 mt-4">
                            <div class="container">
                                <div class="section_title pb-4 text-center fs-4 mb-4">
                                    Submit your homework inspection result
                                </div>
                                <div class="section_check_title text-danger text-center fs-6 mb-4">
                                    <?php
                                    $result_check_homework_status = $controllers->get_data_where("homeworks", "`homework_status` = 'running'");
                                    $result_problem_homework_status = $controllers->get_data_where("homework_problems", "`homework_problem_status` = 'running'");
                                    if ($result_check_homework_status) {
                                        if ($result_check_homework_status->num_rows <= 0) {
                                            if ($result_problem_homework_status) {
                                                if ($result_problem_homework_status->num_rows <= 0) {
                                                    echo "There are no running homeworks and so that you cannot submit any other homeworks at this moment !! <br/> <b>Homework submitting time expired !!</b>";
                                                }
                                            }
                                        }
                                    }
                                    ?>
                                </div>

                                <div class="user_info_section">
                                    <div class="user_info">
                                        <?php

                                        
$homework_id = $_GET['homework_id'];
$homework_problem_id = $_GET['homework_problem_id'];


$result_check_submission = $controllers->get_data_where("homework_submission", "`homework_id` = '$homework_id' AND `homework_problem_id` = '$homework_problem_id'");

if($result_check_submission){
    if($result_check_submission->num_rows > 0){
        while($row = $result_check_submission->fetch_assoc()){
            $submitted_user_id = $row['submitted_user_id'];
            $code_language = $row['code_language'];
        }
    }
}                                       

                                        // $result_homework_submitted_user_id = $controllers->get_data_where("homework_submission", "`homework_id` = '$homework_id' AND `homework_problem_id` = '$homework_problem_id'");

                                        // if($result_homework_submitted_user_id){
                                        //     if($result_homework_submitted_user_id->)
                                        // }

                                        // $sql = "SELECT * FROM homework_submission INNER JOIN users ON homework_submission.submitted_user_id = users.user_id   WHERE `homework_id` = 32 AND `homework_problem_id` = 39 AND `submitted_user_id` = 6";
                                        $sql = "SELECT * FROM homework_submission INNER JOIN users ON homework_submission.submitted_user_id = users.user_id   WHERE `homework_id` = '$homework_id' AND `homework_problem_id` = '$homework_problem_id' AND `submitted_user_id` = '$submitted_user_id'";
                                        $result_user_info = $controllers->make_query($sql);

                                        if($result_user_info){
                                            if($result_user_info->num_rows > 0){
                                                while($row = $result_user_info->fetch_assoc()){
                                                    $submitted_user_name = $row['user_name'];
                                                    $submitted_user_role = $row['user_role'];
                                                    $homework_inspection_result = $row['homework_inspection_result'];
                                                }
                                            }
                                        }

                                        ?>

<div class="user_info_main_section mt-4 mb-4">
    <span>Submitted By (Username) : <?php echo $submitted_user_name ?></span>
</div>

                                    </div>
                                </div>

                                <form action="" method="post" enctype="multipart/form-data">
                                    <div class="mb-3 me-4 pe-4">
    <input type="hidden" name="submitted_user_id" value="<?php echo $submitted_user_id ?>">

                                        <select name="homework_id" id="" class="form-control me-4 pe-4">
                                            <option value="">Select the homework</option>
                                            <?php
                                            if(!isset($_GET['homework_id'])){
                                                echo '
                                                <script>
                                                location.href = "/manage_submitted_homeworks";
                                                </script>
                                                ';
                                            }

                                            if(!isset($_GET['homework_problem_id'])){
                                                echo '
                                                <script>
                                                location.href = "/manage_submitted_homeworks";
                                                </script>
                                                ';
                                            }

                                            // $homework_id = $_GET['homework_id'];
                                            // $homework_problem_id = $_GET['homework_problem_id'];

                                            $result_homework = $controllers->get_data_where("homeworks", "`homework_id` = '$homework_id'");
                                            if ($result_homework) {
                                                if ($result_homework->num_rows > 0) {
                                                    while ($row = $result_homework->fetch_assoc()) {
                                                        // $get_homework_id = $row['homework_id'];
                                                        // define("GET_HOMEWORK_ID", $row["homework_id"]);
                                                        echo '<option selected value="' . $row['homework_id'] . '">' . $row['homework_title'] . '</option>';
                                                    }
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="mb-3 me-4 pe-4">
                                        <select name="homework_problem_id" id="" class="form-control me-4 pe-4">
                                            <option value="">Select the problem</option>
                                            <?php
                                            $result_problem = $controllers->get_data_where("homework_problems", "`homework_problem_id` = '$homework_problem_id'");
                                            if ($result_problem) {
                                                if ($result_problem->num_rows > 0) {
                                                    while ($row = $result_problem->fetch_assoc()) {
                                                        echo '<option selected value="' . $row['homework_problem_id'] . '">' . $row['homework_problem_name'] . '</option>';
                                                    }
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>

                              <div class="integrate_code_editor">
                                <?php

                                $result_check_submission = $controllers->get_data_where("homework_submission", "`homework_id` = '$homework_id' AND `homework_problem_id` = '$homework_problem_id'");

                                if($result_check_submission){
                                    if($result_check_submission->num_rows > 0){
                                        while($row = $result_check_submission->fetch_assoc()){
                                            $submitted_user_id = $row['submitted_user_id'];
                                            $code_language = $row['code_language'];
                                        }
                                    }
                                }

                                include __DIR__ . '/inc/_check_homework_code_editor.php';
                                
                                ?>
                              </div>

                                    <!-- <div class="mb-3 mt-4 pt-4">
                                        <button type="submit" class="btn btn-outline-primary" name="test_code">Test code</button>
                                    </div> -->

                                    <div class="mb-3 me-4 pe-4">
                                        <label for="homework_inspection_result mb-4">Homework inspection result</label>
                                        <select name="homework_inspection_result" id="homework_inspection_result" class="form-control me-4 pe-4 mt-4 ">
                                            <option value="">Select your homework inspection result</option>
                                           <option value="correct_solution" <?php 
                                           
                                           if($homework_inspection_result == 'correct_solution'){
                                            echo 'selected';
                                           }
                                           
                                           ?>>Homework problem solution is correct</option>
                                           <option value="wrong_solution" <?php 

                                           if($homework_inspection_result == 'wrong_solution' || $homework_inspection_result == ''){
                                            echo 'selected';
                                           }
                                                                                      
                                           
                                           ?>>Homework problem solution is wrong</option>
                                        </select>
                                    </div>

                                    <div class="mb-3 mt-4 pt-4 me-4 pe-4">
                                        <label for="wrong_solution_reason">Where was the wrong ? Explain the wrong solution reason</label>
                                        <textarea name="wrong_solution_reason" class="form-control mt-4" id="wrong_solution_reason" cols="30" rows="10"></textarea>
                                    </div>
<!-- 
                                    <div class="mb-3 me-4 mt-4 pt-4 pe-4">
                                        <label for="homework_files" class="mt-4">Add homework submit files</label>
                                        <?php
                                        // $controllers->homework_submit_show_input(
                                        //     '<input type="file" name="homework_files[]" multiple class="form-control mt-4 " id="homework_files">',
                                        //     '<input disabled type="file" name="homework_files" class="form-control mt-4 " id="homework_files">'
                                        // );
                                        ?>
                                    </div> -->
                                    <div class="mb-3 mt-4 pt-4">

                                    <button type="submit" name="check_submitted_homework" class="btn btn-outline-dark">Submit</button>
                                        <?php
                                        // $controllers->homework_submit_show_input(
                                        //     '<button type="submit" name="homework_submit[]" class="btn btn-outline-dark">Submit</button>',
                                        //     '<button title="The button is disabled " disabled type="submit" class="btn btn-outline-dark">Submit</button>'
                                        // );
                                        ?>
                                    </div>

                                    <div class="mb-3 mt-4 pt-4">
                                        <a href="/manage_submitted_homeworks" class="nav-link">
                                            <button type="button" class="btn btn-sm btn-outline-dark">Back to
                                                Manage submitted homeworks</button>
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

<?php
require __DIR__ . "/inc/_footer_script.php";
?>