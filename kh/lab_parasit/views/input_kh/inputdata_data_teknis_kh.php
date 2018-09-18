<?php

include_once('header_input.php');

if(isset($_REQUEST['id'])){

    $id = intval($_REQUEST['id']);

    $d=date("m/Y");

    $tgl_indo = $objectTanggal->tgl_indo(date('Y-m-d'));

    $bln=date('m');

    $thn=date('Y');

    $tampil = $objectDataParasit->tampil($id);

    while($data = $tampil->fetch_object()):

      $id                       = $data->id;

      $tanggal_penyerahan       = $data->tanggal_penyerahan;

      $tanggal_penyerahan_lab   = $data->tanggal_penyerahan_lab;

      $tanggal_pengujian        = $data->tanggal_pengujian;

      $rekomendasi              = $data->rekomendasi;

      $nip_penyelia             = $data->nip_penyelia;

      $nip_analis               = $data->nip_analis;

      $ket_kesimpulan           = $data->ket_kesimpulan;

      $penyelia                 = $data->nama_penyelia;

      $analis                   = $data->nama_analis;

      $analis2 = '';

      if (strpos($analis, "&") != false) {
        
        $x = explode("&", $analis);

        $analis = trim($x[0]);

        $analis2 = trim($x[1]);

      }



endwhile;

?>


            <div class="modal-content">

               <div class="modal-header">

                  <button type="button" class="close" data-dismiss="modal">&times;</button>

                  <h4 class="modal-title"><i class="fa fa-gear fa-fw"></i>Input Data Teknis Pengujian</h4>

               </div>



               <form id="form_input_data_teknis">

                 <div class="modal-body" id="modal-edit">

                  <div id="responsive-form" class="clearfix">

                
                      <div class="column-half">

                        <label class="control-label" for="tanggal_penyerahan_lab">Tanggal Penerimaan Sampel Di Laboratorium</label>

                        <input type="text" class="form-control" name="tanggal_penyerahan_lab" id="tanggal_penyerahan_lab_input" value="<?=$tanggal_penyerahan;?>" required>

                        <input type="hidden" name="id" id="id_input" value="<?=$id;?>">

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

                          <div id="showAnalis2">

                          <?php  

                            if ($analis2 != '') { ?>

                              <div class="column-full">

                                <label class="control-label" for="analis2">Analis 2</label>

                                 <select class="form-control" name="analis2" id="analis2" style="pointer-events: none;"> 

                                  <option><?= $analis2; ?></option>

                                    <?php 

                                      $i = $objectData->tampil_jabfung();

                                     while ($t=$i->fetch_object()) : ?>


                                      <option><?=$t->nama_pejabat ;?></option>


                                  <?php endwhile;?>

                                </select>

                              </div>

                              <div class="column-full">

                                <label class="control-label" for="nip_analis2">NIP Analis 2</label>

                                <select class="form-control" name="nip_analis2" id="nip_analis2" style="pointer-events: none;">

                                    <?php 

                                      $i = $objectData->tampil_jabfung();

                                      while ($t=$i->fetch_object()) : 

                                        if ($t->nama_pejabat == $analis2) : ?>

                                          <option value="<?=$t->nip ;?>" selected><?=$t->nip ;?></option>

                                    <?php endif; endwhile;?>

                              </select>

                              </div>


                          <?php  } ?>

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
    
    $("#form_input_data_teknis").on("submit", (function(e){

         e.preventDefault();

         $.ajax({

           url :'lab_parasit/models/proses_input_data_teknis_kh.php',

           type :'POST',

           data : new FormData (this),

           contentType : false,

           cache : false,

           processData : false,

           success : function(){

                $('#tb_data_teknis_kh_lab_parasit').DataTable().ajax.reload(null, false),

                swal({

                  title: "Sukses",

                  text: "Data Berhasil Di Input",

                  type: "success"

              }).then(function(){

                  $('#modal_input_data_teknis_kh').modal('hide')

              });
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






