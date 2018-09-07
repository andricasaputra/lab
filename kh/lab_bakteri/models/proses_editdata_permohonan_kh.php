<?php

require_once('header_proses.php');


	$id 						=$_POST['id'];

	$no_permohonan				=htmlspecialchars($conn->real_escape_string(trim($_POST['no_permohonan'])));

	$tanggal_permohonan			=htmlspecialchars($conn->real_escape_string(trim($_POST['tanggal_permohonan'])));

	$tanggal_acu_permohonan		=htmlspecialchars($conn->real_escape_string(trim($_POST['tanggal_acu_permohonan'])));

	$jenis_permohonan			=htmlspecialchars($conn->real_escape_string(trim($_POST['jenis_permohonan'])));

	$nama_sampel				=htmlspecialchars($conn->real_escape_string(trim($_POST['nama_sampel'])));

	$jumlah_sampel				=htmlspecialchars($conn->real_escape_string(trim($_POST['jumlah_sampel'])));

	$satuan						=htmlspecialchars($conn->real_escape_string(trim($_POST['satuan'])));

	$no_sampel_awal				=htmlspecialchars($conn->real_escape_string(trim($_POST['no_sampel_awal'])));

	$bagian_hewan				=htmlspecialchars($conn->real_escape_string(trim($_POST['bagian_hewan'])));

	$produk_hewan				=htmlspecialchars($conn->real_escape_string(trim($_POST['produk_hewan'])));

	$metode_pengujian			=htmlspecialchars($conn->real_escape_string(trim($_POST['metode_pengujian'])));

	$biaya_pengujian			=htmlspecialchars($conn->real_escape_string(trim($_POST['biaya_pengujian'])));

	$waktu_pengambilan_sampel	=htmlspecialchars($conn->real_escape_string(trim($_POST['waktu_pengambilan_sampel'])));

	$area_asal					=htmlspecialchars($conn->real_escape_string(trim($_POST['area_asal'])));

	$cara_pengambilan_sampel	=htmlspecialchars($conn->real_escape_string(trim($_POST['cara_pengambilan_sampel'])));

	$target_pengujian			=htmlspecialchars($conn->real_escape_string(trim($_POST['target_pengujian'])));

	$lama_pengujian				=htmlspecialchars($conn->real_escape_string(trim($_POST['lama_pengujian'])));

	$nama_pemilik				=htmlspecialchars($conn->real_escape_string(trim($_POST['nama_pemilik'])));

	$alamat_pemilik				=htmlspecialchars($conn->real_escape_string(trim($_POST['alamat_pemilik'])));

	$dokumen_pendukung			=htmlspecialchars($conn->real_escape_string(trim($_POST['dokumen_pendukung'])));

	$pemohon					=htmlspecialchars($conn->real_escape_string(trim($_POST['pemohon'])));

	$nip_pemohon				=htmlspecialchars($conn->real_escape_string(trim($_POST['nip_pemohon'])));

	$no_sampel					=htmlspecialchars($conn->real_escape_string(trim($_POST['no_sampel'])));


	/*Jika post id  lebih kecil dari max id di dalam database*/

	if ($maxId > $id ) {

		$selectid = $objectNomor->getIdForEdit($id);

		$ids = array();

		while ($getId = $selectid->fetch_object()) :

			$ids[] = $getId->id;
			
		endwhile;

		/*Ambil jumlah sampel awal di database berdasarkan post id*/

		$query = $conn->query("SELECT jumlah_sampel FROM input_permohonan_kh WHERE id = $id");

		$result = $query->fetch_object();

		$awalJumlahSampel = $result->jumlah_sampel;

		/*loop sesuai jumlah id sisa)*/

		foreach ($ids as $key => $value) {

			$nextid = $value;

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

			$objectData->edit("UPDATE input_permohonan_kh SET no_sampel = '$newno_sampel' WHERE id ='$nextid'");

		}


	}

	$objectData->edit("UPDATE input_permohonan_kh SET no_permohonan = '$no_permohonan', tanggal_permohonan = '$tanggal_permohonan', jenis_permohonan = '$jenis_permohonan' , tanggal_acu_permohonan = '$tanggal_acu_permohonan', nama_sampel ='$nama_sampel', jumlah_sampel = '$jumlah_sampel', satuan = '$satuan' , no_sampel_awal = '$no_sampel_awal', bagian_hewan = '$bagian_hewan', produk_hewan = '$produk_hewan', metode_pengujian ='$metode_pengujian', biaya_pengujian = '$biaya_pengujian', waktu_pengambilan_sampel = '$waktu_pengambilan_sampel', area_asal ='$area_asal', cara_pengambilan_sampel ='$cara_pengambilan_sampel', target_pengujian ='$target_pengujian', lama_pengujian ='$lama_pengujian', nama_pemilik = '$nama_pemilik', alamat_pemilik = '$alamat_pemilik', dokumen_pendukung = '$dokumen_pendukung', pemohon ='$pemohon', nip_pemohon='$nip_pemohon', no_sampel = '$no_sampel' WHERE id ='$id'");



?>