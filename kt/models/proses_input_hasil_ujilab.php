<?php 

require_once('header_proses.php');
                   
foreach ($_POST['no_sampel'] as $i => $value) :

    $id                 = $_POST['id'][$i];

    $tanggal_acu_hasil  = $_POST['tanggal_acu_hasil'][$i];

    $no_sampel          = htmlspecialchars($conn->real_escape_string($_POST['no_sampel'][$i]));

    $bagian_tumbuhan    = $_POST['bagian_tumbuhan'][$i];

    $vektor             = $_POST['vektor'][$i];

    $media              = $_POST['media'][$i];

    $target_optk        = $_POST['target_optk'][$i];

    $target_optk2       = $_POST['target_optk2'][$i];

    $target_optk3       = $_POST['target_optk3'][$i];

    $metode_pengujian   = $_POST['metode_pengujian'][$i];

    $metode_pengujian2  = $_POST['metode_pengujian2'][$i];

    $metode_pengujian3  = $_POST['metode_pengujian3'][$i];

    $no_sertifikat      = $_POST['no_sertifikat'][$i];

    $positif_negatif    = htmlspecialchars($conn->real_escape_string($_POST['positif_negatif'][$i]));

    $hasil_pengujian    = htmlspecialchars($conn->real_escape_string($_POST['hasil_pengujian'][$i]));

    /*Ini (hasil pengujian 2) Untuk Di tabel input permohonan nya.. valuenya cuma 'terinput'*/

    $hasil_pengujian2    = htmlspecialchars($conn->real_escape_string($_POST['hasil_pengujian2']));

  if($no_sampel !==""){

      $objectHasil->input1($id, $tanggal_acu_hasil , $no_sampel, $bagian_tumbuhan, $vektor, $media, $target_optk, $target_optk2, $target_optk3, $metode_pengujian, $metode_pengujian2, $metode_pengujian3, $no_sertifikat ,$positif_negatif, $hasil_pengujian);


      echo 'goal';


    }else{

       echo 'false';

    }

  endforeach;

  $objectHasil->edit("UPDATE input_permohonan SET hasil_pengujian='$hasil_pengujian2' WHERE id = $id");


   

?>
