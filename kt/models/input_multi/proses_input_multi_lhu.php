<?php

require_once('../header_proses.php');

$sql = $conn->query("SELECT no_sertifikat,no_agenda FROM input_permohonan WHERE no_sertifikat != '' AND no_agenda = ''");

$cek = $sql->num_rows;

if ($cek == 0) {
	echo "nodata"; exit;
}

foreach ($_POST['id'] as $key => $value) :

$id					=$_POST['id'][$key];

$no_agenda			=htmlspecialchars($conn->real_escape_string($_POST['no_agenda'][$key]));

$no_lhu				=htmlspecialchars($conn->real_escape_string($_POST['no_lhu'][$key]));

$tanggal_lhu		=htmlspecialchars($conn->real_escape_string($_POST['tanggal_lhu']));

$kepala_plh2		=htmlspecialchars($conn->real_escape_string($_POST['kepala_plh2']));

$nip_kepala_plh2	=htmlspecialchars($conn->real_escape_string($_POST['nip_kepala_plh2']));


$objectData->edit("UPDATE input_permohonan SET  no_agenda='$no_agenda', no_lhu='$no_lhu', tanggal_lhu='$tanggal_lhu', kepala_plh2='$kepala_plh2', nip_kepala_plh2='$nip_kepala_plh2' WHERE id ='$id'");


endforeach;	
?>	

