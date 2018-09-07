<?php  

session_start();

ob_start();

use Lab\config\Database;
use Lab\classes\tanggal;

require_once (dirname(dirname(dirname(dirname(__DIR__)))).'/vendor/autoload.php');

$connection = Database::getInstance();

$conn = $connection->getConnection();