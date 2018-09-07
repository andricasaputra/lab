<?php

include_once('../header_input.php');

$d = date("m/Y");

$tgl = $objectTanggal->tgl_indo(date('Y-m-d'));

$hari = $objectTanggal->hari(date('Y-m-d'));

$bln = date('m');

$thn = date('Y');

$countlastData = $objectData->infoLHU("1");

$lastData = $objectData->infoLHU("select");

if ($lastData->num_rows == 0) :

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

$arrno_agenda = array();

$arrid = array();

while ($data = $lastData->fetch_object()) :

  $no_sertifikat = $data->no_sertifikat;

  $ex = explode("/", $no_sertifikat);

  $no_sertifikat = $ex[0];

  $arrno_agenda[] =  [

    "no_sertifikat" => $no_sertifikat,
    "no_permohonan" =>  $data->no_permohonan

  ];

  $arrid[] = $data->id;

endwhile;


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


?>

            <div class="modal-content">

               <div class="modal-header">

                  <button type="button" class="close" data-dismiss="modal">&times;</button> 

                  <h4 class="modal-title"><i class="fa fa-gear fa-fw"></i>Input Data Hasil Pengujian</h4>

               </div>

               <form id="form_input_multi_lhu">

                 <div class="modal-body" id="modal-edit">

                  <div id="responsive-form" class="clearfix">

                    <div class="column-full">

                        <label class="control-label" for="no_lhu">Tanggal LHU</label>

                        <input type="text" class="form-control" name="tanggal_lhu" id="tanggal_lhu_input" value="<?=$tgl?>" required>

                    </div>

                     <div class="column-half">

                        <label class="control-label" for="no_agenda">No Agenda</label>

                        <?php foreach ($arrid as $id) : ?>

                        <input type="hidden" name="id[]" id="id" value="<?=$id;?>">

                        <?php endforeach; ?>

                        <?php foreach ($arrno_agenda as $subdata) : ?>

                        <input type="text" class="form-control" name="no_agenda[]" id="no_agenda_input" value="<?=$subdata['no_sertifikat'];?>/KH/<?=$thn?>" required style="margin-bottom: 10px">

                        <?php endforeach; ?>

                      </div>

                      <div class="column-half">

                        <label class="control-label" for="no_lhu">Nomor LHU</label>

                         <?php foreach ($arrno_agenda as $subdata) : ?>

                        <input type="text" class="form-control" name="no_lhu[]" id="no_lhu_input" value="/KR.110/K.50.D/<?=$bln?>/<?=$thn?>" style="margin-bottom: 10px">

                        <?php endforeach; ?>

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

<script>

  $(document).ready(function(e){
    
    $("#form_input_multi_lhu").on("submit", (function(e){

         e.preventDefault();

         $.ajax({

           url :'lab_bakteri/models/input_multi/proses_input_multi_lhu_kh.php',

           type :'POST',

           data : new FormData (this),

           contentType : false,

           cache : false,

           processData : false,

           success : function(response){

              if (response != 'nodata') {

                  $('#tb_lhu_kh').DataTable().ajax.reload(null, false),

                  swal({

                    title: "Sukses",

                    text: "Data Berhasil Di Input",

                    type: "success"

                  }).then(function(){

                    $('#modal_input_multi_lhu_kh').modal('hide')

                  });

                
              }else{

                  $('#tb_lhu_kh').DataTable().ajax.reload(null, false),

                  swal({

                    title: "Perhatian!",

                    text: "Tidak Ada Data Untuk Diinput!",

                    type: "error"

                  }).then(function(){

                    $('#modal_input_multi_lhu_kh').modal('hide')

                  });

              }/*Endif*/

           }  
         })

      }));

      $( "#kepala_plh2_input" ).on('change', function () {
        let pejabatID = $(this).val();

            $.get({
                url: "lab_bakteri/views/data_kh/SourceDataPemohon_kh.php",
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






