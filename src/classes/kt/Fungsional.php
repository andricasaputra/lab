<?php

namespace Lab\classes\kt;

class Fungsional extends Data
{
    private $dari = '2019-06-01';
    private $sampai = '2019-12-31';

    public function print_persiapan_alat($id = null, $tgl = null)
    {
        if ($id != null && $tgl != null) {

            $sql = "SELECT * FROM input_permohonan WHERE id = $id AND tanggal_pengujian !='' GROUP BY lab_penguji, tanggal_pengujian";

        } else {

            $sql = "SELECT * FROM input_permohonan WHERE tanggal_pengujian != '' AND tanggal_acu_permohonan BETWEEN '$this->dari' AND '$this->sampai' GROUP BY tanggal_pengujian ORDER BY id ASC";

        }

        $query = $this->db->query($sql) or die($this->db->error);

        return $query;
    }

    public function penyemaian_benih($id)
    {
        $sql   = "SELECT * FROM input_permohonan WHERE id=$id";

        $query = $this->db->query($sql) or die($this->db->error);

        return $query;
    }

    public function print_all_penyemaian_benih()
    {
        $sql   = "SELECT * FROM input_permohonan WHERE NOT (metode_pengujian = 'Identifikasi Morfologi') AND bagian_tumbuhan IN ('Biji/Benih', 'Buah') AND target_optk !='Peronospora manshurica'";

        $query = $this->db->query($sql) or die($this->db->error);
        return $query;
    }

    public function tampil_benih()
    {
        $sql   = "SELECT * FROM input_permohonan WHERE NOT (metode_pengujian = 'Identifikasi Morfologi') AND bagian_tumbuhan IN ('Biji/Benih', 'Buah')";
        $query = $this->db->query($sql) or die($this->db->error);
        return $query;
    }

    public function penanganan_spesimen($id = null)
    {
        $sql = "SELECT * FROM input_permohonan WHERE tanggal_acu_permohonan BETWEEN '$this->dari' AND '$this->sampai'";

        if ($id != null) {

            $sql .= " AND id = $id";
        }

        $query = $this->db->query($sql) or die($this->db->error);

        return $query;
    }

    public function pembuatan_preparat($id = null)
    {
        if ($id != null) {

            $sql = "SELECT * FROM input_permohonan WHERE id = $id AND NOT (nama_sampel ='Larva') AND NOT (nama_patogen = 'Myte/Tungau' OR nama_patogen ='Bakteri' OR nama_patogen = 'Nematoda' OR nama_patogen='Virus') AND target_optk != 'Peronospora manshurica' AND target_optk2 = '' AND tanggal_acu_permohonan BETWEEN '$this->dari' AND '$this->sampai'";

        } else {

            $sql = "SELECT * FROM input_permohonan WHERE NOT (nama_sampel ='Larva') AND  NOT (nama_patogen = 'Myte/Tungau' OR nama_patogen ='Bakteri' OR nama_patogen = 'Nematoda' OR nama_patogen='Virus') AND target_optk != 'Peronospora manshurica' AND target_optk2 = ''  AND tanggal_acu_permohonan BETWEEN '$this->dari' AND '$this->sampai' ";
        }

        $query = $this->db->query($sql) or die($this->db->error);

        return $query;
    }

}
