<?php
/**
 * Created by JetBrains PhpStorm.
 * User: richees
 * Date: 12/11/13
 * Time: 7:12 PM
 * To change this template use File | Settings | File Templates.
 */

include "konek.php";
$qed="update jadwal set IdKelas='$_POST[kelas]',KodeMapel='$_POST[kodemapel]' where id='$_POST[id]'";
$hsled=mysql_query($qed);

if($hsled){
    echo"<script>alert('Data berhasil tersimpan'); window.location='../index.php?content=jadwal'</script>";

}else{
    echo"<script>alert('Gagal tersimpan'); history.back(0)</script>";

}
?>
