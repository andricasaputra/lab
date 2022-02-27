<?php

include_once('../header_input.php');

$lastData = $objectDataParasit->infoPengelolaSampel("1");

if ($lastData == 0 ):

  echo 
  '<script>swal({

    title: "Perhatian!",

    text: "Tidak Ada Data Untuk Diinput!",

    type: "error"

  }).then(function (){

    location.reload();
    
  });</script>';

  return false;

endif;

$dataKosong = $objectDataParasit->infoPengelolaSampel("select");/*Return null data in database*/

$getLastInput = $objectDataParasit->infoPengelolaSampel();

$arrId = array();

$arrNoSampel = array();

$arrNamaSampel = array();

while ($lastinput = $dataKosong->fetch_object()) :

$anls = $lastinput->nama_analis;

$arrId[] = $lastinput->id;

$arrNamaSampel[] = $lastinput->nama_sampel;

$arrNoSampel[] = $lastinput->no_sampel; 

endwhile;


    $d=date("m/Y");

    $tgl_indo = $objectTanggal->tgl_indo(date('Y-m-d'));

    $bln=date('m');

    $thn=date('Y');


      if ($anls == 'drh. Priono') {

          $nip = '19810224 201101 1 008';

      }elseif ($anls == 'drh. I Gede Wira Adipredana') {

          $nip = '19851108 201403 1 002';

      }elseif ($anls == 'Siska Murtini, A.Md') {

          $nip = '19830608 201101 2 010';

      }elseif ($anls == 'Sari Rosmawati') {

          $nip = '19810411 200501 2 001';

      }elseif ($anls == 'Darsiah') {

          $nip = '19830910 200501 2 001';

      }elseif ($anls == 'Musallamatun') {

          $nip = '19781124 200501 2 001';

      }


    


?>

        <div class="modal-content">

           <div class="modal-header">

              <button type="button" class="close" data-dismiss="modal">&times;</button>

              <h4 class="modal-title"><i class="fa fa-gear fa-fw"></i>Input Multiple Data Distribusi Sampel</h4>

            </div>

            <form id="form_input_multi_pengelola_sampel_kh">

              <div class="modal-body" id="modal-edit">

                <div id="responsive-form" class="clearfix">

                        <div class="column-half">

                          <label class="control-label" for="nama_sampel">Identitas Sampel</label>

                          <?php foreach ($arrId as $id) : ?>

                          <input type="hidden" name="id[]" id="id" value="<?=$id;?>">

                          <?php endforeach; ?>

                          <?php foreach ($arrNamaSampel as $nama_sampel) : ?>

                          <select name="nama_sampel_lab" id="nama_sampel_lab_input" class="form-control" style="margin-bottom: 10px" disabled>

                                <option value="<?= $nama_sampel; ?>"><?= $nama_sampel; ?></option>
                                <option>Urine</option>

                                <option>Feses</option>

                                <option>Kadaver</option>

                                <option>Swab</option>

                                <option>Organ</option>

                                <option>Eksudat</option>

                                <option>Kerokan Kulit</option>

                                <option>Kulit</option>

                                <option>Bagian Lain</option>

                            
                          </select>

                          <?php  endforeach;  ?>

                        </div>


                        <div class="column-half">

                          <label class="control-label" for="no_sampel">Nomor Sampel</label>

                            <?php  

                              foreach ($arrNoSampel as $no_sampel) :

                            ?>

                            <input type="text" class="form-control" name="no_sampel[]" id="no_sampel_input" value="<?=$no_sampel;?>" required style="margin-bottom: 10px"> 


                            <?php

                              endforeach;

                            ?>


                        </div>    



                        <div class="column-half">

                          <label class="control-label" for="yang_menyerahkanlab">Yang Menyerahkan</label>

                          <select class="form-control" name="yang_menyerahkanlab" id="yang_menyerahkanlab_input" required> 

                            <option></option>

                              <?php 

                                $i = $objectDataParasit->tampil_jabfung();

                                while ($t=$i->fetch_object()) : 

                                  if ($t->nama_pejabat == "Sari Rosmawati") : ?>

                                    <option value="<?=$t->nama_pejabat ;?>" selected><?=$t->nama_pejabat ;?></option>

                                <?php else: ?>

                                    <option><?=$t->nama_pejabat ;?></option>

                              <?php endif; endwhile;?>

                          </select>

                        </div>    



                        <div class="column-half">

                          <label class="control-label" for="yang_menerimalab">Yang Menerima</label>

                           <select class="form-control" name="yang_menerimalab" id="yang_menerimalab_input" required> 

                            <option>Siska Murtini, A.Md</option>

                              <?php 

                                $i = $objectDataParasit->tampil_jabfung();

                                while ($t=$i->fetch_object()) : ?>

                                <option><?=$t->nama_pejabat ;?></option>

                              <?php endwhile;?>

                          </select>

                        </div>



                        <div class="column-half">

                            <label class="control-label" for="nip_yang_menyerahkanlab">NIP Yang Menyerahkan</label>

                              <select class="form-control" name="nip_yang_menyerahkanlab" id="nip_yang_menyerahkanlab_input" required>

                                <?php 

                                $i = $objectDataParasit->tampil_jabfung();

                                while ($t=$i->fetch_object()) : 

                                  if ($t->nama_pejabat == "Sari Rosmawati") : ?>

                                    <option value="<?=$t->nip ;?>" selected><?=$t->nip ;?></option>

                              <?php endif; endwhile;?>

                              </select>

                          </div>



                          <div class="column-half">

                            <label class="control-label" for="nip_yang_menerimalab">NIP Yang Menerima</label>

                              <select class="form-control" name="nip_yang_menerimalab" id="nip_yang_menerimalab_input" required>


                                    <option>19830608 201101 2 010</option>

                              </select>

                          </div>

                          <div class="column-half">

                            <label>Scan Tanda Tangan Yang Menyerahkan</label>

                            <br>

                                  <label class="checkbox-inline">
                                    <input type="checkbox" name="ttd_yang_menyerahkan_pengelola_sampel" value="Ya">Ya
                                  </label>

                                  <label class="checkbox-inline">
                                    <input type="checkbox" name="ttd_yang_menyerahkan_pengelola_sampel" checked value="Tidak">Tidak
                                  </label>


                          </div>


                          <div class="column-half">

                            <label>Scan Tanda Tangan Yang Menerima</label>

                            <br>

                                  <label class="checkbox-inline">
                                    <input type="checkbox" name="ttd_yang_menerima_pengelola_sampel" value="Ya">Ya
                                  </label>

                                  <label class="checkbox-inline">
                                    <input type="checkbox" name="ttd_yang_menerima_pengelola_sampel" checked value="Tidak">Tidak
                                  </label>

                              
                          </div>

                     </div>

                    </div>

                          <div class="modal-footer" >

                            <div class="column-full button-bawah">

                              <button type="submit" class="btn-default2 btn-success" name="edit" value="edit"><i class="fa fa-check-circle fa-fw" aria-hidden="true"></i>&nbsp;Simpan Multiple</button> 

                            </div>      

                          </div>

                     </form>              

      </div> 

   </div>

