<?php

// Kode Sampel

$kd = $objectNomor->kode_sampel();

$kode = $kd->fetch_object();

$kd_sampel = $kode->kode_sampel;

$urut = substr($kd_sampel, 0, 4);

$tambah = (int) $urut + 1;

if(strlen($tambah) == 1){

$format2 = "000".$tambah."/KT/".$bln."/".$thn;

}elseif (strlen($tambah) == 2) {

$format2 = "00".$tambah."/KT/".$bln."/".$thn;

}elseif (strlen($tambah) == 3) {

$format2 = "0".$tambah."/KT/".$bln."/".$thn;

}else{

$format2 = $tambah."/KT/".$bln."/".$thn;

}