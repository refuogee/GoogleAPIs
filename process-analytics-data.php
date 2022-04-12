<?php

    $the_analytics_data = require 'get-analytics-data.php'; 

   /*  echo "<br>The analytics data from php file<br>";
    print_r($the_analytics_data);
    echo "<br><br>"; */

    
    function convert_to_double_two_decimals ($number_to_be_converted) {
        
        $converted_number = number_format($number_to_be_converted, 0, ".","");

        $converted_number = floatval($converted_number);

        return $converted_number;
    }

    function check_change($current_value, $previous_value) {
        
        if ( ($check_value = $current_value - $previous_value) >= 0 ) {            
            return 'growth';
            
        } else {            
            return 'loss';
        }
    }

    for( $i = 0; $i < count($the_analytics_data); $i++ ) {
        for( $j = 0; $j < count($the_analytics_data[0]); $j++ ) {
            $the_analytics_data_double[$i][$j] = convert_to_double_two_decimals ($the_analytics_data[$i][$j]);
        }
    }

    for( $i = 0; $i < count($the_analytics_data); $i++ ) {
        for( $j = 0; $j < count($the_analytics_data[0]); $j++ ) {
            $the_analytics_data[$i][$j] = number_format( strval( $the_analytics_data[$i][$j] ) , 0, "."," ");
        }
    }
    
    $curr_total_visits = $the_analytics_data[0][0];
    $prev_total_visits = $the_analytics_data[1][0];

    $total_visits_change = check_change($the_analytics_data_double[0][0], $the_analytics_data_double[1][0]);

    $curr_total_pageviews  = $the_analytics_data[0][1];
    $prev_total_pageviews  = $the_analytics_data[1][1]; 

    $total_pageviews_change = check_change($the_analytics_data_double[0][1], $the_analytics_data_double[1][1]);
    
    $curr_organic_visits = $the_analytics_data[2][0]; 
    $prev_organic_visits = $the_analytics_data[3][0]; 

    $organic_visits_change = check_change($the_analytics_data_double[2][0], $the_analytics_data_double[3][0]);
    
    $curr_organic_pageviews = $the_analytics_data[2][1]; 
    $prev_organic_pageviews = $the_analytics_data[3][1];

    $organic_pageviews_change = check_change($the_analytics_data_double[2][1], $the_analytics_data_double[3][1]);

    $curr_paid_visits = $the_analytics_data[4][0]; 
    $prev_paid_visits = $the_analytics_data[5][0]; 

    $paid_visits_change = check_change($the_analytics_data_double[4][0], $the_analytics_data_double[5][0]);
    
    $curr_paid_pageviews = $the_analytics_data[4][1];
    $prev_paid_pageviews = $the_analytics_data[5][1];    

    $paid_pageviews_change = check_change($the_analytics_data_double[4][1], $the_analytics_data_double[5][1]);

    $formatted_analytics_data = array(
                                        "total_visits"  => array("total_curr_visits" => $curr_total_visits, "total_prev_visits" => $prev_total_visits, "total_visits_change" => $total_visits_change),
                                        "organic_visits"  => array("organic_curr_visits" => $curr_organic_visits, "organic_prev_visits" => $prev_organic_visits, "organic_visits_change" => $organic_visits_change),
                                        "paid_visits"  => array("paid_curr_visits" => $curr_paid_visits, "paid_prev_visits" => $prev_paid_visits, "paid_visits_change" => $paid_visits_change),
                                        "total_pageviews" => array("total_curr_pageviews" => $curr_total_pageviews, "total_previous_pageviews" => $prev_total_pageviews, "total_pageviews_change" => $total_pageviews_change),
                                        "organic_pageviews" => array("organic_curr_pageviews" => $curr_organic_pageviews, "organic_previous_pageviews" => $prev_organic_pageviews, "organic_pageviews_change" => $organic_pageviews_change),
                                        "paid_pageviews" => array("paid_curr_pageviews" => $curr_paid_pageviews, "paid_previous_pageviews" => $prev_paid_pageviews, "paid_pageviews_change" => $paid_pageviews_change) ,
                                    );
    
   return $formatted_analytics_data;