<?php

require_once('../header_proses.php');

$sql = $conn->query("SELECT tanggal_pengujian,no_sertifikat FROM input_permohonan_kh_lab_parasit WHERE tanggal_pengujian != '' AND no_sertifikat = ''");

$cek = $sql->num_rows;

if ($cek == 0) {
	echo "nodata"; exit;
}

/*INSERT MULTIPLE HASIL_KH TABLE*/


foreach ($_POST['no_sampel'] as $key2 => $value2) :


	$id2 				= $_POST['id2'][$key2];

	$no_sampel			=htmlspecialchars($conn->real_escape_string($_POST['no_sampel'][$key2]));

	$tanggal_acu_hasil  = $_POST['tanggal_acu_hasil'][$key2];

	$positif_negatif	=htmlspecialchars($conn->real_escape_string($_POST['positif_negatif'][$key2]));

	$positif_negatif_target3	=htmlspecialchars($conn->real_escape_string($_POST['positif_negatif_target3'][$key2]));

	$hasil_pengujian	=htmlspecialchars($conn->real_escape_string($_POST['hasil_pengujian']));



    $objectHasilParasit->input($id2, $tanggal_acu_hasil, $no_sampel, $positif_negatif, $positif_negatif_target3);

endforeach;	

	$objectHasilParasit->edit("UPDATE input_permohonan_kh_lab_parasit SET hasil_pengujian='$hasil_pengujian' WHERE hasil_pengujian ='' AND id <= $id2");






?>	

