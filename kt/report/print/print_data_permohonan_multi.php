<?php

require_once ('header.php');

$file = explode('.', basename(__FILE__));

$set = $objectPrint->setNamaDokumen($file[0], 'kt');

$content ='

<style>

	div#lower{

		margin-left: 370px;

	}


	div#lower2{

		margin-left: 370px;

		position: relative;

		margin-bottom:10px;

	}



	div#logo{

		margin-left: 0px;

	}



	#garis {

		width: 97%;

		margin-left: 10px;

	}



	hr {

        border: none;

        height: 1px;

        color: black; 

        background-color: black;

    }



	#judul {

		text-align: center;

		font-weight: bold;

		position:relative;

		margin-left:auto;

		margin-right: auto;

	}



	#nomor{

		text-align: center;

	}



	td {

		vertical-align: text-top;

	}



	.html2pdf__page-break2 {

      	height: 2000px;

    }

 
</style>

<page backtop="35mm" backbottom="10mm" backleft="12mm" backright="10mm">

	 <page_header> 

		<div id="logo">

			<img src="'.$logoskp.'" width="744px; height:132px">

		</div>

	</page_header>

	<page_footer>

        <div id="garis">

            <hr>

            <span style="margin-left: 10px;"><i>'.$objectPrint->kode_dokumen.'</i></span>

        </div>

    </page_footer> ';
	

	if(@$_POST['print_data']){

		$tampil = $objectPrint->print_pertanggal(@$_POST['tgl_a'], @$_POST['tgl_b']);

	}else {

		$tampil = $objectData->tampil();
		exit("Error.. Check Your Connection");

	}

	if ($tampil->num_rows === 0) {
        echo '<script>alert("Tidak Ada Data Untuk Di Cetak! Periksa Kembali Pemilihan Tanggal");window.close();</script>';
        return false;
    }

	$num = $tampil->num_rows;

    $arrID = array();

	while ($data=$tampil->fetch_object()):

		$bag = $data->bagian_tumbuhan;

		$bilangan = ucwords($objectNomor->bilangan($data->jumlah_sampel));

		$arrID[] = $data->id;

        $totalID = count($arrID);

$content .= '

<div id="judul">

	<u>'.$objectPrint->title_dokumen.'</u>

</div>

<div id="nomor">

	Nomor: '.$data->no_permohonan.', Tanggal: '.$data->tanggal_permohonan.'

