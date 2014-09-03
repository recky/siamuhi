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

        <li class="active open">
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
                <li class="active">
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
                    <form class="form-horizontal  well" method='post' action='../dashbord/staff/inmapel.php' enctype="multipart/form-data">

                        <div style="margin: auto;width: 30%;border: 2px solid #c0c0c0;padding: 2%">
                            <center><h3>Input Mata Pelajaran</h3></center>
                            <div class="control-group">
                                <label class="control-label">Kode Mata Pelajaran</label>
                                <div class="controls">
                                    <input type="text" class="input-xlarge" name="kdmapel" placeholder="Wajib diisi..."/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Mata Pelajaran</label>
                                <div class="controls">
                                    <input type="text" class="input-xlarge" name="mapel" placeholder="Wajib diisi..."/>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Kategori Mata Pelajaran</label>
                                <div class="controls">

                                    <select tabindex="5" class="chzn-select input-xlarge" name="idkategori"data-placeholder="Pilih Kategori">
                                        <option value=""></option>
                                        <?php
                                        include ("konek.php");
                                        $qnik="select * from kategori";
                                        $hslnik=mysql_query($qnik);
                                        while($rownik=mysql_fetch_array($hslnik)){
                                            echo "<option value='$rownik[IdKategori]'>".$rownik[Kategori]."</option>";
                                        };

                                        ?>

                                    </select>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Kelas</label>
                                <div class="controls">
                                    <input type="text" class="input-xlarge" name="kelas" placeholder="Wajib diisi..."/>
                                </div>
                            </div>


                            <div class="control-group">
                                <label class="control-label">Diuntukan Jurusan</label>
                                <div class="controls">

                                    <select tabindex="5" class="chzn-select input-xlarge" name="idjurusan"data-placeholder="Pilih jurusan">
                                        <option value=""></option>
                                        <?php
                                        include ("konek.php");
                                        $qnik="select * from jurusan";
                                        $hslnik=mysql_query($qnik);
                                        while($rownik=mysql_fetch_array($hslnik)){
                                            echo "<option value='$rownik[IdJurusan]'>".$rownik[Program]."</option>";
                                        };

                                        ?>

                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">KKM (Keriteria Kelulusan Minimal)</label>
                                <div class="controls">
                                    <input type="text" class="input-xlarge" name="kkm" placeholder="Wajib diisi..."/>
                                </div>
                            </div>
                            <br/>
                            <div class="control-group">
                                <div class="control">
                                    <button type="submit" class="btn btn-primary input-xlarge"><i class="icon-check"></i>SIMPAN</button>
                                </div>
                            </div>

                        </div>
                    </form>


                    <?php
                }
                else
                {
                    include "konek.php";
                    $id=$_GET["id"];
                    $qprof="select * from mapel where KodeMapel='$id'";
                    $hslpro=mysql_query($qprof);
                    $rowpro=mysql_fetch_array($hslpro);
                    ?>

                    <form class="form-horizontal  well" method='post' action='../dashbord/staff/emapel.php' enctype="multipart/form-data">

                        <div style="margin: auto;width: 30%;border: 2px solid #c0c0c0;padding: 2%">
                            <center><h3>Input Mata Pelajaran</h3></center>
                            <div class="control-group">
                                <label class="control-label">Kode Mata Pelajaran</label>
                                <div class="controls">
                                    <input type="text" class="input-xlarge" name="kdmapel" placeholder="Wajib diisi..." value="<?php echo $rowpro['KodeMapel']?>" readonly="true"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Mata Pelajaran</label>
                                <div class="controls">
                                    <input type="text" class="input-xlarge" name="mapel" placeholder="Wajib diisi..." value="<?php echo $rowpro['Mapel']?>"/>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Kategori Mata Pelajaran</label>
                                <div class="controls">

                                    <select tabindex="5" class="chzn-select input-xlarge" name="idkategori"data-placeholder="Pilih Kategori">
                                        <option value=""></option>
                                        <?php
                                        include ("konek.php");
                                        $qnik="select * from kategori";
                                        $hslnik=mysql_query($qnik);
                                        while($rownik=mysql_fetch_array($hslnik)){
                                            $cek=" ";
                                            if($rowpro['IdKategori']==$rownik['IdKategori']){$cek="selected=selectd";}
                                            echo "<option value='$rownik[IdKategori]' $cek>".$rownik[Kategori]."</option>";
                                        };

                                        ?>

                                    </select>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Kelas</label>
                                <div class="controls">
                                    <input type="text" class="input-xlarge" name="kelas" placeholder="Wajib diisi..." value="<?php echo $rowpro['Kelas']?>"/>
                                </div>
                            </div>


                            <div class="control-group">
                                <label class="control-label">Diuntukan Jurusan</label>
                                <div class="controls">

                                    <select tabindex="5" class="chzn-select input-xlarge" name="idjurusan"data-placeholder="Pilih jurusan">
                                        <option value=""></option>
                                        <?php
                                        include ("konek.php");
                                        $qnik="select * from jurusan";
                                        $hslnik=mysql_query($qnik);
                                        while($rownik=mysql_fetch_array($hslnik)){
                                            $cek=" ";
                                            if($rowpro['IdJurusan']==$rownik['IdJurusan']){$cek="selected=selected";}
                                            echo "<option value='$rownik[IdJurusan]' $cek>".$rownik[Program]."</option>";
                                        };

                                        ?>

                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">KKM (Keriteria Kelulusan Minimal)</label>
                                <div class="controls">
                                    <input type="text" class="input-xlarge" name="kkm" placeholder="Wajib diisi..." value="<?php echo $rowpro['kkm']?>"/>
                                </div>
                            </div>
                            <br/>
                            <div class="control-group">
                                <div class="control">
                                    <button type="submit" class="btn btn-primary input-xlarge"><i class="icon-check"></i>SIMPAN</button>
                                </div>
                            </div>

                        </div>
                    </form>
                    <?php
                }

                ?>

            </div>
            <?php include"lmapel.php";?>
        </div>
    </div><!-- /.page-content -->
</div><!-- /.row -->

        <!-- PAGE CONTENT ENDS -->

<?php
}else {
    header("location:../index.php");
}
?>