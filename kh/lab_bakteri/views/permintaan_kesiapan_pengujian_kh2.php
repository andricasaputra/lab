<?php

$data = new DataKh($connection);

$bln=date('m');

$thn=date('Y');

require_once('models/kode_sampel_kh.php');

?>

<!--Lihat Tabel Main Data--> 

<div class="bg">

  <div class="bg"></div>

</div>

      <div>

          <ol class="page-header breadcrumb breadcrumb-fixed">

            <div id="top">

                <a id="view_data" data-toggle="modal" data-target="#view">

                <button class="btn btn-kuprimary"><i class="fa fa-eye fa-fw"></i>Lihat</button></a>



                <div class="btn-group " align="left">

                  <button type="button" class="btn btn-kuprimary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-th-list fa-fw"></i> Menu <i class="fa fa-caret-down fa-fw"></i></button>

                    <div class="dropdown-menu" style="font-size: 11pt; width: 200px;">

                          <a href="./report/export/export_excel_permintaan_kesiapan_pengujian.php" target="_blank"><font color="#2e2e1f"><i class="fa fa-download fa-fw"></i> Export Excel Semua Data</font></a>

                        <li class="divider"></li>

                          <a href="" data-toggle="modal" data-target="#export"><font color="#2e2e1f"><i class="fa fa-cloud-download fa-fw"></i> Export Excel Per Periode</font><a>

                        <li class="divider"></li>

                          <a href="" data-toggle="modal" data-target="#pertanggal"><font color="#2e2e1f"><i class="fa fa-print fa-fw"></i> Print Per Periode</font></a>

                    </div>

                </div> 



            </div> 

            <div class="judul">

                <i class="fa fa-info-circle fa-fw fa-lg" aria-hidden="true"></i><b><h4>Data Permintaan Kesiapan Pengujian</h4></b>

            </div>

          </ol>

      </div>

<div class="bg2">

  <div class="bg2"></div>

