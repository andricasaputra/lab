<?php 

session_start();

ob_start();

ini_set('max_execution_time', 300);

use Lab\config\Database;
use Lab\classes\tanggal;
use Lab\classes\kh\labparasit\Data as DataKhlabparasit;
use Lab\classes\kh\labparasit\Hasil as HasilKhlabparasit;
use Lab\classes\kh\labparasit\Cetak as CetakKhlabparasit;
use Lab\classes\kh\labparasit\Nomor as NomorKhlabparasit;
use Lab\classes\init;

require_once (dirname(dirname(dirname(dirname(__DIR__)))).'/vendor/autoload.php');

$connection = Database::getInstance();

$conn = $connection->getConnection();

$basepath = init::basePath()."/assets/img/";

$objectData = new DataKhlabparasit;

$objectHasil = new HasilKhlabparasit;

$objectNomor = new NomorKhlabparasit;

$objectPrint = new CetakKhlabparasit;

$objectTanggal = new tanggal;

$logo = $objectPrint->getLogo();

$logoskp = $objectPrint->getLogoSkp();

$logoskpbiasa = $objectPrint->getLogoSkpBiasa();

$logokan = $objectPrint->getLogoKan();

$logoskpkan = $objectPrint->getLogoSkpKan();

$logo_horizontal = $objectPrint->getLogoHorizontal();

$boxfix = $objectPrint->getBoxFix();

$checkfix = $objectPrint->getCheckFix();

$check = $objectPrint->getCheck();

$html2pdf = $objectPrint->getHtml2pdf();

$scan = $objectPrint->getscan();

$tanggal = $objectTanggal->tgl_indo(date('Y-m-d'));

$bulan = $objectTanggal->bulan(date("m")); 

$tahun = date('Y');

?>