<?php


require_once('header_proses.php');



$id											=$_POST['id'];

$nama_sampel_lab							=htmlspecialchars($conn->real_escape_string(trim($_POST['nama_sampel_lab'])));

$no_sampel									=htmlspecialchars($conn->real_escape_string(trim($_POST['no_sampel'])));

$yang_menyerahkanlab 						=htmlspecialchars($conn->real_escape_string(trim($_POST['yang_menyerahkanlab'])));

$yang_menerimalab 							=htmlspecialchars($conn->real_escape_string(trim($_POST['yang_menerimalab'])));

$nip_yang_menyerahkanlab					=htmlspecialchars($conn->real_escape_string(trim($_POST['nip_yang_menyerahkanlab'])));

$nip_yang_menerimalab						=htmlspecialchars($conn->real_escape_string(trim($_POST['nip_yang_menerimalab'])));

$ttd_yang_menyerahkan_pengelola_sampel		=htmlspecialchars($conn->real_escape_string(trim($_POST['ttd_yang_menyerahkan_pengelola_sampel'])));

$ttd_yang_menerima_pengelola_sampel			=htmlspecialchars($conn->real_escape_string(trim($_POST['ttd_yang_menerima_pengelola_sampel'])));



  	$objectData->edit("UPDATE input_permohonan_kh SET nama_sampel_lab='$nama_sampel_lab', no_sampel='$no_sampel', yang_menyerahkanlab='$yang_menyerahkanlab', yang_menerimalab='$yang_menerimalab',  nip_yang_menyerahkanlab='$nip_yang_menyerahkanlab' , nip_yang_menerimalab='$nip_yang_menerimalab', no_sampel='$no_sampel' WHERE id ='$id'");


  	$conn->query("INSERT INTO scan_ttd_kh (id, ttd_yang_menyerahkan_pengelola_sampel, ttd_yang_menerima_pengelola_sampel) VALUES('$id', '$ttd_yang_menyerahkan_pengelola_sampel', '$ttd_yang_menerima_pengelola_sampel') ON DUPLICATE KEY UPDATE    
id=$id, ttd_yang_menyerahkan_pengelola_sampel = '$ttd_yang_menyerahkan_pengelola_sampel', ttd_yang_menerima_pengelola_sampel = '$ttd_yang_menerima_pengelola_sampel' ");



?>	