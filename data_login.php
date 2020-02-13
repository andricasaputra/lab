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
