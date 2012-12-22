Below is the command for creating the table for the database:
=============================================================
CREATE TABLE members (member_id INT NOT NULL AUTO_INCREMENT, name VARCHAR(64) NOT NULL, email VARCHAR(64) NOT NULL, id_number VARCHAR(7) NOT NULL, points INT NOT NULL DEFAULT '0', PRIMARY KEY ( member_id));
