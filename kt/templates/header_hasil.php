<?php

ob_start();

use Lab\config\Database;
use Lab\classes\tanggal;
use Lab\classes\kt\{Data, Hasil, Nomor};

require_once (dirname(dirname(__DIR__)).'/vendor/autoload.php');

$connection = Database::getInstance();
$conn = $connection->getConnection();
$objectData = new Data;
$objectHasil = new Hasil;
$objectNomor = new Nomor;
$objectTanggal = new tanggal;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Sistim Informasi Laboratorium Elektronik">
    <meta name="author" content="sile">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="application-name" content="Sile">
    <meta name="apple-mobile-web-app-title" content="Sile">
    <meta name="theme-color" content="#2196F3">
    <meta name="msapplication-navbutton-color" content="#2196F3">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="msapplication-starturl" content="https://lab.skp1sumbawabesar.org/index">

    <title>LABORATORIUM | Halaman Pengujian</title>

    <link rel="manifest" href="../../manifest.json">

    <link rel="icon" type="image/png" sizes="48x48" href="../../assets/img/sile-1x.png">
    <link rel="apple-touch-icon" type="image/png" sizes="48x48" href="../../assets/img/sile-1x.png">
    <link rel="icon" type="image/png" sizes="96x96" href="../../assets/img/sile-2x.png">
    <link rel="apple-touch-icon" type="image/png" sizes="96x96" href="../../assets/img/sile-2x.png">
    <link rel="icon" type="image/png" sizes="192x192" href="../../assets/img/sile-4x.png">
    <link rel="apple-touch-icon" type="image/png" sizes="192x192" href="../../assets/img/sile-4x.png">
    <link rel="icon" type="image/png" sizes="512x512" href="../../assets/img/sile-6x.png">
    <link rel="apple-touch-icon" type="image/png" sizes="512x512" href="../../assets/img/sile-6x.png">

    <link href="../../assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../assets/css/font-awesome.min.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="../../assets/img/favicon-32x32.png" sizes="32x32">
    <link href="../../assets/css/sb-admin.css" rel="stylesheet">
    <link href="../../assets/css/style.css" rel="stylesheet">
    <link href="../../assets/dataTables/datatables.min.css" rel="stylesheet">
    <link href="../../assets/dataTables/DataTables-1.10.16/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="../../assets/sweetalert2.css" rel="stylesheet">
    <script src="../../assets/js/jquery-3.2.1.min.js"></script>
    <style >
     body { overflow-x: hidden; }
    .alert{ font-size: 11pt;}
    </style>
</head>