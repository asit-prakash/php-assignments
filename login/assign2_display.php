<?php
   	if(isset($_POST["submit"])) 
   	{
		if ($uploadOk == 1)  
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