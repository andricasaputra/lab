<?php

include_once('../header_input.php');

$d=date("m/Y");

$tgl_indo = $objectTanggal->tgl_indo(date('Y-m-d'));

$bln=date('m');

$thn=date('Y');

$lastData = $objectData->infoPenerimaSampel("1");

$selectedData = $objectData->infoPenerimaSampel("select");

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

$arrData = array();

while ($data = $selectedData->fetch_object()) :

  $pemohon = $data->pemohon;

$arrData[$data->id] = [

  "id" => $data->id,
  "nama_patogen" => $data->nama_patogen,
  "nama_patogen2" => $data->nama_patogen2,
  "nama_patogen3" => $data->nama_patogen3

];


endwhile;


?>
    <!--Edit Data--> 


        <div class="modal-content">

            <div class="modal-header">

              <button type="button" class="close" data-dismiss="modal">&times;</button>

              <h4 class="modal-title"><i class="fa fa-gear fa-fw"></i>Input Multiple Data Tanda Terima Sampel</h4>

            </div>

            <form id="form_input_multi_penerima_sampel">

                <div class="modal-body" id="modal-edit">

                  <div id="responsive-form" class="clearfix">

                        
                              <div class="column-full">

                                  <?php foreach($arrData as $subdata): ?>

                                  <input type="hidden" name="id[]" id="id" value="<?=$subdata['id'];?>">

                                  <?php endforeach; ?>

                                  <label class="control-label" for="lama_pengujian">Lama Pengujian</label>

                                  <?php 
                                  foreach($arrData as $subdata): 

                                    $nama_patogen = $subdata['nama_patogen'];
                                    $nama_patogen2 = $subdata['nama_patogen2'];
                                    $nama_patogen3 = $subdata['nama_patogen3'];

                                  ?>

                                  <select class="form-control" name="lama_pengujian[]" id="lama_pengujian" required style="margin-bottom: 10px">

                                    <?php if ($nama_patogen == 'Serangga' || $nama_patogen == 'Mythe/Tungau' || $nama_patogen == 'Lalat Buah') { ?>

                                      <option>1 - 35 Hari</option>

                                   <?php }else{ ?>

                                    <option>8 Hari</option>

                                    <?php } 

                                          $i = $objectData->lama_pengujian();

                                          while ($t=$i->fetch_object()) : ?>

                                          <option><?=$t->lama_pengujian ;?></option>

                                        <?php endwhile; ?>

                                      </select>

                                      <?php endforeach; ?>

                              </div>

                              <div class="column-full">

                                  <label class="control-label" for="lama_pengujian">&nbsp;</label>

                                  <?php 
                                  foreach($arrData as $subdata): 

                                    if (!empty($subdata["nama_patogen2"])) :


                                    $nama_patogen = $subdata['nama_patogen'];
                                    $nama_patogen2 = $subdata['nama_patogen2'];
                                    $nama_patogen3 = $subdata['nama_patogen3'];

                                  ?>

                                  <select class="form-control" name="lama_pengujian2[]" id="lama_pengujian2" style="margin-bottom: 10px"> 

                                    <?php if ($nama_patogen2 == 'Serangga' || $nama_patogen2 == 'Mythe/Tungau' || $nama_patogen2 == 'Lalat Buah') { ?>

                                      <option>1 - 35 Hari</option>

                                   <?php }elseif ($nama_patogen2 == 'Cendawan' || $nama_patogen2 == 'Bakteri' || $nama_patogen2 == 'Virus' || $nama_patogen2 == 'Nematoda') {?>

                                    <option>8 Hari</option>

                                    <?php } else{ ?>

                                      <option></option>

                                   <?php }

                                        $i = $objectData->lama_pengujian();

                                        while ($t=$i->fetch_object()) : ?>

                                        <option><?=$t->lama_pengujian ;?></option>

                                      <?php endwhile;?>

                                    </select>

                                     <?php else:?> <input type="hidden" name="lama_pengujian2[]" value=""> <?php endif; endforeach; ?>

                              </div>

                              <div class="column-full">

                                  <label class="control-label" for="lama_pengujian">&nbsp;</label>

                                  <?php 
                                  foreach($arrData as $subdata): 

                                    if (!empty($subdata["nama_patogen3"])) :

                                    $nama_patogen = $subdata['nama_patogen'];
                                    $nama_patogen2 = $subdata['nama_patogen2'];
                                    $nama_patogen3 = $subdata['nama_patogen3'];

                                  ?>

                                  <select class="form-control" name="lama_pengujian3[]" id="lama_pengujian3" style="margin-bottom: 10px">

                                    <?php if ($nama_patogen3 == 'Serangga' || $nama_patogen3 == 'Mythe/Tungau' || $nama_patogen3 == 'Lalat Buah') { ?>

                                      <option>1 - 35 Hari</option>

                                   <?php }elseif ($nama_patogen3 == 'Cendawan' || $nama_patogen3 == 'Bakteri' || $nama_patogen3 == 'Virus' || $nama_patogen2 == 'Nematoda') {?>

                                    <option>8 Hari</option>

                                    <?php } else{ ?>

                                      <option></option>
                                      
                                   <?php }

                                        $i = $objectData->lama_pengujian();

                                        while ($t=$i->fetch_object()) : ?>

                                        <option><?=$t->lama_pengujian ;?></option>

                                      <?php endwhile;?>

                                    </select>

                                    <?php else:?> <input type="hidden" name="lama_pengujian3[]" value=""> <?php endif; endforeach; ?>

                              </div>


                              <div class="column-half">

                                  <label class="control-label" for="tanggal_diterima" >Tanggal Diterima</label>

                                  <input type="text" name="tanggal_diterima" class="form-control" id="tanggal_diterima" value="<?= $tgl_indo ?>" required>

                              </div>



                              <div class="column-half" >

                                  <label class="control-label" for="jumlah_kontainer" >Jumlah Kontainer/Lot</label>

                                  <input type="text" name="jumlah_kontainer" class="form-control" id="jumlah_kontainer" value="-">

                              </div>

                              <div class="column-half">

                                  <label class="control-label" for="pengantar">Pengantar</label>

                                  <input type="text" name="pengantar" class="form-control" id="pengantar" value="<?php echo $pemohon;?>" required>

                              </div>   

                              <div class="column-half">

                                  <label class="control-label" for="jabatan">Penerima Sampel</label>

                                  <select class="form-control" name="jabatan" id="jabatan" required>

                                    <option>Tri Suparyanto, A.Md</option>
                                    
                                    <?php 

                                    $i = $objectData->tampil_pejabat();

                                    while ($t=$i->fetch_object()) : 

                                        echo '<option value="'.$t->nama_pejabat.'">'.$t->nama_pejabat.'</option>';

                                    endwhile;

                                    ?>

                                    </select>

                              </div>


                              <div class="column-half" >

                                  <label class="control-label" for="cara_pengiriman">Cara Pengiriman</label>

                                  <select class="form-control" name="cara_pengiriman" id="cara_pengiriman" required>

                                    <option>Diantar Langsung</option>

                                        <?php 

                                          $i = $objectData->cara_pengiriman();

                                          while ($t=$i->fetch_object()) : ?>

                                          <option><?=$t->cara_pengiriman ;?></option>

                                        <?php endwhile;?>

                                    </select>

                              </div>


                              <div class="column-half">

                                    <label class="control-label" for="nip_penerima_sampel">NIP</label>

                                    <select class="form-control" name="nip_penerima_sampel" id="nip_penerima_sampel" required>

                                      <option>19861015 201503 1 001</option>

                                    </select>

                              </div>

                            </div>


                            <div class="modal-footer">

                                <div class="column-full button-bawah">

                                <button type="submit" class="btn-default2 btn-success" name="edit" value="edit"><i class="fa fa-check-circle fa-fw" aria-hidden="true"></i>&nbsp;  Simpan Multiple</button>    

                                </div>    

                            </div>

                        </form>

                    </div>

                </div> 


<script>

$(document).ready(function(e){
  
      $("#form_input_multi_penerima_sampel").on("submit", (function(e){

           e.preventDefault();

           $.ajax({

             url :'models/input_multi/proses_input_multi_terimasampel.php',

             type :'POST',

             data : new FormData (this),

             contentType : false,

             cache : false,

             processData : false,

             success : function(response){

               $('#tb_penerima_sampel').DataTable().ajax.reload(null, false),

                swal({

                  title: "Sukses",

                  text: "Data Berhasil Di input",

                  type: "success"

                }).then(function(){

                  $('#modal_input_multi_penerima_sampel').modal('hide')

                });

             }  

           });

        }));

        $( "#jabatan" ).on('change', function () {
          let pejabatID = $(this).val();

              $.get({
                  url: "views/data/SourceDataPemohon.php",
                  dataType: 'Json',
                  data: {'id':pejabatID},
                  success: function(data) {
                      $('#nip_penerima_sampel').empty();
                      $.each(data, function(key, value) {
                          $('#nip_penerima_sampel').append('<option>'+ value +'</option>');
                    });
                  }
              });

        });

 }); /*End ready functions*/
</script>






