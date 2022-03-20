<?php

require_once ('header.php');

$file = explode('.', basename(__FILE__));

$set = $objectPrint->setNamaDokumen($file[0], 'kt', false);

$content ='

<style>


	.table {

		border-collapse:collapse;

	}


	td {

    	padding: 4px;

	}

	div#garis {

		width: 90%;

		margin:auto;

		margin-left:-3px;

		padding-bottom: 20px

	}


	hr {

	    border: none;

	    height: 1px;

	    color: black; 

	    background-color: black;

    }


	div#lower{

		position: relative;	

		margin-left: 400px;

		padding-top :-10px;

	}


	#judul{

		position: relative;

		text-align:center;

		margin-left:auto;

		margin-right:auto;

	}


	.html2pdf__page-break2 {

      	height: 2000px;

    }

 

</style>


<page backtop="35mm" backleft="12mm" backright="10mm" backbottom="10mm">

	 <page_header> 

		<div align="center">

			<strong><img src="'.$logo.'" width="698px; height:150px"></strong>

		</div>

	</page_header>

	<page_footer>

        <div id="garis">

            <hr width="75%">

            <span style="margin-left: 10px;"><i>'.str_replace('T;', ';', $objectPrint->kode_dokumen).'</i></span>

        </div>

    </page_footer>';


	if(@$_POST['print_data']){

		$tampil = $objectPrint->print_pertanggal(@$_POST['tgl_a'], @$_POST['tgl_b']);

	}else {

		echo "<script>window.close()</script>";

        exit;

	}

	if ($tampil->num_rows === 0) {
        echo '<script>alert("Tidak Ada Data Untuk Di Cetak! Periksa Kembali Pemilihan Tanggal");window.close();</script>';
        return false;
    }

    $num = $tampil->num_rows;

    $arrID = array();

	while ($data=$tampil->fetch_object()):

	$bilangan = ucwords($objectNomor->bilangan($data->jumlah_sampel));

		$cara = $data->cara_pengiriman;

		$arrID[] = $data->id;

        $totalID = count($arrID);

