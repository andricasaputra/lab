<?php

session_start();

require_once(dirname(dirname(dirname(__DIR__)))."/kh/templates/header_hasil.php");

?>

<body>
         
<!--Edit data--> 

<?php

  $tgl = $objectTanggal->tgl_indo(date('Y-m-d'));

  $tgl_acu = date("Y-m-d");


  if(@$_GET['id'] && $_GET['no_sampel'] !== '' && $_GET['nama_sampel'] !== ''){

    if (strpos($_GET['nama_sampel'], "Bibit") === false) {

      $tampil = $objectHasil->tampil(@$_GET['id']);

    }else{

      $tampil = $objectHasil->tampilBibit(@$_GET['id']);

    }

  }else {

      if(@$_SESSION['loginadminkh']){

        echo "<script>alert('Maaf No Sampel Masih Kosong')

        window.location='../../admin.php?lab=bakteri&page=sertifikat'</script>";

        exit;

      }elseif(@$_SESSION['loginsuperkh']){

        echo "<script>alert('Maaf No Sampel Masih Kosong')

        window.location='../../super_admin.php?lab=bakteri&page=sertifikat'</script>";

        exit;

      }else{

        echo "<script>alert('Maaf No Sampel Masih Kosong')

        window.location='../../pengujian.php?lab=bakteri&page=sertifikat'</script>";

        exit;

      }

  }   

?>

<div class="container">

   <div class="row">

      <div class="col-lg-12">

         <div class="wrap">

              <?php 

                if(@$_SESSION['loginadminkh']){

                  $redirect = '../../admin.php?lab=bakteri&page=sertifikat';

                }elseif(@$_SESSION['loginsuperkh']){

                   $redirect = '../../super_admin.php?lab=bakteri&page=sertifikat';

                }else {

                  $redirect = '../../pengujian.php?lab=bakteri&page=sertifikat';

                }



              ?>

           <div class="alert alert-info">

             <?php  

                $tampil2 = $objectData->tampil(@$_GET['id']); 

                $i = $tampil2->fetch_assoc();

                $nama = $i['nama_sampel'];

                $target = $i['target_pengujian2'];

                $noser =$i['tanggal_sertifikat'];

             ?>

              <i>(Laboratorium Bakteriologi)</i>

              <br>

              <b>Edit Hasil Pengujian</b><br>

              Nama Sampel : <?php echo $nama; ?><br>

              Target Pengujian : <em><?php echo $target ?></em><br> 

              Hasil Diinput Pada Tanggal : <?php echo $noser; ?>

            </div>

                   <form action="" method="post">

                    <table id="datatables5">

                      <thead>

                        <tr>

                          <th width="20%">Nomor Sampel</th>

                          <th width="80%">Positif/Negatif</th>

                        </tr>

                      </thead>

                      <tbody> 

                         <?php while ($data = $tampil->fetch_object()): ?>

                        <tr>

                          <td width="20%">

                              <div class="column-full">

                                <input type="hidden"  name="id[]" id="id" value="<?=$data->id?>" >

                                <?php  

                                  if (strpos($_GET['nama_sampel'], 'Bibit') === false) { ?>

                                    <input type="text" class="form-control" name="no_sampel[]" id="no_sampel" value="<?= $data->no_sampel ?>" readonly style="width: 100%; text-align: center; color: black;">

                                 <?php }else{ ?>

                                    <input type="text" class="form-control" name="no_sampel[]" id="no_sampel" value="<?= $data->no_sampel_bibit ?>" readonly style="width: 100%; text-align: center; color: black;">
                                    
                                <?php  }?>


                              </div>

                          </td>

                          <td width="100%">

                            <div class="column-full">

                              <select class="form-control" name="positif_negatif[]" id="positif_negatif" style="width: 100%">

                                <option><?php echo $data->positif_negatif ?></option>

                                <?php  if($data->positif_negatif == 'Negatif'){ ?>

                                  <option>Positif</option>

                                 <?php  }else{ ?>

                                  <option>Negatif</option>

                               <?php } ?>

                              </select>

                            </div>

                          </td>


                        </tr>

                         <?php endwhile; ?>

                      </tbody>

                    </table>
              
                      <div class="column-full" style="position: absolute; margin-left: 100px; margin-top: -7px;">

                          <button type="submit" class="btn btn-kusuccess btn-lg" name="edit" value="edit"><i class="fa fa-check-circle fa-fw" aria-hidden="true"></i>&nbsp;Simpan</button> 

                      </div>  
            
                      <button class="btn btn-info btn-lg" id="btnClose"><i class="fa fa-arrow-circle-left fa-fw" aria-hidden="true"></i>&nbsp;Back</button>

                </form>  

             </div>           

          </div>

       </div> 

    </div>

    <script type="text/javascript">
      $('#btnClose').click(function (e) {

          if(!confirm("Apakah Anda Yakin Ingin Menutup Halaman Ini?")){
            e.preventDefault();
            return false;
          }

          window.close();
          
      });
    </script>



<?php


if(@$_POST['edit']) {


  foreach ($_POST['positif_negatif'] as $i => $value) {


    $id               = $_POST['id'][$i];

    $no_sampel        = $_POST['no_sampel'][$i];

    $positif_negatif  = htmlspecialchars($conn->real_escape_string($_POST['positif_negatif'][$i]));



  if($no_sampel !== ""){

    $cek = substr($no_sampel, 0, 1);

    if ($cek !== "0" && strpos($_GET['nama_sampel'], "Bibit") === false) {

      $query = $objectHasil->edit( "UPDATE hasil_kh SET id='$id', positif_negatif='$positif_negatif' WHERE no_sampel='$no_sampel'");

    }else{

      $query = $objectHasil->edit( "UPDATE hasil_kh_bibit SET id='$id', positif_negatif='$positif_negatif' WHERE no_sampel_bibit ='$no_sampel'");

    }


      echo '<script type="text/javascript">';

      echo 'alert("Data Berhasil Di Edit");';

      echo 'window.close()</script>';  


  }else {

      echo '<script type="text/javascript">';

      echo 'setTimeout(function () { swal("Input Data Gagal!","Hasil Pengujian Tidak Boleh Kosong","error");';

      echo '}, 0);</script>';


  }

 }

}

?>  


</body>

</html>











  

