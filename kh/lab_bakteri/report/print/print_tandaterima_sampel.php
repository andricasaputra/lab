<?php

require_once ('header.php');

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

			<strong><img src='.$logo.' width="698px; height:150px"></strong>

		</div>

	</page_header>

	<page_footer>

        <div id="garis">

            <hr width="75%">

            <span style="margin-left: 10px;"><i>F.4.1.1 2; Ter.1; Rev.1;01/02/2018</i></span>

        </div>

    </page_footer>		 ';



$content .= '

<div>';

				

	if(@$_GET['id'] !== ''){

		$tampil = $objectPrint->tampil(@$_GET['id']);

	}else {

		$tampil=$objectPrint->tampil();
		exit;

	}

	$rtitle = "tanda terima sampel";

	while ($data=$tampil->fetch_object()){

		$cara = $data->cara_pengiriman;

		$title = ucwords($rtitle).' | '.$data->no_permohonan;

$content .= '

		<div align="center">

			<strong>'.strtoupper($rtitle).'</strong>

		</div>

		<p></p>

		<p>Telah diterima sampel untuk pengujian Laboratorium Karantina <span style="text-decoration: line-through;">Tumbuhan/</span>Hewan dan<span style="text-decoration: line-through;"> Kehati Nabati/ </span>Kehati Hewani*) dengan data sebagai berikut:</p>



		<table border="0.7px" class="table1">

			<tr>

				<td width="220">

					<p>Tanggal Diterima</p>

				</td >

				<td width="18" align="center">

					<p>:</p>

				</td>

				<td width="350" >

					<p>'.$data->tanggal_diterima.' / '.$data->jam_diterima.'</p>

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

					

					<p><img src='.$checkfix.' style="width: 15px">   '.$data->cara_pengiriman.', Pengantar : .......................................</p>  ';

					

				}else{ 



					$content .='



					<p><img src='.$boxfix.' style="width: 15px">   '.$data->cara_pengiriman.', Pengantar : .......................................</p>  ';

				}



				$content .='

				<p></p><br>

					<div style="width: 150px; text-align: center; margin-right: 0px;margin-left:200px">('.$data->nama_pengirim.')</div>

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

					

					<img src='.$checkfix.' style="width: 15px">  Jasa Pos/Paket/Kurir : .................................................... ';

					

				}else{ 



					$content .='



					<img src='.$boxfix.' style="width: 15px">  Jasa Pos/Paket/Kurir : .................................................... ';

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

					<p>'.$data->nama_pemilik.'</p>

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

					<p>'.$data->nama_sampel.'</p>

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

					<p>'.$data->bagian_hewan.'&nbsp;('.$data->no_sampel_awal.')</p>

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

					<p>'.$data->jumlah_sampel.'</p>

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

					<p><em>'.$data->target_pengujian2.'</em></p>

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

					<p>'.$data->metode_pengujian.'</p>

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

					<p>'.$data->lama_pengujian.'</p>

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

			Lab <span style="text-decoration: line-through;">KT</span>/KH dan Kehati <span style="text-decoration: line-through;">Nabati/</span>Hewani

			<p></p>

			<p></p>

			<br>



			

			('.$data->penerima_sampel.')<br/>

			NIP. '.$data->nip_penerima_sampel.'

		</div>



			';

$a = $data->nama_sampel;

$b = $data->tanggal_diterima;				

}				

$content .='	

</div>	


</page>

';

$html2pdf->WriteHTML($content);

$html2pdf->pdf->setTitle($title);

$html2pdf->Output('Tanda_Terima_Sampel'.' '.$a.' '.$b.'.pdf');

require_once('footer.php');


?>