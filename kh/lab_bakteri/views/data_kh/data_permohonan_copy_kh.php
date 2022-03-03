<?php  

include_once ("header_source.php");

$id = $_GET['id'];

$sql = "SELECT * FROM input_permohonan_kh WHERE id = $id";

$result = $conn->query($sql);

$json = [];
   while($row = $result->fetch_assoc()){
        $json[$row['id']] = $row;
   }

echo json_encode($objectData->utf8ize($json));

?>