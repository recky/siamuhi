<?php
/**
 * Created by JetBrains PhpStorm.
 * User: richees
 * Date: 1/13/14
 * Time: 9:47 AM
 * To change this template use File | Settings | File Templates.
 */
include "konek.php";
$id=$_GET["id"];
echo $id;
$qo="update pembayaran set status=1 where NoTrans=$id";
$hsline=mysql_query($qo);
if($hsline){
    echo"<script>alert('Perubahan berhasil'); window.location='../index.php?content=transpemb' </script>";
}else{
    echo"<script>alert('Perubahan gagal'); window.location='../index.php?content=transpemb'</script>";
}