<?php


require_once('header_proses.php');



$id											=$_POST['id'];

$no_sampel									=htmlspecialchars($conn->real_escape_string(trim($_POST['no_sampel'])));

$yang_menyerahkanlab 						=htmlspecialchars($conn->real_escape_string(trim($_POST['yang_menyerahkanlab'])));

$yang_menerimalab 							=htmlspecialchars($conn->real_escape_string(trim($_POST['yang_menerimalab'])));

$nip_yang_menyerahkanlab					=htmlspecialchars($conn->real_escape_string(trim($_POST['nip_yang_menyerahkanlab'])));

$nip_yang_menerimalab						=htmlspecialchars($conn->real_escape_string(trim($_POST['nip_yang_menerimalab'])));

$ttd_yang_menyerahkan_pengelola_sampel		=htmlspecialchars($conn->real_escape_string(trim($_POST['ttd_yang_menyerahkan_pengelola_sampel'])));

$ttd_yang_menerima_pengelola_sampel			=htmlspecialchars($conn->real_escape_string(trim($_POST['ttd_yang_menerima_pengelola_sampel'])));


  	$objectData->edit("UPDATE input_permohonan SET no_sampel='$no_sampel', yang_menyerahkanlab='$yang_menyerahkanlab', yang_menerimalab='$yang_menerimalab',  nip_yang_menyerahkanlab='$nip_yang_menyerahkanlab' , nip_yang_menerimalab='$nip_yang_menerimalab' WHERE id ='$id'");


  	if ($ttd_yang_menerima_pengelola_sampel == 'Ya' || $ttd_yang_menyerahkan_pengelola_sampel == 'Ya') {
  			
		$objectData->edit("UPDATE scan_ttd SET  ttd_yang_menyerahkan_pengelola_sampel = '$ttd_yang_menyerahkan_pengelola_sampel', ttd_yang_menerima_pengelola_sampel = '$ttd_yang_menerima_pengelola_sampel' WHERE id ='$id'");

  	}



?>	