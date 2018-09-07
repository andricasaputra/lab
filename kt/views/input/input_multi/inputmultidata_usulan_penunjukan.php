<?php

include_once('../header_input.php');

$d=date("m/Y");

$i = date('Y-m-d');

$tgl_indo = $objectTanggal->tgl_indo($i);

$hari = $objectTanggal->hari($i);

$bln = date('m');

$thn = date('Y');

$bulan = $objectTanggal->bulan(date("m"));

$lastData = $objectData->infoPenunjukanPetugas("1");

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

$hitungNomorKosong = $objectData->infoPenunjukanPetugas("hitung");/*Return Numrows*/

$getID = $objectData->infoPenunjukanPetugas("getid");/*Return IDs*/

$getNomor = $objectData->infoPenunjukanPetugas("select"); /*Return Max No Surat Tugas*/

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

  $arrid[] = [

    "id" => $dataid->id,
    "nama_patogen" => $dataid->nama_patogen,
    "nama_penyelia" => $dataid->nama_penyelia,
    "nama_analis" => $dataid->nama_analis,
    "mt" => $dataid->mt,
    "nip_mt" => $dataid->nip_mt

  ];

endwhile;

$arrNo = array();

for ($i = $No + 1 ; $i < $No + 1 + $hitungNomorKosong ; $i++) :

  $arrNo[] = $i."/LKT/L.50.D/$bln/$thn";

endfor;


?>
     
