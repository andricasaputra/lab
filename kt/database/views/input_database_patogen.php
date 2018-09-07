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

			<b><h4>Data Nama Hama/Penyakit</h4></b>

		</div>

		</span>

	</ol>

</div>



<div class="row">

    <div class="col-lg-12">

      	<div class="table-responsive">

      		<table class="table table-hover table-striped" id="tb_database_patogen" width="100%"  style="text-align: center">

      			<thead>

      				<tr>

      					<th width= "5%">No</th>

      					<th width= "12%">Nama Hama/penyakit</th>

      					<th width= "15%">Nama Latin</th>

      					<th width= "5%">Action</th>

      				</tr>

      			</thead>

      		</table>

      	</div>	

    </div>

</div>


<!-- Edit Data -->

        <div class="modal fade" id="edit_database_patogen" role="dialog">
            <div class="modal-dialog">
                <div id="content-data_edit_database_patogen"></div>
            </div>
        </div>




<div id="input" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <div class="modal-header">

        <button type="button" class="close" data-dismiss="modal">&times;</button>

        <h4 class="modal-title">Tambah Data Nama Hama/Penyakit</h4>

      </div>



  <div class="modal-body">   

    <div id="responsive-form" class="clearfix" autocomplete="on">

      <form action="" method="post">

       

          <div class="column-half">

            <label class="control-label" for="nama_penyakit">Golongan Hama/Penyakit</label>

            <select class="form-control" name="nama_penyakit" id="nama_penyakit">

              <option>Serangga</option>

              <option>Myte/Tungau</option>

              <option>Cendawan</option>

              <option>Bakteri</option>

              <option>Nematoda</option>

              <option>Virus</option>

              <option>Fitoplasma</option>

              <option>Viroid</option>

              <option>Gulma</option>

            </select>

          </div>

             

          <div class="column-half">

            <label class="control-label" for="nama_latin_penyakit">Nama Latin</label>

            <em><input type="text" name="nama_latin_penyakit" class="form-control" id="nama_latin_penyakit" ></em>

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
         
        $nama_penyakit       =htmlspecialchars($conn->real_escape_string(trim($_POST['nama_penyakit'])));

        $nama_latin_penyakit =htmlspecialchars($conn->real_escape_string(trim($_POST['nama_latin_penyakit']))); 

        if ($nama_penyakit == 'Serangga' ||  $nama_penyakit == 'Lalat Buah') {
            
            $id_patogen = 1;

         }elseif ($nama_penyakit == 'Myte/Tungau' ) {

            $id_patogen = 2;

         }elseif ($nama_penyakit == 'Cendawan' ) {
          
            $id_patogen = 3;

         }elseif ($nama_penyakit == 'Bakteri' ) {
          
            $id_patogen = 4;

         }elseif ($nama_penyakit == 'Nematoda' ) {
          
            $id_patogen = 5;
            
         }elseif ($nama_penyakit == 'Virus' ) {
          
            $id_patogen = 6;
            
         }      
 

                  

        if($nama_penyakit !=="" && $nama_latin_penyakit !==""){


          $objectSource2->input($id_patogen, $nama_penyakit, $nama_latin_penyakit);



          echo "<script>alert('Data Berhasil Ditambah!')

                   window.location= '?page=input_nama_patogen'

                </script>";  



        }else{

          echo "<script>alert('Mohon Maaf Tambah Data Gagal!')

                  window.location= '?page=input_nama_patogen'

                </script>";

          }

      }

      ?>

        

    </div>

  </div>

</div> 



<?php

if(@$_GET['act']=='del') {

  $objectSource2->hapus($_GET['id']);

  echo "<script>alert('Data Berhasil Dihapus!')

         window.location= '?page=input_nama_patogen'

        </script>"; 

}



$objectSource2->destroy();



?>