 <?php





 ?>



 <ul class="navbar-nav  flex-column text-center">
                <li class="nav-item">
                    <a class="nav-link " aria-current="page" href="/dashboard">
                    <button class="btn cus_sidebar_btn <?php echo $dashboard_active_class  ?> ">Dashboard</button>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/manage_codes">
                    <button class="btn cus_sidebar_btn <?php echo $manage_codes_active_class  ?> ">Manage Codes</button>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/homework">
                    <button class="btn cus_sidebar_btn <?php echo $homeworks_active_class  ?> ">Homeworks</button>
                    </a>
                </li>

                <?php

                if($_SESSION['user_role'] == 'admin'){
                    // echo 'hi admin';
                


                ?>

                <li class="nav-item">
                    <a class="nav-link" href="/manage_admin_panel">
                    <button class="btn cus_sidebar_btn <?php echo $manage_admin_panel_class  ?> ">Manage Admin Panel</button>
                    </a>
                </li>


                <?php

                }




                ?>




                <li class="nav-item">
                    <a class="nav-link" href="/logout">
                    <button class="btn cus_sidebar_btn">Logout</button>
                    </a>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link disabled" aria-disabled="true">Disabled</a>
                </li> -->
            </ul>