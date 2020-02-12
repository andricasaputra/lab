<?php  

ob_start();

use Lab\config\Database;
use Lab\classes\tanggal;
use Lab\classes\kt\{Data, Hasil, Cetak, Nomor};

require_once (dirname(dirname(dirname(__DIR__))).'/vendor/autoload.php');

$connection = Database::getInstance();

$conn = $connection->getConnection();

$objectData = new Data;

$objectHasil = new Hasil;

$objectPrint = new Cetak;

$objectNomor = new Nomor;

$objectTanggal = new tanggal;

?>