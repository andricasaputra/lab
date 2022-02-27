<?php

session_start();

require_once(dirname(dirname(dirname(__DIR__)))."/kh/templates/header_hasil.php");

?>

<style type="text/css">
  table td{
    padding-right: 20px;
    padding-bottom: 10px
  }
</style>

<body>
         
<!--Edit data--> 

<?php

    $tgl = $objectTanggal->tgl_indo(date('Y-m-d'));

    if(@$_GET['id']&&$_GET['no_sampel'] !== ''){

        $tampil = $objectDataParasit->tampil4(@$_GET['id']);

    }else {

        if(@$_SESSION['loginadminkh']){

            echo "<script>alert('No Sampel Masih Kosong')

            window.location='../../admin.php?lab=parasit&page=sertifikat'</script>";

            exit;

        }elseif(@$_SESSION['loginsuperkh']){

            echo "<script>alert('No Sampel Masih Kosong')

            window.location='../../super_admin.php?lab=parasit&page=sertifikat'</script>";

            exit;

        }else{

            echo "<script>alert('No Sampel Masih Kosong')

            window.location='../../pengujian.php?lab=parasit&page=sertifikat'</script>";

            exit;

        }

      }


      if(@$_SESSION['loginadminkh']){

        $redirect = '../../admin.php?lab=parasit&page=sertifikat';

      }elseif(@$_SESSION['loginsuperkh']){

         $redirect = '../../super_admin.php?lab=parasit&page=sertifikat';

      }else {

        $redirect = '../../pengujian.php?lab=parasit&page=sertifikat';

      }

      echo "<script>var redirect = '".$redirect."'</script>";

      while ($data=$tampil->fetch_object()):

?>

