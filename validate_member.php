<html>
	<head>
		<link rel="stylesheet" href="style.css" type="text/css">
		<title>UH Member Validation</title>
		<script>
			function setInputFocus()
			{
				document.getElementById('id_number').focus();
			}
		</script>
	</head>
	<body onload='setInputFocus()'>
		<form action='validate_member.php' method='POST'>
			<b>UH ID Number:</b><br/>
			<input type='text' id='id_number' name='id_number'><br/>
			<input type='hidden' id='submitted' name='submitted' value='1'>
			<input type='submit' value='Submit'><br/>
		</form>
	</body>
</html>

<?php
	include("config.php");
	include("validator.functions.php");

	mysql_connect($DB_HOST, $DB_USER, $DB_PASS) or die("MySQL Connect Error");
	mysql_select_db($DB_NAME) or die ("MySQL Select Database Error");

	$submitted = $_POST['submitted'];
	$id_number = $_POST['id_number'];

	if (!$submitted)
		exit;
	if (!validateNumber($id_number))
		exit("<span id='error'>Invalid ID Number</span>");
	$data = mysql_fetch_array(mysql_query("SELECT * FROM members WHERE id_number='$id_number'"));
	if (!$data)
		exit("<span id='error'>ID Not Found</span>");
	echo "$data[name]<br/>$data[email]<br/>$data[id_number]<br/>$data[points]<br/>";
?>

