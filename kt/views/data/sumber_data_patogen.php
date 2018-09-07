<?php

include_once ('header_source.php');


if (isset($_POST['nama_penyakit'])) {

	$patogen = array();
	$object = $objectData->get_tampil_patogen($_POST['nama_penyakit']);
	while($results = $object->fetch_assoc()){
			foreach ($results as $result) {
				 echo $result;
			}
		}


	}
?>