$content .= '

		<div align="center" id="judul">

			<strong>'.$objectPrint->title_dokumen.'</strong>

		</div>

		<p></p>

		<p>Telah diterima sampel untuk pengujian Laboratorium Karantina Tumbuhan<span style="text-decoration: line-through;">/Hewan dan Kehati Nabati/ Kehati Hewani</span>*) dengan data sebagai berikut:</p>



		<table border="0.7px" class="table">

			<tr>

				<td width="201">

					<p>Tanggal Diterima</p>

				</td >

				<td width="18" align="center">

					<p>:</p>

				</td>

				<td width="400" >

					<p>'.$data->tanggal_permohonan.'</p>

				</td>

			</tr>



			<tr>

				<td width="201">

					<p>No./Tgl Surat</p>

				</td>

				<td width="18" align="center">

					<p>:</p>

				</td>

				<td width="330">

					<p>'.$data->no_permohonan.'</p>

					

				</td>

			</tr>



			<tr>

				<td  style="border-bottom:0px; padding-bottom: 50px">

					<p>Cara Pengirim Sampel</p>

				</td>

				<td style="border-bottom:0px; text-align: center">

					<p>:</p>

				</td>

				<td style="border-bottom:0px; ">



				';



				if ($cara == 'Diantar Langsung') { 



					$content .='

					

					<p><img src="'.$checkfix.'" style="width: 15px">   '.$data->cara_pengiriman.', Pengantar : .......................................</p>  ';

					

				}else{ 



					$content .='



					<p><img src="'.$boxfix.'" style="width: 15px">   '.$data->cara_pengiriman.', Pengantar : .......................................</p>  ';

				}



				$content .='

					<p></p><br>

					<div style="width: 150px; text-align: center; margin-right: 0px;margin-left:200px">('.$data->pengantar.')</div>

				</td>

			</tr>



			<tr>



				<td style="border-top:0px">

					

				</td>

				<td style="border-top:0px; text-align: center">

					

				</td>

				<td style="border-top:0px;">	



				';



				if ($cara == 'Jasa Pos/Paket/Kurir') { 



					$content .='

					

					<img src="'.$checkfix.'" style="width: 15px">  Jasa Pos/Paket/Kurir : .................................................... ';

					

				}else{ 



					$content .='



					<img src="'.$boxfix.'" style="width: 15px">  Jasa Pos/Paket/Kurir : .................................................... ';

				}



				$content .='

						

				</td>

			</tr>



			<tr>

				<td width="201">

					<p>Nama Pelanggan</p>

				</td>

				<td width="18" align="center">

					<p>:</p>

				</td>

				<td width="330">

					<p>'.$data->pemohon.'</p>

				</td>

			</tr>



			<tr>

				<td width="201">

					<p>Alamat</p>

				</td>

				<td width="18" align="center">

					<p>:</p>

				</td>

				<td width="330">

					<p>'.$data->alamat_pemilik.'</p>

				</td>

			</tr>



			<tr>

				<td width="201">

				<p>	Nama Sampel</p>

				</td>

				<td width="18" align="center">

					<p>:</p>

				</td>

				<td width="330">

					<p>'.$data->nama_sampel.'&nbsp;(<em>'.$data->nama_ilmiah.'</em>)</p>

				</td>

			</tr>



			<tr>

				<td width="201">

					<p>Jenis Sampel/HS Code</p>

				</td>

				<td width="18" align="center">

					<p>:</p>

				</td>

				<td width="330">

					<p>'.$data->bagian_tumbuhan.''.$data->vektor.''.$data->media.'</p>

					

				</td>

			</tr>

		

			<tr>

				<td width="201">

				<p>Jumlah Sampel</p>

				</td>

				<td width="18" align="center">

					<p>:</p>

				</td>

				<td width="330">

					<p>'.$data->jumlah_sampel.'&nbsp;('.$bilangan.')&nbsp;'.$data->satuan.'</p>

				</td>

			</tr>



			<tr>

				<td width="201">

					<p>Jumlah Kontainer/ Lot</p>

				</td>

				<<td width="18" align="center">

					<p>:</p>

				</td>

				<td width="330">

					<p>'.$data->jumlah_kontainer.'</p>

				</td>



			</tr>



			<tr>

			

				<td width="220">

					<p>Target Pengujian</p>

				</td>

				<td width="18" align="center">

					<p>:</p>

				</td>

				<td width="330">

						

				';



				// Target OPTK Ke 2 Terisi



					if ($data->target_optk2 !== '' && $data->target_optk3 == '') {



						// Jenis/ Kelompok OPTK Target Pengujian Ke 2 Kosong

							

						if ($data->nama_patogen2 =='') {



							$content .='



							<p>



							<b>'.$data->nama_patogen.'</b>&nbsp;&nbsp;(<em>'.$data->target_optk.' & '.$data->target_optk2.'</em>)



							</p>



							';



						// Jenis/ Kelompok OPTK Target Pengujian Ke 2 Terisi



						}else{



							$content .='



							<p>



							<b>'.$data->nama_patogen.'</b>&nbsp;&nbsp;(<em>'.$data->target_optk.'</em>)



							<br>



							<b>'.$data->nama_patogen2.'</b>&nbsp;&nbsp;(<em>'.$data->target_optk2.'</em>)  



							</p>



							';



						}



					// Target OPTK Ke 3 Terisi



					}elseif($data->target_optk3 !==''){



						// Jenis/ Kelompok OPTK Target Pengujian Ke 2 dan ke 3 Kosong 



						if ($data->nama_patogen2 =='' && $data->nama_patogen3 == '') {



							$content .='



							<p>



							<b>'.$data->nama_patogen.'</b>&nbsp;&nbsp;(<em>'.$data->target_optk.', '.$data->target_optk2.', '.$data->target_optk3.'</em>)



							</p>



							';



						// Jenis/ Kelompok OPTK Target Pengujian ke 3 Kosong tetapi target pengujian OPTK ke 2 terisi 



						}elseif($data->nama_patogen3 =='' && $data->nama_patogen2 !==''){



							$content .='



							<p>



							<b>'.$data->nama_patogen.'</b>&nbsp;&nbsp;(<em>'.$data->target_optk.'</em>)



							<br>



							<b>'.$data->nama_patogen2.'</b>&nbsp;&nbsp;(<em>'.$data->target_optk2.' & '.$data->target_optk3.'</em>)



							</p>



							';



						// Jenis/ Kelompok OPTK Target Pengujian ke 3 Terisi tetapi target pengujian OPTK ke 2 kosong



						}elseif($data->nama_patogen3 !== '' && $data->nama_patogen2 ==''){





							$content .='



							<p>



							<b>'.$data->nama_patogen.'</b>&nbsp;&nbsp;(<em>'.$data->target_optk.', '.$data->target_optk2.'</em>)



							<br>



							<b>'.$data->nama_patogen3.'</b>&nbsp;&nbsp;(<em>'.$data->target_optk3.'</em>) 



							</p>



							';



						// Jenis/ Kelompok OPTK Target Pengujian ke 2 dan ke 3 Terisi + target optk 1



						}else{



							$content .='



							<p>



							<b>'.$data->nama_patogen.'</b>&nbsp;&nbsp;(<em>'.$data->target_optk.'</em>)



							<br>



							<b>'.$data->nama_patogen2.'</b>&nbsp;&nbsp;(<em>'.$data->target_optk2.'</em>)  



							<br>



							<b>'.$data->nama_patogen3.'</b>&nbsp;&nbsp;(<em>'.$data->target_optk3.'</em>) 



							</p>



							';



						}



					}else{



						// Hanya 1 Target OPTK terisi



						$content .='



						<p><b>'.$data->nama_patogen.'</b>&nbsp;&nbsp;(<em>'.$data->target_optk.'</em>)</p> 



						';



					}



				$content .='

				</td>

			</tr>

		

			<tr>

				

				<td width="201">

					<p>Metode Pengujian</p>

				</td>

				<td width="18" align="center">

					<p>:</p>

				</td>

				<td width="330">

					<p>

					';



					if ($data->metode_pengujian2 !=='') {

						$content .='



						'.$data->metode_pengujian.'

					<br>'.$data->metode_pengujian2.'



						';

					}elseif($data->metode_pengujian3 !==''){



						$content .='



						'.$data->metode_pengujian.'

					<br>'.$data->metode_pengujian2.'

					<br>'.$data->metode_pengujian3.'



						';



					}else{



						$content .='



						'.$data->metode_pengujian.'



						';

					}



					$content .= '

					

					

					</p>

				</td>

			</tr>

		

			<tr>

				<td width="201">

					<p>Lama Pengujian</p>

				</td>

				<td width="18" align="center">

					<p>:</p>

				</td>

				<td width="330">

					<p>

					';



					if ($data->lama_pengujian2 !=='') {

						$content .='



						'.$data->lama_pengujian.'

					<br>'.$data->lama_pengujian2.'



						';

					}elseif($data->lama_pengujian3 !==''){



						$content .='



						'.$data->lama_pengujian.'

					<br>'.$data->lama_pengujian2.'

					<br>'.$data->lama_pengujian3.'



						';



					}else{



						$content .='



						'.$data->lama_pengujian.'



						';

					}



					$content .= '

					

					

					</p>

				</td>

			</tr>

			

		</table>

		<p></p>





		<div>

			Keterangan: <sup>*)</sup> Coret yang tidak perlu

		</div>

		<div  id="lower">

		<br>



			Sumbawa Besar, '.$data->tanggal_diterima.'



			<br/>

			Penerima Sampel Pengujian<br/>

			Lab KT<span style="text-decoration: line-through;">/KH dan Kehati Nabati/Hewani</span>

			<p></p>

			<p></p>

			<br>

			

			('.$data->jabatan.')<br/>

			NIP. '.$data->nip_penerima_sampel.'

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

$html2pdf->Output('Tanda_Terima_Sampel.pdf');

require_once('footer.php');



?>