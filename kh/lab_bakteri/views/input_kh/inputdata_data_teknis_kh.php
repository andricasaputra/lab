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

include_once('header_input.php');


if(isset($_REQUEST['id'])){

    $id = intval($_REQUEST['id']);

    $d=date("m/Y");

    $tgl_indo = $objectTanggal->tgl_indo(date('Y-m-d'));

    $bln=date('m');

    $thn=date('Y');

    $tampil = $objectData->tampil($id);

    while($data = $tampil->fetch_object()):

      $id                       = $data->id;

      $tanggal_penyerahan       = $data->tanggal_penyerahan;

      $tanggal_penyerahan_lab   = $data->tanggal_penyerahan_lab;

      $tanggal_pengujian        = $data->tanggal_pengujian;

      $rekomendasi              = $data->rekomendasi;

      $nip_penyelia             = $data->nip_penyelia;

      $nip_analis               = $data->nip_analis;

      $ket_kesimpulan           = $data->ket_kesimpulan;

      $penyelia                 = $data->nama_penyelia;

      $analis                   = $data->nama_analis;

      $analis2 = '';

      if (strpos($analis, "&") != false) {
        
        $x = explode("&", $analis);

        $analis = trim($x[0]);

        $analis2 = trim($x[1]);

      }

endwhile;

$bwtcheck = $objectData->checkDataTeknis();


?>


<div class="modal-content">

  <div class="modal-header">

    <h4 class="modal-title"><i class="fa fa-gear fa-fw"></i>Input Data Teknis Pengujian</h4>

    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>

  </div><!-- End Header -->

  <!-- Tabs button -->

  <ul id="tabs">

    <?php if($bwtcheck != 0): ?>

    <li><a id="tab1">Input Info Sampel Pengujian</a></li>

    <?php endif; ?>

    <li><a id="tab2" class="disabled">Input Data Teknis Pengujian</a></li>

  </ul>

  <!-- End Tabs Button -->

  <div class="modal-body" id="modal-edit">

    <!-- check -->

    <?php if($bwtcheck != 0): ?>

    <div id="tab1c" class="showtab">
      <form id="form_input_data_sampel_pengujian">

        <div class="column-half">

          <label class="control-label" for="tanggal_penyerahan_lab">Tanggal Penerimaan Sampel Di Laboratorium</label>

          <input type="text" class="form-control" name="tanggal_penyerahan_lab" id="tanggal_penyerahan_lab_input" value="<?=$tanggal_penyerahan;?>" required>

          <input type="hidden" name="id" id="id_input" value="<?=$id;?>">

        </div>

        <div class="column-half">

          <label class="control-label" for="tanggal_pengujian">Tanggal Pengujian</label>

          <input type="text" class="form-control" name="tanggal_pengujian" id="tanggal_pengujian_input" value="<?=$tgl_indo?>" required>

        </div>

        <div class="column-half">

          <label class="control-label" for="rekomendasi">Rekomendasi</label>

          <textarea class="form-control" name="rekomendasi" id="rekomendasi_input" rows="3" required>-</textarea>

        </div>

        <div class="column-half">

          <label class="control-label" for="ket_kesimpulan">Keterangan/Simpulan</label>

          <textarea class="form-control" name="ket_kesimpulan" id="ket_kesimpulan_input" rows="3" required>-</textarea>

        </div>

        <div class="column-half">

          <label class="control-label" for="nama_penyelia">Penyelia</label>

           <select class="form-control" name="nama_penyelia" id="nama_penyelia_input" required> 

            <option><?php echo $penyelia; ?></option>

                  <?php 

                  $i = $objectData->tampil_pejabat();

                  while ($t=$i->fetch_object()) : 

                      echo '<option value="'.$t->nama_pejabat.'">'.$t->nama_pejabat.'</option>';

                  endwhile;

                  ?>

          </select>

        </div>

        <div class="column-half">

          <label class="control-label" for="nama_analis">Analis</label>

           <select class="form-control" name="nama_analis" id="nama_analis_input" required>
            <option><?php echo $analis; ?></option>

                  <?php 

                  $i = $objectData->tampil_pejabat();

                  while ($t=$i->fetch_object()) : 

                      echo '<option value="'.$t->nama_pejabat.'">'.$t->nama_pejabat.'</option>';

                  endwhile;

                  ?>

          </select>

        </div>


        <div class="column-half">

          <label class="control-label" for="nip_penyelia">NIP Penyelia</label>

            <select class="form-control" name="nip_penyelia" id="nip_penyelia_input" required>

                  <?php 

                    $i = $objectData->tampil_jabfung();

                    while ($t=$i->fetch_object()) : 

                      if ($t->nama_pejabat == $penyelia) : ?>

                        <option value="<?=$t->nip ;?>" selected><?=$t->nip ;?></option>

                  <?php endif; endwhile;?>

            </select>

        </div>

        <div class="column-half">

          <label class="control-label" for="nip_analis">NIP Analis</label>

            <select class="form-control" name="nip_analis" id="nip_analis_input" required>

                  <?php 

                    $i = $objectData->tampil_jabfung();

                    while ($t=$i->fetch_object()) : 

                      if ($t->nama_pejabat == $analis) : ?>

                        <option value="<?=$t->nip ;?>" selected><?=$t->nip ;?></option>

                  <?php endif; endwhile;?>

            </select>

        </div>


        <div id="showAnalis2">

        <?php  

          if ($analis2 != '') { ?>

            <div class="column-full">

              <label class="control-label" for="analis2">Analis 2</label>

               <select class="form-control" name="analis2" id="analis2" style="pointer-events: none;"> 

                <option><?= $analis2; ?></option>

                  <?php 

                    $i = $objectData->tampil_jabfung();

                   while ($t=$i->fetch_object()) : ?>


                    <option><?=$t->nama_pejabat ;?></option>


                <?php endwhile;?>

              </select>

            </div>

            <div class="column-full">

              <label class="control-label" for="nip_analis2">NIP Analis 2</label>

              <select class="form-control" name="nip_analis2" id="nip_analis2" style="pointer-events: none;">

                  <?php 

                    $i = $objectData->tampil_jabfung();

                    while ($t=$i->fetch_object()) : 

                      if ($t->nama_pejabat == $analis2) : ?>

                        <option value="<?=$t->nip ;?>" selected><?=$t->nip ;?></option>

                  <?php endif; endwhile;?>

            </select>

            </div>


        <?php  } ?>

        </div>

        <div class="column-half">

          <label>Scan Tanda Tangan Penyelia</label>

          <br>

            <label class="checkbox-inline">
              <input type="checkbox" name="ttd_penyelia_data_teknis" value="Ya">Ya
            </label>

            <label class="checkbox-inline">
              <input type="checkbox" name="ttd_penyelia_data_teknis" checked value="Tidak">Tidak
            </label>


        </div>


        <div class="column-half">

          <label>Scan Tanda Tangan Analis</label>

          <br>

            <label class="checkbox-inline">
              <input type="checkbox" name="ttd_analis_data_teknis" value="Ya">Ya
            </label>

            <label class="checkbox-inline">
              <input type="checkbox" name="ttd_analis_data_teknis" checked value="Tidak">Tidak
            </label>

            
        </div>

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

      <form id="form_input_data_pengujian">

        <div class="column-full">
            
            <table>

              <tr>
                <th>1</th>
                <th>2</th>
                <th>3</th>
                <th>4</th>
                <th>5</th>
                <th>6</th>
                <th>7</th>
              </tr>

              <tr>
                <td>A</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
              </tr>


            </table>

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

 
<?php
}
?>

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
    
    $("#form_input_data_sampel_pengujian").on("submit", (function(e){

         e.preventDefault();

         $.ajax({

           url :'lab_bakteri/models/proses_input_data_teknis_kh.php',

           type :'POST',

           data : new FormData (this),

           contentType : false,

           cache : false,

           processData : false,

           success : function(){

                $('#tb_data_teknis_kh').DataTable().ajax.reload(null, false),

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
           }  
         })

      }));

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

      $( "#nama_analis_input" ).on('change', function () {
        let pejabatID = $(this).val();

            $.get({
                url: "lab_bakteri/views/data_kh/SourceDataPemohon_kh.php",
                dataType: 'Json',
                data: {'id':pejabatID},
                success: function(data) {
                    $('#nip_analis_input').empty();
                    $.each(data, function(key, value) {
                        $('#nip_analis_input').append('<option>'+ value +'</option>');
                  });
                }
            });

      });

   });

</script>






