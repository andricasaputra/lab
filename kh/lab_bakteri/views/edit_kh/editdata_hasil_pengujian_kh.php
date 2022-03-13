<?php

include_once('header_edit.php');

if(isset($_REQUEST['id'])){

    $id = intval($_REQUEST['id']);

    $d = date("m/Y");

    $tgl_indo = $objectTanggal->tgl_indo(date('Y-m-d'));

    $bln = date('m');

    $thn = date('Y');

    $tampil = $objectData->tampil($id);

    $checkScan = $objectPrint->Scan($id);

    while($data = $tampil->fetch_object()):

      $id                       = $data->id;

      $kode_sampel              = $data->kode_sampel;

      $nip_penyelia             = $data->nip_penyelia;

      $nip_analis               = $data->nip_analis;

      $penyelia                 = $data->nama_penyelia;

      $analis                   = $data->nama_analis;

      $mt                       = $data->mt;

      $nip_mt                   = $data->nip_mt;

      $tanggal_penyerahan_lab   = $data->tanggal_penyerahan_lab;

      $tanggal_pengujian        = $data->tanggal_pengujian;

      $ket_kesimpulan           = $data->ket_kesimpulan;

      $no_sertifikat            = $data->no_sertifikat;

      $tanggal_sertifikat       = $data->tanggal_sertifikat;

      $rekomendasi              = $data->rekomendasi;

      $kepala_plh               = $data->kepala_plh;

      $nip_kepala_plh           = $data->nip_kepala_plh;

endwhile;

/*Scan TTD*/

$ttd_mt_hasil_uji       = $checkScan["ttd_mt_hasil_uji"];

$ttd_penyelia_hasil_uji = $checkScan["ttd_penyelia_hasil_uji"];

?>



            <div class="modal-content">

               <div class="modal-header">

                  <button type="button" class="close" data-dismiss="modal">&times;</button> 

                  <h4 class="modal-title"><i class="fa fa-gear fa-fw"></i>Edit Data Hasil Pengujian</h4>

               </div>



               <form id="form_edit_hasil_pengujian">

                 <div class="modal-body" id="modal-edit">

                  <div id="responsive-form" class="clearfix">

                 
                      <div class="column-half">

                        <label class="control-label" for="kode_sampel">Kode Sampel</label>

                        <input type="text" class="form-control" name="kode_sampel" id="kode_sampel_input" value="<?=$kode_sampel;?>" disabled>

                        <input type="hidden"  name="id" id="id_input" value="<?=$id;?>">

                      </div>



                      <div class="column-half">

                        <label class="control-label" for="tanggal_penyerahan_lab">Tanggal Penerimaan Sampel Di Laboratorium</label>

                        <input type="text" class="form-control" name="tanggal_penyerahan_lab" id="tanggal_penyerahan_lab_input" value="<?=$tanggal_penyerahan_lab;?>" disabled>


                      </div>

                      <div class="column-full">

                        <label class="control-label" for="tanggal_penyerahan_lab">Tanggal Sertiifikat</label>


                         <input type="text" class="form-control" name="tanggal_sertifikat" id="tanggal_sertifikat_input" value="<?=$tanggal_sertifikat;?>">

                      </div>




                      <div class="column-half">

                        <label class="control-label" for="tanggal_pengujian">Tanggal Pengujian</label>

                        <input type="text" class="form-control" name="tanggal_pengujian" id="tanggal_pengujian_input" value="<?=$tanggal_pengujian;?>">

                      </div>




                      <div class="column-half">

                        <label class="control-label" for="no_sertifikat">Nomor Sertifikat</label>

                         <input type="text" class="form-control" name="no_sertifikat" id="no_sertifikat_input" value="<?= $no_sertifikat; ?>" required>

                      </div>



                       <div class="column-half">

                        <label class="control-label" for="ket_kesimpulan">Keterangan/Simpulan</label>

                        <textarea class="form-control" name="ket_kesimpulan" id="ket_kesimpulan_input" rows="3" required><?php echo $ket_kesimpulan; ?></textarea>

                      </div>      



                      <div class="column-half">

                        <label class="control-label" for="rekomendasi">Rekomendasi</label>

                        <textarea class="form-control" name="rekomendasi" id="rekomendasi_input" rows="3" required><?php echo $rekomendasi; ?></textarea>

                      </div>



                      <div class="column-half">

                        <label class="control-label" for="kepala_plh">Ketua Pokja KH & KT</label>

                        <select class="form-control" name="kepala_plh" id="kepala_plh_edit" required>

                              <option><?php echo $kepala_plh; ?></option>

                                <?php 

                                $i = $objectData->tampil_pejabat();

                                while ($t=$i->fetch_object()) : 

                                    echo '<option value="'.$t->nama_pejabat.'">'.$t->nama_pejabat.'</option>';

                                endwhile;

                                ?>                                 

                          </select>

                      </div>

                        



                      <div class="column-half">

                        <label class="control-label" for="nama_penyelia">Penyelia</label>

                         <select type="text" class="form-control" name="nama_penyelia" id="nama_penyelia_edit" required>

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

                            <label class="control-label" for="nip_kepala_plh">NIP Ketua Pokja KH & KT</label>

                              <select class="form-control" name="nip_kepala_plh" id="nip_kepala_plh_edit" required>

                                    <option><?php echo $nip_kepala_plh; ?></option>

                              </select>

                        </div>



 

                        <div class="column-half">

                            <label class="control-label" for="nip_penyelia">NIP Penyelia</label>

                              <select class="form-control" name="nip_penyelia" id="nip_penyelia_edit" required>

                                    <option><?php echo $nip_penyelia; ?></option>

                              </select>

                          </div>


                          <div class="column-half">

                            <label>Scan Tanda Tangan MT</label>

                            <br>

                              <?php  

                                if ($ttd_mt_hasil_uji == 'Ya') { ?>

                                  <label class="checkbox-inline">
                                    <input type="checkbox" name="ttd_mt_hasil_uji" checked value="Ya">Ya
                                  </label>

                                  <label class="checkbox-inline">
                                    <input type="checkbox" name="ttd_mt_hasil_uji" value="Tidak">Tidak
                                  </label>
                                  
                              <?php  }else{ ?>

                                  <label class="checkbox-inline">
                                    <input type="checkbox" name="ttd_mt_hasil_uji" value="Ya">Ya
                                  </label>

                                  <label class="checkbox-inline">
                                    <input type="checkbox" name="ttd_mt_hasil_uji" checked value="Tidak">Tidak
                                  </label>

                            <?php  } ?>
                              
                          </div>


                          <div class="column-half">

                            <label>Scan Tanda Tangan Penyelia</label>

                            <br>

                              <?php  

                                if ($ttd_penyelia_hasil_uji== 'Ya') { ?>

                                  <label class="checkbox-inline">
                                    <input type="checkbox" name="ttd_penyelia_hasil_uji" checked value="Ya">Ya
                                  </label>

                                  <label class="checkbox-inline">
                                    <input type="checkbox" name="ttd_penyelia_hasil_uji" value="Tidak">Tidak
                                  </label>
                                  
                              <?php  }else{ ?>

                                  <label class="checkbox-inline">
                                    <input type="checkbox" name="ttd_penyelia_hasil_uji" value="Ya">Ya
                                  </label>

                                  <label class="checkbox-inline">
                                    <input type="checkbox" name="ttd_penyelia_hasil_uji" checked value="Tidak">Tidak
                                  </label>

                            <?php  } ?>
     

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
    
    $("#form_edit_hasil_pengujian").on("submit", (function(e){

         e.preventDefault();

         $.ajax({

           url :'lab_bakteri/models/proses_editdata_hasil_pengujian_kh.php',

           type :'POST',

           data : new FormData (this),

           contentType : false,

           cache : false,

           processData : false,

           success : function(response){

                  $('#tb_hasil_pengujian_kh').DataTable().ajax.reload(null, false),

                  swal({

                    title: "Sukses",

                    text: "Data Berhasil Diubah",

                    type: "success"

                  }).then(function(){

                    $('#modal_edit_hasil_pengujian_kh').modal('hide')

                });

           }  
         })

      }));

      $( "#kepala_plh_edit" ).on('change', function () {
        let pejabatID = $(this).val();

            $.get({
                url: "lab_bakteri/views/data_kh/SourceDataPemohon_kh.php",
                dataType: 'Json',
                data: {'id':pejabatID},
                success: function(data) {
                    $('#nip_kepala_plh_edit').empty();
                    $.each(data, function(key, value) {
                        $('#nip_kepala_plh_edit').append('<option>'+ value +'</option>');
                  });
                }
            });

      });

      $( "#nama_penyelia_edit" ).on('change', function () {
        let pejabatID = $(this).val();

            $.get({
                url: "lab_bakteri/views/data_kh/SourceDataPemohon_kh.php",
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

   });

</script>






