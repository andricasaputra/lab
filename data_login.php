<?php
$data = $tampil->fetch_object();
$id    = $data->id;

if ($data->jabatan == 'superadminkh') {

    $_SESSION['loginsuperkh'] = $id;
    header('Location: kh/super_admin.php ');
    exit;

}elseif($data->jabatan == 'superadminkt'){

    $_SESSION['loginsuperkt'] = $id;
    header('Location: kt/super_admin.php ');
    exit;

}elseif($data->jabatan == 'administratorkh'){

    $_SESSION['loginadminkh'] = $id;
    header('Location: kh/admin.php ');
    exit;

}elseif($data->jabatan == 'administratorkt'){

    $_SESSION['loginadminkt'] = $id;
    header('Location: kt/admin.php');
    exit;

}elseif($data->jabatan == 'manajer_puncak' || $data->jabatan == 'manajer_mutu' || $data->jabatan == 'manajer_administrasi'){

    if ($data->lab == 'kt') {

        $_SESSION['loginadminkt'] = $id;
        header('Location: kt/admin.php');
        exit;

    } else {

        $_SESSION['loginadminkh'] = $id;
        header('Location: kh/admin.php ');
        exit;
    }
    
}elseif($data->jabatan == 'deputi_manajer_administrasi' || $data->jabatan == 'penerima_sampel'){

    if ($data->lab == 'kt') {

        $_SESSION['loginmakt'] = $id;
        header('Location: kt/index.php');
        exit;

    } else {

        $_SESSION['loginmakh'] = $id;
        header('Location: kh/index.php');
        exit;
    }
    
}elseif($data->jabatan == 'manajer_teknis' || $data->jabatan == 'pengelola_sampel'){

    if ($data->lab == 'kt') {

        $_SESSION['loginmtkt'] = $id;
        header('Location: kt/manajer_teknis.php');
        exit;

    } else {

        $_SESSION['loginmtkh'] = $id;
        header('Location: kh/manajer_teknis.php');
        exit;
    }
    
}elseif($data->jabatan == 'penyelia' || $data->jabatan == 'analis'){

    if ($data->lab == 'kt') {

        $_SESSION['loginlabkt'] = $id;
        header('Location: kt/pengujian.php');
        exit;

    } else {

        $_SESSION['loginlabkh'] = $id;
        header('Location: kh/pengujian.php');
        exit;
    }
    
}elseif($data->jabatan == 'pembuat_lhu'){

    if ($data->lab == 'kt') {

        $_SESSION['loginlhukt'] = $id;
        header('Location: kt/lhu.php');
        exit;

    } else {

        $_SESSION['loginlhukh'] = $id;
        header('Location: kh/lhu.php');
        exit;
    }
    
}
/*if ($username == 'superadminkh') {
    $_SESSION['loginsuperkh'] = $id;
    header('Location: kh/super_admin.php ');
    exit;
}elseif ($username == 'superadminkt') {
    $_SESSION['loginsuperkt'] = $id;
    header('Location: kt/super_admin.php ');
    exit;
}elseif ($username == 'adminkh') {
    $_SESSION['loginadminkh'] = $id;
    header('Location: kh/admin.php ');
    exit;
}elseif ($username == 'adminkt') {
    $_SESSION['loginadminkt'] = $id;
    header('Location: kt/admin.php');
    exit;
}elseif ($username == 'ibp_rakakh') {
    $_SESSION['loginadminkh'] = $id;
    header('Location: kh/admin.php');
    exit;
}elseif ($username == 'ibp_rakakt') {
    $_SESSION['loginadminkt'] = $id;
    header('Location: kt/admin.php');
    exit;
}elseif ($username == 'abd_salamkh') {
    $_SESSION['loginadminkh'] = $id;
    header('Location: kh/admin.php');
    exit;
}elseif ($username == 'abd_salamkt') {
    $_SESSION['loginadminkt'] = $id;
    header('Location: kt/admin.php');
    exit;
}elseif ($username == 'm_ridwankh') {
    $_SESSION['loginadminkh'] = $id;
    header('Location: kh/admin.php');
    exit;
}elseif ($username == 'm_ridwankt') {
    $_SESSION['loginadminkt'] = $id;
    header('Location: kt/admin.php');
    exit;
}elseif ($username == 'm_tamrinkh') {
    $_SESSION['loginmakh'] = $id;
    header('Location: kh/index.php');
    exit;
}elseif ($username == 'm_tamrinkt') {
    $_SESSION['loginmakt'] = $id;
    header('Location: kt/index.php');
    exit;
}elseif ($username == 'drh_prionomt') {
    $_SESSION['loginmtkh'] = $id;
    header('Location: kh/manajer_teknis.php');
    exit;
}elseif ($username == 'iketut_sindia') {
    $_SESSION['loginmtkt'] = $id;
    header('Location: kt/manajer_teknis.php');
    exit;
}elseif ($username == 'drh_priono') {
    $_SESSION['loginlabkh'] = $id;
    header('Location: kh/pengujian.php');
    exit;
}elseif ($username == 'drh_wira') {
    $_SESSION['loginlabkh'] = $id;
    header('Location: kh/pengujian.php');
    exit;
}elseif ($username == 'sindia_iketut') {
    $_SESSION['loginlabkt'] = $id;
    header('Location: kt/pengujian.php');
    exit;
}elseif ($username == 'fatma_dyas') {
    $_SESSION['loginlabkt'] = $id;
    header('Location: kt/pengujian.php');
    exit;
}elseif ($username == 'darsiah') {
    $_SESSION['loginlabkh'] = $id;
    header('Location: kh/pengujian.php');
    exit;
}elseif ($username == 'musallamatun_anls') {
    $_SESSION['loginlabkh'] = $id;
    header('Location: kh/pengujian.php');
    exit;
}elseif ($username == 'sari_rosmawati_anls') {
    $_SESSION['loginlabkh'] = $id;
    header('Location: kh/pengujian.php');
    exit;
}elseif ($username == 'siska_murtini') {
    $_SESSION['loginlabkh'] = $id;
    header('Location: kh/pengujian.php');
    exit;
}elseif ($username == 'dyas_fatma') {
    $_SESSION['loginlabkt'] = $id;
    header('Location: kt/pengujian.php');
    exit;
}elseif ($username == 'elysa_fitri') {
    $_SESSION['loginlabkt'] = $id;
    header('Location: kt/pengujian.php');
    exit;
}elseif ($username == 'sari_rosmawati') {
    $_SESSION['loginmtkh'] = $id;
    header('Location: kh/manajer_teknis.php');
    exit;
}elseif ($username == 'andrica') {
    $_SESSION['loginmtkt'] = $id;
    header('Location: kt/manajer_teknis.php');
    exit;
}elseif ($username == 'musallamatun') {
    $_SESSION['loginmakh'] = $id;
    header('Location: kh/index.php');
    exit;
}elseif ($username == 'asiah') {
    $_SESSION['loginmakh'] = $id;
    header('Location: kh/index.php');
    exit;
}elseif ($username == 'tri_suparyanto') {
    $_SESSION['loginmakt'] = $id;
    header('Location: kt/index.php');
    exit;
}elseif ($username == 'lis_indrayani') {
    $_SESSION['loginlhukh'] = $id;
    header('Location: kh/lhu.php');
    exit;
}elseif ($username == 'tri_suparyanto_pl') {
    $_SESSION['loginlhukt'] = $id;
    header('Location: kt/lhu.php');
    exit;
}*/
