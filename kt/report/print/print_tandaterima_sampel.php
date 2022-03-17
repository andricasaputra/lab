<?php

require_once ('header.php');

$file = explode('.', basename(__FILE__));

$set = $objectPrint->setNamaDokumen($file[0], 'kt', false);

$content ='

<style>

	.table1 {

		border-collapse:collapse;

		table-layout : fixed;

    	word-break: break-all;

	}

	

	td {

    	padding: 4px;

    	word-break: break-all;

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

		position: absolute;	

		margin-left: 400px;

		padding-top :865px;

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

            <span style="margin-left: 10px;"><i>'.$objectPrint->kode_dokumen.'</i></span>

        </div>

    </page_footer>		 ';


$content .= '

<div>';

	if(@$_GET['id'] !== ''){

		$tampil = $objectPrint->tampil(@$_GET['id']);

	}else {

		echo "<script>window.close()</script>";

       	exit;
	}

	while ($data=$tampil->fetch_object()):

		$bilangan = ucwords($objectNomor->bilangan($data->jumlah_sampel));

		$cara = $data->cara_pengiriman;

		$title = $objectPrint->title_dokumen.' | '.$data->no_permohonan;

$content .= '

		<div align="center">

			<strong>'.$objectPrint->title_dokumen.'</strong>

		</div>

		<p></p>

		<p>Telah diterima sampel untuk pengujian Laboratorium Karantina Tumbuhan<span style="text-decoration: line-through;">/Hewan dan Kehati Nabati/ Kehati Hewani</span>*) dengan data sebagai berikut:</p>



		<table border="0.7px" class="table1">

			<tr>

				<td width="220">

					<p>Tanggal Diterima</p>

				</td >

				<td width="18" align="center">

					<p>:</p>

				</td>

				<td width="350" >

					<p>'.$data->tanggal_permohonan.'</p>

				</td>

			</tr>



			<tr>

				<td width="220">

					<p>No./Tgl Surat</p>

				</td>

				<td width="18" align="center">

					<p>:</p>

				</td>

				<td width="316">

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

				<td width="220">

					<p>Nama Pelanggan</p>

				</td>

				<td width="18" align="center">

					<p>:</p>

				</td>

				<td width="316">

					<p>'.$data->pemohon.'</p>

				</td>

			</tr>



			<tr>

				<td width="220">

					<p>Alamat</p>

				</td>

				<td width="18" align="center">

					<p>:</p>

				</td>

				<td width="316">

					<p>'.$data->alamat_pemilik.'</p>

				</td>

			</tr>



			<tr>

				<td width="220">

				<p>	Nama Sampel</p>

				</td>

				<td width="18" align="center">

					<p>:</p>

				</td>

				<td width="316">

					<p>'.$data->nama_sampel.'&nbsp;(<em>'.$data->nama_ilmiah.'</em>)</p>

				</td>

			</tr>



			<tr>

				<td width="220">

					<p>Jenis Sampel/HS Code</p>

				</td>

				<td width="18" align="center">

					<p>:</p>

				</td>

				<td width="316">

					<p>'.$data->bagian_tumbuhan.''.$data->vektor.''.$data->media.'</p>

					

				</td>

			</tr>

		

			<tr>

				<td width="220">

				<p>Jumlah Sampel</p>

				</td>

				<td width="18" align="center">

					<p>:</p>

				</td>

				<td width="316">

					<p>'.$data->jumlah_sampel.'&nbsp;('.$bilangan.')&nbsp;'.$data->satuan.'</p>

				</td>

			</tr>



			<tr>

				<td width="220">

					<p>Jumlah Kontainer/ Lot</p>

				</td>

				<<td width="18" align="center">

					<p>:</p>

				</td>

				<td width="316">

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

				<td width="316">

					<p>

						

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

					</p>

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

			<p></p>



			Sumbawa Besar, '.$data->tanggal_diterima.'



			<br/>

			Penerima Sampel Pengujian<br/>

			Lab KT<span style="text-decoration: line-through;">/KH dan Kehati Nabati/Hewani</span>

			<p></p>

			<p></p>

			<p></p>


			('.$data->jabatan.')<br/>

			NIP. '.$data->nip_penerima_sampel.'

		</div>



			';

$a = $data->nama_sampel;

$b = $data->tanggal_diterima;				

endwhile;				

$content .='	

</div>	
	

</page>

';

$html2pdf->WriteHTML($content);

$html2pdf->pdf->setTitle($title);

$html2pdf->Output('Tanda_Terima_Sampel'.' '.$a.' '.$b.'.pdf');

require_once('footer.php');


?>