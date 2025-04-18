<?php


include __DIR__ . "/inc/_sidebar_active_class.php";

$manage_admin_panel_class = "sidebar_active_btn";

$active_name = "Submit Homework";



require __DIR__ . "/inc/_header.php";
$controllers->check_admin_access();


if(!isset($_GET['user_id'])){
    header("location: /manage_users");
}

$controllers->block_and_unblock_user();
$controllers->change_a_user_role();




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
                            Update user details
                        </div>
                        <form action="" method="post" enctype="multipart/form-data" >

                        <div class="mb-4 mt-4 pt-4">
                            <?php

                            if(!isset($_GET['user_id']) || $_GET['user_id'] == ''){
                                echo '
                                <script>
                                location.href = "/manage_users"
                                </script>
                                ';

                            }
                            
                            $user_id = $_GET['user_id'];

                            $result_check_user_details = $controllers->get_data_where("users", "`user_id` = '$user_id'");

                            if($result_check_user_details){
                                if($result_check_user_details->num_rows > 0){
                                    while($row = $result_check_user_details->fetch_assoc()){

                                        $user_block_status = $row['user_block_status'];
                                        
                                        echo '<div>Username : '. $row['user_name'] .'</div>';
                                        echo '<div>Email : '. $row['email'] .'</div>';
                                        echo '<div>User Role : '. $row['user_role'] .'</div>';
                                        echo '<div>User Block Status : '. $row['user_block_status'] .'</div>';
                                        echo '<div>Joined Datetime : '. date("d M Y h:i:s a", strtotime($row['datetime'])) .'</div>';
                                    }
                                }
                            }

                            ?>
                        </div>

                        <div class="mb-3 mt-4 pt-4 <?php
                        
                        if($user_block_status == 'user_blocked'){
                            echo 'd-none';
                        }
                        
                        ?>">
                            
                            <input type="hidden" name="user_id" value="<?php echo $user_id ?>">
                            <button type="submit" class="btn  btn-outline-danger" name="block_user">Block user</button>
                        </div>
                        <div class="mb-3 mt-4 pt-4 <?php 
                        
                        if($user_block_status == ''){
                            echo 'd-none';
                        }
                        
                        ?>">
                            <input type="hidden" name="user_id" value="<?php echo $user_id ?>">
                            <button type="submit" class="btn  btn-outline-success" name="unblock_user">UnBlock user</button>
                        </div>
                    

                        <div class="user_role_section">
                         <div class="mb-3 mt-4 pt-4">
                        <label for="change_user_role mt-4 mb-4 pb-4">Change user role</label>
                         <select name="change_user_role" class="form-control mt-4" id="change_user_role">
                                <option value="admin">Admin</option>
                                <option value="team_member">Team member</option>
                            </select>
                         </div>
                         <div class="mb-3 mt-4 pt-4">
                         <button type="submit" class="btn btn-outline-primary" name="change_user_role_btn" >Change User Role</button>
                         </div>
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