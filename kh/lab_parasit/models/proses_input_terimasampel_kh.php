<?php

require_once('header_proses.php');


$id						=$_POST['id'];

$tanggal_diterima		=htmlspecialchars($conn->real_escape_string(trim($_POST['tanggal_diterima'])));

$jam_diterima			=htmlspecialchars($conn->real_escape_string(trim($_POST['jam_diterima'])));

$cara_pengiriman		=htmlspecialchars($conn->real_escape_string(trim($_POST['cara_pengiriman'])));

$pengantar				=htmlspecialchars($conn->real_escape_string(trim($_POST['nama_pengirim'])));

$nama_pelanggan			=htmlspecialchars($conn->real_escape_string(trim($_POST['nama_pelanggan'])));

$alamat_pelanggan		=htmlspecialchars($conn->real_escape_string(trim($_POST['alamat_pelanggan'])));

$jenis_sampel			=htmlspecialchars($conn->real_escape_string(trim($_POST['jenis_sampel'])));

$jumlah_kontainer		=htmlspecialchars($conn->real_escape_string(trim($_POST['jumlah_kontainer'])));

$lama_pengujian			=htmlspecialchars($conn->real_escape_string(trim($_POST['lama_pengujian'])));

$penerima_sampel		=htmlspecialchars($conn->real_escape_string(trim($_POST['penerima_sampel'])));

$nip_penerima_sampel	=htmlspecialchars($conn->real_escape_string(trim($_POST['nip_penerima_sampel'])));

$target_pengujian2		=htmlspecialchars($conn->real_escape_string(trim($_POST['target_pengujian2'])));

$target_pengujian3		=htmlspecialchars($conn->real_escape_string(trim($_POST['target_pengujian3'])));


if (!empty($penerima_sampel)) {


	 $objectDataParasit->edit("UPDATE input_permohonan_kh_lab_parasit SET tanggal_diterima='$tanggal_diterima', jam_diterima='$jam_diterima', cara_pengiriman ='$cara_pengiriman', nama_pengirim ='$pengantar',  jumlah_kontainer = '$jumlah_kontainer',  lama_pengujian ='$lama_pengujian', penerima_sampel = '$penerima_sampel', nip_penerima_sampel='$nip_penerima_sampel',  nama_pelanggan='$nama_pelanggan', alamat_pelanggan='$alamat_pelanggan', jenis_sampel='$jenis_sampel', target_pengujian2 ='$target_pengujian2' , target_pengujian3 ='$target_pengujian3' WHERE id ='$id'");


}

?>



