<?php

namespace Lab\classes\kh;

use Lab\config\Database;

class Source4 extends Database
{

    private $db;

    public function __construct()
    {

        $this->db = $this->getInstance()->getConnection();
    }

    public function tampilPelanggan($id = null)
    {

        $sql = "SELECT * FROM pelanggan_kh";

        if ($id != null) {

            $sql .= " WHERE id = $id";

        }

        $query = $this->db->query($sql) or die($this->db->error);

        return $query;

    }

    public function input($nama_pelanggan, $alamat_pelanggan)
    {

        $this->db->query("INSERT INTO pelanggan_kh VALUES ('', '$nama_pelanggan', '$alamat_pelanggan')") or die($this->db->error);

    }

    public function edit($sql)
    {

        $this->db->query($sql);

    }

    public function hapus($id)
    {

        $sql = "DELETE FROM pelanggan_kh WHERE id=$id";

        $this->db->query($sql);

    }

}
