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

        <li class="active open">
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
                <li class="active">
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
            <div class="row-fluid well">
            <?php switch($_GET['mod']){
                default:
            ?>
            <div class="control-group" style="margin:auto;border: 0px solid red;width: 82%">
            <a href="?content=kelas" class="btn btn-primary input-xlarge active"><i class="icon-th-list"></i> Data Kelas</a>
            <a href="?content=kelas&mod=pk" class="btn btn-inverse input-xlarge"><i class="icon-th"></i> Pemilihan Kelas</a>
            <a href="?content=kelas&mod=new" class="btn btn-success input-xlarge"><i class="icon-plus-sign"></i> Siswa Baru</a>
            </div>
                <?php

            if($ak=$_GET['edit']!='1'){

                ?>

                <form method="post" action="../dashbord/staff/indafkelas.php" enctype="multipart/form-data">
                    <div class="well">
                        <div style="margin: auto;width:37%;padding:1%;border: 2px solid #c0c0c0">
                            <table>
                                <tr>
                                    <div class="control-group">
                                        <div class="control">
                                            <td width="28%"><label>Kelas</label></td><td><input type="text" name="idkelas" class="input-xlarge" placeholder="Harap diisi.."/></td>
                                        </div>
                                    </div>
                                </tr>
                                <tr>
                                    <div class="control-group">
                                        <div class="control">
                                            <td width="5%"><label>Kuota</label></td><td><input type="text" name="kuota" class="input-xlarge" placeholder="Harap diisi.."/></td>
                                        </div>
                                    </div>
                                </tr>

                                <tr>
                                    <div class="control-group">
                                        <div class="control">
                                            <td></td>
                                            <td>
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
                $qprof="select * from dafkelas where idkelas='$id'";
                $hslpro=mysql_query($qprof);
                $rowpro=mysql_fetch_array($hslpro);
                ?>

                <form method="post" action="../dashbord/staff/edafkelas.php" enctype="multipart/form-data">
                    <div class="well">
                        <div style="margin: auto;width:37%;padding:1%;border: 2px solid #c0c0c0">
                            <table>
                                <input type="text" name='id' class="hidden" value="<?php echo $rowpro['id']?>"
                                <tr>
                                    <div class="control-group">
                                        <div class="control">
                                            <td width="28%"><label>Kelas</label></td><td><input type="text" name="idkelas" class="input-xlarge" value="<?php echo $rowpro['IdKelas']?>" placeholder="Harap diisi.." readonly="true"/></td>
                                        </div>
                                    </div>
                                </tr>
                                <tr>
                                    <div class="control-group">
                                        <div class="control">
                                            <td><label>Kuota</label></td><td><input type="text" name="kuota" class="input-xlarge" placeholder="Harap diisi.." value="<?php echo $rowpro['kuota'];?>"/></td>
                                        </div>
                                    </div>
                                </tr>

                                <tr>
                                    <div class="control-group">
                                        <div class="control">
                                            <td><a href="?content=kelas" class="btn btn-success input-small"><i class="icon-backward"></i> BATAL</a></td>
                                            <td>
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
            <?php
            include"ldafkelas.php";
            break;
            ?>

             <?php
                 case "pk":
             ?>
             <div class="control-group" style="margin:auto;border: 0px solid red; width: 82%">
                 <a href="?content=kelas" class="btn btn-primary input-xlarge"><i class="icon-th-list"></i> Data Kelas</a>
                 <a href="?content=kelas&mod=pk" class="btn btn-inverse input-xlarge active"><i class="icon-th"></i> Pemilihan Kelas</a>
                 <a href="?content=kelas&mod=new" class="btn btn-success input-xlarge"><i class="icon-plus-sign"></i> Siswa Baru</a>
            </div>
             <?php include "ldtkelas.php";
                     break;
                case "new":
                    echo "<div class='control-group' style='margin:auto;border: 0px solid red; width: 82%'>".
                 "<a href=''?content=kelas' class='btn btn-primary input-xlarge'><i class='icon-th-list'></i> Data Kelas</a>".
                 "<a href='?content=kelas&mod=pk' class='btn btn-inverse input-xlarge'><i class='icon-th'></i> Pemilihan Kelas</a>".
                 "<a href='?content=kelas&mod=new' class='btn btn-success input-xlarge active'><i class='icon-plus-sign'></i> Siswa Baru</a>".
                    "</div>";
                    include "newskelas.php";
                    break;
            }?>
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