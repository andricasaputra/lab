<?php

include_once('header_edit.php');

if(isset($_REQUEST['id'])){

    $id = intval($_REQUEST['id']);

    $tampil = $objectData->tampil($id);

    while($data = $tampil->fetch_object()):

        $id 						=$data->id;

		$no_permohonan				=$data->no_permohonan;

		$tanggal_permohonan			=$data->tanggal_permohonan;

		$tanggal_acu_permohonan		=$data->tanggal_acu_permohonan;

		$jenis_permohonan 			=$data->jenis_permohonan;

		$nama_sampel				=$data->nama_sampel;

		$jumlah_sampel				=$data->jumlah_sampel;

		$satuan						=$data->satuan;

		$no_sampel_awal				=$data->no_sampel_awal;

		$bagian_hewan				=$data->bagian_hewan;

		$produk_hewan				=$data->produk_hewan;

		$metode_pengujian			=$data->metode_pengujian;

		$biaya_pengujian			=$data->biaya_pengujian;

		$waktu_pengambilan_sampel	=$data->waktu_pengambilan_sampel;

		$area_asal					=$data->area_asal;

		$cara_pengambilan_sampel	=$data->cara_pengambilan_sampel;

		$target_pengujian			=$data->target_pengujian;

		$lama_pengujian				=$data->lama_pengujian;

		$nama_pemilik				=$data->nama_pemilik;

		$alamat_pemilik				=$data->alamat_pemilik;

		$dokumen_pendukung			=$data->dokumen_pendukung;

		$pemohon					=$data->pemohon;

		$nip_pemohon				=$data->nip_pemohon;

		$no_sampel 					=$data->no_sampel;

		$no_sertifikat 				=$data->no_sertifikat;

endwhile;
?>



<!--EditData--> 

	<div class="modal-content">

		<div class="modal-header">

			<button type="button" class="close" data-dismiss="modal">&times;</button>

			<h4 class="modal-title"><i class="fa fa-gear fa-fw"></i>Edit Data Permohonan Pengujian</h4>

		</div>

		<form id="form_edit_permohonan_kh">

		<div class="modal-body">

			<div id="responsive-form" class="clearfix" autocomplete="on">

		
					<div class="column-half">

						<label class="control-label" for="no_permohonan">Nomor Permohonan</label>

						<input type="text" name="no_permohonan" class="form-control" id="no_permohonan" value="<?=$no_permohonan;?>" required>

						<input type="hidden" name="id" id="id" value="<?=$id;?>">

					</div>

			

					<div class="column-half">

						<label class="control-label" for="tanggal_permohonan">Tanggal</label>

						<input type="text" name="tanggal_permohonan" class="form-control" id="tanggal_permohonan" value="<?=$tanggal_permohonan;?>" required>

						<input type="hidden" name="tanggal_acu_permohonan" id="tanggal_acu_permohonan" value="<?=$tanggal_acu_permohonan;?>">

					</div>

					<div class="column-half">

						<label class="control-label" for="jenis_permohonan">Jenis Permohonan</label>

						<select class="form-control" name="jenis_permohonan" id="jenis_permohonan">
							<option><?=$jenis_permohonan; ?></option>
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

								<option><?php echo $nama_sampel; ?></option>

								<?php 

									$i = $objectData->tampil_hewan();

									while ($t=$i->fetch_object()) : ?>

									<option><?= $t->nama_hewan; ?></option>

								<?php endwhile;?>

						</select>

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

						<select class="form-control" name="satuan" id="satuan">

								  <option><?=$satuan; ?></option>

								  <option>gram</option>

								  <option>kilogram</option>

								  <option>koli</option>

								  <option>tabung</option>

					              <option >sachet</option>

						</select>

					</div>	


					<div class="column-half">

						<label class="control-label" for="no_sampel_awal">Nomor Sampel Awal</label>

						<input type="text" name="no_sampel_awal" class="form-control" id="no_sampel_awal" value="<?=$no_sampel_awal;?>" placeholder="Pisahkan setiap nomor sampel dengan koma (,)">

					</div>
		

					<div class="column-half">

						<label class="control-label" for="bagian_hewan">Bagian Hewan</label>

						<select class="form-control" name="bagian_hewan" id="bagian_hewan">

								  <option><?php echo $bagian_hewan; ?></option>

								  <option>Serum</option>

					              <option>Darah</option>

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

						<label class="control-label" for="produk_hewan">Produk Hewan</label>

						<input type="text" name="produk_hewan" class="form-control" id="produk_hewan" value="<?=$produk_hewan;?>" required>

					</div>


					<div class="column-half">

						<label class="control-label" for="metode_pengujian">Metode Pengujian</label>

						<input type="text" name="metode_pengujian" class="form-control" id="metode_pengujian" value="<?=$metode_pengujian;?>" required>

					</div>


					<div class="column-half">

						<label class="control-label" for="biaya_pengujian">Biaya Pengujian</label>

						<input type="number" name="biaya_pengujian" class="form-control" id="biaya_pengujian" value="<?=$biaya_pengujian;?>">

					</div>


					<div class="column-half">

						<label class="control-label" for="waktu_pengambilan_sampel">Waktu Pengambilan Sampel</label>

						<input type="text" name="waktu_pengambilan_sampel" class="form-control" id="waktu_pengambilan_sampel" value="<?=$waktu_pengambilan_sampel;?>" required>

					</div>


					<div class="column-half">

						<label class="control-label" for="area_asal">Negara/ Area Asal</label>

						<input type="text" name="area_asal" class="form-control" id="area_asal" value="<?=$area_asal;?>" required>

					</div>

					<div class="column-half">

						<label class="control-label" for="cara_pengambilan_sampel">Metode Pengambilan Sampel</label>

						<select class="form-control" name="cara_pengambilan_sampel" id="cara_pengambilan_sampel">

								  <option><?php echo $cara_pengambilan_sampel; ?></option>

								  <option selected="selected">Random</option>

					              <option>Sistematis</option>

					              <option>Cluster</option>

					              <option>Tahapan Grand</option>

						</select>

					</div>

					<div class="column-half">

						<label class="control-label" for="target_pengujian">Target Pengujian/Golongan </label>

						<select class=" form-control "  name="target_pengujian" id="target_pengujian">

								  <option><?php echo $target_pengujian; ?></option>

								  <option>Viral</option>

								  <option>Mikal</option>

					              <option>Bakterial</option>

					              <option>Parasit</option>

					              <option>Patologi</option>

					              <option>Kehati hewani</option>

					              <option>Toksikologi</option>

					              <option>Biologi Molekuler</option>

						</select>

					</div>

					<div class="column-half">

						<label class="control-label" for="lama_pengujian">Lama Waktu Pengujian </label>

						<select name="lama_pengujian" id="lama_pengujian" class="form-control">

						<option><?php echo $lama_pengujian; ?></option>

                          <?php 

                            $i = $objectData->lama_pengujian();

                            while ($t=$i->fetch_object()) : ?>

                            <option><?=$t->lama_pengujian ;?></option>

                          <?php endwhile;?>

                        </select>

					</div>


					<div class="column-half">

						<label class="control-label" for="nama_pemilik">Nama Pemilik</label>

						<select id="nama_pemilik" name="nama_pemilik" class="form-control selectpicker" data-live-search="true" required>

							<option><?= $nama_pemilik; ?></option>

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

						<label class="control-label" for="alamat_pemilik">Alamat Pemilik</label>

						<select name="alamat_pemilik" class="form-control" id="alamat_pemilik" required>
						<option><?= $alamat_pemilik; ?></option>

						</select>



					</div>


					<div class="column-half">

						<label class="control-label" for="dokumen_pendukung">Dokumen Pendukung</label>

						<input type="text" name="dokumen_pendukung" class="form-control" id="dokumen_pendukung" value="<?=$dokumen_pendukung;?>">

					</div>


					<div class="column-half">

						<label class="control-label" for="pemohon">Pemohon</label>

						<select class="form-control" name="pemohon" id="pemohon_edit" required>

								<option><?php echo $pemohon; ?></option>

									<?php 

										$i = $objectData->tampil_pejabat_all();

										while ($t=$i->fetch_object()) : ?>

										<option><?=$t->nama_pejabat ;?></option>

									<?php endwhile;?>

								<option></option>

						</select>

					</div>


					<div class="column-half">

						<label class="control-label" for="nip_pemohon">NIP</label>

						<select class="form-control" name="nip_pemohon" id="nip_edit">

							<option><?php echo $nip_pemohon; ?></option>

						</select>

					</div>

					<input type="hidden" name="no_sampel" id="no_sampel" value="<?=$no_sampel;?>"> 

				</div>

			</div>

			<div class="modal-footer" id="modal-footer">

				<div class="column-full button-bawah">

					<?php

					if(isset($_SESSION['loginsuperkh'])){ 

				?>

					<button type="reset" class="btn-default2 btn-danger " onclick="return confirm('Reset Data Akan menghilangkan Seluruh Data!!  Anda Yakin Ingin Reset Data?')"><i class="fa fa-exclamation-circle fa-fw" aria-hidden="true"></i>Reset</button>

					<?php } ?>

	      		<button type="submit" class="btn-default2 btn-success" name="edit" value="edit"><i class="fa fa-check-circle fa-fw" aria-hidden="true"></i>Simpan</button> 

				</div>    	

		</div>

	</form>

</div> 



<?php
}
?>

