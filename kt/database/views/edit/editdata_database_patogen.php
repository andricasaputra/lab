<?php

include_once('../header_input.php');

if(isset($_REQUEST['id'])){

    $id = intval($_REQUEST['id']);

    $tampil = $objectSource2->tampil($id);

    while($data = $tampil->fetch_object()):

        $id                     = $data->id;

        $patogen                = $data->patogen;

        $nama_latin_penyakit     = $data->nama_latin_penyakit;

endwhile;
?>


    <div class="modal-content">

      <div class="modal-header">

        <button type="button" class="close" data-dismiss="modal">&times;</button>

        <h4 class="modal-title">Edit Data Nama Patogen</h4>

      </div>



         <form action="database/models/proses_edit_patogen.php" method="post">

            <div class="modal-body" id="modal-edit">    

                  <div id="responsive-form" class="clearfix">

                    

                    <div class="column-half">

                      <label class="control-label" for="patogen">Nama Hama/Penyakit</label>

                      <input type="hidden" name="id" id="id" value="<?=$id;?>">

                      <select class=" form-control "  name="patogen" id="patogen" required>

                                  <option><?php echo $patogen; ?></option>

                                  <?php 

                                    $i = $objectSource2->tampil_penyakit();

                                    while ($t=$i->fetch_object()) :       

                                    echo '<option value="'.$t->patogen.'">'.$t->patogen.'</option>';


                                  endwhile;?>
                                                                                  

                        </select>

                    </div>

                  

                    <div class="column-half">

                      <label class="control-label" for="nama_latin_penyakit">Nama Latin</label>

                      <em><input type="text" name="nama_latin_penyakit" class="form-control" value="<?=$nama_latin_penyakit;?>"></em>

                    </div>

                       

  

                    <div class="modal-footer" id="modal-footer">

                      <div class="column-full" style="margin-left: auto; margin-top: 20px;">

                      <button type="reset" class="btn-default2 btn-danger"  onclick="return confirm('Yakin Ingin Reset Data?')"><i class="fa fa-exclamation-circle fa-fw" aria-hidden="true"></i>&nbsp;Reset</button>&nbsp;&nbsp;

                      <button type="submit" class="btn-default2 btn-success"  name="input" value="input"><i class="fa fa-check-circle fa-fw" aria-hidden="true"></i>&nbsp;Simpan</button> 

                    </div> 

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









