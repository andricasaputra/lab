<?php  

include_once('header_input.php');

$hasil2 = $objectData->kosongData();

if ($hasil2 !== 0) {


  $getID = $objectData->set_button();

  $fetch = $getID->fetch_object();

  $id = $fetch->maxkode;

}else{

    $id = '';

}

?>


<div id="modal_input_permohonan" class="modal fade" role="dialog">

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal" id="dismiss">&times;</button>

                <h4 class="modal-title"><i class="fa fa-gear fa-fw"></i>Tambah Data Permohonan Pengujian</h4>

            </div>

      <form id="form_input_permohonan">

        <div class="modal-body">

            <div id="responsive-form" class="clearfix" autocomplete="on">


                    <?php 

                        $tgl_indo = $objectTanggal->tgl_indo(date('Y-m-d'));

                        $bln=date('m');

                        $thn=date('Y');

                        // nomor permohonan

                        $no = $objectNomor->no_permohonan();

                        $no_sampel = $no->fetch_assoc();

                        $sampel = $no_sampel['no_permohonan'];

                        $nourut= 0;

                        @$urut = $nourut + substr($sampel, 0, 5);

                        $tambah = (int) $urut +1 ;

                        $format = $tambah;

                    ?>



                    <div class="column-half">

                        <label class="control-label" for="no_permohonan">Nomor Permohonan</label>

                        <input type="text" name="no_permohonan" class="form-control" id="no_permohonan" value=" <?= $format?>/PL.KT.M5/<?=$bln?>/<?=$thn?>" required>

                        <input type="hidden" id="id" value="<?=$id;?>">

                    </div>

            

                    <div class="column-half">

                        <label class="control-label" for="tanggal_permohonan">Tanggal</label>

                        <input type="text" name="tanggal_permohonan" class="form-control" id="tanggal_permohonan" value="<?= $tgl_indo?>" required>

                        <input type="hidden" name="tanggal_acu_permohonan" id="tanggal_acu_permohonan"  value="<?php echo date('Y-m-d')?>">

                    </div>



                    <div class="column-half">

                        <label class="control-label" for="nama_sampel">Nama Sampel</label>

                        <select class="form-control" name="nama_sampel" id="nama_sampel" required>

                                <option ></option>

                                  <?php 

                                    $i = $objectData->tampil_tumbuhan();

                                    while ($t=$i->fetch_object()) :       

                                    echo '<option value="'.$t->nama_tumbuhan.'">'.$t->nama_tumbuhan.'</option>';


                                  endwhile;?>

                        </select>
                      
                    </div>                  

                    <div class="column-half">

                        <label class="control-label" for="nama_ilmiah">Nama Ilmiah</label>

                    <em><select class="form-control" name="nama_ilmiah" id="nama_ilmiah">

                        </select></em>

                    </div>                  

            

                    <div class="column-seperempat">

                        <label class="control-label" for="jumlah_sampel">Jumlah Sampel</label>

                        <input type="text" name="jumlah_sampel" class="form-control" id="jumlah_sampel" required>

                    </div>



                    <div class="column-seperempat">

                        <label class="control-label" for="satuan">Satuan</label>

                        <select class="form-control" name="satuan" id="satuan" required>

                              <option>Kantong Sampel</option>

                              <option>Spesimen</option>

                              <option>Batang</option>

                              <option>Lembar</option>

                              <option>Buah</option>

                        </select>

                    </div>              

                

                    <div class="column-half">

                        <label class="control-label" for="bagian_tumbuhan">Bagian Tumbuhan</label>

                        <select class="form-control" name="bagian_tumbuhan" id="bagian_tumbuhan">

                                  <option></option>

                                  <option>Akar</option>

                                  <option>Batang</option>

                                  <option>Biji/Benih</option>

                                  <option>Buah</option>

                                  <option>Daun</option>

                                  <option>Umbi</option>

                                  <option>Preparat</option> 

                                  <option>Seluruh Bagian Tanaman</option>

                                  <option>Bagian Lain</option>

                                  

                        </select>

                    </div>              

            

                    <div class="column-half">

                        <label class="control-label" for="media">Media</label>

                        <input type="text" name="media" class="form-control" id="media" value="">

                    </div>              

            

                    <div class="column-half">

                        <label class="control-label" for="vektor">Vektor/Inang/Spesimen</label>

                        <select class="form-control" name="vektor" id="vektor">

                                  <option></option>

                                  <option>Lalat Buah</option>

                                  <option>Myte/Tungau</option>

                                  <option>Nematoda</option>

                                  <option>Preparat</option>

                                  <option>Serangga</option>            

                        </select>

                    </div>              

        

                    <div class="column-seperempat">

                        <label class="control-label" for="nama_patogen">Target OPTK </label>

                        <select class=" form-control "  name="nama_patogen" id="nama_patogen" required>

                                  <option ></option>

                                  <?php 

                                    $i = $objectData->tampil_patogen();

                                    while ($t=$i->fetch_object()) :       

                                    echo '<option value="'.$t->patogen.'">'.$t->patogen.'</option>';


                                  endwhile;?>
                                                                                  

                        </select><br>

                        <select class=" form-control "  name="nama_patogen2" id="nama_patogen2">

                                  <option ></option>
                                  
                                  <?php 

                                    $i = $objectData->tampil_patogen();

                                    while ($t=$i->fetch_object()) :       

                                    echo '<option value="'.$t->patogen.'">'.$t->patogen.'</option>';


                                  endwhile;?>

                        </select><br>

                        <select class=" form-control "  name="nama_patogen3" id="nama_patogen3">

                                   <option ></option>
                                  
                                  <?php 

                                    $i = $objectData->tampil_patogen();

                                    while ($t=$i->fetch_object()) :       

                                    echo '<option value="'.$t->patogen.'">'.$t->patogen.'</option>';


                                  endwhile;?>
                        </select>

                    </div>



                    <div class="column-seperempat">

                        <label class="control-label" for="target_optk">Nama Latin</label>

                        <em><select class=" form-control"  name="target_optk" id="target_optk" required> 
                        </select></em>


                        <br><em><select class=" form-control"  name="target_optk2" id="target_optk2" >       
                        </select></em><br>


                        <em><select class=" form-control"  name="target_optk3" id="target_optk3" >
                                    

                        </select></em>

                    </div>



                    <div class="column-half">

                        <label class="control-label" for="metode_pengujian">Metode Pengujian </label>

                        <select class="form-control" name="metode_pengujian" id="metode_pengujian" required>

                                  <option></option>

                                  <option>Blotter Test</option>

                                  <option>Identifikasi Morfologi</option>

                                  <option>Uji Gram KOH</option>

                                  <option>Ekstrak / Corong Baerman</option>

                                  <option>Pemeriksaan Langsung</option>

                                  <option>Washing Test</option>

                                  <option>Uji Rujukan</option>

                        </select><br>

                        <select class="form-control" name="metode_pengujian2" id="metode_pengujian2">

                                  <option></option>

                                  <option>Blotter Test</option>

                                  <option>Identifikasi Morfologi</option>

                                  <option>Uji Gram KOH</option>

                                  <option>Ekstrak / Corong Baerman</option>

                                  <option>Pemeriksaan Langsung</option>

                                  <option>Washing Test</option>

                                  <option>Uji Rujukan</option>

                        </select><br>

                        <select class="form-control" name="metode_pengujian3" id="metode_pengujian3">

                                  <option></option>

                                  <option>Blotter Test</option>

                                  <option>Identifikasi Morfologi</option>

                                  <option>Uji Gram KOH</option>

                                  <option>Ekstrak / Corong Baerman</option>

                                  <option>Pemeriksaan Langsung</option>

                                  <option>Washing Test</option>

                                  <option>Uji Rujukan</option>

                        </select>

                    </div>

                

                    <div class="column-half">

                        <label class="control-label" for="daerah_asal">Negara/ Daerah Asal</label>

                        <input type="text" name="daerah_asal" class="form-control" id="daerah_asal" value="Sumbawa Besar" required>

                    </div>              



                    <div class="column-half">

                        <label class="control-label" for="nama_pemilik">Nama Pemilik</label>

                        <input type="text" name="nama_pemilik" class="form-control" id="nama_pemilik" value="drh. Priono" required>

                    </div>              

                

                    <div class="column-half">

                        <label class="control-label" for="alamat_pemilik">Alamat Pemilik</label>

                        <input type="text" name="alamat_pemilik" class="form-control" id="alamat_pemilik" value="Jln. Pelabuhan Badas No.1 Sumbawa" required>

                    </div>  

    

                    <div class="column-half">

                        <label class="control-label" for="dokumen_pendukung">Dokumen Pendukung</label>

                        <input type="text" name="dokumen_pendukung" class="form-control" id="dokumen_pendukung" value="-">

                    </div>

                        

        

                    <div class="column-half">

                        <label class="control-label" for="pemohon">Pemohon</label>

                        <select class="form-control" name="pemohon" id="pemohon" required>

                            <option></option>
                              <?php 

                                  $i = $objectData->tampil_pejabat();

                                  while ($t=$i->fetch_object()) : 

                                      echo '<option value="'.$t->nama_pejabat.'">'.$t->nama_pejabat.'</option>';

                                  endwhile;
                              ?>
                              
                        </select>

                    </div>



                    <div class="column-half">

                        <label class="control-label" for="nip">NIP</label>

                        <select class="form-control" name="nip" id="nip">

                        </select>

                        <input type="hidden" name="no_sampel" id="no_sampel" value="<?=$nomor_smpl;?>">

                    </div>

                </div>

                            

                <div class="modal-footer" id="modal-footer">

                    <div class="column-half">

                      <?php  

                        if ($hasil2 !== 0) { ?>

                        <label><input type="checkbox" id="copy" value="copy">  Copy dari permohonan sebelumnya</label>
                          
                      <?php }

                      ?>

                    </div>


                    <div class="column-half button-bawah">

                        <?php

                            if(isset($_SESSION['loginsuperkt'])){ 

                        ?>

                    <button type="reset" class="btn-default2 btn-danger " onclick="return confirm('Yakin Ingin Reset Data?')"><i class="fa fa-exclamation-circle fa-fw" aria-hidden="true"></i>&nbsp;Reset</button>

                    <?php } ?> &nbsp;&nbsp;

                    <button type="submit" class="btn-default2 success" name="input" value="input"><i class="fa fa-check-circle fa-fw" aria-hidden="true"></i>&nbsp;Simpan</button> 

                    </div>  

                </div>

            </form>

        </div>

