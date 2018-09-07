<?php 
ob_start();

use Lab\config\Database;
use Lab\classes\tanggal;
use Lab\classes\kh\labbakteri\Data as DataKh;
use Lab\classes\kh\labbakteri\Hasil as HasilKh;
use Lab\classes\kh\labbakteri\Cetak as CetakKh;
use Lab\classes\kh\labbakteri\Nomor as NomorKh;

require_once (dirname(dirname(dirname(dirname(__DIR__)))).'/vendor/autoload.php');
   
$connection = Database::getInstance();

$conn = $connection->getConnection();

$objectData = new DataKh($connection);

$objectHasil = new HasilKh($connection);

$objectNomor = new NomorKh($connection);

$objectPrint = new CetakKh($connection);

$objectTanggal = new tanggal;

$logo = $objectPrint->getLogo();

$logoskp = $objectPrint->getLogoSkp();

$logokan = $objectPrint->getLogoKan();

$logoskpkan = $objectPrint->getLogoSkpKan();

$logo_horizontal = $objectPrint->getLogoHorizontal();

$boxfix = $objectPrint->getBoxFix();

$checkfix = $objectPrint->getCheckFix();

$check = $objectPrint->getCheck();

$html2pdf = $objectPrint->getHtml2pdf();

?>