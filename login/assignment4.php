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
		<title>CONTACT DISPLAY</title>
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
        <?php
			$contact = $contactErr = "";
			$contactok=0;
				if($_SERVER["REQUEST_METHOD"] == "POST")
				{
					if(isset($contact))
					{
						$contact=test_input($_POST["contact"]);
						if (preg_match("/^[+]{1}[9]{1}[1]{1}[1-9]{1}[0-9]{9}$/",$contact))
					    {
							$contactok=1;
				   		}
				   		else 
				   		{
				   			$contactErr = "Enter a valid contact number";
				   		}
					}
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
        Marks:
        <textarea 
            name="marks" 
            rows="5" 
            id="marks">
		</textarea>
        <br><br>
        Contact: 
        <input 
            type="text" 
            name="contact" 
            id="contact" 
            maxlength="14" 
            pattern="[+]{1}[9]{1}[1]{1}[1-9]{1}[0-9]{9}">
		<span class="error">* <?php echo $contactErr;?></span>
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
						//echo "File is not an image.";
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
                    $image_path="/var/www/html/login/uploads/".$_FILES["fileToUpload"]["name"];
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
			
			if(isset($_POST["submit"]))
			{
				$marks=$_POST['marks'];
				$marks=preg_replace('/(\r\n|\r|\n)+/', "\n", $marks);
				$marks=preg_replace('/[|]/', "\n", $marks);
				$marks_split=explode("\n", $marks);
				$marks_count=count($marks_split);
				$_SESSION['marks_split']=$marks_split;
				$_SESSION['marks_count']=$marks_count;
				echo "<table border='1px solid black'>";
					echo "<tr>";
						echo "<th>Subject</th>";
						echo "<th>Marks</th>";
					echo "</tr>";

				for($i=0;$i<$marks_count;$i++) 
				{
				    echo "<tr>";
				    echo "<td>".$marks_split[$i]."</td>";
				    echo "<td>".$marks_split[$i++]."</td>";
				    echo "</tr>";
				}
				echo "</table>";
			}			
		?>
		<?php
			if(isset($_POST["submit"]))
			{

				if($contactok=1)
				{
					echo "CONTACT: " . $contact . "<br>";
					$_SESSION['contact']=$contact;
				}
			}
		?>
        <?php
            if($_SERVER["REQUEST_METHOD"] == "POST" && $firstname_check && $lastname_check)
            {
                echo "<a href='assignment4_upload.php'>Download Response</a>"."<br>";
            }
		?>
		<br>
        <a href="assignment1.php">ASSIGNMENT1</a>
        <br>
        <a href="assignment2.php">ASSIGNMENT2</a>
        <br>
        <a href="assignment3.php">ASSIGNMENT3</a>
        <br>
        <a href="assignment5.php">ASSIGNMENT5</a>

        </h2>
	</body>
</html>