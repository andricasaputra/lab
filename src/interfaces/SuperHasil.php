<?php 

namespace Lab\interfaces;

interface SuperHasil {

	public function __construct();

	public function tampil($id=null);

	public function tampil_hasil($id);

	public function input_ulang($id2);	

	public function edit($query);

	public function view($sql);

	public function hapus($id);

	public function checkHasilPengujian($id);

} 


?>