<?php
/**
 * Created by JetBrains PhpStorm.
 * User: richees
 * Date: 12/11/13
 * Time: 9:12 PM
 * To change this template use File | Settings | File Templates.
 */

include"konek.php";
$qin="select * from ad_login where id=$_GET[id]";
$hslin=mysql_query($qin);
$row=mysql_fetch_array($hslin);
$pas=md5($row['username']);

$qud="update ad_login set password='$pas' where id=$_GET[id]";
$hslud=mysql_query($qud);

if($hslud){
    echo"<script>alert('Reset password berhasil'); window.location='../index.php?content=lihat' </script>";
}else{
    echo"<script>alert('Reset password gagal'); window.location='../index.php?content=lihat'</script>";
}
?>