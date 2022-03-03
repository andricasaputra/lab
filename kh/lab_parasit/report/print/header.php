<?php 

session_start();

ob_start();

ini_set('max_execution_time', 300);

use Lab\config\Database;
use Lab\classes\tanggal;
use Lab\classes\kh\labparasit\Data as DataKh;
use Lab\classes\kh\labparasit\Hasil as HasilKh;
use Lab\classes\kh\labparasit\Cetak as CetakKh;
use Lab\classes\kh\labparasit\Nomor as NomorKh;
use Lab\classes\init; 
use Spipu\Html2Pdf\Html2Pdf;

require_once (dirname(dirname(dirname(dirname(__DIR__)))).'/vendor/autoload.php');
   
$connection = Database::getInstance();

$conn = $connection->getConnection();

$basepath = init::basePath()."/assets/img/";

$objectData = new DataKh($connection);

$objectHasil = new HasilKh($connection);

$objectNomor = new NomorKh($connection);

$objectPrint = new CetakKh($connection);

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

$tanggal = $objectTanggal->tgl_indo(date('Y-m-d'));

$bulan = $objectTanggal->bulan(date("m")); 
$tahun = date('Y');

$html2pdf = new Html2Pdf('P','A4','en', 'UTF-8');

?>