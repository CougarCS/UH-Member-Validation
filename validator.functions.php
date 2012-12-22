<?php
	function validateName($tempName)
	{
		if (strlen($tempName) > 0 & strlen($tempName) < 65)
		{
			if (!preg_match('/[^A-Za-z-]/', $tempName))
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
				return True;
		}
		return False;
	}
?>
