<?php

require_once ('header.php');

$bln = date('m');

$awal = $_POST['tgl_a'];

$sampai = $_POST['tgl_b'];

$fileName = "Penunjukan-Petugas-(".date('d-m-Y').").xls";

header("Content-Disposition: attachment; filename='$fileName'");

header("Content-Type: application/vnd.ms-excel");

?>



<div>

	<center><h3>LAPORAN PENUNJUKAN PETUGAS PENGUJIAN LABORATORIUM KARANTINA HEWAN</h3>

	<h3><b>Tanggal <?php echo $awal; ?> s/d <?php echo $sampai;  ?></b></h3></center>



<table border="1px">



<tr>

	<th><b>No.</b></th>

	<th align="center"><b>Kode Sampel</b></th>

	<th align="center"><b>Nomor Sampel</b></th>

	<th align="center"><b>Nomor Surat Tugas</b></th>

    <th align="center"><b>Tanggal Penugasan</b></th>

    <th align="center"><b>Hari/Bulan/Tahun</b></th>

    <th align="center"><b>Nama Sampel</b></th>

    <th align="center"><b>Jenis Sampel/HS Code</b></th>

    <th align="center"><b>Jumlah Sampel</b></th>

    <th align="center"><b>Jumlah Kontainer/ Lot</b></th>

    <th align="center"><b>Target Pengujian I</b></th>

    <th align="center"><b>Target Pengujian II</b></th>

    <th align="center"><b>Metode Pengujian</b></th>

    <th align="center"><b>Nama Penyelia</b></th>

    <th align="center"><b>Jabatan Penyelia</b></th>

    <th align="center"><b>Nama Analis</b></th>

    <th align="center"><b>Jabatan Analis</b></th>

    <th align="center"><b>Manajer Teknis</b></th> 

    <th align="center"><b>NIP</b></th> 

</tr>





<?php

$no =1;

$tampil = $objectExport->mainExport();

while ($data = $tampil->fetch_object()){

echo "<tr>";

	echo "<td align=center>".$no++."</td>";

	echo "<td>".$data->kode_sampel."</td>";

	echo "<td>".$data->no_sampel."</td>";

	echo "<td>".$data->no_surat_tugas."</td>";

	echo "<td>".$data->tanggal_penunjukan."</td>";

	echo "<td>".$data->hari.'&nbsp;'.$data->bulan.'&nbsp;'.$data->tahun."</td>";

	echo "<td>".$data->nama_sampel."</td>";

	echo "<td>".$data->bagian_hewan."</td>";

	echo "<td>".$data->jumlah_sampel.'&nbsp;'.$data->satuan."</td>";

	echo "<td>".$data->jumlah_kontainer."</td>";

	echo "<td><em>".$data->target_pengujian2."</em></td>";

	echo "<td><em>".$data->target_pengujian3."</em></td>";

	echo "<td>".$data->metode_pengujian."</td>";

	echo "<td>".$data->nama_penyelia."</td>";

	echo "<td>".$data->jab_penyelia."</td>";

	echo "<td>".$data->nama_analis."</td>";

	echo "<td>".$data->jab_analis."</td>";

	echo "<td>".$data->mt."</td>";

	echo "<td>".$data->nip_mt."</td>";

echo "</tr>";	

}

?>



</table>

</div>