<?php
session_start();
require_once '../templates/header_hasil.php';
?>
<body>
<?php
$tgl = tgl_indo(date('Y-m-d'));
if (@$_GET['id'] && $_GET['no_sampel'] !== '') {

    $tampil = $objectData->tampil4(@$_GET['id']);

} else {

    if (@$_SESSION['loginadminkt']) {

        echo "<script>alert('No Sampel Masih Kosong')

                window.location='../admin.php?page=sertifikat'</script>";

        exit;

    } elseif (@$_SESSION['loginsuperkt']) {

        echo "<script>alert('No Sampel Masih Kosong')

                window.location='../super_admin.php?page=sertifikat'</script>";

        exit;

    } else {

        echo "<script>alert('No Sampel Masih Kosong')

                window.location='../pengujian.php?page=sertifikat'</script>";

        exit;

    }

}

while ($data = $tampil->fetch_object()):
?>

<div class="container">

   <div class="row">

      <div class="col-lg-12 wrap">

        <div class="wrap2" id="input2">

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

            <b>Hasil Pengujian</b><br>

            Kode Sampel :<b>                             <?php echo $data->kode_sampel ?></b><br>

            Tanggal : <b><?php echo $data->tanggal_penyerahan ?></b><br>

            Nama Sampel : <b><?php echo $data->nama_sampel ?></b><br>

            <?php

            if ($data->target_optk2 !== '') {?>

                        Target Pengujian : <em><?php echo $data->target_optk . ' & ' . $data->target_optk2 ?></em><br>

                <?php } elseif ($data->target_optk3 !== '') {?>

                        Target Pengujian : <em><?php echo $data->target_optk . ',&nbsp;' . $data->target_optk2 . ',&nbsp;' . $data->target_optk3 ?></em><br>

                <?php } else {?>

                        Target Pengujian : <em><?php echo $data->target_optk ?></em><br>

                <?php }?>

        </div>

          <?php

          if ($data->jumlah_sampel >= 15) {?>

              <form action="" method="post" id="kurangi">
                <div class="row">
                  <div class="col-md-2"><b>Cicil hasil pengujian</b></div>
                  <div class="col-md-4" style="margin-left: -50px">
                    <input type="number" class="form-control form-sm" name="jumlah" id="inputers" placeholder="masukkan berapa hasil yang ingin anda input">
                  </div>
                  <div class="col-md-2" style="margin-top: -5px">
                    <button type="submit" class="btn btn-kusuccess" name="submit_jumlah" id="submit_jumlah">Submit</button>
                  </div>
                  <div class="col-md-4"></div>
                </div>
              </form>

          <?php }?>




          <form id="form_input_hasil">
            <table id="datatables2">
                  <thead>
                    <tr>
                      <th width="20%">Nomor Sampel</th>
                      <th width="30%">Positif/Negatif</th>
                       <th width="30%">Hasil Pengujian</th>
                    </tr>
                  </thead>
                  <tbody>

                  <?php

                  if (isset($_POST['submit_jumlah'])) {

                      $masukkan = (int) $_POST['jumlah'];

                      /*Hitung Banyak Hasil Yang Sudah Terinput di ID yang sama*/

                      $qu2 = $objectHasil->input_ulang($_GET['id']);

                      $num = $qu2->num_rows;

                      $tgl_acu = date("Y-m-d");

                      $jum = $data->jumlah_sampel - $num;

                      $j = $_GET['no_sampel'];

                      $x = explode("-", $j);

                      $kurangi = $jum - $masukkan;

                      if ($jum != 1) {

                          $k = $x[0];

                          $l = $x[1] - $kurangi;

                          $r = range($k, $l);

                      } else {

                          $r = $x;

                      }

                      echo "

                            <script>

                                $(document).ready(function (){


                                        $('#submit_jumlah').prop('disabled', true);

                                        $('#inputers').prop('disabled', true);
                                });

                            </script>


                      ";

                  } else {

                      /*Hitung Banyak Hasil Yang Sudah Terinput di ID yang sama*/

                      $qu2 = $objectHasil->input_ulang($_GET['id']);

                      $num = $qu2->num_rows;

                      $tgl_acu = date("Y-m-d");

                      $jum = $data->jumlah_sampel - $num;

                      $j = $_GET['no_sampel'];

                      $x = explode("-", $j);

                      if ($jum != 1) {

                          $k = $x[0];

                          $l = end($x);

                          $r = range($k, $l);

                      } else {

                          $r = $x;

                      }

                  }

                  foreach ($r as $no): ?>
                    <tr>
                          <td>
                              <div class="column-full">

                                <input type="text" class="form-control" name="no_sampel[]" id="no_sampel" value="<?=$no?>" readonly style="width: 100%">

                                <input type="hidden"  name="id[]" id="id" value="<?=$data->id?>" >

                                <input type="hidden"  name="tanggal_acu_hasil[]" id="tanggal_acu_hasil" value="<?=$tgl_acu?>">

                                <input type="hidden"  name="bagian_tumbuhan[]" id="bagian_tumbuhan" value="<?=$data->bagian_tumbuhan?>">
                                <input type="hidden"  name="vektor[]" id="vektor" value="<?=$data->vektor?>">

                                <input type="hidden"  name="media[]" id="media" value="<?=$data->media?>">

                                <input type="hidden"  name="target_optk[]" id="target_optk" value="<?=$data->target_optk?>">

                                <input type="hidden"  name="target_optk2[]" id="target_optk2" value="<?=$data->target_optk2?>">

                                <input type="hidden"  name="target_optk3[]" id="target_optk3" value="<?=$data->target_optk3?>">

                                <input type="hidden"  name="metode_pengujian[]" id="metode_pengujian" value="<?=$data->metode_pengujian?>">

                                <input type="hidden"  name="metode_pengujian2[]" id="metode_pengujian2" value="<?=$data->metode_pengujian2?>">

                                <input type="hidden"  name="metode_pengujian3[]" id="metode_pengujian3" value="<?=$data->metode_pengujian3?>">

                                <input type="hidden"  name="no_sertifikat[]" id="no_sertifikat" value="<?=$data->no_sertifikat?>">

                              </div>

                          </td>

                          <td width="30%">

                            <div class="column-full">

                              <select class="form-control" name="positif_negatif[]" id="positif_negatif" style="width: 50%">

                                <option>Negatif</option>

                                <option>Positif</option>

                              </select>

                            </div>

                          </td>

                          <td width="50%">

                            <div class="column-full">

                              <label class="control-label" for="hasil_pengujian"></label>

                              <em><input type="text" class="form-control" name="hasil_pengujian[]" id="hasil_pengujian" value="" style="width: 90%" required></em>

                            </div>

                          </td>

                          </tr>

                  <?php endforeach;?>

                  <input type="hidden"  name="hasil_pengujian2" id="hasil_pengujian2" value="terinput">

                </table>
                      <div class="column-full" style="position: absolute; margin-left: 100px; margin-top: -7px;">
                          <button type="submit" class="btn btn-kusuccess btn-lg" name="input" value="input"><i class="fa fa-check-circle fa-fw" aria-hidden="true"></i>&nbsp;Simpan</button>
                      </div>
                      <a href="<?php echo $redirect; ?>" class="btn btn-info btn-lg" onclick="return confirm('Yakin Ingin Kembali?')">
                      <i class="fa fa-arrow-circle-left fa-fw" aria-hidden="true"></i>&nbsp;Back</a>

                </form>
             </div>
          </div>
       </div>
    </div>

<?php endwhile;

require_once '../templates/footer_hasil.php';

?>

<script type="text/javascript">
  $(document).ready(function(){

    $("#form_input_hasil").one("submit", (function(e){

       e.preventDefault();

       $.ajax({

         url :'../models/proses_input_hasil_ujilab.php',

         type :'POST',

         data : new FormData (this),

         contentType : false,

         cache : false,

         processData : false,

         success : function(response){

            if (response == 'false') {

                swal({

                    title: "Error",

                    text: "Gagal Input Data, Nomor Sampel Sudah Terpakai",

                    type: "error"

                });


            }else{


                $('#tb_hasil_pengujian').DataTable().ajax.reload(null, false),

                  swal({

                    title: "Sukses",

                    text: "Data Berhasil Di Input",

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













