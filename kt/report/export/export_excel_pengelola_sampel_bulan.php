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




$fileName = "Distribusi-Sampel-(".date('d-m-Y').").xls";


header("Content-Disposition: attachment; filename=\"$fileName\"");

header("Content-Type: application/vnd.ms-excel");

?>



<div>

	<center><h3>LAPORAN DISTRIBUSI SAMPEL PENGUJIAN KE LABORATORIUM KARANTINA TUMBUHAN</h3>

	<h3><b>Tanggal <?php echo $tanggal.'-'.$bln.'-'.$thn ;?> s/d <?php echo $tanggalb.'-'.$blnb.'-'.$thnb ;?></b></h3></center>



<table border="1px">

				

					<tr>

						<th><b>No.</b></th>

			     		<th align="center"><b>Kode Sampel</b></th>

			     		<th align="center"><b>Nomor Sampel</b></th>

                        <th align="center"><b>Tanggal Penunjukan</b></th>

                        <th align="center"><b>Nama Sampel</b></th>

                        <th align="center"><b>Nama Ilmiah</b></th>

                        <th align="center"><b>Jenis Sampel/HS Code</b></th>

                        <th align="center"><b>Jumlah Sampel</b></th>

                        <th align="center"><b>Jumlah Kontainer/ Lot</b></th>

                        <th align="center"><b>Target Pengujian</b></th>

                        <th align="center"><b>Metode Pengujian</b></th>

                        <th align="center"><b>Yang Menyerahkan</b></th> 

                        <th align="center"><b>NIP</b></th>

                        <th align="center"><b>Yang Menerima</b></th> 

                        <th align="center"><b>NIP</b></th>

					</tr>

			

					

					<?php

					$no =1;

					if(@$_POST['export_data']){

					$tampil = $objectPrint->print_pertanggal(@$_POST['tgl_a'], @$_POST['tgl_b']);

					}

					while ($data = $tampil->fetch_object()){

					echo "<tr>";

						echo "<td align=center>".$no++."</td>";

						echo "<td>".$data->kode_sampel."</td>";

						echo "<td>".$data->no_sampel."</td>";

						echo "<td>".$data->tanggal_penunjukan."</td>";

						echo "<td>".$data->nama_sampel."</td>";

						echo "<td>".$data->nama_ilmiah."</td>";

						echo "<td>".$data->bagian_tumbuhan."</td>";

						echo "<td>".$data->jumlah_sampel.'&nbsp;'.$data->satuan."</td>";

						echo "<td>".$data->jumlah_kontainer."</td>";

						echo "<td>".$data->target_optk."</td>";

						echo "<td>".$data->metode_pengujian."</td>";

						echo "<td>".$data->yang_menyerahkanlab."</td>";

						echo "<td>".$data->nip_yang_menyerahkanlab."</td>";

						echo "<td>".$data->yang_menerimalab."</td>";

						echo "<td>".$data->nip_yang_menerimalab."</td>";

					echo "</tr>";	

					}

					?>

			

</table>

</div>