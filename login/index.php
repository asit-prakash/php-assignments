<html>
    <head>
        <title>LOGIN PAGE</title>
    </head>
    <body>
        <form id="loginform" method="post" action="" >
            <input
                type="text"
                placeholder="Enter Username"
                name="username"
                id="username"
                required>
            <br><br>
            <input
                type="password"
                placeholder="Enter Password"
                name="password"
                id="password">
            <br><br>
            <input
                type="submit"
                name="login"
                id="login"
                value="Login">
            <br><br>
            <input
                type="submit"
                name="forget"
                id="forget"
                value="Forget Password">

        </form>
    </body>
</html>
<?php
    include 'mysql.php';
    session_start();
    $_SESSION['last_action'] = time();
    if(isset($_SESSION['username']) && isset($_SESSION['password']))
    {
        header("Location:landingpage.php");
    }
    elseif($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login']))
    {
        $username=$_POST['username'];
        $password=$_POST['password'];
        $auth="SELECT * FROM SECRET_QA WHERE USERNAME='$username' AND PASSWORD='$password'";
        $query=mysqli_query($conn, $auth);
        $count=mysqli_num_rows($query);
        if($count==1)
        {
            $_SESSION['username']=$username;
            $_SESSION['password']=$password;
            header("Location:landingpage.php");
        }
        else
        {
            echo "user id or password invalid";
        }
    }
    elseif($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['forget']))
    {
        $username=$_POST['username'];
        $auth="SELECT * FROM SECRET_QA WHERE USERNAME='$username'";
        $query=mysqli_query($conn, $auth);
        $count=mysqli_num_rows($query);
        if($count==1)
        {
            $_SESSION['username']=$username;
            header("Location:forget_pass.php");
        }
        else
        {
            echo "user id invalid";
        }
    }
?>

