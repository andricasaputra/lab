<?php

  include_once ("header_source.php");

  if ($objectData->KosongData() == 0) {

      $json = [];
      $json += ["awal" => 0, "akhir" => 0];
      echo json_encode($objectData->utf8ize($json));
      exit;
      
  }


   $sql = "SELECT no_sampel, jumlah_sampel FROM input_permohonan_kh WHERE nama_sampel != 'Darah Sapi Bibit' AND id = '".$_GET['id']."' "; 


   $result = $conn->query($sql);


   $json = [];
   while($row = $result->fetch_assoc()){

        $ex = explode("-", $row['no_sampel']);

        $awal = $ex[0];

        $akhir = end($ex);

        $json += ["awal" => $awal, "akhir" => $akhir];

   }
   

   echo json_encode($objectData->utf8ize($json));
?>