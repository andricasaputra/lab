<?php

include_once('header_proses.php');

if (isset($_SESSION['loginsuperkh'])) {

	$redirect = '../../super_admin.php?page=input_nama_patogen_kh';

}elseif (isset($_SESSION['loginadminkh'])) {

	$redirect = '../../admin.php?page=input_nama_patogen_kh';

}else{

	$redirect = '../../index.php?page=input_nama_patogen_kh';
}

if (isset($_POST['input'])) :


	$id_patogen			=$_POST['id_patogen'];

	$nama_penyakit			=htmlspecialchars($conn->real_escape_string(trim($_POST['nama_penyakit'])));

	$nama_latin_penyakit	=htmlspecialchars($conn->real_escape_string(trim($_POST['nama_latin_penyakit'])));

            
 if($nama_penyakit !=="" && $nama_latin_penyakit !=="") {

	 $objectSource2->edit("UPDATE patogen_kh SET nama_penyakit='$nama_penyakit', nama_latin_penyakit ='$nama_latin_penyakit' WHERE id_patogen ='$id_patogen'");

	 	echo "<script>window.alert('Data Berhasil Diubah')

	 	window.location='".$redirect."';</script>";
 

 }else{



		echo "<script>window.alert('Tambah data Gagal!')

	 	window.location='".$redirect."';</script>";

	 

 }


endif;



?>	