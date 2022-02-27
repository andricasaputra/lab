<?php

namespace Lab\classes;

use Lab\classes\init;
use Lab\config\Database;
use Lab\interfaces\SuperCetak;

$basepath = init::basePath();
$imagesPath = init::imagesPath();

define("LOGO", $imagesPath . "/logolabfix.jpg");
define("LOGOSKP", $imagesPath . "/logoskp4.jpg" );
define("LOGOSKPBIASA", $imagesPath . "/logoskpfix.png");
define("LOGOKAN", $imagesPath . "/logolabfixkan.png");
define("LOGOSKPKAN", $imagesPath . "/logoskpkan.png");
define("LOGOHORIZONTAL", $imagesPath . "/logolabhorizontal.png");
define("BOXFIX", $imagesPath . "/boxfix.png");
define("CHECKFIX", $imagesPath . "/checkfix.png");
define("CHECK", $imagesPath . "/check1.png");
define("HTML2PDF", $basepath . "/vendor/spipu/html2pdf/src/Html2Pdf.php");
define("SCANTTD", $imagesPath);

abstract class LegacyCetak extends Database implements SuperCetak
{
  
    private $logo   = LOGO,
    $logoskp        = LOGOSKP,
    $logoskpbiasa   = LOGOSKPBIASA,
    $logohorizontal = LOGOHORIZONTAL,
    $logokan        = LOGOKAN,
    $logoskpkan     = LOGOSKPKAN,
    $boxfix         = BOXFIX,
    $checkfix       = CHECKFIX,
    $check          = CHECK,
    $html2pdf       = HTML2PDF,
    $scan           = SCANTTD;

    protected $db, $conn;
    
    public $backtop, $backleft, $backright, $backbottom;

    abstract protected function tampil($id = null);

    abstract protected function Scan($id);

    abstract protected function print_agenda($tgl1, $tgl2);

    abstract protected function CetakForBukuHarianDatek($tgl);

    abstract protected function GetIdCetakForBukuHarianDatek($id);

    abstract protected function CetakForLembarKerjaDatek($tgl);

    abstract protected function GetIdCetakForLembarKerjaDatek($id);

    protected function __construct()
    {

        $this->conn = parent::getInstance();

        $this->db = $this->conn->getConnection();

    }

    public function getProtocol()
    {
        return (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https://" : "http://");
    }

    public function getLogo()
    {
        return $this->getProtocol() . $this->logo;
    }

    public function getLogoSkp()
    {
        return $this->getProtocol() . $this->logoskp;
    }

    public function getLogoSkpBiasa()
    {
        return $this->getProtocol() . $this->logoskpbiasa;
    }

    public function getLogoKan()
    {
        return $this->getProtocol() . $this->logokan;
    }

    public function getLogoSkpKan()
    {
        return $this->getProtocol() . $this->logoskpkan;
    }

    public function getLogoHorizontal()
    {
        return $this->getProtocol() . $this->logohorizontal;
    }

    public function getBoxFix()
    {
        return $this->getProtocol() . $this->boxfix;
    }

    public function getCheckFix()
    {
        return $this->getProtocol() . $this->checkfix;
    }

    public function getCheck()
    {
        return $this->getProtocol() . $this->check;
    }

    public function getHtml2pdf()
    {
        return $this->html2pdf;
    }

    public function getScanTtd($nip = NULL, $nama = NULL)
    {
        $ttd = "SELECT gambar FROM tbl_ttd WHERE nip = '$nip' AND nama = '$nama' ";

        $query = $this->db->query($ttd) or die($this->db->error);

        $fetch =  $query->fetch_object();

        $path = $this->getProtocol() . $this->scan ;

        $gambar = $fetch->gambar ?? 'blank.png';

        return  $path . '/' . $gambar;
    }

    public function getPejabat($nip_kepala_plh)
    {
        $query = "SELECT * FROM pejabat_kh WHERE nip = '$nip_kepala_plh'; ";

        $query = $this->db->query($query) or die($this->db->error);

        return  $query->fetch_object();
    }
  
}
