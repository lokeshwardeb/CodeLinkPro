<!-- <a class="btn btn-primary" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
  Link with href
</a> -->
<button class="btn mt-4 " style="float: right;" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample"
    aria-controls="offcanvasExample">
    <i class="fa-solid fa-bars" style="font-size: 20px !important;"></i>
</button>

<div class="offcanvas offcanvas-start" style="width:100%" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-header">
        <!-- <img src="/assets/img/CodeLinkPro.png" class="img-fluid" style="width: 100px;" alt=""><br> -->
        <h5 class="offcanvas-title" id="offcanvasExampleLabel"></h5>
        <button type="button" class="btn-close ms-5" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <div class="logo d-flex justify-content-center">
            <img src="/assets/img/CodeLinkPro.png" class="img-fluid " style="width: 100px; " alt=""><br>

        </div>


        <div class="mobile_navigation_main_section mt-4">
           <?php

           require __DIR__ . "/_sidebar_items.php";

           ?>
        </div>



        <!-- <div class="dropdown mt-3">
                                    <button class="btn btn-secondary dropdown-toggle" type="button"
                                        data-bs-toggle="dropdown">
                                        Dropdown button
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#">Action</a></li>
                                        <li><a class="dropdown-item" href="#">Another action</a></li>
                                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                                    </ul>
                                </div> -->
    </div>
</div>