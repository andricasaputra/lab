<?php

namespace Lab\classes;

use Lab\classes\Init;
use Lab\config\Database;
use Lab\interfaces\SuperCetak;

$basepath = Init::basePath();
$imagesPath = Init::imagesPath();

define("LOGO", $imagesPath . "/logolab.png");
define("LOGOSKP", $imagesPath . "/logoskp.png" );
define("LOGOSKPBIASA", $imagesPath . "/logoskpfix.png");
define("LOGOKAN", $imagesPath . "/logolabkan.png");
define("LOGOSKPKAN", $imagesPath . "/logoskpkan.png");
define("LOGOHORIZONTAL", $imagesPath . "/logolabhorizontal.png");
define("BOXFIX", $imagesPath . "/boxfix.png");
define("CHECKFIX", $imagesPath . "/checkfix.png");
define("CHECK", $imagesPath . "/check1.png");
define("HTML2PDF", $basepath . "/vendor/spipu/html2pdf/src/Html2Pdf.php");
define("LOGOKANBARU", $imagesPath . "/logo-kan-baru.png");
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
    $scan           = SCANTTD,
    $logokanbaru    = LOGOKANBARU;

    protected $db, $conn, $prootocol = 'http://';
    
    public  $backtop, 
    $backleft, 
    $backright, 
    $backbottom, 
    $title_dokumen,
    $rev = '; Ter.4; Rev.0; 12/01/2022',
    $jenis_karantina = 'kh',
    $kode_dokumen   = '',
    $kode_karantina = 'H'; // "H = Hewan, T = Tumbuhan"

    abstract protected function tampil($id = null);

    abstract protected function Scan($id);

    abstract protected function print_agenda($tgl1, $tgl2, $lab = NULL);

    abstract protected function CetakForBukuHarianDatek($tgl);

    abstract protected function GetIdCetakForBukuHarianDatek($id);

    abstract protected function CetakForLembarKerjaDatek($tgl);

    abstract protected function GetIdCetakForLembarKerjaDatek($id);

    protected function __construct()
    {

        $this->conn = parent::getInstance();

        $this->db = $this->conn->getConnection();

        $this->prootocol = (isset($_SERVER['HTTPS']) 
            && $_SERVER['HTTPS'] === 'on' 
            ? "https://" 
            : $this->prootocol);

    }

    public function getLogo()
    {
        return $this->prootocol . $this->logo;
    }

    public function getLogoSkp()
    {
        return $this->prootocol . $this->logoskp;
    }

    public function getLogoSkpBiasa()
    {
        return $this->prootocol . $this->logoskpbiasa;
    }

    public function getLogoKan()
    {
        return $this->prootocol . $this->logokan;
    }

    public function getLogoSkpKan()
    {
        return $this->prootocol . $this->logoskpkan;
    }

    public function getLogoHorizontal()
    {
        return $this->prootocol . $this->logohorizontal;
    }

    public function getBoxFix()
    {
        return $this->prootocol . $this->boxfix;
    }

    public function getCheckFix()
    {
        return $this->prootocol . $this->checkfix;
    }

    public function getCheck()
    {
        return $this->prootocol . $this->check;
    }

    public function getLogoKanBaru()
    {
        return $this->prootocol . $this->logokanbaru;
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

        $path = $this->prootocol . $this->scan ;

        $gambar = $fetch->gambar ?? 'blank.png';

        return  $path . '/' . $gambar;
    }

    public function getPejabat($nip)
    {
        $query = "SELECT * FROM pejabat_kh WHERE nip = '$nip'; ";

        $query = $this->db->query($query) or die($this->db->error);

        return  $query->fetch_object();
    }

    public function setNamaDokumen($alias = NULL, $jenis = NULL, $kt = true)
    {
        if (strpos($alias, 'multi')) {
            $alias = str_replace('_multi', '', $alias);
        }

        $query = "SELECT * FROM kode_dokumen WHERE alias = '$alias'; ";

        $query = $this->db->query($query) or die($this->db->error);

        $data = $query->fetch_object();

        if($jenis == NULL){

            $this->kode_karantina = 'H';

            $namalab = '';

        } elseif($jenis == 'kh') {

            $this->kode_karantina = 'H';

            $namalab = 'Karantina Hewan';
        
        } elseif($jenis == 'kt' && $kt === true) {

            $this->kode_karantina = 'T';

            $namalab = 'Karantina Tumbuhan';

        }  else {

            $this->kode_karantina = 'T';

            $namalab = '';
        } 

        $this->title_dokumen = $data->nama_dokumen . ' '. strtoupper($namalab);

        $this->kode_dokumen = $data->kode . ' ' . $this->kode_karantina . $this->rev;
    }
  
}
