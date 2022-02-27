<?php

require_once('../header_proses.php');


$tanggal_diterima		=htmlspecialchars($conn->real_escape_string(trim($_POST['tanggal_diterima'])));

$jam_diterima			=htmlspecialchars($conn->real_escape_string(trim($_POST['jam_diterima'])));

$cara_pengiriman		=htmlspecialchars($conn->real_escape_string(trim($_POST['cara_pengiriman'])));

$pengantar				=htmlspecialchars($conn->real_escape_string(trim($_POST['nama_pengirim'])));


$jumlah_kontainer		=htmlspecialchars($conn->real_escape_string(trim($_POST['jumlah_kontainer'])));

$lama_pengujian			=htmlspecialchars($conn->real_escape_string(trim($_POST['lama_pengujian'])));

$penerima_sampel		=htmlspecialchars($conn->real_escape_string(trim($_POST['penerima_sampel'])));

$nip_penerima_sampel	=htmlspecialchars($conn->real_escape_string(trim($_POST['nip_penerima_sampel'])));

$target_pengujian2		=htmlspecialchars($conn->real_escape_string(trim($_POST['target_pengujian2'])));


$sql = $conn->query("SELECT penerima_sampel FROM input_permohonan_kh WHERE penerima_sampel IS NULL");

$cek = $sql->num_rows;

if ($cek == 0) {
	echo "nodata"; exit;
}
	
if (!empty($penerima_sampel) && !empty($tanggal_diterima)){

	 $objectData->edit("UPDATE input_permohonan_kh SET tanggal_diterima='$tanggal_diterima', jam_diterima='$jam_diterima', cara_pengiriman ='$cara_pengiriman', nama_pengirim ='$pengantar',  jumlah_kontainer = '$jumlah_kontainer',  lama_pengujian ='$lama_pengujian', penerima_sampel = '$penerima_sampel', nip_penerima_sampel='$nip_penerima_sampel', target_pengujian2 ='$target_pengujian2' WHERE penerima_sampel IS NULL");
	 
 }
								

?>



