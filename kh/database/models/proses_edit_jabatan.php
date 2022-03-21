<?php

include_once('header_proses.php');

$id		=$_POST['id'];

$jabatan=htmlspecialchars($conn->real_escape_string(trim($_POST['jabatan'])));

if($jabatan !=="") {
	if (! $objectJabatan->updateJabatan(trim($jabatan), $id)) {
		throw new \Exception("Erorr");
	}

	return true;
}



?>	