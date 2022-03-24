<?php


use Lab\config\Database;
use Lab\classes\kt\Data;

require_once (dirname(dirname(dirname(__DIR__))).'/vendor/autoload.php');

$connection = Database::getInstance();

$conn = $connection->getConnection();

$objectData = new Data;

   $sql = "SELECT * FROM pejabat
         WHERE nama_pejabat LIKE '%".@$_GET['id']."%'"; 


   $result = $conn->query($sql);


   $json = [];
   while($row = $result->fetch_assoc()){
        $json[$row['id_pejabat']] = $row['jabfung'];
   }


   echo json_encode($objectData->utf8ize($json));
?>