<?php

if ((!isset($_SESSION["id"]))and(!isset($_SESSION["hak"]))) {
    header("location:index.php");
} elseif ((isset($_SESSION["id"]))and(($_SESSION["hak"])==1)) {
    ?>
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

        <li class="active open">
            <a href="#" class="dropdown-toggle">
                <i class="icon-book"></i>
                <span class="menu-text"> Akademik</span>

                <b class="arrow icon-angle-down"></b>
            </a>

            <ul class="submenu">


                <li class="active">
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

        <li>
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


                <?php

                if($ak=$_GET['edit']!='1'){

                    ?>

                    <form method="post" action="../dashbord/staff/injurusan.php" enctype="multipart/form-data">
                        <div class="well">
                            <div style="margin: auto;width:37%;padding:1%;border: 2px solid #c0c0c0">
                                <table>
                                    <tr>
                                        <div class="control-group">
                                            <div class="control">
                                                <td width="28%"><label>Kode Jurusan</label></td><td><input type="text" name="id" class="input-xlarge" placeholder="Harap diisi.."/></td>
                                            </div>
                                        </div>
                                    </tr>
                                    <tr>
                                        <div class="control-group">
                                            <div class="control">
                                                <td width="5%"><label>Program Studi</label></td><td><input type="text" name="program" class="input-xlarge" placeholder="Harap diisi.."/></td>
                                            </div>
                                        </div>
                                    </tr>

                                    <tr>
                                        <div class="control-group">
                                            <div class="control">
                                                <td><label>Bidang Keahlian</label></td><td><input type="text" name="bidang" class="input-xlarge" placeholder="Harap diisi.."/></td>
                                            </div>
                                        </div>
                                    </tr>
                                    <tr>
                                        <div class="control-group">
                                            <div class="control">
                                                <td colspan="2">
                                                    <button type="submit" class="btn btn-primary input-xlarge pull-right"><i class="icon-check"></i>SIMPAN</button>
                                                </td>
                                            </div>
                                        </div>
                                    </tr>
                            </div>
                        </div>
                        </table>
                    </form>
                    <?php
                }
                else
                {
                    include "konek.php";
                    $id=$_GET["id"];
                    $qprof="select * from jurusan where IdJurusan='$id'";
                    $hslpro=mysql_query($qprof);
                    $rowpro=mysql_fetch_array($hslpro);
                    ?>

                    <form method="post" action="../dashbord/staff/edjurusan.php" enctype="multipart/form-data">
                        <div class="well">
                            <div style="margin: auto;width:37%;padding:1%;border: 2px solid #c0c0c0">
                                <table>
                                    <tr>
                                        <div class="control-group">
                                            <div class="control">
                                                <td width="28%"><label>Kode Jurusan</label></td><td><input type="text" name="id" class="input-xlarge" value="<?php echo $rowpro['IdJurusan']?>" placeholder="Harap diisi.." readonly="true"/></td>
                                            </div>
                                        </div>
                                    </tr>
                                    <tr>
                                        <div class="control-group">
                                            <div class="control">
                                                <td width="5%"><label>Program Studi</label></td><td><input type="text" name="program" class="input-xlarge" placeholder="Harap diisi.." value="<?php echo $rowpro['Program'];?>"/></td>
                                            </div>
                                        </div>
                                    </tr>

                                    <tr>
                                        <div class="control-group">
                                            <div class="control">
                                                <td><label>Bidang Keahlian</label></td><td><input type="text" name="bidang" class="input-xlarge" placeholder="Harap diisi.." value="<?php echo $rowpro['Bidang'];?>"/></td>
                                            </div>
                                        </div>
                                    </tr>
                                    <tr>
                                        <div class="control-group">
                                            <div class="control">
                                                <td colspan="2">
                                                    <button type="submit" class="btn btn-primary input-xlarge pull-right"><i class="icon-check"></i>SIMPAN</button>
                                                </td>
                                            </div>
                                        </div>
                                    </tr>
                            </div>
                        </div>
                        </table>
                    </form>
                    <?php
                }

                ?>

            </div>
            <?php include"ljurusan.php";?>
        </div>
    </div><!-- /.page-content -->
</div><!-- /.row -->
</div><!-- /.page-content -->
<?php
}else {
    header("location:../index.php");
}
?>