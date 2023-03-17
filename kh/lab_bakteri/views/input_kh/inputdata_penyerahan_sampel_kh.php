<?php

include_once('header_input.php');

$bln=date('m');

$thn=date('Y');

if(isset($_REQUEST['id'])){

    $id = intval($_REQUEST['id']);

    require_once($basepath.'/src/classes/kh/labbakteri/kode_sampel_kh.php');

    $d=date("m/Y");

    $tgl_indo = $objectTanggal->tgl_indo(date('Y-m-d'));

    $bln=date('m');

    $thn=date('Y');

    date_default_timezone_set("Asia/Makassar");

    $waktu =  date('H:i');

    $tampil = $objectData->tampil($id);

    while($data = $tampil->fetch_object()):

      $id                 = $data->id;

      $no_permohonan      = $data->no_permohonan;

      $kode_sampel        = $data->kode_sampel;

      $tanggal_penyerahan = $data->tanggal_penyerahan;

      $yang_menyerahkan   = $data->penerima_sampel;

      $yang_menerima      = $data->yang_menerima;

      $nip_ygmenyerahkan  = $data->nip_penerima_sampel;

      $nip_ygmenerima     = $data->nip_ygmenerima;



endwhile;
?>


            <div class="modal-content">

               <div class="modal-header">

                  <button type="button" class="close" data-dismiss="modal">&times;</button>

                  <h4 class="modal-title"><i class="fa fa-gear fa-fw"></i>Penyerahan Sampel Pengujian</h4>

               </div>



            <form id="form_input_penyerahan_sampel_pengujian_kh">

              <div class="modal-body" id="modal-edit_kh">

                <div id="responsive-form" class="clearfix">

              
                          <div class="column-half">

                           <label class="control-label" for="no_permohonan">Nomor Surat Pengantar</label>

                           <input type="hidden" name="id" id="id_input" value="<?=$id;?>">

                           <input type="text" name="no_permohonan" class="form-control" id="no_permohonan_input" value="<?=$no_permohonan;?>" disabled="disabled">

                          </div>

  

                          <div class="column-half">

                           <label class="control-label" for="kode_sampel">Kode Sampel</label>

                              <input type="text" name="kode_sampel" class="form-control" id="kode_sampel_input" value="<?= $format2 ?>">

                          </div>



                          <input type="hidden" name="tanggal_penyerahan"  id="tanggal_penyerahan_input" value="<?=$tgl_indo?>" required>


                          <input type="hidden" name="jam_diterima_pengelola_sampel"  id="jam_diterima_pengelola_sampel_input"   value="<?php echo $waktu.' '.'wita' ?>">


                          <div class="column-half">

                             <label class="control-label" for="yang_menyerahkan">Yang Menyerahkan</label>

                             <select class="form-control" name="yang_menyerahkan" id="yang_menyerahkan_input" required>

                                <option><?php echo $yang_menyerahkan; ?></option>

                                  <?php 

                                    $i = $objectData->tampil_jabfung();

                                    while ($t=$i->fetch_object()) : ?>

                                    <option value="<?=$t->nama_pejabat ;?>"><?=$t->nama_pejabat ;?></option>

                                  <?php endwhile;?>

                                </select>

                          </div>



                          <div class="column-half">

                             <label class="control-label" for="yang_menerima">Yang Menerima</label>

                             <select class="form-control" name="yang_menerima" id="yang_menerima_input" required>

                                <option value="Sari Rosmawati">Sari Rosmawati</option>

                                  <?php 

                                    $i = $objectData->tampil_jabfung();

                                    while ($t=$i->fetch_object()) : ?>

                                    <option value="<?=$t->nama_pejabat ;?>"><?=$t->nama_pejabat ;?></option>

                                  <?php endwhile;?>

                                </select>

                          </div>



                          <div class="column-half">

                            <label class="control-label" for="nip_ygmenyerahkan">NIP Yang Menyerahkan</label>

                            <select class="form-control" name="nip_ygmenyerahkan" id="nip_ygmenyerahkan_input" required>

                                  <option><?= $nip_ygmenyerahkan ?></option>

                            </select>

                          </div>



                          <div class="column-half">

                            <label class="control-label" for="nip_ygmenerima">NIP Yang Menerima</label>

                            <select class="form-control" name="nip_ygmenerima" id="nip_ygmenerima_input" required>

                                  <option value="19810411 200501 2 001">19810411 200501 2 001</option>

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


          



<?php
}
?>


<script>

$(document).ready(function(e){
  
  $("#form_input_penyerahan_sampel_pengujian_kh").on("submit", (function(e){

       e.preventDefault();

       $.ajax({

         url :'lab_bakteri/models/proses_input_penyerahan_sampel_kh.php',

         type :'POST',

         data : new FormData (this),

         contentType : false,

         cache : false,

         processData : false,

         success : function(){

          $('#tb_penyerahan_sampel_kh').DataTable().ajax.reload(null, false),

            swal({

              title: "Sukses",

              text: "Data Berhasil Di Input",

              type: "success"

          }).then(function(){

              $('#modal_input_penyerahan_sampel_kh').modal('hide')

          });
         }  
       });

     }));

    $( "#yang_menyerahkan_input" ).on('change', function () {
        let pejabatID = $(this).val();

            $.get({
                url: "lab_bakteri/views/data_kh/SourceDataPemohon_kh.php",
                dataType: 'Json',
                data: {'id':pejabatID},
                success: function(data) {
                    $('#nip_ygmenyerahkan_input').empty();
                    $.each(data, function(key, value) {
                        $('#nip_ygmenyerahkan_input').append('<option>'+ value +'</option>');
                  });
                }
            });

      });

      $( "#yang_menerima_input" ).on('change', function () {
        let pejabatID = $(this).val();

            $.get({
                url: "lab_bakteri/views/data_kh/SourceDataPemohon_kh.php",
                dataType: 'Json',
                data: {'id':pejabatID},
                success: function(data) {
                    $('#nip_ygmenerima_input').empty();
                    $.each(data, function(key, value) {
                        $('#nip_ygmenerima_input').append('<option>'+ value +'</option>');
                  });
                }
            });

      });


 });

</script>






