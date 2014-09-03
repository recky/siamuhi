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

</head>
<body>
<div class="container-fluid" style="border-bottom: #d9d9d9 solid 2px">

    <div style="margin: auto;border: 0px solid red;height: auto;overflow: hidden; width: 80%;padding: 1%;padding-left: 20%;">
        <div class="circle">
            <a href="index.php?content=nilai&zoner=transkipnilai">
                <img src="../img/history.png" width="80%" style="margin: auto"/>

            </a>

            <p><h4>Transkip Nilai</h4></p>

        </div>

        <div class="circle">

            <a href="index.php?content=nilai&zoner=nilainow">
                <img src="../img/now.png" width="80%" style="margin: auto"/>

            </a>

            <p><h4>Nilai Sekarang</h4></p>

        </div>
        <div class="circle">

            <a href="index.php?content=nilai&zoner=nilaibelum">
                <img src="../img/future.png" width="80%" style="margin: auto"/>

            </a>

            <p><h4>Nilai Belum Masuk</h4></p>

        </div>
    </div>
</div>

<div class="container-fluid">

    <?php
    $conten=(isset($_GET["zoner"]));
    if($conten==""){$conten="kosong.php";}
    else{
        $conten=$_GET["zoner"].".php";}
    include $conten;
    ?>
</div>
</body>
</html>
<?php
}else {
    header("location:../index.php");
}
?>