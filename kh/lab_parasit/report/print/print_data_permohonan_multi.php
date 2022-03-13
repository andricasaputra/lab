<?php

require_once ('header.php');

$footer = trim("F.4.1.1.1 H; Ter.4; Rev.0; 12/01/2022");

$content ='

<style>



	div#lower{

	margin-left: 370px;

	}

	div#lower2{

	margin-left: 370px;

	}



	div#logo{

	margin-left: 0px;

	}

	#garis, hr {

        width: 93%;

        margin-left: 10px;

    }

    .html2pdf__page-break2 {

      height: 2000px;

    }

</style>

';

$content .= '

<page backtop="35mm" backleft="12mm" backright="10mm" backbottom="10mm">

	 <page_header> 

		<div id="logo">

			<img src='.$logoskpbiasa.' width="744px; height:132px">

		</div>

	</page_header>

	<page_footer>

        <div id="garis">

            <hr width="75%">

            <span style="margin-left: 10px;"><i>'.$footer.'</i></span>

        </div>

    </page_footer> ';
		
	if(@$_POST['print_data']){

		$tampil = $objectPrint->print_pertanggal(@$_POST['tgl_a'], @$_POST['tgl_b']);

	}else {

		$tampil = $objectPrint->tampil();
		exit();

	}

	$rtitle = "permohonan pengujian laboratorium karantina hewan";

	$title = ucwords($rtitle);

	$num = $tampil->num_rows;

    $arrID = array();

	while ($data = $tampil->fetch_object()):

		$satuan = $data->satuan;
		$arrID[] = $data->id;
        $totalID = count($arrID);

		
