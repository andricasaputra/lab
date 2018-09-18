<?php

namespace Lab\classes\kt;

use Lab\classes\LegacyCetak;

class Cetak extends LegacyCetak
{

    public function __construct()
    {

        parent::__construct();

    }

    public function tampil($id = null)
    {
        $sql = "SELECT * FROM input_permohonan";
        if ($id != null) {
            $sql .= " WHERE id=$id";
        }
        $query = $this->db->query($sql) or die($this->db->error);
        return $query;
    }

    /*Scan Tanda Tangan*/

    public function Scan($id)
    {

        $sql = "SELECT * FROM scan_ttd WHERE id= '$id'";

        $query = $this->db->query($sql) or die($this->db->error);

        $data = $query->fetch_object();

        $scan = array(

            "ttd_yang_menyerahkan_pengelola_sampel" => $data->ttd_yang_menyerahkan_pengelola_sampel,
            "ttd_yang_menerima_pengelola_sampel"    => $data->ttd_yang_menerima_pengelola_sampel,
            "ttd_penyelia_data_teknis"              => $data->ttd_penyelia_data_teknis,
            "ttd_analis_data_teknis"                => $data->ttd_analis_data_teknis,
            "ttd_penyelia_hasil_uji"                => $data->ttd_penyelia_hasil_uji,
            "ttd_mt_hasil_uji"                      => $data->ttd_mt_hasil_uji,

        );

        return $scan;
    }

    /*Print Multi*/

    public function print_pertanggal($tgl1, $tgl2)
    {
        $sql2  = "SELECT * FROM input_permohonan WHERE tanggal_acu_permohonan BETWEEN '$tgl1' AND '$tgl2'";
        $query = $this->db->query($sql2) or die($this->db->error);
        return $query;
    }

    public function print_pertanggal_hasil2($tgl1, $tgl2)
    {
        $sql2  = "SELECT * FROM input_permohonan WHERE DATE(waktu_input_hasil) BETWEEN '$tgl1' AND '$tgl2'";
        $query = $this->db->query($sql2) or die($this->db->error);
        return $query;
    }

    public function print_pertanggal2($tgl1, $tgl2)
    {
        $sql2  = "SELECT * FROM input_permohonan WHERE kesiapan = 'Ya' AND tanggal_acu_permohonan BETWEEN '$tgl1' AND '$tgl2'";
        $query = $this->db->query($sql2) or die($this->db->error);
        return $query;
    }

    /*Print Multi Lab(sertifikat, data teknis)*/

    public function print_multi_sertifikat($tgl, $tgl2)
    {
        $sql2  = "SELECT input_permohonan.id, input_permohonan.nama_sampel, input_permohonan.nama_ilmiah, input_permohonan.kode_sampel, input_permohonan.jumlah_sampel,  input_permohonan.satuan, input_permohonan.bagian_tumbuhan, input_permohonan.media, input_permohonan.vektor, input_permohonan.tanggal_penyerahan_lab, input_permohonan.lab_penguji, input_permohonan.tanggal_pengujian, input_permohonan.nama_patogen, input_permohonan.nama_patogen2, input_permohonan.nama_patogen3, input_permohonan.metode_pengujian, input_permohonan.metode_pengujian2, input_permohonan.metode_pengujian3, input_permohonan.target_optk, input_permohonan.target_optk2, input_permohonan.target_optk3 , input_permohonan.rekomendasi, input_permohonan.nama_penyelia, input_permohonan.nama_analis, input_permohonan.nip_penyelia, input_permohonan.nip_analis, input_permohonan.kepala_plh, input_permohonan.nip_kepala_plh, input_permohonan.no_sertifikat, input_permohonan.waktu_apdate_sertifikat, input_permohonan.tanggal_sertifikat, input_permohonan.ket_kesimpulan ,  hasil_kt.id, hasil_kt.tanggal_acu_hasil, hasil_kt.no_sampel, hasil_kt.bagian_tumbuhan, hasil_kt.vektor, hasil_kt.media, hasil_kt.target_optk, hasil_kt.target_optk2, hasil_kt.target_optk3, hasil_kt.metode_pengujian, hasil_kt.metode_pengujian2, hasil_kt.metode_pengujian3, hasil_kt.no_sertifikat, hasil_kt.positif_negatif, hasil_kt.hasil_pengujian, hasil_kt.waktu_input_hasil FROM input_permohonan INNER JOIN hasil_kt ON input_permohonan.id = hasil_kt.id WHERE  DATE(hasil_kt.waktu_input_hasil) BETWEEN '$tgl 'AND '$tgl2' GROUP BY input_permohonan.id ORDER BY input_permohonan.waktu_apdate_sertifikat ASC";
        $query = $this->db->query($sql2) or die($this->db->error);
        return $query;
    }

