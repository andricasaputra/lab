<?php

namespace Lab\classes\kt;

use Lab\config\Database;

class Pejabat extends Database
{

    private $db;

    public function __construct()
    {

        $this->db = $this->getInstance()->getConnection();
    }

    public function index()
    {

        $sql = "SELECT * FROM pejabat ORDER BY nama_pejabat ASC";

        $query = $this->db->query($sql) or die($this->db->error);

        return $query;

    }

    public function createPejabat($nama_pejabat, $jabatan, $jabfung, $nip)
    {

       $this->db->query("INSERT INTO pejabat(nama_pejabat, jabatan, jabfung, nip) VALUES ('$nama_pejabat', '$jabatan', '$jabfung', '$nip')") or die($this->db->error);

    }

    public function showPejabat($nama)
    {

        $sql = "SELECT * FROM pejabat WHERE nama_pejabat = '$nama' ";

        $query = $this->db->query($sql) or die($this->db->error);

        return $query;

    }

    public function showJabatan($jabatan)
    {

        $sql = "SELECT * FROM pejabat WHERE jabatan = '$jabatan' ";

        $query = $this->db->query($sql) or die($this->db->error);

        return $query;

    }

    public function showJabfung($jabfung)
    {

        $sql = "SELECT * FROM pejabat WHERE jabfung = '$jabfung' ";

        $query = $this->db->query($sql) or die($this->db->error);

        return $query;

    }

    public function updatePejabat($nama_pejabat, $jabatan, $jabfung, $nip, $id)
    {
        $sql = "UPDATE pejabat SET nama_pejabat='$nama_pejabat', jabatan='$jabatan' , jabfung='$jabfung', nip='$nip' WHERE id_pejabat ='$id'";

        $query = $this->db->query($sql) or die($this->db->error);

        return $query;
    }


    public function deletePejabat($id)
    {

        $sql = "DELETE FROM pejabat WHERE id_pejabat = '$id'";

        $query = $this->db->query($sql) or die($this->db->error);

        return $query;
    }


}
