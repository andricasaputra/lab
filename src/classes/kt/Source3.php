<?php

namespace Lab\classes\kt;

use Lab\config\Database;

class Source3 extends Database{

	private $conn;
	private $db;

	public function __construct(){

		$this->db = $this->getInstance()->getConnection();
	}

	

	public function tampil($id_pejabat=null){

		$sql = "SELECT * FROM pejabat2";

		if($id_pejabat !=null){

			$sql .= " WHERE id_pejabat=$id_pejabat";

		}

		$query = $this->db->query($sql) or die ($this->db->error);

		return $query;

	}





	public function input($nama_pejabat, $nip_pejabat){

	

	$this->db->query("INSERT INTO pejabat2 VALUES ('', '$nama_pejabat', '$nip_pejabat')") or die ($this->db->error);

	}





	public function edit($sql){

		$this->db->query($sql);

	}





	public function view($sql){

		$this->db->query($sql);

		

	}

	

	public function hapus($id_pejabat){

		$this->db->query("DELETE FROM pejabat2 WHERE id_pejabat='$id_pejabat'") or die ($this->db->error);

	}


} 



?>