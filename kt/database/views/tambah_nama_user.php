<?php

include_once('header_input.php');

?>

<div>

	<ol class="page-header breadcrumb">

		<div id="top">

			<button type="button" class="btn btn-kuprimary" data-toggle="modal" data-target="#input"><i class="fa fa-plus-circle fa-fw"></i>Data Baru</button>

		</div>

			<i class="fa fa-info-circle fa-fw fa-lg" aria-hidden="true"></i>

		<div class="judul">

			<b><h4>Data Nama User</h4></b>

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

      					<th width= "15%">NIP</th>

      					<th width= "5%">Action</th>

      				</tr>

      			</thead>

      			<tbody>

      				<?php

    					$no=1;

    					$tampil = $objectSource3->tampil();

    					while ($data = $tampil->fetch_object()){

                

    					?>

      				<tr>

      					<td><?php echo $no++ ?></td>

      					<td><?php echo $data->nama_pejabat; ?></td>

      					<td><?php echo $data->nip_pejabat; ?></td>

      					<td>

      						<a id="edit_data_user" data-toggle="modal" data-target="#edit" data-id_pejabat="<?php echo $data->id_pejabat?>" data-nama_pejabat="<?php echo $data->nama_pejabat ?>" data-nip_pejabat="<?php echo $data->nip_pejabat ?>">

      						<button class="btn btn-success btn-xs"><i class="fa fa-edit fa-fw"></i>Edit</button>

							     </a>

    						

     						   <a href="?page=tambah_nama_user&act=del&id_pejabat=<?php echo $data->id_pejabat?>" onClick="return confirm('Yakin Ingin Hapus Data?')">

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

        <h4 class="modal-title">Edit Data Permohonan</h4>

      </div>



    <div class="modal-body" id="modal-edit">

      <div id="responsive-form" class="clearfix"> 

          <form id="form_edit_user">

           

          <div class="column-half">

            <label class="control-label" for="nama_pejabat">Nama</label>

            <input type="hidden" name="id_pejabat" id="id_pejabat">

            <input type="text" name="nama_pejabat" class="form-control" id="nama_pejabat">

          </div>

           

          <div class="column-half">

            <label class="control-label" for="nip_pejabat">NIP</label>

            <input type="text" name="nip_pejabat" class="form-control" id="nip_pejabat" >

          </div>



          <div class="modal-footer" id="modal-footer">

            <div class="column-full" style="margin-left: auto; margin-top: 20px;">

            <button type="reset" class="btn-default2 btn-danger" onclick="return confirm('Yakin Ingin Reset Data?')"><i class="fa fa-exclamation-circle fa-fw" aria-hidden="true"></i>&nbsp;Reset</button>&nbsp;&nbsp;

            <button type="submit" class="btn-default2 btn-success" name="input" value="input"><i class="fa fa-check-circle fa-fw" aria-hidden="true"></i>&nbsp;Simpan</button> 

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

        <h4 class="modal-title">Tambah Data Nama Tumbuhan</h4>

      </div>

      

  <div class="modal-body">    

    <div id="responsive-form" class="clearfix" autocomplete="on">

      <form action="" method="post">

        

          <div class="column-half">

            <label class="control-label" for="nama_pejabat">Nama </label>

            <input type="text" name="nama_pejabat" class="form-control" id="nama_pejabat">

          </div>

             

          <div class="column-half">

            <label class="control-label" for="nip_pejabat">NIP</label>

            <input type="text" name="nip_pejabat" class="form-control" id="nip_pejabat" >

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
         
        $nama_pejabat        =htmlspecialchars($conn->real_escape_string(trim($_POST['nama_pejabat'])));

        $nip_pejabat         =htmlspecialchars($conn->real_escape_string(trim($_POST['nip_pejabat'])));
                 

        if($nama_pejabat!==""){

          $objectSource3->input($nama_pejabat, $nip_pejabat);

          echo "<script>alert('Data Berhasil Ditambah!')

                   window.location= '?page=tambah_nama_user'

                </script>";  
                     
        }else{

          echo "<script>alert('Mohon Maaf Tambah Data Gagal!')

                  window.location= '?page=tambah_nama_user'

                </script>";

          }

      }

      ?>      

    </div>

  </div>

</div> 



<?php

if(@$_GET['act']=='del') {

  $objectSource3->hapus($_GET['id_pejabat']);

  echo "<script>alert('Data Berhasil Dihapus!')

           window.location= '?page=tambah_nama_user'

        </script>";  

}



$objectSource3->destroy();