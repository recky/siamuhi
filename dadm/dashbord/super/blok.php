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
if($row['status']==1){
    $st=0;
}else{
    $st=1;
}

$qud="update ad_login set status='$st' where id=$_GET[id]";
$hslud=mysql_query($qud);

if($hslud){
    echo"<script>alert('Proses berhasil'); window.location='../index.php?content=lihat' </script>";
}else{
    echo"<script>alert('Proses gagal'); window.location='../index.php?content=lihat'</script>";
}
?>