<?php

include_once('header_input.php');

if(isset($_REQUEST['id'])){

    $id = intval($_REQUEST['id']);

    $d=date("m/Y");

    $tgl_indo = $objectTanggal->tgl_indo(date('Y-m-d'));

    $bln=date('m');

    $thn=date('Y');

    $tampil = $objectDataParasit->tampil($id);

    while($data = $tampil->fetch_object()):

      $id               = $data->id;

      $no_permohonan    = $data->no_permohonan;

      $tanggal_diterima = $data->tanggal_diterima;
        
      $penyelia         = $data->penyelia;

      $penyelia2        = $data->penyelia2;

      $analis           = $data->analis;

      $analis2          = $data->analis2;

      $bahan            = $data->bahan;

      $bahan2           = $data->bahan2;

      $alat             = $data->alat;

      $alat2            = $data->alat2;

      $ma               = $data->ma;

      $nip_ma           = $data->nip_ma;

      $saran            = $data->saran;

      $tanggal_selesai  = $data->tanggal_selesai;



endwhile;
?>




            <div class="modal-content">

               <div class="modal-header">

                  <button type="button" class="close" data-dismiss="modal">&times;</button>

                  <h4 class="modal-title"><i class="fa fa-gear fa-fw"></i>Input Data Respon Permohonan Pengujian</h4>

               </div>


            <form id="form_input_respon_permohonan_pengujian_kh">

              <div class="modal-body" id="modal-edit_kh">

                <div id="responsive-form" class="clearfix">

                
                    

                           <div class="column-half">

                                 <label class="control-label" for="no_permohonan">No.Surat Pengantar</label>

                                 <input type="text" name="no_permohonan" class="form-control" id="no_permohonan_input" value="<?=$no_permohonan;?>" disabled="disabled">

                                 <input type="hidden" name="id" id="id_input" value="<?=$id;?>">

                           </div>





                            <div class="column-half">

                                <label class="control-label" for="tanggal_diterima">Tanggal Diterima</label>

                                <input type="text" name="tanggal_diterima" class="form-control" id="tanggal_diterima_input" value="<?=$tanggal_diterima;?>" disabled="disabled">

                          </div>



                          <div class="column-half">

                                <label class="control-label" for="saran">Saran</label>

                                <textarea type="text" name="saran" class="form-control" id="saran_input" rows="1" placeholder="kosongkan jika tidak diisi">-</textarea required> 

                          </div>



                           <div class="column-half">

                                <label class="control-label" for="tanggal_selesai">Tanggal Selesai</label>

                                <input type="text" name="tanggal_selesai" class="form-control"  id="tanggal_selesai_input" value="-"  onfocus="(this.type='date')" required>

                          </div>



                           <div class="column-half">

                                 <label class="control-label" for="ma">Manajer Administrasi</label>

                                 <select class="form-control" name="ma" id="ma_input" required>

                                    <option><?php echo $ma; ?></option>

                                        <?php 

                                          $i = $objectDataParasit->tampil_pejabat();

                                          while ($t=$i->fetch_object()) : ?>

                                          <option><?=$t->nama_pejabat ;?></option>

                                        <?php endwhile;?>

                                    </select>

                           </div>



                          <div class="column-half">

                              <label class="control-label" for="nip_ma">NIP</label>

                                    <select class="form-control" name="nip_ma" id="nip_ma_input" required>

                                          <option><?php echo $nip_ma; ?></option>

                                    </select>

                          </div>



                          

                        </div>

      

                          <div class="modal-footer" >

                            <div class="column-full button-bawah">

                              <button type="submit" class="btn-default2 btn-success" name="edit" value="edit"><i class="fa fa-check-circle fa-fw" aria-hidden="true"></i>&nbsp;Simpan</button> 

                            </div>      

                          </div>

                     </form>

        </div>

      </div> 






<?php
}
?>


<script>

  $(document).ready(function(e){
  
      $("#form_input_respon_permohonan_pengujian_kh").on("submit", (function(e){

           e.preventDefault();

           $.ajax({

             url :'lab_parasit/models/proses_input_respon_permohonan_kh.php',

             type :'POST',

             data : new FormData (this),

             contentType : false,

             cache : false,

             processData : false,

             success : function(){

              $('#tb_respon_permohonan_kh_lab_parasit').DataTable().ajax.reload(null, false),

                swal({

                  title: "Sukses",

                  text: "Data Berhasil Di Input",

                  type: "success"

              }).then(function(){

                  $('#modal_input_respon_permohonan_kh').modal('hide')

              });
             }  
           });

         }));

      $( "#ma_input" ).on('change', function () {
        let pejabatID = $(this).val();

            $.get({
                url: "lab_parasit/views/data_kh/SourceDataPemohon_kh.php",
                dataType: 'Json',
                data: {'id':pejabatID},
                success: function(data) {
                    $('#nip_ma_input').empty();
                    $.each(data, function(key, value) {
                        $('#nip_ma_input').append('<option>'+ value +'</option>');
                  });
                }
            });

      });


  });

</script>








