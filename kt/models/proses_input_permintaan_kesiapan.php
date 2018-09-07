<?php

require_once('header_proses.php');

	$id					=$_POST['id'];

	$ma					=htmlspecialchars($conn->real_escape_string(trim($_POST['ma'])));

	$nip_ma				=htmlspecialchars($conn->real_escape_string(trim($_POST['nip_ma'])));




if ($ma !==""){


  $objectData->edit("UPDATE input_permohonan SET  ma='$ma', nip_ma='$nip_ma' WHERE id ='$id'");


 }


?>	

