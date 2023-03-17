<?php

include_once('../header_input.php');

$bln=date('m');

$thn=date('Y');

require_once($basepath.'/src/classes/kh/labbakteri/kode_sampel_kh.php');

$d=date("m/Y");

date_default_timezone_set("Asia/Makassar");

$waktu =  date('H:i');

$tgl_indo = $objectTanggal->tgl_indo(date('Y-m-d'));

$hitungKodeKosong = $objectData->infoPenyerahanSampel("hitung");

$getKode = $objectData->infoPenyerahanSampel("select");

$lastData = $objectData->infoPenyerahanSampel("1");

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

$arrid = array();

$arrnamaSampel = array();

$arrKode = array();

while ($dataKode = $getKode->fetch_object()) :

  $arrid[$dataKode->id] = $dataKode->id;

  $arrnamaSampel[$dataKode->id] = $dataKode->nama_sampel;

  $kode_sampel = explode("/", $format2);

  $kode_sampel = $kode_sampel[0] ;

  $check = preg_match("/[a-z]/i", $kode_sampel);

  if ($check) {

    $checkpanjang = strlen($kode_sampel);

    $removealpha = substr($kode_sampel, $checkpanjang - 1);

    if (!empty($removealpha)) {

      $getAngka = str_replace($removealpha, "", $kode_sampel);

      $kode = intval($getAngka);

    }else{

      $kode = intval($kode_sampel);

    }

    
  }else{

    $kode = intval($kode_sampel);
  }

  $count = count($arrid);

  for ($i = $kode; $i < $kode + $count ; $i++) { 
                                  
    $arrKode[$dataKode->id] = $i;
  }



endwhile;


$out = array();

foreach ($arrnamaSampel as $key => $value){

    if(!isset($arrid[$key])) { 
        $arrid[$key] = array(); 
      }

    if(!isset($arrKode[$key])) { 
        $arrKode[$key] = array(); 
      }  

    $out[] = array_merge((array)$arrid[$key],(array)$value,(array)$arrKode[$key]);
}

?>


            <div class="modal-content">

               <div class="modal-header">

                  <button type="button" class="close" data-dismiss="modal">&times;</button>

                  <h4 class="modal-title"><i class="fa fa-gear fa-fw"></i> Multiple Input Penyerahan Sampel Pengujian</h4>

               </div>



            <form id="form_input_multi_penyerahan_sampel_pengujian_kh">

              <div class="modal-body" id="modal-edit_kh">

                <div id="responsive-form" class="clearfix">

                          <div class="column-full">

                           <label class="control-label" for="kode_sampel">Kode Sampel</label>

                           <?php  
                            foreach ($arrid as $id) :?>

                              <input type="hidden" name="id[]" id="id" value="<?=$id;?>">

                           <?php endforeach; ?>

                           <?php foreach ($out as $final) :


                              if (array_search("Darah Sapi", $final) != false) {

                                $kode = $final[2]."H"."/sp/".$kodeJenis.$bln."/".$thn;

                              }elseif (array_search("Darah Sapi Bibit", $final) != false) {

                                $kode = $final[2]."H"."/spbbt/".$kodeJenis.$bln."/".$thn;

                              }elseif (array_search("Darah Kerbau", $final) != false) {

                                $kode = $final[2]."H"."/kb/".$kodeJenis.$bln."/".$thn;
                                
                              }elseif (array_search("Darah Kuda", $final) != false) {

                                $kode = $final[2]."H"."/kd/".$kodeJenis.$bln."/".$thn;
                                
                              } ?>

                              <input type="text" name="kode_sampel[]" class="form-control" id="kode_sampel_input" value="<?=$kode;?>" style="margin-bottom: 10px">
                              

                          <?php  endforeach; ?>

                          </div>


                          <input type="hidden" name="tanggal_penyerahan"  id="tanggal_penyerahan_input" value="<?=$tgl_indo?>" required>


                          <input type="hidden" name="jam_diterima_pengelola_sampel"  id="jam_diterima_pengelola_sampel_input"   value="<?php echo $waktu.' '.'wita' ?>">



                          <div class="column-half">

                             <label class="control-label" for="yang_menyerahkan">Yang Menyerahkan</label>

                             <select class="form-control" name="yang_menyerahkan" id="yang_menyerahkan_input" required>

                                  <?php 

                                    $i = $objectData->tampil_jabfung();

                                    while ($t=$i->fetch_object()) : 

                                      if ($t->nama_pejabat == 'Musallamatun') :?>
                                        <option selected><?=$t->nama_pejabat ;?></option>
                                        
                                    <?php else: ?> 

                                      <option value="<?=$t->nama_pejabat ;?>"><?=$t->nama_pejabat ;?></option>

                                    <?php  endif; endwhile;?>

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

                                    <?php  endwhile;?>

                                </select>

                          </div>



                          <div class="column-half">

                            <label class="control-label" for="nip_ygmenyerahkan">NIP Yang Menyerahkan</label>

                            <select class="form-control" name="nip_ygmenyerahkan" id="nip_ygmenyerahkan_input" required>

                                  <option>19781124 200501 2 001</option>

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

                              <button type="submit" class="btn-default2 btn-success" name="edit" value="edit"><i class="fa fa-check-circle fa-fw" aria-hidden="true"></i>&nbsp;Simpan Multiple</button> 

                            </div>      

                          </div>

                     </form>

        </div>

      </div> 



<script>

$(document).ready(function(e){
  
  $("#form_input_multi_penyerahan_sampel_pengujian_kh").on("submit", (function(e){

       e.preventDefault();

       $.ajax({

         url :'lab_bakteri/models/input_multi/proses_input_multi_penyerahan_sampel_kh.php',

         type :'POST',

         data : new FormData (this),

         contentType : false,

         cache : false,

         processData : false,

         success : function(response){

            if (response != 'nodata') {

              $('#tb_penyerahan_sampel_kh').DataTable().ajax.reload(null, false),

              swal({

                  title: "Sukses",

                  text: "Data Berhasil Di Input",

                  type: "success"

              }).then(function(){

                  $('#modal_input_multi_penyerahan_sampel_kh').modal('hide')

              });

            }else{

              $('#tb_penyerahan_sampel_kh').DataTable().ajax.reload(null, false),

              swal({

                  title: "Perhatian",

                  text: "Tidak Ada Data Untuk Diinput!",

                  type: "error"

              }).then(function(){

                  $('#modal_input_multi_penyerahan_sampel_kh').modal('hide')

              });

            }/*endif*/   

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






