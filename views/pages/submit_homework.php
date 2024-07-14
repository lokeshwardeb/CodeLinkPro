<?php
include __DIR__ . "/inc/_sidebar_active_class.php";
$homeworks_active_class = "sidebar_active_btn";
$active_name = "Submit Homework";
require __DIR__ . "/inc/_header.php";
$controllers->submit_homework();
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
                                <div class="section_title text-center pb-4 fs-4 mb-4">
                                    Submit your homework
                                </div>
                                <div class="section_check_title mt-4  text-danger text-center fs-6 mb-4">
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
                                <form action="" method="post" enctype="multipart/form-data">
                                    <div class="mb-3 me-4 pe-4">
                                        <select name="homework_id" id="" class="form-control me-4 pe-4">
                                            <option value="">Select the homework</option>
                                            <?php
                                            $result_homework = $controllers->get_data_where("homeworks", "`homework_status` = 'running'");
                                            if ($result_homework) {
                                                if ($result_homework->num_rows > 0) {
                                                    while ($row = $result_homework->fetch_assoc()) {
                                                        $get_homework_id = $row['homework_id'];
                                                        // define("GET_HOMEWORK_ID", $row["homework_id"]);
                                                        echo '<option value="' . $row['homework_id'] . '">' . $row['homework_title'] . '</option>';
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
                                            $result_problem = $controllers->get_data_where("homework_problems", "`homework_problem_status` = 'running'");
                                            if ($result_problem) {
                                                if ($result_problem->num_rows > 0) {
                                                    while ($row = $result_problem->fetch_assoc()) {
                                                        echo '<option value="' . $row['homework_problem_id'] . '">' . $row['homework_problem_name'] . '</option>';
                                                    }
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>

                              <div class="integrate_code_editor">
                                <?php

                                include __DIR__ . '/inc/_code_editor.php';
                                
                                ?>
                              </div>

                                    <!-- <div class="mb-3 mt-4 pt-4">
                                        <button type="submit" class="btn btn-outline-primary" name="test_code">Test code</button>
                                    </div> -->

                                    <div class="mb-3 me-4 mt-4 pt-4 pe-4">
                                        <label for="homework_files" class="mt-4">Add homework submit files</label>
                                        <?php
                                        $controllers->homework_submit_show_input(
                                            '<input type="file" name="homework_files[]" multiple class="form-control mt-4 " id="homework_files">',
                                            '<input disabled type="file" name="homework_files" class="form-control mt-4 " id="homework_files">'
                                        );
                                        ?>
                                    </div>
                                    <div class="mb-3 mt-4 pt-4">
                                        <?php
                                        $controllers->homework_submit_show_input(
                                            '<button type="submit" name="homework_submit[]" class="btn btn-outline-dark">Submit</button>',
                                            '<button title="The button is disabled " disabled type="submit" class="btn btn-outline-dark">Submit</button>'
                                        );
                                        ?>
                                    </div>

                                    <div class="mb-3 mt-4 pt-4">
                                        <a href="/homework" class="nav-link">
                                            <button type="button" class="btn btn-sm btn-outline-dark">Back to
                                                Homeworks</button>
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