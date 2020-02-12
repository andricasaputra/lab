<?php 

ob_start();

use Lab\config\Database;
use Lab\classes\tanggal;
use Lab\classes\kh\labparasit\Data as DataKhlabparasit;
use Lab\classes\kh\labparasit\Hasil as HasilKhlabparasit;
use Lab\classes\kh\labparasit\Nomor as NomorKhlabparasit;

require_once (dirname(dirname(dirname(__DIR__))).'/vendor/autoload.php');

$connection = Database::getInstance();

$conn = $connection->getConnection();

$objectDataParasit = new DataKhlabparasit ($connection);

$objectHasilParasit = new HasilKhlabparasit ($connection);

$objectNomorParasit = new NomorKhlabparasit ($connection);

$ambilId = $objectDataParasit->ambil_id();

$arrId = [];

while($uid = $ambilId->fetch_object()):

$arrId[] = $uid->id;

endwhile;

$maxId = end($arrId);


 ?>