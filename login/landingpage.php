<?php include 'session_info.php';?>
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
        <?php include 'get_path.php';?>
    </body>
</html>