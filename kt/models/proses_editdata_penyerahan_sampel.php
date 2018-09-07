<?php

require_once('header_proses.php');

$id						=$_POST['id'];

$tanggal_penyerahan		=htmlspecialchars($conn->real_escape_string(trim($_POST['tanggal_penyerahan'])));

$kode_sampel			=htmlspecialchars($conn->real_escape_string(trim($_POST['kode_sampel'])));

$yang_menyerahkan		=htmlspecialchars($conn->real_escape_string(trim($_POST['yang_menyerahkan'])));

$yang_menerima			=htmlspecialchars($conn->real_escape_string(trim($_POST['yang_menerima'])));

$nip_ygmenyerahkan		=htmlspecialchars($conn->real_escape_string(trim($_POST['nip_ygmenyerahkan'])));

$nip_ygmenerima			=htmlspecialchars($conn->real_escape_string(trim($_POST['nip_ygmenerima'])));
	

 if($yang_menyerahkan !=="") {

	 $objectData->edit2("UPDATE input_permohonan SET tanggal_penyerahan='$tanggal_penyerahan', kode_sampel='$kode_sampel', yang_menyerahkan='$yang_menyerahkan', yang_menerima='$yang_menerima',  nip_ygmenyerahkan='$nip_ygmenyerahkan' , nip_ygmenerima='$nip_ygmenerima' WHERE id ='$id'"); 

	

 }


?>		