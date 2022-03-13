<style type="text/css">
  #tabs {

   width: 100%;
   height:33px; 
   border-bottom: solid 1px #CCC;
   padding-right: 2px;
   margin-top: 30px;
   

}
a {
  cursor:pointer;
}

#tabs li {
    float:left; 
    list-style:none; 
    border-top:1px solid #ccc; 
    border-left:1px solid #ccc; 
    border-right:1px solid #ccc; 
    margin-right:5px; 
    outline:none;
    width: 250px;
    text-align: center;
    margin-bottom: 30px
}

#tabs li a {

    font-size: small;
    font-weight: bold; 
    color: #fff;;
    padding-top: 5px;
    padding-left: 7px;
    padding-right: 7px;
    padding-bottom: 8px; 
    display:block; 
    background: #FFF;
    text-decoration:none;
    outline:none;
    text-align: center;
    background: #3C763D;
  
}

#tabs li a.inactive{
    padding-top:5px;
    padding-bottom:8px;
    padding-left: 8px;
    padding-right: 8px;
    color:#666666;
    background: #EEE;
    outline:none;
    border-bottom: solid 1px #CCC;

}

#tabs li a:hover, #tabs li a.inactive:hover {
    color: #000;
}

a.disabled {
   cursor: not-allowed;
   pointer-events: none;
}
  
</style>

<?php

include_once('../header_input.php');

$d = date("m/Y");

$tgl_indo = $objectTanggal->tgl_indo(date('Y-m-d'));

$bln = date('m');

$thn = date('Y');

$tgl_acu = date("Y-m-d");

$getLastData = $objectData->infoHasilPengujian("select");

/*Dipakai Ketika Hasil Sudah Diinput Tetapi Info Sertifikat Belum Agar Tidak return semua hasil yang sudah terinput*/

$getLastDataOfHasil = $objectData->infoHasilPengujian("anotherselect");

$lastData = $objectData->infoHasilPengujian("1");

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

$data = array();

$getNoSertifikat = $objectData->infoHasilPengujian("getid");

$arrNoSertifikat = array();

if ($getNoSertifikat->num_rows == 0) {

    $newNomor = 0;
    
}else{

    while ($nosert = $getNoSertifikat->fetch_object()) :

      $no_sertifikat = $nosert->no_sertifikat;

      $setnew = explode("/", $no_sertifikat);

      $newNomor = $setnew[0];

    endwhile; 

}

for ($i= $newNomor + 1; $i <= $newNomor + $getLastDataOfHasil->num_rows ; $i++) : 
      $arrNoSertifikat[] = $i."/LAB.B/$bln/$thn";
endfor;

while ($last = $getLastData->fetch_object()) :

if ($last->jumlah_sampel > 100) :
  
  echo 
  '<script>swal({

    title: "Perhatian!",

    text: "Nomor Sampel Yang Akan Anda Input Lebih Dari 100, Harap Tidak Menggunakan Multiple Input Ini!",

    type: "info"

  }).then(function (){

    location.reload();
    
  });</script>';

  return false;

endif;

$penyelia = $last->nama_penyelia;

$analis = $last->nama_analis;

$tanggal_pengujian  =  $last->tanggal_pengujian;

$rekomendasi = $last->rekomendasi;

$ket_kesimpulan = $last->ket_kesimpulan;

$nip_penyelia = $last->nip_penyelia;

$nip_analis = $last->nip_analis;

$mt = $last->mt;

$nip_mt = $last->nip_mt;

$target1 = $last->target_pengujian2;

$no_sampel = $last->no_sampel;

if (strpos($last->nama_sampel, "Bibit") !== false) {

  $n = array();

  if ($last->jumlah_sampel != 1) {

    $ex = explode("-", $no_sampel);

    $noAwal = ltrim($ex[0], "0");

    $noAkhir = ltrim(end($ex), "0");

    for ($i = $noAwal; $i <= $noAkhir; $i++) { 
      
        $n[] = "0".ltrim($i, "0");

    }

    $no_sampels = $n;
    
  }else{

    $n[] = $last->no_sampel;

    $no_sampels = $n;

  }


}else{

  $ex = explode("-", $no_sampel);

  $noAwal = $ex[0];

  $noAkhir = end($ex);

  $no_sampels = range($noAwal, $noAkhir);

}

  /*Array data untuk input hasil pengujian*/

    $data[$last->id] = [

      "id" => $last->id,
      "jumlahSampel" => $last->jumlah_sampel,
      "kode_sampel"=> $last->kode_sampel,
      "no_sampel" => $no_sampels,
      "target1" => $target1

    ];

