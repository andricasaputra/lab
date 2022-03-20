<?php

include_once('header_input.php');

if(isset($_REQUEST['id'])){

    $id = intval($_REQUEST['id']);

    $d=date("m/Y");

    $tampil = $objectData->tampil($id);

    while($data = $tampil->fetch_object()):

      $id                   = $data->id;

      $nama_sampel          = $data->nama_sampel;

      $kode_sampel          = $data->kode_sampel;

      $no_sampel            = $data->no_sampel;

      $tanggal_penunjukan   = $data->tanggal_penunjukan;

      $lab_penguji          = $data->lab_penguji;

      $nama_penyelia        = $data->nama_penyelia;

      $nama_analis          = $data->nama_analis;

      $jab_penyelia         = $data->jab_penyelia;

      $jab_analis           = $data->jab_analis;

      $hari                 = $data->hari;

      $bulan                = $data->bulan;

      $tahun                = $data->tahun;

      $no_surat_tugas       = $data->no_surat_tugas;

      $mt                   = $data->mt;

      $nip_mt               = $data->nip_mt;

      $p                    = $data->nama_patogen;



                  if ($p !== '') {

                      if ($p == 'Cendawan') {

                          $lab = 'Laboratorium Penyakit';

                          $penyelia = 'I Ketut Sindia, SP';

                          $analis = 'Fatma Dya Swari, SP';

                      }elseif ($p == 'Bakteri') {

                          $lab = 'Laboratorium Penyakit';

                          $penyelia = 'I Ketut Sindia, SP';

                          $analis = 'Fatma Dya Swari, SP';

                      }elseif ($p =='Virus') {

                          $lab = 'Laboratorium Penyakit';

                          $penyelia = 'I Ketut Sindia, SP';

                          $analis = 'Fatma Dya Swari, SP';

                      }elseif ($p == 'Serangga' || 'Lalat Buah' || 'Myte/Tungau') {

                          $lab = 'Laboratorium Hama';

                          $penyelia = 'Fatma Dya Swari, SP';

                          $analis = 'Elysa Fitri, SP';

                      }else{

                          $lab = 'Laboratorium Hama dan Penyakit';

                          $penyelia = 'I Ketut Sindia, SP';

                          $analis = 'Fatma Dya Swari, SP';

                      }

                  }





                  if ($penyelia == 'I Ketut Sindia, SP') {

                      $jab = 'POPT Ahli Muda';

                  }elseif ($penyelia == 'Fatma Dya Swari, SP') {

                      $jab = 'POPT Ahli Pertama';

                  }else{

                      $jab = 'Calon POPT Ahli Pertama';

                  }



                  if ($analis == 'I Ketut Sindia, SP') {

                      $jaba = 'POPT Ahli Muda';

                  }elseif ($analis == 'Fatma Dya Swari, SP') {

                      $jaba = 'POPT Ahli Pertama';

                  }else{

                      $jaba = 'Calon POPT Ahli Pertama';

                  }




endwhile;

?>


           
<!--Input data-->   


            <div class="modal-content">

               <div class="modal-header">

                  <button type="button" class="close" data-dismiss="modal">&times;</button>

                  <h4 class="modal-title"><i class="fa fa-gear fa-fw"></i>Input Data Usulan Penunjukan Penyelia dan Analis Pengujian</h4>

               </div>


              <form id="form_input_penyelia_analis">


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



                          <?php 

                            $i = date('Y-m-d');

                            $tgl_indo = $objectTanggal->tgl_indo($i);

                            $hari = $objectTanggal->hari($i);

                            $bln=date('m');

                            $thn=date('Y');

                            $bulan = $objectTanggal->bulan(date("m"));


                            /*Jika Data kosong (mungkin awal tahun)*/
                            $kosong = $objectNomor->Kosongdata();

                            while($ini = $kosong->fetch_object()):

                              $isi = $ini->id;

                              $n = $ini->no_surat_tugas;

                            endwhile;

                            /*Set mas id yang nomor surat tugasnya tidak kosong*/

                            $setno = $objectNomor->set_maxno();
                            while ($ambl = $setno->fetch_object()) {
                              $hasil = $ambl->Maxid;
                            }
                            

                            /*Get nomor surat tugas sesuai id yang di set/ diambil diatas*/
                            if (!empty($isi)) {

                                $maxNo = $objectNomor->max_no($hasil);

                                while($isi = $maxNo->fetch_object()):

                                $isiNo = $isi->Maxid;

                                endwhile;

                                $maxnomor = $objectNomor->max_nomor($isiNo);

                                $isi2 = $maxnomor->fetch_object();

                                $isiNomor = (int)$isi2->no_surat_tugas + 1;

                            }

 

                          ?>

               

                      <div class="column-half">

                        <label class="control-label" for="tanggal_penunjukan">Tanggal Penunjukan</label>

                        <input type="hidden" name="id" id="id_input" value="<?=$id;?>">

                        <input type="hidden" name="hari" id="hari_input" value="<?=$hari;?>">

                        <input type="hidden" name="bulan" id="bulan_input" value="<?=$bulan?>">

                        <input type="hidden" name="tahun" id="tahun_input" value="<?=$thn?>">

                        <input type="text" class="form-control" name="tanggal_penunjukan" id="tanggal_penunjukan_input" value="<?=$tgl_indo; ?>" required>

                      </div>



                      <div class="column-half">

                        <label class="control-label" for="no_surat_tugas">Nomor Surat Tugas</label>

                        <input type="text" class="form-control" name="no_surat_tugas" id="no_surat_tugas_input" value="<?=$isiNomor?>/LKT/L.50.D/<?=$bln?>/<?=$thn?>" required> 

                      </div>



                      <div class="column-half">

                        <label class="control-label" for="lab_penguji">Laboratorium Penguji</label>

                        <select class="form-control" name="lab_penguji" id="lab_penguji_input" required>

                          <option><?php echo $lab ?></option>

                          <option>Laboratorium Hama</option>

                          <option>Laboratorium Penyakit</option>

                          <option>Laboratorium Hama dan Penyakit</option>

                        </select>

                      </div>

       

                      <div class="column-half">

                        <label class="control-label" for="nama_penyelia">Penyelia</label>

                        <select class="form-control" name="nama_penyelia" id="nama_penyelia_input" required> 

                          <option><?php echo $penyelia ?></option>

                            <?php                 

                              $i = $objectData->tampil_jabatan();

                              while ($t=$i->fetch_object()) : 

                                echo '<option value="'.$t->nama_pejabat.'">'.$t->nama_pejabat.'</option>';

                              endwhile;?>

                        </select>

                      </div>



                      <div class="column-half">

                        <label class="control-label" for="nama_analis">Analis</label>

                         <select class="form-control" name="nama_analis" id="nama_analis_input" required> 

                          <option><?php echo $analis ?></option>

                            <?php                 

                              $i = $objectData->tampil_jabatan();

                              while ($t=$i->fetch_object()) : 

                                echo '<option value="'.$t->nama_pejabat.'">'.$t->nama_pejabat.'</option>';

                              endwhile;?>


                        </select>

                      </div>





                      <div class="column-half">

                        <label class="control-label" for="jab_penyelia">Jabatan Penyelia</label>

                        <select class="form-control" name="jab_penyelia" id="jab_penyelia_input" required> 

                          <option><?php echo $jab ?></option>

                        </select>

                      </div>



                      <div class="column-half">

                          <label class="control-label" for="jab_analis">Jabatan Analis</label>

                          <select class="form-control" name="jab_analis" id="jab_analis_input" required> 

                            <option><?php echo $jaba ?></option>

                          </select>

                        </div>



 

                        <div class="column-half">

                           <label class="control-label" for="mt">Ketua Pokja KH/KT</label>

                            <select class="form-control" name="mt" id="mt_input" required>

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

                              <select class="form-control" name="nip_mt" id="nip_mt_input" required>

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
    
    $("#form_input_penyelia_analis").on("submit", (function(e){

         e.preventDefault();

         $.ajax({

           url :'models/proses_input_penunjukan_penyelia_analis.php',

           type :'POST',

           data : new FormData (this),

           contentType : false,

           cache : false,

           processData : false,

           success : function(response){

            if (response == 'false') {

              swal({

                    title: "",

                    text: "Nomor Surat tugas Sudah Pernah Dipakai",

                    type: "info"

                });

            }else{


                $('#tb_usulan_penunjukan').DataTable().ajax.reload(null, false),

                swal({

                  title: "Sukses",

                  text: "Data Berhasil Di Input",

                  type: "success"

              }).then(function(){

                  $('#modal_input_usulan_penunjukan').modal('hide')

              });

            }
           }  
         })

      }));

      $( "#nama_penyelia_input" ).on('change', function () {
        let pejabatID = $(this).val();

            $.get({
                url: "views/data/SourceDataJabatan.php",
                dataType: 'Json',
                data: {'id':pejabatID},
                success: function(data) {
                    $('#jab_penyelia_input').empty();
                    $.each(data, function(key, value) {
                        $('#jab_penyelia_input').append('<option>'+ value +'</option>');
                  });
                }
            });

      });

      $( "#nama_analis_input" ).on('change', function () {
        let pejabatID = $(this).val();

            $.get({
                url: "views/data/SourceDataJabatan.php",
                dataType: 'Json',
                data: {'id':pejabatID},
                success: function(data) {
                    $('#jab_analis_input').empty();
                    $.each(data, function(key, value) {
                        $('#jab_analis_input').append('<option>'+ value +'</option>');
                  });
                }
            });

      });

      $( "#mt_input" ).on('change', function () {
        let pejabatID = $(this).val();

            $.get({
                url: "views/data/SourceDataPemohon.php",
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







