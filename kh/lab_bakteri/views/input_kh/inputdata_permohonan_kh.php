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

<style type="text/css">
	.bootstrap-select .btn {
	  background-color: #fff;
	  margin-top:-0.5px;
	  border:1px solid #bfbfbf;
	  color: #000;
	  outline: none;
	}
</style>

<!--Input Data-->

<div id="modal_input_permohonan_kh" class="modal fade" role="dialog">

    <div class="modal-dialog"> 

		<div class="modal-content">

			<div class="modal-header">

				<button type="button" class="close" data-dismiss="modal">&times;</button>

				<h4 class="modal-title"><i class="fa fa-gear fa-fw"></i>Tambah Data Permohonan Pengujian</h4>
			</div>


		<form id="form_input_permohonan_kh">

		<div class="modal-body">

			<div id="responsive-form" class="clearfix" autocomplete="on">

					<?php 

						$tgl_indo = $objectTanggal->tgl_indo(date('Y-m-d'));

						$bln=date('m');

						$thn=date('Y');

						// nomor permohonan

						$no = $objectNomor->no_permohonan();

						$no_sampel = $no->fetch_assoc();

						$sampel = $no_sampel['no_permohonan'] ?? 0;

						$nourut= 0;

						@$urut = $nourut + (int)substr($sampel, 0, 5);


						$tambah = (int) $urut +1 ;

						$format = $tambah;

					?>



					<div class="column-half">

						<label class="control-label" for="no_permohonan">Nomor Permohonan</label>

						<input type="text" name="no_permohonan" class="form-control" id="no_permohonan" value=" <?= $format?>/PL-KH/<?=$bln?>/<?=$thn?>" required>

						<input type="hidden" id="id" value="<?=$id;?>">

					</div>	

					<div class="column-half">

						<label class="control-label" for="tanggal_permohonan">Tanggal</label>

						<input type="text" name="tanggal_permohonan" class="form-control" id="tanggal_permohonan" value="<?= $tgl_indo?>" required>

						<input type="hidden" name="tanggal_acu_permohonan" id="tanggal_acu_permohonan"  value="<?php echo date('Y-m-d')?>">

					</div>

					<div class="column-half">

						<label class="control-label" for="jenis_permohonan">Jenis Permohonan</label>

						<select class="form-control" name="jenis_permohonan" id="jenis_permohonan">
							<option>Domestik Keluar</option>
							<option>Domestik Masuk</option>
							<option>Domestik Ekspor</option>
							<option>Domestik Impor</option>
							<option>-</option>
							<option></option>
						</select>

					</div>	


					<div class="column-half">

						<label class="control-label" for="nama_sampel">Nama Sampel</label>

						<select class="form-control" name="nama_sampel" id="nama_sampel" required>

								<option></option>

								<?php 

									$i = $objectData->tampil_hewan();



									while ($t=$i->fetch_object()) : ?>

									<option><?= $t->nama_hewan; ?></option>

								<?php endwhile;?>

						</select>					

					</div>


					<div class="column-seperempat">

						<label class="control-label" for="jumlah_sampel">Jumlah Sampel</label>

						<input type="number" name="jumlah_sampel" class="form-control" id="jumlah_sampel" disabled  required>

						<div id="jml"></div>

					</div>

					<div class="column-seperempat">

						<label class="control-label" for="satuan">Satuan</label>

						<select class="form-control" name="satuan" id="satuan">

								  <option>gram</option>

								  <option>kilogram</option>

								  <option>koli</option>

								  <option selected>tabung</option>

					              <option >sachet</option>

						</select>

					</div>		



					<div class="column-half">

						<label class="control-label" for="no_sampel_awal">Nomor Sampel Awal/ Eartag (Bibit)</label>

						<input type="text" name="no_sampel_awal" class="form-control" id="no_sampel_awal" placeholder="Pisahkan setiap nomor sampel dengan koma (,) atau (-)"  required>

					</div>			
				

					<div class="column-half">

						<label class="control-label" for="bagian_hewan">Bagian Hewan</label>

						<select class="form-control" name="bagian_hewan" id="bagian_hewan">

								  <option></option>

								  <option>Serum</option>

					              <option selected>Darah</option>

					              <option>Urine</option>

					              <option>Feses</option>

					              <option>Kadaver</option>

					              <option>Swab</option>

					              <option>Organ</option>

					              <option>Eksudat</option>

					              <option>Kerokan Kulit</option>

					              <option>Kulit</option>

					              <option>Bagian Lain</option>

						</select>

					</div>			

			

					<div class="column-half">

						<label class="control-label nonwajib" for="produk_hewan">Produk Hewan</label>

						<input type="text" name="produk_hewan" class="form-control" id="produk_hewan"  required value="-">

					</div>



					<div class="column-half">

						<label class="control-label" for="metode_pengujian">Metode Pengujian</label>

						<input type="text" name="metode_pengujian" class="form-control" id="metode_pengujian"  required value="RBT">

					</div>



					<div class="column-half">

						<label class="control-label nonwajib" for="biaya_pengujian">Biaya Pengujian</label>

						<input type="number" name="biaya_pengujian" class="form-control" id="biaya_pengujian" placeholder="kosongkan bila tidak diisi">

					</div>



					<div class="column-half">

						<label class="control-label" for="waktu_pengambilan_sampel">Waktu Pengambilan Sampel</label>

						<input type="text" name="waktu_pengambilan_sampel" class="form-control" id="waktu_pengambilan_sampel" value="<?= $tgl_indo?>"   required>

					</div>



					<div class="column-half">

						<label class="control-label" for="area_asal">Negara/ Area Asal</label>

						<input type="text" name="area_asal" class="form-control" id="area_asal"  required value="Sumbawa Besar">

					</div>



					<div class="column-half">

						<label class="control-label" for="cara_pengambilan_sampel">Metode Pengambilan Sampel</label>

						<select class="form-control" name="cara_pengambilan_sampel" id="cara_pengambilan_sampel">

								  <option></option>

								  <option selected="selected">Random</option>

					              <option>Sistematis</option>

					              <option>Cluster</option>

					              <option>Tahapan Grand</option>

						</select>

					</div>

	
					<div class="column-half">

						<label class="control-label nonwajib" for="target_pengujian">Target Pengujian/Golongan </label>

						<select class=" form-control "  name="target_pengujian" id="target_pengujian">

								  <option disabled selected value="-">kosongkan jika tidak diisi</option>

								  <option>Viral</option>

								  <option>Mikal</option>

					              <option>Bakterial</option>

					              <option selected>Antibodi</option>

					              <option>Parasit</option>

					              <option>Patologi</option>

					              <option>Kehati hewani</option>

					              <option>Toksikologi</option>

					              <option>Biologi Molekuler</option>

						</select>

					</div>

					<div class="column-half">

						<label class="control-label" for="nama_pemilik">Nama Pemilik</label>

						<select id="nama_pemilik" name="nama_pemilik" class="form-control selectpicker" data-live-search="true" required>
							<div id="copy_pemilik"></div>
							<option>- Pilih Nama Pemilik -</option>

							<?php 

							$i = $objectSource4->tampilPelanggan();

							while ($t=$i->fetch_object()) :  

								$nama_pelanggan = str_replace(";", "", $t->nama_pelanggan);
								?>

							<option value="<?=$nama_pelanggan ;?>"> <?=$nama_pelanggan ;?></option>

							<?php endwhile; ?>
							
						</select>

					</div>

					<div class="column-half">

						<label class="control-label nonwajib" for="lama_pengujian">Lama Waktu Pengujian </label>

						<select name="lama_pengujian" id="lama_pengujian" class="form-control">

						<option>-</option>

                          <?php 

                            $i = $objectData->lama_pengujian();

                            while ($t=$i->fetch_object()) : ?>

                            <option><?=$t->lama_pengujian ;?></option>

                          <?php endwhile;?>

                        </select>

					</div>


					<div class="column-half">

						<label class="control-label" for="alamat_pemilik">Alamat Pemilik</label>

						<select name="alamat_pemilik" class="form-control" id="alamat_pemilik" required>
						

						</select>



					</div>

					<div class="column-half">

						<label class="control-label nonwajib" for="dokumen_pendukung">Dokumen Pendukung</label>

						<input type="text" name="dokumen_pendukung" class="form-control" id="dokumen_pendukung" value="-">

					</div>

					<div class="column-half">

						<label class="control-label" for="pemohon">Pemohon</label>

						<select class="form-control" name="pemohon" id="pemohon_input" required>

								<option></option>

									<?php 

										$i = $objectData->tampil_pejabat_all();

										while ($t=$i->fetch_object()) : 

											if ($t->nama_pejabat == 'drh. Priono') :?>

												<option selected> <?=$t->nama_pejabat ;?></option>
									<?php else:		?>

										<option><?=$t->nama_pejabat ;?></option>

									<?php endif; endwhile;?>

						</select>

					</div>


					<div class="column-half">

						<label class="control-label" for="nip_pemohon">NIP</label>

						<select class="form-control" name="nip_pemohon" id="nip_input">

							<option>19810224 201101 1 008</option>

						</select>

					</div>

			 		<input type="hidden" name="no_sampel" id="no_sampel" value="<?=$nomor_smpl;?>"> 

				</div>

			</div><!-- Modal Body -->
						

			<div class="modal-footer" id="modal-footer">

				<div class="column-half">

				<?php  

					if ($hasil2 !== 0) { ?>

					<label><input type="checkbox" id="copy" value="copy">  Copy dari permohonan sebelumnya</label>
						
				<?php	}

				?>

					

				</div>

				<div class="column-half button-bawah">

					<?php

						if(isset($_SESSION['loginsuperkh'])){ 

					?>

				<button type="reset" class="btn-default2 btn-danger " onclick="return confirm('Yakin Ingin Reset Data?')"><i class="fa fa-exclamation-circle fa-fw" aria-hidden="true"></i>&nbsp;Reset</button>

				<?php } ?> &nbsp;&nbsp;

			 	<button type="submit" class="btn-default2 success" name="input" value="input"><i class="fa fa-check-circle fa-fw" aria-hidden="true"></i>&nbsp;Simpan</button> 

				</div>	

			</div>

		 </form>

	   </div> <!--end responsive-form-->

	</div>

  </div>




