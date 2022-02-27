<!--Tampil Main Tabel-->

<div id="loading">
    
    <ol class="page-header breadcrumb breadcrumb-fixed">
        
        <div id="top">
            
            <button type="button" class="btn btn-kuprimary" id="tombol_input_permohonan" data-toggle="modal" data-target="#modal_input_permohonan"><i class="fa fa-plus-circle fa-fw"></i>Data Baru</button>
            
            <a id="view_data_permohonan" data-toggle="modal" data-target="#view">
                
            <button class="btn btn-kuprimary"><i class="fa fa-eye fa-fw"></i>Lihat</button></a>
            
            <div class="btn-group " align="left">
                
                <button type="button" class="btn btn-kuprimary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-th-list fa-fw"></i> Menu <i class="fa fa-caret-down fa-fw"></i></button>
                
                <div class="dropdown-menu" style="font-size: 11pt; width: 200px;">
                    
                    <a href="./report/export/export_excel_permohonan.php" target="_blank"><font color="#2e2e1f"><i class="fa fa-download fa-fw"></i> Export Excel Semua Data</font></a>
                    
                    <li class="divider"></li>
                    
                    <a href="" data-toggle="modal" data-target="#export"><font color="#2e2e1f"><i class="fa fa-cloud-download fa-fw"></i> Export Excel Per Periode</font><a>
                        
                        <li class="divider"></li>
                        
                        <a href="" data-toggle="modal" data-target="#pertanggal"><font color="#2e2e1f"><i class="fa fa-print fa-fw"></i> Multiple Print</font></a>
                        
                    </div>
                    
                </div>
                
                <div class="judul">
                    
                    <i class="fa fa-info-circle fa-fw fa-lg"></i><b><h4><span class="isi">Data Permohonan Pengujian Laboratorium <b>Karantina Tumbuhan</span></b></h4></b>
                    
                </div>
                
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
        <div class="col-md-1" id="clear" style="margin-top: -6px; z-index: 1">
            <button name="search" id="search_permohonan" class="btn btn-kuprimary"><i class="fa fa-sort"></i> Sortir</button>
        </div>
        <div class="col-md-2"></div>
    </div>
    
    
    <table class="table table-hover table-striped" id="tb_permohonan" width="100%"  style="text-align: center">
        
        <thead>
            
            <tr>
                
                <th width= "5%">No</th>
                
                <th width= "13%">Tanggal Permohonan</th>
                
                <th width= "13%">Nomor Permohonan</th>
                
                <th width= "12%">Nama Sampel</th>
                
                <th width= "12%">Jumlah Sampel</th>
                
                <th width= "20%">Target OPT/OPTK</th>
                
                <th width= "25%">Action</th>
                
            </tr>
            
        </thead>
        
    </table>
    
    <!--Input Data-->
    
    <div id="content-data_input_permohonan"></div>
    
    <!-- Edit Data -->
    
    <div class="modal fade" id="modal_permohonan" role="dialog">
        <div class="modal-dialog">
            <div id="content-data_permohonan"></div>
        </div>
    </div>
    
    <!--Lihat Semua Data-->
    
    <div id="view" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        
        <div class="modal-dialog1">
            
            <div class="modal-body">
                
                <div class="row" id="Showdatapermohonan">
                    
                    <a class="btn btn-info btn-kembali" data-dismiss="modal" style="margin-left:15px"><i class="fa fa-arrow-circle-left fa-fw" aria-hidden="true"></i>Kembali</a>
                    
                    <table class="table-responsive table1 table-hover display" id="datapermohonan" cellspacing="0" width="100%">
                        
                        <thead>
                            
                            <tr align="center" class="lihat-head">
                                
                                <th>No</th>
                                
                                <th>Nomor Permohonan</th>
                                
                                <th>Tanggal Permohonan</th>
                                
                                <th>Nama Sampel</th>
                                
                                <th>Nama Ilmiah</th>
                                
                                <th>Jumlah Sampel</th>
                                
                                <th>Bagian Tumbuhan</th>
                                
                                <th>Media</th>
                                
                                <th>Vektor</th>
                                
                                <th>Daerah Asal</th>
                                
                                <th>Nama Patogen</th>
                                
                                <th>Target OPT/OPTK</th>
                                
                                <th>Metode Pengujian</th>
                                
                                <th>Nama Pemilik</th>
                                
                                <th>Alamat Pemilik</th>
                                
                                <th>Dokumen Pendukung</th>
                                
                                <th>Pemohon</th>
                                
                            </tr>
                            
                        </thead>
                        
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
                        
                        <form action="./report/print/print_data_permohonan_multi.php" method="post" target="_blank">
                            
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
                        
                        <form action="./report/export/export_excel_permohonan_bulan.php" method="post" target="_blank">
                            
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
    
    
    
    <?php
    
    if(@$_GET['act']=='del') {
    
    $objectData->hapus($_GET['id']);
    
    $objectHasil->hapus($_GET['id']);
    
    header("location: ?page=data_permohonan");
    
    }
    
    ?>