</div>



<script>

  $(document).ready(function(e){
    
    $("#form_input_multi_pengelola_sampel_kh").on("submit", (function(e){

         e.preventDefault();

         $.ajax({

           url :'lab_parasit/models/input_multi/proses_input_multi_pengelola_sampel_kh.php',

           type :'POST',

           data : new FormData (this),

           contentType : false,

           cache : false,

           processData : false,

           success : function(response){

              if (response != 'nodata') {

                $('#tb_pengelola_sampel_kh_lab_parasit').DataTable().ajax.reload(null, false),

                swal({

                  title: "Sukses",

                  text: "Data Berhasil Di Input",

                  type: "success"

                }).then(function(){

                    $('#modal_input_multi_pengelola_sampel_kh').modal('hide')

                });

              }else{

                $('#tb_pengelola_sampel_kh_lab_parasit').DataTable().ajax.reload(null, false),

                swal({

                  title: "Perhatian",

                  text: "Tidak Ada Data Untuk Diinput!",

                  type: "error"

                }).then(function(){

                    $('#modal_input_multi_pengelola_sampel_kh').modal('hide')

                });

              }/*Endif*/
           }  
         })

      }));

      $( "#yang_menyerahkanlab_input" ).on('change', function () {
        let pejabatID = $(this).val();

            $.get({
                url: "lab_parasit/views/data_kh/SourceDataPemohon_kh.php",
                dataType: 'Json',
                data: {'id':pejabatID},
                success: function(data) {
                    $('#nip_yang_menyerahkanlab_input').empty();
                    $.each(data, function(key, value) {
                        $('#nip_yang_menyerahkanlab_input').append('<option>'+ value +'</option>');
                  });
                }
            });

      });

      $( "#yang_menerimalab_input" ).on('change', function () {
        let pejabatID = $(this).val();

            $.get({
                url: "lab_parasit/views/data_kh/SourceDataPemohon_kh.php",
                dataType: 'Json',
                data: {'id':pejabatID},
                success: function(data) {
                    $('#nip_yang_menerimalab_input').empty();
                    $.each(data, function(key, value) {
                        $('#nip_yang_menerimalab_input').append('<option>'+ value +'</option>');
                  });
                }
            });

      });

   });

</script>







