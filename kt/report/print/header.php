<?php 

session_start();

ob_start();

ini_set('max_execution_time', 300);

use Lab\config\Database;
use Lab\classes\tanggal;
use Lab\classes\kt\{Data, Hasil, Cetak, Nomor};
use Lab\classes\init;
use Spipu\Html2Pdf\Html2Pdf;

require_once (dirname(dirname(dirname(__DIR__))).'/vendor/autoload.php');

$connection = Database::getInstance();

$conn = $connection->getConnection();

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

$logokanbaru = $objectPrint->getLogoKanBaru();

$check = $objectPrint->getCheck();

$tanggal = $objectTanggal->tgl_indo(date('Y-m-d'));

$bulan = $objectTanggal->bulan(date("m")); 

$tahun = date('Y');

$html2pdf = new Html2Pdf('P','A4','en', 'UTF-8');

?>