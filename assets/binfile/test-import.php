<?php

	header("Content-Type: text/plain");

	include 'mysql_import.php';
	
	if(mysql_import('dump.sql', 'localhost', 'lab_db', 'root', ''))
	{
		echo 'Imported';
	}
	else
	{
		echo 'Failed :(';
	}