<?php  

namespace Lab\interfaces;

interface SuperExport{

	public function __construct();
	
	public function mainExport($tgl1=null, $tgl2=null);

	public function exportDataTeknis($tgl1=null, $tgl2=null);

	public function exportSertifikat($tgl1=null, $tgl2=null);

	public function exportSuratHasilUji($tgl1=null, $tgl2=null);


}


?>