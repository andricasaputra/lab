<?php 

namespace Lab\classes;

use Lab\config\Database;
use Lab\interfaces\SuperCetak;
use Lab\classes\init; 

$basepath = init::basePath();

define("LOGO", $basepath."/assets/img/logolabfix.jpg");
define("LOGOSKP", $basepath."/assets/img/logoskp4.jpg");
define("LOGOSKPBIASA", $basepath."/assets/img/logoskpfix.png");
define("LOGOKAN", $basepath."/assets/img/logolabfixkan.png");
define("LOGOSKPKAN", $basepath."/assets/img/logoskpkan.png");
define("LOGOHORIZONTAL", $basepath."/assets/img/logolabhorizontal.png");
define("BOXFIX", $basepath."/assets/img/boxfix.png");
define("CHECKFIX", $basepath."/assets/img/checkfix.png");
define("CHECK", $basepath."/assets/img/check1.png");
define("HTML2PDF", $basepath."/assets/html2pdf/html2pdf2.class.php");
define("SCANTTD", $basepath."/assets/img/");

abstract class LegacyCetak extends Database implements SuperCetak{

	protected $db,
	$conn,
	$logo = LOGO,
	$logoskp = LOGOSKP,
	$logoskpbiasa = LOGOSKPBIASA,
	$logohorizontal = LOGOHORIZONTAL,
	$logokan = LOGOKAN,
	$logoskpkan = LOGOSKPKAN,
	$boxfix = BOXFIX,
	$checkfix = CHECKFIX,
	$check = CHECK,
	$html2pdf = HTML2PDF,
	$scan = SCANTTD;
	public $backtop, $backleft, $backright, $backbottom;

	protected function __construct(){

		$this->conn = parent::getInstance();

		$this->db = $this->conn->getConnection();

	}

	public function getLogo(){
		return $this->logo;
	}

	public function getLogoSkp(){
		return $this->logoskp;
	}

	public function getLogoSkpBiasa(){
		return $this->logoskpbiasa;
	}

	public function getLogoKan(){
		return $this->logokan;
	}

	public function getLogoSkpKan(){
		return $this->logoskpkan;
	}

	public function getLogoHorizontal(){
		return $this->logohorizontal;
	}

	public function getBoxFix(){
		return $this->boxfix;
	}

	public function getCheckFix(){
		return $this->checkfix;
	}

	public function getCheck(){
		return $this->check;
	}

	public function getHtml2pdf(){
		return $this->html2pdf;
	}

	public function getscan(){
		return $this->scan;
	}

	/*Print Scan Tanda Tangan*/

	public function gambar($nama){

		$sql = "SELECT nama, ttd FROM gambar WHERE nama = '$nama'";

		$query = $this->db->query($sql) or die ($this->db->error);

		$ambil = $query->fetch_object();

		$ttd = $ambil->ttd;

		return $ttd;
	}

	public function setPageHTML2PDF($backbottom = null, $backtop = null, $backleft = null, $backright = null){

		$sql = "UPDATE html2pdf SET ";

		if ($backtop != null) {

			$this->backtop = $backtop;

			$sql .= " backtop = $backtop ";
		}

		if ($backbottom != null) {
			
			$this->backbottom = $backbottom;

			$sql .= ", backbottom = $backbottom ";
		}

		if ($backleft != null) {
			
			$sql .= ", backleft = $backleft ";
		}

		if ($backright != null) {
			
			$sql .= ", backright = $backright ";
		}

		$query = $this->db->query($sql) or die ($this->db->error);
		
		return $query;


	}

	public function getPageHTML2PDF(){

		$sql = "SELECT * FROM html2pdf";

		$query = $this->db->query($sql) or die ($this->db->error);

		while($page = $query->fetch_object()){

			$this->backtop = $page->backtop;
			$this->backbottom = $page->backbottom;
			$this->backleft = $page->backleft;
			$this->backright = $page->backright;

		}

		return $this;

	}

	abstract public function tampil($id=null);

	abstract public function Scan($id);
}

?>