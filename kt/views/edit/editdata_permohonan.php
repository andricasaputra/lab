<?php

include_once('header_edit.php');

if(isset($_REQUEST['id'])){

    $id = intval($_REQUEST['id']);

    $tampil = $objectData->tampil($id);

    while($data = $tampil->fetch_object()):

        $id                     = $data->id;

        $no_permohonan          = $data->no_permohonan;

        $tanggal_permohonan     = $data->tanggal_permohonan;

        $tanggal_acu_permohonan = $data->tanggal_acu_permohonan;

        $nama_sampel            = $data->nama_sampel;

        $nama_ilmiah            = $data->nama_ilmiah;

        $jumlah_sampel          = $data->jumlah_sampel;

        $satuan                 = $data->satuan;

        $bagian_tumbuhan        = $data->bagian_tumbuhan;

        $media                  = $data->media;

        $vektor                 = $data->vektor;

        $daerah_asal            = $data->daerah_asal;

        $nama_patogen           = $data->nama_patogen;

        $nama_patogen2          = $data->nama_patogen2;

        $nama_patogen3          = $data->nama_patogen3;

        $target_optk            = $data->target_optk;

        $target_optk2           = $data->target_optk2;

        $target_optk3           = $data->target_optk3;

        $metode_pengujian       = $data->metode_pengujian;

        $metode_pengujian2      = $data->metode_pengujian2;

        $metode_pengujian3      = $data->metode_pengujian3;

        $nama_pemilik           = $data->nama_pemilik;

        $alamat_pemilik         = $data->alamat_pemilik;

        $dokumen_pendukung      = $data->dokumen_pendukung;

        $pemohon                = $data->pemohon;

        $nip                    = $data->nip;

        $no_sampel              =$data->no_sampel;

        $no_sertifikat        =$data->no_sertifikat;

endwhile;
?>
    <!--Edit Data--> 

            


        <div class="modal-content">

            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal">&times;</button>

                <h4 class="modal-title"><i class="fa fa-gear fa-fw"></i>Edit Data Permohonan</h4>

            </div>

      <form id="form_edit_permohonan">

        <div class="modal-body">

            <div id="responsive-form" class="clearfix">


                    <div class="column-half">

                        <label class="control-label" for="no_permohonan">Nomor Permohonan</label>

                        <input type="hidden" name="id" id="id" value="<?=$id?>">

                        <input type="text" name="no_permohonan" class="form-control" id="no_permohonan" value="<?=$no_permohonan?>">

                    </div>

                            

                    <div class="column-half">

                        <label class="control-label" for="tanggal_permohonan">Tanggal</label>

                        <input type="text" name="tanggal_permohonan" class="form-control" id="tanggal_permohonan" value="<?=$tanggal_permohonan?>" required>

                        <input type="hidden" name="tanggal_acu_permohonan" id="tanggal_acu_permohonan" value="<?=$tanggal_acu_permohonan?>">

                    </div>

                            

                    <div class="column-half">

                        <label class="control-label" for="nama_sampel">Nama Sampel</label>

                        <select class="form-control" name="nama_sampel" id="nama_sampel_edit" required>

                                <?php echo '<option>'.$nama_sampel.'</option>' ?>

                                <?php 

                                    

                                    $i = $objectData->tampil_tumbuhan();

                                    while ($t=$i->fetch_object()) : ?>

                                    <option><?= $t->nama_tumbuhan; ?></option>

                                <?php endwhile;?>

                                <option></option>

                        </select>

                        

                    </div>

                        

                    <div class="column-half">

                        <label class="control-label" for="nama_ilmiah">Nama Ilmiah</label>

                    <em><select class="form-control" name="nama_ilmiah" id="nama_ilmiah_edit">

                                <?php echo '<option>'.$nama_ilmiah.'</option>' ?>

                        </select></em>

                    </div>

                    <?php if ($no_sertifikat == ''): ?>

                        <div class="column-seperempat">

                          <label class="control-label" for="jumlah_sampel">Jumlah Sampel</label>

                          <input type="text" name="jumlah_sampel" class="form-control" id="jumlah_sampel" value="<?=$jumlah_sampel;?>" required>

                        </div>

                      <?php else: ?>

                        <div class="column-seperempat">

                          <label class="control-label" for="jumlah_sampel">Jumlah Sampel</label>

                          <input type="text" name="jumlah_sampel" class="form-control" id="jumlah_sampel" value="<?=$jumlah_sampel;?>" style="pointer-events: none;">

                        </div>
                        
                      <?php endif ?>

                    <div class="column-seperempat">

                        <label class="control-label" for="satuan">Satuan</label>

                        <select class="form-control" name="satuan" id="satuan" required>

                            <?php echo '<option>'.$satuan.'</option>' ?>

                              <option>Kantong Sampel</option>

                              <option>Spesimen</option>

                              <option>Batang</option>

                              <option>Lembar</option>

                              <option>Buah</option>

                              <option></option>

                        </select>

                    </div>  
                            

                    <div class="column-half">

                        <label class="control-label" for="bagian_tumbuhan">Bagian Tumbuhan</label>

                        <select class="form-control" name="bagian_tumbuhan" id="bagian_tumbuhan">

                                  <?php echo '<option>'.$bagian_tumbuhan.'</option>' ?>

                                  <option>Akar</option>

                                  <option>Batang</option>

                                  <option>Biji/Benih</option>

                                  <option>Buah</option>

                                  <option>Daun</option>

                                  <option>Umbi</option>

                                  <option>Preparat</option> 

                                  <option>Seluruh Bagian Tanaman</option>

                                  <option>Bagian Lain</option>

                                  <option></option>

                        </select>

                    </div>          

            

                    <div class="column-half">

                        <label class="control-label" for="media">Media</label>

                        <input type="text" name="media" class="form-control" id="media" value="<?=$media?>">

                    </div>

                    

                    <div class="column-half">

                        <label class="control-label" for="vektor">Vektor/Inang/Spesimen</label>

                        <select class="form-control" name="vektor" id="vektor_edit">

                                  <?php echo '<option>'.$vektor.'</option>' ?>

                                  <option>Serangga</option>

                                  <option>Lalat Buah</option>

                                  <option>Myte/Tungau</option>

                                  <option>Nematoda</option>

                                  <option>Preparat</option>

                                  <option></option>

                        </select>

                    </div>

            

                    <div class="column-seperempat">

                        <label class="control-label" for="nama_patogen">Target OPTK </label>

                        <select class=" form-control "  name="nama_patogen" id="nama_patogen_edit" required>

                                  <?php echo '<option>'.$nama_patogen.'</option>';

                                    $i = $objectData->tampil_patogen();

                                    while ($t=$i->fetch_object()) :       

                                    echo '<option value="'.$t->patogen.'">'.$t->patogen.'</option>';


                                  endwhile;?>

                        </select><br>

                        <select class=" form-control "  name="nama_patogen2" id="nama_patogen2_edit">

                                  <?php echo '<option>'.$nama_patogen2.'</option>';

                                    $i = $objectData->tampil_patogen();

                                    while ($t=$i->fetch_object()) :       

                                    echo '<option value="'.$t->patogen.'">'.$t->patogen.'</option>';


                                  endwhile;?>

                        </select><br>

                        <select class=" form-control "  name="nama_patogen3" id="nama_patogen3_edit">

                                  <?php echo '<option>'.$nama_patogen3.'</option>';

                                    $i = $objectData->tampil_patogen();

                                    while ($t=$i->fetch_object()) :       

                                    echo '<option value="'.$t->patogen.'">'.$t->patogen.'</option>';


                                  endwhile;?>

                        </select>

                    </div>



                    <div class="column-seperempat">

                        <label class="control-label" for="target_optk">Nama Latin</label>

                        <em><select class=" form-control"  name="target_optk" id="target_optk_edit" required>

                                <?php echo '<option>'.$target_optk.'</option>' ?>

                                    <?php 

                                        $i = $objectData->tampil_penyakit();

                                        while ($t=$i->fetch_object()) : ?>

                                        <option><?=$t->nama_latin_penyakit ;?></option>

                                    <?php endwhile;?>

                                    <option></option>

                            </select></em><br>

                            <em><select class=" form-control"  name="target_optk2" id="target_optk2_edit" >

                                <?php echo '<option>'.$target_optk2.'</option>' ?>

                                    <?php 

                                        $i = $objectData->tampil_penyakit();

                                        while ($t=$i->fetch_object()) : ?>

                                        <option><?=$t->nama_latin_penyakit ;?></option>

                                    <?php endwhile;?> 

                                    <option></option>  

                        </select></em><br>

                            <em><select class=" form-control"  name="target_optk3" id="target_optk3_edit" >

                                <?php echo '<option>'.$target_optk3.'</option>' ?>

                                    <?php 

                                        $i = $objectData->tampil_penyakit();

                                        while ($t=$i->fetch_object()) : ?>

                                        <option><?=$t->nama_latin_penyakit ;?></option>

                                    <?php endwhile;?> 

                                    <option></option>              

                        </select></em>

                    </div>



                    <div class="column-half">

                        <label class="control-label" for="metode_pengujian">Metode Pengujian </label>

                        <select class="form-control" name="metode_pengujian" id="metode_pengujian_edit" required>

                                  <?php echo '<option>'.$metode_pengujian.'</option>' ?>

                                  <option>Blotter Test</option>

                                  <option>Identifikasi Morfologi</option>

                                  <option>Uji Gram KOH</option>

                                  <option>Ekstrak / Corong Baerman</option>

                                  <option>Uji Rujukan</option>

                                  <option></option>

                        </select><br>

                            <select class="form-control" name="metode_pengujian2" id="metode_pengujian2_edit">

                                  <?php echo '<option>'.$metode_pengujian2.'</option>' ?>

                                  <option>Blotter Test</option>

                                  <option>Identifikasi Morfologi</option>

                                  <option>Uji Gram KOH</option>

                                  <option>Ekstrak / Corong Baerman</option>

                                  <option>Uji Rujukan</option>

                                  <option></option>

                        </select><br>

                        <select class="form-control" name="metode_pengujian3" id="metode_pengujian3_edit">

                                  <?php echo '<option>'.$metode_pengujian3.'</option>' ?>

                                  <option>Blotter Test</option>

                                  <option>Identifikasi Morfologi</option>

                                  <option>Uji Gram KOH</option>

                                  <option>Ekstrak / Corong Baerman</option>

                                  <option>Uji Rujukan</option>

                                  <option></option>

                        </select>

                    </div>



                

                    <div class="column-half">

                        <label class="control-label" for="daerah_asal">Negara/ Daerah Asal</label>

                        <input type="text" name="daerah_asal" class="form-control" id="daerah_asal" value="<?=$daerah_asal?>"  required="required">

                    </div>

                

        

                    <div class="column-half">

                        <label class="control-label" for="nama_pemilik">Nama Pemilik</label>

                        <input type="text" name="nama_pemilik" class="form-control" id="nama_pemilik" value="<?=$nama_pemilik?>"  required="required">

                    </div>

        

                    <div class="column-half">

                        <label class="control-label" for="alamat_pemilik">Alamat Pemilik</label>

                        <input type="text" name="alamat_pemilik" class="form-control" id="alamat_pemilik" value="<?=$alamat_pemilik?>"  required="required">

                    </div>

        

                    <div class="column-half">

                        <label class="control-label" for="dokumen_pendukung">Dokumen Pendukung</label>

                        <input type="text" name="dokumen_pendukung" class="form-control" id="dokumen_pendukung" value="<?=$dokumen_pendukung?>">

                    </div>

        

                    <div class="column-half">

                        <label class="control-label" for="pemohon">Pemohon</label>

                       <select class="form-control" name="pemohon" id="pemohon_edit" required>

                                    <?php 

                                      echo '<option value="'.$pemohon.'">'.$pemohon.'</option>';

                                        $i = $objectData->tampil_pejabat();

                                        while ($t=$i->fetch_object()) : 

                                            echo '<option value="'.$t->nama_pejabat.'">'.$t->nama_pejabat.'</option>';

                                        endwhile;
                                        ?>


                        </select>

                    </div>



                    <div class="column-half">

                        <label class="control-label" for="nip">NIP</label>

                        <select class="form-control" name="nip" id="nip_edit">

                            <?php echo '<option>'.$nip.'</option>' ?>

                        </select>

                        <input type="hidden" name="no_sampel" id="no_sampel" value="<?=$no_sampel;?>">

                    </div>

                </div>

                

                <div class="modal-footer" >

                    <div class="column-full button-bawah">

                        <?php

                            if(isset($_SESSION['loginsuperkt'])){ 

                        ?>

                        <button type="reset" class="btn-default2 btn-danger " onclick="return confirm('Reset Data Akan menghilangkan Seluruh Data!!  Anda Yakin Ingin Reset Data?')"><i class="fa fa-exclamation-circle fa-fw" aria-hidden="true"></i>Reset</button>

                        <?php } ?>

                        <button type="submit" class="btn-default2 btn-success" name="edit"  value="edit" ><i class="fa fa-check-circle fa-fw" aria-hidden="true"></i>Simpan</button> 

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
  
  $("#form_edit_permohonan").on("submit", (function(e){

       e.preventDefault();

       $.ajax({

         url :'models/proses_editdata_permohonan.php',

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

                    text: "Data Berhasil Diubah",

                    type: "success"

                }).then(function(){

                    $('#modal_permohonan').modal('hide')

                });


            }/*Endif*/

         }  
    });

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

                let newNomorSampelawal = Number(data.awal);
                let newNomorSampelakhir = Number(data.akhir)  + Number(jumlahSampel) - Number(awaljumlahSampel);
                
                /*Jumlah Sampel == 1*/

                if (jumlahSampel == 1) {

                  let noSampel = newNomorSampelakhir;
                  $('#no_sampel').val(noSampel);

                /*Jumlah Sampel > 1*/

                }else{

                  let noSampel = newNomorSampelawal + "-" + newNomorSampelakhir;
                  $('#no_sampel').val(noSampel);
                }    

            }
          });

      }  
  });

  $( "#nama_sampel_edit" ).on('change', function () {
    let tumbuhanID = $(this).val();
      $.get({
          url: "views/data/SourceDatatumbuhan.php",
          dataType: 'Json',
          data: {'id':tumbuhanID},
          success: function(data) {
              $('#nama_ilmiah_edit').empty();
              $.each(data, function(key, value) {
                  $('#nama_ilmiah_edit').append('<option>'+ value +'</option>');
            });
          }
      }).done(function() {

        if (tumbuhanID == 'Lalat Buah') {

            $('#vektor_edit').prepend('<option selected>Lalat Buah</option>');

        }else{

             $('#vektor_edit').html(

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


  $( "#nama_patogen_edit" ).on('change', function () {
    let patogenID = $(this).val();

      if (patogenID) {

        $.get({
            url: "views/data/SourceDataPatogen.php",
            dataType: 'Json',
            data: {'id':patogenID},
            success: function(data) {
                $('#target_optk_edit').empty();
                $('#target_optk2_edit').empty();
                $('#target_optk3_edit').empty();
                $('#target_optk2_edit').append('<option selected></option>');
                $('#target_optk3_edit').append('<option selected></option>');
                $.each(data, function(key, value) {
                    $('#target_optk_edit').append('<option>'+ value +'</option>'),  
                    $('#target_optk2_edit').append('<option>'+ value +'</option>'),                 
                    $('#target_optk3_edit').append('<option>'+ value +'</option>');
              });
            }
        }).done(function () {

          if (patogenID == 'Serangga' || patogenID == 'Myte/Tungau') {

              $('#metode_pengujian_edit').empty();
              $('#metode_pengujian_edit').prepend(

                '<option selected>Identifikasi Morfologi</option>' +

                '<option>Blotter Test</option>' +

                '<option>uji Gram KOH</option>' +

                '<option>Ekstrak / Corong Baerman</option>' +

                '<option>Uji Rujukan</option>' +

                '<option></option>'  

                );

          }else if (patogenID == 'Cendawan') {

              $('#metode_pengujian_edit').empty();
              $('#metode_pengujian_edit').prepend(

                '<option selected>Blotter Test</option>' +

                '<option>Identifikasi Morfologi</option>' +

                '<option>uji Gram KOH</option>' +

                '<option>Ekstrak / Corong Baerman</option>' +

                '<option>Uji Rujukan</option>' +

                '<option></option>'  

                );

          }else if (patogenID == 'Bakteri') {

              $('#metode_pengujian_edit').empty();
              $('#metode_pengujian_edit').prepend(

                '<option selected>uji Gram KOH</option>' +

                '<option>Blotter Test</option>' +

                '<option>Identifikasi Morfologi</option>' +

                '<option>Ekstrak / Corong Baerman</option>' +

                '<option>Uji Rujukan</option>' +

                '<option></option>'  

                );

          }else if (patogenID == 'Nematoda') {

              $('#metode_pengujian_edit').empty();
              $('#metode_pengujian_edit').prepend(

                '<option selected>Ekstrak / Corong Baerman</option>' +

                '<option>uji Gram KOH</option>' +

                '<option>Blotter Test</option>' +

                '<option>Identifikasi Morfologi</option>' +

                '<option>Uji Rujukan</option>' +

                '<option></option>'  

                );

          }else{


               $('#metode_pengujian_edit').html(

                  '<option></option>' +

                  '<option>Blotter Test</option>' +

                  '<option>Identifikasi Morfologi</option>' +

                  '<option>Uji Gram KOH</option>' +

                  '<option>Ekstrak / Corong Baerman</option>' +

                  '<option>Uji Rujukan</option>'   

                )
          }

        });

      }else{

      $('#target_optk_edit').prepend('<option selected></option>'),
      $('#metode_pengujian_edit').prepend('<option selected></option>');

     }
  });

  $( "#nama_patogen2_edit" ).on('change', function () {
    let patogenID = $(this).val();

      if (patogenID) {

          $.get({
              url: "views/data/SourceDataPatogen.php",
              dataType: 'Json',
              data: {'id':patogenID},
              success: function(data) {
                  $('#target_optk2_edit').empty();
                  $.each(data, function(key, value) {
                      $('#target_optk2_edit').append('<option>'+ value +'</option>');
                });
              }
          });

      }else{

        $('#target_optk2_edit').prepend('<option selected></option>'),
        $('#metode_pengujian2_edit').prepend('<option selected></option>');

      }

    });

  $( "#nama_patogen3_edit" ).on('change', function () {
    let patogenID = $(this).val();

      if (patogenID) {

        $.get({
            url: "views/data/SourceDataPatogen.php",
            dataType: 'Json',
            data: {'id':patogenID},
            success: function(data) {
                $('#target_optk3_edit').empty();
                $.each(data, function(key, value) {
                    $('#target_optk3_edit').append('<option>'+ value +'</option>');
              });
            }
        });

      }else{

        $('#target_optk3_edit').prepend('<option selected></option>'),
        $('#metode_pengujian3_edit').prepend('<option selected></option>');

      }
    });

  $( "#pemohon_edit" ).on('change', function () {
    let pemohonID = $(this).val();
      $.get({
          url: "views/data/SourceDataPemohon.php",
          dataType: 'Json',
          data: {'id':pemohonID},
          success: function(data) {
              $('#nip_edit').empty();
              $.each(data, function(key, value) {
                  $('#nip_edit').append('<option>'+ value +'</option>');
            });
          }
      });
    });


}); /*End ready functions*/

</script>









