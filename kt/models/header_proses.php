<?php 

ob_start();

use Lab\config\Database;
use Lab\classes\tanggal;
use Lab\classes\kt\{Data, Hasil, Nomor};

require_once (dirname(dirname(__DIR__)).'/vendor/autoload.php');

$connection = Database::getInstance();

$conn = $connection->getConnection();

$objectData = new Data;

$objectHasil = new Hasil;

$objectNomor = new Nomor;

$ambilId = $objectData->ambil_id();

$arrId = [];

while($uid = $ambilId->fetch_object()):

$arrId[] = $uid->id;

endwhile;

$maxId = end($arrId);

?>