<?php

if ((!isset($_SESSION["id"]))and(!isset($_SESSION["hak"]))) {
    header("location:index.php");
} elseif ((isset($_SESSION["id"]))and(($_SESSION["hak"])==1)) {
    ?>
<link rel="stylesheet" href="assets/css/chosen.css" xmlns="http://www.w3.org/1999/html"/>

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
            <a href="#" class="dropdown-toggle ">
                <i class="icon-book"></i>
                <span class="menu-text"> Akademik</span>

                <b class="arrow icon-angle-down"></b>
            </a>

            <ul class="submenu">


                <li>
                    <a href="?content=jurusan">

                        Jurusan
                    </a>
                </li>
                <li>
                    <a href="?content=kmp">

                        Kategori Mata Pelajaran
                    </a>
                </li>
                <li>
                    <a href="?content=mapel">

                        Mata Pelajaran
                    </a>
                </li>
                <li>
                    <a href="?content=semester">

                        Semester
                    </a>
                </li>
                <li>
                    <a href="?content=kelas">

                        Kelas
                    </a>
                </li>
                <li>
                    <a href="?content=ta">

                        Tahun Ajaran
                    </a>
                </li>
                <li>
                    <a href="?content=aksiswa">

                        Akun Siswa
                    </a>
                </li>

            </ul>
        </li>

        <li>
            <a href="#" class="dropdown-toggle">
                <i class="icon-archive"></i>
                <span class="menu-text"> Keuangan</span>

                <b class="arrow icon-angle-down"></b>
            </a>

            <ul class="submenu">


                <li>
                    <a href="?content=jpemb">

                        Jenis Pembayaran
                    </a>
                </li>
                <li>
                    <a href="?content=transpemb">

                        Transaksi Pembayaran
                    </a>
                </li>

            </ul>
        </li>

        <li class="active open">
            <a href="#" class="dropdown-toggle">
                <i class="icon-check"></i>
                <span class="menu-text"> Lainnya</span>

                <b class="arrow icon-angle-down"></b>
            </a>

            <ul class="submenu">
                <li>
                    <a href="?content=pengajar">

                        Pengajar
                    </a>
                </li>

                <li>
                    <a href="?content=jadwal">

                        Jadwal Pelajaran
                    </a>
                </li>
                <li>
                    <a href="?content=lsiswa">
                        <i class="icon-double-angle-right"></i>
                        Data Siswa
                    </a>
                </li>
                <li class="active">
                    <a href="?content=dtpegawai">
                        <i class="icon-double-angle-right"></i>
                        Input Data Pegawai
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

                <?php
                if($_GET['jml']==''){
                    ?>
                  <div class="well">
                    <div class="container-fluid" style="width: 80%;height: auto;overflow: hidden;margin: auto">
                    <h3 style="text-align: center">Input Data Pegawai</h3>
                    <form class="form-horizontal" method='post' action='../dashbord/staff/indtpegawai.php' enctype="multipart/form-data">

                        <div style="margin: auto;width: 35%;border: 2px solid #c0c0c0;padding: 2%;float:left">
                            <center><h3>Persatu</h3></center>
                            <div class="control-group">
                                <label class="control-label">NIK</label>
                                <div class="controls">
                                    <input type="text" class="input-xlarge" name="nik" placeholder="Wajib diisi..."/>
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="control">
                                    <button type="submit" class="btn btn-primary input-xlarge" onfocus="cek1()"><i class="icon-check"></i>SIMPAN</button>
                                </div>
                            </div>

                        </div>
                    </form>

                    <form class="form-horizontal" method='get' action='index.php?' enctype="multipart/form-data">

                        <div style="margin: auto;width: 35%;border: 2px solid #c0c0c0;padding: 2%;float:right;">
                            <center><h3>Masal</h3></center>
                            <div class="control-group">
                                <input type="text" name="content" value="dtpegawai" class="hidden"/>
                                <label class="control-label">Jumlah yang akan dimasukkan</label>
                                <div class="controls">
                                    <select name="jml" class="input-xlarge"/>
                                    <?php $t=1;
                                    while($t<=50){
                                        echo"<option value='$t'>$t</option>";
                                        $t=$t+1;
                                    }?>
                                    </select>
                                </div>
                            </div>

                            <div class="control-group">
                                <div class="control">
                                    <button type="submit" class="btn btn-primary input-xlarge"><i class="icon-check"></i>SIMPAN</button>
                                </div>
                            </div>

                        </div>
                    </form>
                    <?php }else{?>
                    <form class="form-horizontal" method='post' action='../dashbord/staff/indtpegawaiby.php' enctype="multipart/form-data">

                        <div style="margin: auto;width: 80%;border: 2px solid #c0c0c0;padding: 2%;">
                            <center><h3>Input Login Siswa Masal</h3></center>
                            <input type="text" class="hidden" name="jumlah" value="<?php echo $_GET['jml'];?>"/>
                            <div class="control-group">
                                <div class="controls">
                                    <?php
                                    $jm=$_GET['jml'];
                                    $mlai=1;
                                    while($mlai<=$jm){
                                        echo"<input type='text' class='input-xlarge' name='nik$mlai' placeholder='$mlai.NIK'/>";
                                        $mlai++;
                                    }
                                    ?>
                                </div>
                            </div>

                            <div class="control-group">
                                <div class="control">
                                    <button type="submit" class="btn btn-primary input-xlarge"><i class="icon-check"></i>SIMPAN</button>
                                    <a href="index.php?content=dtpegawai" class="btn btn-danger input-xlarge"><i class="icon-off"></i>BATAL</a>
                                </div>
                            </div>
                    </form>
                    <?php }?>
            </div>
            </div>



            </div>
            <?php
            $mod=(isset($_GET["mod"]));
            if($mod==""){$mod="/super/kosong.php";}
            else{$mod=$_GET["mod"].".php";}
            include "$mod";
            ?>

            <?php include"ldtpegawai.php";?>
        </div>
    </div><!-- /.page-content -->
</div><!-- /.row -->

<!-- PAGE CONTENT ENDS -->

<?php
}else {
    header("location:../index.php");
}
?>