</div>



      

       <div class="row" id="tb">

        <div class="col-lg-12">

          <div class="table-responsive">

            

        <?php if (isset($_SESSION['loginsuperkh'])){ ?>



            <table class="table table-hover table-striped" id="datatables1">

                <thead>

                  <tr>

                      <th width= "5%">No</th>

                      <th width= "13%">Tanggal Permohonan</th>

                      <th width= "13%">Tanggal Diterima</th>

                      <th width= "18%">Nomor Permohonan</th>

                      <th width= "16%">Kode Sampel</th>

                      <th width= "16%">Nama Sampel</th>                 

                      <th width= "19%">Action</th>

                  </tr>

                </thead>

              <tbody>

        <?php   



                $no=1;

                $tampil = $data->tampil1(); 

        }elseif (isset($_SESSION['loginadminkh'])) { ?>



            <table class="table table-hover table-striped" id="datatables1">

              <thead>

                  <tr>

                      <th width= "5%">No</th>

                      <th width= "13%">Tanggal Permohonan</th>

                      <th width= "13%">Tanggal Diterima</th>

                      <th width= "18%">Nomor Permohonan</th>

                      <th width= "16%">Kode Sampel</th>

                      <th width= "16%">Nama Sampel</th>                 

                      <th width= "19%">Action</th>

                  </tr>

                </thead>

              <tbody>

      <?php     



                $no=1;

                $tampil = $data->tampil1(); 



          }else{ ?>



          <table class="table table-hover table-striped" id="datatables">

              <thead>

                  <tr>

                      <th width= "5%">No</th>

                      <th width= "13%">Tanggal Permohonan</th>

                      <th width= "13%">Tanggal Diterima</th>

                      <th width= "18%">Nomor Permohonan</th>

                      <th width= "16%">Kode Sampel</th>

                      <th width= "16%">Nama Sampel</th>                 

                      <th width= "19%">Action</th>

                  </tr>

                </thead>

              <tbody>

      <?php  



                $no=1;

                $tampil = $data->tampil2(); 



          }

               

                while ($data = $tampil->fetch_object()):

                    $isi = $data->kode_sampel || $data->kode_sampel_sapi || $data->kode_sampel_sapi_bibit || $data->kode_sampel_kerbau || $data->kode_sampel_kuda || $data->kode_sampel_lain;

                    $selesai = $data->no_agenda;

                    $tgl = $data->tanggal_diterima;

                    $penerima = $data->penerima_sampel;

                    $nama_sampel = $data->nama_sampel;

                    $kode_sampel = $data->kode_sampel;

                    $kode_sampel_sapi = $data->kode_sampel_sapi;

                    $kode_sampel_sapi_bibit = $data->kode_sampel_sapi_bibit;

                    $kode_sampel_kerbau = $data->kode_sampel_kerbau;

                    $kode_sampel_kuda = $data->kode_sampel_kuda;

                    $kode_sampel_lain = $data->kode_sampel_lain;




                    if($isi == 0){ ?>



                      <tr class="kosong">

                        <td><?php echo $no++ ?></td>

                        <td><?php echo $data->tanggal_permohonan; ?></td>

                        <td><?php echo $data->tanggal_diterima; ?></td>

                        <td><?php echo $data->no_permohonan; ?></td>

                        <?php  

                           if ($nama_sampel == 'Darah Sapi') { 

                                ?>
                                
                                <td><?php echo $data->kode_sampel_sapi; ?></td>

                                <?php

                          }elseif ($nama_sampel == 'Darah Sapi Bibit') {
                                
                                ?>
                                
                                <td><?php echo $data->kode_sampel_sapi_bibit; ?></td>

                                <?php

                          }elseif ($nama_sampel == 'Darah Kerbau') {
                                
                                ?>
                                
                                <td><?php echo $data->kode_sampel_kerbau; ?></td>

                                <?php

                          }elseif ($nama_sampel == 'Darah Kuda') {

                                ?>
                                
                                <td><?php echo $data->kode_sampel_kuda; ?></td>

                                <?php

                          }else{

                                ?>
                                
                                <td><?php echo $data->kode_sampel_lain; ?></td>

                                <?php
                          }
                        ?>

                        

                        <td><?php echo $data->nama_sampel; ?></td>



                    <?php }elseif($selesai == 0) { ?>



                      <tr class="proses">

                        <td><?php echo $no++ ?></td>

                        <td><?php echo $data->tanggal_permohonan; ?></td>

                        <td><?php echo $data->tanggal_diterima; ?></td>

                        <td><?php echo $data->no_permohonan; ?></td>

                        <?php  

                           if ($nama_sampel == 'Darah Sapi') { 

                                ?>
                                
                                <td><?php echo $data->kode_sampel_sapi; ?></td>

                                <?php

                          }elseif ($nama_sampel == 'Darah Sapi Bibit') {
                                
                                ?>
                                
                                <td><?php echo $data->kode_sampel_sapi_bibit; ?></td>

                                <?php

                          }elseif ($nama_sampel == 'Darah Kerbau') {
                                
                                ?>
                                
                                <td><?php echo $data->kode_sampel_kerbau; ?></td>

                                <?php

                          }elseif ($nama_sampel == 'Darah Kuda') {

                                ?>
                                
                                <td><?php echo $data->kode_sampel_kuda; ?></td>

                                <?php

                          }else{

                                ?>
                                
                                <td><?php echo $data->kode_sampel_lain; ?></td>

                                <?php
                          }
                        ?>

                        

                        <td><?php echo $data->nama_sampel; ?></td>



                    <?php  } else {?>

                      <tr class="selesai">

                        <td><?php echo $no++ ?></td>

                        <td><?php echo $data->tanggal_permohonan; ?></td>

                        <td><?php echo $data->tanggal_diterima; ?></td>

                        <td><?php echo $data->no_permohonan; ?></td>

                        <?php  

                           if ($nama_sampel == 'Darah Sapi') { 

                                ?>
                                
                                <td><?php echo $data->kode_sampel_sapi; ?></td>

                                <?php

                          }elseif ($nama_sampel == 'Darah Sapi Bibit') {
                                
                                ?>
                                
                                <td><?php echo $data->kode_sampel_sapi_bibit; ?></td>

                                <?php

                          }elseif ($nama_sampel == 'Darah Kerbau') {
                                
                                ?>
                                
                                <td><?php echo $data->kode_sampel_kerbau; ?></td>

                                <?php

                          }elseif ($nama_sampel == 'Darah Kuda') {

                                ?>
                                
                                <td><?php echo $data->kode_sampel_kuda; ?></td>

                                <?php

                          }else{

                                ?>
                                
                                <td><?php echo $data->kode_sampel_lain; ?></td>

                                <?php
                          }
                        ?>

                        

                        <td><?php echo $data->nama_sampel; ?></td>



                  <?php }



                // Jika Tanggal Diterima Kosong /Sampel Belum Diterima



                if ($tgl == 0 && $penerima == 0){ ?>



                      <td>

                      <a><button class="btn btn-success btn-xs" disabled><i class="fa fa-plus-circle fa-fw"></i>Input</button></a>

                      <a><button class="btn btn-warning btn-xs" disabled><i class="fa fa-edit fa-fw"></i>Edit</button></a>  

                      <a class="btn btn-danger btn-xs" disabled><i class="fa fa-print fa-fw"></i>Print</a>



                      <!-- Jika Nomor Agenda Belum ada -->

               <?php }elseif($selesai == 0){ 



                    // Jika Kode Sampel Kosong

                      if($isi == 0){ ?>



                          <td>

                          <a id="input_pemintaan_kesiapan_pengujian_kh" data-toggle="modal" data-target="#input" 

                          data-id_input="<?php echo $data->id?>" 

                          data-no_permohonan_input="<?php echo $data->no_permohonan?>" 

                          data-nama_sampel_input="<?php echo $data->nama_sampel ?>" 

                          data-jumlah_sampel_input="<?php echo $data->jumlah_sampel?>" 

                          data-kode_sampel_input="<?php echo $data->kode_sampel?>" 

                          data-ma_input="<?php echo 'Muhammad Ridwan' ?>" 

                          data-nip_ma_input="<?php echo '19650101 200212 1 001' ?>">

                          <button class="btn btn-success btn-xs"><i class="fa fa-plus-circle fa-fw"></i>Input</button></a>



                          <a><button class="btn btn-warning btn-xs btn-not-allowed"><i class="fa fa-edit fa-fw"></i>Edit</button></a>



                          

                          <a class="btn btn-danger btn-xs btn-not-allowed"><i class="fa fa-print fa-fw"></i>Print</a>



                        <!-- Jika Kode Sampel Sudah Terisi -->



                        <?php }else{ ?>



                            <td>

                            <a><button class="btn btn-success btn-xs btn-not-allowed"><i class="fa fa-plus-circle fa-fw"></i>Input</button></a>



                            <a id="edit_pemintaan_kesiapan_pengujian_kh" data-toggle="modal" data-target="#edit" 

                            data-id="<?php echo $data->id?>" 

                            data-no_permohonan="<?php echo $data->no_permohonan?>" 

                            data-nama_sampel="<?php echo $data->nama_sampel ?>" 

                            data-jumlah_sampel="<?php echo $data->jumlah_sampel?>" 

                            <?php if ($kode_sampel !== '') {
                                
                                ?>

                                    data-kode_sampel="<?php echo $data->kode_sampel?>"

                                <?php
                            }  elseif ($kode_sampel_sapi !== '') {
                                 ?>

                                    data-kode_sampel="<?php echo $data->kode_sampel_sapi?>"

                                <?php   
                            }elseif ($kode_sampel_sapi_bibit !=='') {
                                ?>

                                    data-kode_sampel="<?php echo $data->kode_sampel_sapi_bibit?>"

                                <?php
                            }elseif ($kode_sampel_kerbau !== '') {
                              ?>

                                    data-kode_sampel="<?php echo $data->kode_sampel_kerbau?>"

                                <?php
                            }elseif ($kode_sampel_kuda !=='') {
                                ?>

                                    data-kode_sampel="<?php echo $data->kode_sampel_kuda?>"

                                <?php
                            }elseif ($kode_sampel_lain !=='') {
                                    
                                    ?>

                                    data-kode_sampel="<?php echo $data->kode_sampel_lain?>"

                                <?php
                            }

                            ?>

                             

                            data-ma="<?php echo $data->ma ?>" 

                            data-nip_ma="<?php echo $data->nip_ma ?>">



                            <button class="btn btn-warning btn-xs"><i class="fa fa-edit fa-fw"></i>Edit</button></a>   

                        

                            <a class="btn btn-danger btn-xs" href="./report/print/print_permin_pengujian.php?id=<?php echo $data->id?>" target="_blank"><i class="fa fa-print fa-fw"></i>Print</a>



                    <!-- Jika Sudah Ada nomor Agenda/Selesai -->



                          <?php } 

                  }else{ 

                          // Jika Login Sebagai Superadmin

                         if(isset($_SESSION['loginsuperkh'])){ ?>



                          <td>

                            <a><button class="btn btn-success btn-xs btn-not-allowed"><i class="fa fa-plus-circle fa-fw"></i>Input</button></a>



                            <a id="edit_pemintaan_kesiapan_pengujian_kh" data-toggle="modal" data-target="#edit" 

                            data-id="<?php echo $data->id?>" 

                            data-no_permohonan="<?php echo $data->no_permohonan?>" 

                            data-nama_sampel="<?php echo $data->nama_sampel ?>" 

                            data-jumlah_sampel="<?php echo $data->jumlah_sampel?>" 

                            <?php if ($kode_sampel !== '') {
                                
                                ?>

                                    data-kode_sampel="<?php echo $data->kode_sampel?>"

                                <?php
                            }  elseif ($kode_sampel_sapi !== '') {
                                 ?>

                                    data-kode_sampel="<?php echo $data->kode_sampel_sapi?>"

                                <?php   
                            }elseif ($kode_sampel_sapi_bibit !=='') {
                                ?>

                                    data-kode_sampel="<?php echo $data->kode_sampel_sapi_bibit?>"

                                <?php
                            }elseif ($kode_sampel_kerbau !== '') {
                              ?>

                                    data-kode_sampel="<?php echo $data->kode_sampel_kerbau?>"

                                <?php
                            }elseif ($kode_sampel_kuda !=='') {
                                ?>

                                    data-kode_sampel="<?php echo $data->kode_sampel_kuda?>"

                                <?php
                            }elseif ($kode_sampel_lain !=='') {
                                    
                                    ?>

                                    data-kode_sampel="<?php echo $data->kode_sampel_lain?>"

                                <?php
                            }

                            ?>

                            data-ma="<?php echo $data->ma ?>" 

                            data-nip_ma="<?php echo $data->nip_ma ?>">



                            <button class="btn btn-warning btn-xs"><i class="fa fa-edit fa-fw"></i>Edit</button></a>   

                        

                            <a class="btn btn-danger btn-xs" href="./report/print/print_permin_pengujian.php?id=<?php echo $data->id?>" target="_blank"><i class="fa fa-print fa-fw"></i>Print</a>



                            <!--  Jika Login Bukan Sebagai Superadmin -->

                           

                            <?php }else{ ?>



                            <td>

                            <a><button class="btn btn-success btn-xs btn-not-allowed"><i class="fa fa-plus-circle fa-fw"></i>Input</button></a>



                            <a><button class="btn btn-warning btn-xs btn-not-allowed"><i class="fa fa-edit fa-fw"></i>Edit</button></a>   

                        

                            <a class="btn btn-danger btn-xs" href="./report/print/print_permin_pengujian.php?id=<?php echo $data->id?>" target="_blank"><i class="fa fa-print fa-fw"></i>Print</a>

                  <?php } 

                  } ?>                    

                </td>

              </tr>

            <?php

             endwhile; ?>  

          </tbody>

        </table>

      </div>

    </div>  

  </div>

