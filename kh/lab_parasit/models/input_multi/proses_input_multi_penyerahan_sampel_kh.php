<?php

require_once('../header_proses.php');

$sql = $conn->query("SELECT penerima_sampel,kode_sampel FROM input_permohonan_kh_lab_parasit WHERE penerima_sampel IS NOT NULL AND kode_sampel IS NULL");

$cek = $sql->num_rows;

if ($cek == 0) {
	echo "nodata"; exit;
}

foreach ($_POST['id'] as $key => $value) :


$id						=$_POST['id'][$key];

$tanggal_penyerahan		=htmlspecialchars($conn->real_escape_string($_POST['tanggal_penyerahan']));

$yang_menyerahkan		=htmlspecialchars($conn->real_escape_string($_POST['yang_menyerahkan']));

$yang_menerima			=htmlspecialchars($conn->real_escape_string($_POST['yang_menerima']));

$nip_ygmenyerahkan		=htmlspecialchars($conn->real_escape_string($_POST['nip_ygmenyerahkan']));

$nip_ygmenerima			=htmlspecialchars($conn->real_escape_string($_POST['nip_ygmenerima']));

$kode_sampel			=htmlspecialchars($conn->real_escape_string($_POST['kode_sampel'][$key]));

$jam_diterima_pengelola_sampel			=htmlspecialchars($conn->real_escape_string(trim($_POST['jam_diterima_pengelola_sampel'])));



if (!empty($kode_sampel)) {
	
	$kd = $conn->query("SELECT kode_sampel FROM input_permohonan_kh_lab_parasit WHERE kode_sampel='$kode_sampel'");

	$cek = $kd->num_rows;


	if ($cek > 0){

		echo 'false';

	}else{

		 $objectDataParasit->edit("UPDATE input_permohonan_kh_lab_parasit SET tanggal_penyerahan='$tanggal_penyerahan', yang_menyerahkan='$yang_menyerahkan', yang_menerima='$yang_menerima',  nip_ygmenyerahkan='$nip_ygmenyerahkan' , nip_ygmenerima='$nip_ygmenerima', kode_sampel='$kode_sampel', jam_diterima_pengelola_sampel = '$jam_diterima_pengelola_sampel' WHERE id ='$id'");
	}

}

endforeach;	

?>		