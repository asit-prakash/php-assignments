<?php
			$fullname=$firstname." ".$lastname;
			//$fullname_check=preg_match("/^[a-zA-Z ]+$/",$fullname);
			if ($firstname_check && $lastname_check)
                {
                    echo $fullname ."<br>";
                    $_SESSION['fullname']=$fullname;
                }
   		?>