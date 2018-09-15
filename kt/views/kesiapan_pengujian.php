<!--Lihat Tabel Main Data-->

<div>
  
  <ol class="page-header breadcrumb breadcrumb-fixed">
    
    <div id="top">
      
      <a id="view_data_kesiapan" data-toggle="modal" data-target="#view">
        
      <button class="btn btn-kuprimary"><i class="fa fa-eye fa-fw"></i>Lihat</button></a>
      
      
      
      <div class="btn-group " align="left">
        
        <button type="button" class="btn btn-kuprimary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-th-list fa-fw"></i> Menu <i class="fa fa-caret-down fa-fw"></i></button>
        
        <div class="dropdown-menu" style="font-size: 11pt; width: 200px;">
          
          <a href="./report/export/export_excel_kesiapan_pengujian.php" target="_blank"><font color="#2e2e1f"><i class="fa fa-download fa-fw"></i> Export Excel Semua Data</font></a>
          
          <li class="divider"></li>
          
          <a href="" data-toggle="modal" data-target="#export"><font color="#2e2e1f"><i class="fa fa-cloud-download fa-fw"></i> Export Excel Per Periode</font><a>
            
            <li class="divider"></li>
            
            <a href="" id="tombol_input_multi_kesiapan_pengujian"><font color="#2e2e1f"><i class="fa fa-eyedropper" fa-fw></i> Multiple Input</font></a>
            
            <li class="divider"></li>
            
            <a href="" data-toggle="modal" data-target="#pertanggal"><font color="#2e2e1f"><i class="fa fa-print fa-fw"></i> Multiple Print</font></a>
            
          </div>
          
        </div>
        
        
        
      </div>
      
      
      
      <div class="judul">
        
        <i class="fa fa-info-circle fa-fw fa-lg" aria-hidden="true"></i>
        
        <b><h4>Kesiapan Pengujian</h4></b>
        
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
      <button name="search" id="search_kesiapan_pengujian" class="btn btn-kuprimary"><i class="fa fa-sort"></i> Sortir</button>
    </div>
    <div class="col-md-2"></div>
  </div>
  
  <div class="row" id="tb">
    
    <div class="col-lg-12">
      
      <div class="table-responsive">
        
        <table class="table table-hover table-striped" id="tb_kesiapan_pengujian" width="100%"  style="text-align: center">
          
          <thead>
            
            <tr>
              
              <th width= "5%">No</th>
              
              <th width= "13%">Tanggal</th>
              
              <th width= "13%">Kode Sampel</th>
              
              <th width= "13%">Nama Sampel</th>
              
              <th width= "13%">Kondisi Sampel</th>
              
              <th width= "21%">Target Pengujian</th>
              
              <th width= "22%">Action</th>
              
            </tr>
            
          </thead>
          
        </table>
        
      </div>
      
    </div>
    
  </div>
  
  
  
  <!-- Input Data -->
  
  <div class="modal fade" id="modal_input_kesiapan_pengujian" role="dialog">
    <div class="modal-dialog">
      <div id="content-data_input_kesiapan_pengujian"></div>
    </div>
  </div>
  
  <!-- Input Data Multiple-->
  
  <div class="modal fade" id="modal_input_multi_kesiapan_pengujian" role="dialog">
    <div class="modal-dialog">
      <div id="content-data_input_multi_kesiapan_pengujian"></div>
    </div>
  </div>
  
  <!-- Edit Data -->
  
  <div class="modal fade" id="modal_edit_kesiapan_pengujian" role="dialog">
    <div class="modal-dialog">
      <div id="content-data_edit_kesiapan_pengujian"></div>
    </div>
  </div>
  
  
  
  
  <div id="view" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    
    <div class="modal-dialog1">
      
      <div class="modal-body">
        
        <div class="row" id="Showdatakesiapan">
          
          <a class="btn btn-info btn-kembali" data-dismiss="modal" style="margin-left:15px"><i class="fa fa-arrow-circle-left fa-fw" aria-hidden="true"></i>Kembali</a>
          
          <table class="table1 table-hover" id="datakesiapan" cellspacing="0" width="100%">
            
            <thead class="mdb-color lighten-4">
              
              <tr class="lihat-head2">
                
                <th>No</th>
                
                <th>Kode Sampel</th>
                
                <th>Tanggal Permohonan</th>
                
                <th>Nama Sampel</th>
                
                <th>Nama Ilmiah</th>
                
                <th>Jenis Sampel/HS Code</th>
                
                <th>Jumlah Sampel</th>
                
                <th>Target Pengujian</th>
                
                <th>Kondisi Sampel</th>
                
                <th>Manajer Teknis</th>
                
                <th>NIP</th>
                
                
                
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
            
            <form action="./report/print/print_kesiapan_pengujian_multi.php" method="post" target="_blank">
              
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
            
            <form action="./report/export/export_excel_kesiapan_pengujian_bulan.php" method="post" target="_blank">
              
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
  
  
  
  
  
  
  
  
  
  
  <!--Edit data-->
  
  <div id="edit" class="modal fade" role="dialog">
    
    <div class="modal-dialog">
      
      <div class="modal-content">
        
        <div class="modal-header">
          
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
          <h4 class="modal-title"><i class="fa fa-gear fa-fw"></i>Data Kesiapan Pengujian</h4>
          
        </div>
        
        
        
        
        
        <div class="modal-body" id="modal-edit">
          
          <div id="responsive-form" class="clearfix">
            
            <form id="form_edit_kesiapan_pengujian">
              
              
              
              
              
              
              
              <div class="column-half">
                
                <label class="control-label" for="kode_sampel">Kode Sampel</label>
                
                <input type="text" name="kode_sampel" class="form-control" id="kode_sampel" disabled="disabled">
                
                <input type="hidden" name="id" id="id">
                
              </div>
              
              
              
              
              
              <div class="column-half">
                
                <label class="control-label" for="kondisi_sampel" >Kondisi Sampel</label>
                
                <select class="form-control" name="kondisi_sampel" id="kondisi_sampel" required>
                  
                  <option>Baik</option>
                  
                  <option>Busuk</option>
                  
                  <option>Rusak</option>
                  
                  <option>Lainnya</option>
                  
                </select>
                
              </div>
              
              
              
              
              
              <div class="column-half">
                
                <label class="control-label" for="mt">Manajer Teknis</label>
                
                <select class="form-control" name="mt" id="mt" required>
                  
                  <option></option>
                  
                  <?php
                  
                  $i = $objectData->tampil_pejabat();
                  
                  while ($t=$i->fetch_object()) : ?>
                  
                  <option><?=$t->nama_pejabat ;?></option>
                  
                  <?php endwhile;?>
                  
                </select>
                
              </div>
              
              
              
              <div class="column-half">
                
                <label class="control-label" for="nip_mt">NIP</label>
                
                <select class="form-control" name="nip_mt" id="nip_mt" required>
                  
                  <option>-</option>
                  
                  <optgroup label="Abdul Salam, SP ">
                    
                    <option>19690905 199903 1 001</option>
                    
                  </optgroup>
                  
                  <optgroup label="I Ketut Sindia ">
                    
                    <option>19740929 200112 1 002</option>
                    
                  </optgroup>
                  
                  <optgroup label="Fatma Dya Swari, SP ">
                    
                    <option>19801209 200912 2 004</option>
                    
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