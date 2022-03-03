<?php

require_once('../header_proses.php');

$ma							=htmlspecialchars($conn->real_escape_string(trim($_POST['ma'])));

$nip_ma						=htmlspecialchars($conn->real_escape_string(trim($_POST['nip_ma'])));

$sql = $conn->query("SELECT kode_sampel, ma FROM input_permohonan_kh_lab_parasit WHERE kode_sampel IS NOT NULL AND ma IS NULL");

$cek = $sql->num_rows;

if ($cek == 0) {
	echo "nodata"; exit;
}

if ($ma !="") {

	$objectDataParasit->edit("UPDATE input_permohonan_kh_lab_parasit SET  ma='$ma', nip_ma='$nip_ma' WHERE kode_sampel IS NOT NULL AND ma IS NULL");

}

?>	

