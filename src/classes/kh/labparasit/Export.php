<?php

namespace Lab\classes\kh\labparasit;

use Lab\classes\LegacyData;
use Lab\interfaces\SuperExport;

class Export extends LegacyData implements SuperExport
{

    public function __construct()
    {

        parent::__construct();

    }

    public function mainExport($tgl1 = null, $tgl2 = null)
    {

        $sql = "SELECT * FROM input_permohonan_kh_lab_parasit";

        if ($tgl1 != null && $tgl2 != null) {
            $sql .= " WHERE tanggal_acu_permohonan BETWEEN '$tgl1' AND '$tgl2'";
        }

        $query = $this->db->query($sql) or die($this->db->error);

        return $query;

    }

    public function exportDataTeknis($tgl1 = null, $tgl2 = null)
    {

        $sql = "SELECT input_permohonan_kh_lab_parasit.id, input_permohonan_kh_lab_parasit.tanggal_permohonan ,input_permohonan_kh_lab_parasit.kode_sampel, input_permohonan_kh_lab_parasit.tanggal_pengujian, input_permohonan_kh_lab_parasit.nama_sampel, input_permohonan_kh_lab_parasit.bagian_hewan, input_permohonan_kh_lab_parasit.target_pengujian2 , input_permohonan_kh_lab_parasit.target_pengujian3, input_permohonan_kh_lab_parasit.jumlah_sampel, input_permohonan_kh_lab_parasit.satuan, input_permohonan_kh_lab_parasit.metode_pengujian, input_permohonan_kh_lab_parasit.nama_penyelia, input_permohonan_kh_lab_parasit.nama_analis, input_permohonan_kh_lab_parasit.nama_sampel_lab ,hasil_kh_lab_parasit.id ,hasil_kh_lab_parasit.positif_negatif, hasil_kh_lab_parasit.positif_negatif_target3, hasil_kh_lab_parasit.no_sampel, hasil_kh_lab_parasit.no_sertifikat FROM input_permohonan_kh_lab_parasit LEFT JOIN hasil_kh_lab_parasit ON input_permohonan_kh_lab_parasit.id = hasil_kh_lab_parasit.id";

        if ($tgl1 != null && $tgl2 != null) {
            $sql .= " WHERE input_permohonan_kh_lab_parasit.tanggal_acu_permohonan BETWEEN '$tgl1' AND '$tgl2'";
        }

        $query = $this->db->query($sql) or die($this->db->error);

        return $query;

    }

    public function exportSertifikat($tgl1 = null, $tgl2 = null)
    {

        $sql = "SELECT input_permohonan_kh_lab_parasit.id, input_permohonan_kh_lab_parasit.tanggal_permohonan ,input_permohonan_kh_lab_parasit.kode_sampel, input_permohonan_kh_lab_parasit.tanggal_pengujian, input_permohonan_kh_lab_parasit.nama_sampel, input_permohonan_kh_lab_parasit.bagian_hewan, input_permohonan_kh_lab_parasit.target_pengujian2, input_permohonan_kh_lab_parasit.target_pengujian3, input_permohonan_kh_lab_parasit.jumlah_sampel, input_permohonan_kh_lab_parasit.satuan, input_permohonan_kh_lab_parasit.metode_pengujian, input_permohonan_kh_lab_parasit.nama_penyelia, input_permohonan_kh_lab_parasit.nama_analis , input_permohonan_kh_lab_parasit.nama_sampel_lab,  input_permohonan_kh_lab_parasit.ket_kesimpulan, input_permohonan_kh_lab_parasit.tanggal_sertifikat, input_permohonan_kh_lab_parasit.no_sertifikat ,hasil_kh_lab_parasit.id ,hasil_kh_lab_parasit.positif_negatif, hasil_kh_lab_parasit.positif_negatif_target3, hasil_kh_lab_parasit.no_sampel, hasil_kh_lab_parasit.no_sertifikat FROM input_permohonan_kh_lab_parasit LEFT JOIN hasil_kh_lab_parasit ON input_permohonan_kh_lab_parasit.id = hasil_kh_lab_parasit.id";

        if ($tgl1 != null && $tgl2 != null) {
            $sql .= " WHERE input_permohonan_kh_lab_parasit.waktu_apdate_sertifikat BETWEEN '$tgl1' AND '$tgl2'";
        }

        $query = $this->db->query($sql) or die($this->db->error);

        return $query;

    }

    public function exportSuratHasilUji($tgl1 = null, $tgl2 = null)
    {

        $sql = "SELECT input_permohonan_kh_lab_parasit.id, input_permohonan_kh_lab_parasit.no_permohonan , input_permohonan_kh_lab_parasit.tanggal_permohonan , input_permohonan_kh_lab_parasit.tanggal_pengujian ,  input_permohonan_kh_lab_parasit.no_sampel_awal,  input_permohonan_kh_lab_parasit.nama_sampel, input_permohonan_kh_lab_parasit.bagian_hewan, input_permohonan_kh_lab_parasit.target_pengujian2, input_permohonan_kh_lab_parasit.target_pengujian3, input_permohonan_kh_lab_parasit.jumlah_sampel, input_permohonan_kh_lab_parasit.satuan, input_permohonan_kh_lab_parasit.metode_pengujian, input_permohonan_kh_lab_parasit.nama_penyelia, input_permohonan_kh_lab_parasit.nama_analis , input_permohonan_kh_lab_parasit.nama_sampel_lab,  input_permohonan_kh_lab_parasit.ket_kesimpulan, input_permohonan_kh_lab_parasit.tanggal_sertifikat, input_permohonan_kh_lab_parasit.no_sertifikat, input_permohonan_kh_lab_parasit.tanggal_lhu, input_permohonan_kh_lab_parasit.no_lhu ,input_permohonan_kh_lab_parasit.no_agenda , input_permohonan_kh_lab_parasit.kepala_plh2 , input_permohonan_kh_lab_parasit.nip_kepala_plh2 , hasil_kh_lab_parasit.id ,hasil_kh_lab_parasit.positif_negatif, hasil_kh_lab_parasit.positif_negatif_target3, hasil_kh_lab_parasit.no_sampel, hasil_kh_lab_parasit.no_sertifikat FROM input_permohonan_kh_lab_parasit LEFT JOIN hasil_kh_lab_parasit ON input_permohonan_kh_lab_parasit.id = hasil_kh_lab_parasit.id";

        if ($tgl1 != null && $tgl2 != null) {
            $sql .= " WHERE input_permohonan_kh_lab_parasit.tanggal_acu_permohonan BETWEEN '$tgl1' AND '$tgl2'";
        }

        $query = $this->db->query($sql) or die($this->db->error);

        return $query;

    }

}
