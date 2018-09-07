<?php

require_once ('header.php');


$fileName = "Distribusi-Sampel-(".date('d-m-Y').").xls";



header("Content-Disposition: attachment; filename='$fileName'");

header("Content-Type: application/vnd.ms-excel");

?>



<div>

	<center><h3>LAPORAN PERSIAPAN ALAT DAN BAHAN PENGUJIAN LAB KT</h3>

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

                        <th align="center"><b>Nama Alat dan Bahan</b></th>

                        <th align="center"><b>Keterangan</b></th>

                        <th align="center"><b>Yang Menyerahkan</b></th> 

                        <th align="center"><b>NIP</b></th>

                        <th align="center"><b>Yang Menerima</b></th> 

                        <th align="center"><b>NIP</b></th>

					</tr>

			

					

					<?php

					$no =1;

					$tampil = $objectFungsional->print_persiapan_alat();

					while ($data = $tampil->fetch_object()){

						$nosmpl = explode("-", $data->no_sampel);

						$a = $nosmpl[0];

						if ($data->tanggal_pengujian == '') {
							
							$tgl = '';
						}else{

							$tgl = balik_tgl_indo($data->tanggal_pengujian);

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

						if ($data->lab_penguji == 'Laboratorium Hama') {

							if ($data->target_optk == 'Lalat Buah'){

								echo "<td>Mikroskop Stereo, Kuas, Botol Vial, Cup Mini, Alkohol 70%</td>";
								
							}else{

								echo "<td>Mikroskop Stereo, Kuas, Slide, Cover Slide, Botol Vial, Alkohol 70%</td>";
							}

							
						}else{

							if ($data->nama_patogen == 'Cendawan') {

								echo "<td>Mikroskop Compound, Jarum Cendawan, Slide, Cover Slide, Cawan Petri, Alkohol 70%, Aquadest</td>";

							}else{

								echo "<td>Mikroskop Compound, Jarum Ose, Slide, Cover Slide, Cawan Petri,  KOH Alkohol 70%, Aquadest</td>";

							}

							
						}

						if ($data->lab_penguji == 'Laboratorium Hama') {

							echo "<td>Tempat, Alat & Bahan Siap Digunakan Untuk Pengujian ".$data->nama_patogen."</td>";

						}else{
							if ($data->nama_sampel == 'Gulma') {

								echo "<td>Tempat, Alat & Bahan Siap Digunakan Untuk Pengujian Gulma</td>";
							}else{
								echo "<td>Tempat, Alat & Bahan Siap Digunakan Untuk Pengujian ".$data->nama_patogen."</td>";
							}
							
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