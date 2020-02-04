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