<?php
	include("config.php");

	function validateNumber($UHID)
	{
		if (strlen($UHID) == 7)
		{
			if (is_numeric($UHID))
				return True;
			else
				return False;
		}
		else
			return False;
	}

	$cardInput = $_REQUEST['cardInput'];
	if (validateNumber($cardInput))
		{
			mysql_connect($DB_HOST, $DB_USER, $DB_PASS) or die("MySQL Connect Error");
			mysql_select_db($DB_NAME) or die ("MySQL Select Database Error");
			$data = mysql_fetch_array(mysql_query("SELECT * FROM members WHERE UH_ID='$cardInput'"));
			if ($data)
				echo "ID Found";
			else
				echo "ID Not Found";
		}
?>

<html>
	<head>
		<title>UH Member Validation</title>
		<script>
			function setInputFocus()
			{
				document.getElementById('cardInput').focus();
			}
		</script>
	</head>
	<body bgcolor='grey' onload='setInputFocus()'>
		<form action='validate.php' method='POST'>
			<input type='text' id='cardInput' name='cardInput'>
			<input type='submit' value='Submit'>
		</form>
	</body>
</html>
