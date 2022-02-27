<?php

include_once('../header_input.php');

$tgl_indo = $objectTanggal->tgl_indo(date('Y-m-d'));

$lastData = $objectData->infoPenerimaSampel("1");

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
 <!--Input data-->   

        <div class="modal-content">

            <div class="modal-header">

                  <button type="button" class="close" data-dismiss="modal">&times;</button>

                      <h4 class="modal-title"><i class="fa fa-gear fa-fw"></i>Input Multiple Data Tanda Terima Sampel</h4>

            </div>


              <form id="form_input_multi_penerima_sampel_kh">

                <div class="modal-body" id="modal-edit_kh">

                  <div id="responsive-form" class="clearfix">

                                   
                              <?php 

                                    date_default_timezone_set("Asia/Makassar");
                                    $waktu =  date('H:i');     

                              ?>


                              <div class="column-half" >

                                  <label class="control-label" for="tanggal_diterima" >Tanggal Diterima</label>

                                  <input type="text" name="tanggal_diterima" class="form-control" id="tanggal_diterima_input"  required value="<?php echo $tgl_indo ?>">

                                  <input type="hidden" name="jam_diterima"  id="jam_diterima_input"   value="<?php echo $waktu.' '.'wita' ?>">

                              </div>


                              <div class="column-half">

                                  <label class="control-label" for="lama_pengujian">Lama Pengujian</label>

                                  <select class="form-control" name="lama_pengujian" id="lama_pengujian_input" required>

                                      <?php 
                                      
                                        $i = $objectData->lama_pengujian();

                                        while ($t=$i->fetch_object()) : 
                                          if ($t->lama_pengujian == '1 Hari') :?>

                                        <option selected><?=$t->lama_pengujian ;?></option>

                                      <?php else: ?>

                                          <option><?=$t->lama_pengujian ;?></option>

                                     <?php  endif; endwhile;?>

                                    </select>

                              </div>


                              <div class="column-half" >

                                  <label class="control-label" for="cara_pengiriman">Cara Pengiriman</label>

                                  <select class="form-control" name="cara_pengiriman" id="cara_pengiriman_input" required>

                                        <?php 

                                          $i = $objectData->cara_pengiriman();

                                          while ($t=$i->fetch_object()) : ?>

                                          <option><?=$t->cara_pengiriman ;?></option>

                                        <?php endwhile;?>

                                    </select>

                              </div>

                              <div class="column-half">

                                  <label class="control-label" for="nama_pengirim">Pengantar</label>

                                  <select name="nama_pengirim" class="form-control" id="nama_pengirim_input" required>
                                    <option selected value="L. Indra K. Hidayat">L. Indra K. Hidayat</option>
                                    <option value="Muhammad Rusdi">Muhammad Rusdi</option>
                                    <option value="define">Input Manual</option>
                                  </select>


                              </div>

                              <div class="column-half">

                                  <label class="control-label" for="jumlah_kontainer">Jumlah Kontainer/Lot</label>

                                  <input type="text" name="jumlah_kontainer" class="form-control" value="-" id="jumlah_kontainer_input">

                              </div>

                              <div class="column-half">

                                  <label class="control-label" for="target_pengujian2">Target Pengujian</label>

                                  <em><input type="text" name="target_pengujian2" class="form-control" value="<?='Bakteri Brucella sp';?>" id="target_pengujian2_input" required></em>

                              </div>

                              <div class="column-half">

                                  <label class="control-label" for="penerima_sampel">Penerima Sampel</label>

                                  <select class="form-control" name="penerima_sampel" id="penerima_sampel_input" required>
                                        <option>Musallamatun</option>
                                        <?php 

                                          $i = $objectData->tampil_jabfung();

                                          while ($t=$i->fetch_object()) : ?>

                                          <option><?=$t->nama_pejabat ;?></option>

                                        <?php endwhile;?>

                                    </select>

                              </div>


                              <div class="column-half">

                                  <label class="control-label" for="nip_penerima_sampel">NIP</label>

                                  <select class="form-control" name="nip_penerima_sampel" id="nip_penerima_sampel_input">
                                    <option>19781124 200501 2 001</option>

                                  </select>

                              </div>

                        </div>

                              <div class="modal-footer">

                                  <div class="column-full button-bawah">

                                  <button type="submit" class="btn-default2 btn-success" name="edit" value="edit"><i class="fa fa-check-circle fa-fw" aria-hidden="true"></i>&nbsp;  Simpan Multiple</button>    

                                  </div>    

                            </div>

                      </form>

                  </div>

              </div> 

          </div>

      </div>


<script>

$(document).ready(function(e){
  
      $("#form_input_multi_penerima_sampel_kh").on("submit", (function(e){

           e.preventDefault();

           $.ajax({

             url :'lab_bakteri/models/input_multi/proses_input_multi_terimasampel_kh.php',

             type :'POST',

             data : new FormData (this),

             contentType : false,

             cache : false,

             processData : false,

             success : function(response){

                if (response != 'nodata') {


                  $('#tb_penerima_sampel_kh').DataTable().ajax.reload(null, false),

                    swal({

                      title: "Sukses",

                      text: "Data Berhasil Di input",

                      type: "success"

                  }).then(function(){

                      $('#modal_input_multi_penerima_sampel_kh').modal('hide')

                  });


                }else{


                  $('#tb_penerima_sampel_kh').DataTable().ajax.reload(null, false),

                    swal({

                      title: "Perhatian",

                      text: "Tidak Ada Data Untuk Diinput!",

                      type: "error"

                  }).then(function(){

                      $('#modal_input_multi_penerima_sampel_kh').modal('hide')

                  });


                }/*endif*/

             }  
           });

         }));

  $( "#penerima_sampel_input" ).on('change', function () {

    let pejabatID = $(this).val();

    $('#nip_penerima_sampel_input').removeAttr('disabled');


    if (pejabatID !='') {

      $.get({
            url: "lab_bakteri/views/data_kh/SourceDataPemohon_kh.php",
            dataType: 'Json',
            data: {'id':pejabatID},
            success: function(data) {
                $('#nip_penerima_sampel_input').empty();
                $.each(data, function(key, value) {
                    $('#nip_penerima_sampel_input').append('<option>'+ value +'</option>');
              });
            }
        });

    }else{

       $('#nip_penerima_sampel_input').empty();
       $('#nip_penerima_sampel_input').attr("disabled", true);

    }
        

  });

  $("#nama_pengirim_input").on("change", function (){
      let pengantar = $(this).val();

      if (pengantar == 'define') {

        $("#nama_pengirim_input").after('<input type="text" class="form-control" id="pengantar_manual" placeholder="ketikkan pengantar disini"></input>');

        $("#pengantar_manual").keyup(function (){

          let pengantar_manual = $('#pengantar_manual').val();

          if (pengantar_manual !='') {

            $("#nama_pengirim_input").empty();

            $("#nama_pengirim_input").prepend('<option selected>'+pengantar_manual+'</option>')

          }else{
            $("#nama_pengirim_input").empty();
            $("#nama_pengirim_input").prepend(
              '<option selected value="L. Indra K. Hidayat">L. Indra K. Hidayat</option>'+
              '<option value="Muhammad Rusdi">Muhammad Rusdi</option>'+
              '<option value="define">Input Manual</option>');
            $("#pengantar_manual").remove();
          }

          
        });
   
      }
  })

 }); /*End ready functions*/
</script>






