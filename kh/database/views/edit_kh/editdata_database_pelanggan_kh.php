<?php

include_once('../header_input.php');

if(isset($_REQUEST['id'])){

    $id = intval($_REQUEST['id']);

    $tampil = $objectSource4->tampilPelanggan($id);

    while($data = $tampil->fetch_object()):

        $id                     = $data->id;

        $nama_pelanggan         = str_replace(";", "", $data->nama_pelanggan);

        $alamat_pelanggan       = str_replace(";", "", $data->alamat_pelanggan);

endwhile;
?>
    <!--Edit Data--> 

            

    <div class="modal-content">

      <div class="modal-header">

        <button type="button" class="close" data-dismiss="modal">&times;</button>

        <h4 class="modal-title">Edit Data Nama Perusahaan</h4>

      </div>


<form action="database/models/proses_edit_pelanggan.php" method="post">

  <div class="modal-body" id="modal-edit">

      <div id="responsive-form" class="clearfix">

        
          <div class="column-half">

            <label class="control-label" for="nama_pelanggan">Nama Pelanggan/Perusahaan</label>

            <input type="hidden" name="id" value="<?=$id;?>">

            <input type="text" name="nama_pelanggan" class="form-control" value="<?=$nama_pelanggan;?>">

          </div>

      
          <div class="column-half">

            <label class="control-label" for="alamat_pelanggan">Alamat</label>

            <input type="text" name="alamat_pelanggan" class="form-control" value="<?=$alamat_pelanggan;?>">

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