</div>



<!-- Print Multiple -->

       

<div id="pertanggal" class="modal fade" role="dialog">

  <div class="modal-dialog" style="width: 30%">

    <div class="modal-content">

      <div class="modal-header">

        <button type="button" class="close" data-dismiss="modal">&times;</button>

        <h4>Pilih Tanggal</h4>

      </div>

        <div class="modal-body" id="modal-print">

          <div id="responsive-form" class="clearfix">

                <form action="./report/print/print_permin_pengujian_multi.php" method="post" target="_blank">

                  <table>

                    <tr>

                      <td width="40%">

                        <div class="form-group" align="left">Dari tanggal</div>

                      </td>

                      <td width="10%">

                        <div class="form-group" align="center">:</div>

                      </td>

                      <td>

                        <div class="form-group">

                          <input type="date" name="tgl_a" class="form-control" required>

                        </div>

                      </td>

                    </tr>

                    <tr>

                      <td width="40%">

                        <div class="form-group" align="left">Sampai tanggal</div>

                      </td>

                      <td>

                        <div class="form-group" align="center">:</div>

                      </td>

                      <td>

                        <div class="form-group">

                          <input type="date" name="tgl_b" class="form-control" required>

                        </div>

                      </td>

                    </tr>

                  </table>

                

            <div class="modal-footer" >

              <table>

                  <tr>                            

                    <td>

                      <input type="submit" name="print_data" class="btn btn-success" value="Print">

                    </td>

                  </tr>

              </table>  

            </div>

          </form>

        </div>

      </div>

    </div>

  </div>

