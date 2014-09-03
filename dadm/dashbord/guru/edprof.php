<?php

if ((!isset($_SESSION["id"]))and(!isset($_SESSION["hak"]))) {
    header("location:index.php");
} elseif ((isset($_SESSION["id"]))and($_SESSION["hak"])==2) {
    ?>
<link rel="stylesheet" href="assets/css/chosen.css"/>
<script type="text/javascript">
    function hilange(){
        $("#editprof").hide("slow");
        history.back(0);
    }

</script>
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

    <ul class="nav nav-list">
        <li class="active">
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
                <span class="menu-text"> Input Nilai</span>

                <b class="arrow icon-angle-down"></b>
            </a>

            <ul class="submenu">
                <li class="active">
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
        <li>
            <a href="#" class="dropdown-toggle">
                <i class="icon-list"></i>
                Lihat &amp; Pencari Data
                <b class="arrow icon-angle-down"></b>
            </a>
            <ul class="submenu">
                <li>
                    <a href="?content=lklsx">
                        <i class="icon-double-angle-right"></i>
                        Kelas X
                    </a>
                </li>
                <li>
                    <a href="?content=lklsxi">
                        <i class="icon-double-angle-right"></i>
                        Kelas XI
                    </a>
                </li>
                <li>
                    <a href="?content=lklsxii">
                        <i class="icon-double-angle-right"></i>
                        Kelas XII
                    </a>
                </li>
            </ul>
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


        <div class="container-fluid">
            <div class="row-fluid">
                <div id="editprof" style="margin: auto;width: 40%;border: 2px solid #c0c0c0;padding: 2%">
                <form  class="form-horizontal well" method='POST' action='../dashbord/super/edproprof.php' enctype="multipart/form-data">
                    <a href="#" onclick="hilange()"><img src="assets/img/clear.png" /></a>

                        <center><h3>Profile</h3></center>
                        <input type="text" name="id" value="<?php echo $row['id'];?>" class="hide"/>
                         <div class="control-group">
                             <div class="control">
                                 <?php
                                 include "konek.php";
                                 $id=$_SESSION["id"];
                                 $qprof="select * from info_staff where id=$id";
                                 $hslpro=mysql_query($qprof);
                                 $rowpro=mysql_fetch_array($hslpro);
                                 if($rowpro['url']!=''){
                                     $alfoto=$rowpro['url'];
                                 }else{
                                     $alfoto="foto/default.png";
                                 }

                                 ?>

                        <img src="<?php echo $alfoto ?>" width="100%" />
                        <input type="file" class="btn btn-success input-xxlarge" name="foto"/>
                             </div>
                         </div>
                        <div class="control-group">
                            <label class="control-label">NIK</label>
                            <div class="controls">
                            <input type="text" name="nik" class="input-xxlarge" value="<?php echo $rowpro['nik'];?>" readonly="true"/>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label">Nama</label>
                            <div class="controls">
                                <input type="text" name="nama" class="input-xxlarge" placeholder="Wajib diisi..." value="<?php echo $rowpro['nama'];?>"/>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label">Jenis Kelamin</label>
                            <div class="controls">
                                <select name="jk" class="input-xxlarge">
                                <option <?php if ($rowpro['jk']=='Pil'){echo 'selected=selected';}?>> Pilihlah</option>
                                <option value="L" <?php if ($rowpro['jk']=='L'){echo 'selected=selected';}?>> Laki-laki</option>
                                <option value="P" <?php if ($rowpro['jk']=='P'){echo 'selected=selected';}?>> Perempuan</option>
                                </select>
                            </div>
                            </div>
                        <div class="control-group">
                            <label class="control-label">Alamat</label>
                            <div class="controls">
                                <input type="text" name="alamat" class="input-xxlarge" placeholder="Wajib diisi..." value="<?php echo $rowpro['alamat'];?>"/>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label">Telp / HP</label>
                            <div class="controls">
                                <input type="text" name="hp" class="input-xxlarge" placeholder="Wajib diisi..." value="<?php echo $rowpro['hp'];?>"/>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label">Jabatan</label>
                            <div class="controls">
                                <input type="text" name="jabatan" class="input-xxlarge" placeholder="Wajib diisi..." value="<?php echo $rowpro['jabatan'];?>"/>
                            </div>
                        </div>
                            <br/>
                            <div class="control-group">
                                <div class="control">
                                    <button type="submit" class="btn btn-primary input-xxlarge"><i class="icon-check"></i>SIMPAN</button>
                                </div>
                            </div>
                </form>

                    <form action="../dashbord/super/edpass.php" method="post">
                        <div class="well">
                            <input type="text" value="<?php echo $rowpro['nik'];?>" name="nik" class="hide">
                            <center><h3>Ubah Password</h3></center>
                            <div class="control-group">
                                <label class="control-label">Password Lama</label>
                                <div class="control">
                                    <input type="password" name="passlm" class="input-xxlarge" placeholder="Masukan Password anda"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Password Baru</label>
                                <div class="control">
                                    <input type="password" name="passbr" class="input-xxlarge" placeholder="Masukan Password baru anda"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="control">
                                    <button type="submit" class="btn btn-warning input-xxlarge"><i class="icon-check"></i>SIMPAN</button>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
             </div>
        </div>


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



