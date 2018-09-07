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


$fileName = "Respon-Permohonan-Pengujian-(".date('d-m-Y').").xls";



header("Content-Disposition: attachment; filename='$fileName'");

header("Content-Type: application/vnd.ms-excel");

?>



<div>

	<center><h3>LAPORAN RESPON PERMOHONAN PENGUJIAN LABORATORIUM KARANTINA TUMBUHAN</h3>

	<h3><b>Tanggal <?php echo $tanggal.'-'.$bln.'-'.$thn ;?> s/d <?php echo $tanggalb.'-'.$blnb.'-'.$thnb ;?></b></h3></center>




<table border="1px">

				

					<tr>

						<th><b>No.</b></th>

			     		<th align="center"><b>No./Tlg Surat</b></th>

                        <th align="center"><b>Tanggal Diterima</b></th>

                        <th align="center"><b>Nama Sampel</b></th>

                        <th align="center"><b>Nama Ilmiah</b></th>

                        <th align="center"><b>Jenis Sampel/HS Code</b></th>

                        <th align="center"><b>Jumlah Sampel</b></th>

                        <th align="center"><b>Jumlah Kontainer/ Lot</b></th>

                        <th align="center"><b>Target Pengujian</b></th>

                        <th align="center"><b>Metode Pengujian</b></th>

                        <th align="center"><b>Kode Sampel</b></th>

                        <th align="center"><b>Penyelia</b></th> 

                        <th align="center"><b>Aanalis</b></th> 

                        <th align="center"><b>Bahan</b></th> 

                        <th align="center"><b>Alat</b></th> 

                        <th align="center"><b>Manajer Teknis</b></th>  

					</tr>

			

					

					<?php

					$no =1;

					if(@$_POST['export_data']){

						$tampil = $objectPrint->print_pertanggal(@$_POST['tgl_a'], @$_POST['tgl_b']);

					}

					while ($data = $tampil->fetch_object()){

					echo "<tr>";

						echo "<td align=center>".$no++."</td>";

						echo "<td>".$data->no_permohonan."</td>";

						echo "<td>".$data->tanggal_permohonan."</td>";

						echo "<td>".$data->nama_sampel."</td>";

						echo "<td><em>".$data->nama_ilmiah."</em></td>";

						echo "<td>".$data->bagian_tumbuhan."</td>";

						echo "<td>".$data->jumlah_sampel.'&nbsp;'.$data->satuan."</td>";

						echo "<td>".$data->jumlah_kontainer."</td>";

						if ($data->target_optk2 !== '') {

							echo "<td><em>".$data->target_optk. " & " .$data->target_optk2."</em></td>";

						}elseif ($data->target_optk3 !== '') {

							echo "<td><em>".$data->target_optk. ", " .$data->target_optk2. ", " .$data->target_optk3."</em></td>";
							
						}else{
							echo "<td><em>".$data->target_optk."</em></td>";
						}

						echo "<td>".$data->metode_pengujian."</td>";

						echo "<td>".$data->kode_sampel."</td>";

						echo "<td>".$data->penyelia.'<br>'.$data->penyelia2."</td>";

						echo "<td>".$data->analis.'<br>'.$data->analis2."</td>";

						echo "<td>".$data->bahan.'<br>'.$data->bahan2."</td>";

						echo "<td>".$data->alat.'<br>'.$data->alat2."</td>";

						echo "<td>".$data->mt."</td>";

					echo "</tr>";	
	

					}

					?>

			

</table>

</div>