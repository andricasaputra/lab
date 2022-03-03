<?php

include_once('../header_input.php');

$d=date("m/Y");

$tgl_indo = $objectTanggal->tgl_indo(date('Y-m-d'));

$bln=date('m');

$thn=date('Y');

$lastData = $objectData->infoKesiapanPengujian("1");

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


?>


            <div class="modal-content">

               <div class="modal-header">

                  <button type="button" class="close" data-dismiss="modal">&times;</button>

                   <h4 class="modal-title"><i class="fa fa-gear fa-fw"></i>Input Data Kesiapan Pengujian</h4>

               </div>
              
               <form id="form_input_multi_kesiapan_pengujian">

                <div class="modal-body">

                     <div id="responsive-form" class="clearfix">


                          <div class="column-full">

                                  <label class="control-label" for="kondisi_sampel" >Kondisi Sampel</label>

                                  <select class="form-control" name="kondisi_sampel" id="kondisi_sampel" required>

                                  <option selected>Baik</option>

                                  <option>Busuk</option>

                                  <option>Rusak</option>

                                  <option>Lainnya</option>

                                  </select>

                          </div>

                          <div class="column-half column-seperempat">

                            <label class="control-label" for="penyelia">Penyelia</label>

                              <select class="form-control" name="penyelia" id="penyelia_input"  required>

                                  <option>-</option>                                      

                                  <option selected="selected">Kompeten</option>

                                  <option>Tidak Kompeten</option>     

                              </select>

                            </div>

                            <div class="column-half column-seperempat">

                              <label class="control-label" for="penyelia">&nbsp;</label>

                              <select class="form-control" name="penyelia2" id="penyelia2_input" required>

                                  <option>-</option>                                      

                                  <option selected="selected">Ada</option>

                                  <option>Tidak Ada</option>     

                              </select>

                          </div>


                          <div class="column-half column-seperempat">

                            <label class="control-label" for="analis">Analis</label>

                              <select class="form-control" name="analis" id="analis_input"  required>

                                  <option>-</option>                                      

                                  <option selected="selected">Kompeten</option>

                                  <option>Tidak Kompeten</option>     

                              </select>

                          </div>


                          <div class="column-half column-seperempat">

                              <label class="control-label" for="penyelia">&nbsp;</label>

                              <select class="form-control" name="analis2" id="analis2_input"  required>

                                  <option>-</option>                                      

                                  <option selected="selected">Ada</option>

                                  <option>Tidak Ada</option>     

                              </select>

                          </div>

                          <div class="column-half column-seperempat">

                                <label class="control-label" for="bahan">Bahan</label>

                                  <select class="form-control" name="bahan" id="bahan_input"  required>

                                      <option>-</option>                                      

                                      <option selected="selected">Baik</option>

                                      <option>Kadaluarsa</option>     

                              </select>

                          </div>


                          <div class="column-half column-seperempat">

                              <label class="control-label" for="penyelia">&nbsp;</label>

                              <select class="form-control" name="bahan2" id="bahan2_input"  required>

                                  <option>-</option>                                      

                                  <option selected="selected">Ada</option>

                                  <option>Tidak Ada</option>     

                              </select>

                          </div>



                          <div class="column-half column-seperempat">

                            <label class="control-label" for="alat">Alat</label>

                              <select class="form-control" name="alat" id="alat_input" required>

                                  <option>-</option>                                      

                                  <option selected="selected">Ada</option>

                                  <option>Tidak Ada</option>     

                              </select>

                          </div>


                           <div class="column-half column-seperempat">

                            <label class="control-label" for="penyelia">&nbsp;</label>

                              <select class="form-control" name="alat2" id="alat2_input" required>

                                  <option>-</option>                                      

                                  <option selected="selected">Baik</option>

                                  <option>Rusak</option>     

                              </select>

                          </div>

                      

                           <div class="column-half">

                                 <label class="control-label" for="mt">Manajer Teknis</label>

                                  <select class="form-control" name="mt" id="mt" required>

                                    <option>I Ketut Sindia, SP</option>

                                        <?php 

                                        $i = $objectData->tampil_pejabat();

                                        while ($t=$i->fetch_object()) : 

                                            echo '<option value="'.$t->nama_pejabat.'">'.$t->nama_pejabat.'</option>';

                                        endwhile;

                                        ?>

                                  </select>

                           </div>



                          <div class="column-half">

                              <label class="control-label" for="nip_mt">NIP</label>

                                    <select class="form-control" name="nip_mt" id="nip_mt" required>

                                          <option>19740929 200112 1 002</option>

                                    </select>

                          </div>

                          <div class="column-half">

                            <label>Kesiapan Laboratorium</label>

                            <br>

                              <label class="checkbox-inline">
                                <input type="checkbox" name="kesiapan" checked value="Ya">Ya
                              </label>

                              <label class="checkbox-inline">
                                <input type="checkbox" name="kesiapan" value="Tidak">Tidak
                              </label>

                          </div>

                        </div>

      

                          <div class="modal-footer" >

                            <div class="column-full button-bawah">

                              <button type="submit" class="btn-default2 btn-success" name="edit" value="edit" id="test"><i class="fa fa-check-circle fa-fw" aria-hidden="true"></i>&nbsp;Simpan</button> 

                            </div>      

                          </div>

                     </form>

        </div>

      </div> 


<script>

  $(document).ready(function(e){
    
    $("#form_input_multi_kesiapan_pengujian").on("submit", (function(e){

         e.preventDefault();

         $.ajax({

           url :'models/input_multi/proses_input_multi_kesiapan_pengujian.php',

           type :'POST',

           data : new FormData (this),

           contentType : false,

           cache : false,

           processData : false,

           success : function(response){

            $('#tb_kesiapan_pengujian').DataTable().ajax.reload(null, false),

              swal({

                title: "Sukses",

                text: "Data Berhasil Di Input",

                type: "success"

            }).then(function(){

                $('#modal_input_multi_kesiapan_pengujian').modal('hide')

            });

            console.log(response)
           }  
         });

      }));

      $( "#mt" ).on('change', function () {
        let pejabatID = $(this).val();

            $.get({
                url: "views/data/SourceDataPemohon.php",
                dataType: 'Json',
                data: {'id':pejabatID},
                success: function(data) {
                    $('#nip_mt').empty();
                    $.each(data, function(key, value) {
                        $('#nip_mt').append('<option>'+ value +'</option>');
                  });
                }
            });

      });


   });

</script>







