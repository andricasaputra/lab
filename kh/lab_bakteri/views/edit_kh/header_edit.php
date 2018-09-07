<?php  

session_start();

use Lab\classes\init as basepath;

require_once (dirname(dirname(dirname(dirname(__DIR__)))).'/vendor/autoload.php');
   
$path = basepath::SorceDataPathKhLabBakteri();

$basepath = basepath::basePath();

require_once $path.'templates/header_views_input_edit_kh.php';

?>
