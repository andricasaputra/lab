<?php

if(@$_GET['act']==''){

    if (isset($_POST['tampilkan'])) {
        $jmldata = $connection->conn->real_escape_string($_POST['jml']);
    }else{
        $jmldata = 250;
    }

?>


<!--Tampil Main Tabel-->


<div>

    <ol class="page-header breadcrumb breadcrumb-fixed">

        <div id="top">

            <?php

                $hasil = $objectData->button();

                while($i = $hasil->fetch_object()):

                    $id = $i->maxkode;

                    $kode = $i->kode_sampel;    

                endwhile;

                if($id == 0){ ?>

                    <button type="button" class="btn btn-kuprimary" data-toggle="modal" data-target="#input"><i class="fa fa-plus-circle fa-fw"></i>Data Baru</button>

                <?php

                }elseif(strlen($kode) == 0){ ?>

                    <button type="button" class="btn btn-danger btn-not-allowed"><i class="fa fa-plus-circle fa-fw"></i>Data Baru</button>

                <?php }else{ 

                ?>

                    <button type="button" class="btn btn-kuprimary" data-toggle="modal" data-target="#input"><i class="fa fa-plus-circle fa-fw"></i>Data Baru</button>

            <?php   

            }

            ?>



            <a id="view_data_permohonan" data-toggle="modal" data-target="#view">

            <button class="btn btn-kuprimary"><i class="fa fa-eye fa-fw"></i>Lihat</button></a>



            <div class="btn-group " align="left">

              <button type="button" class="btn btn-kuprimary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-th-list fa-fw"></i> Menu <i class="fa fa-caret-down fa-fw"></i></button>

                  <div class="dropdown-menu" style="font-size: 11pt; width: 200px;">

                    <a href="./report/export/export_excel_permohonan.php" target="_blank"><font color="#2e2e1f"><i class="fa fa-download fa-fw"></i> Export Excel Semua Data</font></a>

                    <li class="divider"></li>

                    <a href="" data-toggle="modal" data-target="#export"><font color="#2e2e1f"><i class="fa fa-cloud-download fa-fw"></i> Export Excel Per Periode</font><a>

                    <li class="divider"></li>

                    <a href="" data-toggle="modal" data-target="#pertanggal"><font color="#2e2e1f"><i class="fa fa-print fa-fw"></i> Print Per Periode</font></a>

                    <li class="divider"></li>

                    <a href="" data-toggle="modal" data-target="#jumlahdata"><font color="#2e2e1f"><i class="fa fa-gear fa-fw"></i> Tampilakan Data</font></a>

                  </div>

            </div>



            <div class="judul">

                <i class="fa fa-info-circle fa-fw fa-lg"></i><b><h4><span class="isi">Data Permohonan Pengujian Laboratorium <b>Karantina Tumbuhan</span></b></h4></b>

            </div> 

        </div>



    </ol>

</div>

        <table class="table table-hover table-striped" id="example"  style="text-align: center">

                    <thead>

                    <tr>

                        <th width= "5%">No</th>

                        <th width= "12%">Tanggal Permohonan</th>

                        <th width= "11%">Nomor Permohonan</th>

                        <th width= "12%">Nama Sampel</th>

                        <th width= "15%">Jumlah Sampel</th>

                        <th width= "22%">Target OPT/OPTK</th>

                        <th width= "20%">Action</th>

                        </tr>

                    </thead>

                </table>

        <!-- Edit Data -->

        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">
                <div id="content-data"></div>
            </div>
        </div>

        <!--Input Data--> 

   

<div id="input" class="modal fade" role="dialog">

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal">&times;</button>

                <h4 class="modal-title"><i class="fa fa-gear fa-fw"></i>Tambah Data Permohonan Pengujian</h4>

            </div>



        <div class="modal-body">

            <div id="responsive-form" class="clearfix" autocomplete="on">

                <form action="" method="post">



                    <?php 

                        $tgl_indo = tgl_indo(date('Y-m-d'));

                        $bln=date('m');

                        $thn=date('Y');



                        // nomor permohonan

                        $no = $objectNomor->no_permohonan();

                        $no_sampel = $no->fetch_assoc();

                        $sampel = $no_sampel['no_permohonan'];

                        $nourut= 0;

                        $urut = $nourut + substr($sampel, 0, 5);



                        $tambah = (int) $urut +1 ;



                        $format = $tambah;

                    ?>



                    <div class="column-half">

                        <label class="control-label" for="no_permohonan">Nomor Permohonan</label>

                        <input type="text" name="no_permohonan" class="form-control" id="no_permohonan" value=" <?= $format?>/PL.KT.M5/<?=$bln?>/<?=$thn?>" required>

                    </div>

            

                    <div class="column-half">

                        <label class="control-label" for="tanggal_permohonan">Tanggal</label>

                        <input type="text" name="tanggal_permohonan" class="form-control" id="tanggal_permohonan" value="<?= $tgl_indo?>" required>

                        <input type="hidden" name="tanggal_acu_permohonan" id="tanggal_acu_permohonan"  value="<?php echo date('Y-m-d')?>">

                    </div>

                

                

                    <div class="column-half">

                        <label class="control-label" for="nama_sampel">Nama Sampel</label>

                        <select class="form-control" name="nama_sampel" id="nama_sampel" required>

                                <option></option>

                                <?php 

                                    

                                    $i = $objectData->tampil_tumbuhan();

                                    while ($t=$i->fetch_object()) : ?>

                                    <option><?= $t->nama_tumbuhan; ?></option>

                                <?php endwhile;?>

                        </select>

                        

                    </div>

                            

            

                    <div class="column-half">

                        <label class="control-label" for="nama_ilmiah">Nama Ilmiah</label>

                    <em><select class="form-control" name="nama_ilmiah" id="nama_ilmiah">

                                <option></option>

                                <?php 

                                    $i = $objectData->tampil_ilmiah_tumbuhan();

                                    while ($t=$i->fetch_object()) : ?>?>

                                    <option><?=$t->nama_ilmiah_tumbuhan?></option>

                                <?php endwhile;?>

                        </select></em>

                    </div>                  

            

                    <div class="column-seperempat">

                        <label class="control-label" for="jumlah_sampel">Jumlah Sampel</label>

                        <input type="text" name="jumlah_sampel" class="form-control" id="jumlah_sampel" value="1" required=>

                    </div>



                    <div class="column-seperempat">

                        <label class="control-label" for="satuan">Satuan</label>

                        <select class="form-control" name="satuan" id="satuan" required>

                              <option>Kantong Sampel</option>

                              <option>Spesimen</option>

                              <option>Batang</option>

                              <option>Lembar</option>

                              <option>Buah</option>

                        </select>

                    </div>              

                

                    <div class="column-half">

                        <label class="control-label" for="bagian_tumbuhan">Bagian Tumbuhan</label>

                        <select class="form-control" name="bagian_tumbuhan" id="bagian_tumbuhan">

                                  <option></option>

                                  <option>Akar</option>

                                  <option>Batang</option>

                                  <option>Biji/Benih</option>

                                  <option>Buah</option>

                                  <option>Daun</option>

                                  <option>Umbi</option>

                                  <option>Preparat</option> 

                                  <option>Seluruh Bagian Tanaman</option>

                                  <option>Bagian Lain</option>

                                  

                        </select>

                    </div>              

            

                    <div class="column-half">

                        <label class="control-label" for="media">Media</label>

                        <input type="text" name="media" class="form-control" id="media" value="">

                    </div>              

            

                    <div class="column-half">

                        <label class="control-label" for="vektor">Vektor/Inang/Spesimen</label>

                        <select class="form-control" name="vektor" id="vektor">

                                  <option></option>

                                  <option>Lalat Buah</option>

                                  <option>Myte/Tungau</option>

                                  <option>Nematoda</option>

                                  <option>Preparat</option>

                                  <option>Serangga</option>            

                        </select>

                    </div>              

        

                    <div class="column-seperempat">

                        <label class="control-label" for="nama_patogen">Target OPTK </label>

                        <select class=" form-control "  name="nama_patogen" id="nama_patogen" required>

                                  <option ></option>

                                  <option>Bakteri</option>

                                  <option>Cendawan</option>

                                  <option>Fitoplasma</option>

                                  <option>Gulma</option>

                                  <option>Lalat Buah</option>

                                  <option>Myte/Tungau</option>

                                  <option>Nematoda</option>

                                  <option>Serangga</option>

                                  <option>Viroid</option>

                                  <option>Virus</option>                                                      

                        </select><br>

                        <select class=" form-control "  name="nama_patogen2" id="nama_patogen2">

                                  <option ></option>

                                  <option>Bakteri</option>

                                  <option>Cendawan</option>

                                  <option>Fitoplasma</option>

                                  <option>Gulma</option>

                                  <option>Lalat Buah</option>

                                  <option>Myte/Tungau</option>

                                  <option>Nematoda</option>

                                  <option>Serangga</option>

                                  <option>Viroid</option>

                                  <option>Virus</option>

                        </select><br>

                        <select class=" form-control "  name="nama_patogen3" id="nama_patogen3">

                                  <option ></option>

                                  <option>Bakteri</option>

                                  <option>Cendawan</option>

                                  <option>Fitoplasma</option>

                                  <option>Gulma</option>

                                  <option>Lalat Buah</option>

                                  <option>Myte/Tungau</option>

                                  <option>Nematoda</option>

                                  <option>Serangga</option>

                                  <option>Viroid</option>

                                  <option>Virus</option>

                        </select>

                    </div>



                    <div class="column-seperempat">

                        <label class="control-label" for="target_optk">Nama Latin</label>

                        <em><select class=" form-control"  name="target_optk" id="target_optk" required>

                                <option></option>

                                    <?php 

                                        $i = $objectData->tampil_patogen();

                                        while ($t=$i->fetch_object()) : ?>          

                                        <option><?=$t->nama_latin_penyakit ;?></option>

                                    <?php endwhile;?>

                            </select></em><br>



                            <em><select class=" form-control"  name="target_optk2" id="target_optk2" >

                                <option></option>

                                    <?php 

                                        $i = $objectData->tampil_patogen();

                                        while ($t=$i->fetch_object()) : ?>

                                        <option><?=$t->nama_latin_penyakit ;?></option>

                                    <?php endwhile;?>

                        </select></em><br>



                                    

                            <em><select class=" form-control"  name="target_optk3" id="target_optk3" >

                                <option></option>

                                    <?php 

                                        $i = $objectData->tampil_patogen();

                                        while ($t=$i->fetch_object()) : ?>

                                        <option><?=$t->nama_latin_penyakit ;?></option>

                                    <?php endwhile;?>

                                    

                        </select></em>

                    </div>



                    <div class="column-half">

                        <label class="control-label" for="metode_pengujian">Metode Pengujian </label>

                        <select class="form-control" name="metode_pengujian" id="metode_pengujian" required>

                                  <option></option>

                                  <option>Blotter Test</option>

                                  <option>Identifikasi Morfologi</option>

                                  <option>Uji Gram KOH</option>

                                  <option>Ekstrak / Corong Baerman</option>

                        </select><br>

                            <select class="form-control" name="metode_pengujian2" id="metode_pengujian2">

                                  <option></option>

                                  <option>Blotter Test</option>

                                  <option>Identifikasi Morfologi</option>

                                  <option>Uji Gram KOH</option>

                                  <option>Ekstrak / Corong Baerman</option>

                        </select><br>

                        <select class="form-control" name="metode_pengujian3" id="metode_pengujian3">

                                  <option></option>

                                  <option>Blotter Test</option>

                                  <option>Identifikasi Morfologi</option>

                                  <option>Uji Gram KOH</option>

                                  <option>Ekstrak / Corong Baerman</option>

                        </select>

                    </div>

                

                    <div class="column-half">

                        <label class="control-label" for="daerah_asal">Negara/ Daerah Asal</label>

                        <input type="text" name="daerah_asal" class="form-control" id="daerah_asal" value="Sumbawa Besar" required>

                    </div>              



                    <div class="column-half">

                        <label class="control-label" for="nama_pemilik">Nama Pemilik</label>

                        <input type="text" name="nama_pemilik" class="form-control" id="nama_pemilik" value="drh. Priono" required>

                    </div>              

                

                    <div class="column-half">

                        <label class="control-label" for="alamat_pemilik">Alamat Pemilik</label>

                        <input type="text" name="alamat_pemilik" class="form-control" id="alamat_pemilik" value="Jln. Pelabuhan Badas No.1 Sumbawa" required>

                    </div>  

    

                    <div class="column-half">

                        <label class="control-label" for="dokumen_pendukung">Dokumen Pendukung</label>

                        <input type="text" name="dokumen_pendukung" class="form-control" id="dokumen_pendukung" value="-">

                    </div>

                        

        

                    <div class="column-half">

                        <label class="control-label" for="pemohon">Pemohon</label>

                        <select class="form-control" name="pemohon" id="pemohon" required>

                                <option></option>

                                    <?php 

                                        $i = $objectData->tampil_pejabat();

                                        while ($t=$i->fetch_object()) : ?>

                                        <option><?=$t->nama_pejabat ;?></option>

                                    <?php endwhile;?>

                        </select>

                    </div>



                    <div class="column-half">

                        <label class="control-label" for="nip">NIP</label>

                        <select class="form-control" name="nip" id="nip">

                            <option>-</option>

                            <optgroup label="Abdul Salam, SP "> 

                            <option>19690905 199903 1 001</option>

                            </optgroup>

                            <optgroup label="I Ketut Sindia "> 

                            <option>19740929 200112 1 002</option>

                            </optgroup>

                            <optgroup label="drh. Priono " selected> 

                            <option selected="selected">19811024 201101 1 008</option>

                            </optgroup>

                            <optgroup label="Andik Akrimil Fata "> 

                            <option>19820710 200901 1 007</option>

                            </optgroup>

                            <optgroup label="drh. Ardyanto Chandra Wijaya"> 

                            <option>19870724 201403 1 002</option>

                            </optgroup>

                            <optgroup label="Drs. Nur Rochim "> 

                            <option>19620916 198303 1 001</option>

                            </optgroup>

                            <optgroup label="Nyak Ben, SH "> 

                            <option>19600505 198303 1 004</option>

                            </optgroup>

                            <optgroup label="Hariyono, A.Md "> 

                            <option>19731231 200501 1 001</option>

                        </select>

                    </div>

                </div>

                            

                <div class="modal-footer" id="modal-footer">

                    <div class="column-full button-bawah">

                        <?php

                            if(isset($_SESSION['loginsuperkt'])){ 

                        ?>

                    <button type="reset" class="btn-default2 btn-danger " onclick="return confirm('Yakin Ingin Reset Data?')"><i class="fa fa-exclamation-circle fa-fw" aria-hidden="true"></i>&nbsp;Reset</button>

                    <?php } ?> &nbsp;&nbsp;

                    <button type="submit" class="btn-default2 success" name="input" value="input"><i class="fa fa-check-circle fa-fw" aria-hidden="true"></i>&nbsp;Simpan</button> 

                    </div>  

                </div>

            </form>

        </div> <!--end responsive-form-->

        

<?php       


if(@$_POST['input']) {

                    

$no_permohonan              =htmlspecialchars($connection->conn->real_escape_string(trim($_POST['no_permohonan'])));

$tanggal_permohonan         =htmlspecialchars($connection->conn->real_escape_string(trim($_POST['tanggal_permohonan'])));

$tanggal_acu_permohonan     =htmlspecialchars($connection->conn->real_escape_string(trim($_POST['tanggal_acu_permohonan'])));

$nama_sampel                =htmlspecialchars($connection->conn->real_escape_string(trim($_POST['nama_sampel'])));

$nama_ilmiah                =htmlspecialchars($connection->conn->real_escape_string(trim($_POST['nama_ilmiah'])));

$jumlah_sampel              =htmlspecialchars($connection->conn->real_escape_string(trim($_POST['jumlah_sampel'])));

$satuan                     =htmlspecialchars($connection->conn->real_escape_string(trim($_POST['satuan'])));

$bagian_tumbuhan            =htmlspecialchars($connection->conn->real_escape_string(trim($_POST['bagian_tumbuhan'])));

$media                      =htmlspecialchars($connection->conn->real_escape_string(trim($_POST['media'])));

$vektor                     =htmlspecialchars($connection->conn->real_escape_string(trim($_POST['vektor'])));

$daerah_asal                =htmlspecialchars($connection->conn->real_escape_string(trim($_POST['daerah_asal'])));

$nama_patogen               =htmlspecialchars($connection->conn->real_escape_string(trim($_POST['nama_patogen'])));

$nama_patogen2              =htmlspecialchars($connection->conn->real_escape_string(trim($_POST['nama_patogen2'])));

$nama_patogen3              =htmlspecialchars($connection->conn->real_escape_string(trim($_POST['nama_patogen3'])));

$target_optk                =htmlspecialchars($connection->conn->real_escape_string(trim($_POST['target_optk'])));

$target_optk2               =htmlspecialchars($connection->conn->real_escape_string(trim($_POST['target_optk2'])));

$target_optk3               =htmlspecialchars($connection->conn->real_escape_string(trim($_POST['target_optk3'])));

$metode_pengujian           =htmlspecialchars($connection->conn->real_escape_string(trim($_POST['metode_pengujian'])));

$metode_pengujian2          =htmlspecialchars($connection->conn->real_escape_string(trim($_POST['metode_pengujian2'])));

$metode_pengujian3          =htmlspecialchars($connection->conn->real_escape_string(trim($_POST['metode_pengujian3'])));

$nama_pemilik               =htmlspecialchars($connection->conn->real_escape_string(trim($_POST['nama_pemilik'])));

$alamat_pemilik             =htmlspecialchars($connection->conn->real_escape_string(trim($_POST['alamat_pemilik'])));

$dokumen_pendukung          =htmlspecialchars($connection->conn->real_escape_string(trim($_POST['dokumen_pendukung'])));

$pemohon                    =htmlspecialchars($connection->conn->real_escape_string(trim($_POST['pemohon'])));

$nip                        =htmlspecialchars($connection->conn->real_escape_string(trim($_POST['nip'])));

                                    

    if(empty($bagian_tumbuhan) && empty($media) && empty($vektor)){

        
        echo "<script>window.alert('Bagian Tumbuhan/Media/Vektor Tidak Boleh Kosong, Pilih salah Satu');
        </script>";


    }else{

        $objectData->input($no_permohonan, $tanggal_permohonan, $tanggal_acu_permohonan ,$nama_sampel, $nama_ilmiah, $jumlah_sampel, $satuan, $bagian_tumbuhan, $media, $vektor, $daerah_asal, $nama_patogen, $nama_patogen2, $nama_patogen3 ,$target_optk, $target_optk2, $target_optk3, $metode_pengujian, $metode_pengujian2, $metode_pengujian3, $nama_pemilik, $alamat_pemilik, $dokumen_pendukung, $pemohon, $nip);   

    }

}



?>

                

        </div>

    </div>

</div> 



 <!--Lihat Semua Data--> 

    

<div id="view" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">

    <div class="modal-dialog1">

        <div class="modal-body">

            <div class="row" id="Showdatapermohonan">    

                <a class="btn btn-info btn-kembali" data-dismiss="modal" style="margin-left:15px"><i class="fa fa-arrow-circle-left fa-fw" aria-hidden="true"></i>Kembali</a>

                <table class="table1 table-hover display" id="datapermohonan" cellspacing="0" width="100%">

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

<!-- Tampilan Jumlah Data -->



<div id="jumlahdata" class="modal fade" role="dialog">

    <div class="modal-dialog" style="width: 30%">

        <div class="modal-content">

            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal">&times;</button>

                <h5>Pilih Berapa Data yang Ingin Anda Tampilkan</h5>

            </div>

                <div class="modal-body" id="modal-print">

                    <div id="responsive-form" class="clearfix">

                        <form action="" method="post" target="_blank">

                            <table>

                                <tr>

                                    <td width="40%">

                                        <div class="form-group" align="left">Jumlah Data</div>

                                    </td>

                                    <td width="10%">

                                        <div class="form-group" align="center">:</div>

                                    </td>

                                    <td>

                                        <div class="form-group">

                                            <input type="text" name="jml" class="form-control" required>

                                        </div>

                                    </td>

                                </tr>

                            </table>

                        

                        <div class="modal-footer" >

                            <table>

                                    <tr>                                            

                                        <td>

                                            <input type="submit" name="tampilkan" class="btn btn-success" value="Submit">

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



}elseif(@$_GET['act']=='del') {

    $objectData->hapus($_GET['id']);

    $objectNomor->hapus($_GET['id']);   

    $objectHasil->hapus($_GET['id']);

    header("location: ?page=data_permohonan");

}


