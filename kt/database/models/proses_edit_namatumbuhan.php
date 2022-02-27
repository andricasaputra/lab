<?php
include_once('header_proses.php');

if (isset($_SESSION['loginsuperkt'])) {

	$redirect = '../../super_admin.php?page=input_nama_tumbuhan';

}elseif (isset($_SESSION['loginadminkt'])) {

	$redirect = '../../admin.php?page=input_nama_tumbuhan';

}else{

	$redirect = '../../index.php?page=input_nama_tumbuhan';
}

if (isset($_POST['input'])) :


$id_tumbuhan			=$_POST['id_tumbuhan'];

$nama_tumbuhan			=htmlspecialchars($conn->real_escape_string(trim($_POST['nama_tumbuhan'])));

$nama_ilmiah_tumbuhan	=htmlspecialchars($conn->real_escape_string(trim($_POST['nama_ilmiah_tumbuhan'])));

		

 if($nama_tumbuhan !=="") {

	 $objectSource->edit("UPDATE tumbuhan SET nama_tumbuhan='$nama_tumbuhan', nama_ilmiah_tumbuhan='$nama_ilmiah_tumbuhan' WHERE id_tumbuhan ='$id_tumbuhan'");



	 	echo "<script>window.alert('objectSource Berhasil Diubah')

	 	window.location='".$redirect."';</script>";

	 

 }


endif;



?>	