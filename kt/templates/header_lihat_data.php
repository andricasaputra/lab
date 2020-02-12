<?php

ob_start();

use Lab\classes\kt\Data;
use Lab\classes\tanggal;
use Lab\config\Database;

require_once dirname(dirname(__DIR__)) . '/vendor/autoload.php';

$connection = Database::getInstance();

$conn = $connection->getConnection();

$objectData = new Data;

$objectTanggal = new tanggal;
