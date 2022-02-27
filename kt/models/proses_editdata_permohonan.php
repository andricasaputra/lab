<?php
require_once('header_proses.php');

$id							=$_POST['id'];

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


 	/*Jika post id  lebih kecil dari max id di dalam database*/

	if ($maxId > $id ) {

		/*Ambil jumlah sampel awal di database berdasarkan post id*/

		$query = $conn->query("SELECT jumlah_sampel FROM input_permohonan WHERE id = $id");

		$result = $query->fetch_object();

		$awalJumlahSampel = $result->jumlah_sampel;

		/*ambil posisi post id pada array keberapa*/

		$inarr = intval(array_search($id, $arrId));

		/*+lihat Header proses+ / ambil post id dari array*/

		$awalarrid = $arrId[$inarr];

		/*loop sesuai jumlah  id sisa*/

		for ($i=$awalarrid + 1; $i <= $maxId ; $i++) : 

			$nextid = $i;

			$pilihnoSampel = $objectNomor->PilihNoSampel($nextid);

			$resultnosampel = $pilihnoSampel->fetch_object();

			$resno_sampel = $resultnosampel->no_sampel;

			if (strpos($resno_sampel, "-") !== false) {

				$ex = explode("-", $resno_sampel);

				$awal = $ex[0] + $jumlah_sampel - $awalJumlahSampel;

				$akhir = end($ex) + $jumlah_sampel - $awalJumlahSampel;

				$newno_sampel = $awal ."-". $akhir;

			}else{

				$akhir = $resno_sampel + $jumlah_sampel - $awalJumlahSampel;

				$newno_sampel = $akhir;
			}


			$objectData->edit("UPDATE input_permohonan SET no_sampel = '$newno_sampel' WHERE id ='$nextid'");

	 	endfor;


	}

 	 $objectData->edit("UPDATE input_permohonan SET no_permohonan='$no_permohonan', tanggal_permohonan = '$tanggal_permohonan', tanggal_acu_permohonan='$tanggal_acu_permohonan', nama_sampel ='$nama_sampel', nama_ilmiah = '$nama_ilmiah', jumlah_sampel = '$jumlah_sampel', satuan = '$satuan', bagian_tumbuhan ='$bagian_tumbuhan', media = '$media', vektor = '$vektor', daerah_asal ='$daerah_asal', nama_patogen ='$nama_patogen', nama_patogen2 ='$nama_patogen2', nama_patogen3 ='$nama_patogen3', target_optk = '$target_optk', target_optk2 = '$target_optk2', target_optk3 = '$target_optk3', metode_pengujian = '$metode_pengujian', metode_pengujian2 = '$metode_pengujian2', metode_pengujian3 = '$metode_pengujian3', nama_pemilik ='$nama_pemilik', alamat_pemilik = '$alamat_pemilik', dokumen_pendukung = '$dokumen_pendukung', pemohon ='$pemohon', nip='$nip', no_sampel = '$no_sampel' WHERE id ='$id'");



	 $objectHasil->edit("UPDATE hasil_kt SET  bagian_tumbuhan ='$bagian_tumbuhan', media = '$media', vektor = '$vektor', target_optk = '$target_optk', target_optk2 = '$target_optk2', target_optk3 = '$target_optk3', metode_pengujian = '$metode_pengujian', metode_pengujian2 = '$metode_pengujian2', metode_pengujian3 = '$metode_pengujian3' WHERE id ='$id'");

 }

								
?>