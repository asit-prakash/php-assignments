<?php
    session_start();
    ob_start();

    $fullname_display=$_SESSION['fullname'];
    $image_display=$_SESSION['image_path'];
    $marks_split_display=$_SESSION['marks_split'];
    $marks_count_display=$_SESSION['marks_count'];
    $contact_display=$_SESSION['contact'];

    //file download to user
    header("Content-type: application/vnd.ms-word");
    header("Content-Disposition: attachment;Filename=response.doc");
    echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=Windows-1252\">";
    echo "<br>" ."FULLNAME: " . $fullname_display . "</br>";
    echo "<br>" ."IMAGE: " . "<img src='$image_display' width='200px' height='200px'>" . "</br>";
    echo "MARKS: " ."<table border='1px solid black'>";
	echo "<tr>";
		echo "<th>Subject</th>";
		echo "<th>Marks</th>";
	echo "</tr>";

	for($i=0;$i<$marks_count_display;$i++) 
		{
			echo "<tr>";
			echo "<td>".$marks_split_display[$i]."</td>";
			echo "<td>".$marks_split_display[$i++]."</td>";
			echo "</tr>";
		}
    echo "</table>";
    echo "<br>" . "Contact: " . $contact_display . "<br>";

    //file upload to sever
    $content = ob_get_contents();
    file_put_contents('/var/www/html/php-assignments/contact-form/uploads/form-response.doc',$content);
?>