<?php include 'session_info.php';?>
<html>
	<head>
		<title>FULLNAME DISPLAY</title>
		<link rel="stylesheet" type="text/css" href="assignment.css">
	</head>
	<body>
    <?php include 'assign1_validation.php';?>
		<form method="post" id="form1" action="">  
		First Name: 
        <input 
            type="text" 
            name="firstname" 
            id="firstname"
            placeholder="Enter Firstname">
		<span class="error">* <?php echo $firstnameErr;?></span>
  		<br><br>
		Last Name: 
        <input 
            type="text" 
            name="lastname" 
			id="lastname"
            placeholder="Enter Lastname">
		<span class="error">* <?php echo $lastnameErr;?></span>
  		<br><br>
		Full Name: 
        <input 
            disabled="disabled" 
            type = "text" 
            name="fullname" 
            id="fullname" 
            value="">
        <br><br>
		<input 
			type="submit" 
			name="submit" 
			value="SUBMIT">
		<input
            type="submit"
            name="logout"
            id="logout"
            value="LOGOUT">
		</form>
        <?php include 'get_path.php';?>
		<h2>Welcome
		<?php
            if($_SERVER["REQUEST_METHOD"] == "POST" && $firstnameErr == "" && $lastnameErr == "")
            {
                include 'assign1_display.php';
            }
        ?>
		<br>
        <a href="assignment2.php">ASSIGNMENT2</a>
        <br>
        <a href="assignment3.php">ASSIGNMENT3</a>
        <br>
        <a href="assignment4.php">ASSIGNMENT4</a>
        <br>
        <a href="assignment5.php">ASSIGNMENT5</a>
		</h2>
		<script type="text/javascript" src="assignment.js"></script>
	</body>
</html>

