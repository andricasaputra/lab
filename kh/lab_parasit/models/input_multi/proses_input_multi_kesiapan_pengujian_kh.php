<?php

require_once('../header_proses.php');

	$kondisi_sampel		=htmlspecialchars($conn->real_escape_string(trim($_POST['kondisi_sampel'])));

	$mt					=htmlspecialchars($conn->real_escape_string(trim($_POST['mt'])));

	$nip_mt				=htmlspecialchars($conn->real_escape_string(trim($_POST['nip_mt'])));

	$penyelia			=htmlspecialchars($conn->real_escape_string(trim($_POST['penyelia'])));

	$penyelia2			=htmlspecialchars($conn->real_escape_string(trim($_POST['penyelia2'])));

	$analis				=htmlspecialchars($conn->real_escape_string(trim($_POST['analis'])));

	$analis2			=htmlspecialchars($conn->real_escape_string(trim($_POST['analis2'])));

	$bahan				=htmlspecialchars($conn->real_escape_string(trim($_POST['bahan'])));

	$bahan2				=htmlspecialchars($conn->real_escape_string(trim($_POST['bahan2'])));

	$alat				=htmlspecialchars($conn->real_escape_string(trim($_POST['alat'])));

	$alat2				=htmlspecialchars($conn->real_escape_string(trim($_POST['alat2'])));

	$kesiapan			=htmlspecialchars($conn->real_escape_string(trim($_POST['kesiapan'])));

$sql = $conn->query("SELECT kode_sampel,mt FROM input_permohonan_kh_lab_parasit WHERE kode_sampel !='' AND mt = ''");

$cek = $sql->num_rows;

if ($cek == 0) {
	echo "nodata"; exit;
}		

 if($mt !=="") {

	 $objectDataParasit->edit("UPDATE input_permohonan_kh_lab_parasit SET kondisi_sampel='$kondisi_sampel', mt='$mt', nip_mt='$nip_mt', penyelia='$penyelia', penyelia2='$penyelia2', analis='$analis',  analis2='$analis2' , bahan='$bahan', bahan2='$bahan2', alat='$alat', alat2='$alat2', kesiapan='$kesiapan' WHERE kode_sampel != '' AND mt = ''");
	 

 }
 
?>								