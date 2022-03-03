<?php

include_once('header_edit.php');

if(isset($_REQUEST['id'])){

    $id = intval($_REQUEST['id']);

    $d = date("m/Y");

    $tgl_indo = $objectTanggal->tgl_indo(date('Y-m-d'));

    $bln = date('m');

    $thn = date('Y');

    $tampil = $objectDataParasit->tampil($id);

    $checkScan = $objectPrintParasit->Scan($id);

    while($data = $tampil->fetch_object()):

      $id                   = $data->id;

      $nama_sampel          = $data->nama_sampel;

      $nama_sampel_lab       = $data->nama_sampel_lab;

      $kode_sampel          = $data->kode_sampel;

      $no_sampel            = $data->no_sampel;

      $tanggal_penunjukan   = $data->tanggal_penunjukan;

      $lab_penguji          = $data->lab_penguji;

      $no_sampel            =$data->no_sampel;

      $yang_menyerahkanlab    =$data->yang_menyerahkanlab;

      $yang_menerimalab       =$data->yang_menerimalab;

      $nip_yang_menyerahkanlab  =$data->nip_yang_menyerahkanlab;

      $nip_yang_menerimalab   =$data->nip_yang_menerimalab;

      $anls                 = $data->nama_analis;

      $penerima = $data->penerima_sampel;



      if ($anls == 'drh. Priono') {

          $nip = '19810224 201101 1 008';

      }elseif ($anls == 'drh. I Gede Wira Adipredana') {

          $nip = '19851108 201403 1 002';

      }elseif ($anls == 'Siska Murtini, A.Md') {

          $nip = '19830608 201101 2 010';

      }elseif ($anls == 'Sari Rosmawati') {

          $nip = '19810411 200501 2 001';

      }elseif ($anls == 'Darsiah') {

          $nip = '19830910 200501 2 001';

      }elseif ($anls == 'Musallamatun') {

          $nip = '19781124 200501 2 001';

      }


endwhile;

/*Scan TTD*/

$ttd_yang_menyerahkan_pengelola_sampel = 

$checkScan["ttd_yang_menyerahkan_pengelola_sampel"];

$ttd_yang_menerima_pengelola_sampel = 

$checkScan["ttd_yang_menerima_pengelola_sampel"];




?>

            <div class="modal-content">

               <div class="modal-header">

                  <button type="button" class="close" data-dismiss="modal">&times;</button>

                  <h4 class="modal-title"><i class="fa fa-gear fa-fw"></i>Edit Data Distribusi Sampel</h4>

                </div>


            <form id="form_edit_pengelola_sampel_kh">

              <div class="modal-body" id="modal-edit">

                <div id="responsive-form" class="clearfix">


                        <div class="column-half">

                          <label class="control-label" for="kode_sampel">Kode Sampel</label>

                          <input type="hidden" name="id" id="id_input" value="<?=$id;?>">

                          <input type="text" class="form-control" name="kode_sampel" id="kode_sampel_input" value="<?=$kode_sampel;?>" disabled>

                        </div>

                        <div class="column-half">

                          <label class="control-label" for="lab_penguji">Laboratorium Penguji</label>

                          <input type="text" class="form-control" name="lab_penguji" id="lab_penguji_input" value="<?=$lab_penguji;?>" disabled>

                        </div>



                        <div class="column-half">

                          <label class="control-label" for="nama_sampel">Nama Sampel</label>

                          <input type="text" class="form-control" name="nama_sampel" id="nama_sampel_input" value="<?=$nama_sampel;?>" disabled>

                        </div>

                        <div class="column-half">

                          <label class="control-label" for="no_sampel">Nomor Sampel</label>

                          <input type="text" class="form-control" name="no_sampel" id="no_sampel_input" value="<?=$no_sampel;?>" required> 

                        </div>    



                        <div class="column-half">

                          <label class="control-label" for="yang_menyerahkanlab">Yang Menyerahkan</label>

                          <select class="form-control" name="yang_menyerahkanlab" id="yang_menyerahkanlab_input" required> 

                            <option><?=$yang_menyerahkanlab; ?></option>

                              <?php 

                                $i = $objectDataParasit->tampil_jabfung();

                                while ($t=$i->fetch_object()) : ?>

                                  <option><?=$t->nama_pejabat ;?></option>

                              <?php endwhile;?>

                          </select>

                        </div>    



                        <div class="column-half">

                          <label class="control-label" for="yang_menerimalab">Yang Menerima</label>

                           <select class="form-control" name="yang_menerimalab" id="yang_menerimalab_input" required> 

                            <option><?=$yang_menerimalab; ?></option>

                              <?php 

                                $i = $objectDataParasit->tampil_jabfung();

                                while ($t=$i->fetch_object()) : ?>

                                <option><?=$t->nama_pejabat ;?></option>

                              <?php endwhile;?>

                          </select>

                        </div>



                        <div class="column-half">

                            <label class="control-label" for="nip_yang_menyerahkanlab">NIP Yang Menyerahkan</label>

                              <select class="form-control" name="nip_yang_menyerahkanlab" id="nip_yang_menyerahkanlab_input" required>

                                <option><?=$nip_yang_menyerahkanlab; ?></option>

                              </select>

                          </div>



                          <div class="column-half">

                            <label class="control-label" for="nip_yang_menerimalab">NIP Yang Menerima</label>

                              <select class="form-control" name="nip_yang_menerimalab" id="nip_yang_menerimalab_input" required>

                                    <option><?=$nip_yang_menerimalab; ?></option>

                              </select>

                          </div>

                          <div class="column-half">

                            <label>Scan Tanda Tangan Yang Menyerahkan</label>

                            <br>

                              <?php 

                                if ($ttd_yang_menyerahkan_pengelola_sampel == "Ya") { ?>

                                  <label class="checkbox-inline">
                                    <input type="checkbox" name="ttd_yang_menyerahkan_pengelola_sampel" checked value="Ya">Ya
                                  </label>

                                  <label class="checkbox-inline">
                                    <input type="checkbox" name="ttd_yang_menyerahkan_pengelola_sampel" value="Tidak">Tidak
                                  </label>


                              <?php  }else{ ?>

                                  <label class="checkbox-inline">
                                    <input type="checkbox" name="ttd_yang_menyerahkan_pengelola_sampel" value="Ya">Ya
                                  </label>

                                  <label class="checkbox-inline">
                                    <input type="checkbox" name="ttd_yang_menyerahkan_pengelola_sampel" checked value="Tidak">Tidak
                                  </label>


                             <?php }

                              ?>
                              
                          </div>


                          <div class="column-half">

                            <label>Scan Tanda Tangan Yang Menerima</label>

                            <br>

                              <?php 

                                if ($ttd_yang_menerima_pengelola_sampel == "Ya") { ?>

                                  <label class="checkbox-inline">
                                    <input type="checkbox" name="ttd_yang_menerima_pengelola_sampel" checked value="Ya">Ya
                                  </label>

                                  <label class="checkbox-inline">
                                    <input type="checkbox" name="ttd_yang_menerima_pengelola_sampel" value="Tidak">Tidak
                                  </label>


                              <?php  }else{ ?>

                                  <label class="checkbox-inline">
                                    <input type="checkbox" name="ttd_yang_menerima_pengelola_sampel" value="Ya">Ya
                                  </label>

                                  <label class="checkbox-inline">
                                    <input type="checkbox" name="ttd_yang_menerima_pengelola_sampel" checked value="Tidak">Tidak
                                  </label>


                             <?php }

                              ?>
                              
                          </div>

                          

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


 
<?php
}

