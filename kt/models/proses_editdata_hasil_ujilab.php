<?php 

require_once('header_proses.php');
                   
 foreach ($_POST['hasil_pengujian'] as $i => $value) {

    $id               = $_POST['id'][$i];

    $no_sampel        = $_POST['no_sampel'][$i];

    $positif_negatif  = htmlspecialchars($conn->real_escape_string($_POST['positif_negatif'][$i]));

    $hasil_pengujian  = htmlspecialchars($conn->real_escape_string($_POST['hasil_pengujian'][$i]));

  if($no_sampel !== ""){

  $query = $objectHasil->edit( "UPDATE hasil_kt SET id='$id', positif_negatif='$positif_negatif', hasil_pengujian='$hasil_pengujian' WHERE no_sampel='$no_sampel'");

      echo 'goal';
  
  }else {

     echo 'false';

  }

 }
  

?>
