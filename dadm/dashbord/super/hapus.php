<?php
/**
 * Created by JetBrains PhpStorm.
 * User: richees
 * Date: 12/11/13
 * Time: 9:12 PM
 * To change this template use File | Settings | File Templates.
 */

include"konek.php";
$qin="delete from ad_login where id=$_GET[id]";
$hslin=mysql_query($qin);

if($hslin){
    echo"<script>alert('Data berhasil terhapus'); window.location='../index.php?content=lihat' </script>";
}else{
    echo"<script>alert('Data gagal terhapus'); window.location='../index.php?content=lihat'</script>";
}
?>