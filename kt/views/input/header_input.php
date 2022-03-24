<?php  


use Lab\classes\init as basepath;
use Lab\classes\kt\Pejabat;

require_once (dirname(dirname(dirname(__DIR__))).'/vendor/autoload.php');
   
$path = basepath::SorceDataPath();

$basepath = basepath::basePath();

$objectPejabat = new Pejabat();

require_once $path.'templates/header_views_input_edit.php';

?>
