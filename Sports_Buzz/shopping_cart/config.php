<?php
$db_username = 'root';
$db_password = 'kranthi@sriya';
$db_name = 'test';
$db_host = 'localhost';
$shipping_cost      = 100; 
$taxes              = array('VAT' => 12.73 );								
$currency = '&#8377; '; 				
$mysqli = new mysqli($db_host, $db_username, $db_password,$db_name);						
if ($mysqli->connect_error) {
    die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
}
?>