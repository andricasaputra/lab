<?php

include_once('../header_input.php');

$d=date("m/Y");

$tgl_indo = $objectTanggal->tgl_indo(date('Y-m-d'));

$lastData = $objectData->infoPermintaanKesiapanPengujian("1");

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

                  <h4 class="modal-title"><i class="fa fa-gear fa-fw"></i>Input Multiple Data Permintaan Kesiapan Pengujian</h4>

               </div>

           
            <form id="form_input_multi_kesiapan_permintaan_pengujian_kh">  

               <div class="modal-body" id="modal-edit_kh">

                  <div id="responsive-form" class="clearfix">

                           <div class="column-half">

                                 <label class="control-label" for="ma">Manajer Administrasi/ Deputi Manajer Administrasi</label>

                                  <select class="form-control" name="ma" id="ma_input" required>

                                    <option>Andik Akrimil Fata, SP</option>

                                        <?php 


                                          $i = $objectData->tampil_pejabat();

                                          while ($t=$i->fetch_object()) : ?>

                                          <option><?=$t->nama_pejabat ;?></option>

                                        <?php endwhile;?>

                                    </select>

                           </div>


                          <div class="column-half"  >

                              <label class="control-label" for="nip_ma">NIP</label>

                                <select class="form-control" name="nip_ma" id="nip_ma_input" required>

                                      <option>19820710 200901 1 007</option>

                                </select>

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


<script>

  $(document).ready(function(e){
  
      $("#form_input_multi_kesiapan_permintaan_pengujian_kh").on("submit", (function(e){

           e.preventDefault();

           $.ajax({

             url :'lab_bakteri/models/input_multi/proses_input_multi_permintaan_kesiapan_kh.php',

             type :'POST',

             data : new FormData (this),

             contentType : false,

             cache : false,

             processData : false,

             success : function(response){

              if (response != 'nodata') {


                $('#tb_permintaan_kesiapan_kh').DataTable().ajax.reload(null, false),

                  swal({

                    title: "Sukses",

                    text: "Data Berhasil Di Input",

                    type: "success"

                }).then(function(){

                    $('#modal_input_multi_permintaan_kesiapan_pengujian_kh').modal('hide')

                });


              }else{


                $('#tb_permintaan_kesiapan_kh').DataTable().ajax.reload(null, false),

                  swal({

                    title: "Perhatian",

                    text: "Tidak Ada Data Untuk Diinput!",

                    type: "error"

                }).then(function(){

                    $('#modal_input_multi_permintaan_kesiapan_pengujian_kh').modal('hide')

                });

              }/*endif*/
             }  
           });

        }));

        $( "#ma_input" ).on('change', function () {
        let pejabatID = $(this).val();

            $.get({
                url: "lab_bakteri/views/data_kh/SourceDataPemohon_kh.php",
                dataType: 'Json',
                data: {'id':pejabatID},
                success: function(data) {
                    $('#nip_ma_input').empty();
                    $.each(data, function(key, value) {
                        $('#nip_ma_input').append('<option>'+ value +'</option>');
                  });
                }
            });

      });

    });

</script>







