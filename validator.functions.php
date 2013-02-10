<?php
	function validateName($tempName)
	{
		if (strlen($tempName) > 0 & strlen($tempName) < 65)
		{
			if (!preg_match('/[^A-Z a-z-]/', $tempName))
				return True;
		}
		return False;
	}

	function validateEmail($tempEmail)
	{
		if (strlen($tempEmail) > 0 & strlen($tempEmail) < 65)
		{
			if (filter_var($tempEmail, FILTER_VALIDATE_EMAIL))
				return True;
		}
		return False;
	}

	function validateNumber($tempID_Number)
	{
		if (strlen($tempID_Number) == 7)
		{
			if (is_numeric($tempID_Number))
				return 1;
		}
		else if (strlen($tempID_Number) == 30)
				return 2;
		else	
			return 0;
	}
	
	function convertNumber($tempID_Number)
	{
		$tempID_Number = "{$tempID_Number[3]}{$tempID_Number[4]}{$tempID_Number[5]}{$tempID_Number[6]}{$tempID_Number[7]}{$tempID_Number[8]}{$tempID_Number[9]}";
		return $tempID_Number;
	}
?>

