<?php

session_start();
require_once(dirname(dirname(dirname(__DIR__)))."/kh/templates/header_hasil.php");
?>

<body>
    
<!--Edit data--> 

<?php

    $tgl = $objectTanggal->tgl_indo(date('Y-m-d'));

    if(@$_GET['id']&&$_GET['no_sampel'] !== ''){

        $tampil = $objectData->tampil4(@$_GET['id']);

    }else {

        if(@$_SESSION['loginadminkh']){

            echo "<script>alert('No Sampel Masih Kosong')

            window.location='../../admin.php?lab=bakteri&page=sertifikat'</script>";

            exit;

          }elseif(@$_SESSION['loginsuperkh']){

            echo "<script>alert('No Sampel Masih Kosong')

            window.location='../../super_admin.php?lab=bakteri&page=sertifikat'</script>";

            exit;

          }else{

            echo "<script>alert('No Sampel Masih Kosong')

            window.location='../../pengujian.php?lab=bakteri&page=sertifikat'</script>";

            exit;

          }

      }

      if(@$_SESSION['loginadminkh']){

        $redirect = '../../admin.php?lab=bakteri&page=sertifikat';

      }elseif(@$_SESSION['loginsuperkh']){

         $redirect = '../../super_admin.php?lab=bakteri&page=sertifikat';

      }else {

        $redirect = '../../pengujian.php?lab=bakteri&page=sertifikat';

      }

      echo "<script>var redirect = '".$redirect."'</script>";

      while ($data=$tampil->fetch_object()):

?>

<div class="container">

   <div class="row">

      <div class="col-lg-12 wrap">

        <div class="wrap2" id="input2">

          <div class="alert alert-info">

            <i>(Laboratorium Bakteriologi)</i>

            <br>

            <b>Hasil Pengujian</b><br> 

            Kode Sampel :<b> <?php echo $data->kode_sampel ?></b><br>

            Tanggal : <b><?php echo $data->tanggal_penyerahan ?></b><br> 

            Nama Sampel : <b><?php echo $data->nama_sampel ?></b><br> 

            Target Pengujian : <em><?php echo $data->target_pengujian2 ?></em>
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

          <form id="hasil_uji_kh">

            <table id="datatables2">

                  <thead>

                    <tr>

                      <th width="20%">Nomor Sampel</th>

                      <th width="30%">Positif/Negatif</th>

                    </tr>

                  </thead>

                  <tbody>     

                    <?php

                      if (isset($_POST['submit_jumlah'])) {
                        
                          $masukkan = (int)$_POST['jumlah'];

                          /*Hitung Banyak Hasil Yang Sudah Terinput di ID yang sama*/

                          $qu2 = $objectHasil->input_ulang($_GET['id']);

                          $num = $qu2->num_rows; 

                          $tgl_acu = date("Y-m-d");

                          $jum = $data->jumlah_sampel - $num;

                          $j = $_GET['no_sampel'] ;

                          $x = explode("-", $j);

                          $kurangi = $jum - $masukkan;
                         

                          if($jum != 1){

                              $k = $x[0];

                              $l = $x[1] - $kurangi ;

                              $r = range($k, $l);

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

                          $x = explode("-", $j);

                          $n = array();

                          if($jum != 1){

                              $awal = $x[0];

                              $akhir = $x[1];


                              if (strpos($awal, "0") !== false && strpos($akhir, "0") !== false) {
                                    
                                    $awal = ltrim($awal, "0"); 

                                    $akhir = ltrim($akhir, "0");

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

                      }



                    foreach ($r as $no):

                    ?>       

                     <tr>

                            <td width="20%">

                              <div class="column-full">

                              <input type="hidden"  name="id[]" id="id" value="<?=$data->id?>" >

                              <input type="hidden"  name="tanggal_acu_hasil[]" id="tanggal_acu_hasil" value="<?=$tgl_acu?>">

                              <input type="hidden"  name="hasil_pengujian" id="hasil_pengujian" value="terinput"> 


                              <label class="control-label" for="no_sampel"></label>

                              <input type="text" class="form-control" name="no_sampel[]" id="no_sampel" value="<?=$no?>" readonly style="width: 100%; text-align: center; color: black">

                              </div>

                          </td>

                          <td width="80%">

                            <div class="column-full">

                              <label class="control-label" for="positif_negatif"></label>

                              <br/>

                              <select class="form-control" name="positif_negatif[]" id="positif_negatif" style="width: 99%">

                                <option>Negatif</option>

                                <option>Positif</option>

                              </select>

                            </div>

                          </td>

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
    
    $("#hasil_uji_kh").one("submit", (function(e){

        e.preventDefault();

         $.ajax({

           url :'../../lab_bakteri/models/proses_insert_hasil_pengujian_kh.php',

           type :'POST',

           data : new FormData (this),

           contentType : false,

           cache : false,

           processData : false,

           success : function(data){

              $('#tb_hasil_pengujian_kh').DataTable().ajax.reload(null, false),

                swal({

                  title: "Sukses",

                  text: "Data Berhasil Di Input",

                  type: "success"

                }).then( function(){

                    window.location.href = redirect

                });
                console.log(data);  
           }  
         });
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











  

