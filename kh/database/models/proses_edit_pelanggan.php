<?php

include_once('header_proses.php');

if (isset($_SESSION['loginsuperkh'])) {

	$redirect = '../../super_admin.php?page=input_nama_pelanggan';

}elseif (isset($_SESSION['loginadminkh'])) {

	$redirect = '../../admin.php?page=input_nama_pelanggan';

}else{

	$redirect = '../../index.php?page=input_nama_pelanggan';
}

if (isset($_POST['input'])) :


$id					=$_POST['id'];

$nama_pelanggan		=htmlspecialchars($conn->real_escape_string(trim($_POST['nama_pelanggan'])));

$alamat_pelanggan	=htmlspecialchars($conn->real_escape_string(trim($_POST['alamat_pelanggan'])));

		

 if($nama_pelanggan !=="") {

	 $objectSource4->edit("UPDATE pelanggan_kh SET nama_pelanggan='$nama_pelanggan', alamat_pelanggan='$alamat_pelanggan' WHERE id ='$id'");



	 	echo "<script>window.alert('Data Berhasil Diubah')

	 	window.location='".$redirect."';</script>";

	 

 }


endif;



?>	