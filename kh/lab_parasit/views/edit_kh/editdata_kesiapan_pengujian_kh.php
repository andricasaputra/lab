<?php

include_once('header_edit.php');

if(isset($_REQUEST['id'])){

    $id = intval($_REQUEST['id']);

    $d=date("m/Y");

    $tgl_indo = $objectTanggal->tgl_indo(date('Y-m-d'));

    $bln=date('m');

    $thn=date('Y');

    $tampil = $objectDataParasit->tampil($id);

    while($data = $tampil->fetch_object()):

      $id                 = $data->id;

      $no_permohonan      = $data->no_permohonan;

      $no_sampel_awal     = $data->no_sampel_awal;

      $kode_sampel        = $data->kode_sampel;

      $kondisi_sampel     = $data->kondisi_sampel;

      $mt                 = $data->mt;

      $nip_mt             = $data->nip_mt;

      $penyelia           = $data->penyelia;

      $penyelia2          = $data->penyelia2;

      $analis             = $data->analis;

      $analis2            = $data->analis2;

      $bahan              = $data->bahan;

      $bahan2             = $data->bahan2;

      $alat               = $data->alat;

      $alat2              = $data->alat2;

      $kesiapan           = $data->kesiapan;

      $no_sampel          = $data->no_sampel;

      $jumlah_sampel      = $data->jumlah_sampel;



endwhile;
?>


            <div class="modal-content">

               <div class="modal-header">

                  <button type="button" class="close" data-dismiss="modal">&times;</button>

                   <h4 class="modal-title"><i class="fa fa-gear fa-fw"></i>Edit Data Kesiapan Pengujian</h4>

               </div>


               <form id="form_edit_kesiapan_pengujian_kh">

                <div class="modal-body" id="modal-edit">

                     <div id="responsive-form" class="clearfix">

  
                           <div class="column-half">

                                 <label class="control-label" for="kode_sampel">Kode Sampel</label>

                                 <input type="text" name="kode_sampel" class="form-control" id="kode_sampel_input" value="<?=$kode_sampel?>" disabled="disabled">

                                 <input type="hidden" name="id" id="id_input" value="<?=$id?>">

                                 <input type="hidden" name="no_sampel_awal" id="no_sampel_awal_input" value="<?=$no_sampel_awal?>">

                           </div>

  

                          <div class="column-half">

                                  <label class="control-label" for="kondisi_sampel" >Kondisi Sampel</label>

                                  <select class="form-control" name="kondisi_sampel" id="kondisi_sampel_input" required>

                                  <option><?php echo $kondisi_sampel ?></option>

                                  <option>Baik</option>

                                  <option>Busuk</option>

                                  <option>Rusak</option>

                                  <option>Lainnya</option>

                                  <option>-</option>

                                  </select>

                          </div>

                           <div class="column-half column-seperempat">

                            <label class="control-label" for="penyelia">Penyelia</label>

                              <select class="form-control" name="penyelia" id="penyelia_input"  required>

                                  <?php if ($penyelia == 'Kompeten') { ?>

                                    <option selected>Kompeten</option>

                                    <option>Tidak Kompeten</option> 

                                <?php  }else{ ?>

                                    <option>Kompeten</option>

                                    <option selected>Tidak Kompeten</option> 

                                <?php  } ?>                                   

                              </select>

      

                            </div>



                            <div class="column-half column-seperempat">

                              <label class="control-label" for="penyelia">&nbsp;</label>

                              <select class="form-control" name="penyelia2" id="penyelia2_input" required>

                                  <?php if ($penyelia2 == 'Ada') { ?>

                                    <option selected="selected">Ada</option>

                                    <option>Tidak Ada</option>  

                                <?php  }else{ ?>

                                    <option>Ada</option>

                                    <option selected>Tidak Ada</option> 

                                <?php  } ?>                                       
  

                              </select>

                          </div>



                           <div class="column-half column-seperempat">

                            <label class="control-label" for="analis">Analis</label>

                              <select class="form-control" name="analis" id="analis_input"  required>

                                  <?php if ($analis == 'Kompeten') { ?>

                                    <option selected>Kompeten</option>

                                    <option>Tidak Kompeten</option> 

                                <?php  }else{ ?>

                                    <option>Kompeten</option>

                                    <option selected>Tidak Kompeten</option> 

                                <?php  } ?>     

                              </select>

                            </div>



                          <div class="column-half column-seperempat">

                              <label class="control-label" for="penyelia">&nbsp;</label>

                              <select class="form-control" name="analis2" id="analis2_input"  required>

                                  <?php if ($analis2 == 'Ada') { ?>

                                    <option selected="selected">Ada</option>

                                    <option>Tidak Ada</option>  

                                <?php  }else{ ?>

                                    <option>Ada</option>

                                    <option selected>Tidak Ada</option> 

                                <?php  } ?>                                       
       

                              </select>

                          </div>



                          <div class="column-half column-seperempat">

                                <label class="control-label" for="bahan">Bahan</label>

                                  <select class="form-control" name="bahan" id="bahan_input"  required>

                                    <?php if ($bahan == 'Baik') { ?>

                                    <option selected="selected">Baik</option>

                                    <option>Kadaluarsa</option> 

                                    <?php  }else{ ?>

                                        <option>Baik</option>

                                        <option selected>Kadaluarsa</option> 

                                    <?php  } ?>                                       
                                        
                              </select>

                          </div>



                          <div class="column-half column-seperempat">

                              <label class="control-label" for="penyelia">&nbsp;</label>

                              <select class="form-control" name="bahan2" id="bahan2_input"  required>

                                   <?php if ($bahan2 == 'Ada') { ?>

                                    <option selected="selected">Ada</option>

                                    <option>Tidak Ada</option>  

                                  <?php  }else{ ?>

                                      <option>Ada</option>

                                      <option selected>Tidak Ada</option> 

                                  <?php  } ?>                                          

                              </select>

                          </div>



                           <div class="column-half column-seperempat">

                            <label class="control-label" for="alat">Alat</label>

                              <select class="form-control" name="alat" id="alat_input" required>

                                   <?php if ($alat == 'Ada') { ?>

                                    <option selected="selected">Ada</option>

                                    <option>Tidak Ada</option>  

                                  <?php  }else{ ?>

                                      <option>Ada</option>

                                      <option selected>Tidak Ada</option> 

                                  <?php  } ?>                                   
    

                              </select>

                            </div>





                           <div class="column-half column-seperempat">

                            <label class="control-label" for="penyelia">&nbsp;</label>

                              <select class="form-control" name="alat2" id="alat2_input" required>

                                  <?php if ($alat2 == 'Baik') { ?>

                                    <option selected="selected">Baik</option>

                                    <option>Rusak</option>  

                                    <?php  }else{ ?>

                                        <option>Baik</option>

                                        <option selected>Rusak</option> 

                                    <?php  } ?>                                         

                              </select>

                          </div>




                           <div class="column-half">

                                 <label class="control-label" for="mt">Korfung KH/KT</label>

                                  <select class="form-control" name="mt" id="mt_input" required>

                                    <option><?php echo $mt ?></option>

                                        <?php 

                                        $i = $objectDataParasit->tampil_pejabat();

                                        while ($t=$i->fetch_object()) : 

                                            echo '<option value="'.$t->nama_pejabat.'">'.$t->nama_pejabat.'</option>';

                                        endwhile;

                                        ?>

                                  </select>

                           </div>



                          <div class="column-half">

                              <label class="control-label" for="nip_mt">NIP</label>

                                    <select class="form-control" name="nip_mt" id="nip_mt_input" required>

                                          <option><?php echo $nip_mt ?></option>

                                    </select>

                          </div>

                          <div class="column-half">

                            <label>Kesiapan Laboratorium</label>

                            <br>

                              <?php 

                                if ($kesiapan == "Ya") { ?>

                                  <label class="checkbox-inline">
                                    <input type="checkbox" name="kesiapan" checked value="Ya">Ya
                                  </label>

                                  <label class="checkbox-inline">
                                    <input type="checkbox" name="kesiapan" value="Tidak">Tidak
                                  </label>


                              <?php  }else{ ?>

                                  <label class="checkbox-inline">
                                    <input type="checkbox" name="kesiapan" value="Ya">Ya
                                  </label>

                                  <label class="checkbox-inline">
                                    <input type="checkbox" name="kesiapan" checked value="Tidak">Tidak
                                  </label>


                             <?php }

                              ?>

                              <input type="hidden" name="no_sampel" id="no_sampel" value="<?=$no_sampel;?>">

                              <input type="hidden" name="jumlah_sampel" id="jumlah_sampel" value="<?=$jumlah_sampel;?>">
                              
                          </div>

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

<?php } ?>

<script>

  $(document).ready(function(e){
    
    $("#form_edit_kesiapan_pengujian_kh").on("submit", (function(e){

         e.preventDefault();

         $.ajax({

           url :'lab_parasit/models/proses_editdata_kesiapan_pengujian_kh.php',

           type :'POST',

           data : new FormData (this),

           contentType : false,

           cache : false,

           processData : false,

           success : function(response){


            $('#tb_kesiapan_pengujian_kh_lab_parasit').DataTable().ajax.reload(null, false),

              swal({

                title: "Sukses",

                text: "Data Berhasil Diubah",

                type: "success"

            }).then(function(){

                $('#modal_edit_kesiapan_pengujian_kh').modal('hide')

            });
           }  
         });

      }));

    $( "#mt_input" ).on('change', function () {
        let pejabatID = $(this).val();

            $.get({
                url: "lab_parasit/views/data_kh/SourceDataPemohon_kh.php",
                dataType: 'Json',
                data: {'id':pejabatID},
                success: function(data) {
                    $('#nip_mt_input').empty();
                    $.each(data, function(key, value) {
                        $('#nip_mt_input').append('<option>'+ value +'</option>');
                  });
                }
            });

      });


   });

</script>





