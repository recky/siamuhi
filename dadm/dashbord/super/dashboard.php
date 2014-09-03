<?php

if ((!isset($_SESSION["id"]))and(!isset($_SESSION["hak"]))) {
    header("location:index.php");
} elseif ((isset($_SESSION["id"]))and($_SESSION["hak"])==0) {
    ?>
<style>
    p{
        word-wrap: break-word;
    }
</style>
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
            <li class="active">
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

            <li>
                <a href="#" class="dropdown-toggle">
                    <i class="icon-user"></i>
                    <span class="menu-text"> Pengguna</span>

                    <b class="arrow icon-angle-down"></b>
                </a>

                <ul class="submenu">
                    <li>
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
                <a href="?content=tampback">
                    <i class="icon-cog"></i>
                    <span class="menu-text"> Pengaturan</span>

                </a>

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

<div class="page-header">


    <h1>
        Dashboard

    </h1>
<div class="alert alert-block alert-success">
    <button type="button" class="close" data-dismiss="alert">
        <i class="icon-remove"></i>
    </button>

<?php
    include "konek.php";
        $query="Select * from info_konten where status=1 and (akses='admin' or akses='semua') order by tgl desc";
        $hasil=mysql_query($query);
        while($row=mysql_fetch_array($hasil)){
        echo"<strong class='green'>".
            "<h2><i class='icon-ok green'></i>$row[judul] </h2>".
            "</strong>".
            "<i class='icon-pencil'></i> : $row[nama]".
            "&nbsp &nbsp <i class='icon-calendar'></i> : $row[tgl]".
            "<p>$row[konten]</p>".
        "<hr></hr>";
        }
    ?>


</div>

</div><!-- /.page-header -->




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