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
                        <div class="greetings_section mb-4">
                            Good Morning, Protik !!
                        </div>
                        <div class="submit_home_work_section mt-4">
                            <div class="container">
                                <div class="section_title text-center fs-4 mb-4">
                                    Submit your homework
                                </div>
                                <div class="section_check_title text-danger text-center fs-6 mb-4">
                                    <?php
                                    $result_check_homework_status = $controllers->get_data_where("homeworks", "`homework_status` = 'running'");
                                    $result_problem_homework_status = $controllers->get_data_where("homework_problems", "`homework_problem_status` = 'running'");
                                    if ($result_check_homework_status && $result_check_homework_status->num_rows <= 0 && $result_problem_homework_status && $result_problem_homework_status->num_rows <= 0) {
                                        echo "There are no running homeworks and so that you cannot submit any other homeworks at this moment !! <br/> <b>Homework submitting time expired !!</b>";
                                    }
                                    ?>
                                </div>
                                <form action="" method="post">
                                    <div class="mb-3 me-4 pe-4">
                                        <select name="" id="" class="form-control me-4 pe-4">
                                            <option value="">Select the homework</option>
                                            <?php
                                            $result_homework = $controllers->get_data_where("homeworks", "`homework_status` = 'running'");
                                            if ($result_homework && $result_homework->num_rows > 0) {
                                                while ($row = $result_homework->fetch_assoc()) {
                                                    define("GET_HOMEWORK_ID", $row["homework_id"]);
                                                    echo '<option value="' . $row['homework_id'] . '">' . $row['homework_title'] . '</option>';
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="mb-3 me-4 pe-4">
                                        <select name="" id="" class="form-control me-4 pe-4">
                                            <option value="">Select the problem</option>
                                            <?php
                                            $result_problem = $controllers->get_data_where("homework_problems", "`homework_problem_status` = 'running'");
                                            if ($result_problem && $result_problem->num_rows > 0) {
                                                while ($row = $result_problem->fetch_assoc()) {
                                                    echo '<option value="' . $row['homework_problem_id'] . '">' . $row['homework_problem_name'] . '</option>';
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="mb-3 me-4 pe-4 code_editor_section">
                                        <div class="mt-2">
                                            <div class="row">
                                                <div class="col-8 mt-4 mb-5">
                                                    <div class="check_isset">
                                                    <?php
                                    echo    $output = $controllers->run_code(); // Assuming this function returns the JSON response
                                        // $output_decoded = json_decode($output, true);

                                        // $editor_code;
                                        // if (isset($_POST['editor_code'])) {

                                        //     $get_code = $_POST['editor_code'];


                                        

                                          
                                        // } else {
                                        //     $get_code = '';
                                        //     echo 'blank code';
                                        // }

                                        // echo $_POST['editor_code'];

                                        $get_code = '';

                                        ?>
                                                    </div>
                                                    <div class="code_section_info primary-color fw-bold mt-5">
                                                        Choose a language and write your code here
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <select name="language" class="mt-5 form-control" id="language" onchange="updateLanguage()">
                                                        <option value="" >Select Language</option>
                                                        <option value="python3" <?php 
                                                        if(isset($get_language) == "python3"){
                                                            echo "selected";
                                                        }
                                                        
                                                        ?> >Python 3</option>
                                                        <option value="c" <?php 
                                                        if(isset($get_language) == "c"){
                                                            echo "selected";
                                                        }
                                                        
                                                        ?> >C</option>
                                                        <option value="cpp" <?php 
                                                        if(isset($get_language) == "cpp"){
                                                            echo "selected";
                                                        }
                                                        
                                                        ?> >C++</option>
                                                        <option value="java" <?php 
                                                        if(isset($get_language) == "java"){
                                                            echo "selected";
                                                        }
                                                        
                                                        ?> >Java</option>
                                                        <option value="php" <?php 
                                                        if(isset($get_language) == "php"){
                                                            echo "selected";
                                                        }
                                                        
                                                        ?> >PHP</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="code_editor">
                                            <div id="editor"><?php
                                           
                                           if($get_code != ""){
                                            echo $get_code;
                                           }else{
                                            echo 'Write your code here. To write your code firstly the programming language from the choose select option
                                            ';
                                           }
                                           
                                            ?></div>
                                        </div>

                                        <?php

                                        // if(isset($_POST['language'])){
                                        //     $get_language = $_POST['language'];
                                        //     echo '
                                            
                                        //     <script>
                                        //     updateLanguage()
                                        //     </script>
                                            
                                        //     ';
                                        // }else{
                                        //     $get_language = "";
                                        // }

                                        ?>

                                        <textarea class="form-control d-none mt-4 pt-4" name="editor_code" id="editor_code"></textarea>
                                        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.9.4/ace.js" integrity="sha512-X+Op19uVlYfk3rjBDwbgOu+/bFz8RWoZG1Ch73+IUAkORNOKWcOOmUWicByeZH71mvYJ/7onbF5YJRrATrbyFQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->
                                        
                                        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.4.12/ace.js" integrity="sha512-ExJSN+QimtEA9CcfY0lh/4EexQwd/gHJjOkHRi5Wz9+QkGJ4PC2fFQv0XaDTY64X/gBrx2LlUHfs8OFNO91obCQ==" crossorigin="anonymous"></script> -->
                                        <script>
                                            // Initialize Ace editor
                                            var editor = ace.edit("editor");

                                            editor.session.setUseWrapMode(false);

                                            function updateLanguage() {
                                                var language = document.getElementById("language").value;

                                                switch (language) {
                                                    case "python3":
                                                        editor.session.setMode("ace/mode/python");
                                                        editor.setValue("# Write your python programming code here\n");
                                                        editor.gotoLine(2);
                                                        break;
                                                    case "c":
                                                    case "cpp":
                                                        editor.session.setMode("ace/mode/c_cpp");
                                                        editor.setValue("// Write your programming code here\n");
                                                        editor.gotoLine(2);
                                                        break;
                                                    case "java":
                                                        editor.session.setMode("ace/mode/java");
                                                        editor.setValue("// Write your Java programming code here\n");
                                                        editor.gotoLine(2);
                                                        break;
                                                    case "php":
                                                        editor.session.setMode("ace/mode/php");
                                                        editor.setValue("\<?php\n\n// Write your PHP programming code here\n\n\?>");
                                                        editor.gotoLine(3);
                                                        break;
                                                    default:
                                                        editor.session.setMode("");
                                                }
                                            }

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
                                        </script>
                                        <div class="language_check">
                                        <?php

                                        // if(isset($_POST['language'])){
                                        //     $get_language = $_POST['language'];
                                        //     echo '
                                            
                                        //     <script>
                                        //     updateLanguage()
                                        //     </script>
                                            
                                        //     ';
                                        // }else{
                                        //     $get_language = "";
                                        // }

?>
                                        </div>
                                    </div>
                                    <div class="mb-3 me-4 pe-4">
                                        <?php
                                        $controllers->homework_submit_show_input(
                                            '<input type="file" name="homework_files" class="form-control mt-4" id="homework_files">',
                                            '<input disabled type="file" name="homework_files" class="form-control mt-4" id="homework_files">'
                                        );
                                        ?>
                                    </div>
                                    <div class="mb-3 mt-4 pt-4">
                                        <?php
                                        $controllers->homework_submit_show_input(
                                            '<button type="submit" name="homework_submit" class="btn btn-outline-dark">Submit</button>',
                                            '<button title="The button is disabled " disabled type="submit" class="btn btn-outline-dark">Submit</button>'
                                        );
                                        ?>
                                    </div>
                                    <div class="show_output mt-4 bg-dark text-light p-4">

                                    <textarea name="input_data" class="form-control" rows="5" placeholder="Enter your input data here, each input on a new line"></textarea>

                                    <!-- <input type="text" class="form-control" placeholder="Enter Input (Optional)" name="input_data" id="input_data"> -->

                                        <?php

                                        // main code section

                                        
                                    // echo    $output = $controllers->run_code(); // Assuming this function returns the JSON response
                                    //     $output_decoded = json_decode($output, true);

                                    //     if ($output_decoded) {
                                    //         echo '<p>Output: ' . htmlspecialchars($output_decoded['output']) . '</p>';
                                    //         echo '<p>Error: ' . htmlspecialchars($output_decoded['error']) . '</p>';
                                    //         echo '<p>Status Code: ' . htmlspecialchars($output_decoded['statusCode']) . '</p>';
                                    //         echo '<p>Memory: ' . htmlspecialchars($output_decoded['memory']) . '</p>';
                                    //         echo '<p>CPU Time: ' . htmlspecialchars($output_decoded['cpuTime']) . '</p>';
                                    //         echo '<p>Compilation Status: ' . htmlspecialchars($output_decoded['compilationStatus']) . '</p>';
                                    //     } else {
                                    //         echo '<p>No output available</p>';
                                    //     }
                                        ?>
                                    </div>
                                    <div class="mb-3 mt-4 pt-4">
                                        <button type="submit" class="btn btn-outline-primary" name="test_code">Test code</button>
                                    </div>
                                    <div class="mb-3 mt-4 pt-4">
                                        <a href="/homework" class="nav-link">
                                            <button type="button" class="btn btn-sm btn-outline-dark">Back to Homeworks</button>
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
