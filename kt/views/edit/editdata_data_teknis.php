<?php

include_once('header_edit.php');

if(isset($_REQUEST['id'])){

    $id = intval($_REQUEST['id']);

    $d=date("m/Y");

    $tgl_indo = $objectTanggal->tgl_indo(date('Y-m-d'));

    $bln=date('m');

    $thn=date('Y');

    $tampil = $objectData->tampil($id);

    $checkScan = $objectPrint->Scan($id);

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



      if ($penyelia == 'I Ketut Sindia, SP') {

        $nip = '19740929 200112 1 002';

      }elseif ($penyelia == 'Fatma Dya Swari, SP'){

        $nip = '19801209 200912 2 004';

      }else{

        $nip = '19890705 201503 2 004';

      }



      if ($analis == 'I Ketut Sindia, SP') {

        $nip2 = '19740929 200112 1 002';

      }elseif ($analis == 'Fatma Dya Swari, SP'){

        $nip2 = '19801209 200912 2 004';

      }else{

        $nip2 = '19890705 201503 2 004';

      }




endwhile;

/*Scan TTD*/

$ttd_analis_data_teknis = $checkScan["ttd_analis_data_teknis"];

$ttd_penyelia_data_teknis = $checkScan["ttd_penyelia_data_teknis"];

?>


            <div class="modal-content">

               <div class="modal-header">

                  <button type="button" class="close" data-dismiss="modal">&times;</button>

                  <h4 class="modal-title"><i class="fa fa-gear fa-fw"></i>Edit Data Teknis Pengujian</h4>

               </div>



               <form id="form_edit_data_teknis">

                 <div class="modal-body" id="modal-edit">

                  <div id="responsive-form" class="clearfix">

                
                      <div class="column-half">

                        <label class="control-label" for="tanggal_penyerahan_lab">Tanggal Penerimaan Sampel Di Laboratorium</label>

                        <input type="text" class="form-control" name="tanggal_penyerahan_lab" id="tanggal_penyerahan_lab_input" value="<?=$tanggal_penyerahan_lab;?>" required>

                        <input type="hidden" name="id" id="id_input" value="<?=$id;?>">

                      </div>



                      <div class="column-half">

                        <label class="control-label" for="tanggal_pengujian">Tanggal Pengujian</label>

                        <input type="text" class="form-control" name="tanggal_pengujian" id="tanggal_pengujian_input" value="<?=$tanggal_pengujian;?>" required>

                      </div>




                      <div class="column-half">

                        <label class="control-label" for="rekomendasi">Rekomendasi</label>

                        <textarea class="form-control" name="rekomendasi" id="rekomendasi_input" rows="3" required><?php echo $rekomendasi; ?></textarea>

                      </div>



                       <div class="column-half">

                        <label class="control-label" for="ket_kesimpulan">Keterangan/Simpulan</label>

                        <textarea class="form-control" name="ket_kesimpulan" id="ket_kesimpulan_input" rows="3" required><?php echo $ket_kesimpulan; ?></textarea>

                      </div>



                      <div class="column-half">

                        <label class="control-label" for="nama_penyelia">Penyelia</label>

                         <select class="form-control" name="nama_penyelia" id="nama_penyelia_edit" required> 

                          <option><?php echo $penyelia; ?></option>

                                <?php 

                                $i = $objectData->tampil_pejabat();

                                while ($t=$i->fetch_object()) : 

                                    echo '<option value="'.$t->nama_pejabat.'">'.$t->nama_pejabat.'</option>';

                                endwhile;

                                ?>

                        </select>

                      </div>



                      <div class="column-half">

                        <label class="control-label" for="nama_analis">Analis</label>

                         <select class="form-control" name="nama_analis" id="nama_analis_edit" required> 

                          <option><?php echo $analis; ?></option>

                                <?php 

                                $i = $objectData->tampil_pejabat();

                                while ($t=$i->fetch_object()) : 

                                    echo '<option value="'.$t->nama_pejabat.'">'.$t->nama_pejabat.'</option>';

                                endwhile;

                                ?>

                        </select>

                      </div>





                        <div class="column-half">

                            <label class="control-label" for="nip_penyelia">NIP Penyelia</label>

                              <select class="form-control" name="nip_penyelia" id="nip_penyelia_edit" required>


                                    <option><?php echo $nip_penyelia;  ?></option>

                              </select>

                          </div>





                          <div class="column-half">

                            <label class="control-label" for="nip_analis">NIP Analis</label>

                              <select class="form-control" name="nip_analis" id="nip_analis_edit" required>

                                    <option><?php echo $nip_analis; ?></option>

                              </select>

                          </div>


                          <div class="column-half">

                            <label>Scan Tanda Tangan Penyelia</label>

                            <br>

                              <?php  

                                if ($ttd_penyelia_data_teknis == 'Ya') { ?>

                                  <label class="checkbox-inline">
                                    <input type="checkbox" name="ttd_penyelia_data_teknis" checked  value="Ya">Ya
                                  </label>

                                  <label class="checkbox-inline">
                                    <input type="checkbox" name="ttd_penyelia_data_teknis" value="Tidak">Tidak
                                  </label>
                                  
                              <?php  }else{ ?>

                                <label class="checkbox-inline">
                                    <input type="checkbox" name="ttd_penyelia_data_teknis" value="Ya">Ya
                                  </label>

                                  <label class="checkbox-inline">
                                    <input type="checkbox" name="ttd_penyelia_data_teknis" checked value="Tidak">Tidak
                                  </label>

                            <?php  } ?>
     

                          </div>


                          <div class="column-half">

                            <label>Scan Tanda Tangan Analis</label>

                            <br>

                              <?php  

                                if ($ttd_analis_data_teknis == 'Ya') { ?>

                                  <label class="checkbox-inline">
                                    <input type="checkbox" name="ttd_analis_data_teknis" checked  value="Ya">Ya
                                  </label>

                                  <label class="checkbox-inline">
                                    <input type="checkbox" name="ttd_analis_data_teknis" value="Tidak">Tidak
                                  </label>
                                  
                              <?php  }else{ ?>

                                  <label class="checkbox-inline">
                                    <input type="checkbox" name="ttd_analis_data_teknis" value="Ya">Ya
                                  </label>

                                  <label class="checkbox-inline">
                                    <input type="checkbox" name="ttd_analis_data_teknis" checked value="Tidak">Tidak
                                  </label>

                            <?php  } ?>

                                  

                              
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
    
    $("#form_edit_data_teknis").on("submit", (function(e){

         e.preventDefault();

         $.ajax({

           url :'models/proses_editdata_teknis.php',

           type :'POST',

           data : new FormData (this),

           contentType : false,

           cache : false,

           processData : false,

           success : function(){

                $('#tb_data_teknis').DataTable().ajax.reload(false),

                swal({

                  title: "Sukses",

                  text: "Data Berhasil Diubah",

                  type: "success"

              }).then(function(){

                  $('#modal_edit_data_teknis').modal('hide')

              });
           }  
         })

      }));

      $( "#nama_penyelia_edit" ).on('change', function () {
        let pejabatID = $(this).val();

            $.get({
                url: "views/data/SourceDataPemohon.php",
                dataType: 'Json',
                data: {'id':pejabatID},
                success: function(data) {
                    $('#nip_penyelia_edit').empty();
                    $.each(data, function(key, value) {
                        $('#nip_penyelia_edit').append('<option>'+ value +'</option>');
                  });
                }
            });

      });

      $( "#nama_analis_edit" ).on('change', function () {
        let pejabatID = $(this).val();

            $.get({
                url: "views/data/SourceDataPemohon.php",
                dataType: 'Json',
                data: {'id':pejabatID},
                success: function(data) {
                    $('#nip_analis_edit').empty();
                    $.each(data, function(key, value) {
                        $('#nip_analis_edit').append('<option>'+ value +'</option>');
                  });
                }
            });

      });

   });

</script>






