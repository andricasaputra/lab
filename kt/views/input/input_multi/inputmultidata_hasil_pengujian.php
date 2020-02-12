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

.typeahead { 
	z-index: 1051; 
}

#tab1c select, #tab1c input{
	margin-bottom: 10px;
}

#fortab1, #fortab1 {
	margin-top: 100px;
}
  
</style>

<?php

include_once('../header_input.php');

if(isset($_REQUEST['id'])):

    $id = intval($_REQUEST['id']);

    $d=date("m/Y");

    $tgl_indo = $objectTanggal->tgl_indo(date('Y-m-d'));

    $bln=date('m');

    $thn=date('Y');

    $tampil = $objectData->tampil($id);

    $tampil2 = $objectData->tampil($id);

    while($data = $tampil->fetch_object()):

      $id                       = $data->id;

      $kode_sampel              = $data->kode_sampel;

      $nip_penyelia             = $data->nip_penyelia;

      $nip_analis               = $data->nip_analis;

      $penyelia                 = $data->nama_penyelia;

      $analis                   = $data->nama_analis;

      $mt                       = $data->mt;

      $nip_mt                   = $data->nip_mt;

      $ket_kesimpulan           = $data->ket_kesimpulan;

      $no_sertifikat            = $data->no_sertifikat;

      $tanggal_sertifikat       = $data->tanggal_sertifikat;

      $rekomendasi              = $data->rekomendasi;

      $kepala_plh               = $data->kepala_plh;

      $nip_kepala_plh           = $data->nip_kepala_plh;

      $target                   = $data->nama_patogen;

      $nama_sampel				      = $data->nama_sampel;

      $target_optk 				      = $data->target_optk;

      $target_optk2 			      = $data->target_optk2;

      $target_optk3 			      = $data->target_optk3;

      $satuan 					        = $data->satuan;

      $jumlah_sampel            = $data->jumlah_sampel;

      $tanggal_pengujian        = $data->tanggal_pengujian;


      $qu2 = $objectHasil->input_ulang($id);

      $num = $qu2->num_rows; 

      $tgl_acu = date("Y-m-d");

      $jum = $data->jumlah_sampel - $num;

      $j = $data->no_sampel ;

      $x = explode("-", $j);

      if($jum != 1){

          $k = $x[0];

          $l = end($x);

          $r = range($k, $l);

      }else{

          $r = $x;

      }


endwhile;

$kosong = $objectNomor->KosongdataSertifikat();

/*set nomor sertifikat*/

if ($kosong->num_rows != 0) {

	while ($dataSertifikat = $kosong->fetch_object()) {

		$no_sertifikat = $dataSertifikat->no_sertifikat;

		$ex = explode("/", $no_sertifikat);

	}

	$isiNomor = (int)$ex[0] + 1;

}else{

  	$isiNomor = 1;

}

$checkHasil = $objectHasil->checkHasilPengujian($id);

$bwtcheck = $checkHasil->num_rows;


?>

