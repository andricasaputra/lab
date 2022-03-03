<?php

require_once ('header.php');

$bln = date('m');

$awal = $_POST['tgl_a'];

$sampai = $_POST['tgl_b'];

$fileName = "Data_Permohonan-(". $awal .'-'.'SD'.'-'. $sampai.").xls";

header("Content-Disposition: attachment; filename='$fileName'");

header("Content-Type: application/vnd.ms-excel");


?>



<div>

	<center><h3>DATA PERMOHONAN PENGUJIAN LABORATORIUM KARANTINA HEWAN</h3>

	<h3><b>Tanggal <?php echo $awal; ?> s/d <?php echo $sampai;  ?></b></h3></center>

	<table border="1px">

			
	<tr>

		<th><b>No.</b></th>

		<th><b>Nomor Permohonan</b></th>

		<th><b>Tanggal Permohonan</b></th>

		<th><b>Jenis Permohonan</b></th>

		<th><b>Nomor Sampel</b></th>

		<th><b>Nama Sampel</b></th>

		<th><b>Jumlah Sampel</b></th>

		<th><b>Satuan</b></th>

		<th><b>Bagian Hewan</b></th>

		<th><b>Produk Hewan</b></th>

		<th><b>Daerah Asal</b></th>

		<th><b>Metode Pengambilan Sampel</b></th>

		<th><b>Target Pengujian</b></th>

		<th><b>Metode Pengujian</b></th>

		<th><b>Nama Pemilik</b></th>

		<th><b>Alamat Pemilik</b></th>

		<th><b>Dokumen Pendukung</b></th>

		<th><b>Pemohon</b></th>

	</tr>



	<?php

	$no =1;

	$tampil = $objectExport->mainExport($_POST['tgl_a'], $_POST['tgl_b']);

	while ($data = $tampil->fetch_object()){

	echo "<tr>";

		echo "<td align=center>".$no++."</td>";

		echo "<td>".$data->no_permohonan."</td>";

		echo "<td>".$data->tanggal_permohonan."</td>";

		echo "<td>".$data->jenis_permohonan."</td>";

		echo "<td>".$data->no_sampel_awal."</td>";

		echo "<td>".$data->nama_sampel."</td>";

		echo "<td>".$data->jumlah_sampel."</td>";

		echo "<td>".$data->satuan."</td>";

		echo "<td>".$data->bagian_hewan."</td>";

		echo "<td>".$data->produk_hewan."</td>";

		echo "<td>".$data->area_asal."</td>";

		echo "<td>".$data->cara_pengambilan_sampel."</td>";

		echo "<td>".$data->target_pengujian2."</td>";

		echo "<td>".$data->metode_pengujian."</td>";

		echo "<td>".$data->nama_pemilik."</td>";

		echo "<td>".$data->alamat_pemilik."</td>";

		echo "<td>".$data->dokumen_pendukung."</td>";

		echo "<td>".$data->pemohon."</td>";

	echo "</tr>";	

	}

	?>

				

	</table>

</div>

