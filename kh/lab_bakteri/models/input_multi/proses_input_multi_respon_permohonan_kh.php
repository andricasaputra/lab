<?php

require_once('../header_proses.php');


$ma						=htmlspecialchars($conn->real_escape_string(trim($_POST['ma'])));

$nip_ma					=htmlspecialchars($conn->real_escape_string(trim($_POST['nip_ma'])));

$saran					=htmlspecialchars($conn->real_escape_string(trim($_POST['saran'])));

$tanggal_selesai		=htmlspecialchars($conn->real_escape_string(trim($_POST['tanggal_selesai'])));


$sql = $conn->query("SELECT ma,saran FROM input_permohonan_kh WHERE ma !='' AND saran = ''");

$cek = $sql->num_rows;

if ($cek == 0) {
	echo "nodata"; exit;
}

  if($penyelia !=="") {

	 $objectData->edit2("UPDATE input_permohonan_kh SET  ma='$ma', nip_ma='$nip_ma', saran='$saran', tanggal_selesai='$tanggal_selesai' WHERE ma != '' AND saran = ''");

 }



?>		