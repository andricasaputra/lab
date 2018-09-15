<?php
if (isset($_SESSION['loginsuperkh'])) {
    header("Location: kh/super_admin.php");
    exit;
} elseif (isset($_SESSION['loginsuperkt'])) {
    header("Location: kt/super_admin.php");
    exit;
} elseif (isset($_SESSION['loginadminkh'])) {
    header("Location: kh/admin.php");
    exit;
} elseif (isset($_SESSION['loginadminkt'])) {
    header("Location: kt/admin.php");
    exit;
} elseif (isset($_SESSION['loginmakh'])) {
    header("Location: kh/index.php");
    exit;
} elseif (isset($_SESSION['loginmakt'])) {
    header("Location: kt/index.php");
    exit;
} elseif (isset($_SESSION['loginmtkh'])) {
    header("Location: kh/manajer_teknis.php");
    exit;
} elseif (isset($_SESSION['loginmtkt'])) {
    header("Location: kt/manajer_teknis.php");
    exit;
} elseif (isset($_SESSION['loginlabkh'])) {
    header("Location: kh/pengujian.php");
    exit;
} elseif (isset($_SESSION['loginlabkt'])) {
    header("Location: kt/pengujian.php");
    exit;
} elseif (isset($_SESSION['loginlhukh'])) {
    header("Location: kh/lhu.php");
    exit;
} elseif (isset($_SESSION['loginlhukt'])) {
    header("Location: kt/lhu.php");
    exit;
}
