<?php
$servername = "localhost";
$username = "root";
$password = "Casesensitive@6";
$dbname = "USER_DETAILS";

// Create connection
$conn=mysqli_connect($servername,$username,$password,"$dbname");
// Check connection
if(!$conn){
   die('Could not Connect My Sql:' .mysql_error());
}
//echo "Connected successfully" . "<br>";
?>
