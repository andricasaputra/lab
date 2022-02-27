<?php

require_once ('header.php');


$fileName = "Distribusi-Sampel-(".date('d-m-Y').").xls";

use Lab\classes\{tanggal, NomorFungsional};

header("Content-Disposition: attachment; filename=$fileName");

header("Content-Type: application/vnd.ms-excel");

?>



<div>

	<center><h3>PENANGANAN SPESIMEN LAB KT</h3>

	<h3><b>Semua Data</b></h3></center>



<table border="1px">

				

					
					<tr>

						<th><b>No.</b></th>

			     		<th align="center"><b>Kode Sampel</b></th>

			     		<th align="center"><b>Nomor Sampel</b></th>

                        <th align="center"><b>Tanggal Pengujian</b></th>

                        <th align="center"><b>Nama Sampel</b></th>

                        <th align="center"><b>Nama Ilmiah</b></th>

                        <th align="center"><b>Jenis Sampel/HS Code</b></th>

                        <th align="center"><b>Jumlah Sampel</b></th>

                        <th align="center"><b>Jumlah Kontainer/ Lot</b></th>

                        <th align="center"><b>Target Pengujian</b></th>

                        <th align="center"><b>Metode Pengujian</b></th>

                        <th align="center"><b>Data Kegiatan</b></th>

                        <th align="center"><b>Hasil Kegiatan</b></th>

                        <th align="center"><b>Yang Menyerahkan</b></th> 

                        <th align="center"><b>NIP</b></th>

                        <th align="center"><b>Yang Menerima</b></th> 

                        <th align="center"><b>NIP</b></th>

					</tr>

			

					

					<?php

					$no =1;

					$tampil = $objectFungsional->pembuatan_preparat();

					$objectTanggal = new tanggal;

					while ($data = $tampil->fetch_object()){

						$nosmpl = explode("-", $data->no_sampel);

						$a = $nosmpl[0];

						if ($data->tanggal_penyerahan_lab == '') {
							
							$tgl = '';
							
						}else{

							$tgl = $objectTanggal->balik_tgl_indo($data->tanggal_penyerahan_lab);

						}

						

					echo "<tr>";

						echo "<td align=center>".$no++."</td>";

						echo "<td>".$data->kode_sampel."</td>";

						echo "<td>No  Sampel : ".$data->no_sampel."</td>";

						echo "<td>".$tgl."</td>";

						echo "<td>".$data->nama_sampel."</td>";

						echo "<td>".$data->nama_ilmiah."</td>";

						echo "<td>".$data->bagian_tumbuhan."</td>";

						echo "<td>".$data->jumlah_sampel.'&nbsp;'.$data->satuan."</td>";

						echo "<td>".$data->jumlah_kontainer."</td>";

						echo "<td>".$data->target_optk."</td>";

						echo "<td>".$data->metode_pengujian."</td>";

						if ($data->bagian_tumbuhan !='') {

							echo "<td>".$data->bagian_tumbuhan." ".$data->nama_sampel.", Target OPTK: <i>".$data->target_optk."</i></td>";

						}else{

							echo "<td>".$data->vektor.", Target OPTK: <i>".$data->target_optk."</i></td>";
						}


						echo "<td>Preparat ".$data->nama_patogen." dari ".$data->bagian_tumbuhan." ".$data->nama_sampel." siap diidentifikasi</td>";						

						echo "<td>".$data->yang_menyerahkanlab."</td>";

						echo "<td>".$data->nip_yang_menyerahkanlab."</td>";

						echo "<td>".$data->yang_menerimalab."</td>";

						echo "<td>".$data->nip_yang_menerimalab."</td>";

					echo "</tr>";		

					}

					?>

			

</table>

</div>