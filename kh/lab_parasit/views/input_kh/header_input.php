<?php  

session_start();

use Lab\classes\Init as basepath;

require_once (dirname(dirname(dirname(dirname(__DIR__)))).'/vendor/autoload.php');
   
$path = basepath::SorceDataPathKhLabParasit();

$basepath = basepath::basePath();

require_once $path.'templates/header_views_input_edit_kh.php';

?>
