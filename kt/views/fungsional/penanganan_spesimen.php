<?php

require_once('models/nomor_sampel.php');
require_once('models/tgl_indo.php');


?>

<!--Lihat Tabel Main Data--> 


<div>

    <ol class="page-header breadcrumb breadcrumb-fixed">

        <div id="top">
  
            <a href="./report/fungsional/export_excel_penanganan_spesimen.php" class="btn btn-kuprimary" target="_blank"><font color="#fff"><i class="fa fa-download fa-fw"></i> Export Excel Penanganan Spesimen</font></a>

             <a href="?page=fungsional" class="btn btn-kuprimary"><font color="#fff"><i class="fa fa-file fa-fw"></i> Kembali</font></a>

        </div> 

            <i class="fa fa-info-circle fa-fw fa-lg" aria-hidden="true"></i>

        <div class="judul">

            <b><h4>Halaman Penanganan Spesimen</h4></b>

        </div>

    </ol>

</div>

<div class="row" id="sortir">
    <div class="input-daterange form-inline">
        <div class="col-md-3"></div>
        <div class="col-md-2" style="z-index: 1">
             <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                <input type="text" name="start_date" id="start_date" class="form-control input-sm" placeholder="Pilih Tanggal Awal" />
              </div>
        </div>
        <div class="col-md-2"  style="z-index: 1">
            <div class="input-group">
                <input type="text" name="end_date" id="end_date" class="form-control input-sm" placeholder="Pilih Tanggal Akhir"/>
                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
            </div>
        </div>     
        <div class="col-md-2"  style="z-index: 1">
            <div class="input-group">
                <select name="choice" id="choice" class="form-control input-sm">
                    <option value="all">Semua</option>
                    <option value="benih">Penyemaian Benih</option>
                </select>
            </div>
        </div>  
    </div>
    <div class="col-md-1" id="clear" style="margin-top: -6px; z-index: 1">
        <button name="search" id="search_fungsional_penanganan_spesimen" class="btn btn-kuprimary"><i class="fa fa-sort"></i> Sortir</button>
    </div>
    <div class="col-md-1"></div>
</div>


 <div class="row" id="tb">

  <div class="col-lg-12">

    <div class="table-responsive">


      <table class="table table-hover table-striped" id="tb_fungsional_penanganan_spesimen" width="100%"  style="text-align: center">

        <thead>

            <tr>

                <th width= "5%">No</th>

                <th width= "13%">Tanggal Penugasan</th>

                <th width= "12%">Kode Sampel</th>

                <th width= "10%">Jumlah Sampel</th>

                <th width= "9%">Nomor Sampel</th>

                <th width= "14%">Nama Sampel</th>

                <th width= "19%">Target Pengujian</th>

                <th width= "18%">Action</th>

            </tr>

          </thead>

      </table>

    </div>  

  </div>

</div>


<!-- Input Data -->

        <div class="modal fade" id="modal_input_pengelola_sampel" role="dialog">
            <div class="modal-dialog">
                <div id="content-data_input_pengelola_sampel"></div>
            </div>
        </div>

<!-- Edit Data -->

        <div class="modal fade" id="modal_edit_pengelola_sampel" role="dialog">
            <div class="modal-dialog">
                <div id="content-data_edit_pengelola_sampel"></div>
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

                <form action="./report/print/print_distribusi_sampel_multi.php" method="post" target="_blank">

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

                <form action="./report/export/export_excel_pengelola_sampel_bulan.php" method="post" target="_blank">

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



<!-- Draft List -->



<div id="draft" class="modal fade" role="dialog">

  <div class="modal-dialog" style="width: 30%">

    <div class="modal-content">

      <div class="modal-header">

        <button type="button" class="close" data-dismiss="modal">&times;</button>

        <h4>Pilih Tanggal</h4>

      </div>

        <div class="modal-body" id="modal-print">

          <div id="responsive-form" class="clearfix">

                <form action="./report/print/print_draft_list_pengujian.php" method="post" target="_blank">

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

                      <input type="submit" name="print_draft" class="btn btn-success" value="Print">

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

              
<!-- Draft List -->



<div id="fungsional1" class="modal fade" role="dialog">

  <div class="modal-dialog" style="width: 30%">

    <div class="modal-content">

      <div class="modal-header">

        <button type="button" class="close" data-dismiss="modal">&times;</button>

        <h4>Pilih Tanggal</h4>

      </div>

        <div class="modal-body" id="modal-print">

          <div id="responsive-form" class="clearfix">

                <form action="./report/fungsional/menyiapkan_tempat_alat_lab.php" method="post" target="_blank">

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

                      <input type="submit" name="print_laporan" class="btn btn-success" value="Print">

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

<div id="view" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">

<div class="modal-dialog1">

   <div class="modal-body">

      <div class="row" id="Showdatadistirbusi">   

      <a class="btn btn-info btn-kembali" data-dismiss="modal" style="margin-left:15px"><i class="fa fa-arrow-circle-left fa-fw" aria-hidden="true"></i>Kembali</a>

      <table class="table1 table-hover" id="datapengelola" cellspacing="0" width="100%">

          <thead class="mdb-color lighten-4">

            <tr class="lihat-head2">

                  <th>No</th>

                  <th>Kode Sampel</th>

                  <th>Nomor Sampel</th>

                  <th>Tanggal Penunjukan</th>

                  <th>Nama Sampel</th>

                  <th>Nama Ilmiah</th>

                  <th>Jenis Sampel/HS Code</th>

                  <th>Jumlah Sampel</th>

                  <th>Target Pengujian</th>

                  <th>Yang Menyerahkan</th>

                  <th>Yang Menerima</th>



            </tr>

          </thead>

        </table>


               </div>

            </div>

       </div>

   </div>








    







            

     

     



