<?php 
include_once ('header_source.php');

$nomor=1;

$tampil = $objectData->tampil2();

$jumlahData = $tampil->num_rows;

$datas = array();

if ($jumlahData == 0) {

	$dat = $datas;
	echo json_encode($dat);
	exit;

}

while ($data = $tampil->fetch_assoc()):

  array_unshift($data, $nomor++);

  $datas[] = array_filter(array_slice($data,0, 70));

  $dat["data"] = $datas;

  
endwhile;

  echo json_encode($objectData->utf8ize($dat));

?>

   


