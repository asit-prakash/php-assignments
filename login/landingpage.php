<?php
    session_start();
    $username=$_SESSION['username'];
    $password=$_SESSION['password'];
    if($username!='admin' && $password!='admin')
        {
            header("Location:index.php");
        }
?>
<html>
    <head>
        <title>PHP ASSIGNMENTS</title>
    </head>
    <body>
        <h2>PHP-ASSIGNMENTS
        <br>
        <a href="assignment1.php">ASSIGNMENT1</a>
        <br>
        <a href="assignment2.php">ASSIGNMENT2</a>
        <br>
        <a href="assignment3.php">ASSIGNMENT3</a>
        <br>
        <a href="assignment4.php">ASSIGNMENT4</a>
        <br>
        <a href="assignment5.php">ASSIGNMENT5</a>
        <br><br>
        </h2>
        <form id="loginform" method="post" action="" >
            <input
                type="submit"
                name="logout"
                id="logout"
                value="LOGOUT">
        </form>
        <?php
            if($_SERVER["REQUEST_METHOD"] == "POST")
            {
                if(isset($_POST['logout']))
                    {
                    session_destroy();
                    header("Location:index.php");
                    } 
            }
        ?>
    </body>
</html>