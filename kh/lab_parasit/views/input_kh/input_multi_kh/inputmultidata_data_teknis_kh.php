<?php

include_once('../header_input.php');

$d=date("m/Y");

$tgl_indo = $objectTanggal->tgl_indo(date('Y-m-d'));

$bln=date('m');

$thn=date('Y');

$lastData = $objectDataParasit->infoDataTeknis("1");

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

$lastData = $objectDataParasit->infoDataTeknis("select");

$arrid = array();

if ($lastData->num_rows != 0 ):

  while ($last = $lastData->fetch_object()) :

  $arrid[] = $last->id;

  $penyelia = $last->nama_penyelia;

  $analis = $last->nama_analis;

  $tanggal_penyerahan = $last->tanggal_penyerahan;

  endwhile;

else:

  $arrid[] = 0;

  $penyelia = "drh. I Gede Wira Adipredana";

  $analis = "Siska Murtini, A.Md";

  $tanggal_penyerahan = $tgl_indo;

endif;


?>


            <div class="modal-content">

               <div class="modal-header">

                  <button type="button" class="close" data-dismiss="modal">&times;</button>

                  <h4 class="modal-title"><i class="fa fa-gear fa-fw"></i>Input Multiple Data Teknis Pengujian</h4>

               </div>

               <form id="form_input_multi_data_teknis">

                 <div class="modal-body" id="modal-edit">

                  <div id="responsive-form" class="clearfix">

                
                      <div class="column-half">

                        <label class="control-label" for="tanggal_penyerahan_lab">Tanggal Penerimaan Sampel Di Laboratorium</label>

                        <?php foreach($arrid as $id): ?>

                        <input type="hidden" name="id[]" id="id" value="<?=$id;?>">

                        <?php endforeach; ?>

                        <input type="text" class="form-control" name="tanggal_penyerahan_lab" id="tanggal_penyerahan_lab_input" value="<?=$tanggal_penyerahan;?>" required>

                      </div>



                      <div class="column-half">

                        <label class="control-label" for="tanggal_pengujian">Tanggal Pengujian</label>

                        <input type="text" class="form-control" name="tanggal_pengujian" id="tanggal_pengujian_input" value="<?=$tgl_indo?>" required>

                      </div>




                      <div class="column-half">

                        <label class="control-label" for="rekomendasi">Rekomendasi</label>

                        <textarea class="form-control" name="rekomendasi" id="rekomendasi_input" rows="3" required>-</textarea>

                      </div>



                       <div class="column-half">

                        <label class="control-label" for="ket_kesimpulan">Keterangan/Simpulan</label>

                        <textarea class="form-control" name="ket_kesimpulan" id="ket_kesimpulan_input" rows="3" required>-</textarea>

                      </div>



                      <div class="column-half">

                        <label class="control-label" for="nama_penyelia">Penyelia</label>

                         <select class="form-control" name="nama_penyelia" id="nama_penyelia_input" required> 

                          <option><?php echo $penyelia; ?></option>

                                <?php 

                                $i = $objectDataParasit->tampil_pejabat();

                                while ($t=$i->fetch_object()) : 

                                    echo '<option value="'.$t->nama_pejabat.'">'.$t->nama_pejabat.'</option>';

                                endwhile;

                                ?>

                        </select>

                      </div>



                      <div class="column-half">

                        <label class="control-label" for="nama_analis">Analis</label>

                         <select class="form-control" name="nama_analis" id="nama_analis_input" required> 

                          <option><?php echo $analis; ?></option>

                                <?php 

                                $i = $objectDataParasit->tampil_pejabat();

                                while ($t=$i->fetch_object()) : 

                                    echo '<option value="'.$t->nama_pejabat.'">'.$t->nama_pejabat.'</option>';

                                endwhile;

                                ?>

                        </select>

                      </div>





                        <div class="column-half">

                            <label class="control-label" for="nip_penyelia">NIP Penyelia</label>

                              <select class="form-control" name="nip_penyelia" id="nip_penyelia_input" required>

                                    <?php 

                                      $i = $objectDataParasit->tampil_jabfung();

                                      while ($t=$i->fetch_object()) : 

                                        if ($t->nama_pejabat == $penyelia) : ?>

                                          <option value="<?=$t->nip ;?>" selected><?=$t->nip ;?></option>

                                    <?php endif; endwhile;?>

                              </select>

                          </div>



                          <div class="column-half">

                            <label class="control-label" for="nip_analis">NIP Analis</label>

                              <select class="form-control" name="nip_analis" id="nip_analis_input" required>

                                    <?php 

                                      $i = $objectDataParasit->tampil_jabfung();

                                      while ($t=$i->fetch_object()) : 

                                        if ($t->nama_pejabat == $analis) : ?>

                                          <option value="<?=$t->nip ;?>" selected><?=$t->nip ;?></option>

                                    <?php endif; endwhile;?>

                              </select>

                          </div>

                          <div class="column-half">

                            <label>Scan Tanda Tangan Penyelia</label>

                            <br>

                                  <label class="checkbox-inline">
                                    <input type="checkbox" name="ttd_penyelia_data_teknis" value="Ya">Ya
                                  </label>

                                  <label class="checkbox-inline">
                                    <input type="checkbox" name="ttd_penyelia_data_teknis" checked value="Tidak">Tidak
                                  </label>


                          </div>


                          <div class="column-half">

                            <label>Scan Tanda Tangan Analis</label>

                            <br>

                                  <label class="checkbox-inline">
                                    <input type="checkbox" name="ttd_analis_data_teknis" value="Ya">Ya
                                  </label>

                                  <label class="checkbox-inline">
                                    <input type="checkbox" name="ttd_analis_data_teknis" checked value="Tidak">Tidak
                                  </label>

                              
                          </div>
                          

                        </div>

      

                          <div class="modal-footer" >

                            <div class="column-full button-bawah">
                              <span style="float : left; text-align: left; margin-top: -20px"><b>Catatan : </b><br>
                              1. Perhatikan Tanggal Penerimaan Sampel <br>
                              2. Perhatikan Tanggal Pengujian <span style="font-size: 10pt">(<i><b>otomatis terpilih hari ini</b></i>)</span> </span>
                              <button type="submit" class="btn-default2 btn-success" name="edit" value="edit"><i class="fa fa-check-circle fa-fw" aria-hidden="true"></i>&nbsp;Simpan Multiple</button> 

                            </div>      

                          </div>


                     </form>

        </div>

      </div> 

   </div>

