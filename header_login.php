<?php

use Lab\config\Database;
use Lab\config\Login;

require_once 'vendor/autoload.php';

$connection = Database::getInstance();

$conn = $connection->getConnection();

$log = new Login;

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>LABORATORIUM ELEKTRONIK</title>
		<link href="assets/css/bootstrap.min.css" rel="stylesheet">
		<link href="assets/css/style.css" rel="stylesheet">
		<link href="assets/img/favicon-32x32.png" rel="icon" type="image/png" sizes="32x32">
		<link href="assets/css/sb-admin.css" rel="stylesheet">
	</head>
