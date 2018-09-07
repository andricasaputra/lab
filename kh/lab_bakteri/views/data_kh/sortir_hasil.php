<?php  

$today = $objectTanggal->now();

if (@$_POST["is_date_search"] == "yes") {


    if(@$_POST["is_date_search"] == "yes" && @$_POST['choice'] == "all")
    {
     $sql .= "DATE(waktu_apdate_sertifikat) BETWEEN '".$_POST["start_date"]."' AND '".$_POST["end_date"]."' AND";

    }elseif (@$_POST["is_date_search"] == "yes" && @$_POST['choice'] == "done") {

     $sql .= "DATE(waktu_apdate_sertifikat) BETWEEN '".$_POST["start_date"]."' AND '".$_POST["end_date"]."' AND no_sertifikat !='' AND";

    }elseif (@$_POST["is_date_search"] == "yes" && @$_POST['choice'] == "not_yet") {

     $sql .= "DATE(waktu_apdate_sertifikat) BETWEEN '".$_POST["start_date"]."' AND '".$_POST["end_date"]."' AND no_sertifikat ='' AND";

    }elseif (@$_POST["is_date_search"] == "yes" && @$_POST['choice'] == "today") {

     $sql .= "DATE(waktu_apdate_sertifikat) BETWEEN '".$_POST["start_date"]."' AND '".$_POST["end_date"]."' AND tanggal_acu_permohonan = '".$today."' AND";

    }elseif (@$_POST["is_date_search"] == "yes" && @$_POST['choice'] == "todaycert") {

     $sql .= "DATE(waktu_apdate_sertifikat) BETWEEN '".$_POST["start_date"]."' AND '".$_POST["end_date"]."' AND tanggal_sertifikat = '".$today."' AND";

    }

}elseif(@$_POST["is_date_search"] == "nodate"){

    if(@$_POST["is_date_search"] == "nodate" && @$_POST['choice'] == "all")
    {
     $sql .= "";

    }elseif (@$_POST["is_date_search"] == "nodate" && @$_POST['choice'] == "done") {

     $sql .= "no_sertifikat !='' AND";

    }elseif (@$_POST["is_date_search"] == "nodate" && @$_POST['choice'] == "not_yet") {

     $sql .= "no_sertifikat ='' AND";

    }elseif (@$_POST["is_date_search"] == "nodate" && @$_POST['choice'] == "today") {

     $sql .= "tanggal_acu_permohonan BETWEEN '".$today."' AND '".$today."' AND";

    }elseif (@$_POST["is_date_search"] == "nodate" && @$_POST['choice'] == "todaycert") {

     $sql .= "tanggal_sertifikat BETWEEN '".$objectTanggal->tgl_indo($today)."' AND '".$objectTanggal->tgl_indo($today)."' AND";

    }

}

?>