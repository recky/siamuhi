
<?php
if (!isset($_SESSION["id"])) {
    header("location:index.php");
} elseif (isset($_SESSION["id"])) {
    ?>
<html xmlns="http://www.w3.org/1999/html">
<head>
    <link href="../css/reset.css" rel="stylesheet" type="text/css">
    <link href="../css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="../css/bootstrap-responsive.css" rel="stylesheet" type="text/css">
    <link href="../css/pemb.css" rel="stylesheet" type="text/css">
    <script src="../js/jqeury-1.10.2.min.js"></script>

    <link href="../css/extend.css" rel="stylesheet">
    <!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>-->

    <script src="../js/flot/jquery.flot.min.js"></script>
    <script src="../js/flot/jquery.flot.pie.min.js"></script>
    <script src="../js/flot/jquery.flot.resize.min.js"></script>

</head>
<body>
<div class="container-fluid">
    <div class="row-fluid">

        <div class="well container-fluid">
            <div class="row-fluid">
                <div class="span8 shadow">
                    <div class="headleft">
                        <h3>BIODATA</h3>
                    </div>

                    <?php
                    include "../konek.php";
                    $id=($_SESSION['id']);
                    $query="select  * from info_biodata where IdUser='$id'";
                    $hasil=mysql_query($query);
                    $row=mysql_fetch_array($hasil);
                    if ($row==true){
                        include "update.php";
                    }else{
                        include "form.php";
                    }
                    ?>

                </div>
                <div class="span4 shadow" style="margin-bottom: 2%">
                    <div class="headleft">
                        <h3>PEMBAYARAN</h3>
                    </div>

                    <?php include("piepem.php")?>
                </div>
                <div class="span4 shadow"style="margin-bottom: 2%">
                    <div class="headleft">
                        <h3>PENILAIAN</h3>
                    </div>

                    <?php include("pienilai.php")?>
                </div>
                <div class="span4 shadow"style="margin-bottom: 1%">
                    <div class="headleft">
                        <h3>PRESENSI</h3>
                    </div>
                    <?php include("pieabsensi.php")?>

                </div>
            </div>

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



