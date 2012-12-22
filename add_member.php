<html>
	<head>
	<link rel="stylesheet" href="style.css" type="text/css">
		<title>UH Member Validation</title>
	</head>
	<body onload='setInputFocus()'>
	<div id='logo'><img width='75%' src='http://kernelmeltdown.org/images/CSLogoBigForRed_small.png'/></div>
	<div id='links'><a href='add_member.php'>Add Member</a> | <a href='validate_member.php'>Validate Member</a></div>
	<div id='main'>	
	<form action='add_member.php' method='POST'>
			<b>Full Name:<b/><br/>
			<input type='text' id='name' name='name'><br/>
			<b>Email:</b><br/>
			<input type='text' id='email' name='email'><br/>
			<b>UH ID:</b><br/>
			<input type='text' id='id_number' name='id_number'><br/>
			<input type='hidden' id='submitted' name='submitted' value='1'>
			<input type='submit' value='Submit'><br/>
		</form>
	</div>
	<div id='status'>
<?php
	include("config.php");
	include("validator.functions.php");
	
	mysql_connect($DB_HOST, $DB_USER, $DB_PASS) or die("MySQL Connect Error");
	mysql_select_db($DB_NAME) or die ("MySQL Select Database Error");

	$submitted = $_POST['submitted'];
	$name = mysql_real_escape_string($_POST['name']);
	$email = mysql_real_escape_string($_POST['email']);
	$id_number = $_POST['id_number'];
	
	if (!$submitted)
		exit;
	if (!validateName($name))
		exit("<span id='error'>Invalid Name</span>");
	if (!validateEmail($email))
		exit("<span id='error'>Invalid Email</span");
	if (!validateNumber($id_number))
		exit("<span id='error'>Invalid ID Number</span>");
	 if (mysql_fetch_array(mysql_query("SELECT * FROM members WHERE email='$email'")))
		exit("<span id='error'>Email already exists</span>");
	 if (mysql_fetch_array(mysql_query("SELECT * FROM members WHERE id_number='$id_number'")))
		exit("<span id='error'>ID Number already exists</span>");

	$query = "INSERT INTO members (name,email,id_number) VALUES ('$name','$email','$id_number')";	
	if (!mysql_query($query))
		exit("MySQL Query Error");
	else
		echo "<div id='good'><b>$name</b> (<i>$id_number</i>) has been added.</div>";
?>
</div>
</body>
</html>
