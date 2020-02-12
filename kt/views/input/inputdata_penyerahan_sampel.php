<?php

include_once('header_input.php');

if(isset($_REQUEST['id'])){

    $id = intval($_REQUEST['id']);

    $d=date("m/Y");

    $tgl_indo = $objectTanggal->tgl_indo(date('Y-m-d'));

    $bln=date('m');

    $thn=date('Y');

    $tampil = $objectData->tampil($id);

    while($data = $tampil->fetch_object()):

      $id                 = $data->id;

      $no_permohonan      = $data->no_permohonan;

      $kode_sampel        = $data->kode_sampel;

      $tanggal_penyerahan = $data->tanggal_penyerahan;

      $yang_menyerahkan   = $data->yang_menyerahkan;

      $yang_menerima      = $data->yang_menerima;

      $nip_ygmenyerahkan  = $data->nip_ygmenyerahkan;

      $nip_ygmenerima     = $data->nip_ygmenerima;



endwhile;
?>


            <div class="modal-content">

               <div class="modal-header">

                  <button type="button" class="close" data-dismiss="modal">&times;</button>

                  <h4 class="modal-title"><i class="fa fa-gear fa-fw"></i>Input Penyerahan Sampel Pengujian</h4>

               </div>



              <form id="form_input_penyerahan_sampel_pengujian">

                <div class="modal-body" id="modal-edit">

                  <div id="responsive-form" class="clearfix">

                 
                          <div class="column-half">

                           <label class="control-label" for="no_permohonan">Nomor Surat Pengantar</label>

                           <input type="hidden" name="id" id="id_input" value="<?=$id?>">

                           <input type="text" name="no_permohonan" class="form-control" id="no_permohonan_input" value="<?=$no_permohonan?>" disabled="disabled">

                          </div>

                          <?php 

                              // Kode Sampel


                              $kd = $objectNomor->kode_sampel();

                              $kode = $kd->fetch_object();

                              $kd_sampel = $kode->kode_sampel;

                              $urut = substr($kd_sampel, 0, 4);

                              $tambah = (int) $urut + 1;



                              if(strlen($tambah) == 1){

                                $format2 = "000".$tambah."/KT/".$bln."/".$thn;

                              }elseif (strlen($tambah) == 2) {

                                $format2 = "00".$tambah."/KT/".$bln."/".$thn;

                              }elseif (strlen($tambah) == 3) {

                                $format2 = "0".$tambah."/KT/".$bln."/".$thn;

                              }else{

                                $format2 = $tambah."/KT/".$bln."/".$thn;

                              }

                            ?>


                          <div class="column-half">

                                 <label class="control-label" for="kode_sampel">Kode Sampel</label>

                                <input type="text" name="kode_sampel" class="form-control" id="kode_sampel_input" value="<?= $format2 ?>" required>

                           </div>


                          <input type="hidden" name="tanggal_penyerahan" class="form-control" id="tanggal_penyerahan_input" value="<?=$tgl_indo?>" required>

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
  
  $("#form_input_penyerahan_sampel_pengujian").on("submit", (function(e){

       e.preventDefault();

       $.ajax({

         url :'models/proses_input_penyerahan_sampel.php',

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

                    $('#modal_input_penyerahan_sampel').modal('hide')

                });
            }
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






