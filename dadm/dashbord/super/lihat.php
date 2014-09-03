<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
if ((!isset($_SESSION["id"]))and(!isset($_SESSION["hak"]))) {
    header("location:index.php");
} elseif ((isset($_SESSION["id"]))and($_SESSION["hak"])==0) {
    ?>


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
 function uji(){
            $("#edit").show("slow");
        }
</script>

<script type="text/javascript">
    function cari(){
        $('#key').change(function(){
            var cari =$("#cari").val();
            var key =$("#key").val();
            //alert($("#ThnAjar").val());
            window.location="index.php?content=lihat&cari="+cari+"&key="+key;
        });
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

            <li class="active open">
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

        <div class="page-content">
            <div class="container-fluid">
                <div class="row-fluid well">

                    <div id="edit">
                        <?php if(isset($_GET['id'])!=null){
                        include("edit.php");
                    }else{
                    include("kosong.php");
                    }
                        ?>
                    </div>

                    <div style="width:80%;margin:auto;border:2px solid #c0c0c0; padding: 2%;font-size: larger">
                        <center><h3>Daftar User</h3></center>

                        <table width="100%" class="table table-bordered table-striped">
                            <tr><td colspan="5" align="right">Pencarian <input type="text" name="cari" class="input-xlarge" placeholder="Masukan kata kunci" id="cari"/> </td><td>
                                Berdasarkan <select name="key" onclick="cari()" id="key">
                                <option>Pilihlah</option>
                                    <option value="nik">NIK</option>
                                    <option value="username">Username</option>
                                    <option value="hak">Hak Akses</option>
                                    <option value="status">Status</option>
                                </select>
                            </td></tr>
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
                            $p      = new Paging;
                            $batas  = 10;
                            $posisi = $p->cariPosisi($batas);
                            $key=($_GET['key']);
                            $cr=($_GET['cari']);
                            switch($cr){
                                case "Super Admin":$hk=0;
                                    break;
                                case "Staff":$hk=1;
                                    break;
                                case "Guru":$hk=2;
                                    break;
                                case "Loket":$hk=3;
                                    break;
                            }
                            if($cr!=''){
                                switch($key){
                                    case 'username':$query="Select * from ad_login where username like '%$cr%' order by hak asc";
                                        break;
                                    case 'nik':$query="Select * from ad_login where nik like '%$cr%' order by hak asc";
                                        break;
                                    case 'hak':$query="Select * from ad_login where hak like '%$hk%' order by hak asc";
                                        break;
                                    case 'status':$query="Select * from ad_login where status like '%$cr%' order by hak asc";
                                        break;
                                }

                            }else{$query="Select * from ad_login order by hak asc";}
                            $query1=$p->buatLimit($query,$posisi,$batas);
                            $hasil=mysql_query($query1);
                            $no=1+$posisi;
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
                                    "<td width='30%'> <a href='#' onclick='hapus($row[id])' class='btn btn-small btn-danger' title='Hapus'><i class='icon-trash'></i></a> <a href='?content=lihat&id=$row[id]#edit' onclick='uji()'class='btn btn-small btn-primary' title='Edit'><i class='icon-pencil'></i></a> <a href='#' onclick='reset($row[id])' class='btn btn-success' title='Reset'><i class='icon-refresh'></i></a> <a href='#' onclick='blok($row[id])' class='btn btn-warning' title='Blok'><i class='icon-ban-circle'></i></a> </td></tr>";
                                $no=$no+1;
                            }


                            ?>

                        </table>
                        <?php
                        $jmldata = mysql_num_rows(mysql_query("Select * from ad_login order by hak asc"));

                        $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
                        $linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);

                        echo "<div id=paging>Hal : $linkHalaman</div><br>";

                        ?>
                    </div>
                </div>
            </div>
        </div><!-- /.col -->
    </div><!-- /.row -->
</div>

<div class="ace-settings-container" id="ace-settings-container">
    <div class="btn btn-app btn-xs btn-warning ace-settings-btn" id="ace-settings-btn">
        <i class="icon-cog bigger-150"></i>
    </div>

    <div class="ace-settings-box" id="ace-settings-box">
       <?php include("edit.php")?>
    </div>
</div><!-- /#ace-settings-container -->
<?php
}else {
    header("location:../index.php");
}
?>