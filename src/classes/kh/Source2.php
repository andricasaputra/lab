<?php

namespace Lab\classes\kh;

use Lab\config\Database;

class Source2 extends Database{

	private $db;

	public function __construct(){

		$this->db = $this->getInstance()->getConnection();
	}


	public function tampil($id_patogen=null){

		$sql = "SELECT * FROM patogen_kh";

		if($id_patogen !=null){

			$sql .= " WHERE id_patogen = '$id_patogen'";

		}

		$query = $this->db->query($sql) or die ($this->db->error);

		return $query;

	}


	public function tampil2(){

		$sql = "SELECT * FROM patogen_kh ORDER BY nama_penyakit ASC";

		$query = $this->db->query($sql) or die ($this->db->error);

		return $query;

	}


	public function input($nama_penyakit, $nama_latin_penyakit){

	$this->db->query("INSERT INTO patogen_kh VALUES ('', '$nama_penyakit', '$nama_latin_penyakit')") or die ($this->db->error);

	}


	public function edit($sql){

		$this->db->query($sql);

	}

	public function view($sql){

		$this->db->query($sql);
	}

	public function hapus($id_patogen){

		$this->db->query("DELETE FROM patogen_kh WHERE id_patogen='$id_patogen'") or die ($this->db->error);

	}



} 



?>