endwhile;

$data2 = array();

while ($lastHasil = $getLastDataOfHasil->fetch_object()) :

$penyelia = $lastHasil->nama_penyelia;

$analis = $lastHasil->nama_analis;

$tanggal_pengujian  =  $lastHasil->tanggal_pengujian;

$rekomendasi = $lastHasil->rekomendasi;

$ket_kesimpulan = $lastHasil->ket_kesimpulan;

$nip_penyelia = $lastHasil->nip_penyelia;

$nip_analis = $lastHasil->nip_analis;

$mt = $lastHasil->mt;

$nip_mt = $lastHasil->nip_mt;

$target1 = $lastHasil->target_pengujian2;

$no_sampel = $lastHasil->no_sampel;

if (strpos($no_sampel, "-") !== false) {

  $ex = explode("-", $no_sampel);

  $noAwal = $ex[0];

  $noAkhir = end($ex);

  $no_sampels = range($noAwal, $noAkhir);

}else{

  $no_sampels = $no_sampel;

}

     /*Array data2 untuk input info sertifikat*/

    $data2[$lastHasil->id] = [

      "id" => $lastHasil->id,
      "jumlahSampel" => $lastHasil->jumlah_sampel,
      "kode_sampel"=> $lastHasil->kode_sampel,
      "no_sampel" => $no_sampels,
      "target1" => $target1

    ];

  
endwhile;

$checkHasil = $objectHasil->checkHasilPengujian();

$checkHasilBibit = $objectHasil->checkHasilPengujianBibit();

$bwtcheck = $checkHasil->num_rows;

$bwtcheckBibit = $checkHasilBibit->num_rows;


?>

