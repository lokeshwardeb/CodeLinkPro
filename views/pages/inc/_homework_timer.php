<div class="homework_timer_section mt-4 pt-5">
                            <div class="timer_msg mt-4 text-center fs-5">Remaining time to submit your next upcomming homework</div>
                            <?php

                            // echo date_default_timezone_get();
                            date_default_timezone_set("Asia/Dhaka");
                            // echo date_default_timezone_get();

                            // Fetch the earliest future homework submission datetime
                            $result_get_homework_datetimes = $controllers->get_data_where("homeworks", "`homework_status` = 'running'");
                            $earliest_future_datetime = null;

                            if ($result_get_homework_datetimes && $result_get_homework_datetimes->num_rows > 0) {
                                while ($row = $result_get_homework_datetimes->fetch_assoc()) {
                                    $homework_id = $row['homework_id'];
                                    $submission_datetime = $row['homework_submission_datetime'];
                                    $homework_title = $row['homework_title'];
                                    if (strtotime($submission_datetime) > time()) {
                                        if (is_null($earliest_future_datetime) || strtotime($submission_datetime) < strtotime($earliest_future_datetime)) {
                                            $earliest_future_datetime = $submission_datetime;
                                        }
                                    }

                                    $event_timestamp = strtotime($earliest_future_datetime);
                                    $current_timestamp = time();
                                    $countdown_time = $event_timestamp - $current_timestamp;
    

                                    if($countdown_time < 0){
                                        // that means the time is expired 
                                        $result_update_expired_datetime = $controllers->update_where("homeworks", "`homework_status` = 'time_expired'", "`homework_id` = '$homework_id'");

                                    }
                                }
                            }

                            // echo "<pre>";
                            // echo "Earliest Future Datetime: " . $earliest_future_datetime . "<br>";
                            // echo "</pre>";

                            if ($earliest_future_datetime) {
                                $event_timestamp = strtotime($earliest_future_datetime);
                                $current_timestamp = time();
                                $countdown_time = $event_timestamp - $current_timestamp;

                                echo '<div class="text-center mt-4  fw-bold primary-color">'. $homework_title . '</div>' ;



                                // echo "<pre>";
                                // echo "Event Timestamp: " . $event_timestamp . "<br>";
                                // echo "Current Timestamp: " . $current_timestamp . "<br>";
                                // echo "Countdown Time: " . $countdown_time . "<br>";
                                // echo "</pre>";

                                $countdown_time = max($countdown_time, 0);
                                echo "<script>var countdownTime = $countdown_time;</script>";
                            } else {
                                echo "<script>var countdownTime = 0;</script>";
                            }
                            ?>
                            <div class="timer text-center mt-4" id="timer">Loading ....</div>
                        </div>