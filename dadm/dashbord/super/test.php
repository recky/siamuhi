
<link rel="stylesheet" href="../../../css/bootstrap.css">

<script src="../../dashbord/assets/js/jquery-2.0.3.min.js"></script>
<script src="../../../js/bootstrap.js"></script>
<script type="text/javascript">
    function hapus(id){
        var cek=confirm('Anda yakin akan menghapus?');
        if(cek==true){
            window.location='../dashbord/super/hapus.php?id='+id;
        }else{
            window.location='?content=lihat';
        }

    }

    function reset(id){
        var cek=confirm('Anda yakin akan mereset akun ini?');
        if(cek==true){
            window.location='../dashbord/super/reset.php?id='+id;
        }else{
            window.location='?content=lihat';
        }

    }

    function blok(id){
        var cek=confirm('Anda yakin akan memblok akun ini?');
        if(cek==true){
            window.location='../dashbord/super/blok.php?id='+id;
        }else{
            window.location='?content=lihat';
        }

    }
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

                    <li class="active">
                        <a href="?content=lihat">
                            <i class="icon-double-angle-right"></i>
                            Lihat Data
                        </a>
                    </li>

                </ul>
            </li>

            <li>
                <a href="#" class="dropdown-toggle">
                    <i class="icon-cog"></i>
                    <span class="menu-text"> Pengaturan</span>

                    <b class="arrow icon-angle-down"></b>
                </a>

                <ul class="submenu">
                    <li>
                        <a href="tables.html">
                            <i class="icon-double-angle-right"></i>
                            Simple &amp; Dynamic
                        </a>
                    </li>

                    <li>
                        <a href="jqgrid.html">
                            <i class="icon-double-angle-right"></i>
                            jqGrid plugin
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
                    <div style="width:80%;margin:auto;border:2px solid #c0c0c0; padding: 2%;font-size: larger">
                        <center><h3>Daftar User</h3></center>
                        <table width="100%" class="table table-bordered table-striped">
                            <tr align="center" style="background: #0074c7;">
                                <th width=""><strong><center>No </center></strong></th>
                                <th width=""><strong><center>Username </center></strong></th>
                                <th width=""><strong><center>Hak Akses</center></strong></th>
                                <th width=""><strong><center>NIK</center></strong></th>
                                <th width=""><strong><center>Status</center></strong></th>
                                <th width=""><strong><center>Aksi</center></strong></th>
                            </tr>
                            <?php
                            include "konek.php";
                            $query="Select * from ad_login order by hak asc";
                            $hasil=mysql_query($query);
                            $no=1;
                            $nil=0;
                            while($row=mysql_fetch_array($hasil))
                            {
                                switch($row['hak']){
                                    case 0:$hak="Super Admin";
                                        break;
                                    case 1:$hak="Staff";
                                        break;
                                    case 2:$hak="Guru";
                                        break;
                                    case 3:$hak="Loket";
                                        break;
                                }
                                if($row['status']==1){$status="Aktif";$col='"text-success"';}else{$status="Non Aktif";$col='"text-danger"';}
                                echo"<tr $col><td>$no</font></td>".
                                    "<td>$row[username]</td>".
                                    "<td>$hak</td>".
                                    "<td>$row[nik]</td>".
                                    "<td><label class=$col>$status</label></td>".
                                    "<td width='30%'> <a href='#' onclick='hapus($row[id])' class='btn btn-small btn-danger' title='Hapus'><i class='icon-trash'></i></a> <a href='?id=$row[id]&#edit' data-toggle='modal' aria-hidden='true' class='brand btn btn-small btn-primary' title='Edit'><i class='icon-pencil'></i></a> <a href='#' onclick='reset($row[id])' class='btn btn-success' title='Reset'><i class='icon-refresh'></i></a> <a href='#' onclick='blok($row[id])' class='btn btn-warning' title='Blok'><i class='icon-ban-circle'></i></a> </td></tr>";
                                $no=$no+1;
                            }


                            ?>
                            <a href="#edit" class="btn btn-inverse btn-block" data-toggle="modal">
                                <i class="icon-th icon-plus-sign icon-white"></i> Tambah Barang
                            </a>
                        </table>
                    </div>
                </div>
            </div>
        </div><!-- /.col -->
    </div><!-- /.row -->
</div>

<div id="edit" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Tambah Barang</h3>
    </div>
    <div class="modal-body">

        dsf
        <div class="modal-footer">
            <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
            <button type="submit" class="btn btn-primary" disabled="disabled" id="add" name="add">Simpan</button>
        </div>

    </div>
