<?php
include_once('header_proses.php');

if (@$_SESSION['loginsuperkh']) {

	$redirect = '../../super_admin.php?page=input_nama_hewan';

}elseif (@$_SESSION['loginadminkh']) {

	$redirect = '../../admin.php?page=input_nama_hewan';

}else{

	$redirect = '../../index.php?page=input_nama_hewan';
}

if (isset($_POST['input'])) :


$id_hewan			=$_POST['id_hewan'];

$nama_hewan			=htmlspecialchars($conn->real_escape_string(trim($_POST['nama_hewan'])));

$nama_ilmiah_hewan	=htmlspecialchars($conn->real_escape_string(trim($_POST['nama_ilmiah_hewan'])));

		

 if($nama_hewan !=="") {

	 $objectSource->edit("UPDATE hewan SET nama_hewan='$nama_hewan', nama_ilmiah_hewan='$nama_ilmiah_hewan' WHERE id_hewan ='$id_hewan'");



	 	echo "<script>window.alert('Data Berhasil Diubah')

	 	window.location='".$redirect."';</script>";

	 

 }


endif;



?>	