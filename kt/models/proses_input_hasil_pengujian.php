<?php

require_once('header_proses.php');




$id							=$_POST['id'];

$ket_kesimpulan				=htmlspecialchars($conn->real_escape_string($_POST['ket_kesimpulan']));

$no_sertifikat				=htmlspecialchars($conn->real_escape_string($_POST['no_sertifikat']));

$tanggal_sertifikat			=htmlspecialchars($conn->real_escape_string($_POST['tanggal_sertifikat']));

$rekomendasi				=htmlspecialchars($conn->real_escape_string($_POST['rekomendasi']));

$nama_penyelia				=htmlspecialchars($conn->real_escape_string(trim($_POST['nama_penyelia'])));

$nip_penyelia				=htmlspecialchars($conn->real_escape_string(trim($_POST['nip_penyelia'])));

$kepala_plh					=htmlspecialchars($conn->real_escape_string($_POST['kepala_plh']));

$nip_kepala_plh				=htmlspecialchars($conn->real_escape_string($_POST['nip_kepala_plh']));

$ttd_penyelia_hasil_uji		=htmlspecialchars($conn->real_escape_string(trim($_POST['ttd_penyelia_hasil_uji'])));

$ttd_mt_hasil_uji			=htmlspecialchars($conn->real_escape_string(trim($_POST['ttd_mt_hasil_uji'])));

$ttd_penyelia_hasil_uji		=htmlspecialchars($conn->real_escape_string(trim($_POST['ttd_penyelia_hasil_uji'])));

$ttd_mt_hasil_uji			=htmlspecialchars($conn->real_escape_string(trim($_POST['ttd_mt_hasil_uji'])));



$kd = $conn->query("SELECT no_sertifikat FROM input_permohonan WHERE no_sertifikat='$no_sertifikat'");

$cek = $kd->num_rows;

if ($cek > 0){


		echo 'false';

		exit;
	 

 }else{



  $objectData->edit("UPDATE input_permohonan SET  ket_kesimpulan='$ket_kesimpulan', no_sertifikat='$no_sertifikat', waktu_apdate_sertifikat = CURRENT_TIMESTAMP, tanggal_sertifikat='$tanggal_sertifikat', rekomendasi='$rekomendasi', nama_penyelia='$nama_penyelia', nip_penyelia='$nip_penyelia', kepala_plh='$kepala_plh', nip_kepala_plh='$nip_kepala_plh' WHERE id ='$id'");


  $objectHasil->edit("UPDATE hasil_kt SET no_sertifikat='$no_sertifikat' WHERE id ='$id'");


  $objectData->edit("UPDATE scan_ttd SET ttd_penyelia_hasil_uji = '$ttd_penyelia_hasil_uji', ttd_mt_hasil_uji	='$ttd_mt_hasil_uji' WHERE id ='$id'");



 }


?>	

