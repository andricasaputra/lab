<?php 

ob_start();

use Lab\config\Database;
use Lab\classes\tanggal;
use Lab\classes\kh\labparasit\Data as DataKhlabparasit;
use Lab\classes\kh\labparasit\Hasil as HasilKhlabparasit;
use Lab\classes\kh\labparasit\Nomor as NomorKhlabparasit;
use Lab\classes\kh\labparasit\Export as ExportKhlabparasit;

require_once (dirname(dirname(dirname(dirname(__DIR__)))).'/vendor/autoload.php');

$connection = Database::getInstance();

$conn = $connection->getConnection();

$objectData = new DataKhlabparasit;

$objectHasil = new HasilKhlabparasit;

$objectNomor = new NomorKhlabparasit;

$objectExport = new ExportKhlabparasit;

$objectTanggal = new tanggal;


?>