<?php

if ((!isset($_SESSION["id"]))and(!isset($_SESSION["hak"]))) {
    header("location:index.php");
} elseif ((isset($_SESSION["id"]))and(($_SESSION["hak"])==3)) {
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

        <li class="active">
            <a href="?content=transpemb">
                <i class="icon-archive"></i>
                <span class="menu-text">Transaksi Pembayaran</span>
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
        <div class="row-fluid">
            <form class="form-horizontal  well" name="forme" method='post' action='../dashbord/staff/inprotrans.php' enctype="multipart/form-data">

                <div style="margin: auto;width: 30%;border: 2px solid #c0c0c0;padding: 2%">
                    <center><h3>Transaksi Pembayaran</h3></center>
                    <div class="control-group">
                        <label class="control-label">NIS</label>
                        <div class="controls">
                            <select tabindex="5" class="chzn-select input-xlarge" name="nis" data-placeholder="Pilih NIS">
                                <option value=""></option>
                                <?php
                                include ("konek.php");
                                $qnik="select * from biodata";
                                $hslnik=mysql_query($qnik);
                                while($rownik=mysql_fetch_array($hslnik)){
                                    echo "<option value='$rownik[NIS]'>".$rownik[NIS]."</option>";
                                };

                                ?>

                            </select>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">Jenis Pembayaran </label>
                        <div class="controls">
                            <select tabindex="5" class="chzn-select input-xlarge" name="jenis" data-placeholder="Pilih Kategori">
                                <option value=""></option>
                                <?php
                                include ("konek.php");
                                $hslkeu=mysql_query("select DISTINCT k.Jenis from keuangan k,ta t where k.ta=t.ta and t.status=1");
                                while($row=mysql_fetch_array($hslkeu)){
                                    echo "<option value='$row[IdKeu]'>".$row[Jenis]."</option>";
                                };

                                ?>

                            </select>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">Semester </label>
                        <div class="controls">
                            <select tabindex="5" class="chzn-select input-xlarge" name="semester" data-placeholder="Pilih Kategori">
                                <option value=""></option>
                                <?php
                                $hslsmt=mysql_query("select * from semester where Status=1");
                                while($rowsmt=mysql_fetch_array($hslsmt)){
                                    echo "<option selected=selected value='$rowsmt[IdSmtr]'>".$rowsmt[Smtr]."</option>";
                                };
                                ?>

                            </select>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">Tahun Ajaran</label>
                        <div class="controls">
                        <input type="text" class="input-xlarge" name="ta" value="<?php $rowt=mysql_fetch_array(mysql_query("select ta from ta where ta.status=1")); echo "$rowt[ta]"?>" readonly="true"/>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">Pilih Bulan</label>
                        <div class="controls">
                            <select tabindex="5" class="chzn-select input-xlarge" name="bulan" data-placeholder="Pilih Bulan">
                                <option value=""></option>
                                <?php
                                $sm=mysql_fetch_array(mysql_query("select IdSmtr from semester where status=1"));
                                switch($sm['IdSmtr']){
                                    case 'GJL':
                                ?>
                                        <option value="8">Agustus</option>
                                        <option value="9">September</option>
                                        <option value="10">Oktober</option>
                                        <option value="11">November</option>
                                        <option value="12">Desember</option>
                                        <option value="1">Januari</option>
                                            <?php break;
                                     case 'GNP':
                                        ?>
                                        <option value="2">Februari</option>
                                        <option value="3">Maret</option>
                                        <option value="4">April</option>
                                        <option value="5">Mei</option>
                                        <option value="6">Juni</option>
                                        <option value="7">Juli</option>
                                 <?php
                                        break;
                                }
                                ?>
                                </select>
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

<?php include "ltranspemb.php"?>
        </div>
        <!-- PAGE CONTENT ENDS -->
    </div><!-- /.col -->
</div><!-- /.row -->
</div><!-- /.page-content -->
<?php
}else {
    header("location:../index.php");
}
?>