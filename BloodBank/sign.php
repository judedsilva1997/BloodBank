<?php
include('execut.php'); 
if(isset($_SESSION['uid'])){
	if($_SESSION['tid']==1)
		header("location: /bloodbank/admin1/index.php");
	else
		header("location: /bloodbank/admin/index.php");
}
?>
<html >
<head>
  <meta charset="UTF-8">
  <title>Find Me Blood</title>
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

  <link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900|RobotoDraft:400,100,300,500,700,900'>
<link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>

      <link rel="stylesheet" href="css/style.css">

  
</head>
<body>
  
<!-- Mixins-->
<!-- Pen Title-->
<div class="pen-title">
  <h1><div class="footer"><a href="index.html" style = "color: 	#A9A9A9;text-decoration: none;">Find Me Blood</a></div></h1>
</div>
<div class="container">
  <div class="card"></div>
  <div class="card">
    <h1 class="title">Login</h1>
    <form method = "post" name = "form1">
      <div class="input-container">
        <input type="#{type}" id="#{label}" name ="username" required="required"/>
        <label for="#{label}">Username</label>
        <div class="bar"></div>
      </div>
      <div class="input-container">
        <input type="password" id="#{label}" name = "password" required="required"/>
        <label for="#{label}">Password</label>
        <div class="bar"></div>
      </div>
      <div class="button-container">
        <button name="submit"><span>Go</span></button>
      </div>
    </form>
  </div>
  <div class="card alt">
    <div class="toggle"></div>
    <h1 class="title">Register
      <div class="close"></div>
    </h1>
    <form method = "post">
	  <div class="input-container">
        <input type="#{type}" id="#{label}" name ="iname" required="required"/>
        <label for="#{label}">Institution Name</label>
        <div class="bar"></div>
      </div>
	<div class="input-container">
        <input type="number" id="#{label}" name = "contact" required="required"/>
        <label for="#{label}">Contact Number</label>
        <div class="bar"></div>
      </div>
	  <div class="input-container">
        <input type="#{type}" id="#{label}" name = "reg" required="required"/>
        <label for="#{label}">Registration Number</label>
        <div class="bar"></div>
      </div>
      <div class="input-container">
        <input type="#{type}" id="#{label}" name = "username" required="required"/>
        <label for="#{label}">Email-id</label>
        <div class="bar"></div>
      </div>
      <div class="input-container">
        <input type="password" id="#{label}" name = "password" required="required"/>
        <label for="#{label}">Password</label>
        <div class="bar"></div>
      </div>
      <div class="button-container">
        <button name="submit2"><span>Next</span></button>
      </div>
    </form>
  </div>
</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src="js/index.js"></script>

</body>
</html>
