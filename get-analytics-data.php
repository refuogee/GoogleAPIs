<?php

    $the_auth_token_object = require 'get_token.php'; 

    $the_date_range = require 'time.php'; 
    
    $end_date = $the_date_range[0];    

    $start_date = $the_date_range[1];   
    
    $previous_end_date = $the_date_range[2];
    $previous_start_date = $the_date_range[3];  

    $auth_token =  $the_auth_token_object[0]['token'];

    $total_traffic = curl_init();
    $organic_traffic = curl_init();
    $paid_traffic = curl_init();

    $total_traffic_payload = '{
        "reportRequests":
            [
            {
                "viewId": "221617299",
                "dateRanges": [{"startDate": "'.$start_date.'", "endDate": "'.$end_date.'"}, {"startDate": "'.$previous_start_date.'", "endDate": "'.$previous_end_date.'"} ],
                "metrics": [{"expression": "ga:sessions"},{"expression":"ga:pageviews"}]
            }
            ]
        }';

    $organic_traffic_payload = '{
                    "reportRequests":
                        [
                        {
                            "viewId": "221617299",
                            "dateRanges": [{"startDate": "'.$start_date.'", "endDate": "'.$end_date.'"}, {"startDate": "'.$previous_start_date.'", "endDate": "'.$previous_end_date.'"} ],
                            "metrics": [{"expression": "ga:sessions"},{"expression":"ga:pageviews"}],
                            "segments": [{"segmentId": "gaid::-5"}],
                            "dimensions":[{"histogramBuckets":[null],
                            "name":"ga:segment"}]
                        }
                        ]
                    }';
    
    $paid_traffic_payload = '{
                    "reportRequests":
                        [
                        {
                            "viewId": "221617299",
                            "dateRanges": [{"startDate": "'.$start_date.'", "endDate": "'.$end_date.'"}, {"startDate": "'.$previous_start_date.'", "endDate": "'.$previous_end_date.'"} ],
                            "metrics": [{"expression": "ga:sessions"},{"expression":"ga:pageviews"}],
                            "segments": [{"segmentId": "gaid::-4"}],
                            "dimensions":[{"histogramBuckets":[null],
                            "name":"ga:segment"}]
                        }
                        ]
                    }';

    /*  TAKE THESE OUT WHEN LIVE
    CURLOPT_SSL_VERIFYHOST => false,
    CURLOPT_SSL_VERIFYPEER => false, */

    curl_setopt_array($total_traffic, array(
        CURLOPT_URL => 'https://analyticsreporting.googleapis.com/v4/reports:batchGet',    
        CURLOPT_SSL_VERIFYHOST => false,
        CURLOPT_SSL_VERIFYPEER => false,    
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => $total_traffic_payload,
        CURLOPT_HTTPHEADER => array('Authorization: Bearer '.$auth_token.' Expires In:', 'Content-Type: application/json'),
    ));                    

    curl_setopt_array($paid_traffic, array(
        CURLOPT_URL => 'https://analyticsreporting.googleapis.com/v4/reports:batchGet',    
        CURLOPT_SSL_VERIFYHOST => false,
        CURLOPT_SSL_VERIFYPEER => false,    
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => $paid_traffic_payload,
        CURLOPT_HTTPHEADER => array('Authorization: Bearer '.$auth_token.' Expires In:', 'Content-Type: application/json'),
    ));    

    curl_setopt_array($organic_traffic, array(
    CURLOPT_URL => 'https://analyticsreporting.googleapis.com/v4/reports:batchGet',    
    CURLOPT_SSL_VERIFYHOST => false,
    CURLOPT_SSL_VERIFYPEER => false,    
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => $organic_traffic_payload,
    CURLOPT_HTTPHEADER => array('Authorization: Bearer '.$auth_token.' Expires In:', 'Content-Type: application/json'),
));   
    
    $total_traffic_response = curl_exec($total_traffic);
    $organic_traffic_response = curl_exec($organic_traffic);
    $paid_traffic_response = curl_exec($paid_traffic);

    
    curl_close($total_traffic);
    curl_close($organic_traffic);
    curl_close($paid_traffic);
    
    $total_traffic_object = json_decode($total_traffic_response);
    $organic_traffic_object = json_decode($organic_traffic_response);
    $paid_traffic_object = json_decode($paid_traffic_response);

    
    $current_date_total_results = $total_traffic_object->reports[0]->data->rows[0]->metrics[0]->values;
    //echo ($total_traffic_object->reports[0]->data->rows[0]->metrics[0]->values[0]);

    $previous_date_total_results = $total_traffic_object->reports[0]->data->rows[0]->metrics[1]->values;
            
    $current_date_organic_results = $organic_traffic_object->reports[0]->data->rows[0]->metrics[0]->values;
    $previous_date_organic_results = $organic_traffic_object->reports[0]->data->rows[0]->metrics[1]->values;

    $current_date_paid_results = $paid_traffic_object->reports[0]->data->rows[0]->metrics[0]->values;
    $previous_date_paid_results = $paid_traffic_object->reports[0]->data->rows[0]->metrics[1]->values;
    
    
    $combined_analytics_data_for_return = array($current_date_total_results, $previous_date_total_results, $current_date_organic_results, $previous_date_organic_results, $current_date_paid_results, $previous_date_paid_results);    

    return $combined_analytics_data_for_return;
 
         