<script>

$(document).ready(function(e){
  
  $("#form_edit_permohonan_kh").on("submit", (function(e){

       e.preventDefault();

       $.ajax({

         url :'lab_bakteri/models/proses_editdata_permohonan_kh.php',

         type :'POST',

         data : new FormData (this),

         contentType : false,

         cache : false,

         processData : false,

         success : function(response){

         	console.log(response);

            $('#tb_permohonan_kh').DataTable().ajax.reload(null, false),

              swal({

                title: "Sukses",

                text: "Data Berhasil Diubah",

                type: "success"

            }).then(function(){

                $('#modal_permohonan_kh').modal('hide')

            });

           
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
	          url: "lab_bakteri/views/data_kh/SourceNomorSampel_Edit_kh.php",
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

	    /*Jumlah Sampel Kosong*/

	    }
      
  	});

  	$( "#pemohon_edit" ).on('change', function () {

	    let pemohonID = $(this).val();

	    if (pemohonID !='') {

	    	$.get({
	          url: "lab_bakteri/views/data_kh/SourceDataPemohon_kh.php",
	          dataType: 'Json',
	          data: {'id':pemohonID},
	          success: function(data) {
	              $('#nip_edit').empty();
	              $.each(data, function(key, value) {
	                  $('#nip_edit').append('<option>'+ value +'</option>');
	            });
	          }
	      });

	    }else{

	    	$('#nip_edit').empty();
	    	$('#nip_edit').append('<option></option>');
	    }
      
  	});

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

