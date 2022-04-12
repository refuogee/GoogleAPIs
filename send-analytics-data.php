<?php    
    if ( isset($_POST['userchosendate']) ) {
        error_log('The user chose this date do something');
        $date_from_user = $_POST['userchosendate'];
    }

    if ( isset($_POST['startdate']) ) {
        error_log('There is something in the POST variable do something');
        
        $start_date = $_POST['startdate'];      
        $end_date = $_POST['enddate'];      
        
        error_log( $start_date .' '. $end_date);
        $date_range_from_parameters = array($start_date, $end_date);
    } 
    
    $analytics_data_for_sending =  require 'process-analytics-data.php'; 

    //print_r($analytics_data_for_sending);

    echo json_encode($analytics_data_for_sending);

    