<?php 

ob_start();

use Lab\config\Database;
use Lab\classes\tanggal;
use Lab\classes\kt\{Data, Hasil, Cetak, Nomor, Fungsional};

require_once (dirname(dirname(dirname(__DIR__))).'/vendor/autoload.php');

$connection = Database::getInstance();

$conn = $connection->getConnection();

$objectData = new Data;

$objectHasil = new Hasil;

$objectFungsional = new Fungsional;

$objectPrint = new Cetak;

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

ini_set('max_execution_time', 300); 

?>