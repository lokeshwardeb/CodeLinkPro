<?php


include __DIR__ . "/inc/_sidebar_active_class.php";

$manage_codes_active_class = "sidebar_active_btn";

$active_name = "Submit Homework";



require __DIR__ . "/inc/_header.php";
// require __DIR__ . "/../../models/models.php";


$models = new models;

// Define how many results per page
$results_per_page = 5;

// Find out the number of results stored in database
$sql = "SELECT COUNT(*) AS total FROM homeworks";
$result = $models->make_query($sql);

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

// for ($page = 1; $page <= $total_pages; $page++) {
//     echo '
//     <a href="?page=' . $page . '"> ' . $page . ' </a>
//     ';
// }









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
                <div class="section_main_content ">
                    <div class="container m-4 p-4">
                        <!-- <div class="greetings_section mb-4">
                            Good Morning, Protik !!
                        </div> -->


                        <div class="manage_codes_section_title mb-5">
                                    <div class="manage_code_title fs-4 text-center">
                                        Manage codes 
                                        
                                    </div>
                                    <div class="manage_code_sub_title fs-6 text-center">
                                    (Here you can manage all of your codes)
                                    </div>
                                </div>

                    

                        <div class="home_work_section">
                            <div class="container">
                                <div class="pagination_section">
                                    <nav aria-label="Page navigation example">
                                        <ul class="pagination">
                                            <li class="page-item">
                                                <a class="page-link" href='<?php
                                                
                                                $get_page = $_GET['page'];

                                               if(isset($_GET['page'])){
                                                if($get_page > 1){
                                                    echo '?page=' .  $get_page - 1;
                                                }else{
                                                    echo '?page=' . $get_page = 1;
                                                }
                                               }

                                                



                                                ?>' aria-label="Previous">
                                                    <span aria-hidden="true">&laquo;</span>
                                                </a>
                                            </li>
                                            <!-- <li class="page-item"><a class="page-link" href="#">1</a></li> -->

                                            <?php

                                            $get_total_pages = $controllers->pagination();
                                            


                                            ?>

                                            <!-- <li class="page-item"><a class="page-link" href="#">2</a></li>
                                            <li class="page-item"><a class="page-link" href="#">3</a></li> -->
                                            <li class="page-item">
                                                <a class="page-link" href="<?php
                                                

                                                if(isset($_GET['page'])){
                                                $get_page = $_GET['page'];

                                                    if($get_page < $get_total_pages){
                                                        echo '?page=' .  $get_page + 1;
                                                    }else{
                                                        echo '?page=' . $get_page = $get_total_pages;
                                                    }
                                                }else{
                                                    echo '?page=' . 2;
                                                }

                                                



                                                ?>" aria-label="Next">
                                                    <span aria-hidden="true">&raquo;</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>


                                


                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Homework Title</th>
                                                <th scope="col">Homework Status</th>
                                                <th scope="col">Submission Datetime</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php

                                            //                                         // Retrieve selected results from database
// $sql = "SELECT * FROM homeworks LIMIT $starting_limit, $results_per_page";
// $result = $models->make_query($sql);
                                            // Retrieve selected results from database
                                            $sql = "SELECT * FROM homeworks LIMIT $starting_limit, $results_per_page";
                                            $result_manage_homework = $models->make_query($sql);

                                            // $result_manage_homework = $controllers->get_data("homeworks");
                                            
                                            if ($result_manage_homework) {
                                                if ($result_manage_homework->num_rows > 0) {
                                                    $manage_homework_sl_no = 1;
                                                    while ($row = $result_manage_homework->fetch_assoc()) {
                                                        echo '
                                                <tr>
                                                <th scope="row">' . $manage_homework_sl_no . '</th>
                                                <td>' . $row['homework_title'] . '</td>
                                                <td>' . $row['homework_status'] . '</td>
                                                <td>' . $row['homework_submission_datetime'] . '</td>
                                                <td>
                                                <a href="/homework_details?homework_id=' . $row['homework_id'] . '">
                                                <button class = "btn btn-sm btn-outline-dark">Homework Details</button>
                                                </a>
                                                </td>
                                                </tr>
                                                
                                                ';

                                                        $manage_homework_sl_no++;

                                                    }
                                                }
                                            }

                                            ?>



                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>


                        <!-- <div class="submit_home_work_section mt-4">
                    <div class="container">
                        <div class="section_title text-center fs-4 mb-4">
                            Submit your homework
                        </div>
                        <form action="" method="post">
                        <div class="mb-3 me-4 pe-4">
                            <select name="" id="" class="form-control me-4 pe-4" >
                                <option value="">Select the homework</option>
                                <option value="">1. Loops</option>
                                <option value="">2. Conditions</option>
                            </select>
                        </div>
                        <div class="mb-3 me-4 pe-4">
                            <input type="file" name="homework_files" class="form-control mt-4" id="homework_files">
                        </div>

                        <div class="mb-3 mt-4 pt-4">
                            <button type="submit" class="btn  btn-outline-dark">Submit</button>
                        </div>
                        <div class="mb-3 mt-4 pt-4">
                            <a href="/homework" class="nav-link">
                            <button type="button" class="btn btn-sm btn-outline-dark">Back to Homeworks</button>
                            </a>
                        </div>

                        </form>
                    </div>
                   </div> -->

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