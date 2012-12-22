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
		<form action='validate_member.php' method='POST'>
			<input type='text' id='id_number' name='id_number'>
			<input type='submit' value='Submit'>
		</form>
	</body>
</html>

<?php
	include("config.php");
	include("validator.functions.php");

	mysql_connect($DB_HOST, $DB_USER, $DB_PASS) or die("MySQL Connect Error");
	mysql_select_db($DB_NAME) or die ("MySQL Select Database Error");

	$id_number = $_POST['id_number'];
	if (!validateNumber($id_number))
		exit("Invalid ID Number");
	$data = mysql_fetch_array(mysql_query("SELECT * FROM members WHERE id_number='$id_number'"));
	if (!$data)
		exit("ID Not Found");
	echo "ID Found<br/>";
	echo "$data[name]<br/>$data[email]<br/>$data[id_number]<br/>$data[points]<br/>";
?>

