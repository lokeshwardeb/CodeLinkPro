<?php

require_once __DIR__ . '/../../config/config.php';
require_once __DIR__ . '/../../models/models.php';
require_once __DIR__ . '/../../controllers/controllers.php';



$active_name = "Login";

require_once __DIR__ . '/inc/_login_header.php';


$controllers = new controllers;


$controllers->login();





?>

    <div class="login_section">
        <div class="login_box">
            <div class="logo text-center mt-4 ms-5 ps-4">
                <div class="container">
                    <img src="./../../assets/img/CodeLinkPro.png" class="img-fluid" style="height: 200px !important;"
                        alt="">
                </div>
            </div>

            <div class="login_inputs">
                <form action="" method="post">
                    <div class="container">
                        <div class="mb-3 ms-5 pt-5 ps-5">

                            <div class="section_inp d-flex justify-content-center">
                                <input type="text" class="form-control login_inp" 
                                    name="username_or_email" id="username_or_email"
                                    placeholder="Enter your username or email">


                            </div>

                        </div>
                        <div class="mb-3 ms-5 pt-4 ps-5">

                            <div class="section_inp d-flex justify-content-center">
                                <input type="password" class="form-control login_inp " 
                                    name="password" id="password" placeholder="Enter your password">

                                    
                                    <button type="button" class="btn" onclick="passwordHandle()" >
                                    <i class="fa-solid fa-eye " id="showIcon" ></i>
                                    <i class="fa-solid fa-eye-slash d-none " id="hideIcon" ></i>
                                
                                </button>

                            </div>

                        </div>
                        <div class="mb-3 ms-5 pt-4 ps-5">

                            <div class="section_inp d-flex justify-content-center">
                                <button type="submit" name="login" class="btn login_btn ">Login</button>
                            </div>


                            <div class="fp_pass_info text-center mt-4 pt-4">
                                <span>Don't have an account ? Create a an <a href="/signup">account</a></span>

                                <span class="d-block">Forgot your password ? <a href="">Reset</a> your password </span>
                            </div>


                        </div>
                    </div>
                </form>

                <div class="powered_by_section text-end me-4 pe-4">
                    Powered by <br>
                    Lokeshwar Deb Protik
                </div>

                <div class="software_created_notice text-center mt-4 pt-4 pb-5">
                    This software was created by <a href="http://lokeshwardebportfolio.epizy.com" target="_blank">Lokeshwar Deb Protik</a>
                </div>

            </div>

        </div>
    </div>

    <script src="./../../assets/js/bootstrap.bundle.min.js"></script>
    <script src="./../../assets/js/bootstrap.min.js"></script>
    <script src="./../../assets/js/all.min.js"></script>

    <script src="./../../assets/js/scripts.js"></script>
</body>

</html>