<?php

include_once('header_proses.php');

$id			=$_POST['id'];

$nama_pejabat		=htmlspecialchars($conn->real_escape_string(trim($_POST['nama_pejabat'])));

$jabatan		=htmlspecialchars($conn->real_escape_string(trim($_POST['jabatan'])));

$jabfung		=htmlspecialchars($conn->real_escape_string(trim($_POST['jabfung'])));

$nip		=htmlspecialchars($conn->real_escape_string(trim($_POST['nip'])));

if($nama_pejabat !=="") {

if (! $objectPejabat->updatePejabat($nama_pejabat, $jabatan, $jabfung, $nip, $id)) {

	throw new \Exception("Erorr");
}

return true;
}



	

?>	