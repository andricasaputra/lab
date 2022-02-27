<?php

require_once('header_proses.php');

    $id                 = $_POST['id'];

    $tanggal_acu_hasil  = $_POST['tanggal_acu_hasil'];

    $tanggal            = $_POST['tanggal'];

    $kode_sampel        = $_POST['kode_sampel'];

    $no_sampel          = htmlspecialchars($conn->real_escape_string($_POST['no_sampel']));

    $bagian_tumbuhan    = $_POST['bagian_tumbuhan'];

    $vektor             = $_POST['vektor'];

    $media              = $_POST['media'];

    $nama_patogen       = $_POST['nama_patogen'];

    $nama_patogen2      = $_POST['nama_patogen2'];

    $nama_patogen3      = $_POST['nama_patogen3'];

    $target_optk        = $_POST['target_optk'];

    $target_optk2       = $_POST['target_optk2'];

    $target_optk3       = $_POST['target_optk3'];

    $metode_pengujian   = $_POST['metode_pengujian'];

    $metode_pengujian2  = $_POST['metode_pengujian2'];

    $metode_pengujian3  = $_POST['metode_pengujian3'];

    $nama_lab           = $_POST['nama_lab'];

    $tanggal_penerimaan = $_POST['tanggal_penerimaan'];

    $tanggal_pengujian  = $_POST['tanggal_pengujian'];

    $jumlah_sampel      = $_POST['jumlah_sampel'];

    $jumlah_sampel2     = $_POST['jumlah_sampel2'];

    $satuan             = $_POST['satuan'];

    $tanggal_data_teknis  = $_POST['tanggal_data_teknis'];

    $nama_penyelia      = $_POST['nama_penyelia'];

    $nip_penyelia       = $_POST['nip_penyelia'];

    $nama_analis        = $_POST['nama_analis'];

    $nip_analis         = $_POST['nip_analis'];

    $no_sertifikat      = $_POST['no_sertifikat'];

    $nama_sampel        = $_POST['nama_sampel'];

    $nama_ilmiah        = $_POST['nama_ilmiah'];

    $rekomendasi        = $_POST['rekomendasi'];

    $kepala_plh         = $_POST['kepala_plh'];

    $nip_kepala_plh     = $_POST['nip_kepala_plh'];

    $no_agenda          = $_POST['no_agenda'];

    $no_lhu             = $_POST['no_lhu'];

    $tanggal_lhu        = $_POST['tanggal_lhu'];

    $pemohon            = $_POST['pemohon'];

    $alamat_pemohon     = $_POST['alamat_pemohon'];

    $no_permohonan      = $_POST['no_permohonan'];

    $tanggal_permohonan = $_POST['tanggal_permohonan'];

    $pemilik            = $_POST['pemilik'];

    $kesimpulan         = $_POST['kesimpulan'];

    $kepala_plh2        = $_POST['kepala_plh2'];

    $nip_kepala_plh2    = $_POST['nip_kepala_plh2'];

    $positif_negatif    = htmlspecialchars($conn->real_escape_string($_POST['positif_negatif']));

    $hasil_pengujian    = htmlspecialchars($conn->real_escape_string($_POST['hasil_pengujian']));



  if($hasil_pengujian!==""){

      $objectHasil->input($id, $tanggal_acu_hasil ,$tanggal, $kode_sampel, $no_sampel, $bagian_tumbuhan, $vektor, $media, $nama_patogen, $nama_patogen2, $nama_patogen3, $target_optk, $target_optk2, $target_optk3, $metode_pengujian, $metode_pengujian2, $metode_pengujian3, $nama_lab, $tanggal_penerimaan, $tanggal_pengujian, $jumlah_sampel, $jumlah_sampel2, $satuan, $tanggal_data_teknis, $nama_penyelia, $nip_penyelia, $nama_analis, $nip_analis, $no_sertifikat, $nama_sampel, $nama_ilmiah, $rekomendasi, $kepala_plh, $nip_kepala_plh, $no_agenda, $no_lhu, $tanggal_lhu, $pemohon, $alamat_pemohon, $no_permohonan, $tanggal_permohonan, $pemilik, $kesimpulan, $kepala_plh2, $nip_kepala_plh2 ,$positif_negatif, $hasil_pengujian);



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







?> 