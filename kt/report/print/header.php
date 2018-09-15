<?php 

session_start();

ob_start();

ini_set('max_execution_time', 300);

use Lab\config\Database;
use Lab\classes\tanggal;
use Lab\classes\kt\{Data, Hasil, Cetak, Nomor};
use Lab\classes\init;

require_once (dirname(dirname(dirname(__DIR__))).'/vendor/autoload.php');

$connection = Database::getInstance();

$conn = $connection->getConnection();

$basepath = init::basePath()."/assets/img/";

$objectData = new Data;

$objectHasil = new Hasil;

$objectPrint = new Cetak;

$objectNomor = new Nomor;

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

$page = $objectPrint->getPageHTML2PDF(); 

$scan = $objectPrint->getscan();

$tanggal = $objectTanggal->tgl_indo(date('Y-m-d'));

$bulan = $objectTanggal->bulan(date("m")); 

$tahun = date('Y');


?>