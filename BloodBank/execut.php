<?php
include ('connection.php');
session_start(); // Starting Session
$error=''; // Variable To Store Error Message
if (isset($_POST['submit'])) {
if (empty($_POST['username']) || empty($_POST['password'])) {
$error = "Username or Password is invalid";
echo "<script type='text/javascript'>alert('$error');</script>";
}
else
{
// Define $username and $password
$username=$_POST['username'];
$password=$_POST['password'];
$flag=0;
$out = "";
if (!filter_var($username, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format"; 
	  $out = $out . $emailErr;
	  $flag=1;
    }
if($flag==1){
	echo "<script type='text/javascript'>alert('$out');</script>";
}
else{
// To protect MySQL injection for Security purpose
$username = stripslashes($username);
$password = stripslashes($password);


// SQL query to fetch information of registerd users and finds user match.
$query = mysqli_query( $connect,"select * from userlogin where password='$password' AND username='$username'");
$rows = mysqli_num_rows($query);
$out= mysqli_fetch_assoc($query);
$tid=$out['tid'];
if ($rows == 1) {
	$_SESSION['uid']=$out['uid'];
	$_SESSION['tid']=$out['tid'];
	$_SESSION['name']=$out['name'];
	if($out['tid']==1){
		header("location: /bloodbank/admin1/index.php");
	}
	else{
		header("location: /bloodbank/admin/index.php");
	}
} else {
$error = "Username or Password is invalid";
echo "<script type='text/javascript'>alert('$error');</script>";
}
}
mysqli_close($connect); // Closing Connection
}
}
if (isset($_POST['submit2'])) {
if (empty($_POST['username']) || empty($_POST['password'])) {
$error = "Username or Password is invalid";
echo "<script type='text/javascript'>alert('$error');</script>";
}
else
{
// Define $username and $password
$username=$_POST['username'];
$password=$_POST['password'];
$name=$_POST['iname'];
$contact=$_POST['contact'];
$reg=$_POST['reg'];
$flag=0;
$out = "";
if (!filter_var($username, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format\\n"; 
	  $out = $out . $emailErr;
	  $flag=1;
    }
 if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed\\n"; 
	  $out = $out . $nameErr;
	  $flag=1;
	  
    }
	if (!preg_match("/^[789]\d{9}$/",$contact)) {
      $nameErr = "Not a valid mobile number\\n"; 
	  $out = $out . $nameErr;
	  $flag=1;
    }
if($flag==1){
	echo "<script type='text/javascript'>alert('$out');</script>";
}
else{
// To protect MySQL injection for Security purpose
$username = stripslashes($username);
$password = stripslashes($password);
$name = stripslashes($name);
$contact = stripslashes($contact);
$reg = stripslashes($reg);

$query= mysqli_query($connect,"INSERT INTO userlogin(tid,username, password, name,contact, reg) VALUES (1,'$username','$password','$name','$contact','$reg')");
if($query){
$error="Successful";
echo "<script type='text/javascript'>alert('$error');</script>";
}
}
mysqli_close($connect); // Closing Connection
}
}
?>