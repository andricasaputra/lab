<?php

ob_start();

use Lab\config\Database;
use Lab\classes\tanggal;
use Lab\classes\kh\labbakteri\{
	Data as DataKh,
	Nomor as NomorKh
};
use Lab\classes\kh\labparasit\{
	Data as DataKhlabparasit, 
	Nomor as NomorKhlabparasit
};

require_once (dirname(dirname(__DIR__)).'/vendor/autoload.php');

$connection = Database::getInstance();

$conn = $connection->getConnection();

$objectData = new DataKh;

$objectDataParasit = new DataKhlabparasit;

$objectTanggal = new tanggal;


?>

