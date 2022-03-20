<?php

require_once ('header.php');

$fileName = "Hasil_Pengujian-(".date('d-m-Y').").xls";

header("Content-Disposition: attachment; filename=\"$fileName\"");

header("Content-Type: application/vnd.ms-excel");

?>



<div>

	<center>
		<h3>LAPORAN HASIL PENGUJIAN LABORATORIUM KARANTINA HEWAN</h3>
		<h4>Semua</h4>
	</center>

<table border="1px">

				

<tr>

	<th><b>No.</b></th>

	<th align="center"><b>Nomor Permohonan</b></th>

    <th align="center"><b>Tanggal_permohonan</b></th>

    <th align="center"><b>Tanggal Selesai</b></th>

	<th align="center"><b>No lhu</b></th>

	<th align="center"><b>No Agenda</b></th>

	<th align="center"><b>Nama Sampel</b></th>

    <th align="center"><b>Bagian Hewan</b></th>

    <th align="center"><b>Target Pengujian </b></th>

    <th align="center"><b>Metode Pengujian</b></th>

    <th align="center"><b>Hasil Pengujian</b></th>

    <th align="center"><b>Kepala/Plh</b></th>

    <th align="center"><b>NIP Kepala/Plh</b></th>

</tr>





<?php

$no =1;

$tampil = $objectExport->exportSuratHasilUji();

while ($data = $tampil->fetch_object()):

echo "<tr>";

	echo "<td align=center>".$no++."</td>";

	echo "<td>".$data->no_permohonan."</td>";

	echo "<td>".$data->tanggal_permohonan."</td>";

	echo "<td>".$data->tanggal_lhu."</td>";

	echo "<td>".$data->no_lhu."</td>";

	echo "<td>".$data->no_agenda."</td>";

	echo "<td>".$data->nama_sampel."</td>";

	echo "<td>".$data->bagian_hewan."</td>";

	echo "<td><i>".$data->target_pengujian2."</i></td>";

	echo "<td>".$data->metode_pengujian."</td>";

	echo "<td>".$data->positif_negatif."</td>";

	echo "<td>".$data->kepala_plh2."</td>";

	echo "<td>".$data->nip_kepala_plh2."</td>";

echo "</tr>";	

endwhile;

?>

			

</table>

</div>