<?php

include_once('../header_input.php');

$d=date("m/Y");

$tgl_indo = $objectTanggal->tgl_indo(date('Y-m-d'));

$bln=date('m');

$thn=date('Y');

$lastData = $objectData->infoPengelolaSampel("1");

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

$dataKosong = $objectData->infoPengelolaSampel("select");/*Return null data in database*/

$getLastInput = $objectData->infoPengelolaSampel();

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


      if ($anls == 'I Ketut Sindia, SP') {

          $nip = '19740929 200112 1 002';

      }elseif ($anls == 'Fatma Dya Swari, SP') {

          $nip = '19801209 200912 2 004';

      }else{

          $nip = '19890705 201503 2 004';

      }

?>


            <div class="modal-content">

               <div class="modal-header">

                  <button type="button" class="close" data-dismiss="modal">&times;</button>

                  <h4 class="modal-title"><i class="fa fa-gear fa-fw"></i>Input Multiple Data Distribusi Sampel</h4>

                </div>



            <form id="form_input_multi_pengelola_sampel">

              <div class="modal-body" id="modal-edit">

                <div id="responsive-form" class="clearfix">


                        <div class="column-full">

                          <label class="control-label" for="no_sampel">Nomor Sampel</label>

                            <?php foreach ($arrId as $id) : ?>

                            <input type="hidden" name="id[]" id="id" value="<?=$id;?>">

                            <?php endforeach; ?>

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

                              <?php 

                                $i = $objectData->tampil_pejabat();

                                while ($t=$i->fetch_object()) : 

                                  if ($t->nama_pejabat == 'Andrica Ismi Eka Saputra') {

                                    echo '<option value="'.$t->nama_pejabat.'" selected>'.$t->nama_pejabat.'</option>';

                                  }else{

                                    echo '<option value="'.$t->nama_pejabat.'">'.$t->nama_pejabat.'</option>';
                                  }

                                endwhile;

                                ?>
                          </select>

                        </div>    



                        <div class="column-half">

                          <label class="control-label" for="yang_menerimalab">Yang Menerima</label>

                           <select class="form-control" name="yang_menerimalab" id="yang_menerimalab_input" required> 

                            <option>Fatma Dya Swari, SP</option>

                              <?php 

                                $i = $objectData->tampil_pejabat();

                                while ($t=$i->fetch_object()) : 

                                  if ($t->nama_pejabat == $anls) {

                                    echo '<option value="'.$t->nama_pejabat.'" selected>'.$t->nama_pejabat.'</option>';

                                  }else{

                                    echo '<option value="'.$t->nama_pejabat.'">'.$t->nama_pejabat.'</option>';
                                  }

                                endwhile;

                                ?>

                          </select>

                        </div>



                        <div class="column-half">

                            <label class="control-label" for="nip_yang_menyerahkanlab">NIP Yang Menyerahkan</label>

                              <select class="form-control" name="nip_yang_menyerahkanlab" id="nip_yang_menyerahkanlab_input" required>

                                    <?php 

                                    $i = $objectData->tampil_pejabat();

                                    while ($t = $i->fetch_object()) : 

                                      if ($t->nama_pejabat == 'Andrica Ismi Eka Saputra') {

                                        echo '<option value="'.$t->nip_pejabat.'" selected>'.$t->nip_pejabat.'</option>';

                                      }

                                    endwhile;

                                    ?>

                              </select>

                          </div>


                          <div class="column-half">

                            <label class="control-label" for="nip_yang_menerimalab">NIP Yang Menerima</label>

                              <select class="form-control" name="nip_yang_menerimalab" id="nip_yang_menerimalab_input" required>

                                    <?php 

                                    $i = $objectData->tampil_pejabat();

                                    while ($t=$i->fetch_object()) : 

                                      if ($t->nama_pejabat == $anls) {

                                        echo '<option value="'.$t->nip_pejabat.'" selected>'.$t->nip_pejabat.'</option>';

                                      }

                                    endwhile;

                                    ?>

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

                              <button type="submit" class="btn-default2 btn-success" name="edit" value="edit"><i class="fa fa-check-circle fa-fw" aria-hidden="true"></i>&nbsp;Simpan</button> 

                            </div>      

                          </div>

                     </form>              

      </div> 

   </div>

</div>

<script>

  $(document).ready(function(e){
    
    $("#form_input_multi_pengelola_sampel").on("submit", (function(e){

         e.preventDefault();

         $.ajax({

           url :'models/input_multi/proses_input_multi_pengelola_sampel.php',

           type :'POST',

           data : new FormData (this),

           contentType : false,

           cache : false,

           processData : false,

           success : function(response){

                $('#tb_pengelola_sampel').DataTable().ajax.reload(null, false),

                swal({

                  title: "Sukses",

                  text: "Data Berhasil Di Input",

                  type: "success"

              }).then(function(){

                  $('#modal_input_multi_pengelola_sampel').modal('hide')

              });

           }  
         })

      }));

      $( "#yang_menyerahkanlab_input" ).on('change', function () {
        let pejabatID = $(this).val();

            $.get({
                url: "views/data/SourceDataPemohon.php",
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
                url: "views/data/SourceDataPemohon.php",
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







