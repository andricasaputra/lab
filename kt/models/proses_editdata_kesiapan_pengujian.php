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

		$query = $conn->query("SELECT jumlah_sampel FROM input_permohonan WHERE id = $id");

		$result = $query->fetch_object();

		@$awalJumlahSampel = $result->jumlah_sampel;

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

				$akhir = end($ex);

				$akhir2 = intval($jumlah_sampel);

				$akhir3 = $akhir - $akhir2;

				$newno_sampel = $awal ."-". $akhir3;

			}else{

				$akhir = $resno_sampel;

				$akhir2 =  intval($jumlah_sampel);

				$newno_sampel = $akhir - $akhir2;
			}

			
			$objectData->edit("UPDATE input_permohonan SET no_sampel = '$newno_sampel' WHERE id ='$nextid'");

	 	endfor;

	 		$objectData->edit("UPDATE input_permohonan SET no_sampel = '' WHERE id ='$id'");


	 		/*Jika Tidak Ada Id Yang lebih tinggi masuk sini*/

		}else{


			$objectData->edit("UPDATE input_permohonan SET no_sampel = '' WHERE id ='$id'");

		}

	/*Jika Kesiapan Ya*/

	else:

		$query = $conn->query("SELECT nama_sampel FROM input_permohonan WHERE id = $id");

		$result = $query->fetch_object();

		$nama_sampel = $result->nama_sampel;

		/*Jika Ada ID Yang Lebih Tinggi*/	

		if ($maxId > $id ) {

			$datas = array();

			$query = $conn->query("SELECT id, nama_sampel, jumlah_sampel,no_sampel FROM input_permohonan WHERE id >= $id AND no_sampel != ''");

			while($result = $query->fetch_object()):

				$datas[] = array(

					"id" =>$result->id,
					"nama_sampel" => $result->nama_sampel,
					"jumlah_sampel" => $result->jumlah_sampel,
					"no_sampel"=>$result->no_sampel

				);

			endwhile;

			$arrNoSampel = array();

			$arrJumlahSampel = array();

			foreach ($datas as $data) :

				$nextid[] = $data["id"];

				$ids = $data["id"];

				$nextJumlahSampel = (int)$data["jumlah_sampel"];

				$arrNoSampel[] = $data["no_sampel"];

				$awalNoSampel = $arrNoSampel[0];

				/*New Nomor Sampel Untuk ID INI*/

				if ($jumlah_sampel == 1) {

					if (strpos($awalNoSampel, "-") !== false) {

						$x = explode("-", $awalNoSampel);

						$newno_sampel = $x[0];
			
					}else{

						$newno_sampel = $awalNoSampel;

					}

					
				}else{


					if (strpos($awalNoSampel, "-") !== false) {

						$newno_sampel = $awalNoSampel;

						
					}else{

						$newno_sampel = $awalNoSampel."-".$awalNoSampel + $jumlah_sampel;

					}


				}

			/*End No Sampel ID INI*/

			/*Set No Sampel ID Selanjutnya*/

			$objectData->edit("UPDATE input_permohonan SET no_sampel = '' WHERE id ='$ids'");

			endforeach;

			$objectData->edit("UPDATE input_permohonan SET no_sampel = '$newno_sampel' WHERE id ='$id'");

			foreach ($nextid as $nid) :

				$query = $conn->query("SELECT no_sampel, jumlah_sampel FROM input_permohonan WHERE id = (SELECT max(id) FROM input_permohonan WHERE nama_sampel NOT LIKE '%Bibit%' AND no_sampel != '') ");

				$result = $query->fetch_object();

				$no_sampel = $result->no_sampel;

				$jumlah_sampel = $result->jumlah_sampel;

				if ($jumlah_sampel == 1) {

					if (strpos($no_sampel, "-") !== false) {

						$x = explode("-", $no_sampel);

						$awalNoSampel = end($x) ;

						$akhirNoSampel = $jumlah_sampel;

						$nextNoSampel = $awalNoSampel + $akhirNoSampel;

					}else{

						$awalNoSampel = $no_sampel;

						$akhirNoSampel = $jumlah_sampel;

						$nextNoSampel = $awalNoSampel + $akhirNoSampel;
					}

				}else{

					if (strpos($no_sampel, "-") !== false) {

						$x = explode("-", $no_sampel);

						$awalNoSampel = end($x) + 1 ;

						$akhirNoSampel = end($x) + intval($jumlah_sampel);

						$nextNoSampel = $awalNoSampel."-".$akhirNoSampel;

					}else{

						$awalNoSampel = $no_sampel + 1 ;

						$akhirNoSampel = $no_sampel + intval($jumlah_sampel);

						$nextNoSampel = $awalNoSampel."-".$akhirNoSampel;

					}

				}


				$objectData->edit("UPDATE input_permohonan SET no_sampel = '$nextNoSampel' WHERE id ='$nid'");

			endforeach;

		/*Jika Tidak Ada ID Yang Lebih Tinggi*/	

		}else{

			$query = $conn->query("SELECT id, nama_sampel, jumlah_sampel, no_sampel FROM input_permohonan WHERE id = (SELECT max(id) FROM input_permohonan WHERE no_sampel != '')");

			while($result = $query->fetch_object()):

				$datas[] = array(

					"id" =>$result->id,
					"nama_sampel" => $result->nama_sampel,
					"jumlah_sampel" => $result->jumlah_sampel,
					"no_sampel"=>$result->no_sampel

				);

			endwhile;


			foreach ($datas as $data) :

				if ($jumlah_sampel == 1) {

					if (strpos($data["no_sampel"], "-") !== false) {

						$x = explode("-", $data["no_sampel"]);

						$newno_sampel = end($x) + $jumlah_sampel;


					}else{

						$newno_sampel = $data["no_sampel"] + $jumlah_sampel;

					}


				}else{

					if (strpos($data["no_sampel"], "-") !== false) {

						$x = explode("-", $data["no_sampel"]);

						$awal = end($x) + 1;

						$akhir = end($x) + $jumlah_sampel;

						$newno_sampel = $awal ."-". $akhir;


					}else{

						$awal = $data["no_sampel"] + 1;

						$akhir = $data["no_sampel"] + $jumlah_sampel;

						$newno_sampel = $awal ."-". $akhir;

					}

				}

				$objectData->edit("UPDATE input_permohonan SET no_sampel = '$newno_sampel' WHERE id ='$id'");

			endforeach;

		}

			

	endif;

 if($mt !=="") {

	 $objectData->edit("UPDATE input_permohonan SET kondisi_sampel='$kondisi_sampel', mt='$mt', nip_mt='$nip_mt', penyelia='$penyelia', penyelia2='$penyelia2', analis='$analis',  analis2='$analis2' , bahan='$bahan', bahan2='$bahan2', alat='$alat', alat2='$alat2', kesiapan='$kesiapan' WHERE id ='$id'");
	 

 }

?>								