</div> 

		<p></p>

		<div>

			Kepada Yth :

			<br>

			<strong>Kepala Stasiun Karantina Pertanian Kelas I Sumbawa Besar</strong>

			<br> Jalan Pelabuhan Badas No.1 Sumbawa Besar NTB 84351

			<br> Di-

			<p style="text-indent: 0.2in;">

				Sumbawa Besar

			</p>

		</div>

		<p style="text-indent: 0.5in;">Bersama ini disampaikan permohonan pengujian/pemeriksaan sampel/media pembawa OPT/OPTK, dengan identitas sebagai berikut:</p>



		<table>

			<tr>

				<td width="24">

					<p>I.</p>

				</td>

				<td width="234">

					<p>Keterangan sampel/media pembawa</p>

				</td>

				<td width="18">

					<p>:</p>

				</td>



			</tr>



		</table>



		<table>



			<tr>

				<td width="24">

					<p>1.</p>

				</td>

				<td width="234">

					<p>Nama sampel/media pembawa</p>

				</td>

				<td width="18">

					<p>:</p>

				</td>

				<td width="366">

					<p>'.$data->nama_sampel.'</p>

				</td>

			</tr>

		</table>

		<table>

			<tr>

				<td width="24">

					2.

				</td>

				<td width="234">

					Nama Ilmiah

				</td>

				<td width="18">

					:

				</td>

				<td width="366">

					<em>'.$data->nama_ilmiah.'</em>

					

				</td>

			</tr>

		</table>

		<table>

			<tr>

				<td width="24">

					3.

				</td>

				<td width="234">

					Jumlah sampel/media pembawa

				</td>

				<td width="18">

					:

				</td>

				<td width="366">

					'.$data->jumlah_sampel.'&nbsp;('.$bilangan.')&nbsp;'.$data->satuan.'

				</td>

			</tr>

			<tr>

				<td width="24">

					4.

				</td>

				<td width="234">

					Jenis sampel/media pembawa

				</td>

				<td width="18">

					:

				</td>

				<td width="366">&nbsp;</td>

			</tr>

			<tr>

				<td width="24">&nbsp;</td>

				<td width="234">

					&middot; Bagian tumbuhan

				</td>

				<td width="18">

					:

				</td>

				<td width="366"> 



				';



				if ($bag == 'Akar') { 



					$content .='

					

					<img src="'.$checkfix.'" style="width: 15px">&nbsp;&nbsp;Akar ';

					

				}else{ 



					$content .='





					<img src="'.$boxfix.'" style="width: 15px">&nbsp;&nbsp;Akar ';

				}



				if ($bag == 'Batang') { 



					$content .='

					

					<span style="margin-left: 32px"><img src="'.$checkfix.'" style="width: 15px">&nbsp;&nbsp;Batang</span> ';

					

				}else{ 



					$content .='





					<span style="margin-left: 32px"><img src="'.$boxfix.'" style="width: 15px">&nbsp;&nbsp;Batang</span> ';

				}



				if ($bag == 'Daun') { 



					$content .='

					

					<span style="margin-left: 10px"><img src="'.$checkfix.'" style="width: 15px">&nbsp;&nbsp;Daun</span> ';

					

				}else{ 



					$content .='





					<span style="margin-left: 10px"><img src="'.$boxfix.'" style="width: 15px">&nbsp;&nbsp;Daun</span>';

				}



				if ($bag == 'Umbi') { 



					$content .='

					

					<span style="margin-left: 10px"><img src="'.$checkfix.'" style="width: 15px">&nbsp;&nbsp;Umbi</span> ';

					

				}else{ 



					$content .='





					<span style="margin-left: 10px"><img src="'.$boxfix.'" style="width: 15px">&nbsp;&nbsp;Umbi</span>';

				}





				$content .='

	

				</td>

			</tr>

			<tr>

				<td width="24">&nbsp;</td>

				<td width="234">

					

				</td>

				<td width="18">

				

				</td>

				<td width="366">

				';



				if ($bag == 'Buah') { 



					$content .='

					

					<img src="'.$checkfix.'" style="width: 15px">&nbsp;&nbsp;Buah ';

					

				}else{ 



					$content .='





					<img src="'.$boxfix.'" style="width: 15px">&nbsp;&nbsp;Buah ';

				}



				if ($bag == 'Seluruh Bagian Tanaman') { 



					$content .='

					

					 <span style="margin-left: 28px"><img src="'.$checkfix.'" style="width: 15px">&nbsp;&nbsp;Seluruh bag tanaman</span> ';

					

				}else{ 



					$content .='





					 <span style="margin-left: 28px"><img src="'.$boxfix.'" style="width: 15px">&nbsp;&nbsp;Seluruh bag tanaman</span> ';

				}



				$content .='

				

				</td>

			</tr>

			<tr>

				<td width="24">&nbsp;</td>

				<td width="234">

				</td>

				<td width="18">

				</td>

				<td width="366">



				';



				if ($bag == 'Biji/Benih') { 



					$content .='

					

					<img src="'.$checkfix.'" style="width: 15px">&nbsp;&nbsp;Biji/Benih ';

					

				}else{ 



					$content .='



					<img src="'.$boxfix.'" style="width: 15px">&nbsp;&nbsp;Biji/Benih ';

				}



				if ($bag == 'Bagian Lain') { 



					$content .='

					

					<span style="margin-left: 4px"><img src="'.$checkfix.'" style="width: 15px">&nbsp;&nbsp;Bagian Lain : ...............</span> ';

					

				}else{ 



					$content .='



					<span style="margin-left: 4px"><img src="'.$boxfix.'" style="width: 15px">&nbsp;&nbsp;Bagian Lain : ...............</span> ';

				}



				$content .='

				

				</td>

			</tr>

			<tr>

				<td width="24">&nbsp;</td>

				<td width="234">

					&middot; Media

				</td>

				<td width="18">

					:

				</td>

				<td width="366">

					 <img src="'.$boxfix.'" style="width: 15px">&nbsp;&nbsp;Tanah

					 <span style="margin-left: 22px"><img src="'.$boxfix.'" style="width: 15px">&nbsp;&nbsp;Lainnya: ...............</span>

					

				</td>

			</tr>

			<tr>

				<td width="24">&nbsp;</td>

				<td width="234">

					&middot; Vektor/inang/spesimen

				</td>

				<td width="18">

					:

				</td>

				<td width="366">

					'.$data->vektor.'

				</td>

			</tr>

			<tr>

				<td width="24">

					5.

				</td>

				<td width="234">

					Negara/daerah asal

				</td>

				<td width="18">

					:

				</td>

				<td width="366">

					'.$data->daerah_asal.'

				</td>

			</tr>

			<tr>

				<td width="24">

					6.

				</td>

				<td width="234">

					Target OPT/OPTK

				</td>

				<td width="18">

					:

				</td>

				<td width="366">

					

				';



				// Target OPTK Ke 2 Terisi



					if ($data->target_optk2 !== '' && $data->target_optk3 == '') {



						// Jenis/ Kelompok OPTK Target Pengujian Ke 2 Kosong

							

						if ($data->nama_patogen2 =='') {



							$content .='



							<b>'.$data->nama_patogen.'</b>&nbsp;&nbsp;(<em>'.$data->target_optk.' & '.$data->target_optk2.'</em>)



							';



						// Jenis/ Kelompok OPTK Target Pengujian Ke 2 Terisi 



						}else{



							$content .='



							<b>'.$data->nama_patogen.'</b>&nbsp;&nbsp;(<em>'.$data->target_optk.'</em>)



							<br>



							<b>'.$data->nama_patogen2.'</b>&nbsp;&nbsp;(<em>'.$data->target_optk2.'</em>)  



							';



						}



					// Target OPTK Ke 3 Terisi



					}elseif($data->target_optk3 !==''){



						// Jenis/ Kelompok OPTK Target Pengujian Ke 2 dan ke 3 Kosong 



						if ($data->nama_patogen2 =='' && $data->nama_patogen3 == '') {



							$content .='



							<b>'.$data->nama_patogen.'</b>&nbsp;&nbsp;(<em>'.$data->target_optk.', '.$data->target_optk2.', '.$data->target_optk3.'</em>)



							';



						// Jenis/ Kelompok OPTK Target Pengujian ke 3 Kosong tetapi target pengujian OPTK ke 2 terisi 



						}elseif($data->nama_patogen3 =='' && $data->nama_patogen2 !==''){



							$content .='



							<b>'.$data->nama_patogen.'</b>&nbsp;&nbsp;(<em>'.$data->target_optk.'</em>)



							<br>



							<b>'.$data->nama_patogen2.'</b>&nbsp;&nbsp;(<em>'.$data->target_optk2.' & '.$data->target_optk3.'</em>)



							';



						// Jenis/ Kelompok OPTK Target Pengujian ke 3 Terisi tetapi target pengujian OPTK ke 2 kosong



						}elseif($data->nama_patogen3 !== '' && $data->nama_patogen2 ==''){





							$content .='



							<b>'.$data->nama_patogen.'</b>&nbsp;&nbsp;(<em>'.$data->target_optk.', '.$data->target_optk2.'</em>)



							<br>



							<b>'.$data->nama_patogen3.'</b>&nbsp;&nbsp;(<em>'.$data->target_optk3.'</em>) 



							';



						// Jenis/ Kelompok OPTK Target Pengujian ke 2 dan ke 3 Terisi + target optk 1



						}else{



							$content .='



							<b>'.$data->nama_patogen.'</b>&nbsp;&nbsp;(<em>'.$data->target_optk.'</em>)



							<br>



							<b>'.$data->nama_patogen2.'</b>&nbsp;&nbsp;(<em>'.$data->target_optk2.'</em>)  



							<br>



							<b>'.$data->nama_patogen3.'</b>&nbsp;&nbsp;(<em>'.$data->target_optk3.'</em>) 



							';



						}



					}else{



						// Hanya 1 Target OPTK terisi



						$content .='



						<b>'.$data->nama_patogen.'</b>&nbsp;&nbsp;(<em>'.$data->target_optk.'</em>) 



						';



					}



				$content .='

					

				</td>

			</tr>

		

			<tr>

				<td width="24">

					7.

				</td>

				<td width="234">

				Metode pengujian

				</td>

				<td width="18">

					:

				</td>

				<td width="366">

					'.$data->metode_pengujian.' <br> '.$data->metode_pengujian2.' <br>'.$data->metode_pengujian3.'

				</td>

			</tr>



		</table>

		<table>

			<tr>

				<td width="24">

					II.

				</td>

				<td width="234">

					Identitas Pemilik

				</td>

				<td width="18">

					:

				</td>



			</tr>



		</table>

		<table>



			<tr>

				<td width="24">

					<p>1.</p>

				</td>

				<td width="234">

					<p>Nama pemilik/Perusahaan/Kuasa</p>

				</td>

				<td width="16">

					<p>:</p>

				</td>

				<td width="366">

					<p>'.$data->nama_pemilik.'</p>

				</td>

			</tr>

			<tr>

				<td width="24">

					2.

				</td>

				<td width="234">

					Alamat pemilik/Perusahaan/Kuasa

				</td>

				<td width="16">

					:

				</td>

				<td width="366">

					'.$data->alamat_pemilik.'

				</td>

			</tr>



		</table>

		<table>



			<tr>

				<td width="24">

					<p>III.</p>

				</td>

				<td width="234">

					<p>Dokumen Pendukung</p>

				</td>

				<td width="18">

					<p>:</p>

				</td>

				<td width="366">

					<p>'.$data->dokumen_pendukung.'</p>

				</td>

			</tr>

			



		</table>

		<div  id="lower"  align="center">

			<p></p> ';



			$content .='

			Pemohon

			<p></p>

			<p></p>

			<p></p>

			

			('.$data->pemohon.')<br/>

			

		</div>

		<div id="lower2"  align="center">NIP. '.$data->nip.'</div>



		<div>

		<br>

			

			<p>Demikian disampaikan, atas perhatiannya diucapkan terima kasih.</p>

			Keterangan:

			<br>

			<sup>*)</sup> Diisi sesuai dengan jenis pengujian

			<br>

			<sup>**)</sup> Coret yang tidak perlu

			<br>Sanggup memenuhi persyaratan dan ketentuan proses pembayaran yang ditetapkan.

		</div>

		';		

		if ($totalID < $num) {

            $content .= '

                 <div class="html2pdf__page-break2"></div>  

            ';

        }


endwhile;		

	$content .='


</page>


';

$html2pdf->WriteHTML($content);

$html2pdf->pdf->setTitle($objectPrint->title_dokumen);

$html2pdf->Output('Data_Permohonan.pdf');

require_once('footer.php');

?>