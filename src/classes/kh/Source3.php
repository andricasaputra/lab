<?php

namespace Lab\classes\kh;

use Lab\config\Database;

class Source3 extends Database
{

    private $db;

    public function __construct()
    {

        $this->db = $this->getInstance()->getConnection();
    }

    public function tampil($id = null)
    {

        $sql = "SELECT * FROM user";

        if ($id != null) {

            $sql .= " WHERE id = '$id' AND lab = 'kh' ORDER BY nama ASC";

        } else {

            $sql .= " WHERE lab='kh' ORDER BY nama ASC ";

        }

        $query = $this->db->query($sql) or die($this->db->error);

        return $query;

    }

    public function edit($sql)
    {

        $this->db->query($sql);

    }

    public function view($sql)
    {

        $this->db->query($sql);

    }

    public function hapus($lab)
    {

        $this->db->query("DELETE FROM user WHERE id = '$id'") or die($this->db->error);

    }

}
