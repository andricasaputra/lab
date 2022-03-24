<?php

include_once('header_edit.php');

if(isset($_REQUEST['id'])){

    $id = intval($_REQUEST['id']);

    $d=date("m/Y");

    $tampil = $objectData->tampil($id);

    while($data = $tampil->fetch_object()):

      $id                   = $data->id;

      $nama_sampel          = $data->nama_sampel;

      $kode_sampel          = $data->kode_sampel;

      $no_sampel            = $data->no_sampel;

      $tanggal_penunjukan   = $data->tanggal_penunjukan;

      $lab_penguji          = $data->lab_penguji;

      $nama_penyelia        = $data->nama_penyelia;

      $nama_analis          = $data->nama_analis;

      $nama_analis2 = '';

      if (strpos($nama_analis, "&") != false) {
        
        $x = explode("&", $nama_analis);

        $nama_analis = $x[0];

        $nama_analis2 = $x[1];

      }

      $jab_penyelia         = $data->jab_penyelia;

      $jab_analis           = $data->jab_analis;

      $jab_analis2 = '';

      if (strpos($jab_analis, "&") != false) {
        
        $x = explode("&", $jab_analis);

        $jab_analis = $x[0];

        $jab_analis2 = $x[1];

      }

      $hari                 = $data->hari;

      $bulan                = $data->bulan;

      $tahun                = $data->tahun;

      $no_surat_tugas       = $data->no_surat_tugas;

      $mt                   = $data->mt;

      $nip_mt               = $data->nip_mt;




endwhile;

?>


           
<!--Input data-->   

<div class="modal-content">

   <div class="modal-header">

      <button type="button" class="close" data-dismiss="modal">&times;</button>

      <h4 class="modal-title"><i class="fa fa-gear fa-fw"></i>Data Usulan Penunjukan Penyelia dan Analis Pengujian</h4>

   </div>

  <form id="form_input_penyelia_analis_kh">

   <div class="modal-body" id="modal-edit_kh">

    <div id="responsive-form" class="clearfix">

          <div class="column-half">

            <label class="control-label" for="nama_sampel">Nama Sampel</label>

            <input type="text" class="form-control" name="nama_sampel" id="nama_sampel_input" value="<?=$nama_sampel?>" disabled>

          </div>


              <?php 

                            $i = date('Y-m-d');

                            $tgl_indo = $objectTanggal->tgl_indo($i);

                            $hari = $objectTanggal->hari($i);

                            $bln = date('m');

                            $thn = date('Y');

                            $bulan = $objectTanggal->bulan(date("m"));


                            /*Jika Data kosong (mungkin awal tahun)*/
                            $kosong = $objectNomor->Kosongdata();

                            while($ini = $kosong->fetch_object()):

                              $isi = $ini->id;

                              $n = $ini->no_surat_tugas;

                            endwhile;

                            /*Set mas id yang nomor surat tugasnya tidak kosong*/

                            $setno = $objectNomor->set_maxno();
                            while ($ambl = $setno->fetch_object()) {
                              $hasil = $ambl->Maxid;
                            }
                            

                            /*Get nomor surat tugas sesuai id yang di set/ diambil diatas*/
                            if (!empty($isi)) {

                                $maxNo = $objectNomor->max_no($hasil);

                                while($isi = $maxNo->fetch_object()):

                                $isiNo = $isi->Maxid;

                                endwhile;

                                $maxnomor = $objectNomor->max_nomor($isiNo);

                                $isi2 = $maxnomor->fetch_object();

                                $isiNomor = (int)$isi2->no_surat_tugas + 1;

                            }

 

                    ?>

   

          <div class="column-half">

            <label class="control-label" for="tanggal_penunjukan">Tanggal Penunjukan</label>

            <input type="hidden" name="id" id="id_input" value="<?=$id;?>">

            <input type="hidden" name="hari" id="hari_input" value="<?=$hari?>">

            <input type="hidden" name="bulan" id="bulan_input" value="<?=$bulan?>">

            <input type="hidden" name="tahun" id="tahun_input" value="<?=$thn?>">

            <input type="text" class="form-control" name="tanggal_penunjukan" id="tanggal_penunjukan_input" value="<?=$tgl_indo?>" required>

          </div>



          <div class="column-half">

            <label class="control-label" for="no_surat_tugas">Nomor Surat Tugas</label>

            <input type="text" class="form-control" name="no_surat_tugas" id="no_surat_tugas_input" value="<?=$no_surat_tugas?>" required> 

          </div>



          <div class="column-half">

            <label class="control-label" for="lab_penguji">Laboratorium Penguji</label>

            <select class="form-control" name="lab_penguji" id="lab_penguji_input">

              <option><?php echo $lab_penguji; ?></option>

              <option>Bakteriologi</option>

              <option>Parasitologi</option>

            </select>

          </div>



          <div class="column-half">

            <label class="control-label" for="nama_penyelia">Penyelia</label>

            <select class="form-control" name="nama_penyelia" id="nama_penyelia_input" required> 

                <option><?= $nama_penyelia; ?></option>

                
               <?php 
              
                  $i = $objectPejabat->index();

                  while ($t=$i->fetch_object()) : ?>

                    <option><?=$t->nama_pejabat ;?></option>

                   <?php endwhile;?>
            </select>

          </div>



          <div class="column-half">

            <label class="control-label" for="nama_analis">Analis</label>

             <select class="form-control" name="nama_analis" id="nama_analis_input" required> 

              <option><?= $nama_analis; ?></option>

                <?php 

                  $i = $objectPejabat->index();

                 while ($t=$i->fetch_object()) : ?>


                    <option><?=$t->nama_pejabat ;?></option>


               <?php endwhile;?>

            </select>

          </div>


          <div class="column-half">

            <label class="control-label" for="jab_penyelia">Jabatan Penyelia</label>

            <select class="form-control" name="jab_penyelia" id="jab_penyelia_input" required> 

              <option><?= $jab_penyelia; ?></option>

            </select>

          </div>



            <div class="column-half">

              <label class="control-label" for="jab_analis">Jabatan Analis</label>

              <select class="form-control" name="jab_analis" id="jab_analis_input" required> 

                <option><?=$jab_analis; ?></option>


              </select>

            </div>

            <div id="showAnalis2">

            <?php  

              if ($nama_analis2 != '') { ?>

                


                <div class="column-full">

                  <label class="control-label" for="nama_analis">Analis 2</label>

                   <select class="form-control" name="nama_analis2" id="nama_analis2" required> 

                    <option><?= $nama_analis2; ?></option>

                      <?php 

                        $i = $objectData->tampil_jabfung();

                       while ($t=$i->fetch_object()) : ?>


                        <option><?=$t->nama_pejabat ;?></option>


                    <?php endwhile;?>

                  </select>

                </div>

                <div class="column-full">

                  <label class="control-label" for="jab_analis2">Jabatan Analis 2</label>

                  <select class="form-control" name="jab_analis2" id="jab_analis2" required> 

                    <option><?=$jab_analis2; ?></option>


                  </select>

                </div>

                


            <?php  } ?>

          </div><!-- For Show Analis 2 -->

            <div class="column-half">

               <label class="control-label" for="mt">Ketua Pokja KH</label>

                <select class="form-control" name="mt" id="mt_input" required>

                  <option><?= $mt; ?></option>

                    <?php 

                      $i = $objectData->tampil_pejabat();

                        while ($t=$i->fetch_object()) : ?>


                        <option><?=$t->nama_pejabat ;?></option>


                   <?php endwhile;?>

                   endwhile;?>

                  </select>

               </div>



              <div class="column-half">

                <label class="control-label" for="nip_mt">NIP</label>

                  <select class="form-control" name="nip_mt" id="nip_mt_input" required>

                    <option><?=$nip_mt; ?></option>

                  </select>

              </div>

              <div class="column-half">

                  <label>

                   <?php if ($nama_analis2 != '') { ?>

                    <input type="checkbox" name="tombolanalis2" id="tombolanalis2" checked>
                    &nbsp; Tugaskan Analis Ke 2

                   <?php  } else { ?>

                    <input type="checkbox" name="tombolanalis2" id="tombolanalis2">
                    &nbsp; Tugaskan Analis Ke 2

                  <?php } ?>

                  </label>
                  
              </div>

            </div>

              <div class="modal-footer" >

                <div class="column-full button-bawah">

                  <button type="submit" class="btn-default2 btn-success" name="edit" value="edit"><i class="fa fa-check-circle fa-fw" aria-hidden="true"></i>&nbsp;Simpan</button> 

                </div>      

              </div>
         </div>
      </form>
  </div> 



<?php
}

