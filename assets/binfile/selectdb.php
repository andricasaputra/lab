<?php
if (!isset($_POST['table'])) {
    exit;
}
$path = $_SERVER["DOCUMENT_ROOT"]."/lab/";
require_once "$path/init.php";
$connection = Database::getInstance();
$connect = $connection->getConnection();
$tablename = $_POST['table'];
  $judul = $connect->real_escape_string($_POST['judul']);
  @$data = $_POST['structure_data'];
  @$struc = $_POST['structure_only'];

  if ($data === null) {
      
      $values =  $_POST['structure_only'];

  }else{

    $values =  $_POST['structure_data'];
  }


  Database::getExportTables($_POST['table'], $judul, $values);
