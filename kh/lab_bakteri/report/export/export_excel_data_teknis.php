<?php

require_once ('header.php');

$fileName = "Data_Teknis_Pengujian-(".date('d-m-Y').").xls";

header("Content-Disposition: attachment; filename='$fileName'");

header("Content-Type: application/vnd.ms-excel");

?>

<div>

	<center>
		<h3>DATA TEKNIS PENGUJIAN LABORATORIUM KARANTINA HEWAN</h3>
		<h4>Semua</h4>
	</center>


<table border="1px">
			

<tr>

	<th><b>No.</b></th>

	<th align="center"><b>Tanggal Permohonan</b></th>

	<th align="center"><b>Kode Sampel</b></th>

    <th align="center"><b>Nomor Sampel</b></th>

    <th align="center"><b>Nama Sampel</b></th>

    <th align="center"><b>Jumlah Sampel</b></th>

    <th align="center"><b>Tanggal Pengujian </b></th>

    <th align="center"><b>Target Pengujian </b></th>

    <th align="center"><b>Hasil Pengujian </b></th>

    <th align="center"><b>Metode Pengujian</b></th>

    <th align="center"><b>Penyelia</b></th>

    <th align="center"><b>Analis</b></th>



</tr>





<?php

$no =1;

$tampil = $objectExport->exportDataTeknis();

while ($data = $tampil->fetch_object()){

echo "<tr>";

	echo "<td align=center>".$no++."</td>";

	echo "<td>".$data->tanggal_permohonan."</td>";

	echo "<td>".$data->kode_sampel."</td>";

	echo "<td>".$data->no_sampel."</td>";

	echo "<td>".$data->nama_sampel_lab."</td>";

	echo "<td>".$data->jumlah_sampel.' '.$data->satuan."</td>";

	echo "<td>".$data->tanggal_pengujian."</td>";

	echo "<td><em>".$data->target_pengujian2."</em></td>";

	echo "<td>".$data->positif_negatif."</td>";

	echo "<td>".$data->metode_pengujian."</td>";

	echo "<td>".$data->nama_penyelia."</td>";

	echo "<td>".$data->nama_analis."</td>";

echo "</tr>";	

}

?>

			
</table>

</div>