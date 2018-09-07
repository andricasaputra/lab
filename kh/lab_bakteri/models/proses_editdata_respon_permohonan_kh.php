<?php

require_once('header_proses.php');



$id						=$_POST['id'];


$ma						=htmlspecialchars($conn->real_escape_string(trim($_POST['ma'])));

$nip_ma					=htmlspecialchars($conn->real_escape_string(trim($_POST['nip_ma'])));

$saran					=htmlspecialchars($conn->real_escape_string(trim($_POST['saran'])));

$tanggal_selesai		=htmlspecialchars($conn->real_escape_string(trim($_POST['tanggal_selesai'])));



 if($penyelia !=="") {

	 $objectData->edit2("UPDATE input_permohonan_kh SET ma='$ma', nip_ma='$nip_ma' ,saran='$saran', tanggal_selesai='$tanggal_selesai' WHERE id ='$id'");

	 

 }

?>		