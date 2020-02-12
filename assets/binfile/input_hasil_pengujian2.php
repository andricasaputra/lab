<?php

ob_start();

session_start();



require_once('../templates/header_hasil.php');



?>



<body>

             

<!--Edit data--> 

<?php

    $tgl = tgl_indo(date('Y-m-d'));



    if(@$_GET['id']&&$_GET['no_sampel'] !== ''){

        $tampil = $data->tampil4(@$_GET['id']);

        }else {

            if(@$_SESSION['loginadminkt']){

                echo "<script>alert('No Sampel Masih Kosong')

                window.location='../admin.php?page=sertifikat'</script>";

                exit;

              }elseif(@$_SESSION['loginsuperkt']){

                echo "<script>alert('No Sampel Masih Kosong')

                window.location='../super_admin.php?page=sertifikat'</script>";

                exit;

              }else{

                echo "<script>alert('No Sampel Masih Kosong')

                window.location='../pengujian.php?page=sertifikat'</script>";

                exit;

              }

            }

        while ($data=$tampil->fetch_object()):

?>



<div class="container">

   <div class="row">

      <div class="col-lg-12 wrap">

        <div class="wrap2" id="input2">



          <?php 

              if(@$_SESSION['loginadminkt']){

                $redirect = '../admin.php?page=sertifikat';

              }elseif(@$_SESSION['loginsuperkt']){

                 $redirect = '../super_admin.php?page=sertifikat';

              }else {

                $redirect = '../pengujian.php?page=sertifikat';

              }

          ?>



              <div class="alert alert-info">

                  <b>Hasil Pengujian</b><br> 

                  Kode Sampel :<b> <?php echo $data->kode_sampel ?></b><br>

                  Tanggal : <b><?php echo $data->tanggal_penyerahan ?></b><br> 

                  Nama Sampel : <b><?php echo $data->nama_sampel ?></b><br> 

                  Target Pengujian : <em><b><?php echo $data->target_optk ?>, <?php echo $data->target_optk2 ?> <?php echo $data->target_optk3 ?></b></em>

        </div>

          <form action="" method="post">

            <table id="datatables2">

                  <thead>

                    <tr>

                      <th width="20%">&nbsp;</th>

                      <th width="20%">Nomor Sampel</th>

                      <th width="30%">Positif/Negatif</th>

                      <th width="30%">Hasil Pengujian</th>

                    </tr>

                  </thead>

                  <tbody>     

                    <?php

                    $tgl_acu = date("Y-m-d");

                    $jum = $data->jumlah_sampel;

                    $j = $data->no_sampel;

                    $x = explode("-", $j);



                    if($jum != 1){

                        $k = $x[0];

                        $l = $x[1];

                        $r = range($k, $l);

                    }else{

                        $r = $x;

                    }



                    // $dataPerhalaman = 10;      

                    // $halaman = isset($_GET['halaman'])?intval($_GET['halaman']-1):0;

                    // $jumlahHalaman = intval(count($r)/$dataPerhalaman)+1;

                    // $nomorHalaman = $_REQUEST['halaman'];

                    // foreach (array_slice($r, $halaman*$dataPerhalaman,$dataPerhalaman) as $no) :

                    foreach ($r as $no):

                    ?>       

                    

                     <tr>

                      <td>

                      <input type="hidden"  name="id[]" id="id" value="<?=$data->id?>" >

                      <input type="hidden"  name="tanggal_acu_hasil[]" id="tanggal_acu_hasil" value="<?=$tgl_acu?>">

                      <input type="hidden"  name="tanggal[]" id="tanggal" value="<?=$tgl?>" >

                      <input type="hidden"  name="kode_sampel[]" id="kode_sampel" value="<?=$data->kode_sampel?>">

                      <input type="hidden"  name="bagian_tumbuhan[]" id="bagian_tumbuhan" value="<?=$data->bagian_tumbuhan?>">

                      <input type="hidden"  name="vektor[]" id="vektor" value="<?=$data->vektor?>">

                      <input type="hidden"  name="media[]" id="media" value="<?=$data->media?>">

                      <input type="hidden"  name="nama_patogen[]" id="nama_patogen" value="<?=$data->nama_patogen?>">

                      <input type="hidden"  name="nama_patogen2[]" id="nama_patogen2" value="<?=$data->nama_patogen2?>">

                      <input type="hidden"  name="nama_patogen3[]" id="nama_patogen3" value="<?=$data->nama_patogen3?>">

                      <input type="hidden"  name="target_optk[]" id="target_optk" value="<?=$data->target_optk?>">

                      <input type="hidden"  name="target_optk2[]" id="target_optk2" value="<?=$data->target_optk2?>">

                      <input type="hidden"  name="target_optk3[]" id="target_optk3" value="<?=$data->target_optk3?>">

                      <input type="hidden"  name="metode_pengujian[]" id="metode_pengujian" value="<?=$data->metode_pengujian?>">

                      <input type="hidden"  name="metode_pengujian2[]" id="metode_pengujian2" value="<?=$data->metode_pengujian2?>">

                      <input type="hidden"  name="metode_pengujian3[]" id="metode_pengujian3" value="<?=$data->metode_pengujian3?>">

                      <input type="hidden"  name="nama_lab[]" id="nama_lab" value="<?=$data->lab_penguji?>">

                      <input type="hidden"  name="tanggal_penerimaan[]" id="tanggal_penerimaan" value="<?=$data->tanggal_penyerahan_lab?>">

                      <input type="hidden"  name="tanggal_pengujian[]" id="tanggal_pengujian" value="<?=$data->tanggal_pengujian?>">

                      <input type="hidden"  name="jumlah_sampel[]" id="jumlah_sampel" value="<?=$data->jumlah_sampel?>">

                      <input type="hidden"  name="jumlah_sampel2[]" id="jumlah_sampel2" value="<?=$data->jumlah_sampel2?>">

                      <input type="hidden"  name="satuan[]" id="satuan" value="<?=$data->satuan?>">

                      <input type="hidden"  name="tanggal_data_teknis[]" id="tanggal_data_teknis" value="<?=$tgl?>">

                      <input type="hidden"  name="nama_penyelia[]" id="nama_penyelia" value="<?=$data->nama_penyelia?>">

                      <input type="hidden"  name="nip_penyelia[]" id="nip_penyelia" value="<?=$data->nip_penyelia?>">

                      <input type="hidden"  name="nama_analis[]" id="nama_analis" value="<?=$data->nama_analis?>">

                      <input type="hidden"  name="nip_analis[]" id="nip_analis" value="<?=$data->nip_analis?>">

                      <input type="hidden"  name="no_sertifikat[]" id="no_sertifikat" value="<?=$data->no_sertifikat?>">

                      <input type="hidden"  name="nama_sampel[]" id="nama_sampel" value="<?=$data->nama_sampel?>">

                      <input type="hidden"  name="nama_ilmiah[]" id="nama_ilmiah" value="<?=$data->nama_ilmiah?>">

                      <input type="hidden"  name="rekomendasi[]" id="rekomendasi" value="<?=$data->rekomendasi?>">

                      <input type="hidden"  name="kepala_plh[]" id="kepala_plh" value="<?=$data->mt?>">

                      <input type="hidden"  name="nip_kepala_plh[]" id="nip_kepala_plh" value="<?=$data->nip_mt?>">

                      <input type="hidden"  name="no_agenda[]" id="no_agenda" value="<?=$data->no_agenda?>">

                      <input type="hidden"  name="no_lhu[]" id="no_lhu" value="<?=$data->no_lhu?>">

                      <input type="hidden"  name="tanggal_lhu[]" id="tanggal_lhu" value="<?=$data->tanggal_lhu?>">

                      <input type="hidden"  name="pemohon[]" id="pemohon" value="<?=$data->pemohon?>">

                      <input type="hidden"  name="alamat_pemohon[]" id="alamat_pemohon" value="<?=$data->alamat_pemilik?>">

                      <input type="hidden"  name="no_permohonan[]" id="no_permohonan" value="<?=$data->no_permohonan?>">

                      <input type="hidden"  name="tanggal_permohonan[]" id="tanggal_permohonan" value="<?=$data->tanggal_permohonan?>">

                      <input type="hidden"  name="pemilik[]" id="pemilik" value="<?=$data->nama_pemilik?>">

                      <input type="hidden"  name="kesimpulan[]" id="kesimpulan" value="<?=$data->ket_kesimpulan?>">

                      <input type="hidden"  name="kepala_plh2[]" id="kepala_plh2" value="<?=$data->kepala_plh2?>">

                      <input type="hidden"  name="nip_kepala_plh2[]" id="nip_kepala_plh2" value="<?=$data->nip_kepala_plh2?>">

                       

                         </td>

                            <td>

                              <div class="column-full>

                                <label class="control-label" for="no_sampel"></label>

                                <input type="text" class="form-control" name="no_sampel[]" id="no_sampel" value="<?=$no?>" readonly style="width: 100%">

                              </div>

                          </td>

                          <td width="30%">

                            <div class="column-full">

                              <label class="control-label" for="positif_negatif"></label>

                              <select class="form-control" name="positif_negatif[]" id="positif_negatif" style="width: 50%">

                                <option>Negatif</option>

                                <option>Positif</option>

                              </select>

                            </div>

                          </td>

                          <td width="50%">

                            <div class="column-full">

                              <label class="control-label" for="hasil_pengujian"></label>

                              <em><input type="text" class="form-control" name="hasil_pengujian[]" id="hasil_pengujian" value="" style="width: 90%"></em>

                            </div>

                          </td>

                        </tr>



                  <?php endforeach; ?>



                    <!-- <div id="paginator"> -->

                     <!--  <?php



                      // if (count($r) > $dataPerhalaman) {

                      // for($i=1;$i<$jumlahHalaman;$i++){

                      // if ($i == $nomorHalaman) {

                      ?> -->



                       <!--  <div class="paginator"><a class="active" href="input_hasil_pengujian.php?id=<?php 

                       // echo $data->id?>&no_sampel=<?=$data->no_sampel?>&halaman=1"> -->

                          <!-- <?php 

                          // echo $i 

                          ?> -->

                          

                       <!--  </a></div> -->



                        <!-- <?php 

                      // }else {

                         ?> -->





                      <!--   <div class="paginator"><a href="input_hasil_pengujian.php?id=

                          <?php 

                        // echo $data->id

                        ?>&no_sampel=<?=$data->no_sampel?>&halaman=<?=$i?>">

                        <?php 

                        // echo $i 

                        ?></a></div>

                      <?php 

                      // }} 

                      ?>                   

                        <?php 

                      // } 

                      ?>-->     

                      <div class="column-full" style="position: absolute; margin-left: 100px; margin-top: -7px; z-index: 2">

                          <button type="submit" class="btn btn-kusuccess btn-lg" name="input" value="input"><i class="fa fa-check-circle fa-fw" aria-hidden="true"></i>&nbsp;Simpan</button> 

                      </div>   

                      </form>             

                  </tbody>

              </table>

                      

                      <a href="<?php echo $redirect?>">

                      <button type="submit" name="kembali" class="btn btn-info btn-lg bs-confirmation2"><i class="fa fa-arrow-circle-left fa-fw" aria-hidden="true"></i>&nbsp;Back</button></a>  

                

                      

             </div>              

          </div>

       </div> 

    </div>



