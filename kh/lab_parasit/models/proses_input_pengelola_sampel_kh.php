<?php


require_once('header_proses.php');



$id											=$_POST['id'];

$no_sampel									=htmlspecialchars($conn->real_escape_string(trim($_POST['no_sampel'])));

$nama_sampel_lab 							=htmlspecialchars($conn->real_escape_string(trim($_POST['nama_sampel_lab'])));

$yang_menyerahkanlab 						=htmlspecialchars($conn->real_escape_string(trim($_POST['yang_menyerahkanlab'])));

$yang_menerimalab 							=htmlspecialchars($conn->real_escape_string(trim($_POST['yang_menerimalab'])));

$nip_yang_menyerahkanlab					=htmlspecialchars($conn->real_escape_string(trim($_POST['nip_yang_menyerahkanlab'])));

$nip_yang_menerimalab						=htmlspecialchars($conn->real_escape_string(trim($_POST['nip_yang_menerimalab'])));

$ttd_yang_menyerahkan_pengelola_sampel		=htmlspecialchars($conn->real_escape_string(trim($_POST['ttd_yang_menyerahkan_pengelola_sampel'])));

$ttd_yang_menerima_pengelola_sampel			=htmlspecialchars($conn->real_escape_string(trim($_POST['ttd_yang_menerima_pengelola_sampel'])));



  	$objectDataParasit->edit("UPDATE input_permohonan_kh_lab_parasit SET no_sampel='$no_sampel',  yang_menyerahkanlab='$yang_menyerahkanlab', yang_menerimalab='$yang_menerimalab',  nip_yang_menyerahkanlab='$nip_yang_menyerahkanlab' , nip_yang_menerimalab='$nip_yang_menerimalab' WHERE id ='$id'");

  	$conn->query("INSERT INTO scan_ttd_kh_lab_parasit (id, ttd_yang_menyerahkan_pengelola_sampel, ttd_yang_menerima_pengelola_sampel) VALUES ('$id', '$ttd_yang_menyerahkan_pengelola_sampel', '$ttd_yang_menerima_pengelola_sampel') ON DUPLICATE KEY UPDATE id ='$id', ttd_yang_menyerahkan_pengelola_sampel = '$ttd_yang_menyerahkan_pengelola_sampel', ttd_yang_menerima_pengelola_sampel = '$ttd_yang_menerima_pengelola_sampel'");



?>	