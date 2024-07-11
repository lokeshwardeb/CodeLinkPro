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
                                    Submit your homework
                                </div>
                                <div class="section_check_title text-danger text-center  fs-6 mb-4">
                                    <?php

                                    $result_check_homework_status = $controllers->get_data_where("homeworks", "`homework_status` = 'running'");
                                    $result_problem_homework_status = $controllers->get_data_where("homework_problems", "`homework_problem_status` = 'running'");

                                    if ($result_check_homework_status) {
                                        if ($result_check_homework_status->num_rows <= 0) {
                                            // that means there are no running homework in homework table
                                            if ($result_problem_homework_status) {
                                                if ($result_problem_homework_status->num_rows <= 0) {
                                                    echo "There are no running homeworks and so that you cannot submit any other homeworks at this moment !! <br/> <b>
                                            Homework submitting time expired !!
                                            </b>";
                                                }
                                            }
                                        }
                                    }

                                    ?>
                                </div>
                                <form action="" method="post">
                                    <div class="mb-3 me-4 pe-4">
                                        <select name="" id="" class="form-control me-4 pe-4">
                                            <option value="">Select the homework</option>
                                            <?php

                                            // $homework_id = $_GET['homework_id'];
                                            
                                            $result_homework = $controllers->get_data_where("homeworks", "`homework_status` = 'running'");
                                            // $result_homework = $controllers->get_data("homeworks");
                                            
                                            if ($result_homework) {
                                                if ($result_homework->num_rows > 0) {

                                                    // $hid = 1;
                                            
                                                    while ($row = $result_homework->fetch_assoc()) {
                                                        // global $get_homework_id;
                                                        define("GET_HOMEWORK_ID", $row["homework_id"]);
                                                        $hid = $row["homework_id"];
                                                        echo '

                                            <option value="' . $row['homework_id'] . '">' . $row['homework_title'] . '</option>
                                            
                                            
                                            ';
                                                    }
                                                }
                                            }

                                            ?>
                                        </select>
                                    </div>
                                    <div class="mb-3 me-4 pe-4">
                                        <select name="" id="" class="form-control me-4 pe-4">
                                            <option value="">Select the problem</option>
                                            <?php

                                            $hid = 1;
                                            $result_problem = $controllers->get_data_where("homework_problems", "`homework_problem_status` = 'running'");
                                            //   $result_problem = $controllers->get_data_where("homework_problems", "`homework_id` = '$get_homework_id'");
                                            
                                            $hid = 1;
                                            if ($result_problem) {
                                                if ($result_problem->num_rows > 0) {
                                                    while ($row = $result_problem->fetch_assoc()) {
                                                        echo '
                                        <option value="' . $row['homework_problem_id'] . '">' . $row['homework_problem_name'] . '</option>
                                        ';
                                                        // $problem_id = $row[""];
                                                    }
                                                }
                                            }

                                            ?>
                                        </select>
                                    </div>

                                    <div class="mb-3 me-4 pe-4 code_editor_section">

                                    <div class="mt-2">
                                        <div class="row">
                                            <div class="col-8">
                                                <div class="code_section_info primary-color fw-bold mt-5">
                                                Choose a language and write your code here
                                                </div>
                                            </div>
                                            <div class="col-4">
                                            <select name="language" class="mt-5  form-control" id="language" onchange="updateLanguage()">
                                            <option value="">Select Language</option>
                                            <option value="python3">Python 3</option>
                                            <option value="c">C</option>
                                            <option value="cpp">C++</option>
                                            <option value="java">Java</option>
                                            <option value="php">PHP</option>
                                        </select>
                                            </div>
                                        </div>
                                     </div>

                                        <div class="code_editor">
                                        <div id="editor"># you can write your code here</div>
                                        </div>

                                        <textarea class="form-control d-none mt-4 pt-4" name="editor_code" id="editor_code">

                                        </textarea>

                                     


                                        <script>
    // Initialize Ace editor
    var editor = ace.edit("editor");

    function updateLanguage(){
        var language = document.getElementById("language").value;


switch(language){
    case "python3":
        editor.session.setMode("ace/mode/python")
    case "c":
        editor.session.setMode("ace/mode/c_cpp")
    case "cpp":
        editor.session.setMode("ace/mode/c_cpp")
    case "java":
        editor.session.setMode("ace/mode/java")
    case "php":
        editor.session.setMode("ace/mode/php")


        
}
    }

 


    // editor.session.setMode("ace/mode/python");

    // Function to update the input field with the editor's content
    function updateInputField() {
        var editorContent = editor.getValue();
        document.getElementById("editor_code").value = editorContent;
        console.log("Editor content updated:", editorContent);
    }

    // Initial sync from Ace editor to input field
    updateInputField();

    // Listen for changes in Ace editor's session and update the input field
    editor.session.on('change', updateInputField);

    // Logging the final input value for debugging
    var finalInputValue = document.getElementById("editor_code").value;
    console.log("Final input value:", finalInputValue);
</script>

                                       

                                    </div>

                                 <!-- <script>
                                    let editor =document.getElementById("editor");
                                    // editor.session.setMode("ace/mode/javascript");
                                    // editor.session.setMode("/ace/mode/python");
                                 </script>   -->
                                    <div class="mb-3 me-4 pe-4">
                                        <?php

                                        $controllers->homework_submit_show_input('
                            <input type="file" name="homework_files" class="form-control mt-4" id="homework_files">', '
                            <input disabled type="file" name="homework_files" class="form-control mt-4" id="homework_files">')

                                            ?>
                                    </div>

                                    <div class="mb-3 mt-4 pt-4">
                                        <?php

                                        $controllers->homework_submit_show_input('<button type="submit" name="homework_submit" class="btn  btn-outline-dark">Submit</button>', '<button title="The button is disabled " disabled type="submit" class="btn  btn-outline-dark">Submit</button>');



                                        ?>

                                        <!-- <button type="submit"  class="btn  btn-outline-dark">Submit</button> -->
                                    </div>

                                    <div class="show_output">
                                        <?php

                                        $output = $controllers->run_code();

                                        echo '
                                        
                                        <pre>
                                        '. $output .'
                                        </pre>
                                        
                                        ';

                                        ?>
                                    </div>

                                    <div class="mb-3 mt-4 pt-4">
                                        <button type="submit" class="btn btn-outline-primary" name="test_code">Test code</button>
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