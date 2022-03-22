<?php

include_once('header_input.php');

if(@$_GET['act']==''){

?>



<div>

	<ol class="page-header breadcrumb">

		<div id="top">

			<button type="button" class="btn btn-kuprimary" data-toggle="modal" data-target="#input"><i class="fa fa-plus-circle fa-fw"></i>Data Baru</button>

		</div>

			<i class="fa fa-info-circle fa-fw fa-lg" aria-hidden="true"></i>

		<div class="judul">

			<b><h4>Database Nama Sampel Laboratorium Karantina Tumbuhan</h4></b>

		</div>

	</ol>

</div>



<div class="row">

    <div class="col-lg-12">

      	<div class="table-responsive">

      		<table class="table table-hover table-striped" id="tb_database_tumbuhan" width="100%"  style="text-align: center">

      			<thead>

      				<tr>

      					<th width= "5%">No</th>

      					<th width= "12%">Nama Tumbuhan</th>

      					<th width= "15%">Nama Ilmiah</th>

      					<th width= "5%">Action</th>

      				</tr>

      			</thead>

      		</table>

      	</div>	

    </div>

</div>



<!-- Edit Data -->

        <div class="modal fade" id="edit_database_tumbuhan" role="dialog">
            <div class="modal-dialog">
                <div id="content-data_edit_database_tumbuhan"></div>
            </div>
        </div>




<div id="input" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <div class="modal-header">

        <button type="button" class="close" data-dismiss="modal">&times;</button>

        <h4 class="modal-title">Tambah Data Nama Tumbuhan</h4>

      </div>

      

  <div class="modal-body">

    <div id="responsive-form" class="clearfix" autocomplete="on">

      <form action="" method="post">

        

          <div class="column-half">

            <label class="control-label" for="nama_tumbuhan">Nama Sampel</label>

            <input type="text" name="nama_tumbuhan" class="form-control" id="nama_tumbuhan">

          </div>

            

          <div class="column-half">

            <label class="control-label" for="nama_ilmiah_tumbuhan">Nama Ilmiah</label>

            <em><input type="text" name="nama_ilmiah_tumbuhan" class="form-control" id="nama_ilmiah_tumbuhan" ></em>

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

      
    $nama_tumbuhan             =htmlspecialchars($conn->real_escape_string(trim($_POST['nama_tumbuhan'])));

    $nama_ilmiah_tumbuhan      =htmlspecialchars($conn->real_escape_string(trim($_POST['nama_ilmiah_tumbuhan'])));
          

    if($nama_tumbuhan!==""){

      $objectSource->input($nama_tumbuhan, $nama_ilmiah_tumbuhan);

             

      echo "<script>alert('Data Berhasil Ditambah!')

            window.location= '?page=input_nama_tumbuhan'

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

  $objectSource->hapus($_GET['id_tumbuhan']);

  echo "<script>alert('Data Berhasil Dihapus!')

            window.location= '?page=input_nama_tumbuhan'

      </script>";   

}





