<?php

namespace Lab\classes\kt;

use Lab\config\Database;

class Source2 extends Database{

	private $db;

	public function __construct(){

		$this->db = $this->getInstance()->getConnection();
	}
	

	public function tampil($id=null){

		$sql = "SELECT * FROM penyakit";

		if($id !=null){

			$sql .= " WHERE id=$id";

		}

		$query = $this->db->query($sql) or die ($this->db->error);

		return $query;

	}



	public function tampil2(){

		$sql = "SELECT * FROM penyakit ORDER BY nama_latin_penyakit ASC";

		$query = $this->db->query($sql) or die ($this->db->error);

		return $query;

	}



	public function tampil_penyakit(){

		$sql = "SELECT patogen FROM penyakit GROUP BY id_patogen";

		$query = $this->db->query($sql) or die ($this->db->error);

		return $query;

	}



	public function input($id_patogen, $patogen, $nama_latin_penyakit){


	$this->db->query("INSERT INTO penyakit VALUES ('', '$id_patogen', '$patogen' ,'$nama_latin_penyakit')") or die ($this->db->error);

	}


	public function edit($sql){

		$this->db->query($sql);

	}


	public function view($sql){

		$this->db->query($sql);	

	}

	
	public function hapus($id){

		$this->db->query("DELETE FROM penyakit WHERE id ='$id'") or die ($this->db->error);

	}



} 



?>