<?php
session_start();
require_once '../templates/header_hasil.php';
?>
<body>
<?php
$tgl     = tgl_indo(date('Y-m-d'));
$tgl_acu = date("Y-m-d");
if (@$_GET['id'] && $_GET['no_sampel'] !== '') {
    $tampil = $objectHasil->tampil(@$_GET['id'], @$_GET['no_sampel']);
} else {
    if (@$_SESSION['loginadminkt']) {

        echo "<script>alert('Maaf No Sampel Masih Kosong')

            window.location='../admin.php?page=sertifikat'</script>";

        exit;

    } elseif (@$_SESSION['loginsuperkt']) {

        echo "<script>alert('Maaf No Sampel Masih Kosong')

            window.location='../super_admin.php?page=sertifikat'</script>";

        exit;

    } else {

        echo "<script>alert('Maaf No Sampel Masih Kosong')

            window.location='../pengujian.php?page=sertifikat'</script>";

        exit;
    }
}
?>

<div class="container">

   <div class="row">

      <div class="col-lg-12">

         <div class="wrap">
              <?php

              if (@$_SESSION['loginadminkt']) {

                  $redirect = '../admin.php?page=sertifikat';

              } elseif (@$_SESSION['loginsuperkt']) {

                  $redirect = '../super_admin.php?page=sertifikat';

              } else {

                  $redirect = '../pengujian.php?page=sertifikat';

              }

              echo '<script>

                var redirect = "' . $redirect . '"

                </script>';
              ?>
           <div class="alert alert-info">

             <?php

             $tampil2 = $objectData->tampil(@$_GET['id']);

             $i = $tampil2->fetch_assoc();

             $nama = $i['nama_sampel'];

             $target = $i['target_optk'];

             $target2 = $i['target_optk2'];

             $target3 = $i['target_optk3'];

             $noser = $i['tanggal_sertifikat'];

             ?>

              <b>Edit Hasil Pengujian</b><br>

              Nama Sampel :                            <?php echo $nama; ?><br>

              <?php

              if ($target2 !== '') {?>

                        Target Pengujian : <em><?php echo $target . ' & ' . $target2 ?></em><br>

                <?php } elseif ($target3 !== '') {?>

                        Target Pengujian : <em><?php echo $target . ',&nbsp;' . $target2 . ',&nbsp;' . $target3 ?></em><br>

                <?php } else {?>

                        Target Pengujian : <em><?php echo $target ?></em><br>

              <?php }?>

              Hasil Diinput Pada Tanggal :                                           <?php echo $noser; ?>

            </div>

                   <form id="form_edit_hasil">

                    <table id="datatables2">

                      <thead>

                        <tr>

                          <th width="5%">&nbsp;</th>

                          <th width="30%">Nomor Sampel</th>

                          <th width="30%">Positif/Negatif</th>

                          <th width="35%">Hasil Pengujian</th>

                        </tr>

                      </thead>

                      <tbody>

                         <?php while ($data = $tampil->fetch_object()): ?>
                        <tr>

                          <td>

                          <input type="hidden"  name="id[]" id="id" value="<?=$data->id?>" >

                          </td>

                          <td>

                              <div class="column-full">

                                <input type="text" class="form-control" name="no_sampel[]" id="no_sampel" value="<?=$data->no_sampel?>" readonly style="width: 100%">

                              </div>

                          </td>

                          <td width="30%">

                            <div class="column-full">

                              <select class="form-control" name="positif_negatif[]" id="positif_negatif" style="width: 50%">


                                <option><?php echo $data->positif_negatif ?></option>

                                <?php if ($data->positif_negatif == 'Negatif') {?>

                                  <option>Positif</option>

                                 <?php } else {?>

                                  <option>Negatif</option>

                                  <?php }?>

                              </select>

                            </div>

                          </td>

                          <td width="50%">

                            <div class="column-full">

                              <em><input type="text" class="form-control" name="hasil_pengujian[]" id="hasil_pengujian" value="<?=$data->hasil_pengujian?>" style="width: 90%"></em>

                            </div>

                          </td>

                        </tr>

                         <?php endwhile;?>

                      </tbody>

                    </table>

                      <div class="column-full" style="position: absolute; margin-left: 100px; margin-top: -7px;">

                          <button type="submit" class="btn btn-kusuccess btn-lg" name="edit" value="edit"><i class="fa fa-check-circle fa-fw" aria-hidden="true"></i>&nbsp;Simpan</button>

                      </div>


                      <a href="<?php echo $redirect; ?>" class="btn btn-info btn-lg" onclick="return confirm('Yakin Ingin Kembali?')">
                      <i class="fa fa-arrow-circle-left fa-fw" aria-hidden="true"></i>&nbsp;Back</a>

                </form>

             </div>

          </div>

       </div>

    </div>

<?php

require_once '../templates/footer_hasil.php';

?>

<script type="text/javascript">
  $(document).ready(function(){

    $("#form_edit_hasil").on("submit", (function(e){

       e.preventDefault();

       $.ajax({

         url :'../models/proses_editdata_hasil_ujilab.php',

         type :'POST',

         data : new FormData (this),

         contentType : false,

         cache : false,

         processData : false,

         success : function(response){

            if (response == 'false') {

                swal({

                    title: "Error",

                    text: "Gagal Edit Data, Hubungi Admin",

                    type: "error"

                });


            }else{


                $('#tb_hasil_pengujian').DataTable().ajax.reload(null, false),

                  swal({

                    title: "Sukses",

                    text: "Data Berhasil Diubah",

                    type: "success"

                }).then(function(){

                    window.location.href = redirect

                });

            }
         }
       })
     }));

  });
</script>
</body>
</html>