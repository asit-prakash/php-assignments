<?php
	session_start();	
?>
<html>
	<head>
		<title>IMAGE DISPLAY</title>
		<link rel="stylesheet" type="text/css" href="image.css">
		<script type="text/javascript" src="image.js"></script>
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

		<form method="post" enctype="multipart/form-data" action="">  
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
        Upload Image: 
        <input 
            type="file" 
            name="fileToUpload" 
            id="fileToUpload">
		<br><br>
		<input type="submit" name="submit" value="Submit">
		</form>

		<h2>Welcome</h2>
		<?php
            $fullname=$firstname." ".$lastname;
			if ($firstname_check && $lastname_check)
                {
                    echo $fullname ."<br>";
                    $_SESSION['fullname']=$fullname;
                }
   			
   		?>

		<?php
		if(isset($_POST["submit"])) 
		{
			$image_path='';
			$filename=$_FILES["fileToUpload"]["name"];
			$temp_filename=$_FILES["fileToUpload"]["tmp_name"];
            $target_dir = "./uploads/".$filename;
			$target_file = $target_dir . basename($filename);
			$uploadOk = 1;
			$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
			// Check if image file is a actual image or fake image
			
			if(!empty($filename))
			{
				$check = getimagesize($temp_filename);
				if($check !== false) 
				{
					//echo "File is an image - " . $check["mime"] . ".";
					$uploadOk = 1;
				} 
				else 
				{
					echo "File is not an image.";
					$uploadOk = 0;
				}
			}
		}
			
			    
			
		?>
        <?php
   			if(isset($_POST["submit"])) 
   			{

				if ($uploadOk == 0) 
				{
				    echo "Sorry, your file was not uploaded.";
					// if everything is ok, try to upload file
				} 
				else 
				{
                    $image_path="/var/www/html/php-assignments/image-form/uploads/".$_FILES["fileToUpload"]["name"];
				    if (move_uploaded_file($temp_filename, $target_dir)) 
				    {
				        //echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
                        echo "<img src=$target_dir>"."<br>";
                        
                        $_SESSION['image_path']=$image_path;
				    } 
				    else
				    {
				        echo "Sorry, there was an error uploading your file.";
				    }
				}
   			}
   		?>
        <?php
            if($_SERVER["REQUEST_METHOD"] == "POST" && $firstname_check && $lastname_check)
            {
                echo "<a href='formupload.php'>Download Response</a>"."<br>";
            }
        ?>

        
	</body>
</html>