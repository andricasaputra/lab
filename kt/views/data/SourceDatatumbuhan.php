
<?php

   include_once ('header_source.php');


   $sql = "SELECT * FROM tumbuhan
         WHERE nama_tumbuhan LIKE '%".@$_GET['id']."%'"; 


   $result = $conn->query($sql);


   $json = [];
   while($row = $result->fetch_assoc()){
        $json[$row['id_tumbuhan']] = $row['nama_ilmiah_tumbuhan'];
        sort($json);
   }


   echo json_encode($objectData->utf8ize($json));
?>