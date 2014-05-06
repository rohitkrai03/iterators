<?php
 
/*
Description: Getting Stock Data from Yahoo! Finance

*/
 
/*
* More about Yahoo! Finance Tag
* http://www.gummy-stuff.org/Yahoo-data.htm
* http://www.canbike.ca/information-technology/2013/08/10/yahoo-finance-url-download-to-a-csv-file.html
*/
 
include_once("stock_data.php");
 
/* This function gets a symbol or an array of symbol as a parameter.
* And it returns an array of the corresponding stock data.
* If an error occurs, the detail of the error is saved in $error_message variable
* which is passed by reference from the parent function
*/
 
function get_stock_data_from_yahoo_finance_pv($symbol, &$error_message) {
 
    global $yahoo_finance_tags;
    $error_message = NULL; // Default value    
 
    $f = ""; // The f parameter in Yahoo! Finance URL
    foreach($yahoo_finance_tags as $key => $value)
        $f = $f . $key;
 
    if ( !is_null($symbol) ) { // if the symbol is an array
 
        if ( strlen($symbol) < 1 || $symbol == NULL ) { // if the symbol is invalid
            $error_message = "The given symbol is invalid.";
            return -1; // ERROR
        }
 
        $url = "http://finance.yahoo.com/d/quotes.csv?s=" . $symbol . "&f=" . $f;
        $fp = @fopen($url, "r");
        if ( $fp == FALSE ) { // If the URL can't be opened
            $error_message = "Cannot get data from Yahoo! Finance. The following URL is not accessible, $url";
            return -1; // ERROR
        }
 
        $array = @fgetcsv($fp , 4096 , ', '); 
        $arr = array();
        $i = 0;
        foreach($yahoo_finance_tags as $key => $value) {
            $arr[$key] = $array[$i];
            $i = $i + 1;
        }
        @fclose($fp);        
        return $arr;
 
    } else {  // if the symbol is not array 
 
        return -1;
    }
    
}