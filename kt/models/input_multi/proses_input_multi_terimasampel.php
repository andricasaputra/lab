<?php

require_once('../header_proses.php');

$arrid = array();

foreach ($_POST["id"] as $key => $value) :

$id						=$_POST['id'][$key];

$tanggal_diterima		=htmlspecialchars($conn->real_escape_string(trim($_POST['tanggal_diterima'])));

$cara_pengiriman		=htmlspecialchars($conn->real_escape_string(trim($_POST['cara_pengiriman'])));

$pengantar				=htmlspecialchars($conn->real_escape_string(trim($_POST['pengantar'])));

$jumlah_kontainer		=htmlspecialchars($conn->real_escape_string(trim($_POST['jumlah_kontainer'])));

$lama_pengujian			=htmlspecialchars($conn->real_escape_string(trim($_POST['lama_pengujian'][$key])));

$lama_pengujian2		=htmlspecialchars($conn->real_escape_string(trim($_POST['lama_pengujian2'][$key])));

$lama_pengujian3		=htmlspecialchars($conn->real_escape_string(trim($_POST['lama_pengujian3'][$key])));

$jabatan				=htmlspecialchars($conn->real_escape_string(trim($_POST['jabatan'])));

$nip_penerima_sampel	=htmlspecialchars($conn->real_escape_string(trim($_POST['nip_penerima_sampel'])));

$data = array(

	'tanggal_diterima'=>$tanggal_diterima, 
	'cara_pengiriman'=>$cara_pengiriman,
	'pengantar'=>$pengantar,
	'jumlah_kontainer'=>$jumlah_kontainer,
	'lama_pengujian'=>$lama_pengujian,
	'lama_pengujian2'=>$lama_pengujian2,
	'lama_pengujian3'=>$lama_pengujian3,
	'jabatan'=>$jabatan,
	'nip_penerima_sampel'=>$nip_penerima_sampel,
	

);

$where = array('id'=>$id);

$objectData->update($data, $where);

$arrid[] = $id;

endforeach;

$objectData->InsertScanttd($arrid);

	
?>



