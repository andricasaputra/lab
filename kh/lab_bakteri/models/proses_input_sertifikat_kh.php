<?php

require_once('header_proses.php');



$id							=$_POST['id'];

$ket_kesimpulan				=htmlspecialchars($conn->real_escape_string($_POST['ket_kesimpulan']));

$no_sertifikat				=htmlspecialchars($conn->real_escape_string($_POST['no_sertifikat']));

$tanggal_sertifikat			=htmlspecialchars($conn->real_escape_string($_POST['tanggal_sertifikat']));

$rekomendasi				=htmlspecialchars($conn->real_escape_string($_POST['rekomendasi']));

$kepala_plh					=htmlspecialchars($conn->real_escape_string($_POST['kepala_plh']));

$nip_kepala_plh				=htmlspecialchars($conn->real_escape_string($_POST['nip_kepala_plh']));



		

$kd = $conn->query("SELECT no_sertifikat FROM input_permohonan_kh WHERE no_sertifikat='$no_sertifikat'");

$cek = $kd->num_rows;



if ($cek > 0){



	echo '<script>';

	echo 'setTimeout(function () { swal(""," Nomor Sertifikat Sudah Pernah Dipakai!","info");';

	echo '}, 0);</script>';	



	 exit;

 

	 

 }else{



  $data->edit("UPDATE input_permohonan_kh SET  ket_kesimpulan='$ket_kesimpulan', no_sertifikat='$no_sertifikat', tanggal_sertifikat='$tanggal_sertifikat', rekomendasi='$rekomendasi', kepala_plh='$kepala_plh', nip_kepala_plh='$nip_kepala_plh' WHERE id ='$id'");



  	$data2->edit("UPDATE hasil_kh SET no_sertifikat='$no_sertifikat' WHERE id ='$id'");



  echo '<script>

  			swal({

	            title: "Data",

	            text: "Berhasil Di Input! ",

	            type: "success"

	        }).then(function() {

	            window.location = "?page=sertifikat";

	        });

            </script>';



 }

?>	

