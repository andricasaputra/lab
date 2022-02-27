<?php

	header("Content-Type: text/plain");

	include 'mysql_dump.php';
	
	if(mysql_dump('dump.sql', 'localhost', 'lab_db', 'root', ''))
	{
		echo 'Dumped';
	}
	else
	{
		echo 'Failed :(';
	}