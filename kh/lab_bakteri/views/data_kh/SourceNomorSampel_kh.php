<?php

  include_once ("header_source.php");

  if ($objectData->KosongData() == 0) {

      $json = [];
      $json += ["awal" => 0, "akhir" => 0];
      echo json_encode($objectData->utf8ize($json));
      exit;
      
  }


   $result = $objectNomor->NomorSampel();

   $json = [];
   while($row = $result->fetch_assoc()){

        $ex = explode("-", $row['no_sampel']);

        $awal = $ex[0];

        $akhir = end($ex);

        $json += ["awal" => $awal, "akhir" => $akhir];

   }
   

   echo json_encode($objectData->utf8ize($json));
?>