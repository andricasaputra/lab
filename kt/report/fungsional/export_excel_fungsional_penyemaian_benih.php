<?php

require_once ('header.php');


$fileName = "Penyemaian Benih-(".date('d-m-Y').").xls";

use Lab\classes\{tanggal, NomorFungsional};

header("Content-Disposition: attachment; filename='$fileName'");

header("Content-Type: application/vnd.ms-excel");

?>

<style type="text/css">
	table{
		border: none;
	}
</style>

<div>

	<center><h3>LAPORAN PENYEMAIAN BENIH</h3>

	<h3><b>Semua Data</b></h3></center>



<table>

				

					
					<tr>

						<th><b>No.</b></th>

			     		<th align="center"><b>Kode Sampel</b></th>

			     		<th align="center"><b>Nomor Sampel</b></th>

                        <th align="center"><b>Tanggal Penyemaian</b></th>

                        <th align="center"><b>Nama Sampel</b></th>

                        <th align="center"><b>Nama Ilmiah</b></th>

                        <th align="center"><b>Jenis Sampel/HS Code</b></th>

                        <th align="center"><b>Jumlah Sampel</b></th>

                        <th align="center"><b>Jumlah Kontainer/ Lot</b></th>

                        <th align="center"><b>Target Pengujian</b></th>

                        <th align="center"><b>Metode Pengujian</b></th>

                        <th align="center"><b>Data Kegiatan</b></th>

                        <th align="center"><b>Yang Menyerahkan</b></th> 

                        <th align="center"><b>NIP</b></th>

                        <th align="center"><b>Yang Menerima</b></th> 

                        <th align="center"><b>NIP</b></th>

					</tr>

			

					

					<?php

					$no =1;

					$tampil = $objectFungsional->tampil_benih();

					$objectTanggal = new tanggal;

					while ($data = $tampil->fetch_object()){

						$nosmpl = explode("-", $data->no_sampel);

						$a = $nosmpl[0];

						if ($data->tanggal_penyerahan_lab == '') {
							
							$tgl = '';
						}else{

							$tgl = $objectTanggal->balik_tgl_indo($data->tanggal_pengujian);

						}

						

					echo "<tr>";

						echo "<td align=center>".$no++."</td>";

						echo "<td>".$data->kode_sampel."</td>";

						echo "<td>".$data->no_sampel."</td>";

						echo "<td>".$tgl."</td>";

						echo "<td>".$data->nama_sampel."</td>";

						echo "<td>".$data->nama_ilmiah."</td>";

						echo "<td>".$data->bagian_tumbuhan."</td>";

						echo "<td>".$data->jumlah_sampel.'&nbsp;'.$data->satuan."</td>";

						echo "<td>".$data->jumlah_kontainer."</td>";

						echo "<td>".$data->target_optk."</td>";

						echo "<td>".$data->metode_pengujian."</td>";

						if ($data->nama_patogen == 'Cendawan') {

							echo "<td>Benih disemai dengan media kertas saring (Blotter Test) selama ".$data->lama_pengujian."</td>";

						}else{

							echo "<td>Benih disemai dengan media Nutrient Agar selama ".$data->lama_pengujian."</td>";
						}

						echo "<td>".$data->yang_menyerahkanlab."</td>";

						echo "<td>".$data->nip_yang_menyerahkanlab."</td>";

						echo "<td>".$data->yang_menerimalab."</td>";

						echo "<td>".$data->nip_yang_menerimalab."</td>";

					echo "</tr>";		

					}

					?>

			

</table>

</div>