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

        <li class="active open">
            <a href="#" class="dropdown-toggle">
                <i class="icon-archive"></i>
                <span class="menu-text"> Keuangan</span>

                <b class="arrow icon-angle-down"></b>
            </a>

            <ul class="submenu">


                <li class="active">
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
                <form class="form-horizontal  well" method='post' action='../dashbord/staff/injpemb.php' enctype="multipart/form-data">

                    <div style="margin: auto;width: 30%;border: 2px solid #c0c0c0;padding: 2%">
                        <center><h3>Input Jenis Pembayaran</h3></center>
                        <div class="control-group">
                            <label class="control-label">Jenis</label>
                            <div class="controls">
                                <input type="text" class="input-xlarge" name="jenis" placeholder="Wajib diisi..."/>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Kelas</label>
                            <div class="controls">
                                <input type="text" class="input-xlarge" name="kelas" placeholder="Wajib diisi..."/>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Biaya</label>
                            <div class="controls">
                                <input type="text" class="input-xlarge" name="biaya" placeholder="Wajib diisi..."/>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Tahun Ajaran</label>
                            <div class="controls">

                                <select tabindex="5" class="chzn-select input-xlarge" name="ta"data-placeholder="Pilih TA">
                                    <option value=""></option>
                                    <?php
                                    include ("konek.php");
                                    $qnik="select * from ta";
                                    $hslnik=mysql_query($qnik);
                                    while($rownik=mysql_fetch_array($hslnik)){
                                        echo "<option value='$rownik[ta]'>".$rownik[ta]."</option>";
                                    };

                                    ?>

                                </select>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label">Batas</label>
                            <div class="controls">
                                <input type="text" class="input-xlarge" name="batas" placeholder="Wajib diisi..."/>
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
                $qprof="select * from keuangan where IdKeu='$id'";
                $hslpro=mysql_query($qprof);
                $rowpro=mysql_fetch_array($hslpro);
                ?>

                <form class="form-horizontal  well" method='post' action='../dashbord/staff/ejpemb.php' enctype="multipart/form-data">

                    <div style="margin: auto;width: 30%;border: 2px solid #c0c0c0;padding: 2%">
                        <center><h3>Input Jenis Pembayaran</h3></center>
                        <input name="idkeu" value="<?php echo $rowpro['IdKeu'];?>" type="text" class="hidden"/>
                        <div class="control-group">
                            <label class="control-label">Jenis</label>
                            <div class="controls">
                                <input type="text" class="input-xlarge" name="jenis" placeholder="Wajib diisi..." value="<?php echo $rowpro['Jenis']?>"/>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Kelas</label>
                            <div class="controls">
                                <input type="text" class="input-xlarge" name="kelas" placeholder="Wajib diisi..." value="<?php echo $rowpro['Kelas']?>"/>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Biaya</label>
                            <div class="controls">
                                <input type="text" class="input-xlarge" name="biaya" placeholder="Wajib diisi..." value="<?php echo $rowpro['Biaya']?>"/>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Tahun Ajaran</label>
                            <div class="controls">

                                <select tabindex="5" class="chzn-select input-xlarge" name="ta"data-placeholder="Pilih TA">
                                    <option value=""></option>
                                    <?php
                                    include ("konek.php");
                                    $qnik="select * from ta";
                                    $hslnik=mysql_query($qnik);
                                    while($rownik=mysql_fetch_array($hslnik)){
                                        if($rowpro['TA']==$rownik['ta']){$cek="selected=selectd";}
                                        echo "<option value='$rownik[ta]'$cek >".$rownik[ta]."</option>";
                                    };

                                    ?>

                                </select>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label">Batas</label>
                            <div class="controls">
                                <input type="text" class="input-xlarge" name="batas" placeholder="Wajib diisi..." value="<?php echo $rowpro['Batas']?>"/>
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
        <?php include"ljpemb.php";?>
    </div>
</div><!-- /.page-content -->
</div><!-- /.row -->

<!-- PAGE CONTENT ENDS -->

<?php
}else {
    header("location:../index.php");
}
?>