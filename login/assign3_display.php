<?php
	if(isset($_POST["submit"]))
	{
		$marks=$_POST['marks'];
		$marks=preg_replace('/(\r\n|\r|\n)+/', "\n", $marks);
		$marks=preg_replace('/[|]/', "\n", $marks);
		$marks_split=explode("\n", $marks);
		$marks_count=count($marks_split);
		$_SESSION['$marks_split']=$marks_split;
		$_SESSION['$marks_count']=$marks_count;
		echo "<table border='1px solid black'>";
			echo "<tr>";
				echo "<th>Subject</th>";
				echo "<th>Marks</th>";
			echo "</tr>";

			for($i=0;$i<$marks_count;$i++) 
			{
			    echo "<tr>";
				echo "<td>".$marks_split[$i]."</td>";
			    echo "<td>".$marks_split[++$i]."</td>";
			    echo "</tr>";
			}
		echo "</table>";
	}			
?>