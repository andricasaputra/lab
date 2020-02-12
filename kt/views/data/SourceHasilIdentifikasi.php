<?php

   include_once ('header_source.php');


   $sql = "SELECT hasil_pengujian FROM hasil_kt
         WHERE hasil_pengujian LIKE '%".$_POST['hasil']."%' GROUP BY hasil_pengujian"; 


   $result = $conn->query($sql);


   $json = [];
   while($row = $result->fetch_assoc()){
        $json[] = $row['hasil_pengujian'];
   }


   echo json_encode($objectData->utf8ize($json));
?>