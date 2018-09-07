<?php

session_start();

if(!isset($_SESSION['loginmakt'])){

    header("Location: ../index.php");

    exit;

}

require_once ('templates/header.php');

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



                if(isset($_SESSION['loginmakt'])) {

                    $id = $_SESSION['loginmakt'];

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

        <!-- /.dropdown-user -->

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

           

            <li>

                <a href="?page=data_permohonan"><i class="fa fa-table fa-fw"></i> Data Permohonan</a>

            </li>

            <li>

                <a href="#"><i class="fa fa-tasks fa-fw"></i> Manajer Administrasi<span class="fa arrow"></span></a>

                <ul class="nav nav-second-level">

                    <li>

                        <a href="?page=penerima_sampel"><i class="fa fa-user fa-fw"></i>Penerima Sampel</a>

                    </li>

                    <li>

                        <a href="?page=penyerahan_sampel"><i class="fa fa-leaf fa-fw"></i>Penyerahan Sampel </a>

                    </li>

                    <li>

                        <a href="?page=permintaan_kesiapan_pengujian"><i class="fa fa-dashboard fa-fw"></i>Permintaan Kesiapan</a>

                    </li>

                    <li>

                        <a href="?page=respon_permohonan"><i class="fa fa-file-text-o fa-fw"></i>Respon Permohonan </a>

                    </li>

                    

                </ul>

                <!-- /.nav-second-level -->

            </li>    

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

            if(@$_GET['page']=='dashboard'|| @$_GET['page']==''){

                require_once "views/dashboard.php";

            } elseif (@$_GET['page']=='data_permohonan'){

                require_once "views/data_permohonan.php";

            } elseif (@$_GET['page']=='penerima_sampel'){

                require_once "views/penerima_sampel.php";

            } elseif (@$_GET['page']=='permintaan_kesiapan_pengujian'){

                require_once "views/permintaan_kesiapan_pengujian.php";

            } elseif (@$_GET['page']=='respon_permohonan'){

                require_once "views/respon_permohonan_pengujian.php";

            } elseif (@$_GET['page']=='penyerahan_sampel'){

                require_once "views/penyerahan_sampel.php";

            } elseif(@$_GET['page'] == 'lihat_data_permohonan'){

                require_once('views/lihat_data_permohonan.php');

            }

            ?>

                      

            </div>    

        </div>   

    </div>



    <!-- /#page-wrapper -->

    

    <?php 



        require_once ('templates/footer.php'); 



    ?>





</body>



</html>



