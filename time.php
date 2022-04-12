<?php

    if ( !empty($date_range_from_parameters) ) {
        error_log('The parameters have been set use these in the date calculation');
        $parameter_start_date = $date_range_from_parameters[0];
        $parameter_end_date = $date_range_from_parameters[1];
        
        $parameter_start_date_minus_one = date_create($parameter_start_date)->modify('-1 days')->format('Y-m-d');
        $parameter_start_date_minus_thirty = date_create($parameter_start_date_minus_one)->modify('-30 days')->format('Y-m-d');

        

        $curr_start_date = $parameter_start_date;
        $curr_end_date = $parameter_end_date;
        
        $prev_start_date = $parameter_start_date_minus_thirty;
        
        $prev_end_date = $parameter_start_date_minus_one;

      /*   error_log('cuurent start date: ' . $curr_start_date);
        error_log('current end date: ' . $curr_end_date);
        error_log('previous start date: ' . $prev_start_date);
        error_log('previous end date: ' . $prev_end_date); */

        $dateRange = array($curr_end_date, $curr_start_date, $prev_end_date, $prev_start_date);
        
        return  $dateRange;
    } else if ( !empty($date_from_user) ) {
        error_log('we have date from the user use it and nothing else');
        
        $user_end_date = $date_from_user;

        $user_start_date = date_create($user_end_date)->modify('-30 days')->format('Y-m-d');

        

        $user_prev_end_date = date_create($user_start_date)->modify('-1 days')->format('Y-m-d');

        $user_prev_start_date = date_create($user_prev_end_date)->modify('-30 days')->format('Y-m-d');

        
        error_log('cuurent start date: ' . $user_start_date);
        error_log('current end date: ' . $user_end_date);
        error_log('previous start date: ' . $user_prev_start_date);
        error_log('previous end date: ' . $user_prev_end_date);

        $dateRange = array($user_end_date, $user_start_date, $user_prev_end_date, $user_prev_start_date); 
        return  $dateRange;

    }   
    
    else {
        $yesterday = date('Y-m-d', strtotime("-1 days"));
    
        $yesterdayThirtyDays = date('Y-m-d', strtotime("-30 days"));
        


        $yesterdayThirtyDaysMinusOne =  date_create($yesterdayThirtyDays)->modify('-1 days')->format('Y-m-d');

        $ThirtyDaysMinusOneMinusThirty =  date_create($yesterdayThirtyDaysMinusOne)->modify('-30 days')->format('Y-m-d');
        
        

        $dateRange = array($yesterday, $yesterdayThirtyDays, $yesterdayThirtyDaysMinusOne, $ThirtyDaysMinusOneMinusThirty);

        //print_r ($dateRange);

        return  $dateRange;
    }
 
    