<?php  

include_once ("header_source.php");

$nama_pelanggan = $_POST['id'];

$sql = "SELECT alamat_pelanggan FROM pelanggan_kh WHERE nama_pelanggan LIKE '%".$nama_pelanggan."%' ";

$result = $conn->query($sql);

if ($result->num_rows > 0) {

	$json = array();

	while($row = $result->fetch_assoc()):

        $json[] = str_replace(";", "", $row["alamat_pelanggan"]);

   	endwhile;

   	$jsonok= array_unique($json);
}


echo json_encode($objectDataParasit->utf8ize($jsonok));
	   	




?>