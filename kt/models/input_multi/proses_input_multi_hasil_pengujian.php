<?php

require_once('../header_proses.php');

$sql = $conn->query("SELECT tanggal_pengujian,no_sertifikat FROM input_permohonan WHERE tanggal_pengujian IS NOT NULL AND no_sertifikat IS NULL");

$cek = $sql->num_rows;

if ($cek == 0) {
	echo "nodata"; exit;
}

/*INSERT HASIL_KH TABLE*/

foreach ($_POST['no_sampel'] as $key => $value) :


	$id                 = $_POST['id2'];

    $tanggal_acu_hasil  = $_POST['tanggal_acu_hasil'];

    $no_sampel          = htmlspecialchars($conn->real_escape_string($_POST['no_sampel'][$key]));

    $bagian_tumbuhan    = $_POST['bagian_tumbuhan'];

    $vektor             = $_POST['vektor'];

    $media              = $_POST['media'];

    $target_optk        = $_POST['target_optk'];

    $target_optk2       = $_POST['target_optk2'];

    $target_optk3       = $_POST['target_optk3'];

    $metode_pengujian   = $_POST['metode_pengujian'];

    $metode_pengujian2  = $_POST['metode_pengujian2'];

    $metode_pengujian3  = $_POST['metode_pengujian3'];

    $positif_negatif    = htmlspecialchars($conn->real_escape_string($_POST['positif_negatif'][$key]));

    $hasil_pengujian    = htmlspecialchars($conn->real_escape_string($_POST['hasil_pengujian'][$key]));

    $hasil_pengujian2    = htmlspecialchars($conn->real_escape_string($_POST['hasil_pengujian2']));

    $objectHasil->input1($id, $tanggal_acu_hasil , $no_sampel, $bagian_tumbuhan, $vektor, $media, $target_optk, $target_optk2, $target_optk3, $metode_pengujian, $metode_pengujian2, $metode_pengujian3, null ,$positif_negatif, $hasil_pengujian);


endforeach;	


	$objectHasil->edit("UPDATE input_permohonan SET hasil_pengujian='$hasil_pengujian2' WHERE id = $id");




?>	

