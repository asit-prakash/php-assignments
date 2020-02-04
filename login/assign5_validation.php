<?php
    $email_address=$emailErr="";
    $emailok=0;
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$email_address=$_POST["email"];
		$email_address=test_input($email_address);
		$email_address = filter_var($email_address, FILTER_SANITIZE_EMAIL);
		if (!filter_var($email_address, FILTER_VALIDATE_EMAIL) === false) 
		{
			$emailok=1;
		} 
		else 
		{
			$emailErr="Enter a valid email address";
         }
    }
?>