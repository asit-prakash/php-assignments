<?php include 'session_info.php';?>
<html>
	<head>
		<title>CONTACT DISPLAY</title>
		<link rel="stylesheet" type="text/css" href="assignment.css">
		
	</head>
	<body>
		<?php include 'assign1_validation.php';?>
		<?php include 'assign2_validation.php';?>
        <?php include 'assign4_validation.php';?>
		<form method="post" enctype="multipart/form-data" action="">  
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
		<span class="error">* <?php echo $firstnameErr;?></span>
  		<br><br>
		Full Name: 
        <input 
            disabled="disabled" 
            type = "text" 
            name="fullname" 
            id="fullname" 
            value="">
        <br><br>
        Upload Image: 
        <input 
            type="file" 
            name="fileToUpload" 
            id="fileToUpload">
		<span class="error">* <?php echo $imageErr;?></span>
		<br><br>
        Marks:
        <textarea 
            name="marks" 
            rows="5" 
            id="marks"
			placeholder="Enter sub & marks in Sub|marks format">
        </textarea>
        <br><br>
        Contact: 
        <input 
            type="text" 
            name="contact" 
            id="contact" 
            maxlength="14" 
            pattern="[+]{1}[9]{1}[1]{1}[1-9]{1}[0-9]{9}"
			placeholder="start with +91">
		<span class="error">* <?php echo $contactErr;?></span>
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
            if($_SERVER["REQUEST_METHOD"] == "POST" && $firstnameErr == "" && $lastnameErr == ""
                && $imageErr == "" && $contactErr == "")
            {
                include 'assign1_display.php';
                include 'assign2_display.php';
                include 'assign3_display.php';
                include 'assign4_display.php';
            }
        ?>
		
		<br>
        <a href="assignment1.php">ASSIGNMENT1</a>
        <br>
        <a href="assignment2.php">ASSIGNMENT2</a>
        <br>
        <a href="assignment3.php">ASSIGNMENT3</a>
        <br>
        <a href="assignment5.php">ASSIGNMENT5</a>

        </h2>
		<script type="text/javascript" src="assignment.js"></script>
	</body>
</html>