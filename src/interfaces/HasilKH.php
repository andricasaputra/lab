<?php  

namespace Lab\interfaces;

interface HasilKH extends SuperHasil 
{
	public function tampilBibit($id);

	public function tampil_hasil_bibit($id);

	public function input2($id, $tanggal_acu_hasil, $no_sampel, $positif_negatif, $positif_negatif_target3);

	public function input_ulang_bibit($id2);

	public function print_pertanggal_sertifikat_bibit($id);

	public function checkHasilPengujianBibit($id);
 
}