<script>

$(document).ready(function(e){
  
  $("#form_input_permohonan_kh").on("submit", (function(e){

       e.preventDefault();

       $.ajax({

         url :'lab_bakteri/models/proses_input_datapermohonan_kh.php',

         type :'POST',

         data : new FormData (this),

         contentType : false,

         cache : false,

         processData : false,

         success : function(response){

            $('#tb_permohonan_kh').DataTable().ajax.reload(null, false),

              swal({

                title: "Sukses",

                text: "Data Berhasil Diinput",

                type: "success"

            }).then(function(){

                $('#modal_input_permohonan_kh').modal('hide');
                
                location.reload();


            });

            //console.log(response)

         }  
       });

     }));


  	$(document).on("change","#nama_sampel",function () {

  		let nama_sampel = $(this).val();

  		/*Jika Tidak Kosong*/

  		if (nama_sampel != '') {

  			$("#jumlah_sampel").removeAttr("disabled", true);

  			if (nama_sampel.indexOf('Bibit') == -1) {

  				/*Jumlah Sampel On Keyup For Nomor Sampel*/

  				$('#jumlah_sampel2').remove();
  				$('#jumlah_sampel').remove();

  				$("#jml").html('<input type="number" name="jumlah_sampel" class="form-control" id="jumlah_sampel" disabled  required>');

  				$("#jumlah_sampel").removeAttr("disabled", true);

			  	let awaljumlahSampel = $('#jumlah_sampel').val();

			  	$( "#jumlah_sampel" ).keyup(function () {

			  		let id = $('#id').val();
			  		let jumlahSampel = $(this).val();

			  		/*Check Jumlah Sampel*/
				    
				    if (jumlahSampel !='') {

				    	$.get({
				          url: "lab_bakteri/views/data_kh/SourceNomorSampel_kh.php",
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
				          url: "lab_bakteri/views/data_kh/SourceNomorSampel_kh.php",
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


  			}else{

  				$('#jumlah_sampel').remove();

  				$("#jml").html('<input type="number" name="jumlah_sampel" id="jumlah_sampel2" class="form-control"  required>');

  			}/*End if !Darah Sapi Bibit*/

  		}else{

  			$("#jumlah_sampel").attr("disabled", true);
  		}

  	});/*End Nama Sampel On Change*/


	$( "#pemohon_input" ).on('change', function () {

	    let pemohonID = $(this).val();

	    if (pemohonID !='') {

	    	$.get({
	          url: "lab_bakteri/views/data_kh/SourceDataPemohon_kh.php",
	          dataType: 'Json',
	          data: {'id':pemohonID},
	          success: function(data) {
	              $('#nip_input').empty();
	              $.each(data, function(key, value) {
	                  $('#nip_input').append('<option>'+ value +'</option>');
	            });
	          }
	      });

	    }else{

	    	$('#nip_input').empty();
	    	$('#nip_input').append('<option></option>');
	    }
      
  	});

  	$("#copy").on('change', function(){

  		let permohonanID = $("#id").val();

  		if(this.checked) {

  			$.get({
	          url: "lab_bakteri/views/data_kh/data_permohonan_copy_kh.php",
	          dataType: 'Json',
	          data: {'id':permohonanID},
	          success: function(data) {
	            $.each(data, function(key, value) {
	            	$('#jenis_permohonan').prepend('<option selected>'+ value.jenis_permohonan +'</option>');
	            	$('#jumlah_sampel').empty();
	            	$('#jumlah_sampel').val('');
	            	$('#satuan').prepend('<option selected>'+ value.satuan +'</option>');
	            	$('#no_sampel_awal').empty();
	            	$('#no_sampel_awal').val(value.no_sampel_awal);
	            	$('#bagian_hewan').prepend('<option selected>'+ value.bagian_hewan +'</option>');
	            	$('#produk_hewan').empty();
	            	$('#produk_hewan').val(value.produk_hewan);
	            	$('#metode_pengujian').empty();
	            	$('#metode_pengujian').val(value.metode_pengujian);
	            	$('#biaya_pengujian').empty();
	            	$('#biaya_pengujian').val(value.biaya_pengujian);
	            	$('#waktu_pengambilan_sampel').empty();
	            	$('#waktu_pengambilan_sampel').val(value.waktu_pengambilan_sampel);
	            	$('#area_asal').empty();
	            	$('#area_asal').val(value.area_asal);
	            	$('#cara_pengambilan_sampel').prepend('<option selected>'+ value.cara_pengambilan_sampel +'</option>');
	            	$('#target_pengujian').prepend('<option selected>'+ value.target_pengujian +'</option>');
	            	$('#lama_pengujian').prepend('<option selected>'+ value.lama_pengujian +'</option>');
	            	$('.selectpicker').selectpicker('val', value.nama_pemilik);
	            	$('#alamat_pemilik').prepend('<option selected>'+ value.alamat_pemilik +'</option>');
	            	$('#dokumen_pendukung').empty();
	            	$('#dokumen_pendukung').val(value.dokumen_pendukung);
	            	$('#pemohon_input').prepend('<option selected>'+ value.pemohon +'</option>');
	            	$('#nip_pemohon').prepend('<option selected>'+ value.nip_pemohon +'</option>');
				});
	          }
	      });


    	}

  	}); /*End Copy*/

  	/*autocomplete*/

  	$('.selectpicker').selectpicker();

  	$( "#nama_pemilik" ).on('change', function () {

	    let namaPelanggan = $(this).val();

	    if (namaPelanggan !='') {

	    	$.post({
	          url: "lab_bakteri/views/data_kh/alamat_pelanggan_kh.php",
	          dataType: 'Json',
	          data: {'id':namaPelanggan},
	          success: function(data) {
	              $('#alamat_pemilik').empty();
	              $.each(data, function(key, value) {
	                  $('#alamat_pemilik').append('<option>'+ value +'</option>');
	            });
	            
	          }
	      });

	    }else{

	    	$('#alamat_pemilik').empty();
	    	$('#alamat_pemilik').append('<option></option>');
	    }
      
  	});



}); /*End ready functions*/

</script>

