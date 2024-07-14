<?php

require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../models/models.php';

// require_once __DIR__ . '/../assets/js/alert.js';

// echo 'danger_alert'

// echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>';
// echo '<script src="/assets/js/alert.js"></script>';
// echo '<script src="' . __DIR__ . '/assets/js/alert.js"></script>';


class controllers extends models
{

    public function alert($alert_type, $alert_data)
    {
        if ($alert_type == 'success') {
            return ('<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success !!</strong> ' . $alert_data . '
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>');
        }
        if ($alert_type == 'danger') {
            return ('<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error !!</strong> ' . $alert_data . '
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>');
        }
    }

    public function update_problem_names()
    {

    }

    public function homework_submit_show_input($get_input_1, $get_input_2)
    {
        $result_homework = $this->get_data_where("homeworks", "`homework_status` = 'running'");
        $result_problem = $this->get_data_where("homework_problems", "`homework_problem_status` = 'running'");


        if ($result_homework->num_rows > 0) {
            if ($result_problem->num_rows > 0) {
                echo $get_input_1;
            } else {
                // that means there are no running homeworks in homework_problems table
                echo $get_input_2;

            }
        } else {
            // that means there are no running homeworks homeworks table 
            echo $get_input_2;
        }


    }

    public function connect_pagination()
    {

        // Define how many results per page
        $results_per_page = 5;

        // Find out the number of results stored in database
        $sql = "SELECT COUNT(*) AS total FROM homeworks";
        $result = $this->make_query($sql);

        $row = $result->fetch_assoc();
        $total_results = $row['total'];

        // Determine the total number of pages available
        $total_pages = ceil($total_results / $results_per_page);

        // Determine which page number visitor is currently on
        if (!isset($_GET['page'])) {
            $page = 1;
        } else {
            $page = $_GET['page'];
        }

        // Determine the starting limit number
        $starting_limit = ($page - 1) * $results_per_page;

    }

    public function pagination()
    {

        // Define how many results per page
        $results_per_page = 5;

        // Find out the number of results stored in database
        $sql = "SELECT COUNT(*) AS total FROM homeworks";
        $result = $this->make_query($sql);

        // $result = $models->make_query($sql);

        $row = $result->fetch_assoc();
        $total_results = $row['total'];

        // Determine the total number of pages available
        $total_pages = ceil($total_results / $results_per_page);

        // Determine which page number visitor is currently on
        if (!isset($_GET['page'])) {
            $page = 1;
        } else {
            $page = $_GET['page'];
        }

        // Determine the starting limit number
        $starting_limit = ($page - 1) * $results_per_page;

        // // Retrieve selected results from database
// $sql = "SELECT * FROM homeworks LIMIT $starting_limit, $results_per_page";
// $result = $models->make_query($sql);

        for ($page = 1; $page <= $total_pages; $page++) {
            echo '
    <li class="page-item"><a class="page-link" href="?page=' . $page . '">' . $page . '</a></li>
    ';
            // echo '
            // <a href="?page='. $page .'"> '. $page .' </a>
            // ';
        }


        return $total_pages;

    }


    // jai sri ganesh

    public function run_code()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['test_code'])) {
            $code = $_POST['editor_code'];
            $language = (string) $_POST['language'];
            $input_data = isset($_POST['input_data']) ? $_POST['input_data'] : '';

            $clientId = 'bb3163d64db80aa87f149b51a3a7ec2a';
            $clientSecret = '99043e289eabc79837025889a1298b61cf60324a1a0846382e5551586ec918ef';
            $url = 'https://api.jdoodle.com/v1/execute';

            $versionIndex = '0'; // Default version index
            switch ($language) {
                case "python3":
                    $versionIndex = "3";
                    break;
                case "c":
                case "cpp":
                    $versionIndex = "5";
                    break;
                case "java":
                    $versionIndex = "3";
                    break;
                case "php":
                    $versionIndex = "4";
                    break;
            }

            $data = [
                "clientId" => $clientId,
                "clientSecret" => $clientSecret,
                "script" => $code,
                "language" => $language,
                "versionIndex" => $versionIndex,
                "stdin" => $input_data
            ];

            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // For testing purposes, disable SSL verification
            $result = curl_exec($ch);

            if (curl_errno($ch)) {
                die('Error: ' . curl_error($ch));
            }

            curl_close($ch);

            // Decode JSON response
            $resultArray = json_decode($result, true);

            // Check if decoding was successful and return the appropriate values
            if ($resultArray) {
                $output = [
                    'output' => htmlspecialchars($resultArray['output'] ?? ''),
                    'statusCode' => htmlspecialchars($resultArray['statusCode'] ?? ''),
                    'memory' => htmlspecialchars($resultArray['memory'] ?? ''),
                    'cpuTime' => htmlspecialchars($resultArray['cpuTime'] ?? ''),
                    'error' => htmlspecialchars($resultArray['error'] ?? '')
                ];

                return $output;
            } else {
                return 'Failed to decode JSON response';
            }
        }
    }



    // public function run_code()
    // {
    //     if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['test_code'])) {
    //         $code = $_POST['editor_code'];
    //         $language = (string) $_POST['language'];
    //         $input_data = isset($_POST['input_data']) ? $_POST['input_data'] : '';

    //         $clientId = 'bb3163d64db80aa87f149b51a3a7ec2a';
    //         $clientSecret = '99043e289eabc79837025889a1298b61cf60324a1a0846382e5551586ec918ef';
    //         $url = 'https://api.jdoodle.com/v1/execute';

    //         $versionIndex = '0'; // Default version index
    //         switch ($language) {
    //             case "python3":
    //                 $versionIndex = "3";
    //                 break;
    //             case "c":
    //             case "cpp":
    //                 $versionIndex = "5";
    //                 break;
    //             case "java":
    //                 $versionIndex = "3";
    //                 break;
    //             case "php":
    //                 $versionIndex = "4";
    //                 break;
    //         }

    //         $data = [
    //             "clientId" => $clientId,
    //             "clientSecret" => $clientSecret,
    //             "script" => $code,
    //             "language" => $language,
    //             "versionIndex" => $versionIndex,
    //             "stdin" => $input_data
    //         ];

    //         $ch = curl_init($url);
    //         curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    //         curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
    //         curl_setopt($ch, CURLOPT_POST, true);
    //         curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    //         curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // For testing purposes, disable SSL verification
    //         $result = curl_exec($ch);

    //         if (curl_errno($ch)) {
    //             die('Error: ' . curl_error($ch));
    //         }

    //         curl_close($ch);

    //         // $result;

    //         return htmlspecialchars($result);
    //     }
    // }


    //     // test_run
