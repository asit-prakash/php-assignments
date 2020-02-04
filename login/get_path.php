<?php
if(isset($_GET["q"]))
    {
        $get_path = $_GET["q"];
        if($get_path == '1')
        {
            header("location:assignment1.php");
            exit;
        }
        if($get_path == '2')
        {
            header("location:assignment2.php");
            exit;
        }
        if($get_path == '3')
        {
            header("location:assignment3.php");
            exit;
        }
        if($get_path == '4')
        {
            header("location:assignment4.php");
            exit;
        }
        if($get_path == '5')
        {
            header("location:assignment5.php");
            exit;
        }
    }
?>