<?php

require_once('../header_proses.php');

$sql = $conn->query("SELECT mt,lab_penguji FROM input_permohonan_kh WHERE mt != '' AND lab_penguji = ''");

$cek = $sql->num_rows;

if ($cek == 0) {
	echo "nodata"; exit;
}

foreach ($_POST['id'] as $key => $value) :

$id						=$_POST['id'][$key];

$tanggal_penunjukan		=htmlspecialchars($conn->real_escape_string($_POST['tanggal_penunjukan']));

$lab_penguji			=htmlspecialchars($conn->real_escape_string($_POST['lab_penguji']));

$nama_penyelia			=htmlspecialchars($conn->real_escape_string($_POST['nama_penyelia']));

$nama_analis			=htmlspecialchars($conn->real_escape_string($_POST['nama_analis']));

$jab_penyelia			=htmlspecialchars($conn->real_escape_string($_POST['jab_penyelia']));

$jab_analis				=htmlspecialchars($conn->real_escape_string($_POST['jab_analis']));

$hari					=htmlspecialchars($conn->real_escape_string($_POST['hari']));

$bulan					=htmlspecialchars($conn->real_escape_string($_POST['bulan']));

$tahun					=htmlspecialchars($conn->real_escape_string($_POST['tahun']));

$no_surat_tugas			=htmlspecialchars($conn->real_escape_string($_POST['no_surat_tugas'][$key]));

$mt						=htmlspecialchars($conn->real_escape_string($_POST['mt']));

$nip_mt					=htmlspecialchars($conn->real_escape_string($_POST['nip_mt']));

if (!empty($no_surat_tugas)) {

$objectData->edit("UPDATE input_permohonan_kh SET tanggal_penunjukan='$tanggal_penunjukan', lab_penguji='$lab_penguji', nama_penyelia='$nama_penyelia', nama_analis='$nama_analis', jab_penyelia='$jab_penyelia', jab_analis='$jab_analis' , hari='$hari' , bulan='$bulan' , tahun='$tahun' , no_surat_tugas='$no_surat_tugas', mt='$mt' , nip_mt='$nip_mt' WHERE id=$id");

}


endforeach;
?>			