//     public function run_code()
// {
//     // Check if the form was submitted
//     if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['test_code'])) {
//         // Get the code and language from the form
//         $code = $_POST['editor_code'];
//         $language = (string) $_POST['language'];
//         $input_data = isset($_POST['input_data']) ? $_POST['input_data'] : '';

    //         // Jdoodle API credentials and endpoint
//         $clientId = 'bb3163d64db80aa87f149b51a3a7ec2a';
//         $clientSecret = '99043e289eabc79837025889a1298b61cf60324a1a0846382e5551586ec918ef';
//         $url = 'https://api.jdoodle.com/v1/execute';

    //         // Determine the version index based on the selected language
//         $versionIndex = '0'; // Default version index
//         switch ($language) {
//             case "python3":
//                 $versionIndex = "3";
//                 break;
//             case "c":
//             case "cpp":
//                 $versionIndex = "5";
//                 break;
//             case "java":
//                 $versionIndex = "3";
//                 break;
//             case "php":
//                 $versionIndex = "4";
//                 break;
//         }

    //         // Prepare the data to send to Jdoodle API
//         $data = [
//             "clientId" => $clientId,
//             "clientSecret" => $clientSecret,
//             "script" => $code,
//             "language" => $language,
//             "versionIndex" => $versionIndex,
//             "stdin" => $input_data, // Placeholder for input, can be filled below
//         ];

    //         // // Check if input is provided in the form submission
//         // if (isset($_POST['input_data']) && $_POST['input_data'] != '') {
//         //   echo  $inputData = $_POST['input_data'];
//         //     $data['stdin'] = $inputData;
//         // }

    //         // Set up the request options
//         $options = [
//             'http' => [
//                 'header' => "Content-Type: application/json\r\n",
//                 'method' => 'POST',
//                 'content' => json_encode($data),
//             ],
//         ];

    //         // Create a stream context for the API request
//         $context = stream_context_create($options);
//         // Make the API request
//         $result = file_get_contents($url, false, $context);

    //         // Handle errors if the API request fails
//         if ($result === FALSE) {
//             die('Error: Unable to fetch data from Jdoodle API');
//         }

    //         // Return the API response as JSON