<?php endwhile; ?>



<?php



$data2 = new Hasil($connection);

if(@$_POST['input']) {



  foreach ($_POST['no_sampel'] as $i => $value) {



    $id                 = $_POST['id'][$i];

    $tanggal_acu_hasil  = $_POST['tanggal_acu_hasil'][$i];

    $tanggal            = $_POST['tanggal'][$i];

    $kode_sampel        = $_POST['kode_sampel'][$i];

    $no_sampel          = htmlspecialchars($connection->conn->real_escape_string($_POST['no_sampel'][$i]));

    $bagian_tumbuhan    = $_POST['bagian_tumbuhan'][$i];

    $vektor             = $_POST['vektor'][$i];

    $media              = $_POST['media'][$i];

    $nama_patogen       = $_POST['nama_patogen'][$i];

    $nama_patogen2      = $_POST['nama_patogen2'][$i];

    $nama_patogen3      = $_POST['nama_patogen3'][$i];

    $target_optk        = $_POST['target_optk'][$i];

    $target_optk2       = $_POST['target_optk2'][$i];

    $target_optk3       = $_POST['target_optk3'][$i];

    $metode_pengujian   = $_POST['metode_pengujian'][$i];

    $metode_pengujian2  = $_POST['metode_pengujian2'][$i];

    $metode_pengujian3  = $_POST['metode_pengujian3'][$i];

    $nama_lab           = $_POST['nama_lab'][$i];

    $tanggal_penerimaan = $_POST['tanggal_penerimaan'][$i];

    $tanggal_pengujian  = $_POST['tanggal_pengujian'][$i];

    $jumlah_sampel      = $_POST['jumlah_sampel'][$i];

    $jumlah_sampel2     = $_POST['jumlah_sampel2'][$i];

    $satuan             = $_POST['satuan'][$i];

    $tanggal_data_teknis  = $_POST['tanggal_data_teknis'][$i];

    $nama_penyelia      = $_POST['nama_penyelia'][$i];

    $nip_penyelia       = $_POST['nip_penyelia'][$i];

    $nama_analis        = $_POST['nama_analis'][$i];

    $nip_analis         = $_POST['nip_analis'][$i];

    $no_sertifikat      = $_POST['no_sertifikat'][$i];

    $nama_sampel        = $_POST['nama_sampel'][$i];

    $nama_ilmiah        = $_POST['nama_ilmiah'][$i];

    $rekomendasi        = $_POST['rekomendasi'][$i];

    $kepala_plh         = $_POST['kepala_plh'][$i];

    $nip_kepala_plh     = $_POST['nip_kepala_plh'][$i];

    $no_agenda          = $_POST['no_agenda'][$i];

    $no_lhu             = $_POST['no_lhu'][$i];

    $tanggal_lhu        = $_POST['tanggal_lhu'][$i];

    $pemohon            = $_POST['pemohon'][$i];

    $alamat_pemohon     = $_POST['alamat_pemohon'][$i];

    $no_permohonan      = $_POST['no_permohonan'][$i];

    $tanggal_permohonan = $_POST['tanggal_permohonan'][$i];

    $pemilik            = $_POST['pemilik'][$i];

    $kesimpulan         = $_POST['kesimpulan'][$i];

    $kepala_plh2        = $_POST['kepala_plh2'][$i];

    $nip_kepala_plh2    = $_POST['nip_kepala_plh2'][$i];

    $positif_negatif    = htmlspecialchars($connection->conn->real_escape_string($_POST['positif_negatif'][$i]));

    $hasil_pengujian    = htmlspecialchars($connection->conn->real_escape_string($_POST['hasil_pengujian'][$i]));



  if($hasil_pengujian!==""){

      $data2->input($id, $tanggal_acu_hasil ,$tanggal, $kode_sampel, $no_sampel, $bagian_tumbuhan, $vektor, $media, $nama_patogen, $nama_patogen2, $nama_patogen3, $target_optk, $target_optk2, $target_optk3, $metode_pengujian, $metode_pengujian2, $metode_pengujian3, $nama_lab, $tanggal_penerimaan, $tanggal_pengujian, $jumlah_sampel, $jumlah_sampel2, $satuan, $tanggal_data_teknis, $nama_penyelia, $nip_penyelia, $nama_analis, $nip_analis, $no_sertifikat, $nama_sampel, $nama_ilmiah, $rekomendasi, $kepala_plh, $nip_kepala_plh, $no_agenda, $no_lhu, $tanggal_lhu, $pemohon, $alamat_pemohon, $no_permohonan, $tanggal_permohonan, $pemilik, $kesimpulan, $kepala_plh2, $nip_kepala_plh2 ,$positif_negatif, $hasil_pengujian);



        if(@$_SESSION['loginadminkt']){

          header( "refresh:1.5 url=../admin.php?page=sertifikat" ); 

        }elseif(@$_SESSION['loginsuperkt']){

          header( "refresh:1.5 url=../super_admin.php?page=sertifikat" );

        }else {

          header( "refresh:1.5 url=../pengujian.php?page=sertifikat" ); 

        }



        echo '<script type="text/javascript">';

        echo 'setTimeout(function () { swal("Sukses"," Hasil Pengujian Berhasil Di Input!","success");';

        echo '}, 0);</script>';       

    }else{

        echo '<script type="text/javascript">';

        echo 'setTimeout(function () { swal("Input Data Gagal!","Hasil Pengujian Tidak Boleh Kosong","error");';

        echo '}, 0);</script>';

    }

  }

}



?>  



<?php  

  require_once('../templates/footer_hasil.php');

?>



</body>



</html>











  

