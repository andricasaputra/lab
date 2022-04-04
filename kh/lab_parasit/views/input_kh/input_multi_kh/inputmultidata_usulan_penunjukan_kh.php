<?php

include_once('../header_input.php');

$d=date("m/Y");

$i = date('Y-m-d');

$tgl_indo = $objectTanggal->tgl_indo($i);

$hari = $objectTanggal->hari($i);

$bln = date('m');

$thn = date('Y');

$bulan = $objectTanggal->bulan(date("m"));

$lastData = $objectDataParasit->infoPenunjukanPetugas("1");

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

/*No Surat Tugas Multiple*/

$hitungNomorKosong = $objectDataParasit->infoPenunjukanPetugas("hitung");/*Return Numrows*/

$getID = $objectDataParasit->infoPenunjukanPetugas("getid");/*Return IDs*/

$getNomor = $objectDataParasit->infoPenunjukanPetugas("select"); /*Return Max No Surat Tugas*/

if ($getNomor->num_rows != 0) {


 while ($dataNoSuratTugas = $getNomor->fetch_object()) :

  $no_surat_tugas = $dataNoSuratTugas->no_surat_tugas;

  $NoSuratTugas = explode("/", $no_surat_tugas);

  $NoSuratTugas = $NoSuratTugas[0] ;

  $check = preg_match("/[a-z]/i", $NoSuratTugas);

  if ($check) {

    $checkpanjang = strlen($NoSuratTugas);

    $removealpha = substr($NoSuratTugas, $checkpanjang - 1);

    if (!empty($removealpha)) {

      $getAngka = str_replace($removealpha, "", $NoSuratTugas);

      $No = intval($getAngka);

    }else{

      $No = intval($NoSuratTugas);

    }

    
  }else{

    $No = intval($NoSuratTugas);
  }

endwhile;
  

}else{


  $No = 0;

}


$arrid =  array();

while ($dataid = $getID->fetch_object()) :

  $ids = $dataid->id; 

  $arrid[] = $ids;

endwhile;

$arrNo = array();

for ($i = $No + 1 ; $i < $No + 1 + $hitungNomorKosong ; $i++) :

  $arrNo[] = $i."/LKH/K.50.D/$bln/$thn";

endfor;


?>


           
<!--Input data-->   

