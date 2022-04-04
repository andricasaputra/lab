<?php

include_once('header_input.php');


?>


<!-- <div>

	<ol class="page-header breadcrumb">

		<div id="top">

			<button type="button" class="btn btn-kuprimary" data-toggle="modal" data-target="#input"><i class="fa fa-plus-circle fa-fw"></i>Data Baru</button>

		</div>

			<i class="fa fa-info-circle fa-fw fa-lg" aria-hidden="true"></i>

		<div class="judul">

			<b><h4>Database Nama Jabatan Laboratorium</h4></b>

		</div>

	</ol>

</div> -->

<div class="row">

    <div class="col-lg-12" style="margin-top:  200px">

           <form action="" method="post">

        
          <div class="column">

            <label class="control-label" for="jabatan">Reparasi Datbase</label>

            <input type="text" name="sql_mode" class="form-control" value="ONLY_FULL_GROUP_BY" readonly>

          </div>

          
          <div class="modal-footer" id="modal-footer">

            <div class="column-full" style="margin-left: auto; margin-top: 20px;">

            <button type="submit" class="btn-default2 btn-success " name="input" value="input"><i class="fa fa-check-circle fa-fw" aria-hidden="true"></i>&nbsp;Reparasi</button> 

            </div>  

        </div>  

      </form>
      	

    </div>

</div>

<?php 

 if (@$_POST['input']) {
  

      $connection->reparasi();

      echo "<script>alert('Data Berhasil Diubah!')

            window.location= '?page=reparasi'

      </script>";       
  }
 ?>




