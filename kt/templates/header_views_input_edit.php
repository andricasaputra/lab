<?php
ob_start();

use Lab\config\Database;
use Lab\classes\tanggal;
use Lab\classes\Init;
use Lab\classes\kh\Source4;
use Lab\classes\kt\{Data, Hasil, Nomor, Admin, Cetak};

require_once (dirname(dirname(__DIR__)).'/vendor/autoload.php');

$connection = Database::getInstance();

$conn = $connection->getConnection();

$objectData = new Data;

$objectHasil = new Hasil;

$objectNomor = new Nomor;

$objectPrint = new Cetak;

$objectTanggal = new tanggal;

require_once (Init::basePath()."/kt/models/nomor_sampel.php");

?>


