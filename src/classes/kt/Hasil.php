<?php

namespace Lab\classes\kt;

use Lab\classes\LegacyData;
use Lab\interfaces\SuperHasil;

class Hasil extends LegacyData implements SuperHasil
{

    public function __construct()
    {

        parent::__construct();

    }

    public function tampil($id = null)
    {

        $sql = "SELECT * FROM hasil_kt";
        if ($id != null) {
            $sql .= " WHERE id=$id";
        }
        $query = $this->db->query($sql) or die($this->db->error);
        return $query;
    }

    public function tampil_hasil($id)
    {

        $sql   = "SELECT hasil_pengujian FROM hasil_kt WHERE id = $id";
        $query = $this->db->query($sql) or die($this->db->error);
        return $query;
    }

    public function input_ulang($id)
    {

        $sql   = "SELECT no_sampel FROM hasil_kt WHERE id = $id";
        $query = $this->db->query($sql) or die($this->db->error);
        return $query;
    }

    public function waktu_input($id)
    {

        $sql   = "SELECT waktu_input_hasil FROM hasil_kt WHERE id = $id";
        $query = $this->db->query($sql) or die($this->db->error);
        return $query;
    }

    public function input1($id, $tanggal_acu_hasil, $no_sampel, $bagian_tumbuhan, $vektor, $media, $target_optk, $target_optk2, $target_optk3, $metode_pengujian, $metode_pengujian2, $metode_pengujian3, $no_sertifikat, $positif_negatif, $hasil_pengujian)
    {

        $kd  = $this->db->query("SELECT no_sampel FROM hasil_kt WHERE no_sampel='$no_sampel'");
        $cek = $kd->num_rows;

        if ($cek > 0) {

            echo "<script>window.alert('No Sampel Sudah Pernah Dipakai')
            window.location='../?page=sertifikat'</script>";

        } else {

            $this->db->query("INSERT INTO hasil_kt (id, tanggal_acu_hasil, no_sampel, bagian_tumbuhan, vektor, media, target_optk, target_optk2, target_optk3, metode_pengujian, metode_pengujian2, metode_pengujian3, no_sertifikat, positif_negatif, hasil_pengujian, waktu_input_hasil) VALUES ('$id', '$tanggal_acu_hasil' ,'$no_sampel', '$bagian_tumbuhan', '$vektor', '$media', '$target_optk', '$target_optk2', '$target_optk3', '$metode_pengujian', '$metode_pengujian2', '$metode_pengujian3', '$no_sertifikat' ,'$positif_negatif','$hasil_pengujian', DATE_FORMAT(NOW(), '%Y-%m-%d %k:%i'))") or die($this->db->error);

            $this->db->query("UPDATE input_permohonan SET waktu_input_hasil = DATE_FORMAT(NOW(), '%Y-%m-%d %k:%i') WHERE id = '$id'") or die($this->db->error);

        }
    }

    public function hapus($id)
    {

        $this->db->query("DELETE FROM hasil_kt WHERE id='$id'") or die($this->db->error);
    }

    public function checkHasilPengujian($id)
    {
        $sql   = "SELECT id,no_sertifikat, positif_negatif FROM hasil_kt WHERE  id = $id";
        $query = $this->db->query($sql) or die($this->db->error);
        return $query;
    }

}
