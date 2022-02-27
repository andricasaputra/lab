<?php       

require_once('header_proses.php');
                   

$no_permohonan              =htmlspecialchars($conn->real_escape_string(trim($_POST['no_permohonan'])));

$tanggal_permohonan         =htmlspecialchars($conn->real_escape_string(trim($_POST['tanggal_permohonan'])));

$tanggal_acu_permohonan     =htmlspecialchars($conn->real_escape_string(trim($_POST['tanggal_acu_permohonan'])));

$nama_sampel                =htmlspecialchars($conn->real_escape_string(trim($_POST['nama_sampel'])));

$nama_ilmiah                =htmlspecialchars($conn->real_escape_string(trim($_POST['nama_ilmiah'])));

$jumlah_sampel              =htmlspecialchars($conn->real_escape_string(trim($_POST['jumlah_sampel'])));

$satuan                     =htmlspecialchars($conn->real_escape_string(trim($_POST['satuan'])));

$bagian_tumbuhan            =htmlspecialchars($conn->real_escape_string(trim($_POST['bagian_tumbuhan'])));

$media                      =htmlspecialchars($conn->real_escape_string(trim($_POST['media'])));

$vektor                     =htmlspecialchars($conn->real_escape_string(trim($_POST['vektor'])));

$daerah_asal                =htmlspecialchars($conn->real_escape_string(trim($_POST['daerah_asal'])));

$nama_patogen               =htmlspecialchars($conn->real_escape_string(trim($_POST['nama_patogen'])));

$nama_patogen2               =htmlspecialchars($conn->real_escape_string(trim($_POST['nama_patogen2'])));

$nama_patogen3               =htmlspecialchars($conn->real_escape_string(trim($_POST['nama_patogen3'])));

$target_optk                =htmlspecialchars($conn->real_escape_string(trim($_POST['target_optk'])));

$target_optk2               =htmlspecialchars($conn->real_escape_string(trim($_POST['target_optk2'])));

$target_optk3               =htmlspecialchars($conn->real_escape_string(trim($_POST['target_optk3'])));

$metode_pengujian           =htmlspecialchars($conn->real_escape_string(trim($_POST['metode_pengujian'])));

$metode_pengujian2          =htmlspecialchars($conn->real_escape_string(trim($_POST['metode_pengujian2'])));

$metode_pengujian3          =htmlspecialchars($conn->real_escape_string(trim($_POST['metode_pengujian3'])));

$nama_pemilik               =htmlspecialchars($conn->real_escape_string(trim($_POST['nama_pemilik'])));

$alamat_pemilik             =htmlspecialchars($conn->real_escape_string(trim($_POST['alamat_pemilik'])));

$dokumen_pendukung          =htmlspecialchars($conn->real_escape_string(trim($_POST['dokumen_pendukung'])));

$pemohon                    =htmlspecialchars($conn->real_escape_string(trim($_POST['pemohon'])));

$nip                        =htmlspecialchars($conn->real_escape_string(trim($_POST['nip'])));

$no_sampel					=htmlspecialchars($conn->real_escape_string(trim($_POST['no_sampel'])));                                    

    if(empty($bagian_tumbuhan) && empty($media) && empty($vektor)){

        echo 'false';

        exit;

    }else{

           $objectData->input($no_permohonan, $tanggal_permohonan, $tanggal_acu_permohonan ,$nama_sampel, $nama_ilmiah, $jumlah_sampel, $satuan, $bagian_tumbuhan, $media, $vektor, $daerah_asal, $nama_patogen, $nama_patogen2, $nama_patogen3 ,$target_optk, $target_optk2, $target_optk3, $metode_pengujian, $metode_pengujian2, $metode_pengujian3, $nama_pemilik, $alamat_pemilik, $dokumen_pendukung, $pemohon, $nip, $no_sampel); 


    echo 'goal';

    }


?>
