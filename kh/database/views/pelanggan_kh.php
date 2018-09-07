<?php

include_once('header_input.php');

$tampil = $objectSource4->tampilPelanggan();


if(@$_GET['act']==''){

?>



<div>

	<ol class="page-header breadcrumb">

		<div id="top">

			<button type="button" class="btn btn-kuprimary" data-toggle="modal" data-target="#input"><i class="fa fa-plus-circle fa-fw"></i>Data Baru</button>

		</div>

			<i class="fa fa-info-circle fa-fw fa-lg" aria-hidden="true"></i>

		<div class="judul">

			<b><h4>Database Nama Pelanggan Laboratorium Karantina hewan</h4></b>

		</div>

	</ol>

</div>



<div class="row">

    <div class="col-lg-12">

      	<div class="table-responsive">

      		<table class="table table-hover table-striped" id="tb_database_pelanggan_kh" width="100%"  style="text-align: center">

      			<thead>

      				<tr>

      					<th width= "5%">No</th>

      					<th width= "12%">Nama Pelanggan/ Perusahaan</th>

      					<th width= "15%">Alamat</th>

      					<th width= "5%">Action</th>

      				</tr>

      			</thead>

      		</table>

      	</div>	

    </div>

</div>

<!-- Edit Data -->

<div class="modal fade" id="edit_database_pelanggan_kh" role="dialog">
    <div class="modal-dialog">
        <div id="content-data_edit_database_pelanggan_kh"></div>
    </div>
</div>

<div id="input" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <div class="modal-header">

        <button type="button" class="close" data-dismiss="modal">&times;</button>

        <h4 class="modal-title">Tambah Data Nama Pelanggan/ Perusahaan</h4>

      </div>

    
  <div class="modal-body">

    <div id="responsive-form" class="clearfix" autocomplete="on">

      <form action="" method="post">

        

          <div class="column-half">

            <label class="control-label" for="nama_pelanggan">Nama Pelanggan/ Perusahaan</label>

            <input type="text" name="nama_pelanggan" class="form-control" id="nama_pelanggan">

          </div>

            

          <div class="column-half">

            <label class="control-label" for="alamat_pelanggan">Alamat</label>

            <input type="text" name="alamat_pelanggan" class="form-control" id="alamat_pelanggan">

          </div>



          <div class="modal-footer" id="modal-footer">

            <div class="column-full" style="margin-left: auto; margin-top: 20px;">

            <button type="reset" class="btn-default2 btn-danger " onclick="return confirm('Yakin Ingin Reset Data?')"><i class="fa fa-exclamation-circle fa-fw" aria-hidden="true"></i>&nbsp;Reset</button>&nbsp;&nbsp;

            <button type="submit" class="btn-default2 btn-success " name="input" value="input"><i class="fa fa-check-circle fa-fw" aria-hidden="true"></i>&nbsp;Simpan</button> 

            </div>  

        </div>  

      </form>

    </div>     

  </div> <!--end responsive-form-->

  

  <?php

    

    if(@$_POST['input']) {

      


    $nama_pelanggan       =htmlspecialchars($conn->real_escape_string(trim($_POST['nama_pelanggan'])));

    $alamat_pelanggan      =htmlspecialchars($conn->real_escape_string(trim($_POST['alamat_pelanggan'])));

    $al = strtolower($alamat_pelanggan);
    $alamat = ucwords($al);

    if($nama_pelanggan !==""){

      $input = $objectSource4->input($nama_pelanggan, $alamat);


      echo "<script>alert('Data Berhasil Ditambah!')

            window.location= '?page=input_nama_pelanggan'

      </script>";         

        

    }else{

      echo "<script>alert('Mohon Maaf Tambah Data Gagal!')</script>";

      }

  }

  ?>

         

  </div>

</div> 



<?php

}elseif(@$_GET['act']=='del') {

  $objectSource4->hapus($_GET['id']);

  echo "<script>alert('Data Berhasil Dihapus!')

            window.location= '?page=input_nama_pelanggan'

      </script>";   

}



$objectSource4->destroy();



