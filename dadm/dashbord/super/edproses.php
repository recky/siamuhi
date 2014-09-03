<?php
/**
 * Created by JetBrains PhpStorm.
 * User: richees
 * Date: 12/11/13
 * Time: 7:12 PM
 * To change this template use File | Settings | File Templates.
 */

include "konek.php";
$id=$_POST['id'];
$qin="update ad_login set username='$_POST[username]',hak='$_POST[hak]',nik='$_POST[nik]' where id=$id";
$hslin=mysql_query($qin);

if($hslin){
    echo"<script>alert('Data berhasil tersimpan'); window.location='../index.php?content=lihat'</script>";
}else{
    echo"<script>alert('Gagal tersimpan'); window.location='../index.php?content=lihat'</script>";
}
?>
