<?php 

ob_start();

use Lab\config\Database;
use Lab\classes\{tanggal, NomorFungsional};
use Lab\classes\kt\{Data, Hasil, Cetak, Nomor, Fungsional};

require_once (dirname(dirname(dirname(__DIR__))).'/vendor/autoload.php');

$connection = Database::getInstance();

$conn = $connection->getConnection();

$objectData = new Data;

$objectHasil = new Hasil;

$objectFungsional = new Fungsional;

$objectPrint = new Cetak;

$objectTanggal = new tanggal;

$objectNomor = new NomorFungsional;

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

ini_set('max_execution_time', 300); 

$tanggal = $objectTanggal->tgl_indo(date('Y-m-d'));

$bulan = $objectTanggal->bulan(date("m")); 

$tahun = date('Y');


?>