<?php

session_start();

define('SITEURL','http://localhost/AgroCity_E-commerce/');
define('DB_SERVER','localhost');
define('DB_USERNAME','root');
define('DB_PASSWORD','');
define('DB_NAME','sgp');

$conn=mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_NAME);
$db_select=mysqli_select_db($conn, DB_NAME);
if($conn==false)
{
    dir('Error: Cannot connect'); 
}
?>