
<?php

   include_once ('header_source.php');


   $sql = "SELECT * FROM pejabat2
         WHERE nama_pejabat LIKE '%".@$_GET['id']."%'"; 


   $result = $conn->query($sql);


   $json = [];
   while($row = $result->fetch_assoc()){
        $json[$row['id_pejabat']] = $row['nip_pejabat'];
   }


   echo json_encode($objectData->utf8ize($json));
?>