<div class="greetings_section mb-4">
    <?php

    // Good Morning,  !!

    $greetings_user_name = ucwords($_SESSION['username']);;

    $time_hour = date('H');

    if($time_hour < 12){
        echo 'Good Morning, ' . $greetings_user_name . ' !!';
    }elseif($time_hour < 18){
        echo 'Good Afternoon, ' . $greetings_user_name . ' !!';
        
    }else{
        echo 'Good Evening, ' . $greetings_user_name . ' !!';

    }
    


    



    ?>

</div>