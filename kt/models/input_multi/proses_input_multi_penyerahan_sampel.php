<?php

require_once('../header_proses.php');

foreach ($_POST["id"] as $key => $value) :

$id						=$_POST['id'][$key];

$tanggal_penyerahan		=htmlspecialchars($conn->real_escape_string(trim($_POST['tanggal_penyerahan'])));

$kode_sampel			=htmlspecialchars($conn->real_escape_string(trim($_POST['kode_sampel'][$key])));

$yang_menyerahkan		=htmlspecialchars($conn->real_escape_string(trim($_POST['yang_menyerahkan'])));

$yang_menerima			=htmlspecialchars($conn->real_escape_string(trim($_POST['yang_menerima'])));

$nip_ygmenyerahkan		=htmlspecialchars($conn->real_escape_string(trim($_POST['nip_ygmenyerahkan'])));

$nip_ygmenerima			=htmlspecialchars($conn->real_escape_string(trim($_POST['nip_ygmenerima'])));



$kd = $conn->query("SELECT kode_sampel FROM input_permohonan WHERE kode_sampel='$kode_sampel'");

$cek = $kd->num_rows;



if ($cek > 0){


	echo 'false';

	exit;
 	 

 }

$data = array(

	'tanggal_penyerahan'=>$tanggal_penyerahan, 
	'kode_sampel'=>$kode_sampel,
	'yang_menyerahkan'=>$yang_menyerahkan,
	'yang_menerima'=>$yang_menerima,
	'nip_ygmenyerahkan'=>$nip_ygmenyerahkan,
	'nip_ygmenerima'=>$nip_ygmenerima

);

$where = array('id'=>$id);

$objectData->update($data, $where);

endforeach;


?>		