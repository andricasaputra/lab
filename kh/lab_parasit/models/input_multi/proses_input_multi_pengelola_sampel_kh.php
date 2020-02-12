<?php

require_once('../header_proses.php');

$sql = $conn->query("SELECT lab_penguji,yang_menerimalab FROM input_permohonan_kh_lab_parasit WHERE lab_penguji != '' AND yang_menerimalab = ''");

$cek = $sql->num_rows;

if ($cek == 0) {
	echo "nodata"; exit;
}

foreach ($_POST['id'] as $key => $value) :

$id											=$_POST['id'][$key];

$no_sampel									=htmlspecialchars($conn->real_escape_string(trim($_POST['no_sampel'][$key])));

$yang_menyerahkanlab 						=htmlspecialchars($conn->real_escape_string(trim($_POST['yang_menyerahkanlab'])));

$yang_menerimalab 							=htmlspecialchars($conn->real_escape_string(trim($_POST['yang_menerimalab'])));

$nip_yang_menyerahkanlab					=htmlspecialchars($conn->real_escape_string(trim($_POST['nip_yang_menyerahkanlab'])));

$nip_yang_menerimalab						=htmlspecialchars($conn->real_escape_string(trim($_POST['nip_yang_menerimalab'])));

$ttd_yang_menyerahkan_pengelola_sampel		=htmlspecialchars($conn->real_escape_string(trim($_POST['ttd_yang_menyerahkan_pengelola_sampel'])));

$ttd_yang_menerima_pengelola_sampel			=htmlspecialchars($conn->real_escape_string(trim($_POST['ttd_yang_menerima_pengelola_sampel'])));

if (!empty($no_sampel) && !empty($yang_menerimalab)) :

	$objectDataParasit->edit("UPDATE input_permohonan_kh_lab_parasit SET no_sampel='$no_sampel', yang_menyerahkanlab='$yang_menyerahkanlab', yang_menerimalab='$yang_menerimalab',  nip_yang_menyerahkanlab='$nip_yang_menyerahkanlab' , nip_yang_menerimalab='$nip_yang_menerimalab' WHERE id ='$id'");

  	$conn->query("INSERT INTO scan_ttd_kh_lab_parasit (id, ttd_yang_menyerahkan_pengelola_sampel, ttd_yang_menerima_pengelola_sampel) VALUES ('$id', '$ttd_yang_menyerahkan_pengelola_sampel', '$ttd_yang_menerima_pengelola_sampel') ON DUPLICATE KEY UPDATE    
id ='$id', ttd_yang_menyerahkan_pengelola_sampel = '$ttd_yang_menyerahkan_pengelola_sampel', ttd_yang_menerima_pengelola_sampel = '$ttd_yang_menerima_pengelola_sampel'");

endif;


endforeach;
?>	