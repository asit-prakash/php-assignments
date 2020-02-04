<!DOCTYPE html>
<html>
    <head>
        <title>
            FORGET PASSWORD
        </title>
    </head>
    <body>
        <?php
            session_start();
            /*if(isset($_SESSION['username'])===false)
            {
                header("Location:index.php");
            }*/
            if(isset($_SESSION['username']) && isset($_SESSION['password']))
            {
                header("Location:landingpage.php");
            }
            include 'mysql.php';
            $username=$_SESSION['username'];
            $ques="SELECT QUESTION FROM SECRET_QA WHERE USERNAME='$username'";
            $getq=mysqli_query($conn, $ques);
            $row = mysqli_fetch_assoc($getq);
            foreach($row as $key=>$value)
            {
                echo "Your security question: "."$value"."<br>";
            }
        ?>
        <form method="POST" action="">
            <input 
                type="password" 
                name="answer" 
                id="answer"
                placeholder="Enter your answer"
                required>
            <br><br>
            <input
                type="submit"
                name="submit"
                id="submit"
                value="Submit">
        </form>
        <?php
            if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit']))
            {
                $answer=$_POST['answer'];
                $ansq="SELECT USERNAME FROM SECRET_QA WHERE ANSWER='$answer'";
                $sqlans=mysqli_query($conn,$ansq);
                $user= mysqli_fetch_assoc($sqlans);
                $userdb=$user['USERNAME'];
                if(!strcasecmp("$username","$userdb"))
                {
                    header("Location:reset_pass.php");
                }
                else
                {
                    echo "You have entered wrong answer";
                }
            }
        ?>
    </body>
</html>