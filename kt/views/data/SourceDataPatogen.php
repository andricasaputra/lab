
<?php

   include_once ('header_source.php');

   $id = $_GET['id'];


   $sql = "SELECT * FROM penyakit WHERE patogen IN ('$id')"; 


   $result = $conn->query($sql);


   $json = [];
   
   while($row = $result->fetch_assoc()){
        $json[$row['id']] = $row['nama_latin_penyakit'];
       	sort($json);
   }


   echo json_encode($objectData->utf8ize($json));
?>