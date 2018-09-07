<?php

require_once('../header_proses.php');

$sql = $conn->query("SELECT lab_penguji,yang_menerimalab FROM input_permohonan WHERE lab_penguji != '' AND yang_menerimalab = ''");

$cek = $sql->num_rows;

if ($cek == 0) {
	echo "nodata"; exit;
}

foreach ($_POST['id'] as $key => $value) :

$id											=$_POST['id'][$key];

$no_sampel									=htmlspecialchars($conn->real_escape_string(trim($_POST['no_sampel'][$key])));

$yang_menyerahkanlab 						=htmlspecialchars($conn->real_escape_string(trim($_POST['yang_menyerahkanlab'])));

$yang_menerimalab 							=htmlspecialchars($conn->real_escape_string(trim($_POST['yang_menerimalab'])));

$nip_yang_menyerahkanlab					=htmlspecialchars($conn->real_escape_string(trim($_POST['nip_yang_menyerahkanlab'])));

$nip_yang_menerimalab						=htmlspecialchars($conn->real_escape_string(trim($_POST['nip_yang_menerimalab'])));

$ttd_yang_menyerahkan_pengelola_sampel		=htmlspecialchars($conn->real_escape_string(trim($_POST['ttd_yang_menyerahkan_pengelola_sampel'])));

$ttd_yang_menerima_pengelola_sampel			=htmlspecialchars($conn->real_escape_string(trim($_POST['ttd_yang_menerima_pengelola_sampel'])));


$data = array(

	'no_sampel'=>$no_sampel, 
	'yang_menyerahkanlab'=>$yang_menyerahkanlab,
	'yang_menerimalab'=>$yang_menerimalab,
	'nip_yang_menyerahkanlab'=>$nip_yang_menyerahkanlab,
	'nip_yang_menerimalab'=>$nip_yang_menerimalab

);

$data2 = array(

	'ttd_yang_menyerahkan_pengelola_sampel'=>$ttd_yang_menyerahkan_pengelola_sampel, 
	'ttd_yang_menerima_pengelola_sampel'=>$ttd_yang_menerima_pengelola_sampel

);

$where = array('id'=>$id);

$objectData->update($data, $where);

if ($ttd_yang_menerima_pengelola_sampel == 'Ya' || $ttd_yang_menyerahkan_pengelola_sampel == 'Ya') {

	$objectData->updateScanttd($data2, $where);

}


endforeach;

?>	