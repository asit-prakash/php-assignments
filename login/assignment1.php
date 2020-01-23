<?php
	session_start();
    $username=$_SESSION['username'];
    $password=$_SESSION['password'];
    if($username!='admin' && $password!='admin')
        {
            header("Location:index.php");
        }
?>	
<html>
	<head>
		<title>FULLNAME DISPLAY</title>
		<link rel="stylesheet" type="text/css" href="assignment.css">
		<script type="text/javascript" src="assignment.js"></script>
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
        <br><br>
		<input 
			type="submit" 
			name="submit" 
			value="SUBMIT">
		<input
            type="submit"
            name="logout"
            id="logout"
            value="LOGOUT">
		</form>
		<?php
            if($_SERVER["REQUEST_METHOD"] == "POST")
            {
                if(isset($_POST['logout']))
                {
                    session_destroy();
                    header("Location:index.php");
                } 
			}
			if(isset($_GET["q"]))
        {
            $get_path = $_GET["q"];
            if($get_path == '1')
            {
                header("location:assignment1.php");
                exit;
            }
            if($get_path == '2')
            {
                header("location:assignment2.php");
                exit;
            }
            if($get_path == '3')
            {
                header("location:assignment3.php");
                exit;
            }
            if($get_path == '4')
            {
                header("location:assignment4.php");
                exit;
            }
            if($get_path == '5')
            {
                header("location:assignment5.php");
                exit;
            }
        }
        ?>

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
                echo "<a href='assignment1_upload.php'>Download Response</a>"."<br>";
            }
		?>
		<br>
        <a href="assignment2.php">ASSIGNMENT2</a>
        <br>
        <a href="assignment3.php">ASSIGNMENT3</a>
        <br>
        <a href="assignment4.php">ASSIGNMENT4</a>
        <br>
        <a href="assignment5.php">ASSIGNMENT5</a>
		</h2>
		
	</body>
	
	
</html>