    /*Print Data Teknis Perhari Pengujian / Cicil*/

    public function print_perhari($tgl)
    {
        $sql2  = "SELECT input_permohonan.id, input_permohonan.nama_sampel, input_permohonan.nama_ilmiah, input_permohonan.kode_sampel, input_permohonan.jumlah_sampel,  input_permohonan.satuan, input_permohonan.bagian_tumbuhan, input_permohonan.media, input_permohonan.vektor, input_permohonan.tanggal_penyerahan_lab, input_permohonan.lab_penguji, input_permohonan.tanggal_pengujian, input_permohonan.nama_patogen, input_permohonan.nama_patogen2, input_permohonan.nama_patogen3, input_permohonan.metode_pengujian, input_permohonan.metode_pengujian2, input_permohonan.metode_pengujian3, input_permohonan.target_optk, input_permohonan.target_optk2, input_permohonan.target_optk3 , input_permohonan.rekomendasi, input_permohonan.nama_penyelia, input_permohonan.nama_analis, input_permohonan.nip_penyelia, input_permohonan.nip_analis, input_permohonan.kepala_plh, input_permohonan.nip_kepala_plh, input_permohonan.no_sertifikat, input_permohonan.waktu_apdate_sertifikat, input_permohonan.tanggal_sertifikat, input_permohonan.ket_kesimpulan , hasil_kt.id, hasil_kt.tanggal_acu_hasil, hasil_kt.no_sampel, hasil_kt.bagian_tumbuhan, hasil_kt.vektor, hasil_kt.media, hasil_kt.target_optk, hasil_kt.target_optk2, hasil_kt.target_optk3, hasil_kt.metode_pengujian, hasil_kt.metode_pengujian2, hasil_kt.metode_pengujian3, hasil_kt.no_sertifikat, hasil_kt.positif_negatif, hasil_kt.hasil_pengujian, hasil_kt.waktu_input_hasil FROM input_permohonan INNER JOIN hasil_kt ON input_permohonan.id = hasil_kt.id WHERE DATE(hasil_kt.waktu_input_hasil) = '$tgl' GROUP BY input_permohonan.id";
        $query = $this->db->query($sql2) or die($this->db->error);
        return $query;
    }

    /*Print Data Teknis Perhari Pengujian (Gabungan)/ Cicil*/

    public function print_data_teknis($id)
    {
        $sql2  = "SELECT input_permohonan.id, input_permohonan.nama_sampel, input_permohonan.nama_ilmiah, input_permohonan.kode_sampel, input_permohonan.jumlah_sampel,  input_permohonan.satuan, input_permohonan.bagian_tumbuhan, input_permohonan.media, input_permohonan.vektor, input_permohonan.tanggal_penyerahan_lab, input_permohonan.lab_penguji, input_permohonan.tanggal_pengujian, input_permohonan.nama_patogen, input_permohonan.nama_patogen2, input_permohonan.nama_patogen3, input_permohonan.metode_pengujian, input_permohonan.metode_pengujian2, input_permohonan.metode_pengujian3, input_permohonan.target_optk, input_permohonan.target_optk2, input_permohonan.target_optk3 , input_permohonan.rekomendasi, input_permohonan.nama_penyelia, input_permohonan.nama_analis, input_permohonan.nip_penyelia, input_permohonan.nip_analis, input_permohonan.kepala_plh, input_permohonan.nip_kepala_plh, input_permohonan.no_sertifikat, input_permohonan.waktu_apdate_sertifikat, input_permohonan.tanggal_sertifikat, input_permohonan.ket_kesimpulan,  hasil_kt.id, hasil_kt.tanggal_acu_hasil, hasil_kt.no_sampel, hasil_kt.bagian_tumbuhan, hasil_kt.vektor, hasil_kt.media, hasil_kt.target_optk, hasil_kt.target_optk2, hasil_kt.target_optk3, hasil_kt.metode_pengujian, hasil_kt.metode_pengujian2, hasil_kt.metode_pengujian3, hasil_kt.no_sertifikat, hasil_kt.positif_negatif, hasil_kt.hasil_pengujian, max(hasil_kt.waktu_input_hasil) AS maxwaktu FROM input_permohonan INNER JOIN hasil_kt ON input_permohonan.id = hasil_kt.id WHERE input_permohonan.id = '$id' GROUP BY input_permohonan.id";
        $query = $this->db->query($sql2) or die($this->db->error);
        return $query;
    }

