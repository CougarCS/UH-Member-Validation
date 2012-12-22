<html>
	<head>
		<title>UH Member Validation</title>
		<script>
			function setInputFocus()
			{
				document.getElementById('id_number').focus();
			}
		</script>
	</head>
	<body bgcolor='grey' onload='setInputFocus()'>
		<form action='add_member.php' method='POST'>
			Full Name: <input type='text' id='name' name='name'><br/>
			Email: <input type='text' id='email' name='email'><br/>
			UH ID: <input type='text' id='id_number' name='id_number'><br/>
			<input type='submit' value='Submit'>
		</form>
	</body>
</html>

<?php
	include("config.php");
	include("validator.functions.php");
	
	mysql_connect($DB_HOST, $DB_USER, $DB_PASS) or die("MySQL Connect Error");
	mysql_select_db($DB_NAME) or die ("MySQL Select Database Error");

	$name = mysql_real_escape_string($_POST['name']);
	$email = mysql_real_escape_string($_POST['email']);
	$id_number = $_POST['id_number'];
	
	if (!validateName($name))
		exit("Invalid Name");
	if (!validateEmail($email))
		exit("Invalid Email");
	if (!validateNumber($id_number))
		exit("Invalid ID Number");
	 if (mysql_fetch_array(mysql_query("SELECT * FROM members WHERE email='$email'")))
		exit("Email already exists");
	 if (mysql_fetch_array(mysql_query("SELECT * FROM members WHERE id_number='$id_number'")))
		exit("ID Number already exists");

	$query = "INSERT INTO members (name,email,id_number) VALUES ('$name','$email','$id_number')";	
	if (!mysql_query($query))
		exit("MySQL Query Error");
	else
		echo "$name ($id_number) has been added.";
?>