<div class="modal-content">
  <div class="modal-header">

    <h4 class="modal-title"><i class="fa fa-gear fa-fw"></i>Input Data Hasil Pengujian</h4>

    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>

  </div><!-- End Header -->

  <!-- Tabs button -->


  <!-- INFO -->
  <div class="alert alert-success" style="margin-left: auto; margin-right: auto;width: 95%">

  	<strong>Kode Sampel :</strong> <?= $kode_sampel; ?><br>
    <strong>Nama Sampel :</strong> <?= $nama_sampel; ?><br>
    <?php if ($target_optk2 != '' && $target_optk3 !=''): ?>

    	<strong>Target Pengujian :</strong> <?= $target; ?> (<i><?=$target_optk;?>, <?=$target_optk2 ?>, <?=$target_optk3 ?></i>)<br>

    <?php elseif ($target_optk2 != ''):?>
    	
    	<strong>Target Pengujian :</strong> <?= $target; ?> (<i><?=$target_optk;?> & <?=$target_optk2 ?></i>)<br>

    <?php else:?> 

    	<strong>Target Pengujian :</strong> <?= $target; ?> (<i><?=$target_optk;?></i>)<br>

    <?php endif ?>
    
    <strong>Jumlah Sampel :</strong> <?= $jumlah_sampel." ".$satuan; ?>

  </div>

  <!-- Tabs Button -->
  <ul id="tabs">

    <?php if($bwtcheck == 0): ?>

    <li><a id="tab1">Input Hasil Pengujian</a></li>

    <?php endif; ?>

    <li><a id="tab2" class="disabled">Input Info Sertifikat</a></li>

  </ul>

  <div class="modal-body" id="modal-edit">

  	<!-- check -->

    <?php if($bwtcheck == 0): ?>

    <div id="tab1c" class="showtab">
      <form id="form_input_multi_hasil_pengujian">

        <div class="column-full">

          <label class="control-label" for="tanggal_pengujian">Tanggal Pengujian</label>

          <input type="text" class="form-control" name="tanggal_pengujian" id="tanggal_pengujian_input" value="<?=$tanggal_pengujian?>">

        </div>

        <div class="column-full">

	        <div class="column-tigaperempat">

	          <label class="control-label" for="no_sampel">Nomor Sampel</label>                 

	            <input type="hidden"  name="hasil_pengujian2" id="hasil_pengujian2" value="terinput">  

	            	<input type="hidden"  name="id2" id="id2_input" value="<?=$id;?>">

	              <?php foreach ($r as $no_sampel): ?>

	              	<input type="number" class="form-control" name="no_sampel[]" id="no_sampel" value="<?=$no_sampel;?>"   readonly>


	              <?php endforeach ?>

	              <?php while ($data2 = $tampil2->fetch_object()) : ?>

	              	<input type="hidden"  name="tanggal_acu_hasil" id="tanggal_acu_hasil" value="<?=date('Y-m-d');?>">

		            <input type="hidden"  name="bagian_tumbuhan" id="bagian_tumbuhan" value="<?=$data2->bagian_tumbuhan?>">
		            <input type="hidden"  name="vektor" id="vektor" value="<?=$data2->vektor?>">

		            <input type="hidden"  name="media" id="media" value="<?=$data2->media?>">

		            <input type="hidden"  name="target_optk" id="target_optk" value="<?=$data2->target_optk?>">

		            <input type="hidden"  name="target_optk2" id="target_optk2" value="<?=$data2->target_optk2?>">

		            <input type="hidden"  name="target_optk3" id="target_optk3" value="<?=$data2->target_optk3?>">

		            <input type="hidden"  name="metode_pengujian" id="metode_pengujian" value="<?=$data2->metode_pengujian?>">

		            <input type="hidden"  name="metode_pengujian2" id="metode_pengujian2" value="<?=$data2->metode_pengujian2?>">
		            
		            <input type="hidden"  name="metode_pengujian3" id="metode_pengujian3" value="<?=$data2->metode_pengujian3?>">

		            <?php endwhile; ?>

	          
	        </div>

	        <div class="column-tigaperempat">

	          <label class="control-label" for="positi_negatif">
	            Positif/Negatif </label>

	          <?php foreach ($r as $no_sampel): ?>

	          <select class="form-control" name="positif_negatif[]" id="positif_negatif"  >

	              <option>Negatif</option>

	              <option>Positif</option>

	          </select>

	          <?php endforeach ?>

	        </div>

	        <div class="column-half">

	          <label class="control-label" for="positi_negatif">
	            Hasil Identifikasi 
	          </label>

	          <?php foreach ($r as $no_sampel): ?>

	          <em><input type="text" class="form-control typeahead" name="hasil_pengujian[]" id="hasil_pengujian" autocomplete="off" required style="width: 135%"></em>

	          <?php endforeach ?>

	        </div>

        </div><!-- Edn Column full For Input Pengujian -->

        <div class="column-full">

          <div class="col-md-2 col-md-offset-10">

            <button type="submit" id="fortab1" class="btn-default2 btn-success" name="edit" value="edit"><i class="fa fa-check-circle fa-fw" aria-hidden="true"></i>&nbsp;Simpan</button>

          </div>

        </div>

      </form><!-- End Form 1 -->

    </div><!-- End tab 1 -->

  <?php endif; ?>

  	<div id="tab2c" class="showtab">

      <form id="form_input_sertifikat_multi_hasil_pengujian">

        <div class="column-full">

          <input type="hidden" name="tanggal_pengujian2" id="tanggal_pengujian_input2" value="<?=$tgl_indo?>">

          <input type="hidden" name="tanggal_sertifikat" id="tanggal_sertifikat_input" value="<?=$tgl_indo?>">


          <input type="hidden"  name="id" id="id_input" value="<?=$id;?>">    

          <label class="control-label" for="no_sertifikat">Nomor Sertifikat</label>


           <?php 


	          if ($target == 'Serangga' || $target == 'Myte/Tungau' || $target == 'Lalat Buah') { ?>

	              <input type="text" class="form-control" name="no_sertifikat" id="no_sertifikat_input" value="<?= $isiNomor?>/LAB.H/<?=$bln?>/<?=$thn?>" required>

	         <?php }else{ ?>

	               <input type="text" class="form-control" name="no_sertifikat" id="no_sertifikat_input" value="<?= $isiNomor?>/LAB.P/<?=$bln?>/<?=$thn?>" required>

	        <?php  } ?>



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

          <label class="control-label" for="kepala_plh">Kepala/Plh/MT</label>

          <select class="form-control" name="kepala_plh" id="kepala_plh_input" required>


              <?php 

              $i = $objectData->tampil_pejabat();

              while ($t=$i->fetch_object()) : 

          		if ($t->nama_pejabat == $mt) {

          			echo '<option value="'.$t->nama_pejabat.'" selected>'.$t->nama_pejabat.'</option>';
          		}else{

          			echo '<option value="'.$t->nama_pejabat.'">'.$t->nama_pejabat.'</option>';

          		}

                  

              endwhile;

              ?>                                

            </select>

        </div>
          
        <div class="column-half">

          <label class="control-label" for="nama_penyelia">Penyelia</label>

           <select type="text" class="form-control" name="nama_penyelia" id="nama_penyelia_input" required>

                <?php 

                $i = $objectData->tampil_pejabat();

                while ($t=$i->fetch_object()) : 

                    if ($t->nama_pejabat == $penyelia) {

	          			echo '<option value="'.$t->nama_pejabat.'" selected>'.$t->nama_pejabat.'</option>';
	          		}else{

	          			echo '<option value="'.$t->nama_pejabat.'">'.$t->nama_pejabat.'</option>';

	          		}

                endwhile;

                ?>  

           </select>

        </div>

        <div class="column-half">

              <label class="control-label" for="nip_kepala_plh">NIP Kepala/Plh/MT</label>

                <select class="form-control" name="nip_kepala_plh" id="nip_kepala_plh_input" required>

                	<?php 

	                $i = $objectData->tampil_pejabat();

	                while ($t=$i->fetch_object()) : 

	                    if ($t->nama_pejabat == $mt) {

		          			echo '<option value="'.$t->nip_pejabat.'" selected>'.$t->nip_pejabat.'</option>';
		          		}else{

		          			echo '<option value="'.$t->nip_pejabat.'">'.$t->nip_pejabat.'</option>';

		          		}

	                endwhile;

	                ?>  

                </select>

          </div>

          <div class="column-half">

              <label class="control-label" for="nip_penyelia">NIP Penyelia</label>

                <select class="form-control" name="nip_penyelia" id="nip_penyelia_input" required>

                	<?php 

		                $i = $objectData->tampil_pejabat();

		                while ($t=$i->fetch_object()) : 

		                    if ($t->nama_pejabat == $penyelia) {

			          			echo '<option value="'.$t->nip_pejabat.'" selected>'.$t->nip_pejabat.'</option>';
			          		}

		                endwhile;

	                ?> 


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

                <button type="submit" id="fortab2" class="btn-default2 btn-success" name="edit" value="edit"><i class="fa fa-check-circle fa-fw" aria-hidden="true"></i>&nbsp;Simpan</button>

              </div>

            </div>

      </form><!-- End Form 2 -->

    </div><!-- End tab 2 -->


  </div><!-- End Modal Body -->


  <div class="modal-footer"> </div><!-- End Footer -->
  
