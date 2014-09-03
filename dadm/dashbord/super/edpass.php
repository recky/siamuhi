<?php
/**
 * Created by JetBrains PhpStorm.
 * User: richees
 * Date: 12/11/13
 * Time: 7:12 PM
 * To change this template use File | Settings | File Templates.
 */

include "konek.php";
$qs="select * from ad_login where nik='$_POST[nik]'";
$hs=mysql_fetch_array(mysql_query($qs));
$passlm=md5($_POST['passlm']);
$passbr=md5($_POST['passbr']);

if($hs['password']==$passlm){
    $qed="update ad_login set password='$passbr'where nik='$_POST[nik]'";
    $hsled=mysql_query($qed);
}else{
    echo"<script>alert('Password lama anda salah'); window.location='../index.php?content=edprof'</script>";}


if($hsled){

    echo"<script>alert('Data berhasil tersimpan'); window.location='../index.php?content=edprof'</script>";
}else{
    echo"<script>alert('Gagal tersimpan'); window.location='../index.php?content=edprof'</script>";

}
?>
