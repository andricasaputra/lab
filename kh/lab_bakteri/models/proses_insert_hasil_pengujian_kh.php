<?php  

require_once('header_proses.php'); 

  foreach ($_POST['no_sampel'] as $i => $value) :



    $id                 = $_POST['id'][$i];

    $tanggal_acu_hasil  = $_POST['tanggal_acu_hasil'][$i];

    $no_sampel          = htmlspecialchars($conn->real_escape_string($_POST['no_sampel'][$i]));

    $positif_negatif    = htmlspecialchars($conn->real_escape_string($_POST['positif_negatif'][$i]));

    $hasil_pengujian  =htmlspecialchars($conn->real_escape_string($_POST['hasil_pengujian']));



  if($no_sampel!==""){

    $insertDb = $objectHasil->input($id, $tanggal_acu_hasil, $no_sampel, $positif_negatif);


    }else{

        echo '<script type="text/javascript">';

        echo 'setTimeout(function () { swal("Input Data Gagal!","Hasil Pengujian Tidak Boleh Kosong","error");';

        echo '}, 0);</script>';

    }

  endforeach;

  $objectHasil->edit("UPDATE input_permohonan_kh SET hasil_pengujian='$hasil_pengujian' WHERE hasil_pengujian ='' AND id <= $id");

  if ($insertDb == 'no_sampel_terpakai') {
        
        echo "<script>window.alert('No Sampel Sudah Pernah Dipakai')

          window.location='../../?lab=bakteri&page=sertifikat'</script>";

  }else{

    echo "sukses";

  }

  


?>