<?php

require_once('header_proses.php');


$id						=$_POST['id'];

$penyelia				=htmlspecialchars($conn->real_escape_string(trim($_POST['penyelia'])));

$penyelia2				=htmlspecialchars($conn->real_escape_string(trim($_POST['penyelia2'])));

$analis					=htmlspecialchars($conn->real_escape_string(trim($_POST['analis'])));

$analis2				=htmlspecialchars($conn->real_escape_string(trim($_POST['analis2'])));

$bahan					=htmlspecialchars($conn->real_escape_string(trim($_POST['bahan'])));

$bahan2					=htmlspecialchars($conn->real_escape_string(trim($_POST['bahan2'])));

$alat					=htmlspecialchars($conn->real_escape_string(trim($_POST['alat'])));

$alat2					=htmlspecialchars($conn->real_escape_string(trim($_POST['alat2'])));

$ma						=htmlspecialchars($conn->real_escape_string(trim($_POST['ma'])));

$nip_ma					=htmlspecialchars($conn->real_escape_string(trim($_POST['nip_ma'])));

$saran					=htmlspecialchars($conn->real_escape_string(trim($_POST['saran'])));

$tanggal_selesai		=htmlspecialchars($conn->real_escape_string(trim($_POST['tanggal_selesai'])));



  if($penyelia !=="") {

	 $objectData->edit2("UPDATE input_permohonan SET penyelia='$penyelia', penyelia2='$penyelia2', analis='$analis',  analis2='$analis2' , bahan='$bahan', bahan2='$bahan2', alat='$alat', alat2='$alat2', ma='$ma', nip_ma='$nip_ma', saran='$saran', tanggal_selesai='$tanggal_selesai' WHERE id ='$id'");


 }



?>		