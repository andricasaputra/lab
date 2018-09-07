<?php

require_once('header_proses.php');


	$id					=$_POST['id'];

	$kondisi_sampel		=htmlspecialchars($conn->real_escape_string(trim($_POST['kondisi_sampel'])));

	$mt					=htmlspecialchars($conn->real_escape_string(trim($_POST['mt'])));

	$nip_mt				=htmlspecialchars($conn->real_escape_string(trim($_POST['nip_mt'])));

	$penyelia			=htmlspecialchars($conn->real_escape_string(trim($_POST['penyelia'])));

	$penyelia2			=htmlspecialchars($conn->real_escape_string(trim($_POST['penyelia2'])));

	$analis				=htmlspecialchars($conn->real_escape_string(trim($_POST['analis'])));

	$analis2			=htmlspecialchars($conn->real_escape_string(trim($_POST['analis2'])));

	$bahan				=htmlspecialchars($conn->real_escape_string(trim($_POST['bahan'])));

	$bahan2				=htmlspecialchars($conn->real_escape_string(trim($_POST['bahan2'])));

	$alat				=htmlspecialchars($conn->real_escape_string(trim($_POST['alat'])));

	$alat2				=htmlspecialchars($conn->real_escape_string(trim($_POST['alat2'])));

	$kesiapan			=htmlspecialchars($conn->real_escape_string(trim($_POST['kesiapan'])));

	$jumlah_sampel 		= $_POST['jumlah_sampel'];

		

 if ($kesiapan == 'Tidak') :

		/*check apakah id yg lebih tinggi, jika ada maka update semua id yg lebih tinggi juga*/

		if ($maxId > $id ) {

		/*Ambil jumlah sampel awal di database berdasarkan post id*/

		$query = $conn->query("SELECT jumlah_sampel FROM input_permohonan_kh WHERE id = $id");

		$result = $query->fetch_object();

		$awalJumlahSampel = $result->jumlah_sampel;

		/*ambil posisi post id pada array keberapa*/

		$inarr = intval(array_search($id, $arrId));

		/*+lihat Header proses+ / ambil post id dari array*/

		$awalarrid = $arrId[$inarr];

		/*loop sesuai jumlah  id sisa*/

		for ($i=$awalarrid + 1; $i <= $maxId ; $i++) : 

			$nextid = $i;

			$PilihJumlahSampel = $objectNomor->PilihJumlahSampel($nextid);

			$resultjumlahsampel = $PilihJumlahSampel->fetch_object();

			$resjumlah_sampel = $resultjumlahsampel->jumlah_sampel;

			$resno_sampel = $resultjumlahsampel->no_sampel;

			if (strpos($resno_sampel, "-") !== false) {

				$ex = explode("-", $resno_sampel);

				$awal = $ex[0] - $jumlah_sampel; 

				$akhir = end($ex) - $jumlah_sampel;

				$newno_sampel = $awal ."-". $akhir;

			}else{

				$akhir = $resno_sampel - $jumlah_sampel;

				$newno_sampel = $akhir;
			}


			$objectData->edit("UPDATE input_permohonan_kh SET no_sampel = '$newno_sampel' WHERE id ='$nextid'");

	 	endfor;



	 		$objectData->edit("UPDATE input_permohonan_kh SET no_sampel = '' WHERE id ='$id'");

	 		/*Jika Tidak Ada Id Yang lebih tinggi masuk sini*/


		}else{

			$objectData->edit("UPDATE input_permohonan_kh SET no_sampel = '' WHERE id ='$id'");

		}

	/*Jika Kesiapan Ya*/

	else:

		$query2 = $conn->query("SELECT kesiapan FROM input_permohonan_kh WHERE id = $id");

		$result2 = $query2->fetch_object();

		$old_kesiapan = $result2->kesiapan;

		/*Jika Ganti Kesiapan dari tidak jadi ya atau sebaliknya*/
		/*Jika tidak Ada Perbedaan Lewati*/

		if ($old_kesiapan != $_POST['kesiapan']) :

			$newid = $id - 1;

			$query2 = $conn->query("SELECT no_sampel FROM input_permohonan_kh WHERE id = $newid");

			if ($query2->num_rows != 0) {

				$result2 = $query2->fetch_object();

				$awalNoSampel = $result2->no_sampel;

			}else{

				$awalNoSampel = 0;

			}

			

			/*check apakah id yg lebih tinggi, jika ada maka update semua id yg lebih tinggi juga*/

			if ($maxId > $id ) {

				/*Ambil jumlah sampel awal di database berdasarkan post id*/

				$query = $conn->query("SELECT jumlah_sampel FROM input_permohonan_kh WHERE id = $id");

				$result = $query->fetch_object();

				$awalJumlahSampel = $result->jumlah_sampel;

				/*ambil posisi post id pada array keberapa*/

				$inarr = intval(array_search($id, $arrId));

				/*+lihat Header proses+ / ambil post id dari array*/

				$awalarrid = $arrId[$inarr];

				/*loop sesuai jumlah  id sisa*/

				$old_no_sampel =array();

				$newno_sampel = array();

				for ($i=$id; $i <= $maxId ; $i++) : 

					$nextid = $i;

					$PilihJumlahSampel = $objectNomor->PilihJumlahSampel($nextid);

					$resultjumlahsampel = $PilihJumlahSampel->fetch_object();

					$resjumlah_sampel = $resultjumlahsampel->jumlah_sampel;

					$resultno_sampel = $resultjumlahsampel->no_sampel;

					$resno_sampel = $awalNoSampel;

					/*Jika ada nomor sampel yang kosong*/

					if ($resultno_sampel == '') {
		
						/*Cek no sampel di id sebelumnya*/

						/*Cek no sampel di id sebelumnya lebih dari 1*/

						if (strpos($resno_sampel, "-") !== false) {

							$ex = explode("-", $resno_sampel);

							$awal = end($ex) + $jumlah_sampel; 

							$akhir = $ex[0] + end($ex) + $jumlah_sampel;

							if ($jumlah_sampel == 1) {

								$awal_no_sampel = $awal;

							}else{

								$awal_no_sampel = $awal ."-". $akhir;
							}

							/*Cek no sampel di id sebelumnya 1*/


						}else{

							$akhir = $resno_sampel + $jumlah_sampel;

							if ($jumlah_sampel == 1) {

								$awal_no_sampel = $akhir;

							}else{

								$tangkap = array();

								for ($j = $resno_sampel + 1 ; $j < $resno_sampel + $jumlah_sampel +1 ; $j++) { 
									$tangkap[] = $j;
								}

								$awal_no_sampel = $tangkap[0] ."-". end($tangkap) ;
							}
						}
		
						/*Nomor Sampel Baru*/

						$newno_sampel = $awal_no_sampel;

					/*Jika Tidak ada nomor sampel yang kosong*/

					}else{

						if (strpos($resultno_sampel, "-") !== false) {

							$ex = explode("-", $resultno_sampel);

							$awal = $ex[0] + $jumlah_sampel; 

							$akhir = end($ex) + $jumlah_sampel;

							$awal_no_sampel = $awal ."-". $akhir;
		

						}else{

							$awal_no_sampel = $resultno_sampel + $jumlah_sampel;

						}

						/*Nomor Sampel Baru*/

						$newno_sampel = $awal_no_sampel;

					}

			

					$objectData->edit("UPDATE input_permohonan_kh SET no_sampel = '$newno_sampel' WHERE id ='$nextid'");
		
			 	endfor;

	 		/*Jika Tidak Ada Id Yang lebih tinggi masuk sini*/

			}else{

				/*Cek no sampel di id sebelumnya lebih dari 1*/

				if (strpos($awalNoSampel, "-") !== false) {

					$ex = explode("-", $awalNoSampel);

					$awal = end($ex) + $jumlah_sampel; 

					$akhir = $ex[0] + end($ex) + $jumlah_sampel;

					if ($jumlah_sampel == 1) {

						$awal_no_sampel = $awal;

					}else{

						$awal_no_sampel = $awal ."-". $akhir;
					}

					/*Cek no sampel di id sebelumnya 1*/


				}else{

					$akhir = $awalNoSampel + $jumlah_sampel;

					if ($jumlah_sampel == 1) {

						$awal_no_sampel = $akhir;

					}else{

						$tangkap = array();

						for ($j = $awalNoSampel + 1 ; $j < $awalNoSampel + $jumlah_sampel +1 ; $j++) { 
							$tangkap[] = $j;
						}

						$awal_no_sampel = $tangkap[0] ."-". end($tangkap) ;
					}
				}


				$objectData->edit("UPDATE input_permohonan_kh SET no_sampel = '$awal_no_sampel' WHERE id ='$id'");

			}

		endif;

	endif;

 if($mt !=="") {

	 $objectData->edit("UPDATE input_permohonan_kh SET kondisi_sampel='$kondisi_sampel', mt='$mt', nip_mt='$nip_mt', penyelia='$penyelia', penyelia2='$penyelia2', analis='$analis',  analis2='$analis2' , bahan='$bahan', bahan2='$bahan2', alat='$alat', alat2='$alat2', kesiapan='$kesiapan' WHERE id ='$id'");
	 

 }

?>								