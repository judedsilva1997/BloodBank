<?php
define('hostname','localhost');
define('username','id864999_jd');
define('password','ashishfuckoff');
define('database','id864999_bloodbank');

$connect = mysqli_connect(hostname,username,password,database);
if ($connect->connect_error) {
    die("Error");
} 

?>