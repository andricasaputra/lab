<style type="text/css">
  select.pilihan{
    margin-bottom: 10px;
    pointer-events: none;
  }
</style>

<?php

include_once('../header_input.php');

$d=date("m/Y");

$tgl_indo = $objectTanggal->tgl_indo(date('Y-m-d'));

$bln=date('m');

$thn=date('Y');

$lastData = $objectData->infoResponPermohonanPengujian("select");

if ($lastData->num_rows == 0 ):

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

$method = $objectData->infoResponPermohonanPengujian("select");

while ($data = $method->fetch_object()) :

  $ma = $data->ma;

  $nip_ma = $data->nip_ma;

endwhile;

?>


            <div class="modal-content">

               <div class="modal-header">

                  <button type="button" class="close" data-dismiss="modal">&times;</button>

                  <h4 class="modal-title"><i class="fa fa-gear fa-fw"></i>Input Data Respon Permohonan Pengujian</h4>

               </div>



            <form id="form_input_multi_respon_permohonan_pengujian">

              <div class="modal-body" id="modal-edit">

                <div id="responsive-form" class="clearfix">


                          <div class="column-half">

                                <label class="control-label" for="saran">Saran</label>

                                <textarea type="text" name="saran" class="form-control" id="saran_input" rows="1">-</textarea> 

                          </div>



                           <div class="column-half">

                                <label class="control-label" for="tanggal_selesai">Tanggal Selesai</label>

                                <input type="text" name="tanggal_selesai" class="form-control" id="tanggal_selesai_input" value="-">

                          </div>


                           <div class="column-half">

                                 <label class="control-label" for="ma">Penanggungjawab Kesekretariatan</label>

                                 <select class="form-control" name="ma" id="ma_input" required>

                                    <option><?php echo $ma ?></option>

                                        <?php 

                                        $i = $objectData->tampil_pejabat();

                                        while ($t=$i->fetch_object()) : 

                                            echo '<option value="'.$t->nama_pejabat.'">'.$t->nama_pejabat.'</option>';

                                        endwhile;

                                        ?>
                                    </select>

                           </div>



                          <div class="column-half">

                              <label class="control-label" for="nip_ma">NIP</label>

                                    <select class="form-control" name="nip_ma" id="nip_ma_input" required>

                                          <option><?php echo $nip_ma; ?></option>

                                    </select>

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


<script>

  $(document).ready(function(e){
  
      $("#form_input_multi_respon_permohonan_pengujian").on("submit", (function(e){

           e.preventDefault();

           $.ajax({

             url :'models/input_multi/proses_input_multi_respon_permohonan.php',

             type :'POST',

             data : new FormData (this),

             contentType : false,

             cache : false,

             processData : false,

             success : function(response){

              if (response !== 'false') {

                $('#tb_respon_permohonan').DataTable().ajax.reload(null, false),

                swal({

                  title: "Sukses",

                  text: "Data Berhasil Di Input",

                  type: "success"

                }).then(function(){

                  $('#modal_input_multi_respon_permohonan').modal('hide')

                });

              }else{

                swal({

                  title: "Data Tidak Lengkap",

                  text: "Harap Perbaiki Isian Data",

                  type: "info"

                });

                return false;

              }
              
             }  
           });

         }));

      $( "#ma_input" ).on('change', function () {
        let pejabatID = $(this).val();

            $.get({
                url: "views/data/SourceDataPemohon.php",
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








