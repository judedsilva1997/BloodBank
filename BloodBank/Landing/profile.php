<?php
session_start();
$uid=$_SESSION['uid'];
echo $uid;
if(isset($_POST['logout']))
{	session_start();
	session_destroy();
	header("location: login.php");
}
?>
<html>
<body>
logged in
<form method = "post">
	<input type = "submit" name="logout" value= "Log Out">
</form>
</body>
<html>