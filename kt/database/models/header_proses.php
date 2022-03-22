<?php

session_start();

use Lab\config\Database;
use Lab\classes\tanggal;
use Lab\classes\kt\{Source, Source2, Source3, Pejabat, Jabatan};

require_once (dirname(dirname(dirname(__DIR__))).'/vendor/autoload.php');

$connection = Database::getInstance();

$conn = $connection->getConnection();

$objectSource = new Source;

$objectSource2 = new Source2;

$objectSource3 = new Source;

$objectJabatan = new Jabatan;

$objectJabfung = new Jabatan;

$objectPejabat = new Pejabat;
