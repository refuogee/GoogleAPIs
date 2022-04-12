<?php
    $the_woocommerce_data = require 'get-woocommerce-data.php'; 

    function convert_to_double_two_decimals ($number_to_be_converted) {
        
        $converted_number = number_format($number_to_be_converted, 2, ".","");

        $converted_number = floatval($number_to_be_converted);

        return $converted_number;
    }

    function check_change($current_value, $previous_value) {
        
        if ( ($check_value = $current_value - $previous_value) >= 0 ) {            
            return 'growth';
            
        } else {            
            return 'loss';
        }
    }

    for( $i = 0; $i < count($the_woocommerce_data); $i++ ) {
        for( $j = 0; $j < count($the_woocommerce_data[0]); $j++ ) {
            $the_woocommerce_data_double[$i][$j] = convert_to_double_two_decimals ($the_woocommerce_data[$i][$j]);
        }
    }

    //number_format( strval(  ) , 0, "."," ")

    $curr_total_sales =  number_format( strval( $the_woocommerce_data[0][0] ) , 2, "."," ");
    $prev_total_sales = number_format( strval( $the_woocommerce_data[1][0] ) , 2, "."," "); 
    $total_sales_change = check_change($the_woocommerce_data_double[0][0], $the_woocommerce_data_double[1][0]);

    //number_format( strval(  ) , 2, "."," ");

    $curr_net_sales = number_format( strval( $the_woocommerce_data[0][1] ) , 2, "."," "); 
    $prev_net_sales = number_format( strval( $the_woocommerce_data[1][1] ) , 2, "."," "); 
    $net_sales_change = check_change($the_woocommerce_data_double[0][1], $the_woocommerce_data_double[1][1]);

    $curr_orders = number_format( strval( $the_woocommerce_data[0][2] ) , 0, "."," "); 
    $prev_orders = number_format( strval( $the_woocommerce_data[1][2] ) , 0, "."," "); 
    $orders_change = check_change($the_woocommerce_data_double[0][2], $the_woocommerce_data_double[1][2]);

    $curr_products_sold = number_format( strval( $the_woocommerce_data[0][3] ) , 0, "."," "); 
    $prev_products_sold = number_format( strval( $the_woocommerce_data[1][3] ) , 0, "."," "); 
    $products_sold_change = check_change($the_woocommerce_data_double[0][3], $the_woocommerce_data_double[1][3]);

    $formatted_sales_data = array(
                                        "total_sales"  => array("total_curr_sales" => $curr_total_sales, "total_prev_sales" => $prev_total_sales, "total_sales_change" => $total_sales_change),
                                        "net_sales"  => array("net_curr_sales" => $curr_net_sales, "net_prev_sales" => $prev_net_sales, "net_sales_change" => $net_sales_change),
                                        "orders"  => array("curr_orders" => $curr_orders, "prev_orders" => $prev_orders, "orders_change" => $orders_change),
                                        "products_sold" => array("curr_products_sold" => $curr_products_sold, "prev_products_sold" => $prev_products_sold, "products_sold_change" => $products_sold_change),
                                    );

    //print_r($formatted_sales_data);                                        
    return $formatted_sales_data;