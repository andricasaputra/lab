<?php

ob_start();

use Lab\config\Database;
use Lab\classes\tanggal;
use Lab\classes\kt\Data;

require_once (dirname(dirname(__DIR__)).'/vendor/autoload.php');

$connection = Database::getInstance();

$conn = $connection->getConnection();

$objectData = new Data;

$objectTanggal = new tanggal;

?>

