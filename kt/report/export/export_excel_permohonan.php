<?php

require_once ('header.php');

$fileName = "Data_Permohonan-(".date('d-m-Y').").xls";

header("Content-Disposition: attachment; filename=\"$fileName\"");

header("Content-Type: application/vnd.ms-excel");

?>

<div>

	<center><h3>LAPORAN PERMOHONAN PENGUJIAN LABORATORIUM KARANTINA TUMBUHAN</h3>

	<h3><b>Semua Data</b></h3></center>



<table border="1px">

				

					<tr>

						<th><b>No.</b></th>

						<th><b>Nomor Permohonan</b></th>

						<th><b>Tanggal</b></th>

						<th><b>Nama Sampel</b></th>

						<th><b>Nama Ilmiah</b></th>

						<th><b>Jumlah Sampel</b></th>

						<th><b>Bagian tumbuhan</b></th>

						<th><b>Media</b></th>

						<th><b>Vektor</b></th>

						<th><b>Daerah Asal</b></th>

						<th><b>Target OPT/OPTK</b></th>

						<th><b>Metode Pengujian</b></th>

						<th><b>Nama Pemilik</b></th>

						<th><b>Alamat Pemilik</b></th>

						<th><b>Dokumen Pendukung</b></th>

						<th><b>Pemohon</b></th>

					</tr>

			

					

					<?php

					$no =1;

					$tampil = $objectData->tampil();

					while ($data = $tampil->fetch_object()){

					echo "<tr>";

						echo "<td align=center>".$no++."</td>";

						echo "<td>".$data->no_permohonan."</td>";

						echo "<td>".$data->tanggal_permohonan."</td>";

						echo "<td>".$data->nama_sampel."</td>";

						echo "<td><em>".$data->nama_ilmiah."</em></td>";

						echo "<td>".$data->jumlah_sampel.'&nbsp;'.$data->satuan."</td>";

						echo "<td>".$data->bagian_tumbuhan."</td>";

						echo "<td>".$data->media."</td>";

						echo "<td>".$data->vektor."</td>";

						echo "<td>".$data->daerah_asal."</td>";

						if ($data->target_optk2 !== '') {

							echo "<td><em>".$data->target_optk. " & " .$data->target_optk2."</em></td>";

						}elseif ($data->target_optk3 !== '') {

							echo "<td><em>".$data->target_optk. ", " .$data->target_optk2. ", " .$data->target_optk3."</em></td>";
							
						}else{
							echo "<td><em>".$data->target_optk."</em></td>";
						}

						echo "<td>".$data->metode_pengujian. "&nbsp;" .$data->metode_pengujian2. "&nbsp;" .$data->metode_pengujian3."</td>";

						echo "<td>".$data->nama_pemilik."</td>";

						echo "<td>".$data->alamat_pemilik."</td>";

						echo "<td>".$data->dokumen_pendukung."</td>";

						echo "<td>".$data->pemohon."</td>";

					echo "</tr>";	

					}

					?>

			

</table>

</div>
