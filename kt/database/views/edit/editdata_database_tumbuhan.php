<?php

include_once('../header_input.php');

if(isset($_REQUEST['id'])){

    $id = intval($_REQUEST['id']);

    $tampil = $objectSource->tampil($id);

    while($data = $tampil->fetch_object()):

        $id                     = $data->id_tumbuhan;

        $nama_tumbuhan          = $data->nama_tumbuhan;

        $nama_ilmiah_tumbuhan     = $data->nama_ilmiah_tumbuhan;

endwhile;
?>
    <!--Edit Data--> 

            

    <div class="modal-content">

      <div class="modal-header">

        <button type="button" class="close" data-dismiss="modal">&times;</button>

        <h4 class="modal-title">Edit Data Nama Tumbuhan</h4>

      </div>


<form action="database/models/proses_edit_namatumbuhan.php" method="post">

  <div class="modal-body" id="modal-edit">

      <div id="responsive-form" class="clearfix">

          


          <div class="column-half">

            <label class="control-label" for="nama_tumbuhan">Nama Tumbuhan</label>

            <input type="hidden" name="id_tumbuhan" value="<?=$id;?>">

            <input type="text" name="nama_tumbuhan" class="form-control" value="<?=$nama_tumbuhan;?>">

          </div>

        

      

          <div class="column-half">

            <label class="control-label" for="nama_ilmiah_tumbuhan">Nama Ilmiah</label>

            <em><input type="text" name="nama_ilmiah_tumbuhan" class="form-control" value="<?=$nama_ilmiah_tumbuhan;?>"></em>

          </div>



       

        </div> 

         <div class="modal-footer" id="modal-footer">

          <div class="column-full" style="margin-left: auto; margin-top: 20px;">

          <button type="reset" class="btn-default2 btn-danger" onclick="return confirm('Yakin Ingin Reset Data?')"><i class="fa fa-exclamation-circle fa-fw" aria-hidden="true"></i>&nbsp;Reset</button>&nbsp;&nbsp;

          <button type="submit" class="btn-default2 btn-success " name="input" value="input"><i class="fa fa-check-circle fa-fw" aria-hidden="true"></i>&nbsp;Simpan</button> 

          </div>   

        </form>

       </div>  

     </div>            

    </div>

  </div>

</div>




<?php
}
?>









