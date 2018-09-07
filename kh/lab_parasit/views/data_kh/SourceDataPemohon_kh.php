<?php

  include_once ("header_source.php");


   $sql = "SELECT * FROM pejabat_kh
         WHERE nama_pejabat LIKE '%".@$_GET['id']."%'"; 


   $result = $conn->query($sql);


   $json = [];
   while($row = $result->fetch_assoc()){
        $json[$row['id_pejabat']] = $row['nip'];
   }


   echo json_encode($objectDataParasit->utf8ize($json));
?>