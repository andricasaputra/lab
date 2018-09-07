<?php

include_once('header_input.php');

?>

<div>

	<ol class="page-header breadcrumb">

		<div id="top">

      <?php if (isset($_SESSION['loginsuperkh'])): ?>

        <button type="button" class="btn btn-kuprimary" data-toggle="modal" data-target="#input"><i class="fa fa-plus-circle fa-fw"></i>Data Baru</button>
        
      <?php endif ?>


		</div>

			<i class="fa fa-info-circle fa-fw fa-lg" aria-hidden="true"></i>

		<div class="judul">

			<b><h4>Data Nama User Lab Karantina Hewan</h4></b>

		</div>

	</ol>

</div>



<div class="row">

    <div class="col-lg-12">

      	<div class="table-responsive">

      		<table class="table table-hover table-striped" id="datatables">

      			<thead>

      				<tr>

      					<th width= "5%">No</th>

      					<th width= "12%">Nama User</th>

      					<th width= "15%">Jabatan</th>

      					<th width= "5%">Action</th>

      				</tr>

      			</thead>

      			<tbody>

      				<?php

    					$no=1;

    					$tampil = $objectSource3->tampil();

    					while ($data = $tampil->fetch_object()){

                $id = $data->id;

                $edit = $objectSource3->tampil($id);

                if ($data->nama == "Super Admin") {

                    continue;

                }else{

                  $nama = $data->nama;

                }

                if (strpos($data->jabatan, "_") != false) {
                      
                  $jabatan = ucwords(str_replace("_", " ", $data->jabatan));

                }else{

                  $jabatan = ucwords($data->jabatan);

                }

    					?>

      				<tr>

      					<td><?php echo $no++ ?></td>

      					<td><?php echo $nama; ?></td>

      					<td><?php echo $jabatan; ?></td>

      					<td>

      						<a id="edit_data_user_kh" data-toggle="modal" data-target="#edit" data-id="<?php echo $data->id?>" data-nama="<?php echo $data->nama ?>" data-jabatan="<?php echo $data->jabatan ?>">

      						<button class="btn btn-success btn-xs"><i class="fa fa-edit fa-fw"></i>Edit</button>

							     </a>    						

     						   <a href="?page=tambah_nama_user_kh&act=del&id=<?php echo $data->id?>" onClick="return confirm('Yakin Ingin Hapus Data?')">

      						<button class="btn btn-danger btn-xs"><i class="fa fa-trash-o fa-fw"></i>Hapus</button></a>

      					</td>

      				</tr>

      				<?php

					   }?>

     		    </tbody>

      		</table>

      	</div>	

    </div>

</div>



<div id="edit" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <div class="modal-header">

        <button type="button" class="close" data-dismiss="modal">&times;</button>

        <h4 class="modal-title">Edit User</h4>

      </div>



    <div class="modal-body" id="modal-edit">

      <div id="responsive-form" class="clearfix"> 

          <form action="database/models/proses_editnama_user_kh.php" method="post">


            <div class="column-half">

                <label class="control-label" for="nama">Nama</label>

                <input type="hidden" name="id" id="id"> 

                <input type="text" name="nama" class="form-control" id="nama">

            </div>


            <div class="column-half">

                <label class="control-label" for="jabatan">jabatan</label>

                <input type="text" name="jabatan" class="form-control" id="jabatan">

            </div>

              
          <div class="modal-footer" id="modal-footer">

            <div class="column-full" style="margin-left: auto; margin-top: 20px;">

            <button type="reset" class="btn-default2 btn-danger" onclick="return confirm('Yakin Ingin Reset Data?')"><i class="fa fa-exclamation-circle fa-fw" aria-hidden="true"></i>&nbsp;Reset</button>&nbsp;&nbsp;

            <button type="submit" class="btn-default2 btn-success" name="edit" value="input"><i class="fa fa-check-circle fa-fw" aria-hidden="true"></i>&nbsp;Simpan</button> 

            </div>  

          </div>                   

        </form>

       </div>

      </div>

    </div>

  </div>

</div>



<div id="input" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <div class="modal-header">

        <button type="button" class="close" data-dismiss="modal">&times;</button>

        <h4 class="modal-title">Tambah Nama User</h4>

      </div>

      

  <div class="modal-body">    

    <div id="responsive-form" class="clearfix" autocomplete="on">

      <form action="" method="post">

        

          <div class="column-half">

            <label class="control-label" for="nama">Nama </label>

            <input type="text" name="nama" class="form-control" id="nama">

          </div>

             

          <div class="column-half">

            <label class="control-label" for="jabatan">jabatan</label>

            <input type="text" name="jabatan" class="form-control" id="jabatan" >

          </div>


          <div class="modal-footer" id="modal-footer">

            <div class="column-full" style="margin-left: auto; margin-top: 20px;">

              <button type="reset" class="btn-default2 btn-danger" onclick="return confirm('Yakin Ingin Reset Data?')"><i class="fa fa-exclamation-circle fa-fw" aria-hidden="true"></i>&nbsp;Reset</button>&nbsp;&nbsp;

              <button type="submit" class="btn-default2 btn-success" name="input" value="input"><i class="fa fa-check-circle fa-fw" aria-hidden="true"></i>&nbsp;Simpan</button> 

            </div>  

          </div>

        </form>

    </div> <!--end responsive-form--> 

      <?php

        if(@$_POST['input']) {
         
        $nama        =htmlspecialchars($conn->real_escape_string(trim($_POST['nama'])));

        $jabatan         =htmlspecialchars($conn->real_escape_string(trim($_POST['jabatan'])));
                 

        if($nama!==""){

          $objectSource3->input($nama, $jabatan);

          echo "<script>alert('Data Berhasil Ditambah!')

                   window.location= '?page=tambah_nama_user_kh'

                </script>";  
                     
        }else{

          echo "<script>alert('Mohon Maaf Tambah Data Gagal!')

                  window.location= '?page=tambah_nama_user_kh'

                </script>";

          }

      }

      ?>      

    </div>

  </div>

</div> 

<script type="text/javascript">
  $(document).on('click', '#edit_data_user_kh', function () {

    let id =  $(this).data('id');

    let nama =  $(this).data('nama');

    let jabatan =  $(this).data('jabatan');

    $('#modal-edit #id').val(id);

    $('#modal-edit #nama').val(nama);

    $('#modal-edit #jabatan').val(jabatan);


  });
</script>



<?php

if(@$_GET['act']=='del') {

  $objectSource3->hapus($_GET['id']);

  echo "<script>alert('Data Berhasil Dihapus!')

           window.location= '?page=tambah_nama_user_kh'

        </script>";  

}



$objectSource3->destroy();