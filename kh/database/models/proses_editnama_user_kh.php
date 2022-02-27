<?php

include_once('header_proses.php');

if (isset($_POST['edit'])) :

	$id_pejabat			=$_POST['id_pejabat'];

	$nama_pejabat		=htmlspecialchars($conn->real_escape_string(trim($_POST['nama_pejabat'])));

	$nip_pejabat		=htmlspecialchars($conn->real_escape_string(trim($_POST['nip_pejabat'])));


	 if($nama_pejabat !=="") {

		 $objectSource3->edit("UPDATE pejabat2_kh SET nama_pejabat='$nama_pejabat', nip_pejabat='$nip_pejabat' WHERE id_pejabat ='$id_pejabat'");

		 	if (@$_SESSION['loginsuperkh']) {

				$redirect = '../../super_admin.php?page=tambah_nama_user_kh';

			}elseif (@$_SESSION['loginadminkh']) {

				$redirect = '../../admin.php?page=tambah_nama_user_kh';

			}else{

				$redirect = '../../index.php?page=tambah_nama_user_kh';
			}


		 	echo "<script>window.alert('Data Berhasil Diubah')

		 	window.location='".$redirect."';</script>";

		 

	 }

	
endif;

	

?>	