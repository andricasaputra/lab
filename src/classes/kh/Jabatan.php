<?php

namespace Lab\classes\kh;

use Lab\config\Database;

class Jabatan extends Database
{

    private $db;

    public function __construct()
    {

        $this->db = $this->getInstance()->getConnection();
    }

    public function jabatan()
    {

        $sql = "SELECT * FROM jabatan ORDER BY jabatan ASC";

        $query = $this->db->query($sql) or die($this->db->error);

        return $query;

    }

    public function jabfung()
    {

        $sql = "SELECT * FROM jabfung ORDER BY jabfung ASC";

        $query = $this->db->query($sql) or die($this->db->error);

        return $query;

    }

    public function createJabatan($jabatan)
    {

        $sql = "INSERT INTO jabatan(jabatan) VALUES('$jabatan')";

        $query = $this->db->query($sql) or die($this->db->error);

        return $query;

    }

    public function createJabfung($jabfung)
    {

        $sql = "INSERT INTO jabfung(jabfung) VALUES('$jabfung')";

        $query = $this->db->query($sql) or die($this->db->error);

        return $query;

    }

    public function updateJabatan($jabatan, $id)
    {
        $sql = "UPDATE jabatan SET jabatan = '$jabatan' WHERE id = '$id'";

        $query = $this->db->query($sql) or die($this->db->error);

        return $query;
    }

    public function updateJabfungn($jabfung, $id)
    {
        $sql = "UPDATE jabfung SET jabfung = '$jabfung' WHERE id = '$id'";

        $query = $this->db->query($sql) or die($this->db->error);

        return $query;
    }

    public function deletePejabat($id)
    {

        $sql = "DELETE FROM jabatan WHERE id = '$id'";

        $query = $this->db->query($sql) or die($this->db->error);

        return $query;
    }

     public function deleteJabfung($id)
    {

        $sql = "DELETE FROM jabfung WHERE id = '$id'";

        $query = $this->db->query($sql) or die($this->db->error);

        return $query;
    }


}
