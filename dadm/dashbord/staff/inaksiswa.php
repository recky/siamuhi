<?php
/**
 * Created by JetBrains PhpStorm.
 * User: richees
 * Date: 12/11/13
 * Time: 7:12 PM
 * To change this template use File | Settings | File Templates.
 */

include "konek.php";
$qin="insert into userlogin values ('','$_POST[nis]','$_POST[nis]',1,1)";
$hslin=mysql_query($qin);
if($hslin){
    echo"<script>alert('Data berhasil tersimpan'); window.location='../index.php?content=aksiswa'</script>";
}else{
    echo"<script>alert('Gagal tersimpan'); history.back(0)</script>";
}
?>
