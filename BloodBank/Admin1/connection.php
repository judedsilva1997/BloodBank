<?php
define('hostname','localhost');
define('username','root');
define('password','');
define('database','bloodbank');

$connect = mysqli_connect(hostname,username,password,database);
if ($connect->connect_error) {
    die("Error");
} 

?>