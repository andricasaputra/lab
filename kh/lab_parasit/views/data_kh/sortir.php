<?php  


$today = $objectTanggal->now("Asia/Makassar");

if (@$_POST["is_date_search"] == "yes") {


    if(@$_POST["is_date_search"] == "yes" && @$_POST['choice'] == "all")
    {
     $sql .= "tanggal_acu_permohonan BETWEEN '".$_POST["start_date"]."' AND '".$_POST["end_date"]."' AND";

    }elseif (@$_POST["is_date_search"] == "yes" && @$_POST['choice'] == "done") {

     $sql .= "tanggal_acu_permohonan BETWEEN '".$_POST["start_date"]."' AND '".$_POST["end_date"]."' AND no_sertifikat !='' AND";

    }elseif (@$_POST["is_date_search"] == "yes" && @$_POST['choice'] == "not_yet") {

     $sql .= "tanggal_acu_permohonan BETWEEN '".$_POST["start_date"]."' AND '".$_POST["end_date"]."' AND no_sertifikat ='' AND";

    }elseif (@$_POST["is_date_search"] == "yes" && @$_POST['choice'] == "today") {

     $sql .= "tanggal_acu_permohonan BETWEEN '".$_POST["start_date"]."' AND '".$_POST["end_date"]."' AND tanggal_acu_permohonan = '".$today."' AND";

    }elseif (@$_POST["is_date_search"] == "yes" && @$_POST['choice'] == "todaycert") {

     $sql .= "tanggal_acu_permohonan BETWEEN '".$_POST["start_date"]."' AND '".$_POST["end_date"]."' AND tanggal_sertifikat = '".$today."' AND";

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

     $sql .= "tanggal_acu_permohonan =  '".$today."' AND";

    }elseif (@$_POST["is_date_search"] == "nodate" && @$_POST['choice'] == "todaycert") {

     $sql .= "tanggal_sertifikat = '".$objectTanggal->tgl_indo($today)."' AND";

    }

}


?>