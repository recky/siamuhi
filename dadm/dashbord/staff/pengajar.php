<?php

if ((!isset($_SESSION["id"]))and(!isset($_SESSION["hak"]))) {
    header("location:index.php");
} elseif ((isset($_SESSION["id"]))and(($_SESSION["hak"])==1)) {
    ?>
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
                <li class="active">
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
                <li>
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
                    <?php if($_GET['edit']==1){?>
                <form class="form-horizontal  well" method='post' action='../dashbord/staff/epengajar.php' enctype="multipart/form-data">
                    <center><h3>Edit Guru Pengajar</h3>
                        <table>
                            <tr><td></td><td>
                                <div class="control-group">
                                    <div class="controls">
                                        <input type="text" value="<?php echo $_GET['id'];?>" hidden="hidden" name="id"/>
                                        <select tabindex="5" class="chzn-select input-xlarge" name="nik"data-placeholder="Pilih Nama Guru">
                                            <option value=""></option>
                                            <?php
                                            include ("konek.php");
                                            $qs=mysql_query("select * from pengajar where id='$_GET[id]'");
                                            $hcr=mysql_fetch_array($qs);
                                            $qnik="select * from staff";
                                            $hslnik=mysql_query($qnik);
                                            while($rownik=mysql_fetch_array($hslnik)){
                                                if($hcr['NIK']==$rownik['nik']){$tnd="selected=selected";}else{$tnd="";}
                                                echo "<option name='nik' value='$rownik[nik]'".$tnd.">".$rownik[nama]."</option>";
                                            };

                                            ?>

                                        </select>
                                    </div>
                                </div>
                            </td><td>

                                <div class="control-group">
                                    <div class="controls">

                                        <select tabindex="5" class="chzn-select input-xlarge" name="kodemapel"data-placeholder="Pilih Kode Mata Pelajaran">
                                            <option value=""></option>
                                            <?php
                                            include ("konek.php");
                                            $qmapel="select * from mapel";
                                            $hslmapel=mysql_query($qmapel);
                                            while($rowmapel=mysql_fetch_array($hslmapel)){
                                                if($hcr['KodeMapel']==$rowmapel['KodeMapel']){$tnd1="selected=selected";}else{$tnd1="";}
                                                echo "<option name='kodemapel' value='$rowmapel[KodeMapel]'".$tnd1.">".$rowmapel['KodeMapel']."</option>";
                                            };

                                            ?>

                                        </select>
                                    </div>
                                </div>
                            </td></tr>
                        </table>
                        <button type="submit" class="btn btn-primary"><i class="icon-check"></i> SIMPAN</button>
                    </center>
                </form>
            <?}else{?>
                    <form class="form-horizontal  well" method='post' action='../dashbord/staff/inpengajar.php' enctype="multipart/form-data">
                        <center><h3>Input Guru Pengajar</h3>
                    <table>
                        <tr><td></td><td>
                            <div class="control-group">
                            <div class="controls">

                                <select tabindex="5" class="chzn-select input-xlarge" name="nik"data-placeholder="Pilih Nama Guru">
                                    <option value=""></option>
                                    <?php
                                    include ("konek.php");
                                    $qnik="select * from staff";
                                    $hslnik=mysql_query($qnik);
                                    while($rownik=mysql_fetch_array($hslnik)){
                                        echo "<option name='nik' value='$rownik[nik]'>".$rownik[nama]."</option>";
                                    };

                                    ?>

                                </select>
                            </div>
                        </div>
                        </td><td>

                            <div class="control-group">
                                <div class="controls">

                                    <select tabindex="5" class="chzn-select input-xlarge" name="kodemapel"data-placeholder="Pilih Kode Mata Pelajaran">
                                        <option value=""></option>
                                        <?php
                                        include ("konek.php");
                                        $qmapel="select * from mapel";
                                        $hslmapel=mysql_query($qmapel);
                                        while($rowmapel=mysql_fetch_array($hslmapel)){
                                            echo "<option name='kodemapel' value='$rowmapel[KodeMapel]'>".$rowmapel['KodeMapel']."</option>";
                                        };

                                        ?>

                                    </select>
                                </div>
                            </div>
                        </td></tr>
                    </table>
                            <button type="submit" class="btn btn-primary"><i class="icon-check"></i> SIMPAN</button>
                        </center>
                    </form>
        <?php }?>
            <?php include"lpengajar.php"?>
            </div>
        </div>
    </div><!-- /.page-content -->
</div><!-- /.row -->

<!-- PAGE CONTENT ENDS -->

<?php
}else {
    header("location:../index.php");
}
?>