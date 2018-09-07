<?php 

// Kode Sampel
$nama = $objectData->tampil(@$id);

while($ini = $nama->fetch_object()):
  
$nama_sampel = $ini->nama_sampel;

$jumlah_sampel = $ini->jumlah_sampel;

$jenis_permohonan = $ini->jenis_permohonan;

$kd = $objectNomor->kode_sampel();

if ($kd->num_rows != 0) {

  $kode = $kd->fetch_object();

  $kd_sampel = $kode->kode_sampel;

  $urut = explode("/", $kd_sampel);

  $urut = (int)$urut[0];

}else{

  $urut = 0;

}

$cari = 'Sapi';

$cari2 = 'Sapi Bibit';

$cari3 = 'Kerbau';

$cari4 = 'Kuda';

if ($jenis_permohonan == 'Domestik Keluar') {
  
  $kodeJenis = 'DK/';

}elseif($jenis_permohonan == 'Domestik Masuk'){

  $kodeJenis = 'DM/';

}elseif($jenis_permohonan == 'Ekspor'){

  $kodeJenis = 'E/';

}elseif($jenis_permohonan == 'Impor'){

  $kodeJenis = 'I/';

}else{

  $kodeJenis = '';
}
    
/*Kode Sampel Sapi*/
$j = $jumlah_sampel;
$tambah1 = (int) $urut + 1;
$tambah = (int) $urut + 1;


if (strpos($nama_sampel, $cari2) != false) {

    $format2 = $tambah."H"."/spbbt/".$kodeJenis.$bln."/".$thn;

/*Kode Sampel Sampi Bibit*/

}elseif (strpos($nama_sampel, $cari) != false) {

  $format2 = $tambah."H"."/sp/".$kodeJenis.$bln."/".$thn;

/*Kode Sampel Kerbau*/

}elseif (strpos($nama_sampel, $cari3) != false) {

  $format2 = $tambah."H"."/kb/".$kodeJenis.$bln."/".$thn;

/*Kode Sampel Kuda*/

}elseif (strpos($nama_sampel, $cari4) != false) {

    $format2 = $tambah."H"."/kd/".$kodeJenis.$bln."/".$thn;

}

                   
endwhile;


?>