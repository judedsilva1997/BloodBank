 <?php
include ('connection.php');
session_start();
if(isset($_SESSION['uid'])){
$uid=$_SESSION['uid'];
$tid=$_SESSION['tid'];
if($tid == 2 ){
	header("location: /bloodbank/admin/index.php");
}

if(isset($_POST['logout']))
{	session_start();
	session_destroy();
	header("location: sign.php");
}

if(isset($_POST['submit'])){
	$name=$_POST['name'];
	$contact=$_POST['contact'];
	$address=$_POST['address'];
	$condition=$_POST['condition'];
	$blood_group=$_POST['blood_group'];
	$quantity= $_POST['quantity'];
	
	$flag=0;
$out = "";
if (!preg_match("/^[a-zA-Z ]*$/",$condition)) {
      $emailErr = "Only letters and white space allowed in Condition\\n"; 
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
	
	$name = stripslashes($name);
	$address = stripslashes($address);
	$condition = stripslashes($condition);
	$quantity= stripslashes($quantity);
	
	$query = mysqli_query($connect, "INSERT INTO request(name, contact, uid, address,cond, blood, quantity,approve) VALUES ('$name','$contact','$uid','$address','$condition','$blood_group','$quantity',0)");
	if($query){
		$error = "A request has been made!";
		echo "<script type='text/javascript'>alert('$error');</script>";
		header("location: /bloodbank/admin/index.php");
	}
}	
}

}
else{
	header("location: sign.php");
}
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
      
        <h1>Request</h1>
        
        <fieldset>
          <legend><!--<span class="number">1</span>-->Patient Info</legend>
          <label for="name">Name:</label>
          <input type="text" id="name" name="name">
          
          <label for="mail">Contact:</label>
          <input type="number" id="contact" name="contact">
          
          <label for="name">Address:</label>
          <input type="text" id="text" name="address">
		  
		  <label for="name">Condition:</label>
          <input type="text" id="condition" name="condition">
          
          <label>Blood Group:</label>
          <input type="radio" id="A+" value="A+" name="blood_group"><label for="A+" class="light">A+</label><br>
          <input type="radio" id="A-" value="A-" name="blood_group"><label for="A-" class="light">A-</label><br>
		  <input type="radio" id="B+" value="B+" name="blood_group"><label for="B+" class="light">B+</label><br>
		  <input type="radio" id="B-" value="B-" name="blood_group"><label for="B-" class="light">B-</label><br>
		  <input type="radio" id="AB+" value="AB+" name="blood_group"><label for="AB+" class="light">AB+</label><br>
		  <input type="radio" id="AB-" value="AB-" name="blood_group"><label for="AB-" class="light">AB-</label><br>
		  <input type="radio" id="O+" value="O+" name="blood_group"><label for="O+" class="light">O+</label><br>
		  <input type="radio" id="O-" value="O-" name="blood_group"><label for="O-" class="light">O-</label><br><br>
        
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
        
          <label>Quantitiy:</label>
          <input type="radio" id="100" value="100" name="quantity"><label class="light" for="100">100ml</label><br>
            <input type="radio" id="200" value="200" name="quantity"><label class="light" for="200">200ml</label><br>
          <input type="radio" id="300" value="300" name="quantity"><label class="light" for="300">300ml</label>
        <br><br>
        <button type="submit" name = "submit">Submit</button>
		<br><br>
        <button type="submit" name = "logout">Log Out</button>
      </form>
      
    </body>
</html>