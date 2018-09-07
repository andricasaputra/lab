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

                  <h4 class="modal-title"><i class="fa fa-gear fa-fw"></i>Input Multiple Data Permintaan Kesiapan Pengujian</h4>

               </div> 

               <form id="form_input_multi_kesiapan_permintaan_pengujian"> 

               <div class="modal-body" id="modal-edit">

                  <div id="responsive-form" class="clearfix">


                           <div class="column-half">

                                 <label class="control-label" for="ma">Manajer Administrasi/ Deputi Manajer Administrasi</label>

                                  <select class="form-control" name="ma" id="ma" required>

                                    <option>Muhammad Tamrin</option>

                                        <?php 

                                        $i = $objectData->tampil_pejabat();

                                        while ($t=$i->fetch_object()) : 

                                            echo '<option value="'.$t->nama_pejabat.'">'.$t->nama_pejabat.'</option>';

                                        endwhile;

                                        ?>
                                        
                                    </select>

                           </div>


                          <div class="column-half"  >

                              <label class="control-label" for="nip_ma">NIP</label>

                                <select class="form-control" name="nip_ma" id="nip_ma" required>

                                      <option>19650101 200212 1 001</option>

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
  
      $("#form_input_multi_kesiapan_permintaan_pengujian").on("submit", (function(e){

           e.preventDefault();

           $.ajax({

             url :'models/input_multi/proses_input_multi_permintaan_kesiapan.php',

             type :'POST',

             data : new FormData (this),

             contentType : false,

             cache : false,

             processData : false,

             success : function(){

             $('#tb_permintaan_kesiapan').DataTable().ajax.reload(null, false),

                swal({

                  title: "Sukses",

                  text: "Data Berhasil Di Input",

                  type: "success"

              }).then(function(){

                  $('#modal_input_multi_permintaan_kesiapan_pengujian').modal('hide')

              });
                  
             }  
           });

        }));

        $( "#ma" ).on('change', function () {
        let pejabatID = $(this).val();

            $.get({
                url: "views/data/SourceDataPemohon.php",
                dataType: 'Json',
                data: {'id':pejabatID},
                success: function(data) {
                    $('#nip_ma').empty();
                    $.each(data, function(key, value) {
                        $('#nip_ma').append('<option>'+ value +'</option>');
                  });
                }
            });

      });

    });

</script>







