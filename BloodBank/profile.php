<?php

session_start();
if(isset($_SESSION['uid'])){
$uid=$_SESSION['uid'];
if(isset($_POST['logout']))
{	session_start();
	session_destroy();
	header("location: sign.php");
}

}
else{
	header("location: sign.php");
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