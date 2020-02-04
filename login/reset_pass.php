<!DOCTYPE html>
<html>
    <head>
        <title>
            RESET PASSWORD
        </title>
    </head>
    <body>
        <form method="POST" action="">
            Enter your new password:
            <br><br>
            <input 
                type="password" 
                name="newpass" 
                id="newpass"
                placeholder="Enter new password"
                required>
            <br><br>
            <input 
                type="password" 
                name="confirmpass" 
                id="confirmpass"
                placeholder="ReEnter password"
                required>
            <br><br>
            <input
                type="submit"
                name="submit"
                id="submit"
                value="Reset">
        </form>
        <?php
            session_start();
            /*if(isset($_SESSION['username'])==false)
            {
              header("Location:index.php");
            }*/
            if(isset($_SESSION['username']) && isset($_SESSION['password']))
            {
                header("Location:landingpage.php");
            }
            include 'mysql.php';
            $username=$_SESSION['username'];
            if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit']))
            {
                $newpass=$_POST['newpass'];
                $confirmpass=$_POST['confirmpass'];
                if($newpass == $confirmpass)
                {
                    $passq="UPDATE SECRET_QA SET PASSWORD='$newpass' WHERE USERNAME='$username'";
                    $updatepass=mysqli_query($conn, $passq);
                    if($updatepass)
                    {
                        echo "Your password is successfully changed"."<br>";
                        echo "You will be redirected to login page where you can login with your new credentials";
                        header ('Refresh: 4; URL=index.php');
                    }
                }
                else
                {
                    echo "Your password didn't matched";
                }
            }
        ?>
    </body>
</html>