</div>



<!-- Export Multiple -->



<div id="export" class="modal fade" role="dialog">

  <div class="modal-dialog" style="width: 30%">

    <div class="modal-content">

      <div class="modal-header">

        <button type="button" class="close" data-dismiss="modal">&times;</button>

        <h4>Pilih Tanggal</h4>

      </div>

        <div class="modal-body" id="modal-print">

          <div id="responsive-form" class="clearfix">

                <form action="./report/export/export_excel_permintaan_kesiapan_pengujian_bulan.php" method="post" target="_blank">

                  <table>

                    <tr>

                      <td width="40%">

                        <div class="form-group" align="left">Dari tanggal</div>

                      </td>

                      <td width="10%">

                        <div class="form-group" align="center">:</div>

                      </td>

                      <td>

                        <div class="form-group">

                          <input type="date" name="tgl_a" class="form-control" required>

                        </div>

                      </td>

                    </tr>

                    <tr>

                      <td width="40%">

                        <div class="form-group" align="left">Sampai tanggal</div>

                      </td>

                      <td>

                        <div class="form-group" align="center">:</div>

                      </td>

                      <td>

                        <div class="form-group">

                          <input type="date" name="tgl_b" class="form-control" required>

                        </div>

                      </td>

                    </tr>

                  </table>

                

            <div class="modal-footer" >

              <table>

                  <tr>                          

                    <td>

                      <input type="submit" name="export_data" class="btn btn-success" value="Export">

                    </td>

                  </tr>

              </table>  

            </div>

          </form>

        </div>

      </div>

    </div>

  </div>

