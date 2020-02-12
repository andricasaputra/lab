<?php

require_once('../header_proses.php');

$sql = $conn->query("SELECT tanggal_pengujian,no_sertifikat FROM input_permohonan_kh WHERE tanggal_pengujian != '' AND no_sertifikat = ''");

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

	$hasil_pengujian	=htmlspecialchars($conn->real_escape_string($_POST['hasil_pengujian']));


	$cek = substr($no_sampel, 0, 1);

    if ($cek !== "0") {

      $objectHasil->input($id2, $tanggal_acu_hasil, $no_sampel, $positif_negatif);


    }else{

      $objectHasil->input2($id2, $tanggal_acu_hasil, $no_sampel, $positif_negatif);

    }

endforeach;	

	$objectHasil->edit("UPDATE input_permohonan_kh SET hasil_pengujian='$hasil_pengujian' WHERE hasil_pengujian ='' AND id <= $id2");


?>	

