<?php

use Lab\config\Database;
use Lab\classes\tanggal;
use Lab\classes\kh\{
	Source as SourceKh,
	Source2 as Source2Kh,
	Source3 as Source3Kh,
	Source4 as Source4Kh
};

require_once (dirname(dirname(dirname(__DIR__))).'/vendor/autoload.php');

$connection = Database::getInstance();

$conn = $connection->getConnection();

$objectSource = new SourceKh;

$objectSource2 = new Source2Kh;

$objectSource3 = new Source3Kh;

$objectSource4 = new Source4Kh;