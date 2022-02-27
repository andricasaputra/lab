<?php

include_once('../header_input.php');

$bln=date('m');

$thn=date('Y');

require_once($basepath.'/src/classes/kt/kode_sampel.php');

$d=date("m/Y");

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

                  <h4 class="modal-title"><i class="fa fa-gear fa-fw"></i>Input Multiple  Penyerahan Sampel Pengujian</h4>

               </div>



            <form id="form_input_multi_penyerahan_sampel_pengujian">

              <div class="modal-body" id="modal-edit">

                <div id="responsive-form" class="clearfix">

                          <div class="column-full">

                           <label class="control-label" for="kode_sampel">Kode Sampel</label>

                           <?php  
                            foreach ($arrid as $id) :?>

                              <input type="hidden" name="id[]" id="id" value="<?=$id;?>">

                           <?php endforeach; ?>

                           <?php foreach ($out as $final) :

                            if(strlen($final[2]) == 1){

                            $format2 = "000".$final[2]."/KT/".$bln."/".$thn;

                            }elseif (strlen($final[2]) == 2) {

                            $format2 = "00".$final[2]."/KT/".$bln."/".$thn;

                            }elseif (strlen($final[2]) == 3) {

                            $format2 = "0".$final[2]."/KT/".$bln."/".$thn;

                            }else{

                            $format2 = $final[2]."/KT/".$bln."/".$thn;

                            }

                            ?>

                              <input type="text" name="kode_sampel[]" class="form-control" id="kode_sampel_input" value="<?=$format2;?>" style="margin-bottom: 10px">
                              

                          <?php  endforeach; ?>

                          </div>


                          <input type="hidden" name="tanggal_penyerahan"  id="tanggal_penyerahan_input" value="<?=$tgl_indo?>" required>



                          <div class="column-half">

                             <label class="control-label" for="yang_menyerahkan">Yang Menyerahkan</label>

                             <select class="form-control" name="yang_menyerahkan" id="yang_menyerahkan_input" required>

                                <option>Tri Suparyanto, A.Md</option>

                                  <?php 

                                    $i = $objectData->tampil_pejabat();

                                    while ($t=$i->fetch_object()) : 

                                        echo '<option value="'.$t->nama_pejabat.'">'.$t->nama_pejabat.'</option>';

                                    endwhile;

                                    ?>


                                </select>

                          </div>



                          <div class="column-half">

                             <label class="control-label" for="yang_menerima">Yang Menerima</label>

                             <select class="form-control" name="yang_menerima" id="yang_menerima_input" required>

                              <option>Andrica Ismi Eka Saputra</option>


                                  <?php 

                                    $i = $objectData->tampil_pejabat();

                                    while ($t=$i->fetch_object()) : 

                                        echo '<option value="'.$t->nama_pejabat.'">'.$t->nama_pejabat.'</option>';

                                    endwhile;

                                    ?>


                                </select>

                          </div>



                          <div class="column-half">

                            <label class="control-label" for="nip_ygmenyerahkan">NIP Yang Menyerahkan</label>

                            <select class="form-control" name="nip_ygmenyerahkan" id="nip_ygmenyerahkan_input" required>

                              <option>19861015 201503 1 001</option>
 
                            </select>

                          </div>



                          <div class="column-half">

                            <label class="control-label" for="nip_ygmenerima">NIP Yang Menerima</label>

                            <select class="form-control" name="nip_ygmenerima" id="nip_ygmenerima_input" required>

                              <option>19940110 201403 1 001</option>


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
  
  $("#form_input_multi_penyerahan_sampel_pengujian").on("submit", (function(e){

       e.preventDefault();

       $.ajax({

         url :'models/input_multi/proses_input_multi_penyerahan_sampel.php',

         type :'POST',

         data : new FormData (this),

         contentType : false,

         cache : false,

         processData : false,

         success : function(response){

          if (response == 'false') {

                swal({

                    title: "",

                    text: "Kode Sampel Sudah Pernah Dipakai",

                    type: "info"

                });
            
            }else{

                $('#tb_penyerahan_sampel').DataTable().ajax.reload(null, false),

                  swal({

                    title: "Sukses",

                    text: "Data Berhasil Di Input",

                    type: "success"

                }).then(function(){

                    $('#modal_input_multi_penyerahan_sampel').modal('hide')

                });
            }

            console.log(response);
         }  
       });

     }));

  $( "#yang_menyerahkan_input" ).on('change', function () {
        let pejabatID = $(this).val();

            $.get({
                url: "views/data/SourceDataPemohon.php",
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
                url: "views/data/SourceDataPemohon.php",
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






