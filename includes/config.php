<?php
session_start();
// $host="localhost";
// $user="fmcgblog_imfoodieuser"; //mysql user name
// $password="N@vo6D26TKRh";
// $database="fmcgblog_imfoodie";

// define('BASE_URL', 'https://imfoodie.in/');
// define('ADMIN_URL', 'https://imfoodie.in/zfoodie/');

$host="localhost";
$user="root"; //mysql user name
$password="";
$database="iamfoodie2";

define('BASE_URL', 'http://localhost/my-admin/');
define('ADMIN_URL', 'http://localhost/my-admin/zfoodie/');
$con= mysqli_connect($host, $user, $password, $database);

if(!$con){
    echo "connect error occur: ".mysqli_connect_error();
}

?>