<div class="modal-content">

   <div class="modal-header">

      <button type="button" class="close" data-dismiss="modal">&times;</button>

      <h4 class="modal-title"><i class="fa fa-gear fa-fw"></i>Input Multiple Data Usulan Penunjukan Penyelia dan Analis Pengujian</h4>

   </div>

  <form id="form_input_multi_penyelia_analis_kh">

   <div class="modal-body" id="modal-edit_kh">

    <div id="responsive-form" class="clearfix">

          <div class="column-full">

            <label class="control-label" for="no_surat_tugas">Nomor Surat Tugas</label>

            <?php  

              foreach ($arrNo as $nosurat) :
              ?>
                                  
                 <input type="text" class="form-control" name="no_surat_tugas[]" id="no_surat_tugas_input" value="<?=$nosurat;?>" required style="margin-bottom: 10px"> 

            <?php  endforeach;?>

          </div>

          <div class="column-half">

            <?php  
              foreach ($arrid as $id) :?>

                <input type="hidden" name="id[]" id="id" value="<?=$id;?>">

             <?php endforeach; ?>

            <label class="control-label" for="tanggal_penunjukan">Tanggal Penunjukan</label>

            <input type="hidden" name="hari" id="hari_input" value="<?=$hari?>">

            <input type="hidden" name="bulan" id="bulan_input" value="<?=$bulan?>">

            <input type="hidden" name="tahun" id="tahun_input" value="<?=$thn?>">

            <input type="text" class="form-control" name="tanggal_penunjukan" id="tanggal_penunjukan_input" value="<?=$tgl_indo?>" required>

          </div>



          <div class="column-half">

            <label class="control-label" for="lab_penguji">Laboratorium Penguji</label>

            <select class="form-control" name="lab_penguji" id="lab_penguji_input" required>

              <option></option>

              <option>Bakteriologi</option>

              <option selected>Parasitologi</option>

            </select>

          </div>



          <div class="column-half">

            <label class="control-label" for="nama_penyelia">Penyelia</label>

            <select class="form-control" name="nama_penyelia" id="nama_penyelia_input" required> 
              
            <?php 
              
                  $i = $objectPejabat->index();

                  while ($t=$i->fetch_object()) : 

                    if ($t->nama_pejabat == 'drh. Ardiyanto Chandra Wijaya') : ?>

                    <option selected><?=$t->nama_pejabat ;?></option>

                    <?php else: ?>

                    <option><?=$t->nama_pejabat ;?></option>

                    <?php endif; 

                   endwhile;?>
            </select>

          </div>



          <div class="column-half">

            <label class="control-label" for="nama_analis">Analis</label>

             <select class="form-control" name="nama_analis" id="nama_analis_input" required> 

              <option></option>

                <?php 

                  $i = $objectDataParasit->tampil_jabfung();

                 while ($t=$i->fetch_object()) : 

                    if ($t->nama_pejabat == 'Siska Murtini, A.Md') : ?>

                    <option selected><?=$t->nama_pejabat ;?></option>

                    <?php else: ?>

                    <option><?=$t->nama_pejabat ;?></option>

                    <?php endif; 

                endwhile;?>

            </select>

          </div>





          <div class="column-half">

            <label class="control-label" for="jab_penyelia">Jabatan Penyelia</label>

            <select class="form-control" name="jab_penyelia" id="jab_penyelia_input" required> 

              <?php 
              
                  $i = $objectPejabat->index();

                  while ($t=$i->fetch_object()) : 

                    if ($t->nama_pejabat == 'drh. Ardiyanto Chandra Wijaya') : ?>

                    <option selected><?=$t->jabfung ;?></option>

                    <?php else: ?>

                    <option><?=$t->jabfung ;?></option>

                    <?php endif; 

                   endwhile;?>

            </select>

          </div>



          <div class="column-half">

              <label class="control-label" for="jab_analis">Jabatan Analis</label>

              <select class="form-control" name="jab_analis" id="jab_analis_input" required> 

                <?php 
              
                  $i = $objectPejabat->index();

                  while ($t=$i->fetch_object()) : 

                    if ($t->nama_pejabat == 'Siska Murtini, A.Md') : ?>

                    <option selected><?=$t->jabfung ;?></option>

                    <?php else: ?>

                    <option><?=$t->jabfung ;?></option>

                    <?php endif; 

                   endwhile;?>


              </select>

            </div>





            <div class="column-half">

               <label class="control-label" for="mt">Ketua Pokja KH</label>

                <select class="form-control" name="mt" id="mt_input" required>

                  <option></option>

                    <?php 

                      $i = $objectDataParasit->tampil_pejabat();

                        while ($t=$i->fetch_object()) : 

                        if ($t->nama_pejabat == 'drh. Priono') : ?>

                        <option selected><?=$t->nama_pejabat ;?></option>

                        <?php else: ?>

                        <option><?=$t->nama_pejabat ;?></option>

                      <?php endif; 

                   endwhile;?>

                  </select>

               </div>



              <div class="column-half">

                <label class="control-label" for="nip_mt">NIP</label>

                  <select class="form-control" name="nip_mt" id="nip_mt_input" required>

                    <option>19810224 201101 1 008</option>

                  </select>

              </div>

            </div>

              <div class="modal-footer" >

                <div class="column-full button-bawah">

                  <button type="submit" class="btn-default2 btn-success" name="edit" value="edit"><i class="fa fa-check-circle fa-fw" aria-hidden="true"></i>&nbsp;Simpan Multiple</button> 

                </div>      

              </div>
         </div>
      </form>
  </div> 


<script>

  $(document).ready(function(e){
    
    $("#form_input_multi_penyelia_analis_kh").on("submit", (function(e){

         e.preventDefault();

         $.ajax({

           url :'lab_parasit/models/input_multi/proses_input_multi_penunjukan_penyelia_analis_kh.php',

           type :'POST',

           data : new FormData (this),

           contentType : false,

           cache : false,

           processData : false,

           success : function(response){

            console.log(response);

            if (response != 'nodata') {

              $('#tb_usulan_penunjukan_kh_lab_parasit').DataTable().ajax.reload(null, false),

                swal({

                  title: "Sukses",

                  text: "Data Berhasil Di Input",

                  type: "success"

                }).then(function(){

                    $('#modal_input_multi_usulan_penunjukan_kh').modal('hide')

                });

            }else{


                $('#tb_usulan_penunjukan_kh_lab_parasit').DataTable().ajax.reload(null, false),

                swal({

                  title: "Perhatian",

                  text: "Tidak Ada Data Untuk Diinput!",

                  type: "error"

                }).then(function(){

                    $('#modal_input_multi_usulan_penunjukan_kh').modal('hide')

                });

            }/*Endif*/
           }  
         })

      }));

      $( "#nama_penyelia_input" ).on('change', function () {
        let pejabatID = $(this).val();
            $.get({
                url: "lab_parasit/views/data_kh/SourceDataJabatan_kh.php",
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
                url: "lab_parasit/views/data_kh/SourceDataJabatan_kh.php",
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
                url: "lab_parasit/views/data_kh/SourceDataPemohon_kh.php",
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


   });

</script>







