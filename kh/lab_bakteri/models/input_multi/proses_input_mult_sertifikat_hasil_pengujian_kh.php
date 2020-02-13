<?php

require_once('../header_proses.php');

$sql = $conn->query("SELECT tanggal_pengujian,no_sertifikat FROM input_permohonan_kh WHERE tanggal_pengujian IS NOT NULL AND no_sertifikat IS NULL");

$cek = $sql->num_rows;

if ($cek == 0) {
	echo "nodata"; exit;
}

/*UPDATE MULTIPLE INPUT_PERMOHONAN_KH TABLE*/

foreach ($_POST['id'] as $key => $value) :


$id							=$_POST['id'][$key];

$no_sertifikat				=htmlspecialchars($conn->real_escape_string($_POST['no_sertifikat'][$key]));

$tanggal_sertifikat			=htmlspecialchars($conn->real_escape_string($_POST['tanggal_sertifikat']));

$tanggal_pengujian 			=htmlspecialchars($conn->real_escape_string($_POST['tanggal_pengujian']));

$rekomendasi				=htmlspecialchars($conn->real_escape_string($_POST['rekomendasi']));

$ket_kesimpulan				=htmlspecialchars($conn->real_escape_string($_POST['ket_kesimpulan']));

$nama_penyelia				=htmlspecialchars($conn->real_escape_string($_POST['nama_penyelia']));

$nip_penyelia				=htmlspecialchars($conn->real_escape_string($_POST['nip_penyelia']));

$kepala_plh					=htmlspecialchars($conn->real_escape_string($_POST['kepala_plh']));

$nip_kepala_plh				=htmlspecialchars($conn->real_escape_string($_POST['nip_kepala_plh']));

$ttd_penyelia_hasil_uji		=htmlspecialchars($conn->real_escape_string($_POST['ttd_penyelia_hasil_uji']));

$ttd_mt_hasil_uji			=htmlspecialchars($conn->real_escape_string($_POST['ttd_mt_hasil_uji']));

$ttd_penyelia_hasil_uji		=htmlspecialchars($conn->real_escape_string($_POST['ttd_penyelia_hasil_uji']));

$ttd_mt_hasil_uji			=htmlspecialchars($conn->real_escape_string($_POST['ttd_mt_hasil_uji']));


  $objectData->edit("UPDATE input_permohonan_kh SET  ket_kesimpulan='$ket_kesimpulan', no_sertifikat='$no_sertifikat', waktu_apdate_sertifikat = CURRENT_TIMESTAMP, tanggal_sertifikat='$tanggal_sertifikat', tanggal_pengujian='$tanggal_pengujian', rekomendasi='$rekomendasi', nama_penyelia='$nama_penyelia', nip_penyelia='$nip_penyelia', kepala_plh='$kepala_plh', nip_kepala_plh='$nip_kepala_plh' WHERE id ='$id'");


  $objectHasil->edit("UPDATE hasil_kh SET no_sertifikat='$no_sertifikat' WHERE id ='$id'");


  $objectData->edit("UPDATE scan_ttd_kh SET ttd_penyelia_hasil_uji = '$ttd_penyelia_hasil_uji', ttd_mt_hasil_uji = '$ttd_mt_hasil_uji' WHERE id ='$id'");


endforeach;






?>	

