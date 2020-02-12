<?php

require_once('../header_proses.php');

$sql = $conn->query("SELECT yang_menerimalab,tanggal_pengujian FROM input_permohonan_kh_lab_parasit WHERE yang_menerimalab != '' AND tanggal_pengujian = ''");

$cek = $sql->num_rows;

if ($cek == 0) {
	echo "nodata"; exit;
}

foreach ($_POST['id'] as $key => $value) :

$id							=$_POST['id'][$key];

$tanggal_penyerahan_lab		=htmlspecialchars($conn->real_escape_string(trim($_POST['tanggal_penyerahan_lab'])));

$tanggal_pengujian			=htmlspecialchars($conn->real_escape_string(trim($_POST['tanggal_pengujian'])));

$rekomendasi				=htmlspecialchars($conn->real_escape_string(trim($_POST['rekomendasi'])));

$nama_penyelia				=htmlspecialchars($conn->real_escape_string(trim($_POST['nama_penyelia'])));

$nama_analis				=htmlspecialchars($conn->real_escape_string(trim($_POST['nama_analis'])));

$nip_penyelia				=htmlspecialchars($conn->real_escape_string(trim($_POST['nip_penyelia'])));

$nip_analis					=htmlspecialchars($conn->real_escape_string(trim($_POST['nip_analis'])));

$ket_kesimpulan				=htmlspecialchars($conn->real_escape_string(trim($_POST['ket_kesimpulan'])));

$ttd_penyelia_data_teknis	=htmlspecialchars($conn->real_escape_string(trim($_POST['ttd_penyelia_data_teknis'])));

$ttd_analis_data_teknis		=htmlspecialchars($conn->real_escape_string(trim($_POST['ttd_analis_data_teknis'])));


 if($tanggal_pengujian !=="") {

	 $objectDataParasit->edit("UPDATE input_permohonan_kh_lab_parasit SET tanggal_penyerahan_lab='$tanggal_penyerahan_lab', tanggal_pengujian='$tanggal_pengujian', rekomendasi='$rekomendasi', nama_penyelia='$nama_penyelia', nama_analis='$nama_analis', nip_penyelia='$nip_penyelia', nip_analis='$nip_analis', ket_kesimpulan='$ket_kesimpulan' WHERE id ='$id'");

	 $objectDataParasit->edit("UPDATE scan_ttd_kh_lab_parasit SET ttd_penyelia_data_teknis = '$ttd_penyelia_data_teknis', ttd_analis_data_teknis	='$ttd_analis_data_teknis' WHERE id ='$id'");


 }

endforeach;


?>	