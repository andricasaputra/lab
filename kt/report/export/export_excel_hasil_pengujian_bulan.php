<?php

require_once ('header.php');

$awal = explode("-", $_POST['tgl_a']);

	$thn = $awal[0];

	$bln = $awal[1];

	$tanggal = $awal[2];

$sampai = explode("-", $_POST['tgl_b']);

	$thnb = $sampai[0];

	$blnb = $sampai[1];

	$tanggalb = $sampai[2];

$fileName = "Hasil_Pengujian-(".date('d-m-Y').").xls";

header("Content-Disposition: attachment; filename=\"$fileName\"");

header("Content-Type: application/vnd.ms-excel");

?>



<div>

	<center><h3>LAPORAN HASIL PENGUJIAN LABORATORIUM KARANTINA TUMBUHAN</h3>

	<h3><b>Tanggal <?php echo $tanggal.'-'.$bln.'-'.$thn ;?> s/d <?php echo $tanggalb.'-'.$blnb.'-'.$thnb ;?></b></h3></center>



<table border="1px">

				

					<tr>

						<th><b>No.</b></th>

						<th align="center"><b>Nama Sampel</b></th>

						<th align="right"><b>Nama Ilmiah</b></th>

			     		<th align="center"><b>Kode Sampel</b></th>

                        <th align="center"><b>No Sampel</b></th>

                        <th align="center"><b>Tanggal</b></th>

                        <th align="center"><b>Bagian Tumbuhan</b></th>

                        <th align="center"><b>Vektor</b></th>

                        <th align="center"><b>Media</b></th>

                        <th align="center"><b>Target Pengujian </b></th>

                        <th align="center"><b>Metode Pengujian</b></th>

                        <th align="center"><b>Positif/Negatif</b></th>

                        <th align="center"><b>Hasil Pengujian</b></th>

                        <th align="center"><b>Penyelia</b></th>

                        <th align="center"><b>NIP Penyelia</b></th>

                        <th align="center"><b>Analis</b></th>

                        <th align="center"><b>NIP Analis</b></th>

                        <th align="center"><b>No Sertifikat</b></th>

                        <th align="center"><b>Tanggal Sertifikat</b></th>

                        <th align="center"><b>Rekomendasi</b></th>

                        <th align="center"><b>Kepala/ PLH/ Manajer Teknis</b></th>

                        <th align="center"><b>NIP Manajer Teknis</b></th>

					</tr>

			

					

					<?php

					$no =1;

					if(@$_POST['export_data']){


						$tampil = $objectPrint->print_pertanggal_hasil2(@$_POST['tgl_a'], @$_POST['tgl_b']);

					}

					while ($data = $tampil->fetch_object()){

							$id = $data->id;

							$tampil2 = $objectPrint->print_pertanggal_sertifikat($id);

							while ($data2 = $tampil2->fetch_object()):

					echo "<tr>";

						echo "<td align=center>".$no++."</td>";

						echo "<td>".$data->nama_sampel."</td>";

						echo "<td>"."<em>".$data->nama_ilmiah."</em>"."</td>";

						echo "<td>".$data->kode_sampel."</td>";

						echo "<td>".$data2->no_sampel."</td>";

						echo "<td>".$data->tanggal_sertifikat."</td>";

						echo "<td>".$data->bagian_tumbuhan."</td>";

						echo "<td>".$data->vektor."</td>";

						echo "<td>".$data->media."</td>";

						echo "<td><i>".$data2->target_optk."<br>".$data2->target_optk2."<br>".$data2->target_optk3."</i></td>";

						echo "<td>".$data2->metode_pengujian."<br>".$data2->metode_pengujian2."<br>".$data2->metode_pengujian3."</td>";

						echo "<td>".$data2->positif_negatif."</td>";

						echo "<td><i>".$data2->hasil_pengujian."</i></td>";

						echo "<td>".$data->nama_penyelia."</td>";

						echo "<td>".$data->nip_penyelia."</td>";

						echo "<td>".$data->nama_analis."</td>";

						echo "<td>".$data->nip_analis."</td>";

						echo "<td>".$data->no_sertifikat."</td>";

						echo "<td>".$data->tanggal_sertifikat."</td>";

						echo "<td>".$data->rekomendasi."</td>";

						echo "<td>".$data->kepala_plh."</td>";

						echo "<td>".$data->nip_kepala_plh."</td>";

					echo "</tr>";	

						endwhile;

					}

					?>

			

</table>

</div>