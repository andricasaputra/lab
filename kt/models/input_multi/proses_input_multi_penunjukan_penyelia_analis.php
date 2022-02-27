<?php

require_once('../header_proses.php');

foreach ($_POST['id'] as $key => $value) :

$id						=$_POST['id'][$key];

$tanggal_penunjukan		=htmlspecialchars($conn->real_escape_string(trim($_POST['tanggal_penunjukan'])));

$lab_penguji			=htmlspecialchars($conn->real_escape_string(trim($_POST['lab_penguji'][$key])));

$nama_penyelia			=htmlspecialchars($conn->real_escape_string(trim($_POST['nama_penyelia'])));

$nama_analis			=htmlspecialchars($conn->real_escape_string(trim($_POST['nama_analis'])));

$jab_penyelia			=htmlspecialchars($conn->real_escape_string(trim($_POST['jab_penyelia'])));

$jab_analis				=htmlspecialchars($conn->real_escape_string(trim($_POST['jab_analis'])));

$hari					=htmlspecialchars($conn->real_escape_string(trim($_POST['hari'])));

$bulan					=htmlspecialchars($conn->real_escape_string(trim($_POST['bulan'])));

$tahun					=htmlspecialchars($conn->real_escape_string(trim($_POST['tahun'])));

$no_surat_tugas			=htmlspecialchars($conn->real_escape_string(trim($_POST['no_surat_tugas'][$key])));

$mt						=htmlspecialchars($conn->real_escape_string(trim($_POST['mt'])));

$nip_mt					=htmlspecialchars($conn->real_escape_string(trim($_POST['nip_mt'])));


$kd = $conn->query("SELECT no_surat_tugas FROM input_permohonan WHERE no_surat_tugas='$no_surat_tugas'");

$cek = $kd->num_rows;

if ($cek > 0){

	echo 'false';

	exit;

 }

 $data = array(

	'tanggal_penunjukan'=> $tanggal_penunjukan, 
	'lab_penguji'=> $lab_penguji,
	'nama_penyelia'=> $nama_penyelia,
	'nama_analis'=> $nama_analis,
	'jab_penyelia'=> $jab_penyelia,
	'jab_analis'=> $jab_analis,
	'hari' => $hari,
	'bulan' => $bulan,
	'tahun' => $tahun,
	'no_surat_tugas' => $no_surat_tugas,
	'mt' => $mt,
	'nip_mt' => $nip_mt

);

$where = array('id'=>$id);

$objectData->update($data, $where);

endforeach;


?>			