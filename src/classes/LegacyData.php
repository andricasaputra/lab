<?php

namespace Lab\classes;

use Lab\config\Database;

abstract class LegacyData extends Database
{
    protected $db;
    protected $conn;

    protected function __construct()
    {
        $this->conn = parent::getInstance();

        $this->db = $this->conn->getConnection();
    }

    public function utf8ize($d)
    {
        if (is_array($d)) {
            foreach ($d as $k => $v) {
                $d[$k] = $this->utf8ize($v);
            }
        } elseif (is_string($d)) {
            return utf8_encode($d);
        }
        return $d;
    }

    public function edit($sql)
    {
        $this->db->query($sql) or die($this->db->error);
    }

    public function edit2($sql)
    {
        $this->db->query($sql) or die($this->db->error);
    }

    public function view($sql)
    {
        $this->db->query($sql) or die($this->db->error);
    }

    public function lama_pengujian()
    {
        $sql = "SELECT * FROM tbl_lamapengujian";

        $query = $this->db->query($sql) or die($this->db->error);

        return $query;
    }

    public function cara_pengiriman()
    {
        $sql = "SELECT * FROM tbl_carapengiriman";

        $query = $this->db->query($sql) or die($this->db->error);

        return $query;
    }

    public function tampil_nama($id)
    {
        $sql2 = "SELECT * FROM user WHERE id='$id'";

        $query = $this->db->query($sql2) or die($this->db->error);

        return $query;
    }

    public function tampil_hewan()
    {
        $sql = "SELECT * FROM hewan GROUP BY nama_hewan ORDER BY id_hewan DESC";

        $query = $this->db->query($sql) or die($this->db->error);

        return $query;
    }

    public function tampil_ilmiah_hewan()
    {
        $sql = "SELECT * FROM hewan GROUP BY nama_ilmiah_hewan ORDER BY nama_ilmiah_hewan ASC";

        $query = $this->db->query($sql) or die($this->db->error);

        return $query;
    }
}