<div class="modal-content">

  <div class="modal-header">

    <h4 class="modal-title"><i class="fa fa-gear fa-fw"></i>Input Multiple Data Hasil Pengujian</h4>

    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>

  </div><!-- End Header -->

  <!-- Tabs button -->

  <ul id="tabs">

    <?php if($bwtcheck == 0 && $bwtcheckBibit == 0): ?>

    <li><a id="tab1">Input Hasil Pengujian</a></li>

    <?php endif; ?>

    <li><a id="tab2" class="disabled">Input Info Sertifikat</a></li>

  </ul>

  <!-- End Tabs Button -->

  <div class="modal-body" id="modal-edit">

    <!-- check -->

    <?php if($bwtcheck == 0 && $bwtcheckBibit == 0): ?>

    <div id="tab1c" class="showtab">
      <form id="form_input_multi_hasil_pengujian">

        <div class="column-full">

          <label class="control-label" for="tanggal_pengujian">Tanggal Pengujian</label>

          <input type="text" class="form-control" name="tanggal_pengujian" id="tanggal_pengujian_input" value="<?=$tgl_indo?>">

        </div>

        <?php foreach ($data as $subdata): ?>

        <div class="column-half">

          <label class="control-label" for="no_sampel">Nomor Sampel <i style="font-weight: normal;">(Kode Sampel <?=$subdata['kode_sampel']?>)</i></label>                 

            <input type="hidden"  name="hasil_pengujian" id="hasil_pengujian" value="terinput">  

            <?php foreach ($subdata['no_sampel'] as $no_sampel): ?>
              <!-- id2 == untuk insert ke tb hasil_kh -->
              <input type="hidden"  name="id2[]" id="id2_input" value="<?=$subdata['id'];?>">

              <input type="number" class="form-control" name="no_sampel[]" id="no_sampel" value="<?=$no_sampel;?>"  style="margin-bottom: 10px" readonly>

              <input type="hidden"  name="tanggal_acu_hasil[]" id="tanggal_acu_hasil" value="<?=$tgl_acu?>">

            <?php endforeach; ?>
          
        </div>

        <div class="column-half">

          <label class="control-label" for="positi_negatif">
            Positif/Negatif 
             <i style="font-weight: normal;"><?php echo $subdata['target1']; ?></i>
          </label>
          <?php foreach ($subdata['no_sampel'] as $no_sampel): ?>

          <select class="form-control" name="positif_negatif[]" id="positif_negatif" style="margin-bottom: 10px" >

              <option>Negatif</option>

              <option>Positif</option>

          </select>

          <?php endforeach; ?>
        </div>


        <?php endforeach; ?> <!-- End Foreach Data -->

        <div class="column-full">

          <div class="col-md-2 col-md-offset-10">

            <button type="submit" id="fortab1" class="btn-default2 btn-success" name="edit" value="edit"><i class="fa fa-check-circle fa-fw" aria-hidden="true"></i>&nbsp;Simpan Multiple</button>

          </div>

        </div>

      </form><!-- End Form 1 -->

    </div><!-- End tab 1 -->

  <?php endif; ?>

    <!-- start Tab 2 -->

    <div id="tab2c" class="showtab">

      <form id="form_input_sertifikat_multi_hasil_pengujian">

        <div class="column-full">

          <input type="hidden" name="tanggal_pengujian" id="tanggal_pengujian_input" value="<?=$tgl_indo?>">

          <input type="hidden" name="tanggal_sertifikat" id="tanggal_sertifikat_input" value="<?=$tgl_indo?>">

          <?php foreach($data2 as $subdata2): ?>

          <input type="hidden"  name="id[]" id="id_input" value="<?=$subdata2['id'];?>">    

          <?php endforeach; ?>

          <label class="control-label" for="no_sertifikat">Nomor Sertifikat</label>

          <?php foreach ($arrNoSertifikat as $no_sertifikat): ?>

            <input type="text" class="form-control" name="no_sertifikat[]" id="no_sertifikat_input" value="<?=$no_sertifikat;?>" required style="margin-bottom: 10px">

          <?php endforeach; ?>

        </div>

         <div class="column-half">

          <label class="control-label" for="ket_kesimpulan">Keterangan/Simpulan</label>

          <textarea class="form-control" name="ket_kesimpulan" id="ket_kesimpulan_input" rows="3" required><?php echo $ket_kesimpulan; ?></textarea>

        </div>      

        <div class="column-half">

          <label class="control-label" for="rekomendasi">Rekomendasi</label>

          <textarea class="form-control" name="rekomendasi" id="rekomendasi_input" rows="3" required><?php echo $rekomendasi; ?></textarea>

        </div>

        <div class="column-half">

          <label class="control-label" for="kepala_plh">Ketua Pokja KH & KT</label>

          <select class="form-control" name="kepala_plh" id="kepala_plh_input" required>

            <option><?php echo $mt; ?></option>

              <?php 

              $i = $objectDataParasit->tampil_pejabat();

              while ($t=$i->fetch_object()) : 

                  echo '<option value="'.$t->nama_pejabat.'">'.$t->nama_pejabat.'</option>';

              endwhile;

              ?>                                

            </select>

        </div>
          
        <div class="column-half">

          <label class="control-label" for="nama_penyelia">Penyelia</label>

           <select type="text" class="form-control" name="nama_penyelia" id="nama_penyelia_input" required>

                <option><?php echo $penyelia; ?></option>

                <?php 

                $i = $objectDataParasit->tampil_pejabat();

                while ($t=$i->fetch_object()) : 

                    echo '<option value="'.$t->nama_pejabat.'">'.$t->nama_pejabat.'</option>';

                endwhile;

                ?>  

           </select>

        </div>

        <div class="column-half">

              <label class="control-label" for="nip_kepala_plh">NIP Ketua Pokja KH & KT</label>

                <select class="form-control" name="nip_kepala_plh" id="nip_kepala_plh_input" required>

                      <option><?php echo $nip_mt; ?></option>

                </select>

          </div>

          <div class="column-half">

              <label class="control-label" for="nip_penyelia">NIP Penyelia</label>

                <select class="form-control" name="nip_penyelia" id="nip_penyelia_input" required>

                      <option><?php echo $nip_penyelia; ?></option>


                </select>

          </div>

          <div class="column-half">

              <label>Scan Tanda Tangan MT</label>

              <br>

                <label class="checkbox-inline">
                  <input type="checkbox" name="ttd_mt_hasil_uji" value="Ya">Ya
                </label>

                <label class="checkbox-inline">
                  <input type="checkbox" name="ttd_mt_hasil_uji" checked value="Tidak">Tidak
                </label>
              
            </div>

            <div class="column-half">

              <label>Scan Tanda Tangan Penyelia</label>

              <br>

                <label class="checkbox-inline">
                  <input type="checkbox" name="ttd_penyelia_hasil_uji" value="Ya">Ya
                </label>

                <label class="checkbox-inline">
                  <input type="checkbox" name="ttd_penyelia_hasil_uji" checked value="Tidak">Tidak
                </label>

            </div>

            <div class="column-full">

              <div class="col-md-2 col-md-offset-10">

                <button type="submit" id="fortab2" class="btn-default2 btn-success" name="edit" value="edit"><i class="fa fa-check-circle fa-fw" aria-hidden="true"></i>&nbsp;Simpan Multiple</button>

              </div>

            </div>

      </form><!-- End Form 2 -->

    </div><!-- End tab 2 -->

  </div><!-- End Body -->

  <div class="modal-footer"> </div><!-- End Footer -->

