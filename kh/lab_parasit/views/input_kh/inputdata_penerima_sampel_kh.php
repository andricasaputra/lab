<?php

include_once('header_input.php');

if(isset($_REQUEST['id'])){

    $id = intval($_REQUEST['id']);

    $d=date("m/Y");

    $tgl_indo = $objectTanggal->tgl_indo(date('Y-m-d'));

    $bln=date('m');

    $thn=date('Y');

    date_default_timezone_set("Asia/Makassar");

    $waktu =  date('H:i');  

    $tampil = $objectDataParasit->tampil($id);

    while($data = $tampil->fetch_object()):

        $id                   = $data->id;

        $tanggal_permohonan    = $data->tanggal_permohonan;

        $no_permohonan         = $data->no_permohonan;

        $tanggal_diterima     = $data->tanggal_diterima;

        $jam_diterima         = $data->jam_diterima;

        $cara_pengiriman      = $data->cara_pengiriman;

        $pengantar            = $data->nama_pemilik;

        $nama_pemilik         = $data->nama_pemilik;

        $alamat_pemilik       = $data->alamat_pemilik;

        $jenis_sampel         = $data->jenis_sampel;

        $jumlah_kontainer     = $data->jumlah_kontainer;

        $lama_pengujian       = $data->lama_pengujian;

        $penerima_sampel      = $data->penerima_sampel;

        $nip_penerima_sampel  = $data->nip_penerima_sampel;

        $target_pengujian2    = $data->target_pengujian2;

        $no_sampel_awal       = str_replace(",", "-", $data->no_sampel_awal);



endwhile;
?>
 <!--Input data-->   

        <div class="modal-content">

            <div class="modal-header">

                  <button type="button" class="close" data-dismiss="modal">&times;</button>

                      <h4 class="modal-title"><i class="fa fa-gear fa-fw"></i>Data Tanda Terima Sampel</h4>

            </div>


              <form id="form_input_penerima_sampel_kh">

                <div class="modal-body" id="modal-edit_kh">

                  <div id="responsive-form" class="clearfix">


                              <div class="column-half">

                                  <label class="control-label" for="no_permohonan">Nomor/Tanggal Surat</label>

                                  <input type="hidden" name="id" id="id_input" value="<?=$id;?>">

                                  <input type="text" name="no_permohonan" class="form-control" id="no_permohonan_input" value="<?=$no_permohonan;?>" disabled="disabled">

                              </div>

                              <div class="column-half">

                                  <label class="control-label" for="tanggal_permohonan">Tanggal Permohonan</label>

                                  <input type="text" name="tanggal_permohonan" class="form-control" id="tanggal_permohonan_input" value="<?=$tanggal_permohonan;?>" disabled="disabled">

                              </div>
                                   

                              <div class="column-half" >

                                  <label class="control-label" for="tanggal_diterima" >Tanggal Diterima</label>

                                  <input type="text" name="tanggal_diterima" class="form-control" id="tanggal_diterima_input"  required value="<?php echo $tgl_indo ?>">

                                  <input type="hidden" name="jam_diterima"  id="jam_diterima_input"   value="<?php echo $waktu.' '.'wita' ?>">

                              </div>


                              <div class="column-half">

                                  <label class="control-label" for="lama_pengujian">Lama Pengujian</label>

                                  <select class="form-control" name="lama_pengujian" id="lama_pengujian_input" required>

                                    <option><?php echo $lama_pengujian; ?></option>

                                      <?php 
                                      
                                        $i = $objectDataParasit->lama_pengujian();

                                        while ($t=$i->fetch_object()) : ?>

                                        <option><?=$t->lama_pengujian ;?></option>

                                      <?php endwhile;?>

                                    </select>

                              </div>

                              <div class="column-half">

                                  <label class="control-label" for="nama_pelanggan">Nama Pelanggan</label>

                                  <input type="text" name="nama_pelanggan" class="form-control" value="<?=$nama_pemilik;?>" id="nama_pelanggan_input" required>

                              </div>

                              <div class="column-half">

                                  <label class="control-label" for="alamat_pelanggan">Alamat</label>

                                  <input type="text" name="alamat_pelanggan" class="form-control" value="<?=$alamat_pemilik;?>" id="alamat_pelanggan_input" required>

                              </div>

                              <div class="column-half" >

                                  <label class="control-label" for="cara_pengiriman">Cara Pengiriman</label>

                                  <select class="form-control" name="cara_pengiriman" id="cara_pengiriman_input" required>

                                        <?php 

                                          $i = $objectDataParasit->cara_pengiriman();

                                          while ($t=$i->fetch_object()) : ?>

                                          <option><?=$t->cara_pengiriman ;?></option>

                                        <?php endwhile;?>

                                    </select>

                              </div>

                              <div class="column-half">

                                  <label class="control-label" for="nama_pengirim">Pengantar</label>

                                  <select name="nama_pengirim" class="form-control" id="nama_pengirim_input" required>
                                    <option selected value="L. Indra K. Hidayat">L. Indra K. Hidayat</option>
                                    <option value="Muhammad Rusdi">Muhammad Rusdi</option>
                                    <option value="define">Input Manual</option>
                                  </select>


                              </div>

                              <div class="column-half">

                                  <label class="control-label" for="jumlah_kontainer">Jumlah Kontainer/Lot</label>

                                  <input type="text" name="jumlah_kontainer" class="form-control" value="-" id="jumlah_kontainer_input">

                              </div>

                              <div class="column-seperempat">

                                  <label class="control-label" for="target_pengujian2">Target Pengujian I</label>

                                  <em><input type="text" name="target_pengujian2" class="form-control" value="Bacillus Anthracis" id="target_pengujian2_input" required></em>

                              </div>

                              <div class="column-seperempat">

                                  <label class="control-label" for="target_pengujian3">Target Pengujian II</label>

                                  <em><input type="text" name="target_pengujian3" class="form-control" value="Trypanosoma sp" id="target_pengujian3_input"></em>

                              </div>

                              <div class="column-half">

                                  <label class="control-label" for="penerima_sampel">Penerima Sampel</label>

                                  <select class="form-control" name="penerima_sampel" id="penerima_sampel_input" required>
                                        <option>Wulida Fakhrina, SP</option>
                                        <?php 

                                          $i = $objectData->tampil_jabfung();

                                          while ($t=$i->fetch_object()) : ?>

                                          <option value="<?=$t->nama_pejabat ;?>"><?=$t->nama_pejabat ;?></option>

                                        <?php endwhile;?>

                                    </select>

                              </div>


                              <div class="column-half">

                                  <label class="control-label" for="nip_penerima_sampel">NIP</label>

                                  <select class="form-control" name="nip_penerima_sampel" id="nip_penerima_sampel_input">
                                    <option>-</option>
                                  </select>

                              </div>


                        <input type="hidden" name="jenis_sampel" id="jenis_sampel_input" value="<?=$jenis_sampel;?>" > 


                          </div>

                              <div class="modal-footer">

                                  <div class="column-full button-bawah">

                                  <button type="submit" class="btn-default2 btn-success" name="edit" value="edit"><i class="fa fa-check-circle fa-fw" aria-hidden="true"></i>&nbsp;  Simpan</button>    

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
  
      $("#form_input_penerima_sampel_kh").on("submit", (function(e){

           e.preventDefault();

           $.ajax({

             url :'lab_parasit/models/proses_input_terimasampel_kh.php',

             type :'POST',

             data : new FormData (this),

             contentType : false,

             cache : false,

             processData : false,

             success : function(response){

              if (response == 'false') {

                  swal({

                      title: "",

                      text: "Nomor Sampel Duplicate",

                      type: "info"

                  })


              }else if(response == 'false2'){


                  swal({

                      title: "Error",

                      text: "Input Nomor Sampel Ke Tabel Gagal",

                      type: "error"

                  });


              }else{


                   $('#tb_penerima_sampel_kh_lab_parasit').DataTable().ajax.reload(null, false),

                    swal({

                      title: "Sukses",

                      text: "Data Berhasil Di input",

                      type: "success"

                  }).then(function(){

                      $('#modal_input_penerima_sampel_kh').modal('hide')

                  });

              }
             }  
           });

         }));

  $( "#penerima_sampel_input" ).on('change', function () {

    let pejabatID = $(this).val();

    $('#nip_penerima_sampel_input').removeAttr('disabled');


    if (pejabatID !='') {

      $.get({
            url: "lab_parasit/views/data_kh/SourceDataPemohon_kh.php",
            dataType: 'Json',
            data: {'id':pejabatID},
            success: function(data) {
                $('#nip_penerima_sampel_input').empty();
                $.each(data, function(key, value) {
                    $('#nip_penerima_sampel_input').append('<option>'+ value +'</option>');
              });
            }
        });

    }else{

       $('#nip_penerima_sampel_input').empty();
       $('#nip_penerima_sampel_input').attr("disabled", true);

    }
        

  });

  $("#nama_pengirim_input").on("change", function (){
      let pengantar = $(this).val();

      if (pengantar == 'define') {

        $("#nama_pengirim_input").after('<input type="text" class="form-control" id="pengantar_manual" placeholder="ketikkan pengantar disini"></input>');

        $("#pengantar_manual").keyup(function (){

          let pengantar_manual = $('#pengantar_manual').val();

          if (pengantar_manual !='') {

            $("#nama_pengirim_input").empty();

            $("#nama_pengirim_input").prepend('<option selected>'+pengantar_manual+'</option>')

          }else{
            $("#nama_pengirim_input").empty();
            $("#nama_pengirim_input").prepend(
              '<option selected value="L. Indra K. Hidayat">L. Indra K. Hidayat</option>'+
              '<option value="Muhammad Rusdi">Muhammad Rusdi</option>'+
              '<option value="define">Input Manual</option>');
            $("#pengantar_manual").remove();
          }

          
        });
   
      }
  })

 }); /*End ready functions*/
</script>






