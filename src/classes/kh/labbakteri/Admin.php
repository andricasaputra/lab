<?php

namespace Lab\classes\kh\labbakteri;

use Lab\classes\kh\labbakteri\Data as DataKh;

class Admin extends DataKh
{

    public function pesan($id = null)
    {

        $sql = "SELECT * FROM admin";

        if ($id != null) {

            $sql .= " WHERE id=$id";

        }

        $query = $this->db->query($sql) or die($this->db->error);

        return $query;

    }

    public function tampil_pesan($id)
    {

        $sql = "SELECT * FROM admin WHERE id =$id";

        $query = $this->db->query($sql) or die($this->db->error);

        return $query;

    }

    public function tampil_pesanid()
    {

        $sql = "SELECT min(id) as minId FROM admin";

        $query = $this->db->query($sql) or die($this->db->error);

        return $query;

    }

    public function input_admin($judul, $isi)
    {

        $sql = $this->db->query("INSERT INTO admin VALUES('', '$judul', '$isi')") or die($this->db->error);

    }

    public function edit_admin($id, $judul, $isi)
    {

        $sql = "UPDATE admin SET judul='$judul', isi='$isi' WHERE id='$id'";

        $query = $this->db->query($sql) or die($this->db->error);

    }

    public function hapus_admin($id)
    {

        $sql = "DELETE FROM admin WHERE id=$id";

        $query = $this->db->query($sql) or die($this->db->error);

    }

}