    public function print_agenda($tgl1 = null, $tgl2 = null)
    {

        $sql = "SELECT input_permohonan.id, input_permohonan.tanggal_permohonan ,input_permohonan.kode_sampel, input_permohonan.tanggal_pengujian, input_permohonan.nama_sampel, input_permohonan.target_optk, input_permohonan.target_optk2, input_permohonan.target_optk3, input_permohonan.metode_pengujian, input_permohonan.nama_penyelia, input_permohonan.nama_analis, input_permohonan.nama_sampel, input_permohonan.tanggal_sertifikat ,hasil_kt.id ,hasil_kt.positif_negatif, hasil_kt.no_sampel, hasil_kt.no_sertifikat FROM input_permohonan LEFT JOIN hasil_kt ON input_permohonan.id = hasil_kt.id";

        if ($tgl1 != null && $tgl2 != null) {
            $sql .= " WHERE DATE(input_permohonan.waktu_apdate_sertifikat) BETWEEN '$tgl1' AND '$tgl2'";
        }

        $query = $this->db->query($sql) or die($this->db->error);

        return $query;

    }

    /*Print Multi lhu*/

    public function print_multi_lhu($tgl, $tgl2)
    {
        $sql2  = "SELECT id, no_permohonan, tanggal_permohonan, nama_sampel, nama_ilmiah, kode_sampel, jumlah_sampel,  satuan, bagian_tumbuhan, media, vektor, nama_pemilik, alamat_pemilik, pemohon, tanggal_penyerahan_lab, rekomendasi, no_sertifikat, waktu_apdate_sertifikat, tanggal_sertifikat, no_agenda, no_lhu, tanggal_lhu, ket_kesimpulan, kepala_plh2, nip_kepala_plh2 FROM input_permohonan WHERE no_agenda !='' AND DATE(waktu_apdate_sertifikat) BETWEEN '$tgl 'AND '$tgl2' ORDER BY waktu_apdate_sertifikat ASC";
        $query = $this->db->query($sql2) or die($this->db->error);
        return $query;
    }

    /*Untuk Export Data*/

    public function print_pertanggal_hasil($tgl1, $tgl2)
    {

        $sql2  = "SELECT * FROM hasil_kt WHERE tanggal_acu_hasil BETWEEN '$tgl1' AND '$tgl2'";
        $query = $this->db->query($sql2) or die($this->db->error);
        return $query;
    }

    /*Print Multiple*/

    public function print_pertanggal_sertifikat($id)
    {

        $sql2  = "SELECT * FROM hasil_kt WHERE id='$id' ";
        $query = $this->db->query($sql2) or die($this->db->error);
        return $query;
    }

    /*Cetak Data Teknis Perhari Uji*/

    public function cetak($id = null, $waktu_input = null)
    {

        $sql = "SELECT id, tanggal_acu_hasil, no_sampel, bagian_tumbuhan, vektor, media, target_optk, target_optk2, target_optk3, metode_pengujian, metode_pengujian2, metode_pengujian3, no_sertifikat, positif_negatif, hasil_pengujian, DATE_FORMAT(waktu_input_hasil, '%Y-%m-%d %H:%i') FROM hasil_kt";
        if ($id != null && $waktu_input != null) {
            $sql .= " WHERE id=$id AND DATE(waktu_input_hasil) = '$waktu_input'";
        }
        $query = $this->db->query($sql) or die($this->db->error);
        return $query;
    }

    public function cetak2($id = null)
    {

        $sql = "SELECT id, tanggal_acu_hasil, no_sampel, bagian_tumbuhan, vektor, media, target_optk, target_optk2, target_optk3, metode_pengujian, metode_pengujian2, metode_pengujian3, no_sertifikat, positif_negatif, hasil_pengujian, DATE_FORMAT(waktu_input_hasil, '%Y-%m-%d %H:%i') FROM hasil_kt";
        if ($id != null) {
            $sql .= " WHERE id=$id";
        }
        $query = $this->db->query($sql) or die($this->db->error);
        return $query;
    }

    /*Buku Harian Data teknis*/
    public function CetakForBukuHarianDatek($tgl)
    {

        $sql = "SELECT id, tanggal_pengujian, kode_sampel, target_optk, target_optk2, target_optk3, metode_pengujian, nama_analis, nama_penyelia FROM input_permohonan WHERE DATE(waktu_apdate_sertifikat) IN ('$tgl')";
        $query = $this->db->query($sql) or die ($this->db->error);

        return $query;

    }

    /*Buku Harian Data teknis*/
    public function GetIdCetakForBukuHarianDatek($id)
    {

        $sql = "SELECT id, positif_negatif,no_sampel,hasil_pengujian FROM hasil_kt WHERE id = $id GROUP BY positif_negatif ";
        $query = $this->db->query($sql) or die ($this->db->error);

        return $query;

    }

}
