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
	if($tid=1) // Initializing Session
		header("location: profile.php"); // Redirecting To Other Page
} else {
$error = "Username or Password is invalid";
echo "<script type='text/javascript'>alert('$error');</script>";
}
mysqli_close($connect); // Closing Connection
}
}
?>