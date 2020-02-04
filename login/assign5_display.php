<?php
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		if ($emailok==1) 
		{
			echo("$email_address is a valid email address and validated by php" . "<br>");
			$_SESSION['email_address']=$email_address;
		} 

		/*if(!$email_address == "")
		{
			//set API Access Key
			$access_key = '2894e27f00ecd6aedb7e433806b3894e';
			// Initialize CURL:
			$ch = curl_init('http://apilayer.net/api/check?access_key='.$access_key.'&email='.$email_address.'');  
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
						
			// Receive the data:
			$json = curl_exec($ch);
			curl_close($ch);
						
			// Decode JSON response:
			$validationResult = json_decode($json, true);
			if ($validationResult['format_valid'] && $validationResult['smtp_check']) 
			{
				echo "Email is validated by api" . "<br>";
				$_SESSION['email_address']=$email_address;
			} 
			else 
			{
				echo "Email is not valid(api)";
			}
		}*/
	}
?>