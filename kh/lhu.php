<?php

session_start();

if(!isset($_SESSION['loginlhukh'])){

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



                if(isset($_SESSION['loginlhukh'])) {

                    $id = $_SESSION['loginlhukh'];

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

            <li><i class="fa fa-gear fa-fw"></i> <?php echo $data->nama_jabatan; ?>

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

<?php  

if (@$_GET['lab'] == 'parasit') :

    require_once "menu/menu_parasit_lhu.php";
    

elseif (!@$_GET['lab'] || @$_GET['lab'] == 'bakteri') :
           
    require_once "menu/menu_bakteri_lhu.php";

endif;


require_once ('templates/footer.php'); 

?>


</body>



</html>



