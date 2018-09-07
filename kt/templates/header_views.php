<?php
ob_start();
require_once  dirname(dirname(__DIR__))."/init.php";
$connection = Database::getInstance();
$conn = $connection->getConnection();
$objectData = new Data;
$objectHasil = new Hasil;
$objectNomor = new Nomor;
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LABORATORIUM</title>
    <link href="../../assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../assets/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="../../assets/img/favicon-32x32.png" sizes="32x32">
    <link href="../../assets/css/sb-admin.css" rel="stylesheet">
    <link href="../../assets/css/plugins/timeline/timeline.css" rel="stylesheet">
    <link href="../../assets/css/style.css" rel="stylesheet">
    <link href="../../assets/css/style2.css" rel="stylesheet">
    <link href="../../assets/dataTables/datatables.min.css" rel="stylesheet">
    <link href="../../assets/dataTables/DataTables-1.10.16/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="../../assets/sweetalert2-master/dist/sweetalert2.css" rel="stylesheet">
    <script src="../../assets/js/jquery-3.2.1.min.js"></script>
</head>