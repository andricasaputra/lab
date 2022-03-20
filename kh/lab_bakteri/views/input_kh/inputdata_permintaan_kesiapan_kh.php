<?php

include_once('header_input.php');

if(isset($_REQUEST['id'])){

    $id = intval($_REQUEST['id']);

    $d=date("m/Y");

    $tgl_indo = $objectTanggal->tgl_indo(date('Y-m-d'));

    $tampil = $objectData->tampil($id);

    while($data = $tampil->fetch_object()):

        $id                       = $data->id;

        $no_permohonan            = $data->no_permohonan;

        $nama_sampel              = $data->nama_sampel;

        $jumlah_sampel            = $data->jumlah_sampel;

        $kode_sampel              = $data->kode_sampel;

        $ma                       = $data->ma;

        $nip_ma                   = $data->nip_ma;


endwhile;
?>


            <div class="modal-content">

               <div class="modal-header">

                  <button type="button" class="close" data-dismiss="modal">&times;</button>

                  <h4 class="modal-title"><i class="fa fa-gear fa-fw"></i>Input Data Permintaan Kesiapan Pengujian</h4>

               </div>

           
            <form id="form_input_kesiapan_permintaan_pengujian_kh">  

               <div class="modal-body" id="modal-edit_kh">

                  <div id="responsive-form" class="clearfix">

                                       
                          <div class="column-half">

                                 <label class="control-label" for="no_permohonan">Nomor/Tanggal Surat</label>

                                 <input type="hidden" name="id" id="id_input" value="<?=$id;?>">

                                 <input type="text" name="no_permohonan" class="form-control" id="no_permohonan_input" value="<?=$no_permohonan;?>" disabled="disabled">

                           </div>


                           <div class="column-half">

                                 <label class="control-label" for="nama_sampel">Nama Sampel</label>

                                 <input type="text" name="nama_sampel" class="form-control" value="<?=$nama_sampel;?>" id="nama_sampel_input" disabled="disabled">

                           </div>


                           <div class="column-half">

                                 <label class="control-label" for="jumlah_sampel">Jumlah Sampel</label>

                                 <input type="text" name="jumlah_sampel" class="form-control" id="jumlah_sampel_input" value="<?=$jumlah_sampel;?>" disabled="disabled">

                           </div>


                           <div class="column-half">

                                 <label class="control-label" for="kode_sampel">Kode Sampel</label>

                                 <input type="text" name="kode_sampel" class="form-control"  id="kode_sampel_input" value="<?= $kode_sampel; ?>" disabled>

                           </div>


                           <div class="column-half">

                                 <label class="control-label" for="ma">Penanggungjawab Kesekretariatan</label>

                                  <select class="form-control" name="ma" id="ma_input" required>

                                    <option>Andik Akrimil Fata, SP</option>

                                        <?php 


                                          $i = $objectData->tampil_pejabat();

                                          while ($t=$i->fetch_object()) : ?>

                                          <option><?=$t->nama_pejabat ;?></option>

                                        <?php endwhile;?>

                                    </select>

                           </div>


                          <div class="column-half"  >

                              <label class="control-label" for="nip_ma">NIP</label>

                                <select class="form-control" name="nip_ma" id="nip_ma_input" required>

                                      <option>19820710 200901 1 007</option>

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
  
      $("#form_input_kesiapan_permintaan_pengujian_kh").on("submit", (function(e){

           e.preventDefault();

           $.ajax({

             url :'lab_bakteri/models/proses_input_permintaan_kesiapan_kh.php',

             type :'POST',

             data : new FormData (this),

             contentType : false,

             cache : false,

             processData : false,

             success : function(response){

                if (response == 'false') {

                        swal({

                            title: "",

                            text: "Kode Sampel Sudah Pernah Dipakai",

                            type: "info"

                        });

            
                  }else{

                       $('#tb_permintaan_kesiapan_kh').DataTable().ajax.reload(null, false),

                          swal({

                            title: "Sukses",

                            text: "Data Berhasil Di Input",

                            type: "success"

                        }).then(function(){

                            $('#modal_input_permintaan_kesiapan_kh').modal('hide')

                        });

                  }
             }  
           });

        }));

        $( "#ma_input" ).on('change', function () {
        let pejabatID = $(this).val();

            $.get({
                url: "lab_bakteri/views/data_kh/SourceDataPemohon_kh.php",
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







