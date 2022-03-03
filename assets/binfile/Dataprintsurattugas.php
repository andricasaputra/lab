
<?php 
require_once '../../templates/header_lihat_data.php';
?>

<table class="table1 table-hover datatables6" cellspacing="0" width="100%">

<thead class="mdb-color lighten-4">

  <tr class="lihat-head2">

        <th>No</th>

        <th>Kode Sampel</th>

        <th>Nomor Surat Tugas</th>

        <th>Nomor Sampel</th>  

        <th>Tanggal Penunjukan</th>

        <th>Nama Sampel</th>

        <th>Jumlah Sampel</th>

        <th>Target Pengujian</th>

        <th>Action</th>

  </tr>

</thead>



<tbody>

  <?php

  $no2 =1;

  $tampil = $objectData->tampil_surat_tugas();

  while ($data = $tampil->fetch_object()){

  ?>

  <tr>

        <td><?php echo $no2++; ?></td>

        <td><?php echo $data->kode_sampel; ?></td>

        <td><?php echo $data->no_surat_tugas; ?></td>

        <td><?php echo $data->no_sampel; ?></td>

        <td><?php echo $data->tanggal_penunjukan; ?></td>

        <td><?php echo $data->nama_sampel; ?></td>

        <td><?php echo $data->jumlah_sampel; ?></td>

        <td><em><?php echo $data->target_optk; ?>

          <br><?php echo $data->target_optk2; ?>

          <br><?php echo $data->target_optk3; ?></em>

        </td>

        <td>



    <?php 

    if (strlen($data->no_surat_tugas) !== 0) { ?>

       <a class="btn btn-kusuccess" href="./report/print/print_surat_tugas.php?id=<?php echo $data->id?>&no_surat_tugas=<?=$data->no_surat_tugas?> " target="_blank"><i class="fa fa-print fa-fw"></i>Print</a>

     </td>

    <?php   } else { ?>



        <a class="btn btn-kusuccess btn-not-allowed"><i class="fa fa-print fa-fw"></i>Print</a>

      </td>

    <?php } ?> 

  </tr>

  <?php

  }?>

</tbody>
	</table>

	<?php 
	require_once '../../templates/footer_lihat_data.php';
	?>

	 




