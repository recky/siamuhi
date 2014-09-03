<?php
/**
 * Created by JetBrains PhpStorm.
 * User: richees
 * Date: 12/11/13
 * Time: 7:12 PM
 * To change this template use File | Settings | File Templates.
 */

include "konek.php";
$pass=md5($_POST['password']);
$qin="insert into ad_login values('','$_POST[username]','$pass',$_POST[hak],'$_POST[nik]',1)";
$hslin=mysql_query($qin);

if($hslin){
    echo"<script>alert('Data berhasil tersimpan'); window.location='../index.php?content=pengguna'</script>";
}else{
    echo"<script>alert('Gagal tersimpan'); window.location='../index.php?content=pengguna'</script>";
}
?>
