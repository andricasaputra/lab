<?php

include_once('header_edit.php');

if(isset($_REQUEST['id'])){

    $id = intval($_REQUEST['id']);

    $d=date("m/Y");

    $tgl_indo = $objectTanggal->tgl_indo(date('Y-m-d'));

    $bln=date('m');

    $thn=date('Y');

    $tampil = $objectData->tampil($id);

    while($data = $tampil->fetch_object()):

      $id                   = $data->id;

      $nama_sampel          = $data->nama_sampel;

      $kode_sampel          = $data->kode_sampel;

      $no_sampel            = $data->no_sampel;

      $tanggal_penunjukan   = $data->tanggal_penunjukan;

      $hari                 = $data->hari;

      $bulan                = $data->bulan;

      $tahun                = $data->tahun;

      $lab_penguji          = $data->lab_penguji;

      $nama_penyelia        = $data->nama_penyelia;

      $nama_analis          = $data->nama_analis;

      $jab_penyelia         = $data->jab_penyelia;

      $jab_analis           = $data->jab_analis;

      $hari                 = $data->hari;

      $bulan                = $data->bulan;

      $tahun                = $data->tahun;

      $mt                   = $data->mt;

      $nip_mt               = $data->nip_mt;

      $no_surat_tugas       = $data->no_surat_tugas;


endwhile;

?>


           
<!--Input data-->   


            <div class="modal-content">

               <div class="modal-header">

                  <button type="button" class="close" data-dismiss="modal">&times;</button>

                  <h4 class="modal-title"><i class="fa fa-gear fa-fw"></i>Edit Data Usulan Penunjukan Penyelia dan Analis Pengujian</h4>

               </div>


              <form id="form_edit_penyelia_analis">


               <div class="modal-body" id="modal-edit">

                <div id="responsive-form" class="clearfix">

                
                     

                      <div class="column-half">

                        <label class="control-label" for="nama_sampel">Nama Sampel</label>

                        <input type="text" class="form-control" name="nama_sampel" id="nama_sampel_input" value="<?=$nama_sampel?>" disabled>

                      </div>



                      <div class="column-half">

                        <label class="control-label" for="kode_sampel">Kode Sampel</label>

                        <input type="text" class="form-control" name="kode_sampel" id="kode_sampel_input" value="<?=$kode_sampel;?>" disabled>

                      </div>



                      <div class="column-half">

                        <label class="control-label" for="no_sampel">Nomor Sampel</label>

                        <input type="text" class="form-control" name="no_sampel" id="no_sampel_input" value="<?=$no_sampel;?>" disabled>

                      </div>

               

                      <div class="column-half">

                        <label class="control-label" for="tanggal_penunjukan">Tanggal Penunjukan</label>

                        <input type="hidden" name="id" id="id_input" value="<?=$id;?>">

                        <input type="hidden" name="hari" id="hari_input" value="<?=$hari;?>">

                        <input type="hidden" name="bulan" id="bulan_input" value="<?=$bulan;?>">

                        <input type="hidden" name="tahun" id="tahun_input" value="<?=$thn;?>">

                        <input type="text" class="form-control" name="tanggal_penunjukan" id="tanggal_penunjukan_input" value="<?=$tanggal_penunjukan; ?>" required>

                      </div>



                      <div class="column-half">

                        <label class="control-label" for="no_surat_tugas">Nomor Surat Tugas</label>

                        <input type="text" class="form-control" name="no_surat_tugas" id="no_surat_tugas_input" value="<?=$no_surat_tugas;?>" required> 

                      </div>



                      <div class="column-half">

                        <label class="control-label" for="lab_penguji">Laboratorium Penguji</label>

                        <select class="form-control" name="lab_penguji" id="lab_penguji_input" required>

                          <option><?php echo $lab_penguji; ?></option>

                          <option>Laboratorium Hama</option>

                          <option>Laboratorium Penyakit</option>

                          <option>Laboratorium Hama dan Penyakit</option>

                        </select>

                      </div>

       

                      <div class="column-half">

                        <label class="control-label" for="nama_penyelia">Penyelia</label>

                        <select class="form-control" name="nama_penyelia" id="nama_penyelia_edit" required> 

                          <option><?php echo $nama_penyelia; ?></option>

                            <?php                 

                              $i = $objectData->tampil_jabatan();

                              while ($t=$i->fetch_object()) : 

                                echo '<option value="'.$t->nama_pejabat.'">'.$t->nama_pejabat.'</option>';

                              endwhile;?>


                        </select>

                      </div>



                      <div class="column-half">

                        <label class="control-label" for="nama_analis">Analis</label>

                         <select class="form-control" name="nama_analis" id="nama_analis_edit" required> 

                          <option><?php echo $nama_analis; ?></option>

                            <?php                 

                              $i = $objectData->tampil_jabatan();

                              while ($t=$i->fetch_object()) : 

                                echo '<option value="'.$t->nama_pejabat.'">'.$t->nama_pejabat.'</option>';

                              endwhile;?>

                        </select>

                      </div>





                      <div class="column-half">

                        <label class="control-label" for="jab_penyelia">Jabatan Penyelia</label>

                        <select class="form-control" name="jab_penyelia" id="jab_penyelia_edit" required> 

                          <option><?php echo $jab_penyelia; ?></option>


                        </select>

                      </div>



                      <div class="column-half">

                          <label class="control-label" for="jab_analis">Jabatan Analis</label>

                          <select class="form-control" name="jab_analis" id="jab_analis_edit" required> 

                            <option><?php echo $jab_analis; ?></option>

                          </select>

                        </div>



 

                        <div class="column-half">

                           <label class="control-label" for="mt">Manajer Teknis</label>

                            <select class="form-control" name="mt" id="mt_edit" required>

                              <option><?php echo $mt ?></option>

                                <?php 

                                $i = $objectData->tampil_pejabat();

                                while ($t=$i->fetch_object()) : 

                                    echo '<option value="'.$t->nama_pejabat.'">'.$t->nama_pejabat.'</option>';

                                endwhile;

                                ?>


                              </select>

                           </div>



                          <div class="column-half">

                            <label class="control-label" for="nip_mt">NIP</label>

                              <select class="form-control" name="nip_mt" id="nip_mt_edit" required>

                                    <option><?php echo $nip_mt ?></option>

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

   </div>

</div>



 

<?php
}
?>