<div class="container">

   <div class="row">

      <div class="col-lg-12 wrap">

        <div class="wrap2" id="input2">

        <div class="alert alert-info">

            <i>(Laboratorium Parasitologi)</i>

            <br>

            <b>Hasil Pengujian</b><br> 

            Kode Sampel :<b> <?php echo $data->kode_sampel ?></b><br>

            Tanggal : <b><?php echo $data->tanggal_penyerahan ?></b><br> 

            Nama Sampel : <b><?php echo $data->nama_sampel ?></b><br> 

            <?php if (!empty($data->target_pengujian3)) { ?>

               Target Pengujian : <em><?php echo $data->target_pengujian2 ?> & <?php echo $data->target_pengujian3 ?></em>
             
            <?php  }else{ ?>

              Target Pengujian : <em><?php echo $data->target_pengujian2 ?></em>

            <?php } ?>
  
        </div>

        <?php  

            if ($data->jumlah_sampel >= 15) { ?>
              
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

          <?php } ?>

          <form id="hasil_uji_kh_lab_parasit">

            <table id="datatables2">

                  <thead>

                    <tr>

                      <th width="20%">Nomor Sampel</th>

                      <th width="30%"><em><?= $data->target_pengujian2 ?></em> (Positif/Negatif)</th>

                      <?php if (!empty($data->target_pengujian3)) { ?>

                         <th width="30%"><em><?= $data->target_pengujian3 ?></em> (Positif/Negatif)</th>
                       
                      <?php  } ?>

                    </tr>

                  </thead>

                  <tbody>     

                    <?php

                      if (isset($_POST['submit_jumlah'])) {
                        
                          $masukkan = (int)$_POST['jumlah'];

                          /*Hitung Banyak Hasil Yang Sudah Terinput di ID yang sama*/

                          $qu2 = $objectHasilParasit->input_ulang($_GET['id']);

                          $num = $qu2->num_rows; 

                          $tgl_acu = date("Y-m-d");

                          $jum = $data->jumlah_sampel - $num;

                          $j = $_GET['no_sampel'] ;

                          $x = explode("-", $j);

                          $kurangi = $jum - $masukkan;
                         
                          $n = array();

                          if($jum != 1){

                              $awal = $x[0];

                              $akhir = $x[1];

                              if (strpos($_GET['nama_sampel'], "Bibit") !== false) {
                                    
                                    $awal = ltrim($awal, "0"); 

                                    $akhir = ltrim($akhir, "0") - $kurangi;

                                    for ($i = $awal; $i <= $akhir; $i++) { 


                                        $n[] = "0".$i;
                                  
                                    }

                                    $r = $n;

                              }else{

                                    $r = range($awal, $akhir);
                              }


                          }else{

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



                      }else{

                          /*Hitung Banyak Hasil Yang Sudah Terinput di ID yang sama*/

                          $qu2 = $objectHasil->input_ulang($_GET['id']);

                          $num = $qu2->num_rows; 

                          $tgl_acu = date("Y-m-d");

                          $jum = $data->jumlah_sampel - $num;

                          $j = $_GET['no_sampel'] ;

                      
                             if (strpos($j, '-') !== false) {

                              $x = explode("-", $j);

                            } else if (strpos($j, ',') !== false) {

                               $x = explode(",", $j);

                            }

                            $n = array();

                            if($jum != 1){

                                $awal = $x[0];

                                $akhir = end($x);

                                if (strpos($_GET['nama_sampel'], "Bibit") !== false) {
                                      
                                      $awal = ltrim($awal, "0"); 

                                      $akhir = ltrim($akhir, "0");

                                      foreach ($x as $key => $value) {
                                        $n[] = "0".$value;
                                      }

                                      $r = $n;

                                }else{

                                      $r = range($awal, $akhir);
                                }

                            }else{

                                $r = [$j];

                            }
                       

                      }
                      
                    foreach ($r as $no):


                    ?>       

                     <tr>
                          <td>

                              <input type="hidden"  name="id[]" id="id" value="<?=$data->id?>" >

                              <input type="hidden"  name="tanggal_acu_hasil[]" id="tanggal_acu_hasil" value="<?=$tgl_acu?>">

                              <input type="hidden"  name="hasil_pengujian" id="hasil_pengujian" value="terinput"> 


                              <label class="control-label" for="no_sampel"></label>

                              <input type="text" class="form-control" name="no_sampel[]" id="no_sampel" value="<?=$no?>" readonly style="width: 100%; text-align: center; color: black">

                          </td>

                          <td>

                              <label class="control-label" for="positif_negatif"></label>

                              <br/>

                              <select class="form-control" name="positif_negatif[]" id="positif_negatif" style="width: 99%">

                                <option>Negatif</option>

                                <option>Positif</option>

                              </select>
                  
                          </td>

                          <?php if (!empty($data->target_pengujian3)) { ?>

                            <td>

                                <label class="control-label" for="positif_negatif_target3"></label>

                                <br/>

                                <select class="form-control" name="positif_negatif_target3[]" id="positif_negatif_target3" style="width: 99%">

                                  <option>Negatif</option>

                                  <option>Positif</option>

                                </select>

                            </td>
                       
                          <?php  }else{ ?>

                            <input type="hidden" name="positif_negatif_target3[]" value="">

                         <?php } ?>

                        </tr>

                  <?php endforeach; ?>               

                  </tbody>

              </table>

                      <div class="column-full" style="position: absolute; margin-left: 100px; margin-top: -7px;">

                          <button type="submit" class="btn btn-kusuccess btn-lg" name="input" value="input" id="btnSimpan"><i class="fa fa-check-circle fa-fw" aria-hidden="true"></i>&nbsp;Simpan</button> 

                      </div>  

                </form>     

                    <button class="btn btn-info btn-lg" id="btnClose"><i class="fa fa-arrow-circle-left fa-fw" aria-hidden="true"></i>&nbsp;Back</button>     

             </div>              

          </div>

       </div> 

    </div>

<?php  endwhile; ?>

<script>

  $(document).ready(function(e){

    $("#btnSimpan").click(function(){
        $(this).css("pointer-events", "none");
    });
    
    $("#hasil_uji_kh_lab_parasit").one("submit", (function(e){

        e.preventDefault();

         $.ajax({

           url :'../../lab_parasit/models/proses_insert_hasil_pengujian_kh.php',

           type :'POST',

           data : new FormData (this),

           contentType : false,

           cache : false,

           processData : false,

           success : function(data){

              $('#tb_hasil_pengujian_kh_lab_parasit').DataTable().ajax.reload(null, false);

                swal({

                  title: "Sukses",

                  text: "Data Berhasil Di Input",

                  type: "success"

                }).then( function(){

                    window.location.href = redirect

                });                
           }  
         });

         return false;
      }));

      $('#btnClose').click(function () {

          if(!confirm("Apakah Anda Yakin Ingin Menutup Halaman Ini?")){
            e.preventDefault();
            return false;
          }

          window.close();
      
      });

   });/*End Ready*/



</script>

<?php

require_once(dirname(dirname(dirname(__DIR__)))."/kh/templates/footer_hasil.php");
?>

</body>
</html>











  