</div>


<?php endif; ?>


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
    
    $("#form_input_multi_hasil_pengujian").on("submit", (function(e){

         e.preventDefault();

         $.ajax({

           url :'models/input_multi/proses_input_multi_hasil_pengujian.php',

           type :'POST',

           data : new FormData (this),

           contentType : false,

           cache : false,

           processData : false,

           success : function(response){

              if (response != 'nodata') {

                  $('#tb_hasil_pengujian').DataTable().ajax.reload(null, false),

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

                  $('#tb_hasil_pengujian').DataTable().ajax.reload(null, false),

                  swal({

                    title: "Perhatian",

                    text: "Tidak Ada Data Untuk Diinput!",

                    type: "error"

                  }).then(function(){

                    $('#modal_input_multi_hasil_pengujian').modal('hide')

                  });

            }/*Endif*/

           }  
         })

    }));

    $("#form_input_sertifikat_multi_hasil_pengujian").on("submit", (function(e){

         e.preventDefault();

         $.ajax({

           url :'models/input_multi/proses_input_mult_sertifikat_hasil_pengujian.php',

           type :'POST',

           data : new FormData (this),

           contentType : false,

           cache : false,

           processData : false,

           success : function(response){

              if (response == 'nodata') {

                 $('#tb_hasil_pengujian').DataTable().ajax.reload(null, false),

                  swal({

                    title: "Perhatian",

                    text: "Tidak Ada Data Untuk Diinput!",

                    type: "error"

                  }).then(function(){

                    $('#modal_input_hasil_pengujian').modal('hide')

                  });

                
              }else if (response == 'false') {


                  swal({

                    title: "",

                    text: "No Sertifikat Sudah Pernah Dipakai",

                    type: "info"

                  });

                
              }else{

              	  $('#tb_hasil_pengujian').DataTable().ajax.reload(null, false),

                  swal({

                    title: "Sukses",

                    text: "Data Berhasil Di Input",

                    type: "success"

                  }).then(function(){

                    $('#modal_input_hasil_pengujian').modal('hide')

                  });
 

            }/*Endif*/
           }  
         })

      }));

      $( "#kepala_plh_input" ).on('change', function () {
        let pejabatID = $(this).val();

            $.get({
                url: "views/data/SourceDataPemohon.php",
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
                url: "views/data/SourceDataPemohon.php",
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


      $('.typeahead').typeahead({
		  source: function(query, result){
		   $.ajax({
		    url:"views/data/SourceHasilIdentifikasi.php",
		    method:"POST",
		    data:{hasil:query},
		    dataType:"json",
		    success:function(data){

		     result($.map(data, function(item){

		      return item;

		     }));

		    }

		   })
		  },/*End Function*/
		  items : 8,
		  fitToElement : true
		 });

   });

</script>









