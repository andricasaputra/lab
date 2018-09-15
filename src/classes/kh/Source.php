<?php

namespace Lab\classes\kh;

use Lab\config\Database;

class Source extends Database
{

    private $db;

    public function __construct()
    {

        $this->db = $this->getInstance()->getConnection();
    }

    public function tampil($id_hewan = null)
    {

        $sql = "SELECT * FROM hewan";

        if ($id_hewan != null) {

            $sql .= " WHERE id_hewan=$id_hewan";

        }

        $query = $this->db->query($sql) or die($this->db->error);

        return $query;

    }

    public function tampil2()
    {

        $sql = "SELECT * FROM hewan ORDER BY nama_hewan ASC";

        $query = $this->db->query($sql) or die($this->db->error);

        return $query;

    }

    public function input($nama_hewan, $nama_ilmiah_hewan)
    {

        $this->db->query("INSERT INTO hewan (id_hewan, nama_hewan, nama_ilmiah_hewan) VALUES ('', '$nama_hewan', '$nama_ilmiah_hewan')") or die($this->db->error);

    }

    public function edit($sql)
    {

        $this->db->query($sql);

    }

    public function view($sql)
    {

        $this->db->query($sql);

    }

    public function hapus($id_hewan)
    {

        $this->db->query("DELETE FROM hewan WHERE id_hewan='$id_hewan'") or die($this->db->error);

    }

}
