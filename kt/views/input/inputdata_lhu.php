<?php

include_once('header_input.php');

if(isset($_REQUEST['id'])){

    $id = intval($_REQUEST['id']);

    $d = date("m/Y");

    $tgl = $objectTanggal->tgl_indo(date('Y-m-d'));

    $hari = $objectTanggal->hari(date('Y-m-d'));

    $bln = date('m');

    $thn = date('Y');

    $tampil = $objectData->tampil($id);

    while($data = $tampil->fetch_object()):

      $id                       = $data->id;

      $no_agenda                = $data->no_agenda;

      $no_lhu                   = $data->no_lhu;

      $tanggal_lhu              = $data->tanggal_lhu;

      $kepala_plh2              = $data->kepala_plh2;

      $nip_kepala_plh2          = $data->nip_kepala_plh2;

      $no_sertifikat            = (int)$data->no_sertifikat;

      if ($hari == 'Senin' || $hari == 'Selasa') {
          
          $ttd = 'drh. Ida Bagus Putu Raka Ariana';

      }elseif ($hari == 'Rabu' || $hari == 'Kamis') {

          $ttd = 'Andik Akrimil Fata, SP';

      }else{

          $ttd = 'Abdul Salam, SP';

      }

      if ($ttd == 'drh. Ida Bagus Putu Raka Ariana') {
        
          $nip_ttd = '19661225 199303 1 001';

      }elseif ($ttd == 'Andik Akrimil Fata, SP') {

          $nip_ttd = '19820710 200901 1 007';

      }else{

          $nip_ttd = '19690905 199903 1 001';

      }





endwhile;

?>



            <div class="modal-content">

               <div class="modal-header">

                  <button type="button" class="close" data-dismiss="modal">&times;</button> 

                  <h4 class="modal-title"><i class="fa fa-gear fa-fw"></i>Input Data Hasil Pengujian</h4>

               </div>


               <form id="form_input_lhu">

                 <div class="modal-body" id="modal-edit">

                  <div id="responsive-form" class="clearfix">

                    <div class="column-full">

                        <label class="control-label" for="no_lhu">Tanggal LHU</label>

                        <input type="text" class="form-control" name="tanggal_lhu" id="tanggal_lhu_input" value="<?=$tgl?>" required>

                      </div>



                     <div class="column-half">

                        <label class="control-label" for="no_agenda">No Agenda</label>

                        <input type="hidden" name="id" id="id_input" value="<?=$id;?>">

                        <input type="text" class="form-control" name="no_agenda" id="no_agenda_input" value="<?=$no_sertifikat;?>/KT/<?=$thn?>" required>

                      </div>





                      <div class="column-half">

                        <label class="control-label" for="no_lhu">Nomor LHU</label>

                        <input type="text" class="form-control" name="no_lhu" id="no_lhu_input" value="/KR.110/K.50.D/<?=$bln?>/<?=$thn?>" >

                      </div>


                      


                      <div class="column-half">

                        <label class="control-label" for="kepala_plh2">Kepala/Plh</label>

                        <select class="form-control" name="kepala_plh2" id="kepala_plh2_input" required>

                              <option><?php echo $ttd; ?></option>

                                <?php 

                                $i = $objectData->tampil_pejabat();

                                while ($t=$i->fetch_object()) : 

                                    echo '<option value="'.$t->nama_pejabat.'">'.$t->nama_pejabat.'</option>';

                                endwhile;

                                ?>  
                          </select>

                      </div>

                        



                      <div class="column-half">

                            <label class="control-label" for="nip_kepala_plh2">NIP Kepala/Plh</label>

                              <select class="form-control" name="nip_kepala_plh2" id="nip_kepala_plh2_input" required>

                                    <option><?php echo $nip_ttd; ?></option>

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

   </div>

</div>

<?php
}
?>

<script>

  $(document).ready(function(e){
    
    $("#form_input_lhu").on("submit", (function(e){

         e.preventDefault();

         $.ajax({

           url :'models/proses_input_lhu.php',

           type :'POST',

           data : new FormData (this),

           contentType : false,

           cache : false,

           processData : false,

           success : function(response){

              if (response == 'false') {

                  swal({

                    title: "",

                    text: "Nomor Agenda Sudah Pernah Dipakai",

                    type: "info"

                });

                
              }else{

                  $('#tb_lhu').DataTable().ajax.reload(null, false),

                  swal({

                    title: "Sukses",

                    text: "Data Berhasil Di Input",

                    type: "success"

                  }).then(function(){

                    $('#modal_input_lhu').modal('hide')

                });

            }
           }  
         })

      }));

      $( "#kepala_plh2_input" ).on('change', function () {
        let pejabatID = $(this).val();

            $.get({
                url: "views/data/SourceDataPemohon.php",
                dataType: 'Json',
                data: {'id':pejabatID},
                success: function(data) {
                    $('#nip_kepala_plh2_input').empty();
                    $.each(data, function(key, value) {
                        $('#nip_kepala_plh2_input').append('<option>'+ value +'</option>');
                  });
                }
            });

      });


   });

</script>






