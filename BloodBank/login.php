<?php
include('execut.php'); 
if(isset($_SESSION['uid'])){
header("location: profile.php");
}
?>
<html>
<head>
<title></title>
</head>
<body>
<form method = "post" >
User ID :  <input type="text" name="username" />
<br>
Password:  <input type="password" name="password" />
<br>
<input type="submit" name="submit" value="Submit" />
</form>
</body>
</html>