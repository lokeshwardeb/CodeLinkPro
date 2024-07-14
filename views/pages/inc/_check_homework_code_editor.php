<div class="code_editor_main_section">
                                        <div class="mb-3 me-4 pe-4 code_editor_section">
                                            <div class="mt-2">
                                                <div class="row">
                                                    <div class="col-8">
                                                        <div class="code_section_info primary-color fw-bold mt-5">
                                                            Choose a language and write your code here
                                                        </div>
                                                    </div>
                                                    <div class="col-4">
                                                        <!-- <select name="language" class="mt-5 form-control" id="language" onchange="updateLanguage()">
                                                        <option value="">Select Language</option>
                                                        <option value="python3">Python 3</option>
                                                        <option value="c">C</option>
                                                        <option value="cpp">C++</option>
                                                        <option value="java">Java</option>
                                                        <option value="php">PHP</option>
                                                    </select> -->
                                                        <select name="language" class="mt-5 form-control" id="language"
                                                            onchange="updateLanguage()">
                                                            <option value="">Select Language</option>
                                                            <option value="python3" <?php

                                                            if($code_language == 'python3'){
                                                                echo 'selected';
                                                                echo ' ';
                                                               
                                                            }

                                                            if (isset($_POST['language'])) {
                                                                if ($_POST['language'] == 'python3') {
                                                                    echo 'selected';


                                                                }
                                                            }

                                                            ?>>Python 3</option>
                                                            <option value="c" <?php
                                                            

                                                            if($code_language == 'c'){
                                                                echo 'selected';
                                                                echo ' ';

                                                               
                                                            }



                                                            if (isset($_POST['language'])) {
                                                                if ($_POST['language'] == 'c') {
                                                                    echo 'selected';


                                                                }
                                                            }

                                                            ?>>C</option>
                                                            <option value="cpp" <?php

                                                            
                                                            if($code_language == 'cpp'){
                                                                echo 'selected';
                                                                echo ' ';

                                                               
                                                            }


                                                            if (isset($_POST['language'])) {
                                                                if ($_POST['language'] == 'cpp') {
                                                                    echo 'selected';


                                                                }
                                                            }

                                                            ?>>C++</option>
                                                            <option value="java" <?php
                                                            
                                                            if($code_language == 'java'){
                                                                echo 'selected';
                                                                echo ' ';

                                                                
                                                            }


                                                            if (isset($_POST['language'])) {
                                                                if ($_POST['language'] == 'java') {
                                                                    echo 'selected';


                                                                }
                                                            }

                                                            ?>>Java</option>
                                                            <option value="php" <?php
                                                            
                                                            if($code_language == 'php'){
                                                                echo 'selected';
                                                                echo ' ';

                                                               
                                                            }


                                                            if (isset($_POST['language'])) {
                                                                if ($_POST['language'] == 'php') {
                                                                    echo 'selected';


                                                                }
                                                            }

                                                            ?>>PHP</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="code_editor">

                                                <div id="editor"><?php

                                                if (isset($_POST['editor_code'])) {
                                                    echo htmlspecialchars($_POST['editor_code']);
                                                } else {
                                                    // echo 'To write a code at first select a language and then write your codes here !!';

                                                    $result_get_submitted_code = $controllers->get_data_where("homework_submission", "`homework_id` = '$homework_id' AND `homework_problem_id` = '$homework_problem_id'");


                                                    if($result_get_submitted_code){
                                                        if($result_get_submitted_code->num_rows > 0){
                                                            // that means the code is exists on db
                                                            while($row = $result_get_submitted_code->fetch_assoc()){
                                                                echo $row['homework_code'];
                                                            }
                                                        }else{
                                                            echo 'To write a code at first select a language and then write your codes here !!';
                                                        }
                                                    }else{
                                                        echo 'To write a code at first select a language and then write your codes here !!';
                                                    }


                                                }


                                                ?></div>
                                                <label for="editor" class="mt-5 ">Powered by <a
                                                        href="http://lokeshwardebportfolio.epizy.com" target="_blank"
                                                        class="">Lokeshwar Deb Protik</a></label>
                                            </div>
                                            <textarea class="form-control d-none mt-4 pt-4" name="editor_code"
                                                id="editor_code"></textarea>
                                            <script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.4.12/ace.js"
                                                integrity="sha512-ExJSN+QimtEA9CcfY0lh/4EexQwd/gHJjOkHRi5Wz9+QkGJ4PC2fFQv0XaDTY64X/gBrx2LlUHfs8OFNO91obCQ=="
                                                crossorigin="anonymous"></script>
                                            <script>
                                                // Initialize Ace editor
                                                var editor = ace.edit("editor");

                                                editor.setTheme("ace/theme/cobalt");

                                                editor.session.setUseWrapMode(false);


                                                function updateLanguage() {
                                                    var language = document.getElementById("language").value;

                                                    switch (language) {
                                                        case "python3":
                                                            editor.session.setMode("ace/mode/python");
                                                            editor.setValue("# Write your python programming code here");
                                                            editor.gotoLine(2);
                                                            break;
                                                        case "c":
                                                            editor.session.setMode("ace/mode/c_cpp");
                                                            editor.setValue("// Write your c programming code here");
                                                            editor.gotoLine(2);


                                                            break;
                                                        case "cpp":
                                                            editor.session.setMode("ace/mode/c_cpp");
                                                            editor.setValue("// Write your c++ programming code here");
                                                            editor.gotoLine(2);


                                                            break;
                                                        case "java":
                                                            editor.session.setMode("ace/mode/java");
                                                            editor.setValue("// Write your Java programming code here");
                                                            editor.gotoLine(2);


                                                            break;
                                                        case "php":
                                                            editor.session.setMode("ace/mode/php");
                                                            editor.setValue("<\?php\n\n// Write your php programming code here \n\n?\>");
                                                            editor.gotoLine(3);


                                                            break;
                                                        default:
                                                            editor.session.setMode("");
                                                    }
                                                }

                                                // second updateLanguage function (used for after test code post session)


                                                function updateLanguage_test_code() {
                                                    var language = document.getElementById("language").value;

                                                    switch (language) {
                                                        case "python3":
                                                            editor.session.setMode("ace/mode/python");
                                                            // editor.setValue("# Write your python programming code here");
                                                            // editor.gotoLine(2);
                                                            break;
                                                        case "c":
                                                            editor.session.setMode("ace/mode/c_cpp");
                                                            // editor.setValue("// Write your c programming code here");
                                                            // editor.gotoLine(2);


                                                            break;
                                                        case "cpp":
                                                            editor.session.setMode("ace/mode/c_cpp");
                                                            // editor.setValue("// Write your c++ programming code here");
                                                            // editor.gotoLine(2);


                                                            break;
                                                        case "java":
                                                            editor.session.setMode("ace/mode/java");
                                                            // editor.setValue("// Write your Java programming code here");
                                                            // editor.gotoLine(2);


                                                            break;
                                                        case "php":
                                                            editor.session.setMode("ace/mode/php");
                                                            // editor.setValue("// Write your php programming code here");
                                                            // editor.gotoLine(2);


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

                                                // Logging the final input value for debugging
                                                var finalInputValue = document.getElementById("editor_code").value;
                                                console.log("Final input value:", finalInputValue);
                                            </script>

                                            <?php

                                            if($code_language != ''){
                                                switch ($code_language) {
                                                    case 'python3':
                                                        echo '
                                                                
                                                    <script>
                                                    updateLanguage_test_code();
                                                    </script>
                                                    
                                                    ';
                                                    case 'c':
                                                        echo '
                                                                
                                                    <script>
                                                    updateLanguage_test_code();
                                                    </script>
                                                    
                                                    ';
                                                    case 'cpp':
                                                        echo '
                                                                
                                                    <script>
                                                    updateLanguage_test_code();
                                                    </script>
                                                    
                                                    ';
                                                    case 'java':
                                                        echo '
                                                                
                                                    <script>
                                                    updateLanguage_test_code();
                                                    </script>
                                                    
                                                    ';
                                                    case 'php':
                                                        echo '
                                                                
                                                    <script>
                                                    updateLanguage_test_code();
                                                    </script>
                                                    
                                                    ';

                                                }
                                            }

                                            if (isset($_POST['language'])) {
                                                switch ($_POST['language']) {
                                                    case 'python3':
                                                        echo '
                                                                
                                                    <script>
                                                    updateLanguage_test_code();
                                                    </script>
                                                    
                                                    ';
                                                    case 'c':
                                                        echo '
                                                                
                                                    <script>
                                                    updateLanguage_test_code();
                                                    </script>
                                                    
                                                    ';
                                                    case 'cpp':
                                                        echo '
                                                                
                                                    <script>
                                                    updateLanguage_test_code();
                                                    </script>
                                                    
                                                    ';
                                                    case 'java':
                                                        echo '
                                                                
                                                    <script>
                                                    updateLanguage_test_code();
                                                    </script>
                                                    
                                                    ';
                                                    case 'php':
                                                        echo '
                                                                
                                                    <script>
                                                    updateLanguage_test_code();
                                                    </script>
                                                    
                                                    ';

                                                }
                                            }

                                            ?>


                                        </div>

                                        <div class="test_code_section">
                                            <div class="mb-3 mt-4 pt-4">
                                                <button type="submit" class="btn btn-outline-primary"
                                                    name="test_code">Test code</button>
                                            </div>
                                        </div>

                                        <!-- past homework_file and submit btn placed here -->
                                        <!-- past homework_file and submit btn placed here -->

                                        <!-- <div class="test_code_section">
                                    
                                    
                                        <div class="mb-3 mt-4 pt-4">
                                        <button type="submit" class="btn btn-outline-primary" name="test_code">Test code</button>
                                    </div>
                                    </div> -->

                                        <div class="enter_input_section mb-4">
                                            <div class="mb-3 container mt-4 pt-4">
                                                <label for="input_data" class="mb-4 mt-4">Enter your input here (use it
                                                    if you have used the dynamic user input method on you code)
                                                    :</label>
                                                <textarea name="input_data"
                                                    placeholder="Enter your input here (if you have passed the input in the code) <?php
                                                    echo "\n\nNote : Press enter to give multiple inputs.\n\nHere is an example\n5\n6"
                                                    
                                                    ?>"
                                                    class="form-control" id="input_data" cols="30" rows="10"><?php

                                                    if (isset($_POST['input_data'])) {
                                                        echo $_POST['input_data'];
                                                    }


                                                    ?></textarea>
                                            </div>
                                        </div>
                                        
                                        <div class="show_output mt-4">
                                            <?php
                                            $output = $controllers->run_code();
                                            if (is_array($output)) {
                                                echo '<div class="output-section">';

                                                
                                                echo '

                                                <div class="output_label mt-4 pt-4 mb-4">Output : </div>
                                                
                                                <textarea disabled name="output"
                                                    placeholder="Output"
                                                    class="form-control mb-4 bg-dark text-light" id="output" cols="30" rows="10">'. $output['output'] .'</textarea>
                                                
                                                
                                                ';

                                                // echo '<p><strong>Output:</strong> ' . $output['output'] . '</p>';
                                                echo '<p><strong>Status Code:</strong> ' . $output['statusCode'] . '</p>';
                                                echo '<p><strong>Memory:</strong> ' . $output['memory'] . '</p>';
                                                echo '<p><strong>CPU Time:</strong> ' . $output['cpuTime'] . '</p>';
                                                echo '<p class="text-danger"><strong>Error:</strong> ' . $output['error'] . '</p>';
                                                echo '</div>';
                                            } else {
                                                echo '<div class="error-section mt-4 pt-4 mb-4 pb-4">';
                                                echo '<p>Error: ' . $output . '</p>';
                                                echo '</div>';
                                            }
                                            ?>

                                        </div>
                                    </div>