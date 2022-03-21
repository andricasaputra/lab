<?php

namespace Lab\classes\kh;

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

        $sql = "SELECT * FROM pejabat_kh ORDER BY nama_pejabat ASC";

        $query = $this->db->query($sql) or die($this->db->error);

        return $query;

    }

    public function createPejabat($nama_pejabat, $jabatan, $jabfung, $kategori, $nip)
    {

       $this->db->query("INSERT INTO pejabat_kh(nama_pejabat, jabatan, jabfung, kategori, nip) VALUES ('$nama_pejabat', '$jabatan', '$jabfung', '$kategori', '$nip')") or die($this->db->error);

    }

    public function updatePejabat($nama_pejabat, $jabatan, $jabfung, $kategori, $nip, $id)
    {
        $sql = "UPDATE pejabat_kh SET nama_pejabat='$nama_pejabat', jabatan='$jabatan' , jabfung='$jabfung', kategori='$kategori', nip='$nip' WHERE id_pejabat ='$id'";

        $query = $this->db->query($sql) or die($this->db->error);

        return $query;
    }


    public function deletePejabat($id)
    {

        $sql = "DELETE FROM pejabat_kh WHERE id_pejabat = '$id'";

        $query = $this->db->query($sql) or die($this->db->error);

        return $query;
    }


}
