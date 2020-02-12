<?php 

ob_start();

use Lab\config\Database;
use Lab\classes\tanggal;
use Lab\classes\kh\labbakteri\Data as DataKh;
use Lab\classes\kh\labbakteri\Hasil as HasilKh;
use Lab\classes\kh\labbakteri\Nomor as NomorKh;

require_once (dirname(dirname(dirname(__DIR__))).'/vendor/autoload.php');

$connection = Database::getInstance();

$conn = $connection->getConnection();

$objectData = new DataKh ($connection);

$objectHasil = new HasilKh ($connection);

$objectNomor = new NomorKh ($connection);

$ambilId = $objectData->ambil_id();

$arrId = [];

while($uid = $ambilId->fetch_object()):

$arrId[] = $uid->id;

endwhile;

$maxId = end($arrId);

 ?>