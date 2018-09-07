<?php

use Lab\classes\kh\labbakteri\Admin;

$objectAdmin = new Admin;

if(@$_GET['act']==''){

?>



<!--Tampil Main Tabel-->

<div class="bg">

	<div class="bg"></div>

</div>

<div>

	<ol class="page-header breadcrumb breadcrumb-fixed">

		<div id="top">

			<button type="button" class="btn btn-kuprimary" data-toggle="modal" data-target="#input"><i class="fa fa-plus-circle fa-fw"></i>Input</button>



			<div class="judul">

				<i class="fa fa-info-circle fa-fw fa-lg"></i><b><h4><span class="isi">Input Pesan</h4></b>

			</div> 

		</div>



	</ol>

</div>

<div class="bg2">

	<div class="bg2"></div>

</div>



	<!-- Example split danger button -->



<div class="row" id="tb">

    <div class="col-md-12">

      	<div class="table-responsive">

      		<table class="table table-hover table-striped" id="datatables">

      			<thead>

      				<tr>

      					<th width= "5%">No</th>

      					<th width= "12%">Judul</th>

      					<th width= "15%">Isi</th>

      					<th width= "12%">Action</th>

      				</tr>

      			</thead>

      			<tbody>

      				<?php

      				$no=1;

					$tampil = $objectAdmin->pesan();

					while ($data = $tampil->fetch_object()):  ?>

                    	<tr class="Kosong">

	      					<td><?php echo $no++ ?></td>

	      					<td><?php echo $data->judul; ?></td>

	      					<td><?php echo $data->isi; ?></td>

		  			 		<td>				     							

	      						<a id="edit_data_admin" data-toggle="modal" 

	      						data-target="#edit" 

	      						data-id="<?php echo $data->id ?>" 

	      						data-judul="<?php echo $data->judul ?>" 

	      						data-isi="<?php echo $data->isi ?>">

	      						<button class="btn btn-success btn-xs"><i class="fa fa-edit fa-fw"></i>Edit</button></a>



	      						<a href="?page=input&act=del&id=<?php echo $data->id?>">

							<button type="submit" class="btn btn-danger btn-xs bs-confirmation" ><i class="fa fa-trash-o fa-fw"></i>Hapus</button></a>



							<a href="?page=dashboard&act=show&id=<?= $data->id ?>">

	      					<button class="btn btn-success btn-xs"><i class="fa fa-edit fa-fw"></i>Tampilkan</button></a>

      					</td>

      				</tr>

      				<?php

					endwhile;?>

     		    </tbody>

      		</table>

      	</div>	

    </div>

</div>

       

<!--Input Data--> 

   

<div id="input" class="modal fade" role="dialog">

	<div class="modal-dialog">

		<div class="modal-content">

			<div class="modal-header">

				<button type="button" class="close" data-dismiss="modal">&times;</button>

				<h4 class="modal-title"><i class="fa fa-gear fa-fw"></i>Tambah Pesan/h4>

			</div>



		<div class="modal-body">

			<div id="responsive-form" class="clearfix" autocomplete="on">

				<form action="" method="post">



					<div class="columnfull">

						<label class="control-label" for="judul">Judul</label>

						<input type="text" name="judul" class="form-control" id="judul">

					</div>

			

					<div class="columnfull">

						<label class="control-label" for="tanggal_permohonan">Isi</label>

						<textarea class="form-control" name="isi" id="isi" rows="4"></textarea> 

					</div>

				



				</div>

							

				<div class="modal-footer" id="modal-footer">

					<div class="column-full button-bawah">

					<button type="reset" class="btn-default2 btn-danger " onclick="return confirm('Yakin Ingin Reset Data?')"><i class="fa fa-exclamation-circle fa-fw" aria-hidden="true"></i>&nbsp;Reset</button> &nbsp;&nbsp;

				 	<button type="submit" class="btn-default2 success" name="input" value="input"><i class="fa fa-check-circle fa-fw" aria-hidden="true"></i>&nbsp;Simpan</button> 

					</div>	

				</div>

			</form>

		</div> <!--end responsive-form-->

		

<?php		


if(isset($_POST['input'])) {

					

$judul				=htmlspecialchars($connection->conn->real_escape_string(trim($_POST['judul'])));

$isi				=htmlspecialchars($connection->conn->real_escape_string(trim($_POST['isi'])));



	if($judul!==''){

		$objectAdmin->input_admin($judul, $isi);	

	}

}



?>

				

		</div>

	</div>

</div> 



<!--Input Data--> 

   

<div id="edit" class="modal fade" role="dialog">

	<div class="modal-dialog">

		<div class="modal-content">

			<div class="modal-header">

				<button type="button" class="close" data-dismiss="modal">&times;</button>

				<h4 class="modal-title"><i class="fa fa-gear fa-fw"></i>Tambah Pesan</h4>

			</div>



		<div class="modal-body">

			<div id="responsive-form" class="clearfix" autocomplete="on">

				<form action="" method="post">

					<?php 




						$tampil2 = $objectAdmin->pesan();

						while($data = $tampil2->fetch_object()):

							$id2 = $data->id;

							$judul2 = $data->judul;

							$isi2 = $data->isi;

						

					 ?>



					<div class="columnfull">

						<label class="control-label" for="judul">Judul</label>

						<input type="text" name="judul" class="form-control" id="judul" value="<?php echo $judul2?>">

						<input type="hidden" name="id" class="form-control" id="id" value="<?php echo $id2?>">

					</div>

			

					<div class="columnfull">

						<label class="control-label" for="tanggal_permohonan">Isi</label>

						<input type="text" class="form-control" name="isi" id="isi" rows="4" value="<?php echo $isi2?>">

					</div>

				<?php endwhile; ?>



				</div>

							

				<div class="modal-footer" id="modal-footer">

					<div class="column-full button-bawah">

					<button type="reset" class="btn-default2 btn-danger " onclick="return confirm('Yakin Ingin Reset Data?')"><i class="fa fa-exclamation-circle fa-fw" aria-hidden="true"></i>&nbsp;Reset</button> &nbsp;&nbsp;

				 	<button type="submit" class="btn-default2 success" name="edit"><i class="fa fa-check-circle fa-fw" aria-hidden="true"></i>&nbsp;Simpan</button> 

					</div>	

				</div>

			</form>

		</div> <!--end responsive-form-->



<?php




if(isset($_POST['edit'])){

	$id 	= $_POST['id'];

	$judul 	= $connection->conn->real_escape_string($_POST['judul']);

	$isi 	= $connection->conn->real_escape_string($_POST['isi']);

	

	$objectAdmin->edit_admin($id, $judul, $isi);



} ?>





<!--Input Data--> 

   

<div id="tampil" class="modal fade" role="dialog">

	<div class="modal-dialog">

		<div class="modal-content">

			<div class="modal-header">

				<button type="button" class="close" data-dismiss="modal">&times;</button>

				<h4 class="modal-title"><i class="fa fa-gear fa-fw"></i>Tambah Pesan/h4>

			</div>



		<div class="modal-body">

			<div id="responsive-form" class="clearfix" autocomplete="on">

				<form action="views/body_dashboard.php" method="post">

					<?php 




						$tampil = $objectAdmin->pesan();

						while($data2 = $tampil->fetch_object()):

							$id = $data2->id;

							$judul = $data2->judul;

							$isi = $data2->isi;

						

					 ?>



					<div class="columnfull">

						<label class="control-label" for="judul">Judul</label>

						<input type="text" name="judul" class="form-control" id="judul" value="<?php echo $judul?>">

						<input type="hidden" name="id" class="form-control" id="id" value="<?php echo $id?>">

					</div>

			

					<div class="columnfull">

						<label class="control-label" for="tanggal_permohonan">Isi</label>

						<input type="text" class="form-control" name="isi" id="isi" rows="4" value="<?php echo $isi?>">

					</div>

				<?php endwhile; ?>



				</div>

							

				<div class="modal-footer" id="modal-footer">

					<div class="column-full button-bawah">

					<button type="reset" class="btn-default2 btn-danger " onclick="return confirm('Yakin Ingin Reset Data?')"><i class="fa fa-exclamation-circle fa-fw" aria-hidden="true"></i>&nbsp;Reset</button> &nbsp;&nbsp;

				 	<button type="submit" class="btn-default2 success" name="tampil"><i class="fa fa-check-circle fa-fw" aria-hidden="true"></i>&nbsp;Simpan</button> 

					</div>	

				</div>

			</form>

		</div> <!--end responsive-form-->



<?php

}elseif(@$_GET['act']=='del') {

	$$objectAdmin->hapus_admin($_GET['id']);

	header("location: ?page=input");

}elseif (@$_GET['act']=='show') {

	$$objectAdmin->tampil_pesan($_GET['id']);

	header("location: ?page=dashboard");

}



$objectAdmin->destroy();













