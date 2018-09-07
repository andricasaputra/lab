<?php

include_once('header_proses.php');


	$id_pejabat			=$_POST['id_pejabat'];

	$nama_pejabat		=htmlspecialchars($conn->real_escape_string(trim($_POST['nama_pejabat'])));

	$nip_pejabat		=htmlspecialchars($conn->real_escape_string(trim($_POST['nip_pejabat'])));



 if($nama_sampel !=="") {

	 $objectSource->edit("UPDATE pejabat2 SET nama_pejabat='$nama_pejabat', nip_pejabat='$nip_pejabat' WHERE id_pejabat ='$id_pejabat'");



	 	echo "<script>window.alert('objectSource Berhasil Diubah')

	 	window.location='?page=tambah_nama_user';</script>";

	 

 }else{

	 

 }



?>	