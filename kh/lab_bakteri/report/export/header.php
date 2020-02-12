<?php 

ob_start();

use Lab\config\Database;
use Lab\classes\tanggal;
use Lab\classes\kh\labbakteri\Data as DataKh;
use Lab\classes\kh\labbakteri\Hasil as HasilKh;
use Lab\classes\kh\labbakteri\Cetak as CetakKh;
use Lab\classes\kh\labbakteri\Nomor as NomorKh;
use Lab\classes\kh\labbakteri\Export as ExportKh;

require_once (dirname(dirname(dirname(dirname(__DIR__)))).'/vendor/autoload.php');

$connection = Database::getInstance();

$conn = $connection->getConnection();

$objectData = new DataKh($connection);

$objectHasil = new HasilKh($connection);

$objectNomor = new NomorKh($connection);

$objectExport = new ExportKh($connection);

$objectTanggal = new tanggal;


?>