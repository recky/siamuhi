<?php

if ((!isset($_SESSION["id"]))and(!isset($_SESSION["hak"]))) {
    header("location:index.php");
} elseif ((isset($_SESSION["id"]))and($_SESSION["hak"])==0) {
    ?>
<?include "head.php"?>
<link rel="stylesheet" href="assets/css/chosen.css"/>

<style type="text/css">
    .chzn-container-single .chzn-search input{
        width: 100%;
    }

</style>

<!-- JS -->
<script type="text/javascript" src="assets/js/jquery.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.js"></script>
<script type="text/javascript" src="assets/js/chosen.jquery.js"></script>
<script type="text/javascript">
    $(function(){
        $('.chzn-select').chosen();
        $('.chzn-select-deselect').chosen({allow_single_deselect:true});
    });

</script>

<div class="main-container-inner">
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

    <ul class="nav-list">
        <li>
            <a href="index.php">
                <i class="icon-dashboard"></i>
                <span class="menu-text"> Dashboard </span>
            </a>
        </li>

        <li>
            <a href="?content=statistik">
                <i class="icon-signal"></i>
                <span class="menu-text"> Statistik </span>
            </a>
        </li>
        <li>
            <a href="?content=editor">
                <i class="icon-pencil"></i>
                <span class="menu-text"> Posting </span>
            </a>
        </li>

        <li class="active open">
            <a href="#" class="dropdown-toggle">
                <i class="icon-user"></i>
                <span class="menu-text"> Pengguna</span>

                <b class="arrow icon-angle-down"></b>
            </a>

            <ul class="submenu">
                <li class="active">
                    <a href="?content=pengguna">
                        <i class="icon-double-angle-right"></i>
                        Input Data
                    </a>
                </li>

                <li>
                    <a href="?content=lihat">
                        <i class="icon-double-angle-right"></i>
                        Lihat Data
                    </a>
                </li>

            </ul>
        </li>

        <li>
            <a href="#" class="dropdown-toggle">
                <i class="icon-cog"></i>
                <span class="menu-text"> Pengaturan</span>

                <b class="arrow icon-angle-down"></b>
            </a>

            <ul class="submenu">
                <li>
                    <a href="tables.html">
                        <i class="icon-double-angle-right"></i>
                        Simple &amp; Dynamic
                    </a>
                </li>

                <li>
                    <a href="jqgrid.html">
                        <i class="icon-double-angle-right"></i>
                        jqGrid plugin
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

        <div class="container-fluid">
            <div class="row-fluid">
  <center><a class="btn btn-primary input-xlarge">Backup Database</a></center>
        <div class="row">
            <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->



                <div class="row">
                    <div class="space-6"></div>

                </div><!-- /span -->
            </div><!-- /row -->

            <div class="hr hr32 hr-dotted"></div>

            <div class="row">


            </div>

            <div class="hr hr32 hr-dotted"></div>

            <div class="row">
                <!-- /widget-box -->
            </div><!-- /span -->
            <!-- /span -->
        </div><!-- /row -->

        <!-- PAGE CONTENT ENDS -->
    </div><!-- /.col -->
</div><!-- /.row -->
</div>
<?php
}else {
    header("location:../index.php");
}
?>