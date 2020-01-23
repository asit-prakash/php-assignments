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
                id="password"
                required>
            <br><br>
            <input
                type="submit"
                name="SUBMIT"
                id="submit"
                value="SUBMIT">
        </form>

        <?php
            if($_SERVER["REQUEST_METHOD"] == "POST")
            {
                $username=$_POST['username'];
                $password=$_POST['password'];
                if($username=='admin' && $password=='admin')
                    {
                        session_start();
                        $_SESSION['username']=$username;
                        $_SESSION['password']=$password;
                        header("Location:landingpage.php");
                    }
                else
                    {
                        echo "user id or password invalid";
                    }
            }
        ?>
    </body>
</html>

