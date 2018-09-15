<?php

session_start();

if (!isset($_SESSION['loginlabkt'])) {

    header("Location: ../index.php");

    exit;

}

require_once 'templates/header.php';

?>

<body>



    <div id="wrapper">

        <nav class="navbar navbar-default navbar-fixed-top " role="navigation" >

            <div class="navbar-header">

                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">

                <span class="sr-only">Toggle navigation</span>

                <span class="icon-bar"></span>

                <span class="icon-bar"></span>

                <span class="icon-bar"></span>

                </button>

                <button id="menu-toggle" type="button" data-toggle="button" class="btn btn-info2 btn-xs btn-circle">

                <span class="push"><i class="fa fa-chevron-left"></i></span>

                </button>

                <button id="menu-toggle2" type="button" data-toggle="button" class="btn btn-info2 btn-xs btn-circle">

                <span class="push"><i class="fa fa-chevron-right"></i></span>

                </button>

                <a class="navbar-brand" href="#"><img src="../assets/img/silelogo.jpg" width="40px" class="gambarBrand"><span class="brand2">Sistem Informasi</span> <span class="brand">LABORATORIUM Elektronik</span></a>

            </div>

            <!-- /.navbar-header -->



            <ul class="nav navbar-top-links navbar-right">

                <?php

                if (isset($_SESSION['loginlabkt'])) {

                    $id = $_SESSION['loginlabkt'];

                }

                $tampil = $objectData->tampil_nama($id);

                $data = $tampil->fetch_object();

                echo $data->nama;

                ?>



                <!-- /.dropdown -->

                <li class="dropdown">

                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">

                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>

                    </a>

                    <ul class="dropdown-menu dropdown-user">

                        <li><i class="fa fa-gear fa-fw"></i><?php echo $data->nama_jabatan; ?>

                        </li>

                        <li class="divider"></li>

                        <li><a href="../logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>

                    </li>

                </ul>

            </li>

            <!-- /.dropdown -->

        </ul>

        <!-- /.navbar-top-links -->



        <div class="navbar-default navbar-static-side" role="navigation" id="side">

            <div class="sidebar-collapse">

                <ul class="nav" id="side-menu">

                    <li>

                        <a href="?page=dashboard"><i class="fa fa-home fa-fw"></i> Dashboard</a>

                    </li>



                    <li class="activE">

                        <a><i class="fa fa-flask fa-fw" ></i>Pengujian</a>

                    </li>

                    <ul class="nav">

                        <li>

                            <a href="?page=data_teknis"><i class="fa fa-file-text fa-fw" ></i>Data Teknis</a>

                        </li>

                        <li>

                            <a href="?page=sertifikat"><i class="fa fa-check-square fa-fw" ></i>Hasil Pengujian</a>

                        </li>

                    </ul>

                    <!-- /.nav-second-level -->



                </ul>

                <!-- /#side-menu -->

            </div>

            <!-- /.sidebar-collapse -->

        </div>

        <!-- /.navbar-static-side -->

    </nav>

</div>



<div id="page-wrapper">

    <div class="row">

        <div class="col-lg-12">

            <?php

            if (@$_GET['page'] == 'dashboard' || @$_GET['page'] == '') {

                require_once "views/dashboard_penguji.php";

            } elseif (@$_GET['page'] == 'penyelia_analis') {

                require_once "views/penyelia_analis.php";

            } elseif (@$_GET['page'] == 'data_teknis') {

                require_once "views/data_teknis.php";

            } elseif (@$_GET['page'] == 'sertifikat') {

                require_once "views/sertifikat.php";

            } elseif (@$_GET['page'] == 'lihat_data_permohonan') {

                require_once 'views/lihat_data_permohonan.php';

            }

            ?>



        </div>

    </div>

</div>



<!-- /#page-wrapper -->



<?php

require_once 'templates/footer.php';

?>





</body>



</html>