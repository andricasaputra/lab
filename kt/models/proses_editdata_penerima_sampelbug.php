<?php

session_start();

require_once('header_proses.php');

if (isset($_SESSION['loginsuperkt'])) {

	$redirect = 'super_admin.php?page=data_permohonan';

}elseif (isset($_SESSION['loginadminkt'])) {

	$redirect = 'admin.php?page=data_permohonan';

}else{

	$redirect = 'index.php?page=data_permohonan';
}


if (isset($_POST['edit'])) :
	

$id							=$_POST['id'];

$no_permohonan				=htmlspecialchars($conn->real_escape_string(trim($_POST['no_permohonan'])));

$tanggal_permohonan			=htmlspecialchars($conn->real_escape_string(trim($_POST['tanggal_permohonan'])));

$tanggal_acu_permohonan		=htmlspecialchars($conn->real_escape_string(trim($_POST['tanggal_acu_permohonan'])));

$nama_sampel				=htmlspecialchars($conn->real_escape_string(trim($_POST['nama_sampel'])));

$nama_ilmiah				=htmlspecialchars($conn->real_escape_string(trim($_POST['nama_ilmiah'])));

$jumlah_sampel				=htmlspecialchars($conn->real_escape_string(trim($_POST['jumlah_sampel'])));

$satuan						=htmlspecialchars($conn->real_escape_string(trim($_POST['satuan'])));

$bagian_tumbuhan			=htmlspecialchars($conn->real_escape_string(trim($_POST['bagian_tumbuhan'])));

$media						=htmlspecialchars($conn->real_escape_string(trim($_POST['media'])));

$vektor						=htmlspecialchars($conn->real_escape_string(trim($_POST['vektor'])));

$daerah_asal				=htmlspecialchars($conn->real_escape_string(trim($_POST['daerah_asal'])));

$nama_patogen				=htmlspecialchars($conn->real_escape_string(trim($_POST['nama_patogen'])));

$nama_patogen2				=htmlspecialchars($conn->real_escape_string(trim($_POST['nama_patogen2'])));

$nama_patogen3				=htmlspecialchars($conn->real_escape_string(trim($_POST['nama_patogen3'])));

$target_optk				=htmlspecialchars($conn->real_escape_string(trim($_POST['target_optk'])));

$target_optk2				=htmlspecialchars($conn->real_escape_string(trim($_POST['target_optk2'])));

$target_optk3				=htmlspecialchars($conn->real_escape_string(trim($_POST['target_optk3'])));

$metode_pengujian			=htmlspecialchars($conn->real_escape_string(trim($_POST['metode_pengujian'])));

$metode_pengujian2			=htmlspecialchars($conn->real_escape_string(trim($_POST['metode_pengujian2'])));

$metode_pengujian3			=htmlspecialchars($conn->real_escape_string(trim($_POST['metode_pengujian3'])));

$nama_pemilik				=htmlspecialchars($conn->real_escape_string(trim($_POST['nama_pemilik'])));

$alamat_pemilik				=htmlspecialchars($conn->real_escape_string(trim($_POST['alamat_pemilik'])));

$dokumen_pendukung			=htmlspecialchars($conn->real_escape_string(trim($_POST['dokumen_pendukung'])));

$pemohon					=htmlspecialchars($conn->real_escape_string(trim($_POST['pemohon'])));

$nip						=htmlspecialchars($conn->real_escape_string(trim($_POST['nip'])));



 if(empty($bagian_tumbuhan) && empty($media) && empty($vektor)){


 	echo "<script>window.alert('Bagian Tumbuhan/Media/Vektor Tidak Boleh Kosong, Pilih salah Satu');
        window.location='../".$redirect."';</script>";

	
 }else{

 	 $objectData->edit("UPDATE input_permohonan SET no_permohonan='$no_permohonan', tanggal_permohonan = '$tanggal_permohonan', tanggal_acu_permohonan='$tanggal_acu_permohonan', nama_sampel ='$nama_sampel', nama_ilmiah = '$nama_ilmiah', jumlah_sampel = '$jumlah_sampel', satuan = '$satuan', bagian_tumbuhan ='$bagian_tumbuhan', media = '$media', vektor = '$vektor', daerah_asal ='$daerah_asal', nama_patogen ='$nama_patogen', nama_patogen2 ='$nama_patogen2', nama_patogen3 ='$nama_patogen3', target_optk = '$target_optk', target_optk2 = '$target_optk2', target_optk3 = '$target_optk3', metode_pengujian = '$metode_pengujian', metode_pengujian2 = '$metode_pengujian2', metode_pengujian3 = '$metode_pengujian3', nama_pemilik ='$nama_pemilik', alamat_pemilik = '$alamat_pemilik', dokumen_pendukung = '$dokumen_pendukung', pemohon ='$pemohon', nip='$nip' WHERE id ='$id'");



	 $objectHasil->edit("UPDATE hasil_kt SET  bagian_tumbuhan ='$bagian_tumbuhan', media = '$media', vektor = '$vektor', target_optk = '$target_optk', target_optk2 = '$target_optk2', target_optk3 = '$target_optk3', metode_pengujian = '$metode_pengujian', metode_pengujian2 = '$metode_pengujian2', metode_pengujian3 = '$metode_pengujian3' WHERE id ='$id'");

	 	header( "refresh:1.5; url=../".$redirect."" ); 

		echo'<link href="../../assets/sweetalert2-master/dist/sweetalert2.css" rel="stylesheet">';

		echo '<script src="../../assets/sweetalert2-master/dist/sweetalert2.js"></script>';

		echo '<script type="text/javascript">';

		echo 'setTimeout(function () { swal("Sukses"," Data Berhasil Di Edit!","success");';

		echo '}, 0);</script>';

 }

endif;



?>