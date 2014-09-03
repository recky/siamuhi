<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
if (substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip'))
    {ob_start("ob_gzhandler");}
else {ob_start();}
?>
<html>
<head>
    <link href="img/icon.ico" rel="SHORTCUT ICON"/>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi Akademik</title>

    <link rel="stylesheet" href="dadm/dashbord/assets/css/ace-ie.min.css" />
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap-responsive.css">
    <link rel="stylesheet" href="css/main.css">


    <link rel="stylesheet" href="assets/css/font-awesome.min.css" />

    <!--[if IE 7]>
    <link rel="stylesheet" href="assets/css/font-awesome-ie7.min.css" />
    <![endif]-->

    <!-- page specific plugin styles -->

    <!-- fonts -->

    <!--<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,300" />-->

    <!-- ace styles -->

    <link rel="stylesheet" href="dadm/dashbord/assets/css/ace.min.css" />
    <link rel="stylesheet" href="dadm/dashbord/assets/css/ace-rtl.min.css" />
    <link rel="stylesheet" href="dadm/dashbord/assets/css/ace-skins.min.css" />


    <script src="js/jquery-1.4.js"></script>
    <script type="text/javascript">
        function sizing() {
            var
                    formfilterswidth = $("#formfilters").width();
            $(".user").width((formfilterswidth - 46) + "px");
        }
        $(document).ready(sizing);
        $(window).resize(sizing);
    </script>
</head>
<body>
<div id="header">

</div>
<div id="body">

    <div id="content" class="well container-fluid">
        <center><h3>Sistem Informasi Akademik</h3></center>
        <div class="row-fluid">
            <div id="login" class="span6">
                <div class="title">
                    <center><h3>LOGIN</h3></center>
                </div>
                <center>
                    <img src="img/icon.png">
                    <table class="table">
                        <form id="formfilters" method="POST" action="loginproses.php" class="form-horizontal">
                            <tr>
                                <td valign="middle">Username</td>
                                <td valign="middle"><input type="text" name="username" class="user input-xlarge"
                                                           placeholder="Harap diisi.."></td>
                            </tr>
                            <tr>

                                <td valign="middle">Password</td>
                                <td valign="middle"><input type="password" name="password" class="user input-xlarge"
                                                           placeholder="Harap diisi.."></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <button type="reset" class="btn btn-success"><b class="icon-refresh icon-white"></b>&nbsp
                                        RESET
                                    </button>
                                    &nbsp
                                    <button type="submit" class="btn btn-primary"><b class="icon-check icon-white"></b>&nbsp
                                        LOGIN
                                    </button>
                                </td>
                            </tr>
                        </form>
                    </table>

                </center>

            </div>
            <div id="info" class="span6">
                <div class="title">
                    <center><h3>INFORMASI</h3></center>
                </div>
                <marquee direction="up" onmouseover="this.stop()" width="95%" scrollamount="2" onmouseout="this.start()"
                         height="85%" align="left">
                    <ul style="padding: 0%">
                        <?php
                        include"konek.php";
                        $qbr=mysql_query("select * from berita where akses='siswa' or akses='semua' and status=1 order by tgl desc limit 5");
                        while($rbrt=mysql_fetch_array($qbr)){
                            $kontent=substr($rbrt['konten'],0,100);
                            echo"<li><h4><a href='index.php?content=$rbrt[id]#news'>$rbrt[judul]</a></h4></li>".
                                "<p align='justify'>$kontent</p>";
                        }

                        ?>
                 </ul>
                </marquee>
            </div>

    </div>
        <div id="news">
            <?php
            include "konek.php";
            $conten=$_GET["content"];
            if($conten!=''){
                $qcr=mysql_fetch_array(mysql_query("select * from berita, staff where berita.nik=staff.nik and berita.id='$conten'"));
                echo"<h4>$qcr[judul]</h4><br/>".
                    "<label>Penulis : $qcr[nama]</label>".
                    "<p>$qcr[konten]</p>";
            }

            ?>
        </div>
</div>

<div id="footer" class="navbar-fixed-bottom">
    <a href="#">SMK Muhammadiyah 1 Weleri 2013 &copy by</a> <a href="#">Reky </a>
</div>
</body>
</html>
