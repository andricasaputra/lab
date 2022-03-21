<?php

include_once('header_proses.php');

$id		=$_POST['id'];

$jabfung=htmlspecialchars($conn->real_escape_string(trim($_POST['jabfung'])));

if($jabfung !=="") {
	if (! $objectJabfung->updatejabfung(trim($jabfung), $id)) {
		throw new \Exception("Erorr");
	}

	return true;
}



?>	