</div>



<!--Input data-->  



 <div id="input" class="modal fade" role="dialog">

         <div class="modal-dialog">

            <div class="modal-content">

               <div class="modal-header">

                  <button type="button" class="close" data-dismiss="modal">&times;</button>

                  <h4 class="modal-title"><i class="fa fa-gear fa-fw"></i>Data Permintaan Kesiapan Pengujian</h4>

               </div>

           

               <div class="modal-body" id="modal-edit_kh">

                  <div id="responsive-form" class="clearfix">

                      <form id="form_input_kesiapan_permintaan_pengujian_kh">                   

                          <div class="column-half">

                                 <label class="control-label" for="no_permohonan">Nomor/Tanggal Surat</label>

                                 <input type="hidden" name="id" id="id_input">

                                 <input type="text" name="no_permohonan" class="form-control" id="no_permohonan_input" disabled="disabled">

                           </div>



         

                           <div class="column-half">

                                 <label class="control-label" for="nama_sampel">Nama Sampel</label>

                                 <input type="text" name="nama_sampel" class="form-control" id="nama_sampel_input" disabled="disabled">

                           </div>



   

                           <div class="column-half">

                                 <label class="control-label" for="jumlah_sampel">Jumlah Sampel</label>

                                 <input type="text" name="jumlah_sampel" class="form-control" id="jumlah_sampel_input" disabled="disabled">

                           </div>


                           <div class="column-half">

                                 <label class="control-label" for="kode_sampel">Kode Sampel</label>

                                 <input type="text" name="<?php echo $nama;?>" class="form-control" id="kode_sampel_input" value="<?= $format2 ?>" required>

                           </div>



                           <div class="column-half">

                                 <label class="control-label" for="ma">Manajer Administrasi/ Deputi Manajer Administrasi</label>

                                  <select class="form-control" name="ma" id="ma_input" required>

                                    <option></option>

                                        <?php 

                                          $data = new DataKh($connection);

                                          $i = $data->tampil_pejabat();

                                          while ($t=$i->fetch_object()) : ?>

                                          <option><?=$t->nama_pejabat ;?></option>

                                        <?php endwhile;?>

                                    </select>

                           </div>



                          <div class="column-half"  >

                              <label class="control-label" for="nip_ma">NIP</label>

                                <select class="form-control" name="nip_ma" id="nip_ma_input" required>

                                      <option>-</option>

                                      <optgroup label="Muhammad Ridwan "> 

                                      <option>19600706 198302 1 001</option>

                                      </optgroup>

                                      <optgroup label="Muhammad Tamrin "> 

                                      <option>19650101 200212 1 001</option>

                                      </optgroup>

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

            

