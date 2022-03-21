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

      <b><h4>Data Nama_pejabat User Lab Karantina Hewan</h4></b>

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

                <th width= "15%">Jabfung</th>

                <th width= "15%">Kategori</th>

                <th width= "15%">NIP</th>

                <th width= "5%">Action</th>

              </tr>

            </thead>

            <tbody>

              <?php

              $no=1;

              $pejabat = $objectPejabat->index();

              while ($data = $pejabat->fetch_object()){

                $id = $data->id_pejabat;

              ?>

              <tr>

                <td><?php echo $no++ ?></td>

                <td><?php echo $data->nama_pejabat; ?></td>

                <td><?php echo $data->jabatan; ?></td>

                <td><?php echo $data->jabfung; ?></td>

                <td><?php echo $data->kategori; ?></td>

                <td><?php echo $data->nip; ?></td>

                <td>

                  <a id="edit_data_user_kh" data-toggle="modal" data-target="#edit" 

                  data-id="<?php echo $data->id_pejabat?>" 
                  data-nama_pejabat="<?php echo $data->nama_pejabat ?>" data-jabatan="<?php echo $data->jabatan ?>"
                  data-jabfung="<?php echo $data->jabfung ?>"
                  data-kategori="<?php echo $data->kategori ?>"
                  data-nip="<?php echo $data->nip ?>

                  ">

                  <button class="btn btn-success btn-xs"><i class="fa fa-edit fa-fw"></i>Edit</button>

                   </a>               

                   <a href="?page=tambah_nama_user_kh&act=del&id=<?php echo $data->id_pejabat?>" onClick="return confirm('Yakin Ingin Hapus Data?')">

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

<div id="input" class="modal fade" role="dialog">

  <div class="modal-dialog">

      <div class="modal-content">

        <div class="modal-header">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Tambah Nama_pejabat User</h4>

        </div>

    <div class="modal-body">    

      <div id="responsive-form" class="clearfix" autocomplete="on">

        <form action="" method="post">

            <div class="column">

              <label class="control-label" for="nama_pejabat">Nama Pejabat </label>

              <input type="text" name="nama_pejabat" class="form-control" id="nama_pejabat">

            </div>

            <div class="column-half">

              <label class="control-label" for="jabatan">Jabatan</label>

              <select name="jabatan" id="jabatan" class="form-control">

                <?php  
                    $pejabat = $objectJabfung->jabatan();

                    while($data = $pejabat->fetch_object()) :

                  ?>
                  <option value="<?php echo $data->jabatan ?>"><?php echo $data->jabatan ?></option>
                
                <?php endwhile; ?>

                <option value="-">-</option>

              </select>
            </div>

            <div class="column-half">

              <label class="control-label" for="jabatan">Jabatan Fungsional</label>

              <select name="jabfung" id="jabfung" class="form-control">

                <?php  
                    $pejabat = $objectJabfung->jabfung();

                    while($data = $pejabat->fetch_object()) :

                  ?>
                  <option value="<?php echo $data->jabfung ?>"><?php echo $data->jabfung ?></option>
                
                <?php endwhile; ?>
                <option value="-">-</option>

              </select>
            </div>
            <div class="column-half">

              <label class="control-label" for="kategori">Kategori</label>

              <select name="kategori" id="kategori" class="form-control">
                <option value="jabfung">Jabfung</option>
                <option value="nonjabfung">Non Jabfung (Struktural)</option>
              </select>

            </div>

            <div class="column-half">

              <label class="control-label" for="nip">NIP</label>

              <input type="text" name="nip" class="form-control" id="nip" >

            </div>

            <div class="modal-footer" id="modal-footer">

              <div class="column-full" style="margin-left: auto; margin-top: 20px;">

                <button type="reset" class="btn-default2 btn-danger" onclick="return confirm('Yakin Ingin Reset Data?')"><i class="fa fa-exclamation-circle fa-fw" aria-hidden="true"></i>&nbsp;Reset</button>&nbsp;&nbsp;

                <button type="submit" class="btn-default2 btn-success" name="input" value="input"><i class="fa fa-check-circle fa-fw" aria-hidden="true"></i>&nbsp;Simpan</button> 

              </div>  

            </div>

          </form>

      </div> <!--end responsive-form--> 

      </div>

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

          <form id="edit_form" method="post">


            <div class="column-half">

                <label class="control-label" for="nama_pejabat">Nama_pejabat</label>

                <input type="hidden" name="id" id="id"> 

                <input type="text" name="nama_pejabat" class="form-control" id="nama_pejabat">

            </div>


             <div class="column-half">

              <label class="control-label" for="jabatan">Jabatan</label>

              <select name="jabatan" id="jabatan" class="form-control">

                <?php  
                    $pejabat = $objectJabfung->jabatan();

                    while($data = $pejabat->fetch_object()) :

                  ?>
                  <option value="<?php echo $data->jabatan ?>"><?php echo $data->jabatan ?></option>
                
                <?php endwhile; ?>

                <option value="-">-</option>

              </select>
            </div>

            <div class="column-half">

              <label class="control-label" for="jabatan">Jabatan Fungsional</label>

              <select name="jabfung" id="jabfung" class="form-control">

                <?php  
                    $pejabat = $objectJabfung->jabfung();

                    while($data = $pejabat->fetch_object()) :

                  ?>
                  <option value="<?php echo $data->jabfung ?>"><?php echo $data->jabfung ?></option>
                
                <?php endwhile; ?>
                <option value="-">-</option>

              </select>
            </div>

            <div class="column-half">

                <label class="control-label" for="kategori">Kategori</label>

                <select name="kategori" id="kategori" class="form-control">
                <option value="jabfung">Jabfung</option>
                <option value="nonjabfung">Non Jabfung (Struktural)</option>
            </select>

            </div>

            <div class="column-half">

                <label class="control-label" for="nip">NIP</label>

                <input type="text" name="nip" class="form-control" id="nip">

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

<?php

if(isset($_POST['input'])) {
 
$nama_pejabat =htmlspecialchars($conn->real_escape_string(trim($_POST['nama_pejabat'])));

$jabatan     =htmlspecialchars($conn->real_escape_string(trim($_POST['jabatan'])));

$jabfung     =htmlspecialchars($conn->real_escape_string(trim($_POST['jabfung'])));

$kategori    =htmlspecialchars($conn->real_escape_string(trim($_POST['kategori'])));
         
$nip         =htmlspecialchars($conn->real_escape_string(trim($_POST['nip'])));       

if($nama_pejabat!==""){

  $objectPejabat->createPejabat($nama_pejabat, $jabatan, $jabfung, $kategori, $nip);

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


<script type="text/javascript">
  $(document).on('click', '#edit_data_user_kh', function () {

    let id =  $(this).data('id');

    let nama_pejabat =  $(this).data('nama_pejabat');

    let jabatan =  $(this).data('jabatan');

    let jabfung =  $(this).data('jabfung');

    let kategori =  $(this).data('kategori');

    let nip =  $(this).data('nip');

    $('#modal-edit #id').val(id);

    $('#modal-edit #nama_pejabat').val(nama_pejabat);

    $('#modal-edit #jabatan').val(jabatan);

    $('#modal-edit #jabfung').val(jabfung);

    $('#modal-edit #kategori').val(kategori);

    $('#modal-edit #nip').val(nip);


  });

  $('#edit_form').on('submit', function(e){
    e.preventDefault();
    
    
    $.ajax({
        url: './database/models/proses_editnama_user_kh.php',
        type: 'POST',
        dataType:'html',
        data: new FormData(this),
        processData: false,
        contentType: false,
        success: function (data, status)
        {
            alert("data sukses diubah");
            location.reload();
        },
        error: function (xhr, desc, err)
        {
            console.log("error");
        }
    });

  });
</script>



<?php

if(@$_GET['act']=='del') {

  $objectPejabat->deletePejabat($_GET['id']);

  echo "<script>alert('Data Berhasil Dihapus!')

           window.location= '?page=tambah_nama_user_kh'

        </script>";  

}

