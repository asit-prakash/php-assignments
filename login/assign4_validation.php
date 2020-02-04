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