?>

<script>

  $(document).ready(function(e){
    
    $("#form_edit_pengelola_sampel_kh").on("submit", (function(e){

         e.preventDefault();

         $.ajax({

           url :'lab_parasit/models/proses_editdata_pengelola_sampel_kh.php',

           type :'POST',

           data : new FormData (this),

           contentType : false,

           cache : false,

           processData : false,

           success : function(data){


                $('#tb_pengelola_sampel_kh_lab_parasit').DataTable().ajax.reload(null, false),

                swal({

                  title: "Sukses",

                  text: "Data Berhasil Di Input",

                  type: "success"

              }).then(function(){

                  $('#modal_edit_pengelola_sampel_kh').modal('hide')

              });

           }  
         })

      }));

      $( "#yang_menyerahkanlab_input" ).on('change', function () {
        let pejabatID = $(this).val();

            $.get({
                url: "lab_parasit/views/data_kh/SourceDataPemohon_kh.php",
                dataType: 'Json',
                data: {'id':pejabatID},
                success: function(data) {
                    $('#nip_yang_menyerahkanlab_input').empty();
                    $.each(data, function(key, value) {
                        $('#nip_yang_menyerahkanlab_input').append('<option>'+ value +'</option>');
                  });
                }
            });

      });

      $( "#yang_menerimalab_input" ).on('change', function () {
        let pejabatID = $(this).val();

            $.get({
                url: "lab_parasit/views/data_kh/SourceDataPemohon_kh.php",
                dataType: 'Json',
                data: {'id':pejabatID},
                success: function(data) {
                    $('#nip_yang_menerimalab_input').empty();
                    $.each(data, function(key, value) {
                        $('#nip_yang_menerimalab_input').append('<option>'+ value +'</option>');
                  });
                }
            });

      });

   });

</script>