<!--Input data-->   

            <div class="modal-content">

               <div class="modal-header">

                  <button type="button" class="close" data-dismiss="modal">&times;</button>

                  <h4 class="modal-title"><i class="fa fa-gear fa-fw"></i>Input Multiple Data Usulan Penunjukan Penyelia dan Analis Pengujian</h4>

               </div>


              <form id="form_input_multi_penyelia_analis">

               <div class="modal-body" id="modal-edit">

                <div id="responsive-form" class="clearfix">

                      <div class="column-full">

                        <label class="control-label" for="no_surat_tugas">Nomor Surat Tugas</label>

                        <?php  foreach ($arrNo as $nosurat) : ?>
                                              
                             <input type="text" class="form-control" name="no_surat_tugas[]" id="no_surat_tugas_input" value="<?=$nosurat;?>" required style="margin-bottom: 10px"> 

                        <?php  endforeach;?>

                      </div>

                      <div class="column-full">
                      
                        <label class="control-label" for="tanggal_penunjukan">Tanggal Penunjukan</label>

                        <input type="hidden" name="hari" id="hari_input" value="<?=$hari;?>">

                        <input type="hidden" name="bulan" id="bulan_input" value="<?=$bulan?>">

                        <input type="hidden" name="tahun" id="tahun_input" value="<?=$thn?>">

                        <input type="text" class="form-control" name="tanggal_penunjukan" id="tanggal_penunjukan_input" value="<?=$tgl_indo; ?>" required>

                      </div>


                      <div class="column-full">

                        <label class="control-label" for="lab_penguji">Laboratorium Penguji</label>

                        <?php  foreach ($arrid as $id) :?>

                            <input type="hidden" name="id[]" id="id" value="<?=$id['id'];?>">


                            <select class="form-control" name="lab_penguji[]" id="lab_penguji_input" required style="margin-bottom: 10px">

                              <?php if ($id["nama_patogen"] == 'Cendawan' || $id["nama_patogen"] == 'Bakteri'): ?>

                                <option>Laboratorium Hama</option>

                                <option selected>Laboratorium Penyakit</option>

                                <option>Laboratorium Hama dan Penyakit</option>

                                
                              <?php elseif($id["nama_patogen"] == 'Serangga' || $id["nama_patogen"] == 'Lalat Buah' || $id["nama_patogen"] == 'Myte/Tungau'): ?>

                                <option selected>Laboratorium Hama</option>

                                <option>Laboratorium Penyakit</option>

                                <option>Laboratorium Hama dan Penyakit</option>


                              <?php else:?> 

                                <option>Laboratorium Hama</option>

                                <option>Laboratorium Penyakit</option>

                                <option selected>Laboratorium Hama dan Penyakit</option>


                              <?php endif ?>


                            </select>

                        <?php endforeach; ?>

                      </div>

                      <div class="column-half">

                        <label class="control-label" for="nama_penyelia">Penyelia</label>

                        <select class="form-control" name="nama_penyelia" id="nama_penyelia_input" required> 

                            <?php                 

                              $i = $objectData->tampil_jabatan();

                              while ($t=$i->fetch_object()) : 

                                if ($t->nama_pejabat == 'I Ketut Sindia, SP') {

                                  echo '<option value="'.$t->nama_pejabat.'" selected>'.$t->nama_pejabat.'</option>';
                                  

                                }else{


                                  echo '<option value="'.$t->nama_pejabat.'">'.$t->nama_pejabat.'</option>';

                                }

                                

                              endwhile;?>

                        </select>

                      </div>

                      <div class="column-half">

                        <label class="control-label" for="nama_analis">Analis</label>

                         <select class="form-control" name="nama_analis" id="nama_analis_input" required> 


                            <?php                 

                              $i = $objectData->tampil_jabatan();

                              while ($t=$i->fetch_object()) : 

                                if ($t->nama_pejabat == 'Fatma Dya Swari, SP') {

                                  echo '<option value="'.$t->nama_pejabat.'" selected>'.$t->nama_pejabat.'</option>';
                                  

                                }else{


                                  echo '<option value="'.$t->nama_pejabat.'">'.$t->nama_pejabat.'</option>';

                                }

                                

                              endwhile;?>


                        </select>

                      </div>


                      <div class="column-half">

                        <label class="control-label" for="jab_penyelia">Jabatan Penyelia</label>

                        <select class="form-control" name="jab_penyelia" id="jab_penyelia_input" required> 

                          <?php                 

                              $i = $objectData->tampil_jabatan();

                              while ($t=$i->fetch_object()) : 

                                if ($t->nama_pejabat == 'I Ketut Sindia, SP') {

                                  echo '<option value="'.$t->jabfung.'" selected>'.$t->jabfung.'</option>';
                                  

                                }

                                

                              endwhile;?>

                        </select>

                      </div>

                      <div class="column-half">

                          <label class="control-label" for="jab_analis">Jabatan Analis</label>

                          <select class="form-control" name="jab_analis" id="jab_analis_input" required> 

                            <?php                 

                              $i = $objectData->tampil_jabatan();

                              while ($t=$i->fetch_object()) : 

                                if ($t->nama_pejabat == 'Fatma Dya Swari, SP') {

                                  echo '<option value="'.$t->jabfung.'" selected>'.$t->jabfung.'</option>';
                                  

                                }

                                

                              endwhile;?>

                          </select>

                        </div>


                        <div class="column-half">

                           <label class="control-label" for="mt">Manajer Teknis</label>

                            <select class="form-control" name="mt" id="mt_input" required>


                                <?php                 

                                $i = $objectData->tampil_jabatan();

                                while ($t=$i->fetch_object()) : 

                                  if ($t->nama_pejabat == 'I Ketut Sindia, SP') {

                                    echo '<option value="'.$t->nama_pejabat.'" selected>'.$t->nama_pejabat.'</option>';
                                    

                                  }
                                

                              endwhile;?>

                              </select>

                          </div>

                          <div class="column-half">

                            <label class="control-label" for="nip_mt">NIP</label>

                              <select class="form-control" name="nip_mt" id="nip_mt_input" required>

                                    <?php                 

                                      $i = $objectData->tampil_jabatan();

                                      while ($t=$i->fetch_object()) : 

                                        if ($t->nama_pejabat == 'I Ketut Sindia, SP') {

                                          echo '<option value="'.$t->nip.'" selected>'.$t->nip.'</option>';
                                          

                                        }
                                      

                                    endwhile;?>

                              </select>

                          </div>

                        </div>

      

                          <div class="modal-footer" >

                            <div class="column-full button-bawah">

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
    
    $("#form_input_multi_penyelia_analis").on("submit", (function(e){

         e.preventDefault();

         $.ajax({

           url :'models/input_multi/proses_input_multi_penunjukan_penyelia_analis.php',

           type :'POST',

           data : new FormData (this),

           contentType : false,

           cache : false,

           processData : false,

           success : function(response){

            if (response == 'false') {

                swal({

                    title: "",

                    text: "Nomor Surat tugas Sudah Pernah Dipakai",

                    type: "info"

                });

                return false;

            }else{


                $('#tb_usulan_penunjukan').DataTable().ajax.reload(null, false),

                swal({

                  title: "Sukses",

                  text: "Data Berhasil Di Input",

                  type: "success"

              }).then(function(){

                  $('#modal_input_multi_usulan_penunjukan').modal('hide')

              });

              console.log(response)

            }
           }  
         })

      }));

      $( "#nama_penyelia_input" ).on('change', function () {
        let pejabatID = $(this).val();

            $.get({
                url: "views/data/SourceDataJabatan.php",
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
                url: "views/data/SourceDataJabatan.php",
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
                url: "views/data/SourceDataPemohon.php",
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







