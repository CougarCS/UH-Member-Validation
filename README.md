Summary:
========
This is mainly being developed by CougarCS for CougarCS. The purpose of this script is to validate our members during events. We will be able to populate the database with current members and their UH ID numbers. When a member's ID is inputted into the validation box, or their CougarCard is swiped (coming soon), the script will check to see if they exist in the members table of the database and will report their records if so.



Change Log:
==========
V1.0:

	-Errors will no longer show up when first loading the page

	-Consistent styles for errors

	-Validates emails correctly

	-Now uses stylesheets properly

Below is the command for creating the table for the database:
=============================================================
CREATE TABLE members (member_id INT NOT NULL AUTO_INCREMENT, name VARCHAR(64) NOT NULL, email VARCHAR(64) NOT NULL, id_number VARCHAR(7) NOT NULL, points INT NOT NULL DEFAULT '0', PRIMARY KEY ( member_id));
