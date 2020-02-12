<?php

ob_start();

require_once dirname(dirname(__DIR__)) . "/init.php";

$path = init::SorceDataPath();

$connection = Database::getInstance();

$conn = $connection->getConnection();

require_once $path . 'models/tgl_indo.php';

require_once $path . 'models/nomor_sampel.php';
