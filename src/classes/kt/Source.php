<?php

namespace Lab\classes\kt;

use Lab\config\Database;

class Source extends Database
{

    private $db;

    public function __construct()
    {

        $this->db = $this->getInstance()->getConnection();
    }

    public function tampil($id_tumbuhan = null)
    {

        $sql = "SELECT * FROM tumbuhan";

        if ($id_tumbuhan != null) {

            $sql .= " WHERE id_tumbuhan=$id_tumbuhan";

        }

        $query = $this->db->query($sql) or die($this->db->error);

        return $query;

    }

    public function tampil2()
    {

        $sql = "SELECT * FROM tumbuhan ORDER BY nama_tumbuhan ASC";

        $query = $this->db->query($sql) or die($this->db->error);

        return $query;

    }

    public function get_id()
    {

        $sql = "SELECT id_tumbuhan FROM tumbuhan";

        $query = $this->db->query($sql) or die($this->db->error);

        return $query;

    }

    public function input($nama_tumbuhan, $nama_ilmiah_tumbuhan)
    {

        $this->db->query("INSERT INTO tumbuhan VALUES ('', '$nama_tumbuhan', '$nama_ilmiah_tumbuhan')") or die($this->db->error);

    }

    public function edit($sql)
    {

        $this->db->query($sql);

    }

    public function view($sql)
    {

        $this->db->query($sql);

    }

    public function hapus($id_tumbuhan)
    {

        $this->db->query("DELETE FROM tumbuhan WHERE id_tumbuhan='$id_tumbuhan'") or die($this->db->error);

    }

}
