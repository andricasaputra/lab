
<!--Lihat Tabel Main Data--> 


<div>

    <ol class="page-header breadcrumb breadcrumb-fixed">

      <div id="top">

          <a id="view_data" data-toggle="modal" data-target="#view">

          <button class="btn btn-kuprimary"><i class="fa fa-eye fa-fw"></i>Lihat</button></a>



          <div class="btn-group " align="left">

            <button type="button" class="btn btn-kuprimary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-th-list fa-fw"></i> Menu <i class="fa fa-caret-down fa-fw"></i></button>

              <div class="dropdown-menu" style="font-size: 11pt; width: 200px;">

                    <a href="./lab_bakteri/report/export/export_excel_permintaan_kesiapan_pengujian.php" target="_blank"><font color="#2e2e1f"><i class="fa fa-download fa-fw"></i> Export Excel Semua Data</font></a>

                  <li class="divider"></li>

                    <a href="" data-toggle="modal" data-target="#export"><font color="#2e2e1f"><i class="fa fa-cloud-download fa-fw"></i> Export Excel Per Periode</font><a>

                  <li class="divider"></li>

                    <a href="" id="tombol_input_multi_permintaan_kesiapan_pengujian"><font color="#2e2e1f"><i class="fa fa-eyedropper" fa-fw></i> Multiple Input</font></a>

                  <li class="divider"></li>

                    <a href="" data-toggle="modal" data-target="#pertanggal"><font color="#2e2e1f"><i class="fa fa-print fa-fw"></i> Multiple Print</font></a>

                  <li class="divider"></li>

                    <a href="?lab=parasit&page=permintaan_kesiapan_pengujian"><font color="#2e2e1f"><i class="fa fa-arrow-circle-left fa-fw"></i> Ke Lab Parasit</font></a>

              </div>

          </div> 



      </div> 

      <div class="judul">

          <i class="fa fa-info-circle fa-fw fa-lg" aria-hidden="true"></i><b><h4>Data Permintaan Kesiapan Pengujian <i>(Laboratorium Bakteriologi)</i></h4></b>

      </div>

    </ol>

</div>

<div class="row" id="sortir">
    <div class="input-daterange form-inline">
        <div class="col-md-2"></div>
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
    </div>
    <div class="col-md-2"  style="z-index: 1">
        <div class="input-group">
            <select name="choice" id="choice" class="form-control input-sm">
              <option value="all">Semua Data</option>
              <option value="today">Permohonan Hari Ini</option>
              <option value="todaycert">Sertifikasi Hari Ini</option>
              <option value="not_yet">Permohonan Belum Tersertifikasi</option>
              <option value="done">Permohonan Sudah Tersertifikasi</option>
            </select>
        </div>
    </div>
    <div class="col-md-1" id="clear" style="margin-top: -6px; margin-left: -20px; z-index: 1">
        <button name="search" id="search_permintaan_kesiapan_kh" class="btn btn-kuprimary"><i class="fa fa-sort"></i> Sortir</button>
    </div>
</div>


<div class="row" id="tb">

  <div class="col-lg-12">

    <div class="table-responsive">


      <table class="table table-hover table-striped" id="tb_permintaan_kesiapan_kh" width="100%"  style="text-align: center">

          <thead>

            <tr>

                <th width= "5%">No</th>

                <th width= "13%">Tanggal Permohonan</th>

                <th width= "13%">Tanggal Diterima</th>

                <th width= "20%">Nomor Permohonan</th>

                <th width= "12%">Kode Sampel</th>

                <th width= "12%">Nama Sampel</th>                 

                <th width= "25%">Action</th>

            </tr>

          </thead>

        </table>

      </div>

    </div>  

  </div>

</div>


<!-- Input Data -->

        <div class="modal fade" id="modal_input_permintaan_kesiapan_kh" role="dialog">
            <div class="modal-dialog">
                <div id="content-data_input_permintaan_kesiapan_kh"></div>
            </div>
        </div>

<!-- Input Data Multiple-->

        <div class="modal fade" id="modal_input_multi_permintaan_kesiapan_pengujian_kh" role="dialog">
            <div class="modal-dialog">
                <div id="content-data_input_multi_permintaan_kesiapan_pengujian_kh"></div>
            </div>
        </div>

<!-- Edit Data -->

        <div class="modal fade" id="modal_edit_permintaan_kesiapan_kh" role="dialog">
            <div class="modal-dialog">
                <div id="content-data_edit_permintaan_kesiapan_kh"></div>
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

                <form action="./lab_bakteri/report/print/print_permin_pengujian_multi.php" method="post" target="_blank">

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

                <form action="./lab_bakteri/report/export/export_excel_permintaan_kesiapan_pengujian_bulan.php" method="post" target="_blank">

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




<div id="view" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">

  <div class="modal-dialog1">

     <div class="modal-body">

        <div class="row" >   

        <a class="btn btn-info btn-kembali" data-dismiss="modal"><i class="fa fa-arrow-circle-left fa-fw" aria-hidden="true"></i>Kembali</a>

                    <table class="table1 table-hover" id="dataperminkesiapan_kh" cellspacing="0" width="100%">

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

                  </table>

            </div>

        </div>

    </div>

</div>











    







            

     

     



