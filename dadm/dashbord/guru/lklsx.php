<?php

if ((!isset($_SESSION["id"]))and(!isset($_SESSION["hak"]))) {
    header("location:index.php");
} elseif ((isset($_SESSION["id"]))and(($_SESSION["hak"])==2)) {
    ?>
<style>
    p{
        word-wrap: break-word;
    }
</style>
<a class="menu-toggler" id="menu-toggler" href="#">
    <span class="menu-text"></span>
</a>

<div class="sidebar" id="sidebar">
    <script type="text/javascript">
        try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
    </script>

    <div class="sidebar-shortcuts" id="sidebar-shortcuts">
        <div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
            <button class="btn-danger"><?php include("hari.php");?></button>

        </div>

        <div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
            <span class="btn btn-success"></span>

            <span class="btn btn-info"></span>

            <span class="btn btn-warning"></span>

            <span class="btn btn-danger"></span>
        </div>
    </div><!-- #sidebar-shortcuts -->

    <ul class="nav nav-list">
        <li>
            <a href="?content=dashboard">
                <i class="icon-dashboard"></i>
                <span class="menu-text"> Dashboard </span>
            </a>
        </li>

        <li>
            <a href="?content=editor">
                <i class="icon-pencil"></i>
                <span class="menu-text"> Posting </span>
            </a>
        </li>

        <li>
            <a href="#" class="dropdown-toggle">
                <i class="icon-book"></i>
                <span class="menu-text"> Input Nilai</span>

                <b class="arrow icon-angle-down"></b>
            </a>

            <ul class="submenu">
                <li>
                    <a href="?content=inklsx">
                        <i class="icon-double-angle-right"></i>
                        Kelas X
                    </a>
                </li>
                <li>
                    <a href="?content=inklsxi">
                        <i class="icon-double-angle-right"></i>
                        Kelas XI
                    </a>
                </li>
                <li>
                    <a href="?content=inklsxii">
                        <i class="icon-double-angle-right"></i>
                        Kelas XII
                    </a>
                </li>
            </ul>
        </li>
        <li class="active">
            <a href="#" class="dropdown-toggle">
                <i class="icon-list"></i>
                Lihat &amp; Pencari Data
            </a>

        </li>
        <li>
            <a href="#" class="dropdown-toggle">
                <i class="icon-check"></i>
                Absensi
                <b class="arrow icon-angle-down"></b>
            </a>
            <ul class="submenu">
                <li>
                    <a href="?content=abklsx">
                        <i class="icon-double-angle-right"></i>
                        Kelas X
                    </a>
                </li>
                <li>
                    <a href="?content=abklsxi">
                        <i class="icon-double-angle-right"></i>
                        Kelas XI
                    </a>
                </li>
                <li>
                    <a href="?content=abklsxii">
                        <i class="icon-double-angle-right"></i>
                        Kelas XII
                    </a>
                </li>
            </ul>
        </li>
    </ul><!-- /.nav-list -->

    <div class="sidebar-collapse" id="sidebar-collapse">
        <i class="icon-double-angle-left" data-icon1="icon-double-angle-left" data-icon2="icon-double-angle-right"></i>
    </div>

    <script type="text/javascript">
        try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
    </script>
</div>

<div class="main-content">
    <div class="breadcrumbs" id="breadcrumbs">
        <script type="text/javascript">
            try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
        </script>

        <ul class="breadcrumb">
            <li>
                <i class="icon-home home-icon"></i>
                <a href="#">Home</a>
            </li>
            <li class="active">Dashboard</li>
        </ul><!-- .breadcrumb -->


    </div>

    <div class="page-content">
        <?php
        $mod=(isset($_GET["mod"]));
        if($mod==""){$mod="/super/kosong.php";}
        else{$mod=$_GET["mod"].".php";}
        include "$mod";
        ?>

        <?php include"ldtsiswa.php";?>

        <!-- PAGE CONTENT ENDS -->
    </div><!-- /.col -->
</div><!-- /.row -->
</div><!-- /.page-content -->
<?php
}else {
    header("location:../index.php");
}
?>