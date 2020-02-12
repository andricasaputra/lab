<?php  

session_start();

ob_start();

use Lab\config\Database;
use Lab\classes\tanggal;
use Lab\classes\kh\labparasit\Data as DataKhlabparasit;
use Lab\classes\kh\labparasit\Hasil as HasilKhlabparasit;
use Lab\classes\kh\labparasit\Nomor as NomorKhlabparasit;

require_once (dirname(dirname(dirname(dirname(__DIR__)))).'/vendor/autoload.php');

$connection = Database::getInstance();

$conn = $connection->getConnection();

$objectDataParasit = new DataKhlabparasit;

$objectHasilParasit = new HasilKhlabparasit;

$objectNomorParasit = new NomorKhlabparasit;

$objectTanggal = new tanggal;

$tampil = $objectDataParasit->KosongData();

?>