<?php

require_once('header_proses.php');


$id					=$_POST['id'];

$no_agenda			=htmlspecialchars($conn->real_escape_string($_POST['no_agenda']));

$no_lhu				=htmlspecialchars($conn->real_escape_string($_POST['no_lhu']));

$tanggal_lhu		=htmlspecialchars($conn->real_escape_string($_POST['tanggal_lhu']));

$kepala_plh2		=htmlspecialchars($conn->real_escape_string($_POST['kepala_plh2']));

$nip_kepala_plh2	=htmlspecialchars($conn->real_escape_string($_POST['nip_kepala_plh2']));



if ($no_lhu !== "") {
    
        $objectData->edit("UPDATE input_permohonan SET  no_agenda='$no_agenda', no_lhu='$no_lhu', tanggal_lhu='$tanggal_lhu', kepala_plh2='$kepala_plh2', nip_kepala_plh2='$nip_kepala_plh2' WHERE id ='$id'");

    }	

?>	

