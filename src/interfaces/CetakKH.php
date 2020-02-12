<?php  

namespace Lab\interfaces;

interface CetakKH 
{

	public function tampilHasil($id = null);

    public function tampilHasilBibit($id = null);

    public function print_pertanggal($tgl1, $tgl2);

    public function print_penerimaan_sampel($tgl, $tgl2);

    public function print_penyerahan_sample($tgl, $tgl2);

    public function print_permintaan_kesiapan($tgl, $tgl2);

    public function print_respon_permohonan($tgl, $tgl2);

    public function print_kesiapan_pengujian($tgl, $tgl2);

    public function print_surat_tugas($tgl, $tgl2);

    public function print_usulan_penunjukan($tgl, $tgl2);

    public function print_distribusi_sampel($tgl, $tgl2);

    public function print_multi_sertifikat($tgl, $tgl2);

    public function print_multi_lhu($tgl, $tgl2);

    public function cetak($tanggal);

    public function cetakKode($tanggal);

    public function cetakTargetTbKesiapan($tanggal);

    public function cetakMetodeTbKesiapan($tanggal);

    public function cetakLamaTbKesiapan($tanggal);

    public function cetak2($tanggal);

    public function cetakSuratTugas($tanggal);

 
}