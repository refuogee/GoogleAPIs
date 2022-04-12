<?php

    $the_date_range = require 'time.php'; 
    
    $end_date = $the_date_range[0];    

    $start_date = $the_date_range[1];      
    
    $previous_end_date = $the_date_range[2];
    
    $previous_start_date = $the_date_range[3];  

    $woocomm_curr_sales = curl_init();
    $woocomm_prev_sales = curl_init();
    

    /*  TAKE THESE OUT WHEN LIVE
    CURLOPT_SSL_VERIFYHOST => false,
    CURLOPT_SSL_VERIFYPEER => false, */

    curl_setopt_array($woocomm_curr_sales, array(
        CURLOPT_URL => /* The url for the wordpress with woocommerce plus consumer key and secret */ '?&date_min='.$start_date.'&date_max='.$end_date.'',    
        CURLOPT_SSL_VERIFYHOST => false,
        CURLOPT_SSL_VERIFYPEER => false,    
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1
    ));     
    
    curl_setopt_array($woocomm_prev_sales, array(
        CURLOPT_URL => /* The url for the wordpress with woocommerce plus consumer key and secret */ '&date_min='.$previous_start_date.'&date_max='.$previous_end_date.'',    
        CURLOPT_SSL_VERIFYHOST => false,
        CURLOPT_SSL_VERIFYPEER => false,    
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1
    )); 

   
    
    $curr_total_sales_response = curl_exec($woocomm_curr_sales);
    $prev_total_sales_response = curl_exec($woocomm_prev_sales);
   
    
    curl_close($woocomm_curr_sales);
    curl_close($woocomm_prev_sales);
    
    $curr_total_sales_object = json_decode($curr_total_sales_response); 
    $prev_total_sales_object = json_decode($prev_total_sales_response);    
    
    $current_date_sales_results = array( $curr_total_sales_object[0]->total_sales, $curr_total_sales_object[0]->net_sales, $curr_total_sales_object[0]->total_orders, $curr_total_sales_object[0]->total_items );
    /* echo '<br>curr Sales results<br>';
    print_r ($current_date_sales_results);
 */
    $prev_date_sales_results = array( $prev_total_sales_object[0]->total_sales, $prev_total_sales_object[0]->net_sales, $prev_total_sales_object[0]->total_orders, $prev_total_sales_object[0]->total_items );
    
    /* echo '<br>prev Sales results<br>';
    print_r ($prev_date_sales_results); */
    
    $combined_sales_data_for_return = array($current_date_sales_results, $prev_date_sales_results);    

    //error_log (print_r($combined_sales_data_for_return, true));

    return $combined_sales_data_for_return;
 
    