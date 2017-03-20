<?php

session_start();
if(isset($_SESSION['uid'])&& $_SESSION['tid']==2){
$uid=$_SESSION['uid'];


}
else{
	header("location: ../sign.php");
}
?>
 <?php
include ('connection.php');
/*session_start();
if(isset($_SESSION['uid'])){
$uid=$_SESSION['uid'];

if(isset($_POST['logout']))
{	session_start();
	session_destroy();
	header("location: sign.php");
}
*/
if(isset($_POST['submit'])){
	$name=$_POST['name'];
	$contact=$_POST['contact'];
	$address=$_POST['address'];
	$flag=0;
	$out = "";
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
	
	$name = stripslashes($name);
	$address = stripslashes($address);
	
	
	
	$query = mysqli_query($connect, "INSERT INTO donors(name, contact, address,quantity) VALUES ('$name','$contact','$address',0)");
	if($query){
		
		$error = "Donor info added";
		echo "<script type='text/javascript'>alert('$error');</script>";
		header("location: ../");
	}
}
}

/*}
else{
	header("location: sign.php");
}*/
mysqli_close($connect);
?>
 <html>
 <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Request Form</title>
        <link rel="stylesheet" href="css/normalize.css">
        <link href='http://fonts.googleapis.com/css?family=Nunito:400,300' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="css/main.css">
    </head>
    <body>

      <form method ="post" >
      
        <h1>ADD</h1>
        
        <fieldset>
          <legend><!--<span class="number">1</span>-->Donor Info</legend>
          <label for="name">Name:</label>
          <input type="text" id="name" name="name">
          
          <label for="mail">Contact:</label>
          <input type="number" id="contact" name="contact">
          
          <label for="name">Address:</label>
          <input type="text" id="text" name="address">
		  
          
        
        <!--<label for="job">Job Role:</label>
        <select id="job" name="user_job">
          <optgroup label="Web">
            <option value="frontend_developer">Front-End Developer</option>
            <option value="php_developor">PHP Developer</option>
            <option value="python_developer">Python Developer</option>
            <option value="rails_developer"> Rails Developer</option>
            <option value="web_designer">Web Designer</option>
            <option value="WordPress_developer">WordPress Developer</option>
          </optgroup>
          <optgroup label="Mobile">
            <option value="Android_developer">Androild Developer</option>
            <option value="iOS_developer">iOS Developer</option>
            <option value="mobile_designer">Mobile Designer</option>
          </optgroup>
          <optgroup label="Business">
            <option value="business_owner">Business Owner</option>
            <option value="freelancer">Freelancer</option>
          </optgroup>
          <optgroup label="Other">
            <option value="secretary">Secretary</option>
            <option value="maintenance">Maintenance</option>
          </optgroup>
        </select>-->
        
          
        <br><br>
        <button type="submit" name = "submit">Submit</button>

      </form>
      
    </body>
</html>