<?php
	session_start();	
?>
<html>
	<head>
		<title>FULLNAME DISPLAY</title>
		<link rel="stylesheet" type="text/css" href="name.css">
		<script type="text/javascript" src="name.js"></script>
	</head>

	<body>
		<?php
		$firstnameErr = $lastnameErr = "";//name-input-Error variable
		$firstname = $lastname = $fullname = "";//name-input variable
		$firstname_check = $lastname_check =""; //name-input-patter-check variable
        
		if ($_SERVER["REQUEST_METHOD"] == "POST")
		{
            $firstname = test_input($_POST["firstname"]);
            $firstname_check=preg_match("/^[a-zA-Z]+$/",$firstname);
	    	// check if name only contains letters
	    	if (!$firstname_check)
	    	{
	    		$firstnameErr = "Only letters and white space allowed";
   			}
               $lastname = test_input($_POST["lastname"]);
               $lastname_check=preg_match("/^[a-zA-Z]+$/",$lastname);
	    	if (!$lastname_check)
	    	{
	    		$lastnameErr = "Only letters and white space allowed";
   			}
		}
		function test_input($data) 
		{
		  $data = trim($data);//remove extra spaces
		  $data = stripslashes($data);//remove slashes
		  $data = htmlspecialchars($data);//convert special characters into html entities
		  return $data;//return pure data
		}
		?>

		<form method="post" id="form1" action="">  
		First Name: 
        <input 
            type="text" 
            name="firstname" 
            id="firstname">
		<span class="error">* <?php echo $firstnameErr;?></span>
  		<br><br>
		Last Name: 
        <input 
            type="text" 
            name="lastname" 
			id="lastname">
		<span class="error">* <?php echo $firstnameErr;?></span>
  		<br><br>
		Full Name: 
        <input 
            disabled="disabled" 
            type = "text" 
            name="fullname" 
            id="fullname" 
            value="">
        <br>
		<input type="submit" name="submit" value="Submit">
		</form>

		<h2>Welcome
		<?php
			$fullname=$firstname." ".$lastname;
			//$fullname_check=preg_match("/^[a-zA-Z ]+$/",$fullname);
			if ($firstname_check && $lastname_check)
                {
                    echo $fullname ."<br>";
                    $_SESSION['fullname']=$fullname;
                }
   		?>
        <?php
            if($_SERVER["REQUEST_METHOD"] == "POST" && $firstname_check && $lastname_check)
            {
                echo "<a href='formupload.php'>Download Response</a>"."<br>";
            }
        ?>
		</h2>
		
	</body>
	
	
</html>