?>

<script>

  $(document).ready(function(e){
    
    $("#form_input_penyelia_analis_kh").on("submit", (function(e){

         e.preventDefault();

         $.ajax({

           url :'lab_bakteri/models/proses_editdata_penunjukan_penyelia_analis_kh.php',

           type :'POST',

           data : new FormData (this),

           contentType : false,

           cache : false,

           processData : false,

           success : function(response){

            console.log(response);

            if (response == 'false') {

              swal({

                    title: "",

                    text: "Nomor Surat tugas Sudah Pernah Dipakai",

                    type: "info"

                });

            }else{


                $('#tb_usulan_penunjukan_kh').DataTable().ajax.reload(null, false),

                swal({

                  title: "Sukses",

                  text: "Data Berhasil Di Input",

                  type: "success"

              }).then(function(){

                  $('#modal_edit_usulan_penunjukan_kh').modal('hide')

              });

            }
           }  
         })

      }));

      $( "#nama_penyelia_input" ).on('change', function () {
        let pejabatID = $(this).val();
            $.get({
                url: "lab_bakteri/views/data_kh/SourceDataJabatan_kh.php",
                dataType: 'Json',
                data: {'id':pejabatID},
                success: function(data) {
                    $('#jab_penyelia_input').empty();
                    $.each(data, function(key, value) {
                        $('#jab_penyelia_input').append('<option>'+ value +'</option>');
                  });
                }
            });

      });

      $( "#nama_analis_input" ).on('change', function () {
        let pejabatID = $(this).val();

            $.get({
                url: "lab_bakteri/views/data_kh/SourceDataJabatan_kh.php",
                dataType: 'Json',
                data: {'id':pejabatID},
                success: function(data) {
                    $('#jab_analis_input').empty();
                    $.each(data, function(key, value) {
                        $('#jab_analis_input').append('<option>'+ value +'</option>');
                  });
                }
            });

      });

      $( "#mt_input" ).on('change', function () {
        let pejabatID = $(this).val();

            $.get({
                url: "lab_bakteri/views/data_kh/SourceDataPemohon_kh.php",
                dataType: 'Json',
                data: {'id':pejabatID},
                success: function(data) {
                    $('#nip_mt_input').empty();
                    $.each(data, function(key, value) {
                        $('#nip_mt_input').append('<option>'+ value +'</option>');
                  });
                }
            });

      });

      $( "#tombolanalis2" ).on('change', function () {

         /*Jika Dicentang*/

        if ($(this).is(":checked")) {

            $('#showAnalis2').html(

                '<div class="column-full">'+

                '<label class="control-label" for="nama_analis2">Analis 2</label>'+

                 '<select class="form-control" name="nama_analis2" id="nama_analis2" required>' +

                  '<option> <?= $nama_analis2; ?>  </option>'+

                      <?php 

                        $i = $objectData->tampil_jabfung();

                       while ($t=$i->fetch_object()) : ?>


                        '<option> <?=$t->nama_pejabat ;?> </option>'+


                    <?php endwhile;?>

                '</select>'+

              '</div>'+


              '<div class="column-full">'+

                '<label class="control-label" for="jab_analis2">Jabatan Analis 2</label>'+

                '<select class="form-control" name="jab_analis2" id="jab_analis2" required>' +

                  '<option> <?=$jab_analis; ?> </option>'+


                '</select>'+

              '</div>'

            );

            $('#nama_analis2').change(function () {

              let pejabatID = $(this).val();

                $.get({
                    url: "lab_bakteri/views/data_kh/SourceDataJabatan_kh.php",
                    dataType: 'Json',
                    data: {'id':pejabatID},
                    success: function(data) {
                        $('#jab_analis2').empty();
                        $.each(data, function(key, value) {
                            $('#jab_analis2').append('<option>'+ value +'</option>');
                      });
                    }
                });

            });

        /*Jika Tidak Dicentang*/

        }else{

            $('#showAnalis2').empty();
        }


      });


   });

</script>