<script>

$(document).ready(function(e){
  
  $("#form_input_permohonan").on("submit", (function(e){

       e.preventDefault();

       $.ajax({

         url :'models/proses_input_datapermohonan.php',

         type :'POST',

         data : new FormData (this),

         contentType : false,

         cache : false,

         processData : false,

         success : function(response){

            if (response == 'false') {

                swal({

                    title: "Data Tidak Lengkap",

                    text: "Harap Pilih Salah Satu Dari Jenis Sampel (Bagian Tumbuhan, Vektor, Media)",

                    type: "info"

                });

                
            }else{


                $('#tb_permohonan').DataTable().ajax.reload(null, false),

                  swal({

                    title: "Sukses",

                    text: "Data Berhasil Di Input",

                    type: "success"

                }).then(function(){

                    $('#modal_input_permohonan').modal('hide');

                    location.reload();

                });

            }/*Endif*/

         }  
    })
  }));

  /*Jumlah Sampel On Keyup For Nomor Sampel*/

    let awaljumlahSampel = $('#jumlah_sampel').val();


    $( "#jumlah_sampel" ).keyup(function () {

      let id = $('#id').val();
      let jumlahSampel = $(this).val();

      /*Check Jumlah Sampel*/
      
      if (jumlahSampel !='') {

        $.get({
            url: "views/data/SourceNomorSampel.php",
            dataType: 'Json',
            data: {
              'jumlahSampel':jumlahSampel,
              'id':id
            },
            success: function(data) {

                let newNomorSampelawal = Number(data.akhir) + 1;
                let newNomorSampelakhir = Number(data.akhir)  + Number(jumlahSampel);
                
                /*Jumlah Sampel == 1*/

                if (jumlahSampel == 1) {

                  let noSampel = newNomorSampelawal;
                  $('#no_sampel').val(noSampel);

                /*Jumlah Sampel > 1*/

                }else{

                  let noSampel = newNomorSampelawal + "-" + newNomorSampelakhir;
                  $('#no_sampel').val(noSampel);
                }
            }
        });

      /*Jumlah Sampel Kosong*/

      }else{

        $.get({
            url: "views/data/SourceNomorSampel.php",
            dataType: 'Json',
            data: {
              'jumlahSampel':jumlahSampel,
              'id':id
            },
            success: function(data) {

              let newNomorSampelawal = Number(data.awal) + Number(awaljumlahSampel);
              let newNomorSampelakhir = Number(data.akhir)  + Number(awaljumlahSampel);
              let noSampel = newNomorSampelawal + "-" + newNomorSampelakhir;
              $('#no_sampel').val(noSampel);

            }
          });
      }
      
  });

  $( "#nama_sampel" ).on('change', function () {
    let tumbuhanID = $(this).val();
      $.get({
          url: "views/data/SourceDatatumbuhan.php",
          dataType: 'Json',
          data: {'id':tumbuhanID},
          success: function(data) {
              $('#nama_ilmiah').empty();
              $.each(data, function(key, value) {
                  $('#nama_ilmiah').append('<option>'+ value +'</option>');
            });
          }
      }).done(function() {

        if (tumbuhanID == 'Lalat Buah') {

            $('#bagian_tumbuhan').prop('disabled', true),
            $('#media').prop('disabled', true),
            $('#vektor').prepend('<option selected>Lalat Buah</option>');

        }else{

             
             $('#bagian_tumbuhan').prop('disabled', false),
             $('#media').prop('disabled', false),
             $('#vektor').html(

                '<option></option>' +

                '<option>Lalat Buah</option>' +

                '<option>Myte/Tungau</option>' +

                '<option>Nematoda</option>' +

                '<option>Preparat</option>' +

                '<option>Serangga</option>'   

              );

        }

      });
    });


  $( "#nama_patogen" ).on('change', function () {
    let patogen = $(this).val();

      if (patogen) {

        $.get({
            url: "views/data/SourceDataPatogen.php",
            dataType: 'Json',
            data: {'id':patogen},
            success: function(data) {
                $('#target_optk').empty();
                $('#target_optk2').empty();
                $('#target_optk3').empty();
                $('#target_optk2').append('<option selected></option>');
                $('#target_optk3').append('<option selected></option>');
                $.each(data, function(key, value) {
                    $('#target_optk').append('<option>'+ value +'</option>'),  
                    $('#target_optk2').append('<option>'+ value +'</option>'),                 
                    $('#target_optk3').append('<option>'+ value +'</option>');
              });
            }
        }).done(function () {

          if (patogen == 'Serangga' || patogen == 'Myte/Tungau') {

              $('#metode_pengujian').empty();
              $('#metode_pengujian').prepend(

                '<option selected>Identifikasi Morfologi</option>' +

                '<option>Blotter Test</option>' +

                '<option>uji Gram KOH</option>' +

                '<option>Ekstrak / Corong Baerman</option>' +

                '<option>Pemeriksaan Langsung</option>' +

                '<option>Washing Test</option>' +

                '<option>Uji Rujukan</option>' +

                '<option></option>'  

                );

          }else if (patogen == 'Cendawan') {

              $('#metode_pengujian').empty();
              $('#metode_pengujian').prepend(

                '<option selected>Blotter Test</option>' +

                '<option>Identifikasi Morfologi</option>' +

                '<option>Uji Gram KOH</option>' +

                '<option>Ekstrak / Corong Baerman</option>' +

                '<option>Pemeriksaan Langsung</option>' +

                '<option>Washing Test</option>' +

                '<option>Uji Rujukan</option>' +

                '<option></option>'  

                );

          }else if (patogen == 'Bakteri') {

              $('#metode_pengujian').empty();
              $('#metode_pengujian').prepend(

                '<option selected>Uji Gram KOH</option>' +

                '<option>Blotter Test</option>' +

                '<option>Identifikasi Morfologi</option>' +

                '<option>Ekstrak / Corong Baerman</option>' +

                '<option>Pemeriksaan Langsung</option>' +

                '<option>Washing Test</option>' +

                '<option>Uji Rujukan</option>' +

                '<option></option>'  

                );

          }else if (patogen == 'Nematoda') {

              $('#metode_pengujian').empty();
              $('#metode_pengujian').prepend(

                '<option selected>Ekstrak / Corong Baerman</option>' +

                '<option>Uji Gram KOH</option>' +

                '<option>Blotter Test</option>' +

                '<option>Identifikasi Morfologi</option>' +

                '<option>Uji Rujukan</option>' +

                '<option></option>'  

                );

          }else{


               $('#metode_pengujian').html(

                  '<option></option>' +

                  '<option>Blotter Test</option>' +

                  '<option>Identifikasi Morfologi</option>' +

                  '<option>Uji Gram KOH</option>' +

                  '<option>Ekstrak / Corong Baerman</option>' +

                  '<option>Pemeriksaan Langsung</option>' +

                  '<option>Washing Test</option>' +

                  '<option>Uji Rujukan</option>'   

                )
          }

        });

      }else{

      $('#target_optk').prepend('<option selected></option>'),
      $('#metode_pengujian').prepend('<option selected></option>');

     }
  });

  $( "#nama_patogen2" ).on('change', function () {
    let patogen = $(this).val();

      if (patogen) {

          $.get({
              url: "views/data/SourceDataPatogen.php",
              dataType: 'Json',
              data: {'id':patogen},
              success: function(data) {
                  $('#target_optk2').empty();
                  $.each(data, function(key, value) {
                      $('#target_optk2').append('<option>'+ value +'</option>');
                });
              }
          });

      }else{

        $('#target_optk2').prepend('<option selected></option>'),
        $('#metode_pengujian2').prepend('<option selected></option>');

      }

    });

  $( "#nama_patogen3" ).on('change', function () {
    let patogen = $(this).val();

      if (patogen) {

        $.get({
            url: "views/data/SourceDataPatogen.php",
            dataType: 'Json',
            data: {'id':patogen},
            success: function(data) {
                $('#target_optk3').empty();
                $.each(data, function(key, value) {
                    $('#target_optk3').append('<option>'+ value +'</option>');
              });
            }
        });

      }else{

        $('#target_optk3').prepend('<option selected></option>'),
        $('#metode_pengujian3').prepend('<option selected></option>');

      }
    });

  $( "#pemohon" ).on('change', function () {
    let pemohonID = $(this).val();
      $.get({
          url: "views/data/SourceDataPemohon.php",
          dataType: 'Json',
          data: {'id':pemohonID},
          success: function(data) {
              $('#nip').empty();
              $.each(data, function(key, value) {
                  $('#nip').append('<option>'+ value +'</option>');
            });
          }
      });
    });

    $("#copy").on('change', function(){

      let permohonanID = $("#id").val();

      if(this.checked) {

        $.get({
            url: "views/data/data_permohonan_copy.php",
            dataType: 'Json',
            data: {'id':permohonanID},
            success: function(data) {
              $.each(data, function(key, value) {
                $('#nama_sampel').prepend('<option selected>'+ value.nama_sampel +'</option>');
                $('#nama_ilmiah').prepend('<option selected>'+ value.nama_ilmiah +'</option>');
                $('#jumlah_sampel').empty();
                $('#jumlah_sampel').val('');
                $('#satuan').prepend('<option selected>'+ value.satuan +'</option>');
                $('#bagian_tumbuhan').prepend('<option selected>'+ value.bagian_tumbuhan +'</option>');
                $('#media').empty();
                $('#media').val(value.media);
                $('#vektor').prepend('<option selected>'+ value.vektor +'</option>');
                $('#nama_patogen').prepend('<option selected>'+ value.nama_patogen +'</option>');
                $('#nama_patogen2').prepend('<option selected>'+ value.nama_patogen2 +'</option>');
                $('#nama_patogen3').prepend('<option selected>'+ value.nama_patogen3 +'</option>');
                $('#target_optk').prepend('<option selected>'+ value.target_optk +'</option>');
                $('#target_optk2').prepend('<option selected>'+ value.target_optk2 +'</option>');
                $('#target_optk3').prepend('<option selected>'+ value.target_optk3 +'</option>');
                $('#metode_pengujian').prepend('<option selected>'+ value.metode_pengujian +'</option>');
                $('#metode_pengujian2').prepend('<option selected>'+ value.metode_pengujian2 +'</option>');
                $('#metode_pengujian3').prepend('<option selected>'+ value.metode_pengujian3 +'</option>');
                $('#daerah_asal').empty();
                $('#daerah_asal').val(value.daerah_asal);
                $('#nama_pemilik').empty();
                $('#nama_pemilik').val(value.nama_pemilik);
                $('#alamat_pemilik').empty();
                $('#alamat_pemilik').val(value.alamat_pemilik);
                $('#dokumen_pendukung').empty();
                $('#dokumen_pendukung').val(value.dokumen_pendukung);
                $('#pemohon').prepend('<option selected>'+ value.pemohon +'</option>');
                $('#nip').prepend('<option selected>'+ value.nip +'</option>');
              });
            }
        });

        /*console.log("ok")*/


      }

    }); /*End Copy*/
  



}); /*End ready functions*/

  

</script>
