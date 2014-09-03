<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
if ((!isset($_SESSION["id"]))and(!isset($_SESSION["hak"]))) {
    header("location:index.php");
} elseif ((isset($_SESSION["id"]))and($_SESSION["hak"])==0) {
    ?>
<!DOCTYPE html>
<html lang="en">


<head>
    <script type="text/javascript" src="../dashbord/assets/tinymce/js/tinymce/tinymce.min.js"></script>
    <!-- place in header of your html document -->

    <script>
        tinymce.init({
            selector: "textarea.elm1",
            theme: "modern",
            width: 1000,
            height: 300,
            plugins: [
                "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
                "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                "save table contextmenu directionality emoticons template paste textcolor"
            ],
            content_css: "css/content.css",
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons",
            style_formats: [
                {title: 'Bold text', inline: 'b'},
                {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
                {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
                {title: 'Example 1', inline: 'span', classes: 'example1'},
                {title: 'Example 2', inline: 'span', classes: 'example2'},
                {title: 'Table styles'},
                {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
            ]
        });
    </script>

</head>

<body>
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
        <li class="active">
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
    <?php include "super/konek.php";
    $id=$_SESSION["id"];
    $qprof="select * from info_staff where id=$id";
    $hslpro=mysql_query($qprof);
    $rowpro=mysql_fetch_array($hslpro);?>
    <div class="page-content">
        <div class="container-fluid">
        <div class="row-fluid">
            <?php include"dafkonten.php";

            if($ak=$_GET['edit']!='1'){

            ?>

        <form method="post" action="../dashbord/super/inkonten.php" enctype="multipart/form-data">
            <div class="well">
            <div style="margin: auto;width:95%;padding:1%;border: 2px solid #c0c0c0">
                <table>
                    <tr>
                <div class="control-group">
                    <div class="control">
                    <td width="5%"><label>Judul</label></td><td><input type="text" name="judul" class="input-xxlarge"/></td>
                    </div>
                </div>
                    </tr>
                    <tr>
                <div class="control-group">
                    <div class="control">
                    <td colspan="2"><textarea class="elm1" name="konten"></textarea></td>
                    </div>
                </div>
                    </tr>
                    <tr>
                <div class="control-group">
                    <div class="control">
                    <td><label>Penulis</label></td><td><input type="text" name="nik" class="input-xlarge" value="<?echo $rowpro['nik'];?>" readonly="true"/></td>
                     </div>
                </div>
                    </tr>
                    <tr>
                <div class="control-group">
                    <div class="control">
                    <td><label>Akses</label></td>
                        <td>
                            <select name="akses" class="input-xlarge">
                                <option value="semua">Semua</option>
                                <option value="admin">Admin</option>
                                <option value="staff">Staff</option>
                                <option value="siswa">Siswa</option>
                                <option value="loket">Loket</option>
                            </select>
                        </td>
                    </div>
                </div>
                    </tr>
                    <tr>
                        <div class="control-group">
                            <div class="control">
                                <td><label>Publikasikan</label></td>
                                <td>
                                    <select name="pub" class="input-xlarge">
                                        <option value="1">Ya</option>
                                        <option value="0">Tidak</option>
                                    </select>
                                </td>
                            </div>
                        </div>
                    </tr>
                    <tr>
                        <div class="control-group">
                            <div class="control">
                                <td></td>
                                <td>
                                <button type="submit" class="btn btn-primary pull-right"><i class="icon-check"></i>SIMPAN</button>
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
                $qprof="select * from info_konten where id=$id";
                $hslpro=mysql_query($qprof);
                $rowpro=mysql_fetch_array($hslpro);
                ?>
                <form method="post" action="../dashbord/super/edprokonten.php" enctype="multipart/form-data">
                    <input value="<?php echo $id?>" class="hide" name="id">
                    <div class="well">
                        <div style="margin: auto;width:95%;padding:1%;border: 2px solid #c0c0c0">
                            <table>
                                <tr>
                                    <div class="control-group">
                                        <div class="control">
                                            <td width="5%"><label>Judul</label></td><td><input type="text" name="judul" class="input-xxlarge" value="<?php echo $rowpro['judul']?>"/></td>
                                        </div>
                                    </div>
                                </tr>
                                <tr>
                                    <div class="control-group">
                                        <div class="control">
                                            <td colspan="2"><textarea class="elm1" name="konten"><?php echo $rowpro['konten']?></textarea></td>
                                        </div>
                                    </div>
                                </tr>
                                <tr>
                                    <div class="control-group">
                                        <div class="control">
                                            <td><label>Penulis</label></td><td><input type="text" name="nik" class="input-xlarge" value="<?echo $rowpro['nik'];?>" readonly="true"/></td>
                                        </div>
                                    </div>
                                </tr>
                                <tr>
                                    <div class="control-group">
                                        <div class="control">
                                            <td><label>Akses</label></td>
                                            <td>
                                                <select name="akses" class="input-xlarge">
                                                    <option value="semua"  <?php if ($rowpro['akses']=='semua'){echo 'selected=selected';}?>>Semua</option>
                                                    <option value="admin" <?php if ($rowpro['akses']=='admin'){echo 'selected=selected';}?>>Admin</option>
                                                    <option value="staff" <?php if ($rowpro['akses']=='staff'){echo 'selected=selected';}?>>Staff</option>
                                                    <option value="siswa" <?php if ($rowpro['akses']=='siswa'){echo 'selected=selected';}?>>Siswa</option>
                                                    <option value="loket" <?php if ($rowpro['akses']=='loket'){echo 'selected=selected';}?>>Loket</option>
                                                </select>
                                            </td>
                                        </div>
                                    </div>
                                </tr>
                                <tr>
                                    <div class="control-group">
                                        <div class="control">
                                            <td><label>Publikasikan</label></td>
                                            <td>
                                                <select name="pub" class="input-xlarge">
                                                    <option value="1" <?php if ($rowpro['status']=='1'){echo 'selected=selected';}?>>Ya</option>
                                                    <option value="0" <?php if ($rowpro['status']=='0'){echo 'selected=selected';}?>>Tidak</option>
                                                </select>
                                            </td>
                                        </div>
                                    </div>
                                </tr>
                                <tr>
                                    <div class="control-group">
                                        <div class="control">
                                            <td>
                                                <a href="?content=editor" class="btn btn-success" ><i class="icon-backward"></i> BATAL</button></a>
                                            </td>
                                            <td>
                                                <button type="submit" class="btn btn-primary pull-right"><i class="icon-check"></i>SIMPAN</button>
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
         </div>
    </div><!-- /.page-content -->

</div>
<!-- basic scripts -->

<!--[if !IE]> -->
<!-- ace scripts -->

<!-- inline scripts related to this page -->

</body>

</html>
<?php
}else {
    header("location:../index.php");
}
?>



