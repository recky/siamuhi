<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
    session_start();
if (!isset($_SESSION["id"])) {
    header("location:index.php");
} elseif (isset($_SESSION["id"])) {
    ?>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi Akademik</title>
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/bootstrap-responsive.css">
    <link rel="stylesheet" href="../css/body.css">
    <script src="../js/jqeury-1.10.2.min.js"></script>
    <!--
    <script src="../js/jquery.autosize-min.js"></script>
    <script src="../js/jquery.inputlimiter.1.3.1.min.js"></script>
    <script src="../js/jquery.maskedinput.min.js"></script>-->

<?php include "tanggal.php";?>

</head>
<body>
<div id=outwrap>
<div id="wrapper">
    <div id="header">
        <div id="head">
        </div>
    </div>
    <div id="content">

        <div class="navbar">
            <div class="navbar-white">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-th-list icon-white"></span>
                    </a>
                    <a href="#ulogin" data-toggle="modal" aria-hidden="true" class="brand"><img src="../img/account.png" width="20"/>
                        <?php
                        include "../konek.php";
                        $id=($_SESSION['id']);
                        $query="select nama from info_biodata where iduser='$id'";
                        $hasil=mysql_query($query);
                        while($rowe=mysql_fetch_array($hasil)){
                            echo "$rowe[nama]";
                        }

                        ?>
                    </a>


                    <div class="nav-collapse">
                        <ul class="nav pull-right">
                            <li><a href="index.php?"><h4><b class="icon-home"></b><span>   </span> Home</h4></a></li>
                            <li><a href="index.php?content=bayar"><h4><b class="icon-inbox"></b><span>   </span> Pembayaran</h4></a></li>
                            <li><a href="index.php?content=absen"><h4><b class="icon-check"></b><span>   </span> Presensi</h4></a></li>
                            <li><a href="index.php?content=nilai"><h4><b class="icon-list-alt"></b><span>   </span> Penilaian</h4></a></li>
                            <li><a href="logut.php" class="btn-danger"><h4><b class="icon-off"></b><span>   </span> Keluar</h4>
                            </a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>


            <?php
        include "../dadm/dashbord/staff/Paging.php";
        $conten=(isset($_GET["content"]));
        if($conten==""){$conten="profil.php";}
        else{$conten=$_GET["content"].".php";}
        include $conten;
        ?>

    <div id="footer"><a href="#">SMK Muhammadiyah 1 Weleri 2013 &copy by</a> <a href="#">reky </a></div>
</div>



    <div class="modal hide fade" id="ulogin" aria-hidden="true">
        <div class="modal-header">
            <h3>Edit Password<h3>
        </div>
        <div class="modal-body">
            <?php include "udlogin.php";?>
        </div>
        <div class="modal-footer">
            <button class="btn" data-dismiss="modal" aria-hidden="false">Keluar</button>
        </div>
    </div>





</div>
</body>
</html>
<?php
}else {
    header("location:../index.php");
}
?>