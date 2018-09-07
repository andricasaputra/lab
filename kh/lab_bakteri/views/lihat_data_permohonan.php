
<div>

  <ol class="page-header breadcrumb breadcrumb-fixed">

    <div id="top">

      <a href="?page=dashboard" class="btn btn-kuprimary"><i class="fa fa-arrow-left fa-fw"></i>Kembali</a>

      <div class="judul">

        <i class="fa fa-info-circle fa-fw fa-lg"></i><b><h4><span class="isi">Data Permohonan Pengujian Laboratorium Bakteriologi <b>Karantina Hewan</span></b></h4></b>

      </div> 

    </div>

  </ol>

</div>


<div class="row">

    <div class="col-md-12">

        <div class="table-responsive">

         <table class="table table-hover table-striped" id="tb_lihat_data_permohonan_kh" width="100%"  style="text-align: center">

                <thead>

                      <tr>

                            <th width= "5%">No</th>

                            <th width= "15%">Tanggal Permohonan</th>

                            <?php if (!isset($_SESSION['loginlabkh'])) { ?> 

                            <th width= "15%">Nomor Permohonan</th>

                            <?php }else{ ?>

                            <th width= "15%">Kode Sampel</th>

                            <?php } ?>

                            <th width= "15%">Nama Sampel</th>

                            <th width= "15%">Lama Pengujian</th>

                            <th width= "20%">Status</th>

                            <th width= "15%">Tanggal Selesai</th>

                      </tr>

                </thead>

          </table>

        </div>  

    </div>

</div>