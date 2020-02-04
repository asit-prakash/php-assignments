<?php
    session_start();
    $username=$_SESSION['username'];
    $password=$_SESSION['password'];
    if(!$username && !$password)
        {
            header("Location:index.php");
        }
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if(isset($_POST['logout']))
        {
            session_destroy();
            header("Location:index.php");
        }
    }
?>