<script>

  $(document).ready(function(e){
    
    $("#form_edit_penyelia_analis").on("submit", (function(e){

         e.preventDefault();

         $.ajax({

           url :'models/proses_editdata_penunjukan_penyelia_analis.php',

           type :'POST',

           data : new FormData (this),

           contentType : false,

           cache : false,

           processData : false,

           success : function(response){


                $('#tb_usulan_penunjukan').DataTable().ajax.reload(null, false),

                swal({

                  title: "Sukses",

                  text: "Data Berhasil Diubah",

                  type: "success"

              }).then(function(){

                  $('#modal_edit_usulan_penunjukan').modal('hide')

              });

           }  
         })

      }));

      $( "#nama_penyelia_edit" ).on('change', function () {
        let pejabatID = $(this).val();

            $.get({
                url: "views/data/SourceDataJabatan.php",
                dataType: 'Json',
                data: {'id':pejabatID},
                success: function(data) {
                    $('#jab_penyelia_edit').empty();
                    $.each(data, function(key, value) {
                        $('#jab_penyelia_edit').append('<option>'+ value +'</option>');
                  });
                }
            });

      });

      $( "#nama_analis_edit" ).on('change', function () {
        let pejabatID = $(this).val();

            $.get({
                url: "views/data/SourceDataJabatan.php",
                dataType: 'Json',
                data: {'id':pejabatID},
                success: function(data) {
                    $('#jab_analis_edit').empty();
                    $.each(data, function(key, value) {
                        $('#jab_analis_edit').append('<option>'+ value +'</option>');
                  });
                }
            });

      });

      $( "#mt_edit" ).on('change', function () {
        let pejabatID = $(this).val();

            $.get({
                url: "views/data/SourceDataPemohon.php",
                dataType: 'Json',
                data: {'id':pejabatID},
                success: function(data) {
                    $('#nip_mt_edit').empty();
                    $.each(data, function(key, value) {
                        $('#nip_mt_edit').append('<option>'+ value +'</option>');
                  });
                }
            });

      });

   });

</script>