<!--Edit data-->  



 <div id="edit" class="modal fade" role="dialog">

         <div class="modal-dialog">

            <div class="modal-content">

               <div class="modal-header">

                  <button type="button" class="close" data-dismiss="modal">&times;</button>

                  <h4 class="modal-title"><i class="fa fa-gear fa-fw"></i>Data Permintaan Kesiapan Pengujian</h4>

               </div>

           

               <div class="modal-body" id="modal-edit_kh">

                  <div id="responsive-form" class="clearfix">

                      <form id="form_edit_kesiapan_permintaan_pengujian_kh">                   

                          <div class="column-half">

                                 <label class="control-label" for="no_permohonan">Nomor/Tanggal Surat</label>

                                 <input type="hidden" name="id" id="id">

                                 <input type="text" name="no_permohonan" class="form-control" id="no_permohonan" disabled="disabled">

                           </div>



         

                           <div class="column-half">

                                 <label class="control-label" for="nama_sampel">Nama Sampel</label>

                                 <input type="text" name="nama_sampel" class="form-control" id="nama_sampel" disabled="disabled">

                           </div>



   

                           <div class="column-half">

                                 <label class="control-label" for="jumlah_sampel">Jumlah Sampel</label>

                                 <input type="text" name="jumlah_sampel" class="form-control" id="jumlah_sampel" disabled="disabled">

                           </div>





                              <div class="column-half">

                                 <label class="control-label" for="kode_sampel">Kode Sampel</label>

                                 <input type="text" name="kode_sampel" class="form-control" id="kode_sampel"  required>

                           </div>



  

                           <div class="column-half">

                                 <label class="control-label" for="ma">Manajer Administrasi/ Deputi Manajer Administrasi</label>

                                  <select class="form-control" name="ma" id="ma" required>

                                    <option></option>

                                        <?php 

                                          $data = new DataKh($connection);

                                          $i = $data->tampil_pejabat();

                                          while ($t=$i->fetch_object()) : ?>

                                          <option><?=$t->nama_pejabat ;?></option>

                                        <?php endwhile;?>

                                    </select>

                           </div>







                          <div class="column-half"  >

                              <label class="control-label" for="nip_ma">NIP</label>

                                <select class="form-control" name="nip_ma" id="nip_ma" required>

                                      <option>-</option>

                                      <optgroup label="Muhammad Ridwan "> 

                                      <option>19600706 198302 1 001</option>

                                      </optgroup>

                                      <optgroup label="Muhammad Tamrin "> 

                                      <option>19650101 200212 1 001</option>

                                      </optgroup>

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



<div id="view" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">

  <div class="modal-dialog1">

     <div class="modal-body">

        <div class="row" >   

        <a class="btn btn-info btn-kembali" data-dismiss="modal"><i class="fa fa-arrow-circle-left fa-fw" aria-hidden="true"></i>Kembali</a>

              <table class="table-responsive" >

                    <table class="table1 table-bordered table-hover" id="datatables2" cellpadding="10px" cellspacing="30px">

                        <thead class="mdb-color lighten-4">

                              <tr class="lihat-head2">

                                    <th>No</th>

                                    <th>No./Tlg Surat</th>

                                    <th>Tanggal Diterima</th>

                                    <th>Nama Sampel</th>

                                    <th>Jenis Sampel/HS Code</th>

                                    <th>Jumlah Sampel</th>

                                    <th>Target Pengujian</th>

                                    <th>Kode Sampel</th>

                                    <th>Manajer Administrasi</th>



                              </tr>

                          </thead>

                          <tbody>

                                <?php

                                $data= new DataKh ($connection);

                                $nomor=1;

                                $tampil = $data->tampil2();

                                while ($data = $tampil->fetch_object()){

                                ?>

                                <tr>

                                      <td><?php echo $nomor++; ?></td>

                                      <td><?php echo $data->no_permohonan; ?></td>

                                      <td><?php echo $data->tanggal_diterima; ?></td>

                                      <td><?php echo $data->nama_sampel; ?></td>

                                      <td><?php echo $data->bagian_hewan; ?></td>

                                      <td><?php echo $data->jumlah_sampel; ?></td>

                                      <td><?php echo $data->target_pengujian2; ?> </td>

                                      <td><?php echo $data->kode_sampel; ?></td>

                                      <td><?php echo $data->ma; ?></td>

    

                                </tr>

                                <?php

                                }?>

                          </tbody>

                     </table>

                  </table>

            </div>

        </div>

    </div>

</div>











    







            

     

     