//         return $result;
//     }
// }



    // public function run_code()
    // {
    //     // run_code.php

    //     if (isset($_POST['test_code'])) {

    //         if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //             $code = $_POST['editor_code'];
    //           echo  $language = (string) $_POST['language'];

    //             $clientId = 'bb3163d64db80aa87f149b51a3a7ec2a';
    //             $clientSecret = '99043e289eabc79837025889a1298b61cf60324a1a0846382e5551586ec918ef';
    //             // $clientId = 'YOUR_JDOODLE_CLIENT_ID';
    //             // $clientSecret = 'YOUR_JDOODLE_CLIENT_SECRET';
    //             $url = 'https://api.jdoodle.com/v1/execute';

    //             $versionIndex = '0'; // Default version index
    //             switch ($language) {
    //                 case "python3":
    //                     $versionIndex = "3";
    //                     break;
    //                 case "c":
    //                     $versionIndex = "5";
    //                     break;
    //                 case "cpp":
    //                     $versionIndex = "5";
    //                     break;
    //                 case "java":
    //                     $versionIndex = "3";
    //                     break;
    //                 case "php":
    //                     $versionIndex = "4";
    //                     break;
    //             }

    //             echo $versionIndex;

    //             $data = [

    //                 "clientId" => $clientId,
    //                 "clientSecret" => $clientSecret,
    //                 "script" => $code,
    //                 "language" => $language,
    //                 "versionIndex" => $versionIndex
    //             ];

    //             $options = [
    //                 'http' => [
    //                     'header' => "Content-Type: application/json\r\n",
    //                     'method' => 'POST',
    //                     'content' => json_encode($data),
    //                 ],
    //             ];

    //             $context = stream_context_create($options);
    //             $result = file_get_contents($url, false, $context);

    //             // file_get_contents()

    //             if ($result === FALSE) {
    //                 die('Error');
    //             }

    //             return htmlspecialchars($result);

    //             // echo '<pre>' . htmlspecialchars($result) . '</pre>';
    //         }
    //     }

    // }

    // jai sri ganesh

    public function submit_homework()
    {
        if (isset($_POST['homework_submit'])) {
            $editor_code = $this->pure_data($_POST['editor_code']);
            $language = $_POST['language'];
            $homework_id = $this->pure_data($_POST['homework_id']);
            $homework_problem_id = $this->pure_data($_POST['homework_problem_id']);
            $submitted_user_id = $_SESSION['user_id'];
            $homework_files = $_FILES['homework_files'];
            $homework_files_upload_dir = __DIR__ . '/../assets/uploads/homework_submits/';
            // $homework_files_upload_dir =  '/assets/uploads/homework_submits/';
            $get_username = $_SESSION['username'];
            $pure_username = str_replace(" ", "_", $get_username);
            $cus_upload_dir = $homework_files_upload_dir . $pure_username . '/homework_id_' . $homework_id . '/problem_id_' . $homework_problem_id;

            // check if the homework id and homework problem is not blank

            if ($homework_id == '') {
                echo '
                <script>
                danger_alert("Error !!", "You have to select a homework !! Homework cannot be blank !!")
                </script>
                ';
                return;
            }

            if ($homework_problem_id == '') {
                echo '
                <script>
                danger_alert("Error !!", "You have to select a homework problem !! Homework problem cannot be blank !!");
                </script>
                ';
                return;
            }

            // // Create the directory if it doesn't exist
            // if (!is_dir($cus_upload_dir)) {
            //     mkdir($cus_upload_dir, 0777, true);
            // }

            $check_homework_submission = $this->get_data_where("homework_submission", "`homework_id` = '$homework_id' AND `homework_problem_id` = '$homework_problem_id'");

            if ($check_homework_submission) {
                if ($check_homework_submission->num_rows == 1) {
                    echo '
                    <script>
                    danger_alert("Error !!", "Your homework is already submitted !! You cannot resubmit your submitted homework !!");
                    </script>
                    ';

                    return;

                    // return;
                    // exit;
                    // exit("error");
                }
            }

            //  check if the data is already exists on the database

            $result_check_homework_submission = $this->get_data_where("homework_submission", "`homework_id` = '$homework_id' AND `homework_problem_id` = '$homework_problem_id' AND `submitted_user_id` = '$submitted_user_id'");

            if ($result_check_homework_submission) {
                if ($result_check_homework_submission->num_rows > 0) {
                    // that means the data and the homework submission already exists on the db
                    echo '
                    <script>
                    danger_alert("Error !!", "Your homework is already submitted and exists on records !! You cannot resubmit a homework which has been already submitted !!")
                    </script>
                    ';
                    return;
                }
            }




            // Insert code submission
            $result_insert_code = $this->insert("homework_submission", "`homework_id`, `homework_problem_id`, `submitted_user_id`, `homework_code`, `code_language`", "'$homework_id', '$homework_problem_id', '$submitted_user_id', '$editor_code', '$language'");
            if (!$result_insert_code) {
                echo '<script>danger_alert("Error !!", "The homework info cannot be submitted perfectly !! Please contact the developer as soon as possible !!");</script>';
                return;
            }

            // Get the auto-increment ID for the homework submission
            $result_check_result_get_submission_id = $this->get_next_auto_increment_id_value("homework_submission");
            $row = $result_check_result_get_submission_id->fetch_assoc();
            $result_get_submission_id = $row['AUTO_INCREMENT'];

            // echo '<pre>';

            // print_r($_FILES['homework_files']);

            // echo '</pre>';

            // if(isset($_FILES['homework_files']) && $_FILES['homework_files'] != ''){
            //     echo 'file set';
            // }

            // foreach ($homework_files['name'] as $key => $value){
            //     if($homework_files['name'][$key] == ''){
            //         echo 'homework blank';
            //     }
            // }

            // die();

            // Process each file
            foreach ($homework_files['name'] as $key => $value) {
                // $homework_file_name = $homework_files['name'][$key];
                $check_name = $homework_files['name'][$key];
                $problem_no_count = (string) $key + 1;
                $homework_file_name = 'problem_no_' . $problem_no_count;
                $pure_homework_file_name = str_replace(" ", "_", $homework_file_name);
                $homework_tmp_name = $homework_files['tmp_name'][$key];
                $homework_file_ext = pathinfo($check_name, PATHINFO_EXTENSION);
                // $final_upload_dir = $cus_upload_dir . '/' . $key . '_' . $pure_homework_file_name;
                $final_upload_dir = $cus_upload_dir . '/' . $key . '_' . $homework_file_name . '.' . $homework_file_ext;
                // die();


                if ($check_name == '') {
                    // that means the check name is blank and the file is not selected
                    echo '
                    <script>
                    success_alert("Success !!", "The homework has been submitted successfully without addtional files !!");
                    </script>
                    ';
                } else {
                    // that means the check name is not blank and it should create the directories and upload the file uploading process and continue the homework submitting process

                    // Create the directory if it doesn't exist
                    if (!is_dir($cus_upload_dir)) {
                        mkdir($cus_upload_dir, 0777, true);
                    }

                    if ($homework_file_ext == 'py' || $homework_file_ext == 'c' || $homework_file_ext == 'cpp' || $homework_file_ext == 'java' || $homework_file_ext == 'php' || $homework_file_ext == 'jpg' || $homework_file_ext == 'jpeg' || $homework_file_ext == 'png') {
                        // that means the file type are supported and this is exist on the list

                        // Move the uploaded file
                        if (move_uploaded_file($homework_tmp_name, $final_upload_dir)) {
                            // Insert file info into the database
                            $result_insert_homework_files = $this->insert("homework_submission_files", "`homework_submission_id`, `homework_file_name`, `homework_id`", "'$result_get_submission_id', '$pure_homework_file_name', '$homework_id'");
                            if (!$result_insert_homework_files) {
                                echo '<script>danger_alert("Error !!", "Failed to record file submission in the database !!");</script>';
                                return;
                            }
                            echo '<script>success_alert("Success !!", "Your homework has been submitted successfully !!");</script>';
                        } else {
                            echo '<script>danger_alert("Error !!", "There was an error while submitting your homework !!");</script>';
                            // return;
                        }
                    } else {
                        // that means the file and the file extension is not supported 
                        echo '
    
                    <script>
                    danger_alert("File type are not supported !!", "Please upload python, c, cpp, java, php, jpg, jpeg, png type files !! Other files are not supported !!"); 
                    </script>
    
    
                 ';
                        // return;
                    }

                }

            }



            // // Process each file
            // foreach ($homework_files['name'] as $key => $value) {
            //     // $homework_file_name = $homework_files['name'][$key];
            //     $check_name = $homework_files['name'][$key];
            //     $problem_no_count = (string) $key + 1;
            //     $homework_file_name = 'problem_no_' . $problem_no_count;
            //     $pure_homework_file_name = str_replace(" ", "_", $homework_file_name);
            //     $homework_tmp_name = $homework_files['tmp_name'][$key];
            //     $homework_file_ext = pathinfo($check_name, PATHINFO_EXTENSION);
            //     // $final_upload_dir = $cus_upload_dir . '/' . $key . '_' . $pure_homework_file_name;
            //     $final_upload_dir = $cus_upload_dir . '/' . $key . '_' . $homework_file_name . '.' . $homework_file_ext;
            //     // die();



            //     if($homework_file_ext == 'python' || $homework_file_ext == 'c' || $homework_file_ext == 'cpp' || $homework_file_ext == 'java' || $homework_file_ext == 'php' || $homework_file_ext == 'jpg' || $homework_file_ext == 'jpeg' || $homework_file_ext == 'png'){
            //         // that means the file type are supported and this is exist on the list

            //         // Move the uploaded file
            //     if (move_uploaded_file($homework_tmp_name, $final_upload_dir)) {
            //         // Insert file info into the database
            //         $result_insert_homework_files = $this->insert("homework_submission_files", "`homework_submission_id`, `homework_file_name`, `homework_id`", "'$result_get_submission_id', '$pure_homework_file_name', '$homework_id'");
            //         if (!$result_insert_homework_files) {
            //             echo '<script>danger_alert("Error !!", "Failed to record file submission in the database !!");</script>';
            //             return;
            //         }
            //         echo '<script>success_alert("Success !!", "Your homework has been submitted successfully !!");</script>';
            //     }elseif($homework_file_name !=''){
            //         echo '
            //         <script>
            //         danger_alert("Error !", "file is empty");
            //         </script>
            //         ';
            //     } else {
            //         echo '<script>danger_alert("Error !!", "There was an error while submitting your homework !!");</script>';
            //     }
            //     }else{
            //         // that means the file and the file extension is not supported 
            //         echo '

            //         <script>
            //         danger_alert("File type are not supported !!", "Please upload python, c, cpp, java, php, jpg, jpeg, png type files !! Other files are not supported !!"); 
            //         </script>


            //         ';
            //     }


            // }

            // Validate language selection
            if (empty($language)) {
                echo '<script>danger_alert("Error !!", "You have to choose a language and write your code to submit the homework !!");</script>';
            }
        }
    }

    public function change_a_user_role(){
        if(isset($_POST['change_user_role_btn'])){
            $user_id = $this->pure_data($_POST['user_id']);
            $change_user_role = $this->pure_data($_POST['change_user_role']);

            $result_change_user_role = $this->get_data_where("users", "`user_id` = '$user_id'");
            if($result_change_user_role){
                if($result_change_user_role->num_rows > 0){
                    $result_update_change_user_name = $this->update_where("users", "`user_role` = '$change_user_role'", "`user_id` = '$user_id'");
                    
                    if($result_update_change_user_name){
                        echo '
                        <script>
                        success_alert("Success !!", "User role has been changed successfully !!");
                        </script>
                        ';
                    }else{
                        echo '
                        <script>
                        danger_alert("Danger !!", "User role cannot been changed successfully !!");
                        </script>
                        ';
                    }
                }
            }

        }
        


    }

    public function check_admin_access(){
        $user_role = $_SESSION['user_role'];

        if($user_role != 'admin'){
            echo '
            <script>
            location.href = "/dashboard";
            </script>
            ';
        }
        
        // $result_check_user_admin_access = $this->get_data_where("users", "`user_id` = '$user_id'");

        // if($result_check_user_admin_access){
        //     if($result_check_user_admin_access->num_rows > 0){
        //         while($row = $result_check_user_admin_access->fetch_assoc()){
        //             $admin_access = $row['user_role'];
        //             if($admin_access == $_SESSION['use_role'] && $admin_access != 'admin')
        //         }
        //     }
        // }
        
    }

    public function check_block_user(){
        $user_id = $_SESSION['user_id'];

        $result_check_user_block_status = $this->get_data_where("users", "`user_id` = '$user_id'");

        if($result_check_user_block_status){
            if($result_check_user_block_status->num_rows){
                while($row = $result_check_user_block_status->fetch_assoc()){
                    $user_block_status = $row['user_block_status'];
                   
                }
              
            }
        }

        if($user_block_status == 'user_blocked'){
            echo '
            <script>
            location.href = "/user_blocked"
            </script>
            ';
        }
        
    }

    public function block_and_unblock_user(){
        if(isset($_POST['block_user'])){
            $user_id = $this->pure_data($_POST['user_id']);

            $result_block_user = $this->update_where("users", "`user_block_status` = 'user_blocked'", "`user_id` = '$user_id'");

            if($result_block_user){
                echo '
                <script>
                success_alert("Success !!", "The user has been blocked successfully !!");
                </script>
                ';
            }else{
                echo '
                <script>
                danger_alert("Error !!", "The user has not been blocked successfully !!");
                </script>
                ';
            }
        }

        if(isset($_POST['unblock_user'])){
            $user_id = $this->pure_data($_POST['user_id']);

            $result_block_user = $this->update_where("users", "`user_block_status` = ''", "`user_id` = '$user_id'");

            if($result_block_user){
                echo '
                <script>
                success_alert("Success !!", "The user has been unblocked successfully !!");
                </script>
                ';
            }else{
                echo '
                <script>
                danger_alert("Error !!", "The user has not been unblocked successfully !!");
                </script>
                ';
            }
        }
    }


    public function check_submitted_homework()
    {
        if (isset($_POST['check_submitted_homework'])) {
            $editor_code = $this->pure_data($_POST['editor_code']);
            $language = $_POST['language'];
            $homework_id = $this->pure_data($_POST['homework_id']);
            $homework_problem_id = $this->pure_data($_POST['homework_problem_id']);
            $homework_inspection_result = $this->pure_data($_POST['homework_inspection_result']);
            $wrong_solution_reason = $this->pure_data($_POST['wrong_solution_reason']);
            $submitted_user_id = $this->pure_data($_POST['submitted_user_id']);

        //   die();
            // $submitted_user_id = $_SESSION['user_id'];
            
            //  check if the data is already exists on the database

            // $result_check_homework_submission = $this->get_data_where("homework_submission", "`homework_id` = '$homework_id' AND `homework_problem_id` = '$homework_problem_id' AND `submitted_user_id` = '$submitted_user_id'");

            // if ($result_check_homework_submission) {
            //     if ($result_check_homework_submission->num_rows < 0) {
            //         // that means the data and the homework submission already exists on the db
            //         echo '
            //         <script>
            //         danger_alert("Error !!", "Your homework is already submitted and exists on records !! You cannot resubmit a homework which has been already submitted !!")
            //         </script>
            //         ';
            //         return;
            //     }
            // }

            $result_update_check_homework = $this->update_where("homework_submission", "`check_submitted_homework_status` = 'checked', `homework_inspection_result` = '$homework_inspection_result', `wrong_solution_reason` = '$wrong_solution_reason'", "`homework_id` = '$homework_id' AND `homework_problem_id` = '$homework_problem_id' AND `submitted_user_id` = '$submitted_user_id'");

            if($result_update_check_homework){
                echo '<script>success_alert("Success !!", "The submitted homework checkings has been updated successfully !!");</script>';
            }else{
                echo '<script>danger_alert("Error !!", "The submitted homework checkings cannot been updated successfully !! !! Please contact the developer as soon as possible !!");</script>';
            }




            // // Insert code submission
            // $result_insert_code = $this->insert("homework_submission", "`homework_id`, `homework_problem_id`, `submitted_user_id`, `homework_code`, `code_language`", "'$homework_id', '$homework_problem_id', '$submitted_user_id', '$editor_code', '$language'");
            // if (!$result_insert_code) {
            //     echo '<script>danger_alert("Error !!", "The homework info cannot be submitted perfectly !! Please contact the developer as soon as possible !!");</script>';
            //     return;
            // }

            // // Get the auto-increment ID for the homework submission
            // $result_check_result_get_submission_id = $this->get_next_auto_increment_id_value("homework_submission");
            // $row = $result_check_result_get_submission_id->fetch_assoc();
            // $result_get_submission_id = $row['AUTO_INCREMENT'];

            

            // Validate language selection
            if (empty($language)) {
                echo '<script>danger_alert("Error !!", "You have to choose a language and write your code to submit the homework !!");</script>';
            }
        }
    }


    // public function submit_homework()
    // {
    //     if (isset($_POST['homework_submit'])) {
    //          $editor_code = $this->pure_data($_POST['editor_code']);

    //          $language = $_POST['language'];
    //          $homework_id = $this->pure_data($_POST['homework_id']);
    //          $homework_problem_id = $this->pure_data($_POST['homework_problem_id']);
    //          $submitted_user_id = $_SESSION['user_id'];

    //          $homework_files = $_FILES['homework_files'];
    //         //  $homework_files_tmp_name = 

    //         // $homework_files_upload_dir = __DIR__ . '/assets/uploads/homework_submits/';
    //         $homework_files_upload_dir =  '/assets/uploads/homework_submits/';



    //         $get_username = $_SESSION['username'];

    //         $pure_username = str_replace(" ", "_", $get_username);

    //         $cus_upload_dir = $homework_files_upload_dir . $pure_username . '/homework_id_' . $homework_id . '/problem_id_' . $homework_problem_id;



    //         $result_insert_code = $this->insert("homework_submission", "`homework_id`, `homework_problem_id`, `submitted_user_id`, `homework_code`", "'$homework_id', '$homework_problem_id', '$submitted_user_id', '$editor_code'");

    //         if(!$result_insert_code){
    //             echo '

    //             <script>
    //             danger_alert("Error !!", "The homework info cannot be submitted perfectly !! Please contact to the developer as soon as possible !!");
    //             </script>


    //             ';
    //         }

    //         // homework_submission_id
    //         // echo "<pre>";
    //         // print_r($homework_files);
    //         // echo "</pre>";

    //         // die();
    //         foreach ($homework_files['name'] as $key => $value) {

    //              $result_check_result_get_submission_id = $this->get_next_auto_increment_id_value("homework_submission");

    //              while($row = $result_check_result_get_submission_id->fetch_assoc()){
    //                 $result_get_submission_id = $row['AUTO_INCREMENT'];
    //              }


    //             // $homework_submission_id = $homework_problem_id;

    //             $homework_file_name = $homework_files['name'][$key];
    //             $pure_homework_file_name = str_replace(" ", "_", $homework_file_name);
    //           $homework_tmp_name = $homework_files['tmp_name'][$key];

    //             $final_upload_dir = $cus_upload_dir . '/' . $key . $pure_homework_file_name;




    //             // die();

    //             $result_insert_homework_files = $this->insert("homework_submission_files", "`homework_submission_id`, `homework_file_name`", "'$result_get_submission_id', '$pure_homework_file_name'");



    //             if(move_uploaded_file($homework_tmp_name, $final_upload_dir)){
    //                 echo '

    //                 <script>
    //                 success_alert("Success !!", "Your homework has been submitted successfully !!");
    //                 </script>


    //                 ';
    //             }else{
    //                 echo '

    //                 <script>
    //                 danger_alert("Error !!", "There was something error while submiting your homework !!");
    //                 </script>


    //                 ';
    //             }

    //             if($result_insert_homework_files){
    //                 // if(move_uploaded_file($homework_files['tmp_name'][$key], $final_upload_dir)){
    //                 //     echo '

    //                 //     <script>
    //                 //     success_alert("Success !!", "Your homework has been submitted successfully !!");
    //                 //     </script>


    //                 //     ';
    //                 // }else{
    //                 //     echo '

    //                 //     <script>
    //                 //     danger_alert("Error !!", "There was something error while submiting your homework !!");
    //                 //     </script>


    //                 //     ';
    //                 // }
    //             }




    //             // echo $homework_files['tmp_name'];

    //             // echo $homework_files['name'][$key];
    //             // echo $homework_files['tmp_name'][$key];

    //             // echo $value[$key]['name'][$key];


    //         // // homework_submission_id
    //         // echo "<pre>";
    //         // print_r($homework_files['tmp_name'][0]);
    //         // echo "</pre>";

    //         }



    //         if(isset($_POST['language']) && $_POST['language'] != ''){
    //             // echo "language is set . language is : " . $_POST['language'];







    //             // $result_homework_code_insert = $this->insert("homework_submission", "`homework_code`", "'$editor_code'");

    //             // if($result_homework_code_insert){
    //             //     echo '

    //             //     <script>
    //             //     success_alert("Success !!", "Your code has been inserted successfully !!");
    //             //     </script>

    //             //     ';
    //             // }

    //             // echo 'the code is : <textarea>'. htmlspecialchars($editor_code) .'</textarea>';

    //         }else{
    //             echo "language is not set";
    //             echo '

    //             <script>

    //             danger_alert("Error !!", "You have to choose a language and write your code to submit the homework !!");

    //             </script>

    //             ';

    //         }
    //     }
    // }

    // the testing

    public function homework_details_update()
    {
        if (isset($_POST['update_homework_details'])) {
            $homework_id = $this->pure_data($_POST['homework_id']);
            $homework_title = $this->pure_data($_POST['homework_title']);
            $homework_status = $this->pure_data($_POST['homework_status']);
            $homework_files = $_FILES['homework_files']['name'];
            $homework_files_tmp_name = $_FILES['homework_files']['tmp_name'];
            $homework_submission_datetime = $this->pure_data($_POST['homework_submission_datetime']);

            $homework_file_ext = pathinfo($homework_files, PATHINFO_EXTENSION);

            // die();

            if (isset($homework_files) && $homework_files != '') {

                if ($homework_file_ext != 'pdf') {
                    // that means the file is not pdf so that it will stop the process and return as it only uploads pdf files

                    echo '
                    <script>
                    danger_alert("File is not supported !!", "You can only upload pdf files only !! Other files are not supported !!");
                    </script>
                    ';

                    return;

                }

                // die();

                $get_username = $_SESSION['username'];

                $pure_username = str_replace(" ", "_", $get_username);

                $upload_dir = __DIR__ . '/../assets/uploads/homeworks/' . $pure_username . '/';

                // __DIR__ . '/../assets/uploads/homework_submits/';
                if (!file_exists($upload_dir)) {
                    // if the directory is not exists then create the directory
                    mkdir($upload_dir, 0777, true);
                    // mkdir()
                }

                $old_pure_file_name = str_replace(" ", "_", $homework_files);

                $pure_file_name = str_replace(" ", "_", $homework_title);

                $new_file_name = 'homework_' . $homework_id . '_' . $pure_file_name . '_' . '_' . $old_pure_file_name;
                // $new_file_name = 'hw_id_' . $homework_id . '_hw_title_' . $pure_file_name . '_' . 'hw_file_name_' . $old_pure_file_name;

                // $db_insert_file_name = $pure_username . $new_file_name;

                $result_user_name = $this->update_where("homeworks", "`user_name` = '$pure_username'", "`homework_id` = '$homework_id'");

                // user_name


                // update the file name

                $result_update_file_name = $this->update_where("homeworks", "`homework_file_name` = '$new_file_name'", "`homework_id` = '$homework_id'");

                if ($result_update_file_name) {
                    echo '
                    <script>
                    success_alert("Success !!", "File name has been updated successfully !!");
                    </script>
                    ';
                }

                // upload the file


                $final_upload_dir = $upload_dir . $new_file_name;

                if (move_uploaded_file($homework_files_tmp_name, $final_upload_dir)) {
                    echo '
                    <script>
                    success_alert("Success !!", "Homework has been updated with file successfully !!");
                    </script>
                    ';
                } else {
                    echo '
                    <script>
                    danger_alert("Error !!", "Homework has not been updated with file successfully !!");
                    </script>
                    ';
                }

                // // check if the filename already exists on database
                // $result_check_file_name = $this->get_data_where("homeworks", "`homework_file_name` = '$new_file_name' AND `homework_id` = '$homework_id'");

                // if($result_check_file_name){
                //     if($result_check_file_name->num_rows > 0){
                //         // that means filename is exists on database and it should be update on it
                //         $result_update_file_name = $this->update_where("homeworks", "`homework_file_name` = '$new_file_name'", "`homework_id` = '$homework_id'");
                //     }

                //     // else{
                //     //     // that means the filename is not exists on database it should be insert on it

                //     //     // $result_insert_file_name = $this->insert("homeworks", "`homework_file_name`", "'$new_file_name'");

                //     // }
                // }






                // die();
                // exit;

                // add the filename on database
                // $result_add_file_name = $this->insert();


                // echo 'homework_file set';
            } else {
                // echo 'homework file is blank';
            }

            // die();

            // Check the problem count for the given homework ID
            $result_check_problem_count = $this->get_data_where("homeworks", "`homework_id` = '$homework_id'");

            if ($result_check_problem_count) {
                $row = $result_check_problem_count->fetch_assoc();
                $problems_count = $row['problems_count'];

            } else {
                echo '<script>danger_alert("Error !!", "Invalid homework ID.");</script>';
                return;
            }

            // Update homework problems
            for ($i = 1; $i <= $problems_count; $i++) {

                $set_homework_name = 'homework_problem_name_' . $i;
                if (isset($_POST[$set_homework_name])) {
                    $homework_id;
                    $set_homework_problem_id = 'homework_problem_id_' . $i;
                    $homework_problem_id = $this->pure_data($_POST[$set_homework_problem_id]);

                    $homework_problem_name = $this->pure_data($_POST[$set_homework_name]);
                    $result_problems_update = $this->update_where("homework_problems", "`homework_problem_name` = '$homework_problem_name', `homework_problem_status` = '$homework_status'", "`homework_problem_id` = '$homework_problem_id'");

                    if ($result_problems_update) {
                        echo '<script>success_alert("Success !!", "Homework Problem has been updated successfully !!");</script>';
                    } else {
                        echo '<script>danger_alert("Error !!", "Failed to update Homework Problem.");</script>';
                    }
                }
            }

            // Update homework details
            $result_update_homework_details = $this->update_where("homeworks", "`homework_title` = '$homework_title', `homework_status` = '$homework_status', `homework_submission_datetime` = '$homework_submission_datetime'", "`homework_id` = '$homework_id'");

            if ($result_update_homework_details) {
                echo '<script>success_alert("Success !!", "The homework has been updated successfully !!");</script>';
            } else {
                echo '<script>danger_alert("Error !!", "There was an error updating the homework !!");</script>';
            }
        }
    }



    // public function homework_details_update(){
    //     if(isset($_POST['update_homework_details'])){
    //         $homework_id = $this->pure_data($_POST['homework_id']);
    //         $homework_title = $this->pure_data($_POST['homework_title']);
    //         // $homework_problem_name = $this->pure_data($_POST['homework_problem_name'][0]);
    //         $homework_status = $this->pure_data($_POST['homework_status']);
    //         $homework_files = $_FILES['homework_files']['name'];

    //         $result_check_problem_count = $this->get_data_where("homeworks", "`homework_id` = '$homework_id'");

    //         if($result_check_problem_count){
    //             while($row = $result_check_problem_count->fetch_assoc()){
    //                 $problems_count = $row['problems_count'];
    //             }
    //         }

    //         for($i = 1; $i <= $problems_count; $i++){
    //             $set_homework_name = (string) 'homework_problem_name_' . $i;
    //        echo     $homework_problem_name = $this->pure_data($_POST[$set_homework_name]);

    //             $result_problems_update = $this->update_where("homework_problems", "`homework_problem_name` = '$homework_problem_name'", "`homework_id` = '$homework_id'");

    //             if($result_problems_update){
    //                 echo '

    //                 <script>

    //                 success_alert("Success !!", "Homework Problem has been updated successfully !!");

    //                 </script>


    //                 ';
    //             }

    //         }

    //         $result_check_homework_problem = $this->get_data_where("homework_problems", "`homework_id` = '$homework_id'");

    //         if($result_check_homework_problem){
    //             if($result_check_homework_problem->num_rows > 0){
    //               $result_problem_update = $this->update_where("homework_problems", "`homework_problem_name` = '$homework_problem_name'", "`homework_id` = '$homework_id'");

    //               if($result_problem_update){
    //                 echo '

    //                 <script>
    //                 success_alert("Success !!", "The problems has been updated successfully !!");
    //                 </script>

    //                 ';
    //               }

    //             }
    //         }

    //         $result_update_homework_details = $this->update_where("homeworks", "`homework_title` = '$homework_title', `homework_status` = '$homework_status'", "`homework_id` = '$homework_id'");

    //         if($result_update_homework_details){
    //             echo '

    //             <script>
    //             success_alert("Success !!", "The homework has been updated successfully !!");
    //             </script>


    //             ';
    //         }else{
    //             echo '

    //             <script>
    //             danger_alert("Error !!", "There was something error where updating homework !!");
    //             </script>


    //             ';
    //         }



    //     }
    // }

    public function add_new_homework()
    {
        if (isset($_POST['add_new_homework'])) {
            $homework_title = $this->pure_data($_POST['homework_title']);
            $problems_count = $this->pure_data($_POST['problems_count']);
            $homework_submission_datetime = $this->pure_data($_POST['homework_submission_datetime']);

            $homework_status = "running";

            $check_homework = $this->get_data_where("homeworks", "`homework_title` = '$homework_title' and `problems_count` = '$problems_count'");

            if ($check_homework) {
                if ($check_homework->num_rows > 0) {
                    echo '
                    
                    <script>
                    danger_alert("Error !!", "The homework already exists !!");
                    </script>
                    
                    ';
                } else {
                    // that means the same data is not exist
                    $result_add_new_homework = $this->insert("homeworks", "`homework_title`, `problems_count`, `homework_status`, `homework_submission_datetime`", "'$homework_title', '$problems_count', '$homework_status', '$homework_submission_datetime'");

                    $get_homework_id = $this->get_data_where("homeworks", "`homework_title` = '$homework_title'");

                    if ($get_homework_id) {
                        if ($get_homework_id->num_rows > 0) {
                            while ($hw_id_row = $get_homework_id->fetch_assoc()) {
                                $homework_check_id = $hw_id_row['homework_id'];
                            }
                        }
                    }

                    // while($row = $check_homework->fetch_assoc()){
                    //     $homework_id = $row['homework_id'];
                    // }

                    for ($i = 1; $i <= $problems_count; $i++) {
                        $problem_name = 'hw_' . $homework_check_id . '_problem_' . $i;
                        $result_add_problem = $this->insert("homework_problems", "`homework_id`, `homework_problem_name`, `homework_problem_status`", "'$homework_check_id', '$problem_name', 'running'");

                    }



                    if ($result_add_new_homework) {
                        echo '
                
                <script>
                success_alert("Success !!", "New homework has been added successfully");
                </script>
                
                
                ';
                    } else {
                        echo '
                
                <script>
                danger_alert("Error !!", "There was something error while adding new homework !!");
                </script>
                
                
                ';
                    }
                }
            }



        }
    }

    public function check_login()
    {
        if (!isset($_SESSION['username'])) {
            header("location: /login");

            echo '
            
            <script>
            
            window.location.href="/login"

            </script>
            
            
            ';

        }
    }

    public function login()
    {
        if (isset($_POST['login'])) {
            $username_or_email = $this->pure_data($_POST['username_or_email']);
            ;
            $password = $this->pure_data($_POST['password']);
            ;

            $result_check = $this->get_data_where("users", "`user_name` = '$username_or_email' or `email` = '$username_or_email'");

            if ($result_check) {
                if ($result_check->num_rows > 0) {
                    while ($row = $result_check->fetch_assoc()) {
                        $user_id = $row["user_id"];
                        $username = $row["user_name"];
                        $email = $row["email"];
                        $db_pass = $row["password"];
                        $user_role = $row['user_role'];

                        if (password_verify($password, $db_pass)) {
                            $_SESSION['user_id'] = $user_id;
                            $_SESSION['username'] = $username;
                            $_SESSION['email'] = $email;
                            $_SESSION['user_role'] = $user_role;

                            $_SESSION['loggedin'] = true;

                            header("location: /dashboard");


                        }
                    }
                }
            }


        }
    }
    public function signup()
    {
        if (isset($_POST['signup'])) {
            $username = $this->pure_data($_POST['username']);
            $email = $this->pure_data($_POST['email']);
            $password = $this->pure_data($_POST['password']);
            $cpassword = $this->pure_data($_POST['cpassword']);



            $user_role = "team_member"; // by default the user_role is a team_member

            if ($password == $cpassword) {
                $result_check_users = $this->get_data_where("users", "`user_name` = '$username' or `email` = '$email'");

                if ($result_check_users) {
                    if ($result_check_users->num_rows > 0) {
                        // that means the user is already exists and cannot should signup again
                        echo '
                        
                        <script>
                        danger_alert("Error !!", "User already exist with the same creadetials ! Please login with your credentials");
                        </script>
                        
                        ';
                    } else {
                        // that means the user is not exist and it should continue the signup process

                        // password hashing algorithm
                        $hash = password_hash($password, PASSWORD_DEFAULT);

                        $result_insert = $this->insert("users", "`user_name`, `email`, `password`, `user_role`", "'$username', '$email', '$hash', '$user_role'");

                        if ($result_insert) {
                            echo '
                            
                            <script>
                            success_alert("Success !!", "Your account has been created successfully !! Welcome to the new world of programming !! Please login with your credentials !!");
                            </script>
                            
                            ';
                        } else {
                            echo '
                            
                            <script>
                            danger_alert("Error !!", "There has been something error while creating your account !! We are trying to resolve the issue. If the problem persist then, please contract the developer Lokeshwar Deb Protik for resolving the issue !!");
                            </script>
                            
                            ';
                        }

                    }
                }

            } else {
                echo '
                
                <script>
                danger_alert("Error !!", "The password doesnot match !! Please give the correct password");
                </script>
                
                ';
            }
        }
    }

    public function insert_form()
    {

        if (isset($_POST['submit_form'])) {

            // getting the info data

            $name = $this->pure_data($_POST['name']);
            $department = $this->pure_data($_POST['department']);
            $id = $this->pure_data($_POST['id']);
            $batch = $this->pure_data($_POST['batch']);
            $email = $this->pure_data($_POST['email']);
            $phone = $this->pure_data($_POST['phone']);

            // learning_about data
            $learning_about = $this->pure_data($_POST['learning_about']);

            // programming languages data
            $programming_languages = $this->pure_data($_POST['programming_languages']);

            // initializing the member type

            $member_type = "member";


            // echo 
            $address = $this->pure_data($_POST['address']);

            // checking if the gendar is selected or not

            if (!isset($_POST['gender'])) {
                echo $this->alert("danger", "The gender is not selected ! Please specify you gender ! It is required !");

                echo '
                    
                <script>
                
                danger_alert("The gender is not selected !", " Please specify you gender ! It is required !");
                
                </script>

                
                ';


            } else {
                // that means the gender section is selected

                $gender = $_POST['gender'];

                $get_gender = implode(",", $gender);
                // echo $get_gender;

            }

            // checking if the interest is selected or not

            if (!isset($_POST['interest'])) {
                // that means the interes section is not selected

                echo $this->alert("danger", "The interested section is not selected ! Please select your interests ! It is required !");

                echo '
                    
                <script>
                
                danger_alert("The interested section is not selected ! ", "Please select your interests ! It is required !");
                
                </script>

                
                ';

            } else {
                // that means the interest section is selected

                $interest = $_POST['interest'];

                $all_interests = implode(',', $interest);

                // echo $all_interests;

            }

            // checking if the weapon section is selected

            if (!isset($_POST['weapons'])) {
                // that means the weapons section is not selected

                echo $this->alert("danger", "The weapons section is not selected ! Please select your weapons ! It is required !");

                echo '
                    
                <script>
                
                danger_alert("The weapons section is not selected ! ", "Please select your weapons ! It is required !");
                
                </script>

                
                ';



            } else {

                // that means the weapon section is selected

                $weapons = $_POST['weapons'];

                $all_weapons = implode(",", $weapons);

                // echo $all_weapons;



            }

            // checking if all the checkbox are selected

            if (isset($_POST['gender']) && isset($_POST['interest']) && isset($_POST['weapons'])) {
                // that means all the checkbox are selected and no checkbox are blank

                // check form the db if the member already exists on the db

                $result = $this->get_data_where("club_members", "`name` = '$name' AND `department` = '$department' AND `id` = '$id' AND `batch` = '$batch'");

                if ($result) {
                    if ($result->num_rows > 0) {
                        // that means the member is already exists on the db

                        // then show the error
                        echo $this->alert("danger", "The member is already exists on the club !");

                        echo '
                    
                        <script>
                        
                        danger_alert("The member is already exists on the club !");
                        
                        </script>
        
                        
                        ';

                    } else {
                        // that means the member is not exists on the db

                        // then register and add the member and continue the execution

                        $result = $this->insert("club_members", "`member_type`, `name`, `department`, `id`, `batch`, `email`, `phone`, `gender`, `address`, `field_of_interest`, `interested_learning_about`, `weapons`, `programming_languages`", "'$member_type','$name','$department','$id','$batch','$email','$phone','$get_gender','$address','$all_interests','$learning_about','$all_weapons','$programming_languages'");

                        if ($result) {
                            echo $this->alert("success", "Welcome to the world of programming ! Welcome you to the UoB computers club !");

                            echo '
                            <script>
                            success_alert("Welcome to the world of programming !",  "Welcome you to the UoB computers club !");
                            </script>
                            ';

                        } else {
                            echo $this->alert("danger", "Something went wrong ! Cannot registered succesfully ! We are handling with the issue ! Please try again later");

                            echo '
                            
                            <script>
                            danger_alert("Something went wrong ! Cannot registered succesfully ! ", "We are handling with the issue ! Please try again later")
                            </script>
                            
                            ';

                        }


                    }
                }





            } else {
                echo $this->alert("danger", "You have not registed on the computers club successfully ! Please select and fillup all the informations correctly to register !");

                echo '
                
                <script>
                
                danger_alert("You have not registed on the computers club successfully ! ", "Please select and fillup all the informations correctly to register !")

                </script>

                ';
            }


        }
    }
}