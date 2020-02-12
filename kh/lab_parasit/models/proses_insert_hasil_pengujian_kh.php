<?php  

require_once('header_proses.php'); 

  foreach ($_POST['no_sampel'] as $i => $value) :


    $id                 = $_POST['id'][$i];

    $tanggal_acu_hasil  = $_POST['tanggal_acu_hasil'][$i];

    $no_sampel          = htmlspecialchars($conn->real_escape_string($_POST['no_sampel'][$i]));

    $positif_negatif    = htmlspecialchars($conn->real_escape_string($_POST['positif_negatif'][$i]));

    if (!empty($_POST['positif_negatif_target3'][$i])) {

       $positif_negatif_target3    = htmlspecialchars($conn->real_escape_string($_POST['positif_negatif_target3'][$i]));

    }else{
      
      $positif_negatif_target3    = '';

    }

    $hasil_pengujian  =htmlspecialchars($conn->real_escape_string($_POST['hasil_pengujian']));



  if($no_sampel!==""){

    $cek = substr($no_sampel, 0, 1);

    if ($cek !== "0") {

      $insertDb = $objectHasilParasit->input($id, $tanggal_acu_hasil, $no_sampel, $positif_negatif, $positif_negatif_target3);

    }else{

      $insertDb = $objectHasilParasit->input2($id, $tanggal_acu_hasil, $no_sampel, $positif_negatif, $positif_negatif_target3);


    }

    


  }else{

        echo '<script type="text/javascript">';

        echo 'setTimeout(function () { swal("Input Data Gagal!","Hasil Pengujian Tidak Boleh Kosong","error");';

        echo '}, 0);</script>';

  }

  endforeach;

  $objectHasilParasit->edit("UPDATE input_permohonan_kh_lab_parasit SET hasil_pengujian='$hasil_pengujian' WHERE hasil_pengujian ='' AND id = $id");

  if ($insertDb == 'no_sampel_terpakai') {
        
        echo "<script>window.alert('No Sampel Sudah Pernah Dipakai')

          window.location='../../?lab=parasit&page=sertifikat'</script>";

  }else{

    echo "sukses";

  }

  


?>