$content .= '

		<div align="center">



			<strong><u>'.strtoupper($rtitle).'</u></strong>

			<br> Nomor: '.$data->no_permohonan.', Tanggal: '.$data->tanggal_permohonan.'

		</div>

		<p></p>

		<div>

			Kepada Yth :

			<br>

			<strong>Kepala Stasiun Karantina Pertanian Kelas I Sumbawa Besar</strong>

			<br> Jalan Pelabuhan Badas No.1 Sumbawa Besar NTB 84351

			<br> di-

			<p style="text-indent: 0.2in;">

				Sumbawa Besar

			</p>

		</div>

		<p style="text-indent: 0.5in;">Bersama ini disampaikan permohonan pengujian/pemeriksaan sampel/media pembawa HPH/HPHK, dengan identitas sebagai berikut:</p>



		<table>

			<tr>

				<td width="24">

					<p>I.</p>

				</td>

				<td width="234">

					<p>Keterangan Sampel/Media pembawa</p>

				</td>

				<td width="18">

					<p></p>

				</td>



			</tr>



		</table>



		<table>



			<tr>

				<td width="24">

					<p>1.</p>

				</td>

				<td width="234">

					<p>Nama Sampel/Media pembawa</p>

				</td>

				<td width="18">

					<p>:</p>

				</td>

				<td width="316">

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

					Jumlah Sampel/Media Pembawa

				</td>

				<td width="18">

					:

				</td>

				<td width="316">

					'.$data->jumlah_sampel.'&nbsp;&nbsp;&nbsp;(<b>'.$data->no_sampel_awal.'</b>)&nbsp;&nbsp;&nbsp;&nbsp;
					';

					if ($satuan == 'gram') {

						$content .='


						(g/<span style="text-decoration: line-through;">kg/koli/Tbg/Sachet/Slide</span>**)


						';


					}elseif($satuan == 'kilogram'){

						$content .='


						(<span style="text-decoration: line-through;">g</span>/kg/<span style="text-decoration: line-through;">koli/Tbg/Sachet/Slide</span>**)


						';

					}elseif($satuan == 'koli'){

						$content .='


						(<span style="text-decoration: line-through;">g/kg</span>/koli/<span style="text-decoration: line-through;">Tbg/Sachet/Slide</span>**)


						';

					}elseif($satuan == 'tabung'){

						$content .='


						(<span style="text-decoration: line-through;">g/kg/koli</span>/Tbg<span style="text-decoration: line-through;">/Sachet/Slide</span>**)


						';

					}elseif($satuan == 'sachet'){

						$content .='


						(<span style="text-decoration: line-through;">g/kg/koli/Tbg</span>/Sachet<span style="text-decoration: line-through;">/Slide</span>**)


						';

					}elseif($satuan == 'slide'){

						$content .='


						(<span style="text-decoration: line-through;">g/kg/koli/Tbg/Sachet</span>/Slide**)

						';
						
					}else{

						$content .='


						(g/kg/koli/Tbg/Sachet/Slide**)

						';
						
					}


					$content.='

					

				</td>

			</tr>

		</table>

		<table>

			<tr>

				<td width="24">

					3.

				</td>

				<td width="234">

					Jenis sampel/Media pembawa

				</td>

				<td width="18">

					:

				</td>

				<td width="316">&nbsp;</td>

			</tr>

			<tr>

				<td width="24">&nbsp;</td>

				<td width="234">

					&middot; Bagian Hewan

				</td>

				<td width="18">

					:

				</td>

				<td width="316">

				';



					if ($data->bagian_hewan == 'Serum') {

						$content .='

							<img src='.$checkfix.' style="width: 15px">&nbsp;&nbsp;Serum

						';

					}else{

						$content .='

							<img src='.$boxfix.' style="width: 15px">&nbsp;&nbsp;Serum

						';

					}



					if ($data->bagian_hewan == 'Darah') {

						$content .='

							<span style="margin-left: 25px"><img src='.$checkfix.' style="width: 15px">&nbsp;&nbsp;Darah</span>

						';

					}else{

						$content .='

							<span style="margin-left: 25px"><img src='.$boxfix.' style="width: 15px">&nbsp;&nbsp;Darah</span>

						';

					}



					if ($data->bagian_hewan == 'Urine') {

						$content .='

							<span style="margin-left: 10px"><img src='.$checkfix.' style="width: 15px">&nbsp;&nbsp;Urine</span>

						';

					}else{

						$content .='

							<span style="margin-left: 10px"><img src='.$boxfix.' style="width: 15px">&nbsp;&nbsp;Urine</span>

						';

					}



					if ($data->bagian_hewan == 'Feses') {

						$content .='

							<span style="margin-left: 10px"><img src='.$checkfix.'  style="width: 15px">&nbsp;&nbsp;Feses</span>

						';

					}else{

						$content .='

							<span style="margin-left: 10px"><img src='.$boxfix.'  style="width: 15px">&nbsp;&nbsp;Feses</span>

						';

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

				<td width="316">

				';



					if ($data->bagian_hewan == 'Kadaver') {

						$content .='

							<img src='.$checkfix.' style="width: 15px">&nbsp;&nbsp;Kadaver

						';

					}else{

						$content .='

							<img src='.$boxfix.' style="width: 15px">&nbsp;&nbsp;Kadaver

						';

					}



					if ($data->bagian_hewan == 'Swab') {

						$content .='

							<span style="margin-left: 15px"><img src='.$checkfix.' style="width: 15px">&nbsp;&nbsp;Swab</span>

						';

					}else{

						$content .='

							<span style="margin-left: 15px"><img src='.$boxfix.' style="width: 15px">&nbsp;&nbsp;Swab</span>

						';

					}



					if ($data->bagian_hewan == 'Organ') {

						$content .='

							<span style="margin-left: 12px"><img src='.$checkfix.' style="width: 15px">&nbsp;&nbsp;Organ</span>

						';

					}else{

						$content .='

							<span style="margin-left: 12px"><img src='.$boxfix.' style="width: 15px">&nbsp;&nbsp;Organ</span>

						';

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

				<td width="316">

					';

					if ($data->bagian_hewan == 'Eksudat') {

						$content .='

							<img src='.$checkfix.' style="width: 15px">&nbsp;&nbsp;Eksudat ......................

						';

					}else{

						$content .='

							<img src='.$boxfix.' style="width: 15px">&nbsp;&nbsp;Eksudat ......................

						';

					}



					if ($data->bagian_hewan == 'Kerokan Kulit') {

						$content .='

							<span style="margin-left: 3px"><img src='.$checkfix.' style="width: 15px">&nbsp;&nbsp;Kerokan Kulit</span>

						';

					}else{

						$content .='

							<span style="margin-left: 3px"><img src='.$boxfix.' style="width: 15px">&nbsp;&nbsp;Kerokan Kulit</span>

						';

					}





					$content .='



					 

					 

				</td>

			</tr>

			<tr>

				<td width="24">&nbsp;</td>

				<td width="234">

				</td>

				<td width="18">

					:

				</td>

				<td width="316">

				';

				if ($data->bagian_hewan == 'Kulit') {

						$content .='

							<img src='.$checkfix.' style="width: 15px">&nbsp;&nbsp;Kulit

						';

					}else{

						$content .='

							<img src='.$boxfix.' style="width: 15px">&nbsp;&nbsp;Kulit

						';

					}



				if ($data->bagian_hewan == 'Bagian Lain') {

						$content .='

							<span style="margin-left: 39px"><img src='.$checkfix.' style="width: 15px">&nbsp;&nbsp;Bagian Lain : ...............</span>

						';

					}else{

						$content .='

							<span style="margin-left: 39px"><img src='.$boxfix.' style="width: 15px">&nbsp;&nbsp;Bagian Lain : ...............</span>

						';

					}



				$content .='



					 

					 

					

				</td>

			</tr>

			<tr>

				<td width="24">&nbsp;

				</td>

				<td width="234">

					&middot; Produk Hewan

				</td>

				<td width="18">

					:

				</td>

				<td width="316">

					'.$data->produk_hewan.'

				</td>

			</tr>

			<tr>

				<td width="24">

					4.

				</td>

				<td width="234">

					Metode Pengujian HPH/HPHK

				</td>

				<td width="18">

					:

				</td>

				<td width="316">

					'.$data->metode_pengujian.'

				</td>

			</tr>

			<tr>

				<td width="24">

					5.

				</td>

				<td width="234">

					Biaya Pengujian

				</td>

				<td width="18">

					:

				</td>

				<td width="316">

					'.$data->biaya_pengujian.'

				</td>

			</tr>

			<tr>

				<td width="24">

					6.

				</td>

				<td width="234">

					Waktu Pengambilan Sampel

				</td>

				<td width="18">

					:

				</td>

				<td width="316">

					'.$data->waktu_pengambilan_sampel.' &nbsp;&nbsp;&nbsp;&nbsp; (Tanggal/Bulan/Tahun) 

				</td>

			</tr>

		

			<tr>

				<td width="24">

					7.

				</td>

				<td width="234">

				Negara/Area Asal

				</td>

				<td width="18">

					:

				</td>

				<td width="316">

					'.$data->area_asal.'

				</td>

			</tr>

			<tr>

				<td width="24">

					8.

				</td>

				<td width="234">

				Metode Pengambilan Sampel

				</td>

				<td width="18">

					:

				</td>

				<td width="316">

				';

					if ($data->cara_pengambilan_sampel == 'Random') {

						$content .='

							<img src='.$checkfix.' style="width: 15px">&nbsp;&nbsp;Random

						';

					}else{

						$content .='

							<img src='.$boxfix.' style="width: 15px">&nbsp;&nbsp;Random

						';

					}



					if ($data->cara_pengambilan_sampel == 'Sistematis') {

						$content .='

							<span style="margin-left: 20px"><img src='.$checkfix.'  style="width: 15px">&nbsp;&nbsp;Sistematis</span>

						';

					}else{

						$content .='

							<span style="margin-left: 20px"><img src='.$boxfix.'  style="width: 15px">&nbsp;&nbsp;Sistematis</span>

						';

					}



					if ($data->cara_pengambilan_sampel == 'Cluster') {

						$content .='

							<span style="margin-left: 10px"><img src='.$checkfix.' style="width: 15px">&nbsp;&nbsp;Cluster</span>

						';

					}else{

						$content .='

							<span style="margin-left: 10px"><img src='.$boxfix.' style="width: 15px">&nbsp;&nbsp;Cluster</span>

						';

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

				<td width="316">

				';

					if ($data->cara_pengambilan_sampel == 'Tahapan Grand') {

						$content .='

							<img src='.$checkfix.' style="width: 15px">&nbsp;&nbsp;Tahapan Grand

						';

					}else{

						$content .='

							<img src='.$boxfix.' style="width: 15px">&nbsp;&nbsp;Tahapan Grand

						';

					}



					$content .='

					 

				</td>

			</tr>

			<tr>

				<td width="24">

					9.

				</td>

				<td width="234">

				Target Pengujian/Golongan

				</td>

				<td width="18">

					:

				</td>

				<td width="360">

					';

					if ($data->target_pengujian == 'Viral') {

						$content .='

							<span style="margin-left: 0px"><img src='.$checkfix.' style="width: 15px">&nbsp;&nbsp;Viral</span>

						';

					}else{

						$content .='

							<span style="margin-left: 0px"><img src='.$boxfix.' style="width: 15px">&nbsp;&nbsp;Viral</span>

						';

					}



					if ($data->target_pengujian == 'Mikal') {

						$content .='

							<span style="margin-left: 44px"><img src='.$checkfix.'  style="width: 15px">&nbsp;&nbsp;Mikal</span>

						';

					}else{

						$content .='

							<span style="margin-left: 44px"><img src='.$boxfix.'  style="width: 15px">&nbsp;&nbsp;Mikal</span>

						';

					}



					if ($data->target_pengujian == 'Bakterial') {

						$content .='

							<span style="margin-left: 27px"><img src='.$checkfix.' style="width: 15px">&nbsp;&nbsp;Bakterial</span>

						';

					}else{

						$content .='

							<span style="margin-left: 27px"><img src='.$boxfix.' style="width: 15px">&nbsp;&nbsp;Bakterial</span>

						';

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

				<td width="350">

				';

					if ($data->target_pengujian == 'Parasit') {

						$content .='

							<img src='.$checkfix.' style="width: 15px">&nbsp;&nbsp;Parasit

						';

					}else{

						$content .='

							<img src='.$boxfix.' style="width: 15px">&nbsp;&nbsp;Parasit

						';

					}



					if ($data->target_pengujian == 'Patologi') {

						$content .='

							<span style="margin-left: 29px"><img src='.$checkfix.' style="width: 15px">&nbsp;&nbsp;Patologi</span>

						';

					}else{

						$content .='

							<span style="margin-left: 29px"><img src='.$boxfix.' style="width: 15px">&nbsp;&nbsp;Patologi</span>

						';

					}



					if ($data->target_pengujian == 'Kehati hewani') {

						$content .='

							<span style="margin-left: 10px"><img src='.$checkfix.' style="width: 15px">&nbsp;&nbsp;Kehati hewani</span>

						';

					}else{

						$content .='

							<span style="margin-left: 10px"><img src='.$boxfix.' style="width: 15px">&nbsp;&nbsp;Kehati hewani</span>

						';

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

				<td width="316">

				';



					if ($data->target_pengujian == 'Toksikologi') {

						$content .='

							<img src='.$checkfix.' style="width: 15px">&nbsp;&nbsp;Toksikologi

						';

					}else{

						$content .='

							<img src='.$boxfix.' style="width: 15px">&nbsp;&nbsp;Toksikologi

						';

					}



					if ($data->target_pengujian == 'Biologi Molekuler') {

						$content .='

							<span style="margin-left: 4px"><img src='.$checkfix.' style="width: 15px">&nbsp;&nbsp;Biologi Molekuler</span>

						';

					}else{

						$content .='

							<span style="margin-left: 4px"><img src='.$boxfix.' style="width: 15px">&nbsp;&nbsp;Biologi Molekuler</span>

						';

					}



				$content .='

					  

				</td>

			</tr>

			<tr>

				<td width="24">

					10.

				</td>

				<td width="234">

					Lama Waktu Pengujian

				</td>

				<td width="18">

					:

				</td>

				<td width="316">

					'.$data->lama_pengujian.'

				</td>

			</tr>



		</table>

		<br>

		<table>

			<tr>

				<td width="24">

					II.

				</td>

				<td width="234">

					Identitas Pemilik

				</td>

				<td width="18">

					

				</td>



			</tr>



		</table>

		

		<table>



			<tr>

				<td width="24">

					1.

				</td>

				<td width="234">

					Nama Pemilik/Perusahaan/Kuasa

				</td>

				<td width="16">

					:

				</td>

				<td width="316">

					'.$data->nama_pemilik.'

				</td>

			</tr>

			<tr>

				<td width="24">

					2.

				</td>

				<td width="234">

					Alamat Pemilik/Perusahaan/Kuasa

				</td>

				<td width="16">

					:

				</td>

				<td width="316">

					'.$data->alamat_pemilik.'

				</td>

			</tr>



		</table>

		<br>

		<table>



			<tr>

				<td width="24">

					III.

				</td>

				<td width="234">

					Dokumen Pendukung

				</td>

				<td width="18">

					:

				</td>

				<td width="316">

					'.$data->dokumen_pendukung.'

				</td>

			

			</tr>

		</table>

		<table>



				<tr>

				<td >

					<span style="font-size : 9pt">Dengan ini menyatakan sanggup memenuhi persyaratan dan ketentuan yang telah ditetapkan oleh laboratorium penguji.</span>

				</td>



			</tr>

			

		</table>



		<div  id="lower"  align="center">

		<br>

			Pemohon/Pelanggan

			<p></p>

			<p></p>

			<p></p>

			

			'.$data->pemohon.'<br/>

			

		</div>

		<div id="lower2"  align="center">NIP. '.$data->nip_pemohon.'</div>



		<div style="font-size: 9pt">

		<br>			

			Keterangan:

			<br>

			<sup>*)</sup> Diisi sesuai dengan jenis pengujian

			<br>

			<sup>**)</sup> Coret yang tidak perlu

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

$html2pdf->pdf->setTitle($title);

$html2pdf->Output('Data_Permohonan.pdf');

require_once('footer.php');


?>