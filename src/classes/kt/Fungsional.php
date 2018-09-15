<?php

namespace Lab\classes\kt;

class Fungsional extends Data
{

    public function print_persiapan_alat($id = null, $tgl = null)
    {

        if ($id != null && $tgl != null) {

            $sql = "SELECT * FROM input_permohonan WHERE id=$id AND tanggal_pengujian !='' GROUP BY lab_penguji, tanggal_pengujian";

        } else {

            $sql = "SELECT * FROM input_permohonan WHERE tanggal_pengujian != '' GROUP BY tanggal_pengujian ORDER BY id ASC";

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

        $sql   = "SELECT * FROM input_permohonan WHERE NOT (metode_pengujian = 'Identifikasi Morfologi') AND bagian_tumbuhan IN ('Biji/Benih', 'Buah')";
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

        $sql = "SELECT * FROM input_permohonan";
        if ($id != null) {
            $sql .= " WHERE id = $id";
        }
        $query = $this->db->query($sql) or die($this->db->error);
        return $query;
    }

    public function pembuatan_preparat($id = null)
    {

        if ($id != null) {
            $sql = "SELECT * FROM input_permohonan WHERE id=$id AND NOT (nama_sampel ='Larva') AND NOT (nama_patogen = 'Myte/Tungau' OR nama_patogen ='Bakteri' OR nama_patogen = 'Nematoda' OR nama_patogen='Virus') AND target_optk2 = ''";
        } else {
            $sql = "SELECT * FROM input_permohonan WHERE NOT (nama_sampel ='Larva') AND  NOT (nama_patogen = 'Myte/Tungau' OR nama_patogen ='Bakteri' OR nama_patogen = 'Nematoda' OR nama_patogen='Virus') AND target_optk2 = ''";
        }
        $query = $this->db->query($sql) or die($this->db->error);
        return $query;
    }

}
