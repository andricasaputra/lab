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

			<b><h4>Database Nama Jabatan Laboratorium</h4></b>

		</div>

	</ol>

</div>

<div class="row">

    <div class="col-lg-12">

      	<div class="table-responsive">

      		<table class="table" width="100%"  style="text-align: center">

      			<thead>

      				<tr>

      					<th width= "5%">No</th>

      					<th width= "12%">Nama Jabatan</th>

      					<th width= "5%">Action</th>

      				</tr>

      			</thead>

            <tbody>

              <?php 

                $pejabat = $objectJabatan->jabatan();

                $no = 1;

                while ($data = $pejabat->fetch_object()) : ?>

                <tr>
                  <td><?= $no++  ?></td>
                  <td><?= $data->jabatan ?></td>
                  <td>

                    <a id="edit_data_jabatan" data-toggle="modal" data-target="#edit_jabatan" 

                    data-id="<?php echo $data->id?>" 
                    data-jabatan="<?php echo $data->jabatan ?>

                    ">

                    <button class="btn btn-success btn-xs"><i class="fa fa-edit fa-fw"></i>Edit</button>

                     </a>               

                     <a href="?page=tambah_jabatan&act=del&id=<?php echo $data->id?>" onClick="return confirm('Yakin Ingin Hapus Data?')">

                    <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o fa-fw"></i>Hapus</button></a>

                  </td>
                </tr>

              <?php endwhile; ?>

            </tbody>

      		</table>

      	</div>	

    </div>

</div>


<div id="edit_jabatan" class="modal fade" role="dialog">

    <div class="modal-dialog">

      <div class="modal-content">

        <div class="modal-header">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Edit Data Jabatan Laboratorium</h4>

        </div>

        <div class="modal-body" id="modal-edit">

          <div id="responsive-form" class="clearfix" autocomplete="on">

            <form id="edit_form" method="post">

              
                <div class="column-half">

                  <label class="control-label" for="jabatan">Nama Jabatan (Laboratorium)</label>

                  <input type="hidden" name="id" class="form-control" id="id">

                  <input type="text" name="jabatan" class="form-control" id="jabatan">

                </div>

                
                <div class="modal-footer" id="modal-footer">

                  <div class="column-full" style="margin-left: auto; margin-top: 20px;">

                  <button type="submit" class="btn-default2 btn-success " name="input" value="input"><i class="fa fa-check-circle fa-fw" aria-hidden="true"></i>&nbsp;Simpan</button> 

                  </div>  

              </div>  

            </form>

          </div>     

        </div> <!--end responsive-form-->

      </div>

  
  </div>
</div>

<!-- Input Data -->

<div id="input" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <div class="modal-header">

        <button type="button" class="close" data-dismiss="modal">&times;</button>

        <h4 class="modal-title">Tambah Data Jabatan Laboratorium</h4>

      </div>

  <div class="modal-body">

    <div id="responsive-form" class="clearfix" autocomplete="on">

      <form action="" method="post">

        
          <div class="column-half">

            <label class="control-label" for="jabatan">Nama Jabatan (Laboratorium)</label>

            <input type="text" name="jabatan" class="form-control" id="jabatan">

          </div>

          
          <div class="modal-footer" id="modal-footer">

            <div class="column-full" style="margin-left: auto; margin-top: 20px;">

            <button type="submit" class="btn-default2 btn-success " name="input" value="input"><i class="fa fa-check-circle fa-fw" aria-hidden="true"></i>&nbsp;Simpan</button> 

            </div>  

        </div>  

      </form>

    </div>     

  </div> <!--end responsive-form-->

  </div>

</div> 

  <?php

    

  if(@$_POST['input']) {

    
    $jabatan       =htmlspecialchars($conn->real_escape_string(trim($_POST['jabatan'])));

    if($jabatan !==""){

      $objectJabatan->createJabatan($jabatan);

      echo "<script>alert('Data Berhasil Ditambah!')

            window.location= '?page=tambah_jabatan'

      </script>";         

    }else{

      echo "<script>alert('Mohon Maaf Tambah Data Gagal!')</script>";

    }

  }



  ?>

<?php 

 if (@$_POST['input']) {
  

    $id       =htmlspecialchars($conn->real_escape_string(trim($_POST['id'])));

    $jabatan       =htmlspecialchars($conn->real_escape_string(trim($_POST['jabatan'])));

    if($jabatan !==""){

      $objectJabatan->updateJabatan(trim($jabatan), $id);

      echo "<script>alert('Data Berhasil Diubah!')

            window.location= '?page=tambah_jabatan'

      </script>";         

    }else{

      echo "<script>alert('Mohon Maaf Ubah Data Gagal!')</script>";

    }
  }
 ?>


<script type="text/javascript">
  $(document).on('click', '#edit_data_jabatan', function () {

    let id =  $(this).data('id');

    let jabatan =  $(this).data('jabatan');

    $('#modal-edit #id').val(id);

    $('#modal-edit #jabatan').val(jabatan);

  });


  $('#edit_form').on('submit', function(e){
    e.preventDefault();
    
    
    $.ajax({
        url: './database/models/proses_edit_jabatan.php',
        type: 'POST',
        dataType:'html',
        data: new FormData(this),
        processData: false,
        contentType: false,
        success: function (data, status)
        {

            alert("data sukses diubah");

            location.reload();
        

          //console.log(data);
        },
        error: function (xhr, desc, err)
        {
            console.log("error");
        }
    });

  });
</script>


<?php

}elseif(@$_GET['act']=='del') {

  $objectJabatan->deletePejabat($_GET['id']);

  echo "<script>alert('Data Berhasil Dihapus!')

            window.location= '?page=tambah_jabatan'

      </script>";   

}