</div>


<script>

  $(document).ready(function(e){
    
    $("#form_input_multi_data_teknis").on("submit", (function(e){

         e.preventDefault();

         $.ajax({

           url :'lab_parasit/models/input_multi/proses_input_multi_data_teknis_kh.php',

           type :'POST',

           data : new FormData (this),

           contentType : false,

           cache : false,

           processData : false,

           success : function(response){

              if (response != 'nodata') {

                $('#tb_data_teknis_kh_lab_parasit').DataTable().ajax.reload(null, false),

                swal({

                  title: "Sukses",

                  text: "Data Berhasil Di Input",

                  type: "success"

                }).then(function(){

                    $('#modal_input_multi_data_teknis_kh').modal('hide')

                });

              }else{

                $('#tb_data_teknis_kh_lab_parasit').DataTable().ajax.reload(null, false),

                swal({

                  title: "Perhatian",

                  text: "Tidak Ada Data Untuk Diinput!",

                  type: "error"

                }).then(function(){

                    $('#modal_input_multi_data_teknis_kh').modal('hide')

                });


              }/*Endif*/
           }  
         })

      }));

      $( "#nama_penyelia_input" ).on('change', function () {
        let pejabatID = $(this).val();

            $.get({
                url: "lab_parasit/views/data_kh/SourceDataPemohon_kh.php",
                dataType: 'Json',
                data: {'id':pejabatID},
                success: function(data) {
                    $('#nip_penyelia_input').empty();
                    $.each(data, function(key, value) {
                        $('#nip_penyelia_input').append('<option>'+ value +'</option>');
                  });
                }
            });

      });

      $( "#nama_analis_input" ).on('change', function () {
        let pejabatID = $(this).val();

            $.get({
                url: "lab_parasit/views/data_kh/SourceDataPemohon_kh.php",
                dataType: 'Json',
                data: {'id':pejabatID},
                success: function(data) {
                    $('#nip_analis_input').empty();
                    $.each(data, function(key, value) {
                        $('#nip_analis_input').append('<option>'+ value +'</option>');
                  });
                }
            });

      });

   });

</script>






