<?php

namespace Lab\interfaces;

interface SuperData {

	public function __construct();

	public function utf8ize($d);

	public function tampil($id=null);

	public function tampil_surat_tugas();
	
	public function set_button();

	public function tampil_nama($id);

	public function ambil_id();

	public function tampil_timeline();

	public function lama_pengujian();

	public function cara_pengiriman();

	public function tanggal();

	public function tanggal_lalu();

	public function per_selesai();

	public function per_pending();	

	public function per_nonuji();

	public function edit($sql);

	public function hapus($id);

	public function input_ttd($id);

	public function KosongData();

	public function KosongDataSertifikat();

	/*FOR SUMBER DATA ON FOLDER DATA_KH*/

	public function infoPenerimaSampel($select=null);

	public function infoPenyerahanSampel($select=null);

	public function infoPermintaanKesiapanPengujian($select=null);

	public function infoResponPermohonanPengujian($select=null);

	public function infoKesiapanPengujian($select=null);

	public function infoPenunjukanPetugas($select=null);

	public function infoPengelolaSampel($select=null);	

	public function infoDataTeknis($select=null);

	public function infoHasilPengujian($select=null);

	public function infoLHU($select=null);


} 

?>