</div><!-- End Content -->


<script>

  $(document).ready(function(e){
    
    $('#tabs li a:not(:first)').addClass('inactive');

      $('.showtab').hide();

      $('.showtab:first').show();

      $('#fortab1').show();
          
      $('#tabs li a').click(function(){

          let t = $(this).attr('id');

          if($(this).hasClass('inactive')){ 

            $('#tabs li a').addClass('inactive'); 

            $('#fortab2').show();       

            $(this).removeClass('inactive'); 

            $('.showtab').hide();

            $('#fortab1').hide();

            $('#'+ t + 'c').fadeIn('slow');

         }
    });

    $("#fortab1").click(function(){
        $(this).css("pointer-events", "none");
    });
    
    $("#form_input_multi_hasil_pengujian").on("submit", (function(e){

         e.preventDefault();

         $.ajax({

           url :'lab_bakteri/models/input_multi/proses_input_multi_hasil_pengujian_kh.php',

           type :'POST',

           data : new FormData (this),

           contentType : false,

           cache : false,

           processData : false,

           success : function(response){

              console.log(response);

              if (response != 'nodata') {

                  $('#tb_hasil_pengujian_kh').DataTable().ajax.reload(null, false),

                  swal({

                    title: "Sukses",

                    text: "Data Berhasil Di Input",

                    type: "success"

                  }).then(function(){


                    /*For Tab Nested*/

                    $("#tab1").addClass("disabled");

                    $("#tab1c").remove();

                    $("#tab2").removeClass("disabled");

                    $("#tab2").trigger('click');

                  });

                
              }else{

                  $('#tb_hasil_pengujian_kh').DataTable().ajax.reload(null, false),

                  swal({

                    title: "Perhatian",

                    text: "Tidak Ada Data Untuk Diinput!",

                    type: "error"

                  }).then(function(){

                    $('#modal_input_multi_hasil_pengujian_kh').modal('hide')

                  });

            }/*Endif*/

           }  
         })

    }));

    $("#fortab2").click(function(){
        $(this).css("pointer-events", "none");
    });

    $("#form_input_sertifikat_multi_hasil_pengujian").on("submit", (function(e){

         e.preventDefault();

         $.ajax({

           url :'lab_bakteri/models/input_multi/proses_input_mult_sertifikat_hasil_pengujian_kh.php',

           type :'POST',

           data : new FormData (this),

           contentType : false,

           cache : false,

           processData : false,

           success : function(response){

              console.log(response);

              if (response != 'nodata') {

                  $('#tb_hasil_pengujian_kh').DataTable().ajax.reload(null, false),

                  swal({

                    title: "Sukses",

                    text: "Data Berhasil Di Input",

                    type: "success"

                  }).then(function(){

                    $('#modal_input_multi_hasil_pengujian_kh').modal('hide')

                  });

                
              }else{

                  $('#tb_hasil_pengujian_kh').DataTable().ajax.reload(null, false),

                  swal({

                    title: "Perhatian",

                    text: "Tidak Ada Data Untuk Diinput!",

                    type: "error"

                  }).then(function(){

                    $('#modal_input_multi_hasil_pengujian_kh').modal('hide')

                  });

            }/*Endif*/

           }  
         })

      }));

      $( "#kepala_plh_input" ).on('change', function () {
        let pejabatID = $(this).val();

            $.get({
                url: "lab_bakteri/views/data_kh/SourceDataPemohon_kh.php",
                dataType: 'Json',
                data: {'id':pejabatID},
                success: function(data) {
                    $('#nip_kepala_plh_input').empty();
                    $.each(data, function(key, value) {
                        $('#nip_kepala_plh_input').append('<option>'+ value +'</option>');
                  });
                }
            });

      });

      $( "#nama_penyelia_input" ).on('change', function () {
        let pejabatID = $(this).val();

            $.get({
                url: "lab_bakteri/views/data_kh/SourceDataPemohon_kh.php",
                dataType: 'Json',
                data: {'id':pejabatID},
                success: function(data) {
                    $('#nip_penyelia_input').empty();
                    $.each(data, function(key, value) {
                        $('#nip_penyelia_input').append('<option>'+ value +'</option>');
                  });